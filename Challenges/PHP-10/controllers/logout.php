<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Session\SessionManager;

SessionManager::start();
SessionManager::destroy();

Redirector::redirect('../public/index');
