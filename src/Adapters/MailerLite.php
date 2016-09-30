<?php

namespace Amurnet\Mailer\Adapters;

use Illuminate\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Amurnet\Mailer\Contracts\MailerContract;
use Amurnet\Mailer\Exceptions\ApiKeyIsEmptyException;
use Amurnet\Mailer\Exceptions\ApiUrlIsEmptyException;
use Amurnet\Mailer\Exceptions\GroupNotExistException;

class MailerLite implements MailerContract {

    /**
     * GuzzleHttp client
     * @var Client
     */
    protected $client;

    /**
     * Mailer adapter config
     * @var Array
     */
    protected $config;

    /**
     * Mail view
     * @var String
     */
    protected $htmlView;

    /**
     * Data source class name for mail template
     * @var String
     */
    protected $dataSource;

    /**
     * Constructor for MailerLite adapter
     * @param string $apiKey api key for mailerlite service
     */
    public function __construct(array $config, View $view, $dataSource = null)
    {
        if(is_null($config['apiKey']))
            throw new ApiKeyIsEmptyException('Api key is not provided');

        if(is_null($config['apiUrl']))
            throw new ApiUrlIsEmptyException('Api url is not provided');

        $this->config = $config;
        $this->htmlView = $view;
        $this->dataSource = $dataSource;
        $this->client = new Client(['headers' => ['X-MailerLite-ApiKey' => $config['apiKey']], 'base_uri' => $config['apiUrl']]);
    }

    /**
     * Create mail sending compain
     * @return void
     */
    public function createCampaigns()
    {
        $groups = $this->getGroupsList();

        // TODO add groups existense check (get groups from config and search them in mailerlite-provided groups list)
        $response = $this->client->request('POST', 'campaigns', [
            'form_params' => [
                'type' => 'regular',
                'subject' => $this->config['subject'],
                'from' => $this->config['from'],
                'from_name' => $this->config['from_name'],
                'groups' => $this->config['groups'],
            ],
        ]);

        return $this->checkResponse($response)->id;
    }

    /**
     * Add mail template to campaign
     * @param int $campagn_id id of selected campaign
     */
    public function addMailTemplateToCampaign($campagn_id)
    {
        $data = '';
        $response = $this->client->request('PUT', "campaigns/{$campagn_id}/content", [
            'form_params' => [
                'html' => $this->htmlView->with($data)->render(),
                'plain' => $this->config['plainText'],
            ],
        ]);

        $response = $this->checkResponse($response);
    }

    /**
     * Start mail sending compain
     * @return void
     */
    public function startCampaigns()
    {

    }

    /**
     * Get user groups list
     * @return array User groups list
     */
    public function getGroupsList()
    {
        $response = $this->client->request('GET', 'groups');
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Start mailer sending
     * @return void
     */
    public function sendMail()
    {
        // $data = 'test data';
        // dd($this->htmlView->with('data', $data)->render());

        $campaign_id = $this->createCampaigns();
        $this->addMailTemplateToCampaign($campaign_id);
        $this->startCampaigns();
    }

    /**
     * [checkResponse description]
     * @param  Response $response [description]
     * @return [type]             [description]
     */
    protected function checkResponse(Response $response)
    {
        $response = json_decode($response->getBody()->getContents());

        if(isset($response->error))
            throw new Exception("[{$response->error->code}] ".$response->error->message);

        return $response;
    }
}
