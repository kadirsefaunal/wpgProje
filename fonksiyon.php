<?php
  function makaleGetir($id){
    include("ayar.php");
    $komut = $db->prepare("SELECT * FROM makale WHERE MakaleID = ?");
    $komut->execute(array($id));
    $sonuc = $komut->fetch(PDO::FETCH_ASSOC);
    if ($komut->rowCount()) {
      print $sonuc["MakaleID"]. "<br />" . $sonuc["MakaleBaslik"]; 
    } 
  }
  
  function kategoriMakaleListele($kategori){
    include("ayar.php");
    $komut = $db->prepare("SELECT * FROM makale WHERE Kategori = ?");
    $komut->execute(array($kategori));
    $sonuc = $komut->fetchAll(PDO::FETCH_ASSOC);
    foreach( $sonuc as $row ){                
        $detay = $row["MakaleIcerik"];
        $uzunluk = strlen($detay);
        $limit = 600;
        if ($uzunluk > $limit) {
          $detay = substr($detay,0,$limit) . "...<br /><button>Deneme</button>";
          
        }
        print "<div class=\"panel panel-default\">";
        print "<div class=\"panel-heading\">".$row["MakaleBaslik"]."</div>";
        print "<div class=\"panel-body\">".$detay."</div>";
        print "</div>";
      } 
  }
?>
