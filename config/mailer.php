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
    'dataSource' => \Kupon\Coupon::class,

    /**
     * Providers list options
     */
    'providers' => [
        'MailerLite' => [
            'apiKey' => 'f32b109759b3f5a48c6c9d75b50f6515',
            'apiUrl' => 'https://api.mailerlite.com/api/v2/',
            'groups' => [4745441],
            'from' => 'seo@amur.net',
            'from_name' => 'Amurnet',
            'subject' => 'Амурнет купоны',
            'plainText' => 'Test message, but you can\'t watch this on your device. You can {$unsubscribe} or open mail here: {$url}',
        ],

        'Mailigen' => [
            'apiKey' => '',
            'apiUrl' => '',
        ],
    ],
];
