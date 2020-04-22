<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fooduro</title>
    <link rel="stylesheet" href="Public/css/header.css">
    <link rel="stylesheet" href="Public/css/emailConfirm.css">
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
                <div class="col-lg-3 col-md-2 col-sm-0"></div>
                <div class="col-lg-6 col-md-8 col-sm-12 field">
                    <div class="success"><i class="fas fa-check-circle"></i>Success!</div>
                    <div class="info">
                        Your account has been created,<br>
                        we need to confirm your email <br>
                        address. Please click the link <br>
                        in the email we just sent you.
                    </div>
                    <div class="buttons">
                        <span style="float:left;">
                            <form action="#">         
                                <button class="btn-reset">Resent email</button>      
                            </form>   
                        </span>
                        <span style="float:right;">
                            <form action="?page=login">   
                                <button class="btn-login">Log In</button>
                            </form>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-0"></div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>