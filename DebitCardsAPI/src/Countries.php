<?php
namespace DebitCardsAPI;

use DebitCardsAPI\Interfaces\APIInterface;
enum APIEndpoint:string {
    case COUNTRIES = '/countries';
    case COUNTRY_SINGLE = '/countries/';
}
class Countries {
    public function __construct(
        private APIInterface $api
    ){}

    public function getAll():array{
        return $this->api->request(HTTPMethod::GET, APIEndpoint::COUNTRIES);
    }

    public function get(int $id):array{
        return $this->api->request(HTTPMethod::GET, APIEndpoint::COUNTRY_SINGLE . $id);
    }
}