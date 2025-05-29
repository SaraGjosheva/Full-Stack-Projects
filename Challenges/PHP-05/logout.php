<?php

session_start();

require_once __DIR__ . '/functions.php';

if (!isLogedIn()) {
    redirect('index');
}

session_unset();
session_destroy();

redirect('index');
