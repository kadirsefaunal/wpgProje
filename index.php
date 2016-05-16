<?php
  include("ayar.php");
  include("fonksiyon.php");
  require('include/header.php');
   
  
  //Sayfalama
  $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;//sayfaya gelen değişkenin kontrolü
  $sayac = $db->query("SELECT COUNT(*) FROM makale", PDO::FETCH_ASSOC)->fetchColumn();//veritabanındaki makale sayısı
  $sinir = 5;//sayfada gösterilecek makale sayısı
  $sayfaSayisi = ceil($sayac / $sinir);//sayfa sayısını bul ve yuvarla
  $kactan = ($sayfa * $sinir) - $sinir;
  
  $query = $db->query("SELECT * FROM makale ORDER BY MakaleID DESC LIMIT $kactan, $sinir", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
      foreach( $query as $row ){

        $detay = $row["MakaleIcerik"];
        $uzunluk = strlen($detay);
        $limit = 600;
        
        print "<div class=\"panel panel-default\">";
        print "<div class=\"panel-heading\"><a href = \"makale.php?makaleid={$row['MakaleID']}\">".$row["MakaleBaslik"]."</a></div>";
        print "<div class=\"panel-body\">";
        if ($uzunluk > $limit) {
          print $detay = substr($detay,0,$limit) . "...<br />";
        }else{
          print $detay . "<br />";
        }
        yazarGetir($row["YazarID"]);
        print "<a href = \"makale.php?makaleid={$row['MakaleID']}\"><span class='oku'>Devamını Oku<span></a>";
        print "</div>";
        print "</div>";
      }
    }
    
  if($sayfa != 1){
    print "<a href = '?sayfa=". ($sayfa - 1) ."'><-</a>";
  }
  for ($i=1; $i <= $sayfaSayisi; $i++) { 
    print "<a href='?sayfa={$i}'>{$i}</a>";
  }
  if($sayfa != $sayfaSayisi){
    print "<a href = '?sayfa=". ($sayfa + 1) ."'>-></a>";
  }
  
  require('include/aside.php');
  require('include/footer.php');
?>







    
      
         	
         	
      