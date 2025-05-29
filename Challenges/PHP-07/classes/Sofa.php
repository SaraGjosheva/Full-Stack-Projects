<?php

namespace ManageFurniture\Sofas;

require_once __DIR__ . '/Furniture.php';
require_once __DIR__ . '/../interface/Printable.php';

use ManageFurniture\Furniture\Furniture;
use ManageFurniture\Printable\Printable;

class Sofa extends Furniture implements Printable
{
    private int $seats;
    private int $armrests;
    private float $length_opened;

    public function setSeats(int $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function setArmrests(int $armrests): self
    {
        $this->armrests = $armrests;

        return $this;
    }

    public function setLength_opened(float $length_opened): self
    {
        $this->length_opened = $length_opened;

        return $this;
    }

    public function getSeats(): int
    {
        return $this->seats;
    }

    public function getArmrests(): int
    {
        return $this->armrests;
    }

    public function getLength_opened(): float
    {
        return $this->length_opened;
    }

    public function area_opened(): float|string
    {
        if ($this->getIs_for_sleeping()) {
            return $this->getWidth() * $this->length_opened . '<br>';
        }
        return "This sofa is for sitting only, it has $this->armrests armrests and $this->seats seats. <br>";
    }

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
