<?php

namespace Amurnet\Mailer\Contracts;

interface MailerContract {
    public function sendMail();
    public function addUserToGroup($user);
}
