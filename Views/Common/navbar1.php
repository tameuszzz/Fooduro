<!-- navbar1 -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand logo" href="#"><img src="Public/img/logo.png" alt="logo">
            Fooduro.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse links" id="navbarText">
            <ul class="nav__links">
                <li <?=(($_GET['page'] == 'login' || $_GET['page'] == 'logout' || $_GET['page'] == 'register') ? 'class="active"' : '')?>><a href="?page=home">Home</a></li>
                <li <?=(($_GET['page'] == 'about') ? 'class="active"' : '')?>><a href="?page=about">About</a></li>
                <li <?=(($_GET['page'] == 'delivery') ? 'class="active"' : '')?>><a href="?page=delivery">Delivery</a></li>
                <li <?=(($_GET['page'] == 'payments') ? 'class="active"' : '')?>><a href="?page=payments">Payments</a></li>
                <li <?=(($_GET['page'] == 'contact') ? 'class="active"' : '')?>><a href="?page=contact">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- /navbar1 -->