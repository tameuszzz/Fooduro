<?php

    if(!isset($_SESSION['ID_user']) and !isset($_SESSION['ID_role'])) {
        die('You are not logged in!');
    }
    if($_SESSION['ID_role'] === 1) {
        die('You do not have permission to watch this page!');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- header -->
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<!-- /header -->
<title>Fooduro - Admin Panel</title>
<?php   if ($_SESSION) {
            echo "<link rel='stylesheet' href='Public/css/navbar2.css'>";
        }
?>
<link rel="stylesheet" href="Public/css/adminpanel.css">
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
            <div class="col-lg-6 col-md-6 col-sm-12 left-side">
                <h1>Tablica z uzytkownikami</h1>
                    <div class="users-tab">
                        <div class="products-tab">
                        <?php foreach($this->allUsers as $one):?>
                            <div class='col-md-12 item user'>
                                <?php if($one->getIdRole() == 2) echo('<h4>[A]</h4>') ?>
                                <h4><?= $one->getEmail() ?></h4>
                                <p><?= $one->getFirstName() ?> <?= $one->getLastName() ?></p>
                                <div class="buttons">
                                <?php if($one->getIdRole() == 2) {
                                            echo("<a class='remove-btn' href='?page=dropAdm&id=" .$one->getIdUser() ."'><i class='fas fa-user-times'></i></a>");
                                    }   else {
                                            echo("<a class='remove-btn' href='?page=makeAdm&id=" .$one->getIdUser() ."'><i class='fas fa-user-shield'></i></a>");
                                            
                                    }
                                ?>
                                    <a href='?page=dropUser&id=<?= $one->getIdUser() ?>' class='remove-btn'><i class='fas fa-window-close'></i></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
            <div class="col-lg-6 col-md-6 col-sm-12 right-side">
                <h1>Tablica z produktami</h1>
                <a href='?page=addProd' type='button' class='add-btn'>Add New <i class="fas fa-plus"></i></a>
                <div class="products-tab">
                    <?php foreach($this->allProducts as $one): ?>
                        <div class='col-md-12 item '>
                            <?php 
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($one->getPhoto()).'"/>'; 
                            ?>
                            <h4><?= $one->getName() ?></h4>
                            <p><?= round($one->getPrice()-($one->getPrice()*$one->getPromotion()), 2)?></p>
                            <p><?php 
                                    if($one->getPromotion() != 0) {
                                        echo ' -'.$one->getPromotion()*100;
                                        echo '%';
                                    } else {
                                        echo '-';
                                    }
                                ?></p>
                            <a href='?page=dropProd&id=<?= $one->getIdProduct() ?>' class='remove-btn'><i class='fas fa-window-close'></i></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
   
</div>


<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->