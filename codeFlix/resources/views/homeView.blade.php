          <?php ob_start(); ?>
<style>
    /**********
* Home page rules
**********/

    #home .banner {
        min-height: 100vh;
        background-image: url('home-bg.jpg');
    }

    #home .banner .title {
        color: #fff;
        text-align: center;
        font-weight: 700;
        font-size: 4rem;

    }
    #home .banner .title span {
        color: red;
    }
    #home .banner .title + p {
        color: #fff;
        text-align: center;
        font-weight: 400;
        font-size: 3rem;

        margin-top: 25px;
    }

    #home .banner .btn-container {
        margin-top: 70px;
        text-align: center;
    }

    #home .banner .btn-container .btn {
        width: 200px;
        margin: 8px auto;
        color: #fff;
        font-weight: 500;
        padding: 10px;
    }
    /**********
    * Main rules of the structure of each pages
    **********/

    .no-gutters {
        margin-left: 0;
        margin-right: 0;
    }

    .full-height {
        height: 100vh;
    }

    .landscape {
        background-image: url('landscape.jpg');
    }

    .bg-white {
        background-color: #fff;
    }

    .bg-red {
        position: absolute;
        left: 10%;
        background-color: red;
    }

    .bg-blue {
        position: absolute;
        right : 10%;
        background-color: blue;
    }

    .bg-black {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .opacity-50 {
        opacity: .5;
    }

    /**********
    * Dashboard structure rules of the structure of each pages
    **********/

    .wrapper {
        width: 100%;
        min-height: 100vh;
    }

    #content {
        position: relative;
        flex-basis: 100%;
    }

    /**********
    * Footer style
    **********/

    footer {
        position: absolute;
        bottom: 0;

        width: 100%;

        background: #f8f8f8;

        padding: 15px 25px;
    }
    /**********
* Forms style
**********/

    .custom-form .error-msg {
        display: block;

        margin: 15px 0 0 0;

        color: red;

        font-weight: 600;
        text-align: center;
    }

    .form-group.has-btn {
        display: flex;
    }
    .form-group.has-btn button {
        margin-left: 15px;

        width: 80px;
        color: #fff;
        font-weight: 400;
    }
    /***** Sidebar menu *****/

    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #1f1f1f;
        color: red;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        position: relative;

        flex-basis: 250px;
    }
    #sidebar .sidebar-content {
        position: fixed;
        min-width: 250px;
    }
    #sidebar .sidebar-menu {
        padding: 0 25px 25px 25px;
    }
    #sidebar.active {margin-left: -250px;}
    #sidebar.active .custom-menu {margin-right: -50px;}
    #sidebar .title {
        margin-bottom: 20px;
        font-weight: 500;
        color: #fff;
        background: #373737;
        padding: 10px 25px;
        height: 60px;
        font-size: 1.5rem;
        line-height: 40px;
    }
    #sidebar .title span {
        color: red;
    }
    #sidebar ul {
        padding: 0;
        list-style-type: none;
    }
    #sidebar ul li {font-size: 16px;}
    #sidebar ul li a {
        padding: 10px 0;
        display: block;
        color: #fff;
    }
    #sidebar ul li a:after {
        content: "";

        display: block;
        width: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.8);

        margin-top: 10px;
    }
    #sidebar ul li a:hover {
        color: red;
        text-decoration: none;
    }
    #sidebar ul li.active > a {
        background: transparent;
        color: red;
    }

    @media (max-width: 991.98px) {

        #sidebar {margin-left: -250px;}
        #sidebar.active {margin-left: 0;}
        #sidebar .custom-menu {
            margin-right: -50px !important;
            top: 10px !important;
        }

    }

    @media screen and (max-width: 768px) {

        #sidebar {
            position: fixed;
            height: 100%;
            z-index: 9;
        }
        #sidebar.open {margin-left: 0 !important;}

    }

    #sidebar .custom-menu {
        display: inline-block;
        position: absolute;
        top: 10px;
        right: -45px;
        margin-right: -20px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
    }

    @media (prefers-reduced-motion: reduce) {
        #sidebar .custom-menu {
            -webkit-transition: none;
            -o-transition: none;
            transition: none;
        }
    }

    #sidebar .custom-menu .btn {
        width: 40px;
        height: 40px;
    }

    /***** Content Header *****/

    #content .header {
        background: #454444;
        padding: 10px 25px;
        height: 60px;

        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    #content .header .title {
        font-weight: 700;
        color: #fff;
    }
    #content .header .title span {
        color: red;
    }

    #content .logout a {
        color: #e7e7e7;
        text-decoration: none;
    }


</style>
<div id="home">
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">Cod<span>'Flix</span></h1>
                    <p>
                        <strong>Bienvenue</strong>
                    </p>
                </div>
            </div>
            <div class="row btn-container">
                <div class="col-md-6"><a href="login" class="btn btn-block bg-red">Connexion</a></div>
                <div class="col-md-6"><a href="signup" class="btn btn-block bg-blue">Inscription</a></div>
                <div class="col-md-6"><a href="/contactUs" class="btn btn-block bg-green">Nous Contacter</a></div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cod'Flix</title>

    <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/lib/font-awesome/css/all.min.css" rel="stylesheet" />

    <link href="public/css/partials/partials.css" rel="stylesheet" />
    <link href="public/css/layout/layout.css" rel="stylesheet" />
</head>


<body>
<?= $content; ?>

<script src="public/lib/jquery/js/jquery-3.5.0.min"></script>
<script src="public/lib/bootstrap/js/bootstrap.min.js"></script>

<script src="public/js/script.js"></script>
</body>

</html>

