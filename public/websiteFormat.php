<?php

function addNavigation()
{
    return '
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/companyLogo.png" alt="Empire Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productList.php"><i class="fas fa-list"></i>Liste des produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>Mon panier</a>
                </li>
            </ul>
        </div>
    </div>
</nav>';
}

function addFooter()
{
    return '
    <footer>
            <img src="images/companyLogo.png" alt="Empire Logo">
    <div class="footer-text">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, beatae impedit. Accusantium deleniti
            expedita cum quis nobis voluptas veritatis maxime natus iste. Repellat hic blanditiis soluta rem dolorem
            quasi numquam?</p>
        <hr>
    </div>
    <p class="footer-text">EMPIRE © 2021</p>
    <ul class="social-icons">
        <li><a target="_blank" href="https://www.facebook.com/thinkempire"><i class="fab fa-facebook"></i></a>
        </li>
        <li><a target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a target="_blank" href="https://www.instagram.com/thinkempire/"><i class="fab fa-instagram"></i></a>
        </li>
        <li><a target="_blank" href="https://www.youtube.com/thinkempire"><i class="fab fa-youtube"></i></a>
        </li>
    </ul>
</footer>
    ';
}

function addLinks()
{
    return '    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/nav.css"/>
    <link rel="stylesheet" href="stylesheets/footer.css"/>
    <link rel="stylesheet" href="stylesheets/style.css"/>
    <link rel="stylesheet" href="stylesheets/content.css"/>
    <link rel="stylesheet" href="stylesheets/card.css"/>
    <link rel="stylesheet" href="stylesheets/cart.css"/>
    <link rel="stylesheet" href="stylesheets/mobile.css"/>
    <script type="module" src="scripts/app.js"></script>';
}

function addScripts()
{
    return '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>';
}