<?php
  include("ayar.php");
  require('include/header.php');
 
  
  $query = $db->query("SELECT * FROM makale", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
      foreach( $query as $row ){                
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
  
  require('include/aside.php');
  require('include/footer.php');
  
  
  
  //Goruntulencek Metnin Tam Hali

//Var olan metin içindeki karakter sayısı

//Kaç Karakter Göstermek İstiyorsunuz

//Uzun olan yer "devamı..." ile değişecek.


?>







    
      
         	
         	
      