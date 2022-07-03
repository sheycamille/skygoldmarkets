<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Mt5Details;
use App\Models\TpTransaction;
use App\Models\Withdrawal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Tarikh\PhpMeta\Entities\Trade;
use Tarikhagustia\LaravelMt5\LaravelMt5;

use Carbon\Carbon;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Skip enter account details
    public function skip_account(Request $request)
    {
        $request->session()->put('skip_account', 'skip account');
        return redirect()->route('dashboard');
    }


    // Controller self ref issue
    public function ref(Request $request, $id)
    {
        if (isset($id)) {
            $request->session()->flush();
            if (count(User::where('id', $id)->first()) == 1) {
                $request->session()->put('ref_by', $id);
            }
            return redirect()->route('register');
        }
    }


    public function referuser()
    {
        return view('includes.referuser')->with(array(
            'title' => 'Refer user',
        ));
    }


    public function checkdate()
    {
        $dt = Carbon::Now();

        if ($dt->isWeekday()) {
            return "This is a week day";
        } else {
            return "Today is Weekend";
        }
    }


    protected function generate_string($strength = 16, $input = null)
    {
        if ($input == null)
            $input = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }


    protected function setServerConfig($type)
    {
        if ($type == "demo") {
            config([
                'mt5.server' => env('MT5_SERVER_IP', '192.96.201.1'),
                'mt5.login' => env('MT5_SERVER_WEB_LOGIN', 1096),
                'mt5.password' => env('MT5_SERVER_WEB_PASSWORD', 'wqzbj5eo'),
            ]);
        } else {
            config([
                'mt5.server' => env('MT5_LIVE_SERVER_IP', '207.244.81.1'),
                'mt5.login' => env('MT5_LIVE_SERVER_WEB_LOGIN', 1187),
                'mt5.password' => env('MT5_LIVE_SERVER_WEB_PASSWORD', 'cmc8ttmv'),
            ]);
        }
    }


    protected function performTransaction($login, $amt, $operation = Trade::DEAL_BALANCE)
    {
        $api = new LaravelMt5();
        $trade = new Trade();
        $trade->setLogin($login);
        $trade->setAmount($amt);
        $trade->setComment("skygoldmarkets action");
        $trade->setType($operation);

        $ret = [];
        try {
            $data = $api->trade($trade);
            $ret = ['status' => true, 'data' => $data];
        } catch (Exception $e) {
            $ret = ['status' => false, 'msg' => $e->getMessage()];
            if($ret['msg'] == 'unknown error') $ret = ['status' => true, 'data' => $data];
        }

        return $ret;
    }


    protected function saveRecord($user_id, $mt5_id, $method, $amt, $type, $status, $proof = null)
    {
        if ($type == 'Deposit') {
            $record = new Deposit();
        } elseif ($type == 'Withdrawal') {
            $record = new Withdrawal();
        }

        $record->amount = $amt;
        $record->payment_mode = $method;
        $record->status = $status;
        if ($proof != NUll)
            $record->proof = $proof;
        $record->account_id = $mt5_id;
        $record->user = $user_id;
        $record->save();

        return;
    }


    protected function saveTransaction($user_id, $amt, $purpose, $type)
    {
        $user = Auth::user();
        // save transaction
        TpTransaction::create([
            'user' => $user_id,
            'purpose' => $purpose,
            'amount' => $amt,
            'type' => $type,
        ]);
    }


    protected function updateaccounts($user)
    {
        // initialize the mt5 api
        $api = new LaravelMt5();

        // check and update live account balances
        $this->setServerConfig('live');

        // Get user mt5 accounts
        $liveLogins = $user->accounts();
        // $demoLogins = $user->demoaccounts();

        foreach ($liveLogins as $acc) {
            try {
                $data = $api->getUser($acc->login);
                Mt5Details::where('id', $acc->id)
                    ->update([
                        'balance' => $data->Balance,
                        'bonus' => $data->Credit,
                    ]);
                return ['status' => true, 'data' => $data];
            } catch (Exception $e) {
                return ['status' => false, 'msg' => $e->getMessage()];
            }
        }
    }
}