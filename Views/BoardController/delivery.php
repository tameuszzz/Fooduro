<!DOCTYPE html>
<html lang="en">
<head>
<!-- header -->
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<!-- /header -->
<title>Fooduro - Delivery</title>
<?php   if ($_SESSION) {
            echo "<link rel='stylesheet' href='Public/css/navbar2.css'>";
        }
?>
<link rel="stylesheet" href="Public/css/delivery.css">
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
                <img src="Public/img/delivery.png" alt="about-pic">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 right-side">
                <h2>Delivery Info</h2>
                <div class="about-text">
                    <div class="text-area">
                        <div class="rules">
                            <h3>You can choose between Standard Home Delivery, Standard Pickup Location and Express Home Delivery:</h3>
                            <div class="option">
                                <i class="fas fa-dot-circle"></i>Standard Home Delivery (3 $ / Free over 50 $, 3-5 days).
                                <p>We will deliver your purchase within 3-5 working days after receiving your order confirmation.</p>
                            </div>
                            <div class="option">
                                <i class="fas fa-dot-circle"></i>Standard Pickup Location (3 $ / Free over 50 $, 3-4 days.
                                <p>Select Standard Pickup Location as delivery option in the checkout and search for a convenient Parcel Shop by entering a postcode.</p>
                            </div>
                            <div class="option">
                                <i class="fas fa-dot-circle"></i>Express Home Delivery (7 $, 1-2 days).
                                <p>We also offer a next working day delivery for orders placed before 6:30 p.m. Monday to Friday.</p>
                            </div>
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