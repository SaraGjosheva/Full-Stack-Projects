<?php

session_start();

require_once __DIR__ . '/functions.php';

if (isLogedIn()) {
    redirect('dashboard');
}

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <div class="col-12 col-md-4 offset-md-4">
                <h1 class="mb-5 h2 text-center fw-bolder text-secondary">Login Form</h1>
                <form action="login_handler.php" method="POST">

                    <div class="mb-3">
                        <label for="username" class="form-label">Username: <span class="text-danger fw-bolder">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= isset($old['username']) ? $old['username'] : '' ?>" placeholder="Enter username">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password: <span class="text-danger fw-bolder">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        <?php if (isset($errors['message'])): ?>
                            <div class="my-2 pt-2">
                                <p class="alert alert-danger"><?= $errors['message'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success px-3 py-2 w-100" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>