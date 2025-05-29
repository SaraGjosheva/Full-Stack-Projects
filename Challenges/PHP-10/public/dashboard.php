<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Session\SessionManager;

SessionManager::start();

if (empty($_SESSION['id'])) {
    Redirector::redirect('login');
}

$search = htmlspecialchars($_POST['search'] ?? '', ENT_QUOTES, 'UTF-8');

$db = DatabaseHelper::getConnection();

$getModel = $db->prepare('SELECT * FROM `vehicle_model`');
$getType = $db->prepare('SELECT * FROM `vehicle_type`');
$getFuel = $db->prepare('SELECT * FROM `fuel_type`');
$getall = $db->prepare('SELECT vehicle.id,vehicle_model.model,vehicle_type.type,vehicle.chassis_number,vehicle.production_year,fuel_type.f_type,vehicle.registration_number,vehicle.registration_till  FROM vehicle JOIN vehicle_model ON vehicle.vehicle_model_id=vehicle_model.id JOIN fuel_type ON vehicle.fuel_type_id=fuel_type.id JOIN vehicle_type ON vehicle.vehicle_type_id=vehicle_type.id;');

$getSearch = $db->prepare("SELECT vehicle.id,vehicle_model.model,vehicle_type.type,chassis_number,production_year,fuel_type.f_type,vehicle.registration_number,vehicle.registration_till  FROM vehicle JOIN vehicle_model ON vehicle.vehicle_model_id=vehicle_model.id JOIN fuel_type ON vehicle.fuel_type_id=fuel_type.id JOIN vehicle_type ON vehicle.vehicle_type_id=vehicle_type.id WHERE vehicle_model.model LIKE '%$search%' OR vehicle_type.type  LIKE '%$search%' OR vehicle.chassis_number LIKE '%$search%' OR vehicle.production_year  LIKE '%$search%' OR fuel_type.f_type LIKE '%$search%' OR vehicle.registration_number LIKE '%$search%' OR vehicle.registration_till LIKE '%$search%'");

$getModel->execute();
$getType->execute();
$getFuel->execute();
$getall->execute();
$getSearch->execute();

$modelData = $getModel->fetchAll();
$typeData = $getType->fetchAll();
$fuelData = $getFuel->fetchAll();
$getallData = $getall->fetchAll();
$searchData = $getSearch->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
            <a class="navbar-brand fs-5" href="#">Vehicle Registration</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex align-items-center justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <?php if (SessionManager::has('id')) : ?>
                        <li class="nav-item">
                            <a href="../controllers/logout.php" class="navbar-text mb-0 text-primary text-decoration-none">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="login.php" class="navbar-text mb-0 text-primary text-decoration-none">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container pb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 col mt-3">
                <h1 class="text-center mb-4">Vehicle Registration</h1>
                <?php if (SessionManager::has('success')) {
                ?>
                    <?= '<div class="alert alert-success">' . SessionManager::get('success') . '</div>'; ?>
                <?php SessionManager::remove('success');
                } ?>
                <?php if (SessionManager::has('delete')) {
                ?>
                    <?= '<div class="alert alert-danger">' . SessionManager::get('delete') . '</div>'; ?>
                <?php SessionManager::remove('delete');
                } ?>

                <?php if (SessionManager::has('error1')) { ?>
                    <div class="alert alert-danger"><?= SessionManager::get('error1') ?></div>
                <?php SessionManager::remove('error1');
                } ?>

                <?php if (SessionManager::has('error2')) { ?>
                    <div class="alert alert-danger"><?= SessionManager::get('error2') ?></div>
                <?php SessionManager::remove('error2');
                } ?>

                <!-- <?php if (SessionManager::has('error3')) { ?>
                    <div class="alert alert-danger"><?= SessionManager::get('error3') ?></div>
                <?php SessionManager::remove('error3');
                        } ?>

                <?php if (SessionManager::has('error4')) { ?>
                    <div class="alert alert-danger"><?= SessionManager::get('error4') ?></div>
                <?php SessionManager::remove('error5');
                } ?>

                <?php if (SessionManager::has('error5')) { ?>
                    <div class="alert alert-danger"><?= SessionManager::get('error5') ?></div>
                <?php SessionManager::remove('error5');
                } ?> -->

                <?php if (SessionManager::has('error6')) { ?>
                    <div class="alert alert-danger"><?= SessionManager::get('error6') ?></div>
                <?php SessionManager::remove('error6');
                } ?>

                <!-- <?php if (SessionManager::has('error7')) { ?>
                    <div class="alert alert-danger"><?= SessionManager::get('error7') ?></div>
                <?php SessionManager::remove('error7');
                        } ?> -->

                <form action="../controllers/addVehicle.php" method="POST">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="vehicleModel" class="form-label">Vehicle Model</label>
                                <select class="form-control" name="vehicle_model" id="vegicleModel">
                                    <option selected>Default select</option>
                                    <?php foreach ($modelData as $model) { ?>
                                        <option value="<?= $model['id'] ?>"><?= $model['model'] ?></option>
                                    <?php } ?>
                                </select>
                                <a href="newModel.php" class="ps-1">Add a new model</a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="vehicleType" class="form-label">Vehicle Type</label>
                                <select class="form-control" name="vehicle_type" id="vehicleType">
                                    <option selected>Default select</option>
                                    <?php foreach ($typeData as $type) { ?>
                                        <option value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="chNumber" class="form-label">Vehicle chassis number</label>
                                <input type="text" name="chassis_number" id="chNumber" class="form-control" placeholder="" aria-describedby="helpId">
                                <?php if (SessionManager::has('error8')) { ?>
                                    <?= '<small id="helpId" class="text-danger">
                                ' . SessionManager::get('error8') . '</small>'; ?>
                                <?php SessionManager::remove('error8');
                                } ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="proYear" class="form-label">Vehicle production year</label>
                                <input type="text" name="production_year" id="proYear" class="form-control" placeholder="mm/dd/yyyy">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="regNumber" class="form-label">Vehicle registration number</label>
                                <input type="text" name="registration_number" id="regNumber" class="form-control" placeholder="" aria-describedby="helpId">
                                <?php if (SessionManager::has('error9')) { ?>
                                    <?= '<small id="helpId" class="text-danger">
                                ' . SessionManager::get('error9') . '</small>'; ?>
                                <?php SessionManager::remove('error9');
                                } ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="fuelType" class="form-label">Fuel Type</label>
                                <select class="form-control" name="fuel_type" id="fuelType">
                                    <option selected disabled>Default select</option>
                                    <?php foreach ($fuelData as $fuel) { ?>
                                        <option value="<?= $fuel['id'] ?>"><?= $fuel['f_type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="registrationTill" class="form-label">Registration to</label>
                                <input type="date" name="registration_till" id="registrationTill" class="form-control" placeholder="mm/dd/yyyy" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
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

    <section class="container-fluid">
        <div class="card p-3">
            <section class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-end align-items-center">
                <form action="dashboard.php" method="POST" class="form-inline d-flex justify-content-end align-items-center">
                    <input class="form-control me-4" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-primary ms-4" type="submit">Search</button>
                </form>
            </section>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vehicle Model</th>
                        <th scope="col">Vehicle Type</th>
                        <th scope="col">Vehicle Chassis Number</th>
                        <th scope="col">Vehicle Product Year</th>
                        <th scope="col">Fuel Type</th>
                        <th scope="col">Registration Number</th>
                        <th scope="col">Registration To</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_POST['search'])) {
                        $date1 = time() + 2592000;
                        foreach ($searchData as $getSearch) {
                            if (strtotime($getSearch['registration_till']) >= $date1) {
                    ?> <tr>
                                    <th scope="row"><?= $getSearch['id'] ?></th>
                                    <td><?= $getSearch['model'] ?></td>
                                    <td><?= $getSearch['type'] ?></td>
                                    <td><?= $getSearch['chassis_number'] ?></td>
                                    <td><?= $getSearch['production_year'] ?></td>
                                    <td><?= $getSearch['f_type'] ?></td>
                                    <td><?= $getSearch['registration_number'] ?></td>
                                    <td><?= $getSearch['registration_till'] ?></td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-danger" href="../controllers/delete.php?delete=<?= $getSearch['id'] ?>">Delete</a>
                                        <a class="btn btn-warning" href="edit.php?edit=<?= $getSearch['id'] ?>">Edit</a>

                                    </td>

                                    <a href="../controllers/search.php">View all</a>
                                </tr>
                            <?php } else if (strtotime($getSearch['registration_till']) >= time()) {

                            ?> <tr class="text-warning">
                                    <th scope="row"><?= $getSearch['id'] ?></th>
                                    <td><?= $getSearch['model'] ?></td>
                                    <td><?= $getSearch['type'] ?></td>
                                    <td><?= $getSearch['chassis_number'] ?></td>
                                    <td><?= $getSearch['production_year'] ?></td>
                                    <td><?= $getSearch['f_type'] ?></td>
                                    <td><?= $getSearch['registration_number'] ?></td>
                                    <td><?= $getSearch['registration_till'] ?></td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-danger" href="../controllers/delete.php?delete=<?= $getSearch['id'] ?>">Delete</a>
                                        <a class="btn btn-warning" href="edit.php?edit=<?= $getSearch['id'] ?>">Edit</a>
                                        <a class="btn btn-success" href="../controllers/extend.php?extend=<?= $getSearch['id'] ?>">Extend</a>
                                    </td>
                                    <a href="../controllers/search.php" class="text-no-decoration">View all</a>
                                </tr>
                            <?php } elseif (strtotime($getSearch['registration_till']) < $date1) {
                            ?> <tr class="text-danger">
                                    <th scope="row"><?= $getSearch['id'] ?></th>
                                    <td><?= $getSearch['model'] ?></td>
                                    <td><?= $getSearch['type'] ?></td>
                                    <td><?= $getSearch['chassis_number'] ?></td>
                                    <td><?= $getSearch['production_year'] ?></td>
                                    <td><?= $getSearch['f_type'] ?></td>
                                    <td><?= $getSearch['registration_number'] ?></td>
                                    <td><?= $getSearch['registration_till'] ?></td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-danger" href="../controllers/delete.php?delete=<?= $getSearch['id'] ?>">Delete</a>
                                        <a class="btn btn-warning" href="edit.php?edit=<?= $getSearch['id'] ?>">Edit</a>
                                        <a class="btn btn-success" href="../controllers/extend.php?extend=<?= $getSearch['id'] ?>">Extend</a>
                                    </td>
                                    <a href="../controllers/search.php">View all</a>
                                </tr>
                            <?php }
                        }
                    } else {
                        $date1 = time() + 2592000;
                        foreach ($getallData as $getall) {
                            if (strtotime($getall['registration_till']) >= $date1) {
                            ?> <tr>
                                    <th scope="row"><?= $getall['id'] ?></th>
                                    <td><?= $getall['model'] ?></td>
                                    <td><?= $getall['type'] ?></td>
                                    <td><?= $getall['chassis_number'] ?></td>
                                    <td><?= $getall['production_year'] ?></td>
                                    <td><?= $getall['f_type'] ?></td>
                                    <td><?= $getall['registration_number'] ?></td>
                                    <td><?= $getall['registration_till'] ?></td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-danger" href="../controllers/delete.php?delete=<?= $getall['id'] ?>">Delete</a>
                                        <a class="btn btn-warning" href="edit.php?edit=<?= $getall['id'] ?>">Edit</a>
                                        <!-- <a class="btn btn-success" href="../controllers/extend.php?extend=<?= $getall['id'] ?>">Extend</a> -->
                                    </td>
                                </tr>
                            <?php } else if (strtotime($getall['registration_till']) >= time()) {

                            ?> <tr class="text-warning">
                                    <th scope="row"><?= $getall['id'] ?></th>
                                    <td><?= $getall['model'] ?></td>
                                    <td><?= $getall['type'] ?></td>
                                    <td><?= $getall['chassis_number'] ?></td>
                                    <td><?= $getall['production_year'] ?></td>
                                    <td><?= $getall['f_type'] ?></td>
                                    <td><?= $getall['registration_number'] ?></td>
                                    <td><?= $getall['registration_till'] ?></td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-danger" href="../controllers/delete.php?delete=<?= $getall['id'] ?>">Delete</a>
                                        <a class="btn btn-warning" href="edit.php?edit=<?= $getall['id'] ?>">Edit</a>
                                        <a class="btn btn-success" href="../controllers/extend.php?extend=<?= $getall['id'] ?>">Extend</a>
                                    </td>
                                </tr>
                            <?php } elseif (strtotime($getall['registration_till']) < $date1) {
                            ?> <tr class="text-danger">
                                    <th scope="row"><?= $getall['id'] ?></th>
                                    <td><?= $getall['model'] ?></td>
                                    <td><?= $getall['type'] ?></td>
                                    <td><?= $getall['chassis_number'] ?></td>
                                    <td><?= $getall['production_year'] ?></td>
                                    <td><?= $getall['f_type'] ?></td>
                                    <td><?= $getall['registration_number'] ?></td>
                                    <td><?= $getall['registration_till'] ?></td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-danger" href="../controllers/delete.php?delete=<?= $getall['id'] ?>">Delete</a>
                                        <a class="btn btn-warning" href="edit.php?edit=<?= $getall['id'] ?>">Edit</a>
                                        <a class="btn btn-success" href="../controllers/extend.php?extend=<?= $getall['id'] ?>">Extend</a>
                                    </td>
                                </tr>
                    <?php }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>