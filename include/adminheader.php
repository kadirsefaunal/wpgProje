<?php
    include("ayar.php");
    session_start();
    $kAdi = $_SESSION["kAdi"];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <title>Admin Paneli</title>    
    </head>
    <body>
        <header>        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin Paneli</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="makaleekle.php">Makale Ekle</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <p class="navbar-text">&emsp;<?php print $kAdi; ?></p>
                    <li><a href="cikis.php">Çıkış Yap</a></li>
                </ul>
                </div>
            </div><!-- container -->
            </nav>
            </header>
            <div class="container">