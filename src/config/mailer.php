<?php

return [
    'provider' => env('MAILER_PROVIDER', 'MailerLite'),

    'providers' => [
        'mailerlite' => [
            'apiKey' => 'f32b109759b3f5a48c6c9d75b50f6515',
            'apiUrl' => 'https://api.mailerlite.com/api/v2/',
        ],

        'mailigen' => [
            'apiKey' => '',
            'apiUrl' => '',
        ],
    ],
];
