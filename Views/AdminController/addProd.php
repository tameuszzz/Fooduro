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
<link rel="stylesheet" href="Public/css/addProd.css">
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
            <div class="col-lg-12 col-md-12 col-sm-12 side">
                <form method='POST' action='?page=addProd' enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product-n">Product Name</label>
                            <input class="form-control" name='name' placeholder='name' required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product-p">Product Price</label>
                            <input class="form-control" name='price' placeholder='3.20' required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product-prom">Promotion [0-0.99]</label>
                            <input class="form-control" name='promotion' placeholder='0.10' required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product-cat">Category</label>
                            <select id="category" name="category" class="form-control">
                                <option value="1">Beverages</option>
                                <option value="2">Bread/Bakery</option>
                                <option value="3">Canned/Jarred Goods</option>
                                <option value="4">Dairy</option>
                                <option value="5">Fruits/Vegetables</option>
                                <option value="6">Meat</option>
                                <option value="7">Produce</option>
                                <option value="8">Cleaners</option>
                                <option value="9">Paper Goods</option>
                                <option value="10">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="product-des">Description</label>
                            <select id="description" name="description" class="form-control">
                                <option value="pc.">pc.</option>
                                <option value="kg.">kg.</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product-img">Upload product image</label>
                            <input type="file" name="photo" class="text-center center-block form-control" accept="image/png, image/jpg, image/jpeg" required="">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="add-btn" type='submit'>ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
<!-- /footer -->
