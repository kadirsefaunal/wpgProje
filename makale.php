<?php
    include("fonksiyon.php");
    $id = $_GET["makaleid"];
    if($id == null){
        header("location: index.php");
    }
    makaleGetir($id);
?>
