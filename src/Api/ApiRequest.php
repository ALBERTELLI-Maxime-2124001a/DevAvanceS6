<?php

namespace App\Api;

use Symfony\Component\HttpClient\HttpClient;

class ApiRequest
{
    private $client;
    public function __construct() {
        $this->client = HttpClient::create();
    }

    public function fetchGitHubInformation(String $url): array
    {
        $response = $this->client->request(
            'GET',
            $url
        );

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();

        return $content;
    }
}