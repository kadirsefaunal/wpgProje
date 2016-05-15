<?php
    include("ayar.php");
    require('include/header.php');
    
    include("fonksiyon.php");
    $kategori = $_GET["kategori"];
    kategoriMakaleListele($kategori);
    
    require('include/aside.php');
    require('include/footer.php');
?>
