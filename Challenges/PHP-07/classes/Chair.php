<?php

namespace ManageFurniture\Chairs;

require_once __DIR__ . '/Furniture.php';
require_once __DIR__ . '/../interface/Printable.php';

use ManageFurniture\Furniture\Furniture;
use ManageFurniture\Printable\Printable;

class Chair extends Furniture implements Printable
{

    public function print(): void
    {
        $name = basename(str_replace('\\', '/', get_class($this)));
        $sleepingInfo = $this->getIs_for_sleeping() ? 'suitable for sleeping' : 'sitting only';

        echo "$name, $sleepingInfo, {$this->area()} cm2. <br>";
    }

    public function sneakPeek(): void
    {
        $name = basename(str_replace('\\', '/', get_class($this)));
        echo $name . '. <br>';
    }

    public function fullInfo(): void
    {
        $name = basename(str_replace('\\', '/', get_class($this)));
        $sleepingInfo = $this->getIs_for_sleeping() ? 'suitable for sleeping' : 'sitting-only';

        echo "$name, $sleepingInfo, {$this->area()} cm2, width: {$this->getWidth()} cm, length: {$this->getLength()} cm, height: {$this->getHeight()} cm. <br>";
    }
}
