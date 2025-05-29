<?php

namespace ManageFurniture\Printable;

interface Printable
{
    public function print(): void;
    public function sneakPeek(): void;
    public function fullInfo(): void;
}
