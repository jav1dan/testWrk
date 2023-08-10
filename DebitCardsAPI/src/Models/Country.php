<?php
namespace DebitCardsAPI\Models;

/**
 * Model, representing country.
*/
class Country  {
    public function __construct(
        public int $id,
        public string $code,
        public string $name
    ){}

    /**
     * Validate country.
     * 
     * @param Country $country Country to validate.
     * 
     * @return bool True if country is valid, false otherwise.
     */

    public static function validate(Country $country):bool{
        $valid = !empty($country->id) &&
            !empty($country->code) &&
            !empty($country->name);
        
            //We can write there some validations for each field, but I think it's not necessary for this task.
            return $valid;
    }
}