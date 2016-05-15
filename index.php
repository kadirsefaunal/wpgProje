<?php
  include("ayar.php");
  include("fonksiyon.php");
  require('include/header.php');
   
  
  $query = $db->query("SELECT * FROM makale", PDO::FETCH_ASSOC);
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
  
  require('include/aside.php');
  require('include/footer.php');
?>







    
      
         	
         	
      