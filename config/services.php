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
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'twitter' => [
		'client_id'=>'8BjjqUkMrb6n5GWNBOJLSPPm3',
		'client_secret'=>'TtrEJCa8dWrZHkLKCU6NLUpY8wc4OEsipEDRfgAxAKcLLYNwWf',
		'redirect' => 'http://localhost:8000/twitterCallBack'
    ],
    'facebook' => [
		'client_id'=>'498803233853354',
		'client_secret'=>'1ca8732555d066fcfa7d269e15b70558',
		'redirect' => 'http://wedsetgo.zestminds.com:8000/facebookCallBack'
    ]

];
