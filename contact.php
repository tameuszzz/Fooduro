<!DOCTYPE html>
<html lang="en">
<head>
    <!-- header -->
        <?php include(dirname(__DIR__).'/Common/header.php'); ?>
    <!-- /header -->
    <title>Fooduro - Contact</title>
    <?php   
        if ($_SESSION) {
           echo "<link rel='stylesheet' href='Public/css/navbar2.css'>";
        }
    ?>
    <link rel="stylesheet" href="Public/css/about.css">
    <script src="Public/js/forms.js" crossorigin="anonymous"></script>
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
        <h1>CONTACT PAGE</h1>
        <form method='POST' action='?page=contact'>
            <textarea type="text" placeholder='What you want to ask?' name='content' id='firstName'></textarea>
            <button type='button'>OK</button>
        </form> 
        
    </div>

    <!-- footer -->
    <?php include(dirname(__DIR__).'/Common/footer.php'); ?>
    <!-- /footer -->