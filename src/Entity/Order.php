<?php

namespace App\Entity;

class Order
{
    private int $id;
    private array $products;
    private string $phoneNumber;

    public function __construct(int $id, array $products, string $phoneNumber)
    {
        $this->id = $id;
        $this->products = $products;
        $this->phoneNumber = $phoneNumber;
    }

    public function getId(): int { return $this->id; }
    public function getProducts(): array { return $this->products; }
    public function getPhoneNumber(): string { return $this->phoneNumber; }
}
