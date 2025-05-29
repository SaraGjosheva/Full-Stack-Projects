<?php

namespace Market\Cart;

use InvalidArgumentException;

class Cart
{
    private array $cartItems = [];

    public function addToCart(array $cartItems): void
    {
        if (!isset($cartItems['item']) || !isset($cartItems['amount'])) {
            throw new InvalidArgumentException('Cart item must contain "item" and "amount".');
        }

        $this->cartItems[] = $cartItems;
    }

    public function printReceipt(): void
    {
        if (empty($this->cartItems)) {
            echo 'Your cart is empty.<br>';
        }

        $finalPrice = 0;
        $receipt = '';

        foreach ($this->cartItems as $cartItem) {

            if (!isset($cartItem['item']) || !isset($cartItem['amount'])) {
                $errors[] = 'Invalid cart item encountered.<br>';
                continue;
            }

            $product = $cartItem['item'];
            $amount = $cartItem['amount'];
            $price = $product->getPrice() * $amount;

            $unit = $product->getSellingByKg() ? 'kgs' : 'gunny sacks';
            $receipt .= "{$product->getName()} | {$amount} {$unit} | Total = {$price} denars.<br>";

            $finalPrice += $price;
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }

        $receipt .= "<strong>Final price amount: {$finalPrice} denars.</strong><br>";

        echo $receipt;
    }
}
