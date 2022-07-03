<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Mt5Details;
use App\Mail\NewNotification;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikh\PhpMeta\Entities\User;
use Tarikh\PhpMeta\Entities\Trade;

use Carbon\Carbon;



class Mt5Controller extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    // serves users demo accounts
    public function demoaccounts()
    {
        $user_id = Auth::user()->id;
        $accounts = Mt5Details::where('type', 'demo')->where('client_id', $user_id)->get();
        return view('user.demoaccounts', [
            'title' => 'Demo Accounts',
            'accounts' => $accounts
        ]);
    }


    // serves users live accounts
    public function liveaccounts()
    {
        $user_id = Auth::user()->id;
        $accounts = Mt5Details::where('type', 'live')->where('client_id', $user_id)->get();
        return view('user.liveaccounts', [
            'title' => 'Live Accounts',
            'accounts' => $accounts
        ]);
    }


    public function addmt5account(Request $request)
    {
        // do validation of input first
        Validator::make($request->all(), [
            'leverage' => ['required', 'string',],
            // 'balance' => ['requiredif:type,demo', 'string',],
            // 'password' => ['required', 'string'],
            // 'investor_password' => ['required', 'string',],
            'type' => ['required', 'string',],
        ])->validate();

        // get logged in user
        // some info will come from their registration
        $oUser = auth()->user();

        // set the details for the mt5 account creation
        $user = new User();

        $this->setServerConfig('demo');
        $amt = 100000;
        $type = 'demo';
        $server = 'AxesPrimeLtd-Demo';
        $user->setGroup(env('MT5_SERVER_GROUP', 'demo\axes'));

        if ($request->type !== 'demo') {
            $this->setServerConfig('live');
            $type = 'live';
            $amt = 0;
            $user->setGroup(env('MT5_LIVE_SERVER_GROUP', 'real\axes\1'));
            $server = 'AxesPrimeLtd-Live';
        }

        $password = $this->randomPassword();
        $phone_password = "phone_$password";
        $investor_password = "investor_$password";

        $user->setName($oUser->name);
        $user->setEmail($oUser->email);
        $user->setLeverage($request->leverage);
        $user->setPhone($oUser->phone);
        $user->setAddress($oUser->address);
        $user->setCity($oUser->town);
        $user->setState($oUser->state);
        $user->setCountry($oUser->country->name);
        $user->setZipCode($oUser->zip_code);
        $user->setMainPassword($password);
        $user->setInvestorPassword($investor_password);
        $user->setPhonePassword($phone_password);

        // mt5 account creation
        $api = new LaravelMt5();
        try {
            $result = $api->createUser($user);
        } catch (Exception $e) {
            $request->session()->flash("message", $e->getMessage());
            return ["message" => $e->getMessage()];
        }

        // save the detials in the mt5 detials table
        $mt5Acc = new Mt5Details();
        $mt5Acc->client_id = $oUser->id;
        $mt5Acc->login = $result->getLogin() . '';
        $mt5Acc->password = $password;
        $mt5Acc->investor_password = $investor_password;
        $mt5Acc->phone_password = $phone_password;
        $mt5Acc->server = $server;
        $mt5Acc->currency = $request->currency;
        $mt5Acc->balance = $request->balance;
        $mt5Acc->status = 'active';
        $mt5Acc->leverage = $request->leverage;
        $mt5Acc->type = $type;
        $mt5Acc->balance = $amt;
        $mt5Acc->save();

        // do a deposit for demo accounts
        if ($request->type == 'demo' && $amt > 0) {
            $this->dodeposit($mt5Acc->login, $amt);
        }

        // send the user an email with the details of the new account
        $this->notifyuser($mt5Acc);

        $request->session()->flash("message", "Your new mt5 account has been created successfully. Check your email for the full account details. We are always at your service!");
        return ["message" => "Your new mt5 account has been created successfully. Check your email for the full account details. We are always at your service!"];
    }

    public function resetmt5password()
    {
    }


    public function demotopup(Request $request, $id)
    {
        $mt5Acc = Mt5Details::where('id', $id)->first();

        $this->setServerConfig('demo');

        // update the mt5 demo server
        $this->dodeposit($mt5Acc->login, 100000);

        // update the local record
        $mt5Acc->balance = (((int)$mt5Acc->balance) + 100000);
        $mt5Acc->save();

        return redirect()->back()
            ->with('message', 'Your MT5 Demo Account has been successfully topped up with another $100k!');
    }


    protected function dodeposit($login, $amt)
    {
        $this->setServerConfig('demo');

        $api = new LaravelMt5();
        $trade = new Trade();
        $trade->setLogin($login);
        $trade->setAmount($amt);
        $trade->setComment("Deposit");
        $trade->setType(Trade::DEAL_BALANCE);
        $api->trade($trade);
        return;
    }


    protected function notifyuser($mt5Acc)
    {
        $user = Auth::user();

        // send verification email
        $site_name = Setting::getValue('site_name');
        $objDemo = new \stdClass();
        $objDemo->message = "\r Hello $user->name, \r \n " .
            " \r This is to inform you that a new MT5 Account with details below have successfully registered on $site_name. \r \n " .
            "   \r  Login: $mt5Acc->login \r \n " .
            " \r Password: $mt5Acc->password \r \n " .
            "  \r  Server: $mt5Acc->server \r \n ";
        $objDemo->sender = "$site_name";
        $objDemo->date = Carbon::Now();
        $objDemo->subject = "Your new MT5 Account with Sky Gold Markets!";

        Mail::mailer('smtp')->bcc($user->email)->send(new NewNotification($objDemo));
    }


    protected function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_-';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 15; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}