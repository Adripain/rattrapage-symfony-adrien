<?php

namespace App\Entity;

class Order
{
    private int $id;
    private array $products;
    private string $date;
    private string $phoneNumber;

    public function __construct(int $id, array $products, string $date, string $phoneNumber)
    {
        $this->id = $id;
        $this->products = $products;
        $this->date = $date;
        $this->phoneNumber = $phoneNumber;
    }

    public function getId(): int { return $this->id; }
    public function getProducts(): array { return $this->products; }
    public function getDate(): string { return $this->date; }
    public function getPhoneNumber(): string { return $this->phoneNumber; }
}
