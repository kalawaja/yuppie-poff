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