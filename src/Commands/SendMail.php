<?php

namespace Amurnet\Mailer\Commands;

use Illuminate\Console\Command;
use Amurnet\Mailer\Contracts\MailerContract;

class SendMail extends Command {

    /**
     * Console command signature
     * @var string
     */
    protected $signature = 'mailer:start {usersbase?}';

    /**
     * Console command description
     * @var string
     */
    protected $description = 'Start email distribution';

    /**
     * Mailer instance
     * @var MailerContract
     */
    protected $mailer;

    /**
     * Mailer command constructor
     * @param MailerContract $mailer mailer adapter instance
     */
    public function __construct(MailerContract $mailer)
    {
        parent::__construct();
        $this->mailer = $mailer;
    }

    /**
     * Handle email delivery
     * @return [type] [description]
     */
    public function handle()
    {
        $this->mailer->send();
    }
}
