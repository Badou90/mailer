<?php

namespace Amurnet\Mailer\Adapters;

use Amurnet\Mailer\Contracts\MailerContract;
use Amurnet\Mailer\Exceptions\ApiKeyIsEmptyException;

class MailerLite implements MailerContract {

    /**
     * Api key
     * @var string
     */
    protected $apiKey;

    /**
     * Constructor for MailerLite adapter
     * @param string $apiKey api key for mailerlite service
     */
    public function __construct(array $config)
    {
        if(is_null($config['apiKey']))
            throw new ApiKeyIsEmptyException('Api key is not provided');

        $this->apiKey = $config['apiKey'];
    }

    /**
     * Mail sender
     * @return [type] [description]
     */
    public function send()
    {
        echo 'MailerLite mail is sent to users!';
    }


    public function getUsersList()
    {

    }
}
