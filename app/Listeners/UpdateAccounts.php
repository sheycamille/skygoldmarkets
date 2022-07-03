<?php

namespace App\Listeners;

use App\Models\Mt5Details;
use Exception;
use Illuminate\Auth\Events\Login;

use Tarikhagustia\LaravelMt5\Entities\User;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikhagustia\LaravelMt5\src\Lib\MTEnDealAction;


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

        // check and update live account balances
        $this->setServerConfig('live');

        // Get user mt5 accounts
        $liveLogins = $user->accounts();
        $demoLogins = $user->demoaccounts();

        // var_dump(config('mt5.server'));
        // echo ('<br><br>');
        foreach ($liveLogins as $acc) {
            try {
                // initialize the mt5 api
                $api = new LaravelMt5();

                // var_dump($acc->login);
                // echo ('<br><br>');
                $data = $api->getUser($acc->login);
                Mt5Details::where('id', $acc->id)
                    ->update([
                        'balance' => $data->Balance,
                        'bonus' => $data->Credit,
                    ]);
                // var_dump($data->Balance);
                // var_dump($data->Bonus);
                // echo ('<br><br>');
            } catch (Exception $e) {
                // var_dump($e->getMessage());
                // echo ('<br><br>');
            }
        }

        // update demo account balances
        // $this->setServerConfig('demo');

        // var_dump(config('mt5.server'));
        // echo ('<br><br>');
        // foreach ($demoLogins as $acc) {
        //     try {

        //         // initialize the mt5 api
        //         $api = new LaravelMt5();

        //         var_dump($acc->login);
        //         echo ('<br><br>');
        //         $data = $api->getUser($acc->login);
        //         Mt5Details::where('id', $acc->id)
        //             ->update([
        //                 'balance' => $data->Balance,
        //                 'bonus' => $data->Credit,
        //             ]);
        //         var_dump($data->Balance);
        //         var_dump($data->Bonus);
        //         echo ('<br><br>');
        //     } catch (Exception $e) {
        //         var_dump($e->getMessage());
        //         echo ('<br><br>');
        //     }
        // }
    }

    protected function setServerConfig($type)
    {
        if ($type == 'demo') {
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
}
