<?php

namespace Amurnet\Mailer\Adapters;

use Illuminate\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Amurnet\Mailer\Contracts\MailerContract;
use Amurnet\Mailer\Contracts\DataSourceContract;
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
     * Data model
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $dataModel;

    /**
     * Data for mail template
     * @var Collection
     */
    protected $dataSet;

    /**
     * Constructor for MailerLite adapter
     * @param string $apiKey api key for mailerlite service
     */
    public function __construct(array $config, View $view, DataSourceContract $dataModel = null)
    {
        if(is_null($config['apiKey']))
            throw new ApiKeyIsEmptyException('Api key is not provided');

        if(is_null($config['apiUrl']))
            throw new ApiUrlIsEmptyException('Api url is not provided');

        $this->config = $config;
        $this->htmlView = $view;
        $this->dataModel = $dataModel;
        $this->dataSet = $dataModel->getProvidedData();
        $this->client = new Client(['headers' => ['X-MailerLite-ApiKey' => $config['apiKey']], 'base_uri' => $config['apiUrl']]);
    }

    /**
     * Create mail sending compain
     * @return void
     */
    public function createCampaigns()
    {
        // TODO add groups existense check (get groups from config and search them in mailerlite-provided groups list)
        // $groups = $this->getGroupsList();

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
        $data = $this->dataSet;

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
    public function startCampaigns($campaign_id, $action = 'send')
    {
        $response = $this->client->request('POST', "campaigns/{$campaign_id}/actions/{$action}");

        $response = $this->checkResponse($response);
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
        $campaign_id = $this->createCampaigns();
        $this->addMailTemplateToCampaign($campaign_id);
        $this->startCampaigns($campaign_id);
    }

    /**
     * Check service response for errors
     * @param  Response $response response from service
     * @return Array              decoded response
     */
    protected function checkResponse(Response $response)
    {
        $response = json_decode($response->getBody()->getContents());

        if(isset($response->error))
            throw new Exception("[{$response->error->code}] ".$response->error->message);

        return $response;
    }
}
