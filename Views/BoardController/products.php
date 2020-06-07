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

                        <?php foreach ($this->categories as $one): ?>  
                            <li><a href="?page=products&id=<?= $one->getIdCategory() ?>"> <?= $one->getName() ?></a></li>
                        <?php endforeach; ?>

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
                            if(isset($prs)){
                                foreach ($prs as $one): ?>
                                
                                    <div class='col-lg-3 col-md-3 col-sm-3 item'>
                                    <img src='Public/img/orange.jpg' alt=''>
                                    <h2> <?= $one->getName() ?></h2>
                                    <p> <?= $one->getPrice() ?>$</p>
                                    <a type='button' href='?page=add&id=<?= $one->getIdProduct() ?>' class='cart-btn'>Add to cart <i class='fas fa-cart-plus'></i></a>
                                    </div>
                            
                        <?php endforeach; 
                            } else {
                                echo("<div class='col-lg-6 col-md-3 col-sm-3 item'> There are no product in category.</div>");

                            }?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->