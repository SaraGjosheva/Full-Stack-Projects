<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use WebsiteBuilder\Classes\Database\Database;
use WebsiteBuilder\Classes\Query\Query;
use WebsiteBuilder\Classes\Session\SessionManager;

SessionManager::start();

$websiteId = $_GET['websiteId'] ?? null;

if ($websiteId === null || !filter_var($websiteId, FILTER_VALIDATE_INT)) {
    header("Location: 404.php");
    exit;
}

$db = new Database();
$pdo = $db->getConnection();
$query = new Query($pdo);

$website = $query->find('website', $websiteId);
$description = $query->find('description', $websiteId);
$contact = $query->find('contact', $websiteId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Company</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Webster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">
                        <?php if ($website->providing) {
                            echo 'Product';
                        } else {
                            echo 'Services';
                        }
                        ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <header class="text-center main-set" style="background-image: url(<?= $website->coverImg ?>);background-position: center;height:400px;">
        <h1 class="p-3"><?= $website->mainTitle ?></h1>
        <h3 class="p-4"><?= $website->subtitle ?></h3>
    </header>

    <section class="container" id="aboutUs">
        <div class="row">
            <div class="col-6 offset-3 mb-3 mt-3 text-center">
                <h2 class="text-center mb-3">About Us</h2>
                <p class="text-secondary border-bottom"><?= $website->about ?></p>
                <p class="mb-2">Tell: <?= $website->phone ?></p>
                <p class="mb-2">Location: <?= $website->location ?></p>
            </div>
        </div>
    </section>
    <section class="container bodred-bottom mb-5">
        <h2 id="services">
            <?php
            if ($website->providing) {
                echo 'Product';
            } else {
                echo 'Services';
            }
            ?>
        </h2>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-img">
                        <img src="<?= $description->img1; ?>" alt="some-img">
                    </div>
                    <div class="card-text bg-secondary text-white p-3">
                        <h6>
                            <?php
                            if ($website->providing) {
                                echo 'Product One Description';
                            } else {
                                echo 'Services One Description';
                            }
                            ?>
                        </h6>
                        <p><?= $description->description1; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-img">
                        <img src="<?= $description->img2; ?>" alt="some-img">
                    </div>
                    <div class="card-text bg-secondary text-white p-3">
                        <h6>
                            <?php
                            if ($website->providing) {
                                echo 'Product Two Description';
                            } else {
                                echo 'Services Two Description';
                            }
                            ?>
                        </h6>
                        <p><?= $description->description2; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-img">
                        <img src="<?= $description->img3; ?>" alt="some-img">
                    </div>
                    <div class="card-text bg-secondary text-white p-3">
                        <h6> <?php
                                if ($website->providing) {
                                    echo 'Product Three Description';
                                } else {
                                    echo 'Services Three Description';
                                }
                                ?></h6>
                        <p><?= $description->description3; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container mb-2">
        <div class="row gap-3">
            <div class="col-md-6 col-12">
                <h2 id="contact">Contact</h2>
                <p><?= $contact['description'] ?></p>
            </div>
            <div class="col-12 col-md-6 ">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your Name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Please entre your message"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary text-center" name="send">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <footer class="bg-secondary text-white text-center">
        <small>Copyright by Sara @ Brainster</small>
        <br>
        <a class="pe-2" href="<?= $contact['linkedin'] ?>">LinkedIn</a>
        <a class="pe-2" href="<?= $contact['facebook'] ?>">Facebook</a>
        <a class="pe-2" href="<?= $contact['twitter'] ?>">Twitter</a>
        <a class="pe-2" href="<?= $contact['google'] ?>">Google+</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>