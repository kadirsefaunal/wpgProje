<?php
  include("ayar.php");
  require('include/header.php');
  include("fonksiyon.php");
    
    $mid = $_GET["makaleid"]; //makaleid yollandıysa makaleyi getir
    if($mid == null){
      header("location: index.php");
    }
    else {
      makaleGetir($mid);
    }
    
    if(isset($_POST["submit"])){ //yorum yapıldıysa yorumu kaydet ve sayfayı yenile
      $id = @$_POST["id"];
      $ad = @$_POST["ad"];
      $yorum = @$_POST["yorum"];
      if($ad != null && $yorum != null){
        yorumYap($id, $ad, $yorum);
      }
      header("location: makale.php?makaleid=".$id."");
    }
?>
      
<div class='panel panel-default'>
    <div class='panel-body' style='background-color: #eee;'>
         <div class = 'panel panel-default'>
             <div class = "yorumalani">
                 <form action = "makale.php" method = "POST">
                     <p>Ad:</p>
                     <p><input type = "text" class="form-control"  name = "ad" /></p>
                     <p>Yorum:</p>
                     <p><textarea class="form-control" name = "yorum" rows="3"></textarea></p>
                     <button class="btn btn-primary" type = "submit" name = "submit" value = "{$mid}">Yorum Yap</button>
                     <input type = "hidden" name = "id" value = "<?php print $mid ?>" />
                 </form>
             </div>
         </div>
             <?php yorumGetir($mid); ?><!--yorumları listeler-->
    </div>
</div>
      
<?php    
  require('include/aside.php');
  require('include/footer.php');
?>

  