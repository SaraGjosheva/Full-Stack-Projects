<?php

session_start();

require_once __DIR__ . '/functions.php';

if (isLogedIn()) {
    redirect('dashboard');
}

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$successMessage = $_SESSION['success'] ?? null;

unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <h1 class="mb-5 h2 text-center fw-bolder text-secondary">Sign Up Form</h1>
                <?php if ($successMessage): ?>
                    <div class="alert alert-success text-center mb-4">
                        <p class="mb-3 text-bolder"><?= $successMessage; ?></p>
                    </div>
                <?php endif; ?>
                <form action="sign_up_handler.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: <span class="text-danger fw-bolder">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= isset($old['email']) ? $old['email'] : '' ?>" placeholder="Enter email">
                        <?php if (isset($errors['email'])): ?>
                            <div class="my-2">
                                <p class="alert alert-danger"><?= $errors['email'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username: <span class="text-danger fw-bolder">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= isset($old['username']) ? $old['username'] : '' ?>" placeholder="Enter username">
                        <?php if (isset($errors['username'])): ?>
                            <div class="my-2">
                                <p class="alert alert-danger"><?= $errors['username'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password: <span class="text-danger fw-bolder">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        <?php if (isset($errors['password'])): ?>
                            <div class="my-2">
                                <p class="alert alert-danger"><?= $errors['password'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success px-3 py-2 w-100" name="sign_up">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>