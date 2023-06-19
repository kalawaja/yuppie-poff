<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');
error_reporting(0);
require_once 'netting/baglan.php';
require_once 'netting/fonksiyon.php';
require_once 'fonksiyon.php';

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
<html lang="tr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Yuppie | Poff</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- SWEET ALERT  -->

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
        {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
        import * as bootstrap from 'bootstrap'

        new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>
    <style>
        .resim {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .resim img {
            width: 150px;
            height: 150px;
            object-fit: cover;

        }

        .resim i {
            position: absolute;
            width: 40px;
            height: 40px;
            top: 120px;
            left: 180px;
            padding: 20px;
            background-color: #0D6EFD;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #goster {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-sm">
        <div class="row mt-2">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-gradient rounded fw-bold">
                    <div class="container-fluid">
                        <a class="navbar-brand text-light" href="index.php"> Yuppie Poff </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav align-middle">

                                <?php if (isset($_SESSION['kullanici_mail'])) { ?>
                                    <ul class="profile-notification mt-1">
                                        <li class="pe-3">
                                            <div class="cart-area bg-light rounded">
                                                <a href="user.php">
                                                    <i class="bi bi-bell"></i>
                                                    <span class="bg-white text-primary bg-gradient border-primary">
                                                        <?php

                                                        $kategori_id;
                                                        /*
                                                        SELECT customers.customer_id, customers.customer_name, COUNT(orders.order_id) AS order_count FROM customers LEFT JOIN orders ON customers.customer_id = orders.customer_id GROUP BY customers.customer_id, customers.customer_name;
                                                        */

                                                        $begenisay = $db->prepare("SELECT kullanici.kullanici_id, ratings.id,ratings.post_id,ratings.user_id,yazi.yazi_id,yazi.kullanici_id, COUNT( ratings.user_id) AS liked_posts_count
                                                         FROM ratings INNER JOIN kullanici ON ratings.user_id=kullanici.kullanici_id INNER JOIN yazi ON ratings.post_id=yazi.yazi_id WHERE yazi.kullanici_id=:id and status=:st  and tiklanma=:tiklanma");
                                                        $begenisay->execute([

                                                            'id' => $_SESSION['kullanici_id'],
                                                            'st' => 'like',
                                                            'tiklanma' => 1
                                                        ]);
                                                        $saycek = $begenisay->fetch(PDO::FETCH_ASSOC);

                                                        echo $saycek['liked_posts_count'];

                                                        ?>
                                                    </span>
                                                </a>
                                                <ul>
                                                    <li class="list-group-item align-middle">
                                                        <div class="cart-single-product">
                                                            <div class="media">
                                                                <?php
                                                                    $bildirimsor = $db->prepare("SELECT ratings.*,kullanici.*,yazi.* FROM ratings INNER JOIN kullanici ON ratings.user_id=kullanici.kullanici_id INNER JOIN yazi ON ratings.post_id=yazi.yazi_id WHERE yazi.kullanici_id=:id and status=:st ORDER BY ratings.id DESC");
                                                                    $bildirimsor->execute(['id' => $_SESSION['kullanici_id'], 'st' => 'like']);
                                                                    if ($bildirimsor->rowCount() == 0) {
                                                                        echo "Burası boş...";
                                                                    } else {
                                                                        while ($bildirimcek = $bildirimsor->fetch(PDO::FETCH_ASSOC)) {
                                                                    ?> 
                                                                    <div class="container align-middle mb-2">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <a href="user.php" title="<?php echo $bildirimcek['kullanici_ad'] ?>">
                                                                                    <img class="img-thumbnail rounded object-fit" src="img<?php echo $bildirimcek['kullanici_profil'] ?>">
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <?php echo $bildirimcek['yazi_detay'] ?>
                                                                            </div>
                                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                        }
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>


                                    </ul>
                                    
                                    <li class="nav-item mt-1">

                                        <div class="btn-group">
                                            <a href="user.php"><img src="img/userphoto/648f62b89f6ff.png" class="img-fluid rounded-start" height="39" width="39"></a>
                                            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="user.php"><i class="bi bi-person-circle"></i> User Panel</a></li>
                                                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right fs-5"></i> Log Out</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="admin_iy.php"><i class="bi bi-gear"></i> Administrator</a></li>
                                                <li><a class="dropdown-item" href="help.php"><i class="bi bi-question-circle"></i> Help</a></li>
                                            </ul>
                                        </div>
                                    
                                    </li>
                                    <?php
                                    } else { ?>
                                    <li class="nav-item">
                                        <button class="btn nav-link" type="button">
                                            <a href="log.php" class="text-light text-decoration-none"><i class="bi bi-box-arrow-in-right fs-5 text-white"></i> Log In</a>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn nav-link" type="button">
                                            <a href="reg.php" class="text-light text-decoration-none"><i class="bi bi-person-plus fs-5 text-light"></i> Sign Up</a>
                                        </button>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>