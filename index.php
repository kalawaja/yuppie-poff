<?php require_once "header.php";

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
                <textarea class="form-control" name="yazi_detay" placeholder="Leave a comment here" id="text" required></textarea>
                <label for="floatingTextarea">Comments</label>
            </div>
            <div class="btn-group mt-2 d-flex" role="group" aria-label="Basic radio toggle button group">

                <input type="radio" name="yazi_secenek" class="btn-check" value="0" id="mutlu" autocomplete="off" checked>
                <label class="btn btn-outline-success" for="mutlu">😀 Yuppie</label>
                <span>&nbsp;&nbsp;</span>
                <input type="radio" name="yazi_secenek" class="btn-check" value="1" id="notr" autocomplete="off">
                <label class="btn btn-outline-warning" for="notr">😐 Ehh</label>
                <span>&nbsp;&nbsp;</span>
                <input type="radio" name="yazi_secenek" class="btn-check" value="2" id="uzgun" autocomplete="off">
                <label class="btn btn-outline-danger" for="uzgun">😔 Poff</label>
                <span>&nbsp;&nbsp;</span>
                <?php

                if (isset($_SESSION['kullanici_mail'])) {
                ?>
                    <button onclick="gonder()" name="gonder" id="submitButton" class="btn btn-primary fw-bold">Submit</button>
                <?php } else { ?>
                    <a id="submitButton" class="btn btn-danger fw-bold" href="log.php">
                        Giriş Yap
                    </a>
                <?php } ?>
            </div>

        </form>
        <h2 class="mt-2 mb-2">Latest Updates</h2>
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
                    <div class="list-group-item list-group-item-action bg-white border border-success mt-2"><span class="badge pill text-bg-primary"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-dark"><?php echo $yazicek['kullanici_ad'] ?></span> <span class="badge pill text-bg-light"><?php echo $yazicek['yazi_detay'] ?></span>
                    </div>
                <?php } elseif ($yazicek['yazi_secenek'] == 1) { ?>
                    <div class="list-group-item list-group-item-action bg-white border border-warning mt-2"><span class="badge pill text-bg-primary"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-dark"><?php echo $yazicek['kullanici_ad'] ?></span> <span class="badge pill text-bg-light"><?php echo $yazicek['yazi_detay'] ?></span>
                    </div>
                <?php } elseif ($yazicek['yazi_secenek'] == 2) { ?>
                    <div class="list-group-item list-group-item-action bg-white border border-danger mt-2"><span class="badge pill text-bg-primary"><?php echo $sonuc[1] ?></span>
                        <span class="badge pill text-bg-dark"><?php echo $yazicek['kullanici_ad'] ?></span> <span class="badge pill text-bg-light"><?php echo $yazicek['yazi_detay'] ?></span>
                    </div>
            <?php  }
            } ?>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>