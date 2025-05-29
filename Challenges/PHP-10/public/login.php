<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Session\SessionManager;

SessionManager::start();
SessionManager::destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <h1 class="mb-5 mt-4 text-center fw-bolder">Login</h1>
                <form action="../controllers/checkIn.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username/Email</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Please enter your Username or Email" required>
                    </div>

                    <div class="mb-3 pb-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Please enter your password" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="index.php" class="btn btn-dark px-4 py-2">Back</a>
                        <button class="btn btn-success px-4 py-2" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>