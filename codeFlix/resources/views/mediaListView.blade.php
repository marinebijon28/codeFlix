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
        background-color: red;
    }

    .bg-blue {
        color: white;
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

    #sidebar {
        height: 90%;
    }
    #content .header {
        margin-top: -51.3em;
        margin-left: 17%;
        width: 90%;
    }
    .row {
        margin-top : 3%;
        margin-left: 75%;
    }
    .content
    {
        margin-left : 20%;
        margin-top: 10%;
    }
    .media {
        width : 30%;
        border : 1px solid black;
        height : 20em;
        margin: 5px 5px 5px 5px;
        overflow: scroll;

    }
    .medias {
        display: flex;
        justify-content: center;
        flex-direction: row;
        flex-wrap: wrap;
        width : 80%;
        margin-left : 20%;
    }

</style>

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
<?php ob_start(); ?>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <h2 class="title">Bienvenue</h2>
        <div class="sidebar-menu">
            <ul>
                <li class="active"><a href="/CodFlix/">Médias</a></li>
                <li><a href="#">Nous contacter</a></li>
                <li><a href="index.php?action=logout">Me déconnecter</a></li>
            </ul>
        </div>
    </nav>
</div>

<!-- Page Content  -->
<div id="content">
    <div class="header">
        <h2 class="title">Cod<span>'Flix</span></h2>
        <div class="toggle-menu d-block d-md-none">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fas fa-bars"></i>F
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 offset-md-8">
        <form method="get" action="mediaListView">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="{{$search}}" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<div class="medias">
    <?php foreach( $medias as $media ): ?>
    <div class="media">
        <a class="item" href="/media=<?= $media->id; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media->trailer_url; ?>" ></iframe>
                </div>
            </div>
        </a>
        <div class="title"><?= $media->title; ?></div>
        <div class="release_date"><?= $media->release_date; ?></div>
        <div class="type">Type : {{$media->type}}</div>
        <div class="status">Status : {{$media->status}}</div>
        <div class="summary">Summary : {{$media->summary}}</div>
        <a href="/media/{{$media->title}}"><input type="button" value="Regarder"/></a>
    </div>
    <?php endforeach; ?>
</div>
<footer>Copyright Cod'Flix</footer>


<script src="public/lib/jquery/js/jquery-3.5.0.min"></script>
<script src="public/lib/bootstrap/js/bootstrap.min.js"></script>

<script src="public/js/script.js"></script>
</body>

</html>
