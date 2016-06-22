<?php
  function makaleGetir($id){
    include("ayar.php");
    $komut = $db->prepare("SELECT * FROM makale WHERE MakaleID = ?");
    $komut->execute(array($id));
    $sonuc = $komut->fetch(PDO::FETCH_ASSOC);
    if ($komut->rowCount()) { 
        print "<div class='panel panel-default'>";
        print "<div class='panel-heading'><b>" . $sonuc['MakaleBaslik'] . "</b></div>";
        print "<div class='panel-body'>";
        print $sonuc["MakaleIcerik"];
        print "</div>";
        print "<div class='panel-footer'>";
        
        $komut2 = $db->prepare("SELECT KullaniciID, KullaniciAdi, ProfilFoto FROM kullanicilar WHERE KullaniciID = ?");
        $komut2->execute(array($sonuc["YazarID"]));
        $yazar = $komut2->fetch(PDO::FETCH_ASSOC);
        print "<img class='yazar' src='" . $yazar["ProfilFoto"] . "' />";
        print "<b><a href = \"hakkimizda.php\">" . $yazar["KullaniciAdi"] . "</a></b>";
        print "<span class='tarih'>".$sonuc['EklenmeTarihi']."</span> 
        </div>";
        print "</div>";
    }
  }
  
  function yorumGetir($makaleid){
    include("ayar.php");
    $komut = $db->prepare("SELECT * FROM yorumlar WHERE MakaleID = ? ORDER BY YorumID DESC");
    $komut->execute(array($makaleid));
    $sonuc = $komut->fetchAll(PDO::FETCH_ASSOC);
    foreach( $sonuc as $row ){
      print "<div class = 'panel panel-default' style='background-color: #e1ccfd'>";
        print "<center><table width='100%' border='0'> <tr>";
        print "<td width='15%' rowspan='2'><center><img src='img/wb.png' width='70' height='70' /></center></td>";
        print "<td width='60%'><b>". $row["AdSoyad"] ."</b></td>";
        print "<td width='25%'><b>". $row["Tarih"] ."</b></td>";
        print "</tr>";
        print "<tr>";
        print "<td colspan='2'>" . $row["Yorum"] . "</td>";
        print "</tr></table></center>";
      print "</div>";
    }
  }
  
  function kategoriMakaleListele($kategori){
    include("ayar.php");
    //Sayfalama
    $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;//sayfaya gelen değişkenin kontrolü
    $komut = $db->prepare("SELECT COUNT(*) FROM makale WHERE Kategori = ?");
    $komut->execute(array($kategori));
    $sayac = $komut->fetchColumn();
    $sinir = 5;//sayfada gösterilecek makale sayısı
    $sayfaSayisi = ceil($sayac / $sinir);//sayfa sayısını bul ve yuvarla
    $kactan = ($sayfa * $sinir) - $sinir;
    
    $komut = $db->prepare("SELECT * FROM makale WHERE Kategori = ? ORDER BY MakaleID DESC LIMIT $kactan, $sinir");
    $komut->execute(array($kategori));
    $sonuc = $komut->fetchAll(PDO::FETCH_ASSOC);
    foreach( $sonuc as $row ){                
        $detay = $row["MakaleIcerik"];
        $uzunluk = strlen($detay);
        $limit = 600;
        
        print "<div class=\"panel panel-default\">";
        print "<div class=\"panel-heading\"><a href = \"makale.php?makaleid={$row['MakaleID']}\"><b>".$row["MakaleBaslik"]."</b></a></div>";
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
      print "<nav>
        <ul class='pagination'>
          <li>";      
      if($sayfa != 1){
        print "<a href = '?kategori={$kategori}&sayfa=". ($sayfa - 1) ."' aria-label=
        'Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
      }   
      for ($i=1; $i <= $sayfaSayisi; $i++) { 
        print "<li><a href='?kategori={$kategori}&sayfa={$i}'>{$i}</a></li>";
      }
      if($sayfa != $sayfaSayisi){
        print "<li><a href = '?kategori={$kategori}&sayfa=". ($sayfa + 1) ."'>&raquo;</a></li>";
      }
      print "</ul></nav>";
  }
  
  function yazarGetir($yazarid){
    include("ayar.php");
    $komut = $db->prepare("SELECT KullaniciID, KullaniciAdi FROM kullanicilar WHERE KullaniciID = ?");
    $komut->execute(array($yazarid));
    $yazar = $komut->fetch(PDO::FETCH_ASSOC);
    print "<div class='iyazar'><b>Yazar: <a href = \"hakkimizda.php\">" . $yazar["KullaniciAdi"] . "</a></b></div>";
  }
  
  function yorumYap($id, $ad, $yorum){
    include("ayar.php");
    $query = $db->prepare("INSERT INTO yorumlar SET MakaleID = ?, AdSoyad = ?, Yorum = ?");
    $insert = $query->execute(array($id, $ad, $yorum));
    
  }
  
    function adminMakaleEkle($yID, $kategori, $mBaslik, $mIcerik){
        include("ayar.php");
        $query = $db->prepare("INSERT INTO makale SET YazarID = ?, Kategori = ?, MakaleBaslik = ?, MakaleIcerik = ?");
        $insert = $query->execute(array($yID, $kategori, $mBaslik, $mIcerik));
    }
    
    function adminMakaleListele(){
        include("ayar.php");
        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;//sayfaya gelen değişkenin kontrolü
        $sayac = $db->query("SELECT COUNT(*) FROM makale", PDO::FETCH_ASSOC)->fetchColumn();//veritabanındaki makale sayısı
        $sinir = 8;//sayfada gösterilecek makale sayısı
        $sayfaSayisi = ceil($sayac / $sinir);//sayfa sayısını bul ve yuvarla
        $kactan = ($sayfa * $sinir) - $sinir;
        
        $query = $db->query("SELECT * FROM makale ORDER BY MakaleID DESC LIMIT $kactan, $sinir", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
            foreach( $query as $row ){
                print "<tr>";
                print  "<td>".$row['MakaleID']."</td>";
                print  "<td>".$row["Kategori"]."</td>";
                print  "<td>".$row["MakaleBaslik"]."</td>";
                print  "<td>".$row["EklenmeTarihi"]."</td>";
                print  "<td>
                <div class='btn-group' role='group' aria-label='...'>
                  <button type='button' class='btn btn-default' onClick=\"parent.location='guncelle.php?id={$row['MakaleID']}'\">Güncelle</button>
                  <button type='button' class='btn btn-default' onClick=\"parent.location='sil.php?id={$row['MakaleID']}'\">Sil</button>
                </div>
                    </td>";
                print "</tr>";
            }
        }
        
        print "</table>
          </div>";
        
        print "<nav> 
            <ul class='pagination'>
              <li>";   
        if($sayfa != 1){
          print "<a href = '?sayfa=". ($sayfa - 1) ."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
        } 
        for ($i=1; $i <= $sayfaSayisi; $i++) { 
          print "<li><a href='?sayfa={$i}'>{$i}</a></li>";
        }
        if($sayfa != $sayfaSayisi){
          print "<li><a href = '?sayfa=". ($sayfa + 1) ."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
        }
        print "</ul></nav>"; 
    }
    
    function makaleSil($id){
      include("ayar.php");
      $query = $db->prepare("DELETE FROM makale WHERE MakaleID = ?");
      $delete = $query->execute(array($id));
    }
    
    function makaleGuncelle($mID, $mBaslik, $mIcerik){
      include("ayar.php");
      $query = $db->prepare("UPDATE makale SET MakaleBaslik = ?, MakaleIcerik = ? WHERE MakaleID = ?");
      $update = $query->execute(array($mBaslik, $mIcerik, $mID));
    }
?>
