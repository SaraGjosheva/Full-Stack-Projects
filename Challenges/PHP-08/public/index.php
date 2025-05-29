<?php

require_once __DIR__ . '/../config/autoload.php';

use Market\MarketStalls\MarketStall;
use Market\Cart\Cart;
use Market\Product\Kiwi;
use Market\Product\Nuts;
use Market\Product\Orange;
use Market\Product\Pepper;
use Market\Product\Potato;
use Market\Product\Raspberry;

$orange = new Orange('Orange', 35, true);
$potato = new Potato('Potato', 240, false);
$nuts = new Nuts('Nuts', 850, true);
$kiwi = new Kiwi('Kiwi', 670, false);
$pepper = new Pepper('Pepper', 330, true);
$raspberry = new Raspberry('Raspberry', 555, false);

$marketStall1 = new MarketStall([
    'orange' => $orange,
    'potato' => $potato,
    'nuts' => $nuts,
]);

$marketStall2 = new MarketStall([
    'kiwi' => $kiwi,
    'pepper' => $pepper,
    'raspberry' => $raspberry,
]);

$cart = new Cart();
$cart->addToCart($marketStall1->getItem('orange', 3));
$cart->addToCart($marketStall2->getItem('kiwi', 2));
$cart->addToCart($marketStall2->getItem('raspberry', 5));
$cart->addToCart($marketStall1->getItem('nuts', 1));
$cart->addToCart($marketStall1->getItem('poTato', 10));

echo $cart->printReceipt();
