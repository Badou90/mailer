<?php

namespace Amurnet\Mailer\Providers;

use Illuminate\Support\ServiceProvider;
use Amurnet\Mailer\Contracts\MailerContract;
use Amurnet\Mailer\Commands\SendMail;
use Amurnet\Mailer\Managers\MailerManager;

class MailerServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('mailer.manager', function($app) {
            return new MailerManager($app);
        });

        $this->app->bind(MailerContract::class, function($app) {
            $manager = $app->make('mailer.manager');
            return $manager->driver();
        });
    }

    public function boot()
    {
        $configPath = __DIR__ . '/../../config/mailer.php';
        $this->publishes([$configPath => config_path('mailer.php')], 'config');

        $viewsPath = __DIR__ . '/../../views';
        $this->loadViewsFrom($viewsPath, 'mailer');
        $this->publishes([$viewsPath => resource_path('views/vendor/mailer')], 'views');

        $this->commands(SendMail::class);
    }
}
