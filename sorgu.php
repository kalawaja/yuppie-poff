<?php

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-01-01' and '2023-01-31' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$ocakyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-02-01' and '2023-02-28' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$subatyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-03-01' and '2023-03-31' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$martyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-04-01' and '2023-04-30' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$nisanyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-05-01' and '2023-05-31' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$mayisyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-06-01' and '2023-06-30' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$haziranyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-07-01' and '2023-07-31' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$temmuzyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-08-01' and '2023-08-31' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$agustosyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-09-01' and '2023-09-30' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$eylulyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-10-01' and '2023-10-31' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$ekimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-11-01' and '2023-11-30' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$kasimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-12-01' and '2023-12-31' and yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$aralikyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

// MUTLU BAŞLANGIÇ

$mutluyazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where  yazi_durum=:durum and yazi_secenek=:secenek");
$mutluyazisay->execute(array(
    'durum' => 1,
    'secenek' => 0

));
$mutluyazisaycek = $mutluyazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-01-01' and '2023-01-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'durum' => 1,
    'secenek' => 0

));
$mutluocakyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-02-01' and '2023-02-28' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutlusubatyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-03-01' and '2023-03-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutlumartyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-04-01' and '2023-04-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutlunisanyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-05-01' and '2023-05-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutlumayisyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-06-01' and '2023-06-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutluhaziranyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-07-01' and '2023-07-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutlutemmuzyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-08-01' and '2023-08-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutluagustosyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-09-01' and '2023-09-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutlueylulyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-10-01' and '2023-10-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutluekimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-11-01' and '2023-11-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutlukasimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-12-01' and '2023-12-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 0,
    'durum' => 1

));
$mutluaralikyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);


//MUTLU BİTİŞ

// notr BAŞLANGIÇ

$notryazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where  yazi_durum=:durum and yazi_secenek=:secenek");
$notryazisay->execute(array(
    'durum' => 1,
    'secenek' => 1

));
$notryazisaycek = $notryazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-01-01' and '2023-01-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'durum' => 1,
    'secenek' => 1

));
$notrocakyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-02-01' and '2023-02-28' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrsubatyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-03-01' and '2023-03-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrmartyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-04-01' and '2023-04-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrnisanyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-05-01' and '2023-05-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrmayisyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-06-01' and '2023-06-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrhaziranyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-07-01' and '2023-07-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrtemmuzyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-08-01' and '2023-08-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notragustosyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-09-01' and '2023-09-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notreylulyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-10-01' and '2023-10-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrekimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-11-01' and '2023-11-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notrkasimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-12-01' and '2023-12-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 1,
    'durum' => 1

));
$notraralikyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);


//notr BİTİŞ

// uzgun BAŞLANGIÇ

$uzgunyazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where  yazi_durum=:durum and yazi_secenek=:secenek");
$uzgunyazisay->execute(array(
    'durum' => 1,
    'secenek' => 2

));
$uzgunyazisaycek = $uzgunyazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-01-01' and '2023-01-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'durum' => 1,
    'secenek' => 2

));
$uzgunocakyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-02-01' and '2023-02-28' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunsubatyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-03-01' and '2023-03-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunmartyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-04-01' and '2023-04-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunnisanyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-05-01' and '2023-05-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunmayisyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-06-01' and '2023-06-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunhaziranyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-07-01' and '2023-07-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzguntemmuzyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-08-01' and '2023-08-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunagustosyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-09-01' and '2023-09-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzguneylulyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-10-01' and '2023-10-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunekimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-11-01' and '2023-11-30' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunkasimyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where yazi_tarih BETWEEN '2023-12-01' and '2023-12-31' and yazi_durum=:durum and yazi_secenek=:secenek");
$yazisay->execute(array(
    'secenek' => 2,
    'durum' => 1

));
$uzgunaralikyazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);


//uzgun BİTİŞ