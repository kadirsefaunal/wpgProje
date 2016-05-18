<?php //Veritabanı bağlantısı
    $kullanici = "root";
    $parola = "";
    try {
        $db = new PDO("mysql:host=localhost; dbname=wpgblogvt; charset=utf8", $kullanici, $parola);
    } catch ( PDOException $e ){
        print $e->getMessage();
    }
?>
