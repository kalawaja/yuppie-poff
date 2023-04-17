<?php
ob_start();
@session_start();


function islemkontrol()
{

    if (empty($_SESSION['kullanici_mail'])) {

        Header("Location:404.php");
        exit;
    }
}
