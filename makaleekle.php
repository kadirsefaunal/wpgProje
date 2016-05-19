<?php
    include("include\adminheader.php");
    include("fonksiyon.php");
    if(!isset($_SESSION["kID"])){ //Giriş yapılmamışsa giriş ekranına yönlendir
        header("location: login.php");
    }
    if(isset($_POST["submit"])){ //sayfa post edildiyse makaleyi kaydet ve makalelerin listelendiği sayfaya dön
        $yID = $_SESSION["kID"];
        $kategori = $_POST["kategoriler"];
        $baslik = $_POST["baslik"];
        $icerik = $_POST["icerik"];
        if($kategori != null && $baslik != null && $icerik != null){
            adminMakaleEkle($yID, $kategori, $baslik, $icerik);
            header("location: admin.php");
        }
    }
?>
<form action = "makaleekle.php" method = "POST">
    <div class="form-group">
        Kategori
        <select class="form-control" name = "kategoriler">
            <option value="Yazılım">Yazılım</option>
            <option value="Donanım">Donanım</option>
            <option value="KonuDışı">Konu Dışı</option>
        </select><br />
        Başlık
        <input class="form-control" type = "text" name = "baslik" /><br />
        Makale
        <textarea class ="ckeditor" name = "icerik" cols = "70" rows = "10"></textarea><br />
        <button class="btn btn-primary" type = "submit" name = "submit">Makale Ekle</button>
    </div>
</form>

</div><!--container-->

<script src="ckeditor/ckeditor.js">  </script>
</body>
</html>