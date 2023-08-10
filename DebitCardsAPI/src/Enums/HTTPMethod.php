<?php

namespace DebitCardsAPI\Enums;

/**
 * Enum, representing HTTP methods.
*/
enum HTTPMethod: string
{
    /** This is for GET method */
    case GET = 'GET';

    /** This is for POST method */
    case POST = 'POST';
}
