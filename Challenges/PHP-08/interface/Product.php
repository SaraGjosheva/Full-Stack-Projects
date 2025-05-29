<?php

namespace Market\ProductInterface;

interface Product
{
    public function getName(): string;
    public function getPrice(): float;
    public function getSellingByKg(): bool;
}
