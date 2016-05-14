<?php
  include("ayar.php");
  require('include/header.php');
 

  $query = $db->query("SELECT * FROM makale", PDO::FETCH_ASSOC);
            if ( $query->rowCount() ){
                foreach( $query as $row ){
                    print "<div class=\"col-md-8\">";
                    print "<div class=\"panel panel-default\">";
                    print "<div class=\"panel-heading\">".$row["MakaleBaslik"]."</div>";
                    print "<div class=\"panel-body\">".$row["MakaleIcerik"]."</div>";
                    print "</div></div>";
                }
            }
  
  require('include/aside.php');
  require('include/footer.php');
?>





    
      
         	
         	
      