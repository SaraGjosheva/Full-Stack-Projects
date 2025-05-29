<?php

session_start();

require_once __DIR__ . '/functions.php';

if (!isLogedIn()) {
    redirect('login');
}

$username = $_SESSION['username'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: beige;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="row my-5">
            <div class="col-12 col-md-10 offset-md-1 text-center">
                <h1 class="mt-3 h3 text-center fw-bolder text-secondary alert alert-success"><?= 'Welcome ' . $username . '!'; ?></h1>
                <p class="mb-3">You are successfull logged in!</p>
                <a href="./logout.php" class="btn btn-danger">Log out</a>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>