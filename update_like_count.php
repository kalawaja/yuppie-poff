<?php

// Veritabanı bağlantısı yapılır.
$db = new PDO("mysql:host=localhost;dbname=yuppie;charset=utf8", 'kalawaja', '23340');

// Post id'si alınır.
$postId = $_POST['postId'];

// Beğeni sayısı güncellenir.
$updateQuery = $db->prepare('UPDATE yazi SET likes=likes+1 WHERE yazi_id=:id');
$updateQuery->execute([
  'id' => $postId,
]);

// İşlem başarılı ise "success" yanıtı döndürülür.
echo json_encode(['status' => 'success']);

?>