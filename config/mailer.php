<?php

return [
    /**
     * Current using provider
     */
    'provider' => env('MAILER_PROVIDER', 'MailerLite'),

    /**
     * Template for email
     */
    'htmlTemplate' => 'mailer::newsletter',

    /**
     * Data sources injected in mail html template
     */
    'dataSource' => '',

    /**
     * Providers list options
     */
    'providers' => [
        'MailerLite' => [
            'apiKey' => 'f32b109759b3f5a48c6c9d75b50f6515',
            'apiUrl' => 'https://api.mailerlite.com/api/v2/',
            'groups' => '',
            'from' => '',
            'from_name' => '',
            'subject' => '',
            'plainText' => '',
        ],

        'Mailigen' => [
            'apiKey' => '',
            'apiUrl' => '',
        ],
    ],
];
