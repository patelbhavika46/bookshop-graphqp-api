<?php

namespace App\GraphQL;

use ApiPlatform\Metadata\GraphQl\Argument;
use Symfony\Component\Validator\Constraints as Assert;

class BookInput
{
    #[Argument] 
    public ?string $id = null; //ID is optional (null for create, required for update) and Accepts an IRI like "/api/books/1" 

    #[Argument]
    #[Assert\NotBlank]
    public string $isbn;

	#[Argument]
    #[Assert\NotBlank]
    public string $title;

    #[Argument]
    #[Assert\NotBlank]
    public string $summary;

    #[Argument]
    #[Assert\NotBlank]
    public string $price;
}
