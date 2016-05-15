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
?>
