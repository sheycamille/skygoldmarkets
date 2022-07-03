<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Mail\NewNotification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Admin;
use App\Models\Setting;
use App\Models\Country;
use App\Models\Deposit;
use App\Models\Mt5Details;
use App\Models\Withdrawal;
use App\Models\TpTransaction;

use Carbon\Carbon;

use Tarikhagustia\LaravelMt5\LaravelMt5;

use Tarikh\PhpMeta\Entities\Trade;

use DataTables;


class UsersController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:muser-list|muser-create|muser-edit|muser-delete', ['only' => ['index']]);
        $this->middleware('permission:muser-create', ['only' => ['store']]);
        $this->middleware('permission:muser-edit', ['only' => ['update' , 'resetpswd', 'dellaccounts']]);
        $this->middleware('permission:muser-block', ['only' => ['ublock', 'unblock', '']]);
        $this->middleware('permission:muser-messageall', ['only' => ['sendmailtooneuser', 'sendmailtoall']]);
        $this->middleware('permission:muser-access-account', ['only' => ['switchtouser']]);
        $this->middleware('permission:muser-access-wallet', ['only' => ['userwallet']]);
        $this->middleware('permission:muser-credit-debit', ['only' => ['topup']]);
        $this->middleware('permission:muser-delete', ['only' => ['destroy']]);
        $this->middleware('permission:mkyc-validate', ['only' => ['acceptkyc', 'rejectkyc', 'resetkyc']]);
    }


    // Return manage users route
    public function index()
    {
        $countries = Country::get();
        return view('admin.users')
            ->with(array(
                'title' => 'All users',
                'countries' => $countries,
            ));
    }

    // Return users data
    public function getusers()
    {
        $data = User::latest()->get();
        $fdata = Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('phone-email', function($user) {
                return $user->phone . ' | ' . $user->emmail;
            })
            ->addColumn('balance', function($user) {
                return $user->totalBalance();
            })
            ->addColumn('bonus', function($user) {
                return $user->totalBonus();
            })
            ->addColumn('num_accounts', function($user) {
                return count($user->accounts());
            })
            ->addColumn('date_registered', function($user) {
                return \Carbon\Carbon::parse($user->created_at)->toDayDateTimeString();
            })
            ->addColumn('action', function($user) {
                $action = '<a href="#" data-toggle="modal" data-target="#resetpswdModal' . $user->id .'" class="m-1 btn btn-warning btn-xs">Reset Password</a>';
                if (auth('admin')->user()->hasPermissionTo('muser-block', 'admin')) {
                    if ($user->status == null || $user->status == 'blocked') {
                        $action = '<a class="m-1 btn btn-primary btn-sm"
                        href="'. route('userunblock', $user->id) .'">Unblock</a>';
                    }
                    else {
                        $action = '<a class="m-1 btn btn-danger btn-sm"
                        href="'. route('userublock', $user->id) .'">Block</a>';
                    }
                }
                if (auth('admin')->user()->hasPermissionTo('muser-access-wallet', 'admin')) {
                    $action .= '<a class="m-1 btn btn-info btn-sm" href="'. route('userwallet', $user->id) .'">See Wallet</a>';
                }
                if (auth('admin')->user()->hasPermissionTo('muser-credit-debit', 'admin')) {
                    $action .= '<a href="#" data-toggle="modal" data-target="#topupModal'. $user->id .'" class="m-1 btn btn-dark btn-xs">Topup</a>';
                }
                if (auth('admin')->user()->hasPermissionTo('muser-delete', 'admin')) {
                    $action .= '<a href="#" data-toggle="modal" data-target="#deleteModal'. $user->id .'" class="m-1 btn btn-danger btn-xs">Delete</a>';
                }
                if (auth('admin')->user()->hasPermissionTo('muser-edit', 'admin')) {
                    $action .= '<a href="#" data-toggle="modal" data-target="#edituser'. $user->id .'" class="m-1 btn btn-secondary btn-xs">Edit</a>';
                }
                if(count($user->accounts()) > 1) {
                    $action .= ' <a href="#" data-toggle="modal" data-target="#liveaccounts'. $user->id . '" class="m-1 btn btn-danger btn-xs">Delete
                    Accounts</a>';
                }
                if (auth('admin')->user()->hasPermissionTo('muser-messageall', 'admin')) {
                    $action .= '<a href="#" data-toggle="modal" data-target="#sendmailtooneuserModal'. $user->id .'" class="m-1 btn btn-info btn-xs">Send Message</a>';
                }
                if (auth('admin')->user()->hasPermissionTo('muser-access-account', 'admin')) {
                    $action .= '<a href="#" data-toggle="modal"
                    data-target="#switchuserModal'. $user->id .'" class="m-2 btn btn-success btn-xs">Get access</a>';
                }

                $action .= view('admin.users_actions', compact('user'))->render();

                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);

            return $fdata;
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'Answer' => 'same:Captcha_Result',
        ]);

        $thisid = DB::table('users')->insertGetId(
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'ref_by' => Auth::user()->id,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        //assign referal link to user
        $site_address = Setting::getValue('site_address');

        User::where('id', $thisid)
            ->update([
                'ref_link' => $site_address . '/ref/' . $thisid,
            ]);
        return redirect()->back()
            ->with('message', 'User Registered Sucessful!');
    }


    // update users info
    public function update(Request $request)
    {
        User::where('id', $request['user_id'])
            ->update([
                'name' => $request->first_name . ' ' . $request->last_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'town' => $request->town,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'country_id' => $request->country,
                'ref_link' => $request['ref_link'],
            ]);
        return redirect()->back()
            ->with('message', 'User updated Successful!');
    }


    // Reset Password
    public function resetpswd(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
                'password' => Hash::make('user01236'),
            ]);
        return redirect()->route('manageusers')
            ->with('message', 'Password has been reset to default');
    }


    // Delete user
    public function destroy(Request $request, $id)
    {
        //delete the user's withdrawals and deposits
        $deposits = Deposit::where('user', $id)->get();
        if (!empty($deposits)) {
            foreach ($deposits as $deposit) {
                Deposit::where('id', $deposit->id)->delete();
            }
        }

        $withdrawals = Withdrawal::where('user', $id)->get();
        if (!empty($withdrawals)) {
            foreach ($withdrawals as $withdrawals) {
                Withdrawal::where('id', $withdrawals->id)->delete();
            }
        }

        User::where('id', $id)->delete();
        return redirect()->route('manageusers')
            ->with('message', 'User has been deleted!');
    }


    public function dellaccounts(Request $request, $id)
    {
        $mt5 = Mt5Details::find($id);

        if (!isset($mt5)) {
            return redirect()->back()
                ->with('message', 'Account not found!');
        }

        // check and update live account balances
        $this->setServerConfig('live');

        // initialize the mt5 api
        $api = new LaravelMt5();

        // delete the mt5 account
        try {
            $data = $api->deleteUser($mt5->login);
        } catch (Exception $e) {
            return redirect()->back()
                ->with('message', 'Sorry an error occured, please contact admin with this error message: ' . $e->getMessage());
        }

        $mt5->delete();

        return redirect()->back()
            ->with('message', 'Account successfully deleted!');
    }


    public function userwallet($id)
    {
        $user = User::where('id', $id)->first();

        // update user accounts
        $this->updateaccounts($user);

        //sum total deposited
        $total_deposited = DB::table('deposits')->select(DB::raw("SUM(amount) as total"))->where('user', $id)->where('status', 'Processed')->get();

        return view('admin.user_wallet')
            ->with(array(
                'ref_bonus' => $user->ref_bonus,
                'deposited' => $total_deposited['total'],
                'bonus' => $user->totalBonus(),
                'account_bal' => $user->totalBalance(),
                'user' => $user->name,
                'title' => 'User Profile',
            ));
    }


    // Access users account
    public function switchtouser(Request $request, $id)
    {
        $admin = auth('admin')->user();
        $user = User::where('id', $id)->first();

        //Byeppass 2FA
        $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(15)->toDateTimeString();
        $user->save();
        Auth::guard('admin')->login($admin, true);
        Auth::guard('web')->login($user, true);
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('dashboard')
            ->with('message', "You are logged in as $user->name !");
    }


    // Send Mail to all users
    public function sendmailtoall(Request $request)
    {
        $site_name = Setting::getValue('site_name');

        //send email notification
        $objDemo = new \stdClass();
        $objDemo->message =  "\r Hello, \r \n"
            . "\r $request->message \r\n";
        $objDemo->sender = $site_name;
        $objDemo->date = Carbon::Now();
        $objDemo->subject = "$site_name Notification";

        Mail::mailer('smtp')->bcc(User::all())->send(new NewNotification($objDemo));

        return redirect()->back()->with('message', 'Your message was sent successful!');
    }


    // Send mail to one user
    public function sendmailtooneuser(Request $request)
    {
        $site_name = Setting::getValue('site_name');

        $mailer = 'smtp';

        //send email notification
        $mailduser = User::where('id', $request->user_id)->first();
        $objDemo = new \stdClass();
        $objDemo->message = "\r Hello $mailduser->name, \r \n"
            . "\r $request->message \r\n";
        $objDemo->sender = $site_name;
        $objDemo->date = Carbon::Now();
        $objDemo->subject = "$site_name Notification";

        Mail::mailer($mailer)->bcc($mailduser->email)->send(new NewNotification($objDemo));
        return redirect()->back()->with('message', 'Your message was sent successful!');
    }


    // Manually Add Trading History to Users Route
    public function addHistory(Request $request)
    {
        $history = TpTransaction::create([
            'user' => $request->user_id,
            'purpse' => $request->purpose,
            'amount' => $request->amount,
            'type' => $request->type,
        ]);
        $user = User::where('id', $request->user_id)->first();
        // $user_bal = $user->account_bal;
        // if (isset($request['amount']) > 0) {
        //     User::where('id', $request->user_id)
        //         ->update([
        //             'account_bal' => $user_bal + $request->amount,
        //         ]);
        // }
        // $user_roi = $user->roi;
        // if (isset($request['type']) == "ROI") {
        //     User::where('id', $request->user_id)
        //         ->update([
        //             'roi' => $user_roi + $request->amount,
        //         ]);
        // }

        return redirect()->back()
            ->with('message', 'Action Sucessful!');
    }


    // Clear user Account
    public function clearacct(Request $request, $id)
    {
        $deposits = Deposit::where('user', $id)->get();
        if (!empty($deposits)) {
            foreach ($deposits as $deposit) {
                Deposit::where('id', $deposit->id)->delete();
            }
        }

        $withdrawals = Withdrawal::where('user', $id)->get();
        if (!empty($withdrawals)) {
            foreach ($withdrawals as $withdrawals) {
                Withdrawal::where('id', $withdrawals->id)->delete();
            }
        }

        User::where('id', $id)
            ->update([
                'account_bal' => '0',
                'ref_bonus' => '0',
            ]);
        return redirect()->route('manageusers')
            ->with('message', 'Account cleared to $0.00');
    }


    // top up route
    public function topup(Request $request)
    {
        // switch the mt5 api to use live server
        $this->setServerConfig('live');

        $msg = 'Action Successful';
        $amt = $request->amount;

        if ($request->t_type == "Credit") {
            $data = ['status' => false];
            // get mt5 account in question
            $mt5 = Mt5Details::find($request->account_id);
            if (!$mt5)
                return redirect()->back()->with('message', 'MT5 account not found');

            if ($request->type == "Bonus") {
                $data = $this->performTransaction($mt5->login, $amt, Trade::DEAL_CREDIT);
                $mt5->bonus += $amt;
            } elseif ($request->type == "Balance") {
                $data = $this->performTransaction($mt5->login, $amt, Trade::DEAL_BALANCE);
                $mt5->balance += $amt;
            }

            if ($data['status'] == true) {
                // Create deposit record
                $this->saveRecord($request->user_id, $request->account_id, 'Express Credit', $request->amount, 'Deposit', 'Processed');

                // save transaction
                $this->saveTransaction($request->user_id, $request->amount, 'Express Credit', $request->type);

                $msg = 'The user\'s account has been successfully credited!';
                $mt5->save();
            } else {
                return redirect()->route('manageusers')
                    ->with('message', 'Sorry an error occured, report this to admin! ' . $data['msg']);
            }
        } elseif ($request->t_type == "Debit") {
            $data = ['status' => false];
            // get mt5 account in question
            $mt5 = Mt5Details::find($request->account_id);
            if (!$mt5)
                return redirect()->back()->with('message', 'MT5 account not found');

            if ($request->type == "Bonus") {
                $data = $this->performTransaction($mt5->login, -$amt, Trade::DEAL_CREDIT);
                $mt5->bonus -= $amt;
            } elseif ($request->type == "Balance") {
                $data = $this->performTransaction($mt5->login, -$amt, Trade::DEAL_BALANCE);
                $mt5->balance -= $amt;
            }

            if ($data['status']) {
                // create withdrawal record
                $this->saveRecord($request->user_id, $request->account_id, 'Express Debit', $amt, 'Withdrawal', 'Processed');

                // save transaction
                $this->saveTransaction($request->user_id, $amt, 'Express Debit', $request->type);

                $msg = 'The user\'s account has been successfully debited!';
                $mt5->save();
            } else {
                return redirect()->route('manageusers')
                    ->with('message', 'Sorry an error occured, report this to admin! ' . $data['msg']);
            }
        }

        return redirect()->route('manageusers')
            ->with('message', $msg);
    }


    // accept KYC route
    public function acceptkyc($id)
    {
        //update user
        User::where('id', $id)
            ->update([
                'account_verify' => 'Verified',
                'docs_verified_date' => Carbon::Now(),
            ]);

        return redirect()->back()
            ->with('message', 'Action Sucessful!');
    }


    // reject KYC route
    public function rejectkyc($id)
    {
        //update user
        User::where('id', $id)
            ->update([
                'account_verify' => 'Rejected',
                'id_card' => NULL,
                'id_card_back' => NULL,
                'passport' => NULL,
                'address_document' => NULL,
                'docs_verified_date' => NULL,
                'docs_uploaded_date' => NULL
            ]);

        return redirect()->back()
            ->with('message', 'Rejected KYC Sucessfully!');
    }


    // reset KYC route
    public function resetkyc($id)
    {
        //update user
        $user = User::where('id', $id)
            ->update([
                'account_verify' => '',
                'id_card' => NULL,
                'id_card_back' => NULL,
                'passport' => NULL,
                'address_document' => NULL,
                'docs_verified_date' => NULL,
                'docs_uploaded_date' => NULL
            ]);

        return redirect()->back()
            ->with('message', 'Reseted KYC Sucessfully!');
    }

    // block user
    public function ublock($id)
    {
        User::where('id', $id)
            ->update([
                'status' => 'blocked',
            ]);
        return redirect()->route('manageusers')
            ->with('message', 'Action Sucessful!');
    }


    // unblock user
    public function unblock($id)
    {
        User::where('id', $id)
            ->update([
                'status' => 'active',
            ]);
        return redirect()->route('manageusers')
            ->with('message', 'Action Sucessful!');
    }


    // accept KYC route
    public function changestyle(Request $request)
    {
        if (isset($request['style']) and $request['style'] == 'true') {
            $dashboard_style = "dark";
        } else {
            $dashboard_style = "light";
        }
        //change dashboard style
        Admin::where('id', Auth('admin')->User()->id)
            ->update([
                'dashboard_style' => $dashboard_style,
            ]);
        return response()->json(['success' => 'Changed']);
    }
}