<?php
namespace DebitCardsAPI;

use DebitCardsAPI\Interfaces\APIInterface;

class Cards{
    public function __construct(
        private APIInterface $api
    ){}
    
    public function getCardInfo(int $id):array{
        return $this->api->request(HTTPMethod::GET,"/cards/{$id}");
    }

    public function getCardBalance(int $id):array{
        return $this->api->request(HTTPMethod::GET,"/cards/{$id}/balance");
    }

    public function getCardPin(int $id):array{
        return $this->api->request(HTTPMethod::GET,"/cards/{$id}/pin");
    }

    public function getCardHistory(int $id):array{
        return $this->api->request(HTTPMethod::GET,"/cards/{$id}/history");
    }

    public function createCard(array $data):array{
        return $this->api->request(HTTPMethod::POST,"/cards/create",$data);
    }

    public function activateCard(int $id):array{
        return $this->api->request(HTTPMethod::POST,"/cards/{$id}/activate");
    }

    public function deactivateCard(int $id):array{
        return $this->api->request(HTTPMethod::POST,"/cards/{$id}/deactivate");
    }

    public function changeActivationStatus(int $id, bool $status):array{
        if($status){
            return $this->activateCard($id);
        }else{
            return $this->deactivateCard($id);
        }
    }

    public function updateCardPin(int $id, array $data):array{
        return $this->api->request(HTTPMethod::POST,"/cards/${id}/update",$data);
    }

    public function loadCard(int $id, array $data):array{
        return $this->api->request(HTTPMethod::POST,"/cards/${id}/load",$data);
    }
}