<?php

require_once __DIR__ . '/../views/Partials/header.php';
require_once __DIR__ . '/../config/Autoloader/autoload.php';

use WebsiteBuilder\Classes\Session\SessionManager;

SessionManager::start();

$errors = SessionManager::get('errors') ?? [];
$oldInput = SessionManager::get('oldInput') ?? [];
$websiteId = SessionManager::get('websiteId') ?? null;

SessionManager::remove('errors');
SessionManager::remove('oldInput');

?>

<body class="builder_cover">

    <main class="container py-4">

        <h1 class="text-center mb-4">You are one step away from your webpage</h1>

        <form action="../controllers/builderHandler.php" method="POST">
            <div class="row my-4">
                <div class="col-12 col-md-4">
                    <div class="card p-3 mb-3">
                        <div class="mb-3">
                            <label for="coverImg" class="form-label">Cover Image URL</label>
                            <input class="form-control" type="text" name="coverImg" id="coverImg" value="<?= htmlspecialchars($oldInput['coverImg'] ?? '') ?>" required>

                            <?php if (isset($errors['coverImg'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['coverImg'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="mainTitle" class="form-label">Main Title of Page</label>
                            <input class="form-control" type="text" name="mainTitle" id="mainTitle" value="<?= htmlspecialchars($oldInput['mainTitle'] ?? '') ?>" required>

                            <?php if (isset($errors['mainTitle'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['mainTitle'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle of Page</label>
                            <input class="form-control" type="text" name="subtitle" id="subtitle" value="<?= htmlspecialchars($oldInput['subtitle'] ?? '') ?>" required>

                            <?php if (isset($errors['subtitle'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['subtitle'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">Something about you</label>
                            <textarea class="form-control" name="about" id="about" cols="30" rows="3" required><?= htmlspecialchars($oldInput['about'] ?? '') ?></textarea>

                            <?php if (isset($errors['about'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['about'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Your telephone number</label>
                            <input class="form-control" type="phone" name="phone" id="phone" value="<?= htmlspecialchars($oldInput['phone'] ?? '') ?>" required>

                            <?php if (isset($errors['phone'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['phone'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input class="form-control" type="text" name="location" id="location" value="<?= htmlspecialchars($oldInput['location'] ?? '') ?>" required>

                            <?php if (isset($errors['location'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['location'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <div class="card p-3">
                                <div class="mb-3">
                                    <label for="providing" class="form-label">Do you provide services or product?</label>
                                    <select class="form-select" name="providing" id="providing" required>
                                        <option value="0" class="text-secondary-emphasis">Services</option>
                                        <option value="1" class="text-secondary-emphasis">Products</option>
                                    </select>

                                    <?php if (isset($errors['providing'])): ?>
                                        <div class="my-2">
                                            <p class="alert alert-danger"><?= $errors['providing'] ?></p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card p-3 mb-3">
                        <p class="mb-3">Provide url for an image and description of your service/product</p>
                        <div class="mb-3">
                            <label for="img1" class="form-label">Image URL</label>
                            <input class="form-control" type="text" name="img1" id="img1" value="<?= htmlspecialchars($oldInput['img1'] ?? '') ?>" required>

                            <?php if (isset($errors['img1'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['img1'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="description1" class="form-label">Description of service/product</label>
                            <textarea class="form-control" name="description1" id="description1" cols="30" rows="3" required><?= htmlspecialchars($oldInput['description1'] ?? '') ?></textarea>

                            <?php if (isset($errors['description1'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['description1'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3">
                            <label for="img2" class="form-label">Image URL</label>
                            <input class="form-control" type="text" name="img2" id="img2" value="<?= htmlspecialchars($oldInput['img2'] ?? '') ?>" required>

                            <?php if (isset($errors['img2'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['img2'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="description2" class="form-label">Description of service/product</label>
                            <textarea class="form-control" name="description2" id="description2" cols="30" rows="3" required><?= htmlspecialchars($oldInput['description2'] ?? '') ?></textarea>

                            <?php if (isset($errors['description2'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['description2'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3">
                            <label for="img3" class="form-label">Image URL</label>
                            <input class="form-control" type="text" name="img3" id="img3" value="<?= htmlspecialchars($oldInput['img3'] ?? '') ?>" required>

                            <?php if (isset($errors['img3'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['img3'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="description3" class="form-label">Description of service/product</label>
                            <textarea class="form-control" name="description3" id="description3" cols="30" rows="3" required><?= htmlspecialchars($oldInput['description3'] ?? '') ?></textarea>

                            <?php if (isset($errors['description3'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['description3'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card p-3 mb-3">
                        <div class="mb-3">
                            <label for="description" class="form-label mb-3">Provide a description of your company, something people shoud be aware of before they contact you:</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="3" required><?= htmlspecialchars($oldInput['description'] ?? '') ?></textarea>

                            <?php if (isset($errors['description'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['description'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input class="form-control" type="text" name="linkedin" id="linkedin" value="<?= htmlspecialchars($oldInput['linkedin'] ?? '') ?>" required>

                            <?php if (isset($errors['linkedin'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['linkedin'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="<?= htmlspecialchars($oldInput['facebook'] ?? '') ?>" required>

                            <?php if (isset($errors['facebook'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['facebook'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>


                        <div class="mb-3">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input class="form-control" type="text" name="twitter" id="twitter" value="<?= htmlspecialchars($oldInput['twitter'] ?? '') ?>" required>

                            <?php if (isset($errors['twitter'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['twitter'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label for="google" class="form-label">Google+</label>
                            <input class="form-control" type="text" name="google" id="google" value="<?= htmlspecialchars($oldInput['google'] ?? '') ?>" required>

                            <?php if (isset($errors['google'])): ?>
                                <div class="my-2">
                                    <p class="alert alert-danger"><?= $errors['google'] ?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-12 col-md-6 offset-3 mt-3">
                    <button class="btn btn-secondary w-100" type="submit" name="submit">Submit</button>
                </div>
            </div>

        </form>
    </main>

    <?php require_once __DIR__ . '/../views/Partials/footer.php'; ?>