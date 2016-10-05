# Mailer package for laravel framework

Use this package for mass mail sending

## Installation

Add `"amurnet/mailer": "^0.0.1"` line to your `composer.json` and the run `composer update`

Then add provider to list of your providers

    'providers' => [
        ...
        Amurnet\Mailer\Providers\MailerServiceProvider::class,
        ...
    ],

And run `php artisan vendor:publish` to publish views and config files

## Running mailer

Use `php artisan mailer:run` to start mailer, or use Laravel cron jobs to schedule it

## Adding new adapters

All new adapters must be registered in `MailerManager`, then you can change current adapter in config or .env file

## Overriding template

You can override default template by changing config option 'template' from config file

## Providing data sources

Right now package works only with one data source, which must implement `DataSourceContract`
