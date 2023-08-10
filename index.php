<?php
require 'vendor/autoload.php';


$debitCards_api = new DebitCardsAPI\DebitCards();

$pin_code = $debitCards_api->cards->getPin(123);

$params = [
    'pin' => $pin_code,
    'amount' => 100
];

$card = new DebitCardsAPI\Models\Card(
    id: 123,
    first_name: 'John',
    last_name: 'Doe',
    address: 'Some address',
    city: 'Some city',
    country_id: 1,
    phone: '+123456789',
    currency: 'USD',
    balance: 100,
    pin: 1234,
    status: 'active'
);

$debit_card = $debitCards_api->cards->create($card);