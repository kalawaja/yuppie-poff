<?php
include 'baglan.php';


if (isset($_POST["seo"])) {
    $ic = $db->prepare('SELECT * FROM yazi');
    $ic->execute();
    $var = $ic->rowCount();
    $getir = $ic->fetch(PDO::FETCH_ASSOC);

    if ($var > 0) {
        if (!isset($_COOKIE['like_artirim'])) {
            $like = $db->prepare("UPDATE yazi SET likes=likes+1");
            $likes = $like->execute();
            if ($likes) {
                echo "like";
                setcookie('like_artirim', "begeni", time() + (60 * 60 * 24 * 30));
            }
        } else {
            $unlike = $db->prepare("UPDATE yazi SET likes=likes-1");
            $unlikes = $unlike->execute();
            if ($unlikes) {
                echo "unlike";
                setcookie('like_artirim', "begeni", time() - (60 * 60 * 24 * 30 * 10));
            }
        }
    }
}