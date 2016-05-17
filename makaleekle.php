<?php
    include("include\adminheader.php");
    include("fonksiyon.php");
    if(isset($_POST["submit"])){
        $yID = $_SESSION["kID"];
        $kategori = $_POST["kategoriler"];
        $baslik = $_POST["baslik"];
        $icerik = $_POST["icerik"];
        adminMakaleEkle($yID, $kategori, $baslik, $icerik);
        header("location: admin.php");
    }
?>
<form action = "makaleekle.php" method = "POST">
<table>
    <tr>
        <td>Kategori </td>
        <td>
            <select name = "kategoriler">
                <option value="Yazılım">Yazılım</option>
                <option value="Donanım">Donanım</option>
                <option value="KonuDışı">Konu Dışı</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Başlık </td>
        <td><input type = "text" name = "baslik" /></td>
    </tr>
    <tr>
        <td>Makale </td>
        <td><textarea class ="ckeditor" name = "icerik" cols = "70" rows = "10"></textarea></td>
    </tr>
    <tr>
        <td><button type = "submit" name = "submit">Ekle</button></td>
    </tr>
</table>
</form>

</div>

<script src="ckeditor/ckeditor.js">  </script>
</body>
</html>