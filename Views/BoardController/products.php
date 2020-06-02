<!DOCTYPE html>
<html lang="en">
<head>
<!-- header -->
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<!-- /header -->
<title>Fooduro - Home</title>
<link rel="stylesheet" href="Public/css/navbar2.css">
<link rel="stylesheet" href="Public/css/home.css">
<link rel="stylesheet" href="Public/css/products.css">
</head>
<body>

<!-- navbar2 -->
<?php include(dirname(__DIR__).'/Common/navbar2.php'); ?>
<!-- /navbar2 -->

<div class="main">
    <div class="container">
        <div class="row first-row">
            <div class="col-lg-3 col-md-3 col-sm-12 left-side">
                <div class="categories">
                    <h1>ALL CATEGORIES</h1>
                    <ul>
                        <li><a href="?page=products">Beverages</a></li>
                        <li><a href="?page=products">Bread/Bakery</a></li>
                        <li><a href="?page=products">Canned/Jarred Goods</a></li>
                        <li><a href="?page=products">Dairy</a></li>
                        <li><a href="?page=products">Frozen Foods</a></li>
                        <li><a href="?page=products">Meat</a></li>
                        <li><a href="?page=products">Produce</a></li>
                        <li><a href="?page=products">Cleaners</a></li>
                        <li><a href="?page=products">Paper Goods</a></li>
                        <li><a href="?page=products">Other</a></li>
                    </ul>  
                </div>
                <div class="adv" id="adv1">
                    <img src="Public/img/coca-cola.png" alt="">
                    <div class="overlay">
                        <p><a href="">BUY 1 GET 2</a></p>
                    </div>
                </div>
                <div class="adv">
                    <img src="Public/img/lemon.png" alt="">
                    <div class="overlay">
                        <p><a href="">20% OFF</a></p>
                    </div>
                </div>
                <div class="adv">
                    <img src="Public/img/donuts.png" alt="">
                    <div class="overlay">
                        <p><a href="">-30% FOR ALL KINDS</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 right-side">
                <div class="prod-content">
                    <div class="results">
                        <h1>Results for cat-name</h1>;
                    </div>
                    <div class="row">
                        <?php
                            for ($i = 1; $i <= 12; $i++)
                            {
                                echo "
                                <div class='col-lg-3 col-md-3 col-sm-3 item'>
                                <img src='Public/img/orange.jpg' alt=''>
                                <h2>Orange</h2>
                                <p>6.66$ / kg</p>
                                <button type='button' class='cart-btn'>Add to cart <i class='fas fa-cart-plus'></i></button>
                                </div>
                                ";
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->