<?php

namespace App\Entity;

use ApiPlatform\Metadata\GraphQl\Argument;
use Symfony\Component\Validator\Constraints as Assert;

class AuthorInput
{
    #[Argument] 
    public ?string $id = null; //ID is optional (null for create, required for update) and Accepts an IRI like "/api/authors/1" 

    #[Argument]
    #[Assert\NotBlank]
    public string $firstName;

    #[Argument]
    #[Assert\NotBlank]
    public string $lastName;
}

