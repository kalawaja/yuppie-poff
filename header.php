<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');
error_reporting(0);
require_once 'netting/baglan.php';
require_once 'netting/fonksiyon.php';

if (isset($_SESSION['kullanici_mail'])) {


    $kullanicisor = $db->prepare("SELECT iller.*,kullanici.* FROM kullanici INNER JOIN iller ON kullanici.id=iller.id where kullanici_mail=:mail");
    $kullanicisor->execute(array(
        'mail' => $_SESSION['kullanici_mail']
    ));
    $say = $kullanicisor->rowCount();
    $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    //Kullanıcı ID Session Atama
    if (!isset($_SESSION['kullanici_id'])) {

        $_SESSION['kullanici_id'] = $kullanicicek['kullanici_id'];
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Yuppie | Poff</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>

<body>
    <div class="container-sm">

        <div class="row mt-2">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary rounded fw-bold">
                    <div class="container-fluid">
                        <a class="navbar-brand text-light" href="index.php"> Yuppie Poff </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">

                                <?php if (isset($_SESSION['kullanici_mail'])) { ?>
                                    <li class="nav-item">
                                        <button class="btn nav-link" type="button">
                                            <i class="bi bi-person-circle me-2"></i>
                                            <a href="user.php" class="text-light text-decoration-none">Profile</a>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn nav-link" type="button">
                                            <i class="bi bi-person-circle me-2"></i>
                                            <a href="logout.php" class="text-light text-decoration-none">Sign Out</a>
                                        </button>
                                    </li>

                                <?php } else { ?>
                                    <li class="nav-item">
                                        <button class="btn nav-link" type="button">
                                            <i class="bi bi-person-circle me-2"></i>
                                            <a href="log.php" class="text-light text-decoration-none">Sign In</a>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn nav-link" type="button">
                                            <i class="bi bi-person-circle me-2"></i>
                                            <a href="reg.php" class="text-light text-decoration-none">Sign Up</a>
                                        </button>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>