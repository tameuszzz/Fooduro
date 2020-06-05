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
                <h2>Start your shopping by</h2>
                <h2 id="log-in">Log in</h2>
                <div class='com' id='com'></div>
                <form method='POST' action='?page=login'>
                    <div class="form-group row">
                        <label class="sr-only">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Email address" name='email' id='email'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="sr-only">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name='password' id='pass'>
                        </div>
                    </div>
                    <h4>Forgot Password? <span><a href="#">Click Here!</a></span></h4>
                    <button class="sign-in" type='button' onclick="login()">Sign In<i class="fas fa-chevron-right"></i></button>
                    <h5>New here? <span><a href="?page=register">Sign Up!</a></span></h5>
                </form>
            </div>
              <div class="col-lg-6 col-md-6 col-sm-0 right-side">
                <img src="Public/img/login.png" alt="login-pic">
              </div>
            </div>
        </div>
    </div>

<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->