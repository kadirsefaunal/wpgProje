<?php
  include("ayar.php");
  require('include/header.php');
  include("fonksiyon.php");
    
    $mid = $_GET["makaleid"];
    if($mid == null){
      header("location: index.php");
    }
    else {
      makaleGetir($mid);
    }
    
    if(isset($_POST["submit"])){
      $id = @$_POST["id"];
      $ad = @$_POST["ad"];
      $yorum = @$_POST["yorum"];
      yorumYap($id, $ad, $yorum);
      header("location: makale.php?makaleid=".$id."");
    }
    
    
?>
      
       <div class='panel panel-default'>
       <div class='panel-body' style='background-color: #eee;'>
            <div class = 'panel panel-default'>
              <form action = "makale.php" method = "POST">
                <table>
                  <tr>
                    <td>Ad: </td>
                    <td><input type = "text" name = "ad" /></td>
                  </tr>
                  <tr>
                    <td>Yorum: </td>
                    <td><textarea name = "yorum" ></textarea></td>
                  </tr>
                  <tr>
                    <td><button type = "submit" name = "submit" value = "{$mid}">Yorum Yap</button></td>
                  </tr>
                  <tr>
                    <td><input type = "hidden" name = "id" value = "<?php print $mid ?>" /></td>
                  </tr>
                </table>
              </form>
            </div>
            <?php yorumGetir($mid); ?>
          </div>
       </div>
      
      <?php
    
    
  require('include/aside.php');
  require('include/footer.php');
?>

  