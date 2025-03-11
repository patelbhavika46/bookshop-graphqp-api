<?php

namespace App\GraphQL;

use ApiPlatform\Metadata\GraphQl\Argument;

class AuthorInput
{
    #[Argument]
    public string $firstName;

    #[Argument]
    public string $lastName;
    
}
