<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Session\SessionManager;

SessionManager::start();

$plateNo = $_POST['plateNo'] ?? '';
$db = DatabaseHelper::getConnection();

if (empty($plateNo)) {
    SessionManager::destroy();
} else {
    $query = $db->prepare("SELECT vehicle.id,vehicle_model.model,vehicle_type.type,chassis_number,production_year,fuel_type.f_type,vehicle.registration_number,vehicle.registration_till  FROM vehicle JOIN vehicle_model ON vehicle.vehicle_model_id=vehicle_model.id JOIN fuel_type ON vehicle.fuel_type_id=fuel_type.id JOIN vehicle_type ON vehicle.vehicle_type_id=vehicle_type.id WHERE registration_number LIKE '$plateNo' ");

    $query->execute();
    $vehicleData = $query->fetchAll();

    if (empty($vehicleData)) {
        SessionManager::set('error', 'Vehicle with this registration number does not exist.');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Vehicle Registration</title>

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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a href="login.php" class="navbar-text mb-0 text-primary text-decoration-none">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container text-center p-5 bg-light my-5">
        <div class="row">
            <div class="col-12 col-md-8 offset-2">

                <h1 class="mb-4">Vehicle Registration</h1>
                <p class="mb-4">Enter your registration number to check its validity</p>

                <form action="" method="POST">
                    <input type="text" name="plateNo" placeholder="Registration number" class="form-control mb-3">
                    <button class="btn btn-primary px-3 py-2">Search</button>
                </form>
            </div>
        </div>
    </main>

    <?php

    if (SessionManager::has('error')) {
        echo '<div class="alert alert-warning text-center container">' . SessionManager::get('error') . '</div>';
        SessionManager::remove('error');
    } elseif (!empty($vehicleData)) { ?>
        <div class="container">
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
                    </tr>
                </thead>


                <?php foreach ($vehicleData as $vehicle) {  ?>
                    <tr>
                        <th scope="row"><?= $vehicle['id'] ?></th>
                        <td><?= $vehicle['model'] ?></td>
                        <td><?= $vehicle['type'] ?></td>
                        <td><?= $vehicle['chassis_number'] ?></td>
                        <td><?= $vehicle['production_year'] ?></td>
                        <td><?= $vehicle['f_type'] ?></td>
                        <td><?= $vehicle['registration_number'] ?></td>
                        <td><?= $vehicle['registration_till'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>