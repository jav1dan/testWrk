<?php
namespace DebitCardsAPI;

use DebitCardsAPI\Interfaces\APIInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class API implements APIInterface {
    private Client $client;

    public function __construct(
        private readonly string $authKey,
        private readonly string $baseUrl
    ){
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => $this->authKey
            ]
        ]);
    }

    public function request(HTTPMethod $method, string $endpoint, array $data = []): array {
        try {
            $response = $this->client->request($method, $endpoint, [
                'json' => $data
            ]);
            return json_decode($response->getBody(),true);
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
