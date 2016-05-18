<?php
    include("ayar.php");
    require('include/header.php');
    include("fonksiyon.php");
    
    //Seçilen kategoriye göre kategorileri listeler
    $kategori = $_GET["kategori"];
    if($kategori != null){
        kategoriMakaleListele($kategori);
    }
    else {
        header("location: index.php");
    }
    
    require('include/aside.php');
    require('include/footer.php');
?>
