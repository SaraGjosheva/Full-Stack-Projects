<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Session\SessionManager;
use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Database\DatabaseHelper;

$model = $_POST['model'] ?? '';
$modelUpdate = $_POST['vegicle_model'] ?? '';
$modelId = $_POST['model_id'] ?? '';
$updateModel = $_POST['updated_model'] ?? '';
$deleteModel = $_POST['delete_model'] ?? '';

$db = DatabaseHelper::getConnection();

if (!empty($model)) {
    $query = $db->prepare("INSERT INTO `vehicle_model`(`model`) VALUES ('$model')");
    $query->execute();
    SessionManager::start();
    SessionManager::set('success', 'New vehicle model added successfully');
    Redirector::redirect('dashboard');
}

if (!empty($updateModel)) {
    $query = $db->prepare("UPDATE `vehicle_model` SET `model`='$updateModel'  WHERE `vehicle_model`.`model`='$modelId' ");
    $query->execute();
    SessionManager::start();
    SessionManager::set('success', 'Vehicle model updated successfully.');
    Redirector::redirect('dashboard');
}
if (!empty($deleteModel)) {
    $query = $db->prepare("DELETE FROM `vehicle_model` WHERE  `vehicle_model`.`id`='$deleteModel' ");
    $query->execute();
    SessionManager::start();
    SessionManager::set('delete', 'Vehicle model deleted successfully.');
    Redirector::redirect('dashboard');
}

$getModel = $db->prepare('SELECT * FROM `vehicle_model`');
$getModel->execute();
$modelData = $getModel->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>New Model</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <main class="container">
        <h1 class="text-center mt-4 mb-4">Add New Model </h1>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="model" class="form-label">Add New Model</label>
                        <input type="text" name="model" id="model" class="form-control" placeholder="">
                        <button class="btn btn-success mt-3 btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="model" class="form-label">Select Model To Update</label>
                        <select class="form-control" name="vehicle_model">
                            <option selected>Default select</option>
                            <?php foreach ($modelData as $model) { ?>
                                <option value="<?= $model['model'] ?>"><?= $model['model'] ?></option>
                            <?php } ?>
                        </select>
                        <button class="btn btn-warning mt-3 btn-block" type="submit">Submit</button>
                    </div>
                </form>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="model" class="form-label">Update Model</label>
                        <input type="text" name="model_id" lass="form-control" placeholder="" value="<?= $modelUpdate ?>" hidden>
                        <input type="text" name="updated_model" id="model" class="form-control" placeholder="" value="<?= $modelUpdate ?>">
                        <button class="btn btn-success mt-3 btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="model" class="form-label">Select Model To Delete</label>
                        <select class="form-control" name="delete_model">
                            <option selected>Default select</option>
                            <?php foreach ($modelData as $model) { ?>
                                <option value="<?= $model['id'] ?>"><?= $model['model'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-danger btn-block" type="submit">Submit</button>

                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 mt-3 text-center">
                <a class="btn btn-dark w-100" href="dashboard.php">Back</a>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>