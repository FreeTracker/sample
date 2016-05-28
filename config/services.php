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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\Models\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => 'afd0310abdb4bb630af3',
        'client_secret' => '75a16b64b4c6ea553be4a211815eb01d543847f3',
        'redirect' => 'http://project.loc/auth/github/callback',
    ],

    'vkontakte' => [
        'client_id' => '5318969',
        'client_secret' => '4P39oyzEfMDPFA4brZBS',
        'redirect' => 'http://sample/auth/callback/vk',
    ],
    
    'odnoklassniki' => [
        'client_id' => '1158952448',
        'client_secret' => '252E17EE13B083583260C017',
        'redirect' => 'https://project.loc/auth/callback/ok',
        'public' => 'CBAHDFBGEBABABABA',
    ],

    'mailru' => [
        'client_id' => env('MAILRU_ID'),
        'client_secret' => env('MAILRU_SECRET'),
        'redirect' => env('MAILRU_REDIRECT'),
    ],

    'yandex' => [
        'client_id' => '16c1a183b64944988b36fc319d054954',
        'client_secret' => '2fd0e22fcb9a45f892037eac5efaf686',
        'redirect' => 'http://project.loc/auth/callback/ya',
    ],
];
