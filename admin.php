<?php
    include("ayar.php");
    session_start();
    print "admin panel <br />";
    
    if(!isset($_SESSION["kID"])){
        header("location: login.php");
    }
    else {
        print $_SESSION["kID"]. "<br />". $_SESSION["kAdi"]. "<a href = 'cikis.php'>Çıkış</a>";
    }
?>
