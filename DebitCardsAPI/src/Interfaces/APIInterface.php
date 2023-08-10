<?php
namespace DebitCardsAPI\Interfaces;

enum HTTPMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
}

interface APIInterface {
    public function request(HTTPMethod $method, string $endpoint, array $data = []): array;
}