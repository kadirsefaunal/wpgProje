<?php
    include("ayar.php");
    session_start();
    print "admin panel";
    if(!isset($_SESSION["kID"])){
        $kAdi = $_POST["kullaniciadi"];
        $kParola = $_POST["kullaniciparola"];
        $komut = $db->prepare("SELECT * FROM kullanicilar WHERE KullaniciAdi = ? AND KullaniciSifre = ?");
        $komut->execute(array($kAdi, $kParola));
        $sonuc = $komut->fetch(PDO::FETCH_ASSOC);
        if ($komut->rowCount()) { 
            
            $_SESSION["kID"] = $sonuc["KullaniciID"];
            $_SESSION["kAdi"] = $sonuc["KullaniciAdi"];
            echo $_SESSION["kID"]. "<br />". $_SESSION["kAdi"];
            print "Hoş Geldin ". $_SESSION["kAdi"];
            print "<a href='cikis.php'>Çıkış</a>";
        }else{
            header("location: login.php");
        }
    }
    else{
        print "Hoş Geldin ". $_SESSION["kAdi"];
        print "<a href='cikis.php'>Çıkış</a>";
    }
?>
