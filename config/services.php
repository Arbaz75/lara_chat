<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => '',
        'secret' => '',
    ],

    'facebook' => [
            'client_id'     => '824953770951523',
            'client_secret' => 'ba4a86f5b64ac6e381e00d7b77f348e2',
            'redirect' => 'http://localhost:8081/lara_chat/public/account/facebook',
        ],
    'google' =>[
            'client_id'     => '386112289199-ntg1oi6vau864ald940vunrv6lmoh5hp.apps.googleusercontent.com',
            'client_secret' => '3Ztik3e8-zJxudYQ9qwYMA8F',
            'redirect' => 'http://localhost:8081/lara_chat/public/account',

    ],

];
