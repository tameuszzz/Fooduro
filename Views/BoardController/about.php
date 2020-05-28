<!DOCTYPE html>
<html lang="en">
<head>
<!-- header -->
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<!-- /header -->
<title>Fooduro - About</title>
<?php   if ($_SESSION) {
            echo "<link rel='stylesheet' href='Public/css/navbar2.css'>";
        }
?>
<link rel="stylesheet" href="Public/css/about.css">
</head>
<body>

<!-- navbar -->
<?php   if ($_SESSION) {
            include(dirname(__DIR__).'/Common/navbar2.php');
        } else {
            include(dirname(__DIR__).'/Common/navbar1.php');
        }
?>
<!-- /navbar -->

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-0 left-side">
                <img src="Public/img/about.png" alt="about-pic">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 right-side">
                <h2>About Us</h2>
                <div class="about-text">
                    <div class="text-area">
                        <p>Welcome on <span class="brand-name">Fooduro.com</span>! <br> </p>
                        <div class="info-text">
                            We're on a mission to deliver quality beyond <br>
                            question and convenience that adds <br>
                            something great to your day. <br>
                        </div>
                        <div class="rules">
                            <h3>We can guarantee:</h3>
                            <p><i class="fas fa-home"></i>The shortest distance to the source.</p>
                            <p><i class="fas fa-check-square"></i> Better product at the right price.</p>
                            <p><i class="fas fa-chart-line"></i> Constantly innovating to bring you the freshest.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>

<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->