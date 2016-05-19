<?php
    include("fonksiyon.php");
    if(!isset($_SESSION["kID"])){ //Giriş yapılmamışsa giriş ekranına yönlendir
        header("location: login.php");
    }
    if($_GET["id"] != null){ //sayfaya gönderilen id ye sahip makaleyi sil
        $id = $_GET["id"];
        makaleSil($id);
        header("location: admin.php");
    }
    else{
        header("location: admin.php");
    }
?>
