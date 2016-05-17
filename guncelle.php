<?php
    include("include/adminheader.php");
    include("ayar.php");
    include("fonksiyon.php");
    
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $baslik = $_POST["baslik"];
        $icerik = $_POST["icerik"];
        makaleGuncelle($id, $baslik, $icerik);
        header("location: admin.php");
    }
    
    if($_GET["id"] != null){
        $id = $_GET["id"];
        
        $komut = $db->prepare("SELECT * FROM makale WHERE MakaleID = ?");
        $komut->execute(array($id));
        $sonuc = $komut->fetch(PDO::FETCH_ASSOC);
        if ($komut->rowCount()) { 
            print "<form action = 'guncelle.php' method = 'POST'>";
            print "<table>";
                print "<tr>";
                    print "<td>Makale ID </td>";
                    print "<td><input type = 'text' name = 'id' value ='".$sonuc["MakaleID"]."' /></td>";
                print "</tr>";
                print "<tr>";
                    print "<td>Başlık </td>";
                    print "<td><input type = 'text' name = 'baslik' value ='".$sonuc["MakaleBaslik"]."' /></td>";
                print "</tr>";
                print "<tr>";
                    print "<td>Makale </td>";
                    print "<td><textarea class ='ckeditor' name = 'icerik' cols = '70' rows = '10'>".$sonuc["MakaleIcerik"]."</textarea></td>";
                print "</tr>";
                print "<tr>";
                    print "<td><button type = 'submit' name = 'submit'>Güncelle</button></td>";
                print "</tr>";
            print "</table>";
            print "</form>";
        }
    }
    else{
        header("location: admin.php");
    }

?>
</div>
</body>
</html>