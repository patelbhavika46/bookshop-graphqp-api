<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use ApiPlatform\Metadata\GraphQl\Mutation;
use App\Repository\UserRepository;
use App\GraphQL\UserInput;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(
    graphQlOperations: [
        new QueryCollection(name: "collection_query"), # Fetch all users
        new Mutation(
            name: "create",               // Create Customer
            description: "Create a new user", 
            input: UserInput::class,           // Input class for the mutation
        ),
        new Mutation(
            name: "update",               // Update Customer by id 
            description: "Update a new user",  
            input: UserInput::class,           // Input class for the mutation
        ),
        new Mutation(
            name: "update",               // Update Author by id 
            description: "Update an user",  
            input: UserInput::class,           // Input class for the mutation
        ),
        new Mutation(
            name: "delete",
            description: "Delete an user",
        ),
    ]

)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatarUrl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(?string $avatarUrl): static
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }
}
