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
                <h1>Your Cart (<?= $this->ilosc_details ?>)</h1>
                <div class='items'>
                    <?php if(isset($userPrs)) foreach ($userPrs as $one){ 
                        $pr = $this->productRepository->getProductById($one->getIdProduct()); ?>
                        
                        <div class='col-md-12 item'>
                                <a href='?page=drop&id=<?= $one->getIdDetails() ?>'class='remove-btn'><i class='fas fa-window-close'></i></a>
                                <?php 
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($pr->getPhoto()).'"/>'; 
                                ?>
                                <h4><?= $pr->getName() ?></h4>
                                <p><?= round($pr->getPrice()-($pr->getPrice()*$pr->getPromotion()), 2)?>$</p>
                                <div class='add-subl'>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                <div class="summary">
                <!-- getAmount -->
                    <h3>Total: <span><?php if(isset($userPrs)) echo($this->productRepository->getAmount($one->getIdOrder())); ?>$</span></h3>
                    <a href='?page=save' type='button' class='pay-btn'>Go to payments</a>
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
