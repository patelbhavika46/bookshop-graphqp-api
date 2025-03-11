<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use ApiPlatform\Metadata\GraphQl\Mutation;
use App\Repository\CustomerRepository;
use App\GraphQL\CustomerInput;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
#[ApiResource(
    graphQlOperations: [
        new QueryCollection(name: "item"), # Fetch singal customer by id
        new QueryCollection(name: "collection_query"), # Fetch all customers
        new Mutation(
            name: "create",               // Create Customer
            description: "Create a new customer", 
            input: CustomerInput::class,           // Input class for the mutation
            output: Customer::class,               // Output class (the Customer entity)
        ),
        new Mutation(
            name: "update",               // Update Customer by id 
            description: "Update a new customer",  
            input: CustomerInput::class,           // Input class for the mutation
            output: Customer::class,               // Output class (the Customer entity)
        ),
        new Mutation(
            name: "update",               // Update Author by id 
            description: "Update a customer",  
            input: AuthorInput::class,           // Input class for the mutation
            output: Author::class,               // Output class (the Author entity)
        ),
        new Mutation(
            name: "delete",
            description: "Delete a customer",
        ),
    ]

)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    /**
     * @var Collection<int, Purchase>
     */
    #[ORM\OneToMany(targetEntity: Purchase::class, mappedBy: 'customer')]
    private Collection $purchases;

    public function __construct()
    {
        $this->purchases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, Purchase>
     */
    public function getPurchases(): Collection
    {
        return $this->purchases;
    }

    public function addPurchase(Purchase $purchase): static
    {
        if (!$this->purchases->contains($purchase)) {
            $this->purchases->add($purchase);
            $purchase->setCustomer($this);
        }

        return $this;
    }

    public function removePurchase(Purchase $purchase): static
    {
        if ($this->purchases->removeElement($purchase)) {
            // set the owning side to null (unless already changed)
            if ($purchase->getCustomer() === $this) {
                $purchase->setCustomer(null);
            }
        }

        return $this;
    }
}
