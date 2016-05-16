<?php
  function makaleGetir($id){
    include("ayar.php");
    $komut = $db->prepare("SELECT * FROM makale WHERE MakaleID = ?");
    $komut->execute(array($id));
    $sonuc = $komut->fetch(PDO::FETCH_ASSOC);
    if ($komut->rowCount()) { 
        print "<div class='panel panel-default'>";
        print "<div class='panel-heading'>" . $sonuc['MakaleBaslik'] . "</div>";
        print "<div class='panel-body'>";
        print $sonuc["MakaleIcerik"];
        print "</div>";
        print "<div class='panel-footer'>";
        
        $komut2 = $db->prepare("SELECT KullaniciID, KullaniciAdi, ProfilFoto FROM kullanicilar WHERE KullaniciID = ?");
        $komut2->execute(array($sonuc["YazarID"]));
        $yazar = $komut2->fetch(PDO::FETCH_ASSOC);
        print "<img class='yazar' src='" . $yazar["ProfilFoto"] . "' />";
        print "<b><a href = \"yazar.php?yazarid={$sonuc['YazarID']}\">" . $yazar["KullaniciAdi"] . "</a></b>";
        
        print "<span class='tarih'>".$sonuc['EklenmeTarihi']."</span> 
        </div>";
        print "</div>";
        //Yorum kısmı
        
        print "<div class='panel panel-default'>";
          print "<div class='panel-body' style='background-color: #eee;'>";
            yorumGetir($id);
          print "</div>";
        print "</div>";
        
        
    }
  }
  
  function yorumGetir($makaleid){
    include("ayar.php");
    $komut = $db->prepare("SELECT * FROM yorumlar WHERE MakaleID = ?");
    $komut->execute(array($makaleid));
    $sonuc = $komut->fetchAll(PDO::FETCH_ASSOC);
    foreach( $sonuc as $row ){
      print "<div class = 'panel panel-default' style='background-color: #e1ccfd'>";
        print $row["AdSoyad"] . " " . $row["Tarih"] . "<br />" . $row["Yorum"]. "<br />";
      print "</div>";
    }
  }
  
  function kategoriMakaleListele($kategori){
    include("ayar.php");
    $komut = $db->prepare("SELECT * FROM makale WHERE Kategori = ? ORDER BY MakaleID DESC");
    $komut->execute(array($kategori));
    $sonuc = $komut->fetchAll(PDO::FETCH_ASSOC);
    foreach( $sonuc as $row ){                
        $detay = $row["MakaleIcerik"];
        $uzunluk = strlen($detay);
        $limit = 600;
        
        print "<div class=\"panel panel-default\">";
        print "<div class=\"panel-heading\"><a href = \"makale.php?makaleid={$row['MakaleID']}\">".$row["MakaleBaslik"]."</a></div>";
        print "<div class=\"panel-body\">";
        if ($uzunluk > $limit) {
          print $detay = substr($detay,0,$limit) . "...<br />";
        }else {
          print $detay . "<br />";
        }
        yazarGetir($row["YazarID"]);
        print "<a href = \"makale.php?makaleid={$row['MakaleID']}\"><span class='oku'>Devamını Oku<span></a>";
        print "</div>";
        print "</div>";
      } 
  }
  
  function yazarGetir($yazarid){
    include("ayar.php");
    $komut = $db->prepare("SELECT KullaniciID, KullaniciAdi FROM kullanicilar WHERE KullaniciID = ?");
    $komut->execute(array($yazarid));
    $yazar = $komut->fetch(PDO::FETCH_ASSOC);
    print "<div class='iyazar'><b>Yazar: <a href = \"yazar.php?yazarid={$yazarid}\">" . $yazar["KullaniciAdi"] . "</a></b></div>";
  }
?>
