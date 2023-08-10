<?php
namespace DebitCardsAPI;

use DebitCardsAPI\Interfaces\APIInterface;
use DebitCardsAPI\Enums\HTTPMethod;
use DebitCardsAPI\Models\Country;

enum APIEndpoint:string {
    case COUNTRIES = '';
    case COUNTRY_SINGLE = '/countries/';
}
class Countries {

    /**
     * Countries constructor
     */
    public function __construct(
        private APIInterface $api
    ){}


    /**
     * Map data to Country model.
     */
    private function countryMapper(array $data): Country{
        return new Country(
            id: $data['id'],
            code: $data['code'],
            name: $data['name']
        );
    }


    /**
     * Retrive all countries.
     * 
     * @return array Array of countries.
     */
    public function getAll():array{
        $data = $this->api->request(HTTPMethod::GET, '/countries');
        $countries = [];
        foreach($data as $country){
            $countries[] = $this->countryMapper($country);
        }
        return $countries;
    }


    /**
     * Retrive all countries. This is a generator version of getAll method.
     * 
     * @return array Array of countries.
     * 
     */
    public function getAllGenerator():\Generator{
        $data = $this->api->request(HTTPMethod::GET, '/countries');
        foreach($data as $country){
            yield $this->countryMapper($country);
        }
    }


    /**
     * Retrive information about a country.
     */
    public function get(int $id):array{
        $data = $this->api->request(HTTPMethod::GET, '/countries/'.$id);
        return $this->countryMapper($data);
    }


}