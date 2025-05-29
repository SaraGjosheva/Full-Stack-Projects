<?php

namespace Market\Products;

require_once __DIR__ . '../../../interface/Product.php';

use Market\ProductInterface\Product as ProductInterface;

abstract class Product implements ProductInterface
{
    private string $name;
    private float $price;
    private bool $sellingByKg;

    public function __construct(string $name, float $price, bool $sellingByKg)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setSellingByKg($sellingByKg);
    }

    public function setName(string $name): self
    {
        $this->name = ucfirst(strtolower($name));

        return $this;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function setSellingByKg(bool $sellingByKg): self
    {
        $this->sellingByKg = $sellingByKg;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSellingByKg(): bool
    {
        return $this->sellingByKg;
    }
}
