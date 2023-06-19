<?php
require_once "header.php";
require_once 'sorgu.php';
?>
<style>
    .selected,
    .like,
    .dislike {
        color: black;
        border: none;
        background: transparent;
        outline: none;
    }

    .like {
        color: green;
    }

    .dislike {
        color: red;
    }
</style>
<div class="row mt-2 mb-2">
    <div class="col-sm-12">
        <div class="d-flex">
            <canvas id="chart" height="20px" width="100%"></canvas>
            <script>
                var chart = document.getElementById("chart").getContext('2d');
                var myChart = new Chart(chart, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [{
                                label: "😀 Yuppie",
                                data: [
                                    <?php echo $mutluocakyazisaycek['say'] ?>,
                                    <?php echo $mutlusubatyazisaycek['say'] ?>,
                                    <?php echo $mutlumartyazisaycek['say'] ?>,
                                    <?php echo $mutlunisanyazisaycek['say'] ?>,
                                    <?php echo $mutlumayisyazisaycek['say'] ?>,
                                    <?php echo $mutluhaziranyazisaycek['say'] ?>,
                                    <?php echo $mutlutemmuzyazisaycek['say'] ?>,
                                    <?php echo $mutluagustosyazisaycek['say'] ?>,
                                    <?php echo $mutlueylulyazisaycek['say'] ?>,
                                    <?php echo $mutluekimyazisaycek['say'] ?>,
                                    <?php echo $mutlukasimyazisaycek['say'] ?>,
                                    <?php echo $mutluaralikyazisaycek['say'] ?>

                                ],
                                borderColor: [
                                    '#198754',

                                ]
                            },
                            {
                                label: "😐 Ehh",
                                data: [
                                    <?php echo $notrocakyazisaycek['say'] ?>,
                                    <?php echo $notrsubatyazisaycek['say'] ?>,
                                    <?php echo $notrmartyazisaycek['say'] ?>,
                                    <?php echo $notrnisanyazisaycek['say'] ?>,
                                    <?php echo $notrmayisyazisaycek['say'] ?>,
                                    <?php echo $notrhaziranyazisaycek['say'] ?>,
                                    <?php echo $notrtemmuzyazisaycek['say'] ?>,
                                    <?php echo $notragustosyazisaycek['say'] ?>,
                                    <?php echo $notreylulyazisaycek['say'] ?>,
                                    <?php echo $notrekimyazisaycek['say'] ?>,
                                    <?php echo $notrkasimyazisaycek['say'] ?>,
                                    <?php echo $notraralikyazisaycek['say'] ?>
                                ],
                                borderColor: [
                                    '#ffc107',

                                ]
                            },
                            {
                                label: "😔 Poff",
                                data: [
                                    <?php echo $uzgunocakyazisaycek['say'] ?>,
                                    <?php echo $uzgunsubatyazisaycek['say'] ?>,
                                    <?php echo $uzgunmartyazisaycek['say'] ?>,
                                    <?php echo $uzgunnisanyazisaycek['say'] ?>,
                                    <?php echo $uzgunmayisyazisaycek['say'] ?>,
                                    <?php echo $uzgunhaziranyazisaycek['say'] ?>,
                                    <?php echo $uzguntemmuzyazisaycek['say'] ?>,
                                    <?php echo $uzgunagustosyazisaycek['say'] ?>,
                                    <?php echo $uzguneylulyazisaycek['say'] ?>,
                                    <?php echo $uzgunekimyazisaycek['say'] ?>,
                                    <?php echo $uzgunkasimyazisaycek['say'] ?>,
                                    <?php echo $uzgunaralikyazisaycek['say'] ?>,
                                ],
                                borderColor: [
                                    '#dc3545',
                                ]
                            }
                        ]
                    }
                });
            </script>
        </div>


        <h2 class="mt-2 mb-2">What Do You Think?</h2>
        <form action="netting/islem.php" method="post" id="jquery-ajax">

            <div class="form-floating mt-2">
                <textarea class="form-control" name="yazi_detay" id="mesaj-alani" required></textarea><br>
                <b></b>
                <label for="floatingTextarea">Comments</label>
            </div>

            <div class="btn-group mt-2 d-flex gap-2" role="group">

                <input type="radio" name="yazi_secenek" class="btn-check" value="0" id="mutlu" autocomplete="off">
                <label class="btn btn-outline-success fw-bold" for="mutlu">😀 Yuppie</label>
                <input type="radio" name="yazi_secenek" class="btn-check" value="1" id="notr" autocomplete="off">
                <label class="btn btn-outline-warning fw-bold" for="notr">😐 Ehh</label>
                <input type="radio" name="yazi_secenek" class="btn-check" value="2" id="uzgun" autocomplete="off">
                <label class="btn btn-outline-danger fw-bold" for="uzgun">😔 Poff</label>
                <?php

                if (isset($_SESSION['kullanici_mail'])) {
                ?>
                    <button onclick="gonder()" name="gonder" id="submitButton" class="btn btn-primary fw-bold rounded-end">Share</button>
                    <button disabled="" id="limityouract" class="btn btn-primary fw-bold">Sınırı Açtınız</button>

                <?php } else { ?>
                    <a id="submitButton" class="btn btn-danger fw-bold" href="log.php">
                        Sign In
                    </a>
                <?php } ?>

            </div>

        </form>
        <h2 class="mt-2">Featured Updates</h2>
        <div class="list-group">

            <?php
            $yazisor = $db->prepare("SELECT COUNT(ratings.id) as yazisay, kullanici.*,ratings.*,yazi.* FROM ratings INNER JOIN kullanici ON ratings.yazikullanici_id=kullanici.kullanici_id INNER JOIN yazi ON ratings.post_id=yazi.yazi_id  where status=:st  GROUP BY ratings.post_id  order by yazisay DESC limit 10");

            $yazisor->execute([
                'st' => 'like'

            ]);
            $deneme = $yazisor->rowCount();


            while ($yazicek = $yazisor->fetch(PDO::FETCH_ASSOC)) {
                $zaman = $yazicek['yazi_zaman'];
                $sonuc = explode(" ", $zaman);
                if ($yazicek['yazi_secenek'] == 0) {
            ?>

                    <div class="bg-white mt-2 d-flex gap-1 align-middle">
                        <a href="<?= seo($yazicek['kullanici_ad'] . "-") . "-" . $yazicek['kullanici_id'] ?>">
                            <img src="img<?php echo $yazicek['kullanici_profil'] ?>" class="float-start rounded d-block" height="30px"></a>
                            <a href="<?= seo($yazicek['kullanici_ad'] . "-") . "-" . $yazicek['kullanici_id'] ?>">
                            <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        </a>

                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo  $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill p-2" style="background-color: #34c759;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"></span>
                        <span class="badge pill text-bg-light p-2 position-relative"></span>
                    </div>
                <?php } else if ($yazicek['yazi_secenek'] == 1) { ?>

                    <div class="bg-white mt-2 d-flex gap-1 align-middle">
                        <a href="<?= seo($yazicek['kullanici_ad'] . "-") . "-" . $yazicek['kullanici_id'] ?>">
                            <img src="img<?php echo $yazicek['kullanici_profil'] ?>" class="float-start rounded d-block" height="30px">
                        </a>
                        <a href="<?= seo($yazicek['kullanici_ad'] . "-") . "-" . $yazicek['kullanici_id'] ?>">
                            <span class="badge pill bg-dark bg-gradient p-2"><?php echo $post['kullanici_ad'] ?></span>
                        </a>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo  $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill p-2" style="background-color: #ffcc00;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"></span>
                        <span class="badge pill text-bg-light p-2 position-relative"></span>
                    </div>
                <?php } else if ($yazicek['yazi_secenek'] == 2) { ?>

                    <div class="bg-white mt-2 d-flex gap-1 align-middle">
                        <a href="<?= seo($yazicek['kullanici_ad'] . "-") . "-" . $yazicek['kullanici_id'] ?>">
                            <img src="img<?php echo $yazicek['kullanici_profil'] ?>" class="float-start rounded d-block" height="30px">
                        </a>
                        <a href="<?= seo($yazicek['kullanici_ad'] . "-") . "-" . $yazicek['kullanici_id'] ?>">
                            <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        </a>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo  $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill p-2" style="background-color: #ff3b30;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"></span>
                    </div>
            <?php  }
            }

            ?>

        </div>
        <h2 class="mt-2">Latest Updates</h2>
        <div id="sonuc" class="list-group mt-2">

            <?php
            require 'config.php';

            $user_id = $_SESSION['kullanici_id'];
            $posts = mysqli_query($conn, 'SELECT kullanici.*,yazi.* FROM yazi INNER JOIN kullanici ON yazi.kullanici_id=kullanici.kullanici_id order by yazi_zaman DESC limit 10');
            foreach ($posts as $post) :
                $post_id = $post['yazi_id'];
                $likesCount = mysqli_fetch_assoc(mysqli_query(
                    $conn,
                    "SELECT COUNT(*) AS likes FROM ratings WHERE post_id=$post_id AND status = 'like' "
                ))['likes'];

                $dislikesCount = mysqli_fetch_assoc(mysqli_query(
                    $conn,
                    "SELECT COUNT(*) AS dislikes FROM ratings WHERE post_id=$post_id AND status = 'dislike' "
                ))['dislikes'];

                $status = mysqli_query($conn, "SELECT status FROM ratings WHERE post_id=$post_id AND user_id=$user_id");
                if (mysqli_num_rows($status) > 0) {
                    $status = mysqli_fetch_assoc($status)['status'];
                } else {
                    $status = 0;
                }


            ?>

                <?php
                $zaman = $post['yazi_zaman'];
                $sonuc = explode(" ", $zaman);
                if ($post['yazi_secenek'] == 0) {
                ?>
                    <div class="bg-white mt-2 d-flex gap-1 align-middle">
                        <a href="<?= seo($post['kullanici_ad'] . "-") . "-" . $post['kullanici_id'] ?>">
                            <img src="img<?php echo $post['kullanici_profil'] ?>" class="float-start rounded d-block" height="30px">
                        </a>
                        <a href="<?= seo($post['kullanici_ad'] . "-") . "-" . $post['kullanici_id'] ?>">
                            <span class="badge pill bg-dark bg-gradient p-2"><?php echo $post['kullanici_ad'] ?></span>
                        </a>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo  $post['yazi_detay'] ?></span>
                        <span class="badge pill justify-content-end p-2" style="background-color: #34c759;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative">
                            <button class="like <?php if ($status == 'like') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?> data-kullanici-id=<?php echo $post['kullanici_id'] ?>>
                                <i class="bi bi-arrow-up"></i>
                                <span class="fw-bold likes_count<?php echo $post_id; ?>" data-count=<?php echo $likesCount; ?>><?php echo $likesCount ?></span>

                            </button>
                            <button class="dislike <?php if ($status == 'dislike') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?> data-kullanici-id=<?php echo $post['kullanici_id'] ?>>
                                <i class="bi bi-arrow-down"></i>
                                <span class="fw-bold dislikes_count<?php echo $post_id; ?>" data-count=<?php echo $dislikesCount; ?>><?php echo $dislikesCount ?></span>

                            </button>
                        </span>
                    </div>
                <?php } else if ($post['yazi_secenek'] == 1) { ?>
                    <div class="bg-white mt-2 d-flex gap-1 align-middle">
                        <a href="<?= seo($post['kullanici_ad'] . "-") . "-" . $post['kullanici_id'] ?>">
                            <img src="img<?php echo $post['kullanici_profil'] ?>" class="float-start rounded d-block" height="30px">
                        </a>
                        <a href="<?= seo($post['kullanici_ad'] . "-") . "-" . $post['kullanici_id'] ?>">
                            <span class="badge pill bg-dark bg-gradient p-2"><?php echo $post['kullanici_ad'] ?></span>
                        </a>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo  $post['yazi_detay'] ?></span>
                        <span class="badge pill text-dark p-2" style="background-color: #ffcc00;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative">
                            <button class="like <?php if ($status == 'like') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?> data-kullanici-id=<?php echo $post['kullanici_id'] ?>>
                                <i class="bi bi-arrow-up"></i>
                                <span class="fw-bold likes_count<?php echo $post_id; ?>" data-count=<?php echo $likesCount; ?>><?php echo $likesCount ?></span>

                            </button>
                            <button class="dislike <?php if ($status == 'dislike') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?> data-kullanici-id=<?php echo $post['kullanici_id'] ?>>
                                <i class="bi bi-arrow-down"></i>
                                <span class="fw-bold dislikes_count<?php echo $post_id; ?>" data-count=<?php echo $dislikesCount; ?>><?php echo $dislikesCount ?></span>

                            </button>
                        </span>
                    </div>
                <?php } else if ($post['yazi_secenek'] == 2) { ?>
                    <div class="bg-white mt-2 d-flex gap-1 align-middle">
                        <a href="<?= seo($post['kullanici_ad'] . "-") . "-" . $post['kullanici_id'] ?>">
                            <img src="img<?php echo $post['kullanici_profil'] ?>" class="float-start rounded d-block" height="30px">
                        </a>
                        <a href="<?= seo($post['kullanici_ad'] . "-") . "-" . $post['kullanici_id'] ?>">
                            <span class="badge pill bg-dark bg-gradient p-2 align-middle"><?php echo $post['kullanici_ad'] ?></span>
                        </a>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo  $post['yazi_detay'] ?></span>
                        <span class="badge pill p-2" style="background-color: #ff3b30;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill bg-light p-2 position-relative">
                            <button class="like <?php if ($status == 'like') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?> data-kullanici-id=<?php echo $post['kullanici_id'] ?>>
                                <i class="bi bi-arrow-up"></i>
                                <span class="fw-bold likes_count<?php echo $post_id; ?>" data-count=<?php echo $likesCount; ?>><?php echo $likesCount ?></span>
                            </button>

                            <button class="dislike <?php if ($status == 'dislike') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?> data-kullanici-id=<?php echo $post['kullanici_id'] ?>>
                                <i class="bi bi-arrow-down"></i>
                                <span class="fw-bold dislikes_count<?php echo $post_id; ?>" data-count=<?php echo $dislikesCount; ?>><?php echo $dislikesCount ?></span>
                            </button>
                        </span>
                    </div>
            <?php }
            endforeach ?>



            

        </div>


    </div>
</div>
<div>

</div>
<footer class="footer mt-3 mb-2 py-2 bg-light bg-gradient rounded">
    <div class="container-fluid text-center align-middle">
        <span class="text-dark fw-bold">
            © <?php echo date("Y"); ?> Yuppie Poff.
        </span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
                $('.like, .dislike').click(function() {
                    var data = {
                        post_id: $(this).data("post-id"),
                        user_id: <?php echo $user_id; ?>,
                        status: $(this).hasClass('like') ? 'like' : 'dislike',
                        yazikullanici_id: $(this).data("kullanici-id"),
                    };
                    $.ajax({
                        url: 'function.php',
                        type: 'post',
                        data: data,
                        success: function(response) {
                            var post_id = data['post_id'];
                            var likes = $('.likes_count' + post_id);
                            var likesCount = likes.data('count');
                            var dislikes = $('.dislikes_count' + post_id);
                            var dislikesCount = dislikes.data('count');

                            var likeButton = $(".like[data-post-id=" + post_id + "]");
                            var dislikeButton = $(".dislike[data-post-id=" + post_id + "]");

                            if (response == 'newlike') {
                                likes.html(likesCount + 1);
                                likeButton.addClass('selected');
                            } else if (response == 'newdislike') {
                                dislikes.html(dislikesCount + 1);
                                dislikeButton.addClass('selected');
                            } else if (response == 'changetolike') {
                                likes.html(parseInt($('.likes_count' + post_id).text()) + 1);
                                dislikes.html(parseInt($('.dislikes_count' + post_id).text()) - 1);
                                likeButton.addClass('selected');
                                dislikeButton.removeClass('selected');
                            } else if (response == 'changetodislike') {
                                likes.html(parseInt($('.likes_count' + post_id).text()) - 1);
                                dislikes.html(parseInt($('.dislikes_count' + post_id).text()) + 1);
                                likeButton.removeClass('selected');
                                dislikeButton.addClass('selected');
                            } else if (response == 'deletelike') {
                                likes.html(parseInt($('.likes_count' + post_id).text()) - 1);
                                likeButton.removeClass('selected');
                            } else if (response == 'deletedislike') {
                                dislikes.html(parseInt($('.dislikes_count' + post_id).text()) - 1);
                                dislikeButton.removeClass('selected');
                            }

                        }
                    });
                });

                
    $(function() {
        $('#limityouract').hide();
        $('#mesaj-alani').keyup(function() {
            var limit = 160;
            var say = $(this).val().length;
            if (say >= 140) {
                $('b').show();
                $('b').text("Girilen Karakter Sayısı: " + say);
            } else if (say < 140) {
                $('b').hide();
            }

            if (say >= 150) {
                $('b').css('color', 'red');
            } else if (say < 150) {
                $('b').css('color', 'black');
            }


            if (say > limit) {
                $('b').text("Limite Ulaştınız");

            }
            if (say > limit) {
                $('#submitButton').hide();
                $('#limityouract').show();


            } else {
                $('#limityouract').hide();
                $('#submitButton').show();
            }
        });


        $('#submitButton').click(function() {
            $.ajax({
                type: "POST",
                url: 'netting/islem.php',
                data: $('#jquery-ajax').serialize(),
                success: function(cevap) {

                }

            });
        });

    });
</script>
</body>
</html>