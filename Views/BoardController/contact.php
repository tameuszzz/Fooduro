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
    <link rel="stylesheet" href="Public/css/contact.css">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-0 left-side">
                    <img src="Public/img/contact.png" alt="payments-pic">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 right-side">
                    <h2>Contact Us</h2>
                    <div class="about-text">
                        <div class="text-area">
                            <h4>We would love to hear from you!</h4>
                            <div class="rules">
                                <?php   if ($_SESSION) {
                                            echo "<h3>Send us a message and we will respond as soon as posible</h3>
                                                <form method='POST' action='?page=contact'>
                                                <textarea type='text' placeholder='What you want to ask?' name='content' id='content'></textarea><br>
                                                <button type='button' class='ok-button' onClick='contact()'>SEND</button>
                                            </form> 
                                            <h5>Liczba Twoich wątków bez odpowiedzi: $this->numberOfNotAnwseredYourMessages</h5>
                                            <h3 class='con-inf'>Contact Informations:</h3>
                                            <div class='log-in'>
                                            <p>
                                                <i class='fas fa-map-marker-alt'></i> Our Office Location: <br>
                                                <span>ul. Krakowska 5d, Krakow 32-123</span>
                                            </p>
                                            <p>
                                                <i class='fas fa-phone'></i> Our Phone Number: <br>
                                                <span>+48 414 234 126</span>
                                            </p>
                                            <p>
                                                <i class='fas fa-envelope'></i> Our Email Address: <br>
                                                <span>lorem.ipsum@gmail.com</span>
                                            </p>
                                            </div>"
                                            ;
                                        } else {
                                            echo "  <h3>Contact Informations:</h3>
                                                    <div class='not-log-in'>
                                                        <p>
                                                            <i class='fas fa-map-marker-alt'></i> Our Office Location: <br>
                                                            <span>ul. Krakowska 5d, Krakow 32-123</span>
                                                        </p>
                                                        <p>
                                                            <i class='fas fa-phone'></i> Our Phone Number: <br>
                                                            <span>+48 414 234 126</span>
                                                        </p>
                                                        <p>
                                                            <i class='fas fa-envelope'></i> Our Email Address: <br>
                                                            <span>lorem.ipsum@gmail.com</span>
                                                        </p>
                                                    </div>";
                                        }
                                ?>
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