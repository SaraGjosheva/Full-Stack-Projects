<?php

namespace ManageFurniture\Benches;

require_once __DIR__ . '/Sofa.php';
require_once __DIR__ . '/../interface/Printable.php';

use ManageFurniture\Sofas\Sofa;
use ManageFurniture\Printable\Printable;

class Bench extends Sofa implements Printable {}
