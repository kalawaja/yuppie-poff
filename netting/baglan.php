<?php

try {



    $db = new PDO("mysql:host=localhost;dbname=yuppie;charset=utf8", 'kalawaja', '23340');

    //echo "veritabanı bağlantısı başarılı";
} catch (PDOExpception $e) {



    echo $e->getMessage();
}
