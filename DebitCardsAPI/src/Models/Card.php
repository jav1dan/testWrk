<?php

namespace DebitCardsAPI\Models;

use DebitCardsAPI\Interfaces\ObjectToArrayInterface;

/**
 * Model, representing card.
*/
class Card implements ObjectToArrayInterface{
    public function __construct(
        public int $id,
        public string $first_name,
        public string $last_name,
        public string $address,
        public string $city,
        public int $country_id,
        public string $phone,
        public string $currency,
        public float $balance,
        public int $pin,
        public string $status,
    ){}


    public function asArray():array{
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'city' => $this->city,
            'country_id' => $this->country_id,
            'phone' => $this->phone,
            'currency' => $this->currency,
            'balance' => $this->balance,
            'pin' => $this->pin,
            'status' => $this->status
        ];
    }
    /**
     * Validate card.
     * 
     * @param Card $card Card to validate.
     * 
     * @return bool True if card is valid, false otherwise.
     */
    public static function validate(Card $card):bool{
        $valid = !empty($card->id) &&
            !empty($card->first_name) &&
            !empty($card->last_name) &&
            !empty($card->address) &&
            !empty($card->city) &&
            !empty($card->country_id) &&
            !empty($card->phone) &&
            !empty($card->currency) &&
            !empty($card->balance) &&
            !empty($card->pin) &&
            in_array($card->status,['active','blocked']);
        

            $valid = $valid && Country::validate($card->country_id);
            //We can write there some validations for each field, but I think it's not necessary for this task.
            return $valid;
    }



}