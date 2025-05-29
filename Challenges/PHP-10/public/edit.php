<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Session\SessionManager;

SessionManager::start();
$id = $_GET['edit'];

$db = DatabaseHelper::getConnection();

$getModel = $db->prepare('SELECT * FROM `vehicle_model`');
$getType = $db->prepare('SELECT * FROM `vehicle_type`');
$getFuel = $db->prepare('SELECT * FROM `fuel_type`');
$getall = $db->prepare("SELECT * FROM vehicle JOIN vehicle_model ON vehicle.vehicle_model_id=vehicle_model.id JOIN fuel_type ON vehicle.fuel_type_id=fuel_type.id JOIN vehicle_type ON vehicle.vehicle_type_id=vehicle_type.id WHERE  vehicle.id = '$id' ");

$getModel->execute();
$getType->execute();
$getFuel->execute();
$getall->execute();

$modelData = $getModel->fetchAll();
$typeData = $getType->fetchAll();
$fuelData = $getFuel->fetchAll();
$getallData = $getall->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Edit Vehicle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">

</head>

<body>

    <main class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 col mt-3">
                <h1 class="text-center mb-4">Vehicle Registration</h1>

                <?php if (SessionManager::has('success')) {
                ?>
                    <?= '<div class="alert alert-success">' . SessionManager::get('success') . '</div>'; ?>
                <?php SessionManager::remove('success');
                } ?>

                <form action="../controllers/editVehicle.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="vegicleModel" class="form-label">Vehicle Model</label>
                                <input type="text" value="<?= $id ?>" name="id" hidden>
                                <select class="form-control" name="vehicle_model" id="vehicleModel">
                                    <option value="<?= $getallData[0]['vehicle_model_id'] ?>" selected><?= $getallData[0]['model'] ?></option>
                                    <?php foreach ($modelData as $model) { ?>
                                        <option value="<?= $model['id'] ?>"><?= $model['model'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="vehicleType" class="form-label">Vehicle Type</label>
                                <select class="form-control" name="vehicle_type" id="vehicleType">
                                    <option value="<?= $getallData[0]['vehicle_type_id'] ?>" selected><?= $getallData[0]['type'] ?></option>
                                    <?php foreach ($typeData as $type) { ?>
                                        <option value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="chNumber" class="form-label">Vehicle chassis number</label>
                                <input type="text" name="chassis_number" id="chNumber" class="form-control" placeholder="" value="<?= $getallData[0]['chassis_number'] ?>" aria-describedby="helpId">
                                <?php if (SessionManager::has('error')) {
                                    SessionManager::start(); ?>
                                    <?= '<small id="helpId" class="text-danger">
                                ' . SessionManager::get('error') . '</small>'; ?>
                                <?php SessionManager::remove('error');
                                } ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="proYear" class="form-label">Vehicle production year</label>
                                <input type="text" name="production_year" id="proYear" class="form-control" placeholder="mm/dd/yyyy" value="<?= $getallData[0]['production_year'] ?>">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="regNumber" class="form-label">Vehicle registration number</label>
                                <input type="text" name="registration_number" id="regNumber" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $getallData[0]['registration_number'] ?>">
                                <?php if (SessionManager::has('error2')) { ?>
                                    <?= '<small id="helpId" class="text-danger">
                                     ' . SessionManager::get('error2') . '</small>'; ?>
                                <?php SessionManager::remove('error2');
                                } ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fuelType" class="form-label">Fuel type</label>
                                <select class="form-control" name="fuel_type" id="fuelType">
                                    <option value="<?= $getallData[0]['fuel_type_id'] ?>" selected><?= $getallData[0]['f_type'] ?></option>
                                    <?php foreach ($fuelData as $fuel) { ?>
                                        <option value="<?= $fuel['id'] ?>"><?= $fuel['f_type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="registrationTill" class="form-label">Registration to</label>
                                <input type="date" name="registration_till" id="registrationTill" class="form-control" placeholder="mm/dd/yyyy" aria-describedby="helpId" value="<?= $getallData[0]['registration_till'] ?>">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <br>
                                <button class="mt-2 btn btn-primary btn-block w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>