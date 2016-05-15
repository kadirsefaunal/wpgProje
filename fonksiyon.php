<?php
  function sonKonular(){
    include("ayar.php");
    $query = $db->query("SELECT MakaleID, MakaleBaslik FROM makale ORDER BY MakaleID DESC, MakaleBaslik LIMIT 0,5", PDO::FETCH_ASSOC);
      if ( $query->rowCount() ){
        foreach( $query as $row ){              
          print "<li><a href = \"makale.php?makaleid={$row['MakaleID']}\">" . $row["MakaleBaslik"] . "</a></li>";
        }
      }
  }
  
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
