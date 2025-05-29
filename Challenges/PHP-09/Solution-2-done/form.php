<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Build a Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    main {
        height: 100vh;
        background-image: url(https://img.freepik.com/premium-photo/office-responsive-devices-design-website-3d-rendering_72104-3783.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    h1 {
        color: whitesmoke;
        text-shadow: 3px 3px black
    }
</style>

<body>
    <main>
        <div class="container">
            <h1 class="text-center">You are one step away from your webpage</h1>
            <form action="submit.php" method="post">
                <div class="row">
                    <div class="col-4">
                        <div class="card p-3 mb-3">
                            <div class="form-group">
                                <label for="coverImg">Cover Image URL</label>
                                <input class="form-control" type="text" name="cover-img" id="coverImg" required>
                            </div>

                            <div class="form-group">
                                <label for="mainTitle">Main Title of Page</label>
                                <input class="form-control" type="text" name="main-title" id="mainTitle" required>
                            </div>

                            <div class="form-group">
                                <label for="subTitle">Subtitle of Page</label>
                                <input class="form-control" type="text" name="sub-title" id="subTitle" required>
                            </div>

                            <div class="form-group">
                                <label for="about">Something about you</label>
                                <textarea class="form-control" name="about" id="about" cols="30" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="phone">Your telephone number</label>
                                <input class="form-control" type="tel" name="phone" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input class="form-control" type="text" name="location" id="location" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card p-3">
                                    <div class="form-group">
                                        <label for="providing">Do you provide services or product?</label>
                                        <select class="form-control" name="providing" id="providing" required>
                                            <option value="0">Services</option>
                                            <option value="1">Products</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card p-3 mb-3">
                            <p>Provide url for an image and description of your service/product</p>
                            <div class="form-group">
                                <label for="descImgUrl"> Image URL</label>
                                <input class="form-control" type="text" name="desc-img" id="descImgUrl" required>
                            </div>

                            <div class="form-group">
                                <label for="descText">Description of service/product</label>
                                <textarea class="form-control" name="desc-text" id="descText" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="descImgUrl"> Image URL</label>
                                <input class="form-control" type="text" name="desc-img2" id="descImgUrl" required>
                            </div>

                            <div class="form-group">
                                <label for="descText">Description of service/product</label>
                                <textarea class="form-control" name="desc-text2" id="descText" cols="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="descImgUrl"> Image URL</label>
                                <input class="form-control" type="text" name="desc-img3" id="descImgUrl" required>
                            </div>

                            <div class="form-group">
                                <label for="descText">Description of service/product</label>
                                <textarea class="form-control" name="desc-text3" id="descText" cols="30" rows="3" required></textarea>
                            </div>



                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card p-3 mb-3">
                            <div class="form-group">
                                <label for="descContact">Provide a description of your company, something people shoud be aware of before they contact you:</label>
                                <textarea class="form-control" name="desc-contact" id="descContact" cols="30" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input class="form-control" type="text" name="linkedin" id="linkedin" required>
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input class="form-control" type="text" name="facebook" id="facebook" required>
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input class="form-control" type="text" name="twitter" id="twitter" required>
                            </div>
                            <div class="form-group">
                                <label for="google">Google+</label>
                                <input class="form-control" type="text" name="google" id="google" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3 mt-3">
                        <button class="btn btn-secondary btn-block" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>