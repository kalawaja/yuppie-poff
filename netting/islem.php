<?php
ob_start();
session_start();

include 'baglan.php';
include 'fonksiyon.php';

if (isset($_POST['register'])) {


    $kullanici_kad = htmlspecialchars($_POST['kullanici_kad']);
    $kullanici_ad = htmlspecialchars($_POST['kullanici_ad']);
    $kullanici_soyad = htmlspecialchars($_POST['kullanici_soyad']);
    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    $kullanici_birth = htmlspecialchars($_POST['kullanici_birth']);

    $kullanici_passwordone = htmlspecialchars(trim($_POST['kullanici_passwordone']));

    $kullanici_passwordtwo = htmlspecialchars(trim($_POST['kullanici_passwordtwo']));

    if ($kullanici_passwordone == $kullanici_passwordtwo) {

        if (strlen($kullanici_passwordone) >= 6) {


            //Başlangıç

            $kullanicisor = $db->prepare("select * from kullanici where kullanici_mail=:mail or kullanici_kad=:kad");
            $kullanicisor->execute(array(
                'mail' => $kullanici_mail,
                'kad' => $kullanici_kad
            ));

            //dönen satır sayısını belirtir
            $say = $kullanicisor->rowCount();
            if ($say == 0) {

                //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
                $password = md5($kullanici_passwordone);

                $kullanici_yetki = 1;

                //Kullanıcı kayıt işlemi yapılıyor...
                $kullanicikaydet = $db->prepare("INSERT INTO kullanici SET
                    kullanici_kad=:kullanici_kad,
					kullanici_ad=:kullanici_ad,
                    kullanici_soyad=:kullanici_soyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
                    kullanici_birth=:kullanici_birth,
                    kullanici_gender=:kullanici_gender,
                    id=:id,
					kullanici_yetki=:kullanici_yetki
					");
                $insert = $kullanicikaydet->execute(array(
                    'kullanici_kad' => $kullanici_kad,
                    'kullanici_ad' => $kullanici_ad,
                    'kullanici_soyad' => $kullanici_soyad,
                    'kullanici_mail' => $kullanici_mail,
                    'kullanici_password' => $password,
                    'kullanici_birth' => $kullanici_birth,
                    'kullanici_gender' => htmlspecialchars($_POST['kullanici_gender']),
                    'id' => htmlspecialchars($_POST['id']),
                    'kullanici_yetki' => $kullanici_yetki
                ));

                if ($insert) {


                    header("Location:../log.php?durum=basarili");
                } else {


                    header("Location:../reg.php?durum=basarisiz");
                }
            } else {

                header("Location:../reg.php?durum=mukerrerkayit");
            }
            //Bitiş
        } else {
            header("location:../reg.php?durum=eksiksifre");
        }
    } else {
        header("location:../reg.php?durum=farklisifre");
    }
}
if (isset($_POST['giris'])) {

    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    $kullanici_password = md5(htmlspecialchars($_POST['kullanici_password']));

    $kullanicisor = $db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password");
    $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'yetki' => 1,
        'password' => $kullanici_password,
    ));
    $say = $kullanicisor->rowCount();


    if ($say == 1) {


        $kullanici_ip = $_SERVER['REMOTE_ADDR'];



        $zamanguncelle = $db->prepare("UPDATE kullanici SET


			kullanici_sonzaman=:kullanici_sonzaman,
			kullanici_sonip=:kullanici_sonip

			WHERE kullanici_mail='$kullanici_mail'");


        $update = $zamanguncelle->execute(array(


            'kullanici_sonzaman' => date("Y-m-d H:i:s"),
            'kullanici_sonip' => $kullanici_ip

        ));


        $_SESSION['kullanici_mail'] = $kullanici_mail;


        header("Location:../index.php?durum=girisbasarili");
        exit;
    } else {


        header("Location:../log.php?durum=hata");
        exit;
    }
}
if (isset($_POST['gonder'])) {
    $ekle = $db->prepare('INSERT INTO yazi SET
    kullanici_id=:kullanici_id,
    yazi_detay=:yazi_detay,
    yazi_secenek=:yazi_secenek
    ');
    $insert = $ekle->execute([
        'kullanici_id' => htmlspecialchars($_SESSION['kullanici_id']),
        'yazi_detay' => htmlspecialchars($_POST['yazi_detay']),
        'yazi_secenek' => htmlspecialchars($_POST['yazi_secenek'])
    ]);
   
    if ($insert) {
        header("Location:../index.php?durum=ok");
    } else {
        header("Location:../index.php?durum=no");
    }
}

if (isset($_POST['bilgiguncelle'])) {



    $kullaniciguncelle = $db->prepare("UPDATE kullanici Set
    
    kullanici_ad=:kullanici_ad,
    kullanici_soyad=:kullanici_soyad,
    kullanici_kad=:kullanici_kad
    
    WHERE kullanici_id={$_SESSION['kullanici_id']}");

    $update = $kullaniciguncelle->execute([
        'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
        'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
        'kullanici_kad' => htmlspecialchars($_POST['kullanici_kad'])

    ]);
    if ($update) {
        header("Location:../user.php?durum=ok");
    } else {
        header("Location:../user.php?durum=hata");
    }
}
if (isset($_POST['resimguncelle'])) {




    $izinli_uzantilar = array('jpg', 'png', 'jpeg');

    //echo $_FILES['ayar_logo']["name"];

    $ext = strtolower(substr($_FILES['kullanici_profil']["name"], strpos($_FILES['kullanici_profil']["name"], '.') + 1));


    if (in_array($ext, $izinli_uzantilar) === false) {
        echo "Bu uzantı kabul edilmiyor";
        Header("Location:../profil-ekle.php?durum=formathata");
    }
    @$tmp_name = $_FILES['kullanici_profil']["tmp_name"];
    @$name = $_FILES['kullanici_profil']["name"];

    if ($_FILES['kullanici_profil']['size'] > 1048576) {


        Header("Location:../profil-ekle.php?durum=dosyabuyuk");
        exit;
    }


    //İmage Resize İşlemleri
    include('SimpleImage.php');
    $image = new SimpleImage();
    $image->load($tmp_name);
    $image->resizeToWidth(200);

    $image->save($tmp_name);


    $uploads_dir = '../img/userphoto';



    $benzersizsayi4 = uniqid();
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . "." . $ext;


    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");


    $duzenle = $db->prepare("UPDATE kullanici SET
		kullanici_profil=:kullanici_profil
		WHERE kullanici_id={$_SESSION['kullanici_id']}");
    $update = $duzenle->execute(array(
        'kullanici_profil' => $refimgyol
    ));



    if ($update) {

        $resimsilunlink = $_POST['eski_yol'];

        unlink("../img$resimsilunlink");
        Header("Location:../profil-ekle.php?durum=ok");
    } else {

        Header("Location:../profil-ekle.php?durum=hata");
    }
}