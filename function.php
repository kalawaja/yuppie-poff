<?php

include 'netting/baglan.php';
require 'config.php';

$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$status = $_POST['status'];
$yazikullanici_id = $_POST['yazikullanici_id'];

$sorgu = $db->prepare("SELECT * FROM ratings Where post_id=:post_id and user_id=:user_id");
$sorgu->execute([
    'post_id' => $post_id,
    'user_id' => $user_id

]);
$say = $sorgu->rowCount();

if ($say > 0) {
    $sorgucek = $sorgu->fetch(PDO::FETCH_ASSOC);
    if ($sorgucek['status'] == $status) {
        $sorgu = $db->prepare("DELETE FROM ratings Where post_id=:post_id and user_id=:user_id");
        $sorgu->execute([
            'post_id' => $post_id,
            'user_id' => $user_id

        ]);
        echo "delete" . $status;
    } else {
        $sorgu = $db->prepare("UPDATE  ratings SET 'status'=$status where  post_id=:post_id and user_id=:user_id");
        $sorgu->execute([
            'post_id' => $post_id,
            'user_id' => $user_id

        ]);
        echo "changeto" . $status;
    }
} else {

    $ekle = $db->prepare('INSERT INTO ratings SET
        post_id=:post_id,
        user_id=:user_id,
        status=:status,
        yazikullanici_id=:yazikullanici_id
        ');
    $insert = $ekle->execute([
        'post_id' => htmlspecialchars($post_id),
        'user_id' => htmlspecialchars($user_id),
        'status' => htmlspecialchars($status),
        'yazikullanici_id' => htmlspecialchars($yazikullanici_id)
    ]);

    echo "new" . $status;
}