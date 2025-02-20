<?php

namespace App\Repository;

use App\Entity\Order;

class OrderRepository
{
    private string $file = __DIR__ . '/../../data/orders.json';

    public function findAll(): array
    {
        if (!file_exists($this->file)) return [];
        return json_decode(file_get_contents($this->file), true) ?? [];
    }

    public function save(Order $order): void
    {
        $orders = $this->findAll();
        $orders[] = [
            'id' => $order->getId(),
            'products' => $order->getProducts(),
            'phoneNumber' => $order->getPhoneNumber(),
        ];
        file_put_contents($this->file, json_encode($orders, JSON_PRETTY_PRINT));
    }
}
