<?php

namespace VehicleRegistration\Classes\Redirector;

class Redirector
{
    public static function redirect(string $url): void
    {
        header('Location: ' . $url . '.php');
        die();
    }
}
