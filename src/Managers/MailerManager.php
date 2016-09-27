<?php

namespace Amurnet\Mailer\Managers;

use Illuminate\Support\Manager;
use Illuminate\Contracts\Contract;

class MailerManager extends Manager {

    public function getDefaultDriver()
    {
        return $this->app['config']['mailer.provider'];
    }

    public function createMailerLiteDriver()
    {
        return new \Amurnet\Mailer\Adapters\MailerLite($this->app['config']['mailer.providers.mailerlite']);
    }

    public function createMailigenDriver()
    {

    }
}
