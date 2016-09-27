<?php

namespace Amurnet\Mailer\Contracts;

interface MailerContract {
    public function send();

    public function getUsersList();
}
