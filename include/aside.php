</div>
<div class="col-md-4">
  <div class="panel panel-default">
   	<div class="panel-heading">Son Yazılar</div>
    <div class="panel-body">
    <!--<ul class="liste">-->
    <div class = "list-group" style="margin-bottom:0px;">
    <?php //Son makale listeleme
      include("ayar.php");
      $query = $db->query("SELECT MakaleID, MakaleBaslik FROM makale ORDER BY MakaleID DESC, MakaleBaslik LIMIT 0,5", PDO::FETCH_ASSOC);
      if ( $query->rowCount() ){
        foreach( $query as $row ){    
          print "<a href = \"makale.php?makaleid={$row['MakaleID']}\" class = 'list-group-item'>" . $row["MakaleBaslik"] . "</a>";
          //print "<li><a href = \"makale.php?makaleid={$row['MakaleID']}\">" . $row["MakaleBaslik"] . "</a></li>";
        }
      }
    ?>
    </div>
    <!--</ul>-->
    </div>
  </div>
  <div class="panel panel-default">
   	<div class="panel-heading">Kategoriler</div>
    <div class="panel-body">
    <!--<ul class="liste">
      <li><a href = "kategori.php?kategori=Yazılım">Yazılım</a></li>
      <li><a href = "kategori.php?kategori=Donanım">Donanım</a></li>
      <li><a href = "kategori.php?kategori=KonuDışı">Konu Dışı</a></li>
    </ul>-->
    <?php
      include("ayar.php");
      $yazilim = $db->query("SELECT COUNT(*) FROM makale WHERE Kategori = 'Yazılım'", PDO::FETCH_ASSOC)->fetchColumn();
      $donanim = $db->query("SELECT COUNT(*) FROM makale WHERE Kategori = 'Donanım'", PDO::FETCH_ASSOC)->fetchColumn();
      $konuDisi = $db->query("SELECT COUNT(*) FROM makale WHERE Kategori = 'KonuDışı'", PDO::FETCH_ASSOC)->fetchColumn();
    ?>
    <div class="list-group" style="margin-bottom:0px;">
      <a href="kategori.php?kategori=Yazılım" class="list-group-item"><span class="badge"><?php print $yazilim; ?></span>Yazılım</a>
      <a href="kategori.php?kategori=Donanım" class="list-group-item"><span class="badge"><?php print $donanim; ?></span>Donanım</a>
      <a href="kategori.php?kategori=KonuDışı" class="list-group-item"><span class="badge"><?php print $konuDisi; ?></span>Konu Dışı</a>
    </div>
    </div>
  </div>
</div>
</div>
</div>
  
 