<?php
include("ayar.php");
  require('include/header.php');
 
    include("fonksiyon.php");
    $id = $_GET["makaleid"];
    if($id == null){
        header("location: index.php");
    }
    makaleGetir($id);
     require('include/aside.php');
  require('include/footer.php');
?>
