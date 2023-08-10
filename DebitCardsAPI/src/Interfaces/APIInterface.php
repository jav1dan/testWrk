<?php
namespace DebitCardsAPI\Interfaces;

use DebitCardsAPI\Enums\HTTPMethod;

/**
 * Interface, representing API.
*/
interface APIInterface {
    /**
     * Method, that makes request to API.
     * 
     * @param HTTPMethod $method HTTP method.
     * @param string $endpoint API endpoint.
     * @param array $data Data to send.
     * 
     * @return array Response from API.
    */
    public function request(HTTPMethod $method, string $endpoint, array $data = []): array;
}