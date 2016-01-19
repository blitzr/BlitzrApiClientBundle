<?php

namespace Blitzr\ApiClientBundle\Service;

class BlitzrApiService
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }
}
