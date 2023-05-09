<?php
    require_once "header.php";
    require_once 'sorgu.php';
?>
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
        <form action="netting/islem.php" method="post">
            
            <div class="form-floating mt-2">
                <textarea class="form-control" name="yazi_detay" id="text" required></textarea>
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
                    <button onclick="gonder()" name="gonder" id="submitButton" class="btn btn-primary fw-bold">Share</button>
                <?php } else { ?>
                    <a id="submitButton" class="btn btn-danger fw-bold" href="log.php">
                        Sign In
                    </a>
                <?php } ?>

            </div>

        </form>
        <h2 class="mt-2">Latest Updates</h2>
        <div id="sonuc" class="list-group mt-2">
            <?php
            $yazisor = $db->prepare("SELECT yazi.*,kullanici.* FROM yazi INNER JOIN kullanici ON yazi.kullanici_id=kullanici.kullanici_id where yazi_durum=:durum order by yazi_zaman DESC limit 10");

            $yazisor->execute([
                'durum' => 1
            ]);
            while ($yazicek = $yazisor->fetch(PDO::FETCH_ASSOC)) {
                $zaman = $yazicek['yazi_zaman'];
                $sonuc = explode(" ", $zaman);
            ?>
                <?php if ($yazicek['yazi_secenek'] == 0) { ?>
                    <div class="bg-white mt-2 d-flex gap-2">
                        <img src="https://randomuser.me/api/portraits/women/12.jpg" class="float-start rounded d-block" height="30px">
                        <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill justify-content-end p-2" style="background-color: #34c759;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"><button class="heartButton">❤️</button><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #34c759;">71</span></span>
                    </div>

                <?php } elseif ($yazicek['yazi_secenek'] == 1) { ?>
                    <div class="bg-white mt-2 d-flex gap-2">
                        <img src="https://randomuser.me/api/portraits/women/59.jpg" class="float-start rounded d-block" height="30px">
                        <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill text-dark p-2" style="background-color: #ffcc00;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"><button class="heartButton">❤️</button><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-dark" style="background-color: #ffcc00;">23</span></span>
                    </div>

                <?php } elseif ($yazicek['yazi_secenek'] == 2) { ?>
                    <div class="bg-white mt-2 d-flex gap-2">
                        <img src="https://randomuser.me/api/portraits/men/25.jpg" class="float-start rounded d-block" height="30px">
                        <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill p-2" style="background-color: #ff3b30;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"><button class="heartButton">❤️</button><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #ff3b30;">11</span></span>
                    </div>

            <?php 
                    }
                }
            ?>
        </div>
        <h2 class="mt-2">Featured Updates</h2>
        <div id="sonuc" class="list-group">
            <?php
            $yazisor = $db->prepare("SELECT yazi.*,kullanici.* FROM yazi INNER JOIN kullanici ON yazi.kullanici_id=kullanici.kullanici_id where yazi_durum=:durum order by yazi_zaman DESC limit 10");

            $yazisor->execute([
                'durum' => 1
            ]);
            while ($yazicek = $yazisor->fetch(PDO::FETCH_ASSOC)) {
                $zaman = $yazicek['yazi_zaman'];
                $sonuc = explode(" ", $zaman);
            ?>
                <?php if ($yazicek['yazi_secenek'] == 0) { ?>
                    <div class="bg-white mt-2 d-flex gap-2">
                        <img src="https://randomuser.me/api/portraits/women/34.jpg" class="float-start rounded d-block" height="30px">
                        <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill justify-content-end p-2" style="background-color: #34c759;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"><button class="heartButton">❤️</button><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #34c759;">71</span></span>
                    </div>

                <?php } elseif ($yazicek['yazi_secenek'] == 1) { ?>
                    <div class="bg-white mt-2 d-flex gap-2">
                        <img src="https://randomuser.me/api/portraits/women/54.jpg" class="float-start rounded d-block" height="30px">
                        <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill text-dark p-2" style="background-color: #ffcc00;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"><button class="heartButton">❤️</button><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-dark" style="background-color: #ffcc00;">23</span></span>
                    </div>

                <?php } elseif ($yazicek['yazi_secenek'] == 2) { ?>
                    <div class="bg-white mt-2 d-flex gap-2">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="float-start rounded d-block" height="30px">
                        <span class="badge pill text-bg-dark p-2"><?php echo $yazicek['kullanici_ad'] ?></span>
                        <span class="badge pill text-bg-light flex-grow-1 p-2 text-start"><?php echo $yazicek['yazi_detay'] ?></span>
                        <span class="badge pill p-2" style="background-color: #ff3b30;"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-light p-2 position-relative"><button class="heartButton">❤️</button><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #ff3b30;">11</span></span>
                    </div>

            <?php 
                    }
                }
            ?>
        </div>
    </div>
</div>
<footer class="footer mt-auto mb-2 py-3 bg-light rounded">
    <div class="container-fluid text-center">
        <span class="text-muted fw-bold">© <?php echo date("Y"); ?> Yuppie Poff.</span>
    </div>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
  $(".heartButton").click(function() {
    var postId = $(this).data('yazi_id');
    var likeCount = $(this).find('.like-count').text();
    $.ajax({
      url: 'update_like_count.php',
      type: 'POST',
      data: {'postId': postId},
      success: function(response) {
        if (response.status == 'success') {
          likeCount++;
          $(this).find('.like-count').text(likeCount);
        } else {
          alert('An error occurred while updating the like count.');
        }
      },
      error: function() {
        alert('An error occurred while sending the AJAX request.');
      }
    });
  });
});

$(document).ready(function() {
  $('.heartButton').click(function() {
    var yaziId = $(this).data('yazi_id');
    $.ajax({
      method: 'POST',
      url: 'likes.php',
      data: { yazi_id: yaziId },
      success: function(data) {
        alert('Like count updated!');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('An error occurred while updating the like count.');
      }
    });
  });
});
</script>
</body>
</html>