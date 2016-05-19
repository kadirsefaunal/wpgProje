<?php
    include("include/adminheader.php");
    include("ayar.php");
    include("fonksiyon.php");
    
    if(isset($_POST["submit"])){ //Sayfa post edilmişse
        $id = $_POST["id"];
        $baslik = $_POST["baslik"];
        $icerik = $_POST["icerik"];
        makaleGuncelle($id, $baslik, $icerik); //makaleyi güncelle
        header("location: admin.php");
    }
    
    if($_GET["id"] != null){ //güncellenecek makaleyi getir
        $id = $_GET["id"];
        
        $komut = $db->prepare("SELECT * FROM makale WHERE MakaleID = ?");
        $komut->execute(array($id));
        $sonuc = $komut->fetch(PDO::FETCH_ASSOC);
        if ($komut->rowCount()) { 
            print "<form action = 'guncelle.php' method = 'POST'>";
                print "<div class='form-group'>";
                
                    print "<input type = 'hidden' name = 'id' value ='".$sonuc["MakaleID"]."' />";
                
                    print "Başlık";
                    print "<input class='form-control' type = 'text' name = 'baslik' value ='".$sonuc["MakaleBaslik"]."' /><br />";
                
                    print "Makale";
                    print "<textarea class ='ckeditor' name = 'icerik' cols = '70' rows = '10'>".$sonuc["MakaleIcerik"]."</textarea><br />";
                
                    print "<button class='btn btn-primary' type = 'submit' name = 'submit'>Makale Güncelle</button>";
                print "</div>";
        }
    }
    else{
        header("location: admin.php");
    }

?>
</div><!--container-->
<script src="ckeditor/ckeditor.js">  </script>
</body>
</html>