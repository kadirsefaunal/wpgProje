<?php
  include("ayar.php");
  require('include/header.php');
 
  
  $query = $db->query("SELECT * FROM makale", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
      foreach( $query as $row ){                
        $detay = $row["MakaleIcerik"];
        $uzunluk = strlen($detay);
        $limit = 600;
        
        print "<div class=\"panel panel-default\">";
        print "<div class=\"panel-heading\"><a href = \"makale.php?makaleid={$row['MakaleID']}\">".$row["MakaleBaslik"]."</a></div>";
        if ($uzunluk > $limit) {
          print "<div class=\"panel-body\">" . $detay = substr($detay,0,$limit) . "...<br />";
          
          print "<div class='iyazar'><b>Yazar:Kadir Mutlu</b></div>";
          
          print "<a href = \"makale.php?makaleid={$row['MakaleID']}\"><span class='oku'>Devamını Oku<span></a>";
          
          print "</div>";
        }
        
        print "</div>";
      }
    }
  
  require('include/aside.php');
  require('include/footer.php');
?>







    
      
         	
         	
      