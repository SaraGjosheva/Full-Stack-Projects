<?php

$id = $_GET['page'];
$conection = new PDO("mysql:host=localhost;dbname=landingpage", 'root', '');
$statement = $conection->prepare('SELECT * FROM `firstform` where id =' . $id . '');
$statement->execute();
$statement2 = $conection->prepare('SELECT * FROM `secondform` where id =' . $id . '');
$statement2->execute();
$statement3 = $conection->prepare('SELECT * FROM `thirdform` where id =' . $id . '');
$statement3->execute();
$firstForm = $statement->fetchAll(PDO::FETCH_ASSOC);
$secondForm = $statement2->fetchAll(PDO::FETCH_ASSOC);
$thirdForm = $statement3->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Company</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .card-img img {
        width: 100%;
        height: 200px;
    }

    main {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: whitesmoke;
        height: 300px;
    }
</style>

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
                    <a class="nav-link" href="#aboutUS">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">
                        <?php if ($firstForm[0]['providing']) {
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
    <main class="text-center" style="background-image: url(<?= $firstForm[0]['coverImg'] ?>);background-position: center;height:400px;">
        <h1 class="p-3"><?= $firstForm[0]['mainTitle'] ?> </h1>
        <h3 class="p-4"><?= $firstForm[0]['subTitle'] ?></h3>
    </main>
    <section class="container" id="aboutUS">
        <div class="row">
            <div class="col-6 offset-3 mb-3 mt-3 text-center">
                <h2 class="text-center">About Us</h2>
                <p class="text-secondary border-bottom"><?= $firstForm[0]['about'] ?></p>
                <p>tell:<?= $firstForm[0]['phone'] ?></p>
                <p>location:<?= $firstForm[0]['location'] ?></p>
            </div>
        </div>
    </section>
    <section class="container bodred-bottom mb-5">
        <h2 id="services">
            <?php
            if ($firstForm[0]['providing']) {
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
                        <img src="<?= $secondForm[0]['descImg']; ?>" alt="some-img">
                    </div>
                    <div class="card-text bg-secondary text-white p-3">
                        <h6>
                            <?php
                            if ($firstForm[0]['providing']) {
                                echo 'Product One Description';
                            } else {
                                echo 'Services One Description';
                            }
                            ?>
                        </h6>
                        <p><?= $secondForm[0]['descText2']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-img">
                        <img src="<?= $secondForm[0]['descImg2']; ?>" alt="some-img">
                    </div>
                    <div class="card-text bg-secondary text-white p-3">
                        <h6>
                            <?php
                            if ($firstForm[0]['providing']) {
                                echo 'Product Two Description';
                            } else {
                                echo 'Services Two Description';
                            }
                            ?>
                        </h6>
                        <p><?= $secondForm[0]['descText2']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-img">
                        <img src="<?= $secondForm[0]['descImg3']; ?>" alt="some-img">
                    </div>
                    <div class="card-text bg-secondary text-white p-3">
                        <h6> <?php
                                if ($firstForm[0]['providing']) {
                                    echo 'Product Three Description';
                                } else {
                                    echo 'Services Three Description';
                                }
                                ?></h6>
                        <p><?= $secondForm[0]['descText3']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container mb-2">
        <div class="row">
            <div class="col-md-6 col-12">
                <h2 id="contact">Contact</h2>
                <p><?= $thirdForm[0]['descContact'] ?></p>
            </div>
            <div class="col-md-6 col-12">
                <form action="">
                    <div class="form-group"> <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Please entre your message"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6 offset-3 text-center">
                            <button type="submit" class="btn btn-primary text-center">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer class="bg-secondary text-white text-center">
        <small>Copyright by Sara @ Brainster</small>
        <br>
        <a href="<?= $thirdForm[0]['linkedin'] ?>">LinkedIn</a>
        <a href="<?= $thirdForm[0]['facebook'] ?>">Facebook</a>
        <a href="<?= $thirdForm[0]['twitter'] ?>">Twitter</a>
        <a href="<?= $thirdForm[0]['google'] ?>">Google+</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>