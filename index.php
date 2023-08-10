<?php
require 'vendor/autoload.php';

$debitCards_api = new DebitCardsAPI\DebitCards();

$pin_code = $debitCards_api->cards->getPin(123);

$params = [
    'pin' => $pin_code,
    'amount' => 100
];

$debit_card = $debitCards_api->cards->create($params);