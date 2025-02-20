<?php

namespace App\Repository;

use App\Entity\Product;

class ProductRepository
{
    private string $file = __DIR__ . '/../../data/products.json';

    public function findAll(): array
    {
        if (!file_exists($this->file)) return [];
        return json_decode(file_get_contents($this->file), true) ?? [];
    }

    public function save(Product $product): void
    {
        $products = $this->findAll();
        $products[] = [
            'id' => $product->getId(),
            'category' => $product->getCategory(),
            'num' => $product->getNum(),
            'price' => $product->getPrice(),
        ];
        file_put_contents($this->file, json_encode($products, JSON_PRETTY_PRINT));
    }
}
