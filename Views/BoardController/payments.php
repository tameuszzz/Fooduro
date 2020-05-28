<!DOCTYPE html>
<html lang="en">
<head>
<!-- header -->
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<!-- /header -->
<title>Fooduro - Payments</title>
<?php   if ($_SESSION) {
            echo "<link rel='stylesheet' href='Public/css/navbar2.css'>";
        }
?>
<link rel="stylesheet" href="Public/css/payments.css">
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
                <img src="Public/img/payments.png" alt="payments-pic">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 right-side">
                <h2>Payments Options</h2>
                <div class="about-text">
                    <div class="text-area">
                        <h4>We accept many payments methods for your comfort!</h4>
                        <div class="rules">
                            <h3><i class="fas fa-receipt"></i>You can pay for your shopping by using:<i class="fas fa-receipt i-second"></i></h3>
                            <img src="Public/img/pay-methods.png" alt="payments-pic">
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