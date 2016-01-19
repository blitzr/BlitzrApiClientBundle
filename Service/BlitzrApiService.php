<?php

namespace Blitzr\ApiClientBundle\Service;

use Blitzr\BlitzrClient;

class BlitzrApiService
{
    private $apiKey;
    private $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new BlitzrClient($apiKey);
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getArtist($slug = null, $uuid = null, $extras = [], $extras_limit = null)
    {
        return $this->client->getArtist($slug, $uuid, $extras, $extras_limit);
    }

}
