<?php

namespace App\Listeners;

use App\Models\Trader7;

use App\Libraries\MobiusTrader;


class UpdateAccounts
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Handle the event.
     *
     * @param $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        // return for admins
        if (strpos(strtolower(get_class($user)), 'admin') > -1)
            return;

        // Get user Trader7 accounts
        $liveLogins = $user->accounts();
        $demoLogins = $user->demoaccounts();

        // initialize the Trader7 api
        $api = new MobiusTrader();

        foreach ($liveLogins as $acc) {
            $resp = $api->money_info($acc->number);
            if($resp['status'] == MobiusTrader::STATUS_OK) {
                Trader7::where('id', $acc->id)
                    ->update([
                        'balance' => $resp['Balance'],
                        'bonus' => $resp['Bonus'],
                    ]);
            }
        }

        // update demo account balances
        foreach ($demoLogins as $acc) {
            $resp = $api->money_info($acc->number);
            if($resp['status'] == MobiusTrader::STATUS_OK) {
                Trader7::where('id', $acc->id)
                    ->update([
                        'balance' => $resp['Balance'],
                        'bonus' => $resp['Bonus'],
                    ]);
            }
        }
    }

}
