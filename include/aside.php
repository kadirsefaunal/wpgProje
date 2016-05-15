</div>
<div class="col-md-4">
  <div class="panel panel-default">
   	<div class="panel-heading">Son Yazılar</div>
    <div class="panel-body">
    <ul class="liste">
    <?php //Son makale listeleme
      include("ayar.php");
      $query = $db->query("SELECT MakaleID, MakaleBaslik FROM makale ORDER BY MakaleID DESC, MakaleBaslik LIMIT 0,5", PDO::FETCH_ASSOC);
      if ( $query->rowCount() ){
        foreach( $query as $row ){              
          print "<li><a href = \"makale.php?makaleid={$row['MakaleID']}\">" . $row["MakaleBaslik"] . "</a></li>";
        }
      }
    ?>
    </ul>
    </div>
  </div>
  <div class="panel panel-default">
   	<div class="panel-heading">Kategoriler</div>
    <div class="panel-body">
    <ul class="liste">
      <li><a href = "kategori.php?kategori=Yazılım">Yazılım</a></li>
      <li><a href = "kategori.php?kategori=Donanım">Donanım</a></li>
      <li><a href = "kategori.php?kategori=KonuDışı">Konu Dışı</a></li>
    </ul>
    </div>
  </div>
</div>
</div>
</div>
  
