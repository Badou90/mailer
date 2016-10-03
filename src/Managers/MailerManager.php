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
        $view = view($this->app['config']['mailer.htmlTemplate']);
        $dataSource = new $this->app['config']['mailer.dataSource'];
        return new \Amurnet\Mailer\Adapters\MailerLite($this->app['config']['mailer.providers.MailerLite'], $view, $dataSource);
    }

    public function createMailigenDriver()
    {

    }
}
