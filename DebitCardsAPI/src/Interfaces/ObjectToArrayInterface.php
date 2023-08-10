<?php
namespace DebitCardsAPI\Interfaces;
/**
 * Interface, representing object, that can be converted to array.
 */
interface ObjectToArrayInterface {
    public function toArray():array;
}