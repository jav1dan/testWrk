<?php
namespace DebitCardsAPI;

use DebitCardsAPI\Interfaces\APIInterface;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


/*
    Class for interacting with API.
*/
class API implements APIInterface {

    /** @var Client Http client to make CURL requests. Instead of using CURL I decided to work with Guzzle, cause it's more flexible. */
    private Client $client;


    /**
     * Constructor for class.
     * 
     * @param string $authKey API Authorization key.
     * @param string $baseUrl API base url.
     */
    public function __construct(
        private readonly string $authKey,
        private readonly string $baseUrl
    ){
        //initialize client
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => $this->authKey
            ]
        ]);
    }


    /**
     * Method, that makes request to API, it is implementation for APIInterface
     * 
     * @param HTTPMethod $method HTTP method.
     * @param string $endpoint API endpoint.
     * @param array $data Data to send.
     * 
     * @return array Response from API.
     * 
     * @throws RequestException If request failed.
     */
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
