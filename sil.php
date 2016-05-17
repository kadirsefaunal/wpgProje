<?php
    include("fonksiyon.php");
    if($_GET["id"] != null){
        $id = $_GET["id"];
        makaleSil($id);
        header("location: admin.php");
    }
    else{
        header("location: admin.php");
    }
?>
