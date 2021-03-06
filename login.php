<?php
    include("ayar.php");
    session_start();
    if(!isset($_SESSION["kID"])){ //Sayfa post edildiyse kullanıcının olup olmadığını kontrol yap ve giriş yap
        $kAdi = @$_POST["kullaniciadi"];
        $kParola = @$_POST["kullaniciparola"];
        if($kAdi != null && $kParola != null){
            $komut = $db->prepare("SELECT * FROM kullanicilar WHERE KullaniciAdi = ? AND KullaniciSifre = ?");
            $komut->execute(array($kAdi, $kParola));
            $sonuc = $komut->fetch(PDO::FETCH_ASSOC);
            if ($komut->rowCount()) { 
                $_SESSION["kID"] = $sonuc["KullaniciID"];
                $_SESSION["kAdi"] = $sonuc["KullaniciAdi"];
                header("location: admin.php");
            }else{
                print "<center><div class='alert alert-danger' role='alert'>Kullanıcı adı yada parola hatalı</div></center>";
            }
        }
    }
    else{
        header("location: admin.php");
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/login.css" rel="stylesheet" />
        <title>Admin Paneli Giriş</title>
	</head>
    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" action = "login.php" method = "POST">
                    <h3><b>Admin Paneli</b></h3>
                    <div class="cizgi"></div>
                    <input type="text" placeholder="Kullanıcı Adı" name = "kullaniciadi"/>
                    <input type="password" placeholder="Parola" name = "kullaniciparola"/>
                    <button type = submit>GİRİŞ</button>
                </form>
            </div>
         </div>
    </body>
</html>