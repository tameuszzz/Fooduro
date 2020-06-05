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
                <p>Usun, odbierz/nadaj admina</p>
                <div class="users-tab">
                <div class="products-tab">
                    <div class='col-md-12 item user'>
                        <h4>ID</h4>
                        <h4>Email Address</h4>
                        <p>Imie Nazwisko</p>
                        <div class="buttons">
                            <button class='remove-btn'><i class="fas fa-user-shield"></i></button>
                            <button class='remove-btn'><i class="fas fa-user-times"></i></button>
                            <button class='remove-btn'><i class='fas fa-window-close'></i></button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 right-side">
                <h1>Tablica z produktami</h1>
                <button type='button' class='add-btn'>Add New <i class="fas fa-plus"></i></button>
                <div class="products-tab">
                    <div class='col-md-12 item'>
                        <img src='Public/img/orange.jpg' alt=''>
                        <h4>Orange</h4>
                        <p>6.66$ / kg</p>
                        <button class='remove-btn'><i class='fas fa-window-close'></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>


<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->