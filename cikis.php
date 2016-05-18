<?php //Admin çıkış yap
    session_start();
    session_destroy();
    header("location: index.php");
?>
