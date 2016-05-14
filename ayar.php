<?php
$kullanici = "root";
$parola = "";
try {
     $db = new PDO("mysql:host = localhost; dbname = wpgblogvt", $kullanici, $parola);
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>