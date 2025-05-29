<?php

namespace WebsiteBuilder\Classes\Redirector;

class Redirector
{
    public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        die();
    }
}
