<!DOCTYPE html>
<html lang="en">
<head>
<!-- header -->
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<!-- /header -->
<title>Fooduro - Your Cart</title>
<?php   if ($_SESSION) {
            echo "<link rel='stylesheet' href='Public/css/navbar2.css'>";
        }
?>
<link rel="stylesheet" href="Public/css/cart.css">
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
                <h1>Your Cart (5)</h1>
                <div class='items'>
                <?php
                    for ($i = 1; $i <= 5; $i++)
                    {
                        echo "
                            <div class='col-md-12 item'>
                                <button class='remove-btn'><i class='fas fa-window-close'></i></button>
                                <img src='Public/img/orange.jpg' alt=''>
                                <h4>Orange</h4>
                                <p>6.66$ / kg</p>
                                <div class='add-subl'>
                                    <span class='count'><button><i class='fas fa-plus'></i></button></span>
                                    <h5 class='number'>1</h5>
                                    <span class='count'><button><i class='fas fa-minus'></i></button></span>
                                </div>
                            </div>
                        ";
                    }
                ?>
                </div>
                <div class="summary">
                    <h3>Total: <span>44$</span></h3>
                    <button type='button' class='pay-btn'>Go to payments</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-0 right-side">
                <img src="Public/img/cart.png" alt="about-pic">
            </div>
        </div>
    </div>
</div>


<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->
