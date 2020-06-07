<!-- navbar2 -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand logo" href="?page=home"><img src="Public/img/logo.png" alt="logo">Fooduro.com</a>
        <div class="links">
            <ul class="nav__links icons">
                <?php if ($_SESSION['ID_role'] === 2) {
                        echo "<li><a href='?page=adminpanel'><i class='fas fa-user-shield'></i><span>Admin Panel</span></a></li>";
                    }
                ?>
                <li><a href="?page=account"><i class="fas fa-user"></i><span>Account</span></a></li>
                <li><a href="?page=cart"><i class="fas fa-shopping-cart"></i><span>Cart </span>(<?= $this->ilosc_details ?>)</a></li>
                <li><a href="?page=logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white dd">
        <button class="navbar-toggler btn-menu" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-caret-down"></i>
        </button>
        <div class="collapse navbar-collapse links" id="navbarText">
            <ul class="nav__links">
                <li <?=(($_GET['page'] == 'home') ? 'class="active"' : '')?>><a href="?page=home">Home</a></li>
                <li <?=(($_GET['page'] == 'about') ? 'class="active"' : '')?>><a href="?page=about">About</a></li>
                <li <?=(($_GET['page'] == 'delivery') ? 'class="active"' : '')?>><a href="?page=delivery">Delivery</a></li>
                <li <?=(($_GET['page'] == 'payments') ? 'class="active"' : '')?>><a href="?page=payments">Payments</a></li>
                <li <?=(($_GET['page'] == 'contact') ? 'class="active"' : '')?>><a href="?page=contact">Contact</a></li>

                
            </ul>
        </div>
        <div class="collapse navbar-collapse search-field" id="navbarText">
            <form class="form-inline my-2 my-lg-0" method='POST' action='?page=products' id="navbarText">
                <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>
</header>
<!-- /navbar2 -->