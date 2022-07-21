<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Trader7;
use App\Models\TpTransaction;
use App\Models\Withdrawal;

use App\Libraries\MobiusTrader;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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


    protected function performTransaction($cur, $actNum, $amt, $paySysCode, $purse, $type, $account='balance')
    {
        $m7 = new MobiusTrader(config('mobius'));

        $resp = ['status' => false];

        if($type == 'deposit') {
            if($account == 'balance')
                $resp = $m7->funds_deposit($cur, (int)$actNum, $m7->deposit_to_int($cur, (int)$amt), $paySysCode, $purse);
            elseif($account == 'bonus')
                $resp = $m7->bonus_add((int)$actNum, $m7->deposit_to_int($cur, (int)$amt), $purse);
            else
                $resp = $m7->credit_add((int)$actNum, $m7->deposit_to_int($cur, (int)$amt), $purse);
        } else {
            $resp = $m7->balance_add($cur, (int)$actNum, -$m7->deposit_to_int($cur, (int)$amt), $paySysCode, $purse);
        }

        return $resp;
    }


    protected function saveRecord($user_id, $t7_id, $method, $amt, $type, $status, $proof = null)
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
        $record->account_id = $t7_id;
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
        // initialize the Trader7 m7
        $m7 = new MobiusTrader(config('mobius'));

        // Get user Trader7 accounts
        $actcs = $user->accounts();

        foreach ($actcs as $acc) {
            try {
                $resp = $m7->money_info($acc->number);
                Trader7::where('id', $acc->id)
                    ->update([
                        'balance' => $resp['Balance'],
                        'bonus' => $resp['Bonus'],
                        'credit' => $resp['Credit'],
                    ]);
                return ['status' => true, 'data' => $resp];
            } catch (Exception $e) {
                return ['status' => false, 'msg' => 'An error occurred, contact support'];
            }
        }
    }
}