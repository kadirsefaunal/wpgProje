<?php
    include("ayar.php");
    include("fonksiyon.php");
    include("include/adminheader.php");
    
    if(!isset($_SESSION["kID"])){
        header("location: login.php");
    }
?>

    <div class="panel panel-default">
    <div class="panel-heading">Makaleler</div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Makale Başlığı</th>
                <th>Eklenme Tarihi</th>
            </tr>
            <?php
                adminMakaleListele();
            ?>
        
    
</div>
</body>
</html>