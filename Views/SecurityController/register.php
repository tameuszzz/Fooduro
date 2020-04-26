<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fooduro</title>
    <link rel="stylesheet" href="Public/css/header.css">
    <link rel="stylesheet" href="Public/css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesone CDN -->
    <script src="https://kit.fontawesome.com/7a5a5490a9.js" crossorigin="anonymous"></script>
    <script src="Public/js/forms.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- navbar1 -->
    <?php include(dirname(__DIR__).'/Common/navbar1.php'); ?>
    <!-- /navbar -->

    <div class="main">
        <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 left-side">
                <h2>Create an <span id="account">Account</span></h2>
                <div class='com' id='com'></div>
                <form method='POST' action='?page=register'>
                    <div class="form-group row">
                        <label class="sr-only">Name</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control name" placeholder="Name" name='firstName' id='firstName'>
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Surname" name='lastName' id='lastName'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="sr-only">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Email address" name='email' id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="sr-only">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name='password1' id="pass1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="sr-only">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name='password2' id="pass2">
                        </div>
                    </div>
                    <button class="sign-in" type='button' onclick="register()">Sign Up<i class="fas fa-chevron-right"></i></button>
                    <h5>Already here? <span><a href="?page=login">Sign In!</a></span></h5>
                </form>
            </div>
              <div class="col-lg-6 col-md-6 col-sm-0 right-sidev2">
                <img src="Public/img/register.png" alt="register-pic">
              </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>