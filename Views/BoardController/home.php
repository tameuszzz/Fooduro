<!DOCTYPE html>
<html lang="en">
<head>
<!-- header -->
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<!-- /header -->
<title>Fooduro - Home</title>
<link rel="stylesheet" href="Public/css/navbar2.css">
<link rel="stylesheet" href="Public/css/home.css">
</head>
<body>

<!-- navbar2 -->
<?php include(dirname(__DIR__).'/Common/navbar2.php'); ?>
<!-- /navbar2 -->

<div class="main">
    
    <div class="container">
        <div class="row first-row">
            <div class="col-lg-3 col-md-3 col-sm-12 left-side">
                <h1>ALL CATEGORIES</h1>
                <ul>
                    
                    <?php foreach ($this->categories as $one): ?>    
                        <li><a href="?page=products&id=<?= $one->getIdCategory() ?>"> <?= $one->getName() ?> </a></li>
                    <?php endforeach; ?>

                </ul>  
            </div>
            <div class="col-lg-7 col-md-7 col-sm-9 mid-side"> 
                <img src="Public/img/vege.png" alt="">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 right-side">
                <h1>Healthy week !</h1>
                <h3>12.04 - 19.04</h3>
                <h2>All <span>vegatables</span></h2>
                <p>-15%</p>
                <a type='button' href="?page=products&id=5" class='see-now-button'>See Now<i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="row second-row">
            <div class="col-lg-3 col-md-3 col-sm-12 adverts">
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
            <div class="col-lg-9 col-md-9 col-sm-12 products">
                <div class="prod-content">
                    <ul class="sort-option">
                        <li class="active"><a href="#">NEW PRODUCTS</a></li>

                    </ul>
                    <div class="row">
                    
                            <?php foreach ($newProds as $one): ?>
                                <div class='col-lg-3 col-md-3 col-sm-3 item'>
                                    <?php 
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($one->getPhoto()).'"/>'; 
                                    ?>
                                    <h2><?= $one->getName()?>
                                    <span>
                                        <?php 
                                        if($one->getPromotion() != 0) {
                                            echo ' -'.$one->getPromotion()*100;
                                            echo '%';
                                        }
                                        ?>
                                    </span>
                                    </h2>
                                    <p><?= round($one->getPrice()-($one->getPrice()*$one->getPromotion()), 2)?>$ / <?= $one->getDescription() ?>
                                    <?php
                                        if($one->getPromotion() != 0) {
                                            echo "<span class='old-price'><del>".$one->getPrice()."$</del></span>";
                                        }
                                    ?>
                                    </p>
                                    <a type='button' href='?page=add&id=<?= $one->getIdProduct() ?>' class='cart-btn'>Add to cart <i class='fas fa-cart-plus'></i></a>
                                </div>
                            <?php endforeach; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->