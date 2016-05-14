</div>
<div class="col-md-4">
  <div class="panel panel-default">
   	<div class="panel-heading">Son Yazılar</div>
    <div class="panel-body">
    <ul class="liste">
    <?php 
    $query = $db->query("SELECT MakaleBaslik FROM makale ORDER BY MakaleID DESC, MakaleBaslik LIMIT 0,5", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
      foreach( $query as $row ){
                        
        print "<li>" . $row["MakaleBaslik"] . "</li>";
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
      <li>Yazılım</li>
      <li>Donanım</li>
      <li>Konu Dışı</li>
    </ul>
    </div>
  </div>
</div>
</div>
</div>
  
