<?php
namespace DebitCardsAPI;

use Dotenv\Dotenv;
/**
 * Class, representing DebitCards API.
 */
class DebitCards {

    public Countries $countries;
    public Cards $cards;

    /**
     * DebitCards constructor
     * 
     */
    public function __construct(){
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();

        $authKey = $_ENV['AUTH_KEY'];
        $baseUrl = $_ENV['BASE_URL'];

        $api = new API($authKey, $baseUrl);

        $this->countries = new Countries($api);
        $this->cards = new Cards($api);

    }
}