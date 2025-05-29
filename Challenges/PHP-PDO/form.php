<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- CSS script -->
        <link rel="stylesheet" href="style.css">
        <!-- Latest Font-Awesome CDN -->
        <script src="https://kit.fontawesome.com/3a818acd01.js" crossorigin="anonymous"></script>
    </head>
    <style>
         main{
            height: 100vh;
            background-image: url(https://img.freepik.com/premium-photo/office-responsive-devices-design-website-3d-rendering_72104-3783.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        h1{
            color:whitesmoke;
            text-shadow: 2px 2px  black
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
                            <label for="coverImg">Cover Imge URL</label>
                            <input class="form-control" type="text" name="cover-img" id="coverImg"  required>
                        </div>

                        <div class="form-group">
                            <label for="mainTitle">Main Title of Page</label>
                            <input class="form-control" type="text" name="main-title" id="mainTitle"  required>
                        </div> 

                         <div class="form-group">
                            <label for="subTitle">Subtitle of Page</label>
                            <input class="form-control" type="text" name="sub-title" id="subTitle"  required>
                        </div>

                        <div class="form-group">
                            <label for="about">Something about you</label>
                            <textarea class="form-control" name="about" id="about" cols="30" rows="3"  required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone">Your telephone number</label>
                            <input class="form-control" type="tel" name="phone" id="phone"  required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input class="form-control" type="text" name="location" id="location"  required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card p-3">
                        <div class="form-group">
                            <label for="providing">Do you provide services or product?</label>
                            <select class="form-control" name="providing" id="providing"  required>
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
                            <label for="descImgUrl"> Imge URL</label>
                            <input class="form-control" type="text" name="desc-img" id="descImgUrl"  required>
                        </div>

                        <div class="form-group">
                            <label for="descText">Description of service/product</label>
                           <textarea class="form-control" name="desc-text" id="descText" cols="30" rows="3"  required></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="descImgUrl"> Imge URL</label>
                            <input class="form-control" type="text" name="desc-img2" id="descImgUrl"  required>
                        </div>

                        <div class="form-group">
                            <label for="descText">Description of service/product</label>
                           <textarea class="form-control" name="desc-text2" id="descText" cols="30" rows="3"  required></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="descImgUrl"> Imge URL</label>
                            <input class="form-control" type="text" name="desc-img3" id="descImgUrl"  required>
                        </div>

                        <div class="form-group">
                            <label for="descText">Description of service/product</label>
                           <textarea class="form-control" name="desc-text3" id="descText" cols="30" rows="3"  required></textarea>
                        </div> 

                         
                        
                     </div>
                    </div>

                    <div class="col-4">
                    <div class="card p-3 mb-3">
                        <div class="form-group">
                            <label for="descContact">Provide a description of your company, something people shoud be aware of before they contact you:</label>
                            <textarea class="form-control" name="desc-contact" id="descContact"cols="30" rows="3"  required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="linkedin">Linkedin</label>
                            <input class="form-control" type="text" name="linkedin" id="linkedin"  required>
                        </div> 

                         <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input class="form-control" type="text" name="facebook" id="facebook"  required>
                        </div>

                    

                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input class="form-control" type="text" name="twitter" id="twitter"  required>
                        </div>
                        <div class="form-group">
                            <label for="google">Google+</label>
                            <input class="form-control" type="text" name="google" id="google"  required>
                        </div>
                    </div>
              
                    </div>
                    </div>  
                     <div class="row">
                          <div class="col-6 offset-3 mt-3">
                            <button class="btn btn-secondary  btn-block" type="submit">Submit</button>
                          </div>
                     </div>
            </form>
        </div>
        </main>






        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>