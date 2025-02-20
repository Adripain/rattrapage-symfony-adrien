<?php

namespace App\Entity;

class Product
{
    private int $id;
    private string $category;
    private string $num;
    private float $price;

    public function __construct(int $id, string $category, string $num, float $price)
    {
        $this->id = $id;
        $this->category = $category;
        $this->num = $num;
        $this->price = $price;
    }

    public function getId(): int { return $this->id; }
    public function getCategory(): string { return $this->category; }
    public function getNum(): string { return $this->num; }
    public function getPrice(): float { return $this->price; }
}
