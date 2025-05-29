<?php

namespace ManageFurniture\Furniture;

class Furniture
{
    private float $width;
    private float $length;
    private float $height;
    private bool $is_for_seating;
    private bool $is_for_sleeping;

    public function __construct(float $width, float $length, float $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function setIs_for_seating(bool $is_for_seating): self
    {
        $this->is_for_seating = $is_for_seating;

        return $this;
    }

    public function setIs_for_sleeping(bool $is_for_sleeping): self
    {
        $this->is_for_sleeping = $is_for_sleeping;

        return $this;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getIs_for_seating(): bool
    {
        return $this->is_for_seating;
    }

    public function getIs_for_sleeping(): bool
    {
        return $this->is_for_sleeping;
    }

    public function area(): float
    {
        return $this->width * $this->length;
    }

    public function volume(): float
    {
        return $this->area() * $this->height;
    }
}
