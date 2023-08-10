<?php
namespace DebitCardsAPI;

use DebitCardsAPI\Interfaces\APIInterface;
use DebitCardsAPI\Enums\HTTPMethod;
use DebitCardsAPI\Models\Card;

/**
*
*   Class for interacting with related to debit-cards API.
*/
class Cards{

    /**
     * Cards constructor
     * 
     * @param APIInterface $api API instance.
     */
    public function __construct(
        private APIInterface $api
    ){}


    private function cardMapper(array $data): Card{
        return new Card(
            id: $data['id'],
            first_name: $data['first_name'],
            last_name: $data['last_name'],
            address: $data['address'],
            city: $data['city'],
            country_id: $data['country_id'],
            phone: $data['phone'],
            currency: $data['currency'],
            balance: $data['balance'],
            pin: $data['pin'],
            status: $data['status']
        );
    }



    /**
     * Retrive information about a card.
     * 
     * @param int $id Card id.
     * 
     * @return Card Card information.
     */
    public function getCardInfo(int $id):array{
        $data = $this->api->request(HTTPMethod::GET,"/cards/{$id}");

        return $this->cardMapper($data);
    }


    /**
     * Retrive card balance.
     * 
     * @param int $id Card id.
     * 
     * @return float Card balance.
     */
    public function getCardBalance(int $id):array{
        $data = $this->api->request(HTTPMethod::GET,"/cards/{$id}/balance");
        return (float)$data['balance'];
    }

    /**
     * Retrive card pin.
     * 
     * @param int $id Card id.
     * 
     * @return int Card pin.
     * 
     */
    public function getCardPin(int $id):array{
        $data = $this->api->request(HTTPMethod::GET,"/cards/{$id}/pin");
        return (int)$data['pin'];
    }


    /**
     * Retrive card history.
     * 
     * @param int $id Card id.
     * 
     * @return array Card history.
     */
    public function getCardHistory(int $id):array{
        return $this->api->request(HTTPMethod::GET,"/cards/{$id}/history");
    }


    /**
     * Create a card.
     * 
     * @param array $data Card data.
     * 
     * @return array Card info.
     */
    public function createCard(Card $card):array{
        return $this->api->request(HTTPMethod::POST,"/cards/create",$card->asArray());
    }


    /**
     * Activate a card.
     * 
     * @param int $id Card id.
     * 
     * @return array Card Activation Status
     */
    public function activateCard(int $id):array{
        return $this->api->request(HTTPMethod::POST,"/cards/{$id}/activate");
    }

    
    /**
     * Deactivate a card.
     * 
     * @param int $id Card id.
     * 
     * @return array Card Activation Status
     */
    public function deactivateCard(int $id):array{
        return $this->api->request(HTTPMethod::POST,"/cards/{$id}/deactivate");
    }

    /**
     * 
     * Change card activation status.
     * 
     * @param int $id Card id.
     * @param bool $status Card activation status.
     * 
     * @return array Card Activation Status
     */
    public function changeActivationStatus(int $id, bool $status):array{
        if($status){
            return $this->activateCard($id);
        }else{
            return $this->deactivateCard($id);
        }
    }

    /**
     * Update card pin.
     * 
     * @param int $id Card id.
     * @param array $data Card data.
     * 
     * @return array Card info.
     */
    public function updateCardPin(int $id, array $data):array{
        return $this->api->request(HTTPMethod::POST,"/cards/${id}/update",$data);
    }

    /**
     * Load card.
     * 
     * @param int $id Card id.
     * @param float $amount Amount to load.
     * 
     * @return array Card info.
     */
    public function loadCard(int $id, float $amount):array{
        return $this->api->request(HTTPMethod::POST,"/cards/${id}/load",['amount'=>$amount]);
    }
}