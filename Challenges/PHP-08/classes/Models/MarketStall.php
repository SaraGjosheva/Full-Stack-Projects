<?php

namespace Market\MarketStalls;

require_once __DIR__ . '/../Product/Product.php';

use Market\Products\Product;

// It is part of the SPL (Standard PHP Library) and is used to indicate that an argument passed to a method or function is invalid or inappropriate.
use InvalidArgumentException;

class MarketStall
{
    public array $products = [];

    public function __construct(array $products)
    {
        if (!is_array($products)) {
            throw new InvalidArgumentException('Products must be an associative array.<br>');
        }

        foreach ($products as $key => $value) {
            if (!is_string($key) || !$value instanceof Product) {
                throw new InvalidArgumentException('Keys must be strings and values must be instances of Product.<br>');
            }
        }

        $this->products = $products;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function addProductToMarket(Product $product): void
    {
        $this->products[$product->getName()] = $product;
    }

    public function getItem(string $name, int $amount): bool|array
    {
        $name = strtolower($name);
        $this->products = array_change_key_case($this->products, CASE_LOWER);

        if (!array_key_exists($name, $this->products)) {
            return false;
        }

        return ['amount' => $amount, 'item' => $this->products[$name]];
    }
}
