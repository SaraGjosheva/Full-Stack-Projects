<?php

require_once __DIR__ . '/autoload.php';

use ManageFurniture\Furniture\Furniture;
use ManageFurniture\Sofas\Sofa;
use ManageFurniture\Benches\Bench;
use ManageFurniture\Chairs\Chair;

$furniture1 = new Furniture(4.2, 6.3, 2);

echo $furniture1->area() . '<br>';
echo $furniture1->volume() . '<br>';

$sofa1 = new Sofa(400.5, 300.5, 101.3);
$sofa1->setSeats(3)->setArmrests(3)->setLength_opened(50.6);

$sofa1->setIs_for_seating(true)->setIs_for_sleeping(false);

echo $sofa1->area() . '<br>';
echo $sofa1->volume() . '<br>';
echo $sofa1->area_opened();

$sofa1->setIs_for_sleeping(true);
$sofa1->setLength_opened(30.9);

echo $sofa1->area_opened();

$bench1 = new Bench(200.21, 50.6, 67.7);
$chair1 = new Chair(125, 35.6, 10.7);

$sofa1->print();
$sofa1->sneakPeek();
$sofa1->fullInfo();

$bench1->setIs_for_sleeping(false);
$chair1->setIs_for_sleeping(false);

$bench1->print();
$bench1->sneakPeek();
$bench1->fullInfo();

$chair1->print();
$chair1->sneakPeek();
$chair1->fullInfo();
