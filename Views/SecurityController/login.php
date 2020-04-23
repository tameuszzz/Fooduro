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
                <form method='POST' action='?page=login'>
                    <div class="form-group row">
                        <label class="sr-only" for="inlineFormInputGroup">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email address" name='email'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="Password" name='password'>
                        </div>
                    </div>
                    <button class="sign-in">Sign In<i class="fas fa-chevron-right"></i></button>
                    <h5>New here? <span><a href="?page=register">Sign Up!</a></span></h5>
                    <h5 style="font-size: 12px !important;">Forgot Password? <span><a href="#">Click Here!</a></span></h5>
                </form>
            </div>
              <div class="col-lg-6 col-md-6 col-sm-0 right-side">
                <img src="Public/img/login.png" alt="login-pic">
              </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>