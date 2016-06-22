<?php
    include("ayar.php");
    include("fonksiyon.php");
    include("include/adminheader.php");
    
    if(!isset($_SESSION["kID"])){ //Giriş yapılmamışsa giriş ekranına yönlendir
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
            <?php adminMakaleListele(); ?>
        
</div><!--container-->
  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>