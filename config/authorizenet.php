<?php

return [

    /**
     * Public Key From ChargeMoney Dashboard
     *
     */
    'mid' => getenv('AUTHORIZENET_MERCHANT_LOGIN_ID'),
    'transaction_key' => getenv('AUTHORIZENET_MERCHANT_TRANSACTION_KEY'),
];
