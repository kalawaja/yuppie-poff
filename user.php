<?php
require_once "header.php";

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where  yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));

$yazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);

require_once 'sorgu.php';
?>

<div class="row mt-2 mb-2">
    <div class="col-sm-12 mt-2">
        <!-- USER PANEL -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="resim">
                            <img src="img<?php echo $kullanicicek['kullanici_profil'] ?>" class="rounded-circle mb-3">
                            <a href="profil-ekle.php">
                                <i class="bi bi-person-gear"></i>
                            </a>
                        </div>

                        <div class="container w-50 mb-3 fs-3">
                            <div class="row">
                                <div class="col-3">
                                    <a href="https://twitter.com/#" target="_blank"><i class="bi bi-twitter"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="https://facebook.com/#" target="_blank"><i class="bi bi-facebook"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="https://instagram.com/#" target="_blank"><i class="bi bi-instagram"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="https://github.com/#" target="_blank"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mb-3"><a href="edit.php" class="text-decoration-none text-light">Edit Your Profile</a></button>

                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto w-100 fs-5">
                                    <div class="fw-bold"><?php echo $kullanicicek['kullanici_ad'] . " " . $kullanicicek['kullanici_soyad'] ?></div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Comments</div>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php echo $yazisaycek['say']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Score</div>
                                </div>
                                <?php

                                $scorsay = $db->prepare("SELECT COUNT(*) AS beğeni_sayısı FROM ratings where yazikullanici_id=:id and status=:st");
                                $scorsay->execute(array(
                                    'id' => $_SESSION['kullanici_id'],
                                    'st' => 'like'

                                ));

                                $scorsaycek = $scorsay->fetch(PDO::FETCH_ASSOC);
                                $disscorsay = $db->prepare("SELECT COUNT(*) AS beğenmeme_sayısı FROM ratings where yazikullanici_id=:id and status=:st");
                                $disscorsay->execute(array(
                                    'id' => $_SESSION['kullanici_id'],
                                    'st' => 'dislike'

                                ));
                                $disscorsaycek = $disscorsay->fetch(PDO::FETCH_ASSOC);

                                ?>
                                <span class="badge bg-primary rounded-pill">

                                    <?php
                                    $pozitif = $scorsaycek['beğeni_sayısı'];
                                    $negatif = $disscorsaycek['beğenmeme_sayısı'];

                                    echo $deger = $pozitif - $negatif;
                                    ?>

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Following</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Followers</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">99</span>
                            </li>
                        </ul>
                    </div>
                
                </div>
            </div>
            <div class="col-md-9 mb-2">
                <div class="card">
                    <div class="card-body">

                        <canvas id="myChart"></canvas>

                        <h4 class="fw-4 mt-3 mb-3">My Comments</h4>
                        <ul class="list-group">
                            <?php
                            $yazisor = $db->prepare("SELECT yazi.*,kullanici.* FROM yazi INNER JOIN kullanici ON yazi.kullanici_id=kullanici.kullanici_id where yazi_durum=:durum and kullanici_mail=:mail order by yazi_zaman DESC");

                            $yazisor->execute([
                                'durum' => 1,
                                'mail' => $_SESSION['kullanici_mail']
                            ]);
                            $say = 0;

                            while ($yazicek = $yazisor->fetch(PDO::FETCH_ASSOC)) { ?>
                                <script>
                                    $(function() {
                                        $('#<?php echo $yazicek['kullanici_id'] ?>').click(function() {
                                            $('#goster').dialog();
                                        });

                                    });
                                </script>
                                <?php
                                $limit = 160;
                                if (mb_strlen($yazicek['yazi_detay']) <= $limit) {
                                    if ($yazicek['yazi_secenek'] == 0 or $yazicek['yazi_secenek'] == 1 or $yazicek['yazi_secenek'] == 2) {
                                        $zaman = $yazicek['yazi_zaman'];
                                        $sonuc = explode(" ", $zaman);
                                        $say++; ?>

                                        <li class="d-flex justify-content-between mb-2 align-middle gap-2">
                                    
                                                <div class="card w-100">
                                                    <div class="card-body">
                                                        <?php echo $yazicek['yazi_detay'] ?>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php echo $sonuc[0] ?>
                                                    </div>
                                                </div>
                                            
                                                
                                            
                                            <?php

                                            $kullanicibegenisor = $db->prepare("SELECT distinct kullanici.kullanici_id,kullanici.kullanici_profil,yazi.kullanici_id,kullanici.kullanici_ad,ratings.user_id,ratings.yazikullanici_id
                                            FROM kullanici
                                            INNER JOIN ratings ON kullanici.kullanici_id = ratings.user_id 
                                            INNER JOIN yazi ON kullanici.kullanici_id=yazi.kullanici_id
                                            WHERE ratings.post_id =:post_id and ratings.status=:st");

                                            $kullanicibegenisor->execute([
                                                'post_id' => $yazicek['yazi_id'],
                                                'st' => 'like'
                                            ]);

                                            $begenisaysor = $db->prepare("SELECT COUNT(*) AS begenensayi FROM ratings WHERE post_id=:post_id and yazikullanici_id=:yazikullanici_id and status=:st");

                                            $begenisaysor->execute([
                                                'post_id' => $yazicek['yazi_id'],
                                                'yazikullanici_id' => $_SESSION['kullanici_id'],
                                                'st' => 'like'
                                            ]);
                                            $begenicek = $begenisaysor->fetch(PDO::FETCH_ASSOC);
                                            $begeniadeti = $begenicek['begenensayi'];

                                            ?>

                                            <div class="dropdown">
                                                <button class="btn btn-primary bg-gradient dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Beğenen Kullanıcılar (<?php
                                                    if ($begeniadeti == 0) {
                                                        echo "0";
                                                    } else if ($begeniadeti > 0) {
                                                        echo $begeniadeti;
                                                    }
                                                    ?>)
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-primary">
                                                    <?php while ($kullanicibegenicek = $kullanicibegenisor->fetch(PDO::FETCH_ASSOC)) {

                                                    ?>
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <img style="object-fit: cover;" width="35" height="35" src="img<?php echo $kullanicibegenicek['kullanici_profil'] ?>" class="rounded-circle">
                                                                <?php
                                                                echo $kullanicibegenicek['kullanici_ad']
                                                                ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>

                                        </li>
                            <?php }
                                }
                            } ?>
                        </ul>

                    </div>
                            
                </div>
                <footer class="footer mt-3 mb-2 py-2 bg-primary bg-gradient rounded">
                    <div class="container-fluid text-center align-middle">
                        <span class="text-white fw-bold">
                            © <?php echo date("Y"); ?> Yuppie Poff.
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Comments',
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                data: [<?php echo $ocakyazisaycek['say']; ?>,
                    <?php echo $subatyazisaycek['say']; ?>,
                    <?php echo $martyazisaycek['say']; ?>,
                    <?php echo $nisanyazisaycek['say']; ?>,
                    <?php echo $mayisyazisaycek['say']; ?>,
                    <?php echo $haziranyazisaycek['say']; ?>,
                    <?php echo $temmuzyazisaycek['say']; ?>,
                    <?php echo $agustosyazisaycek['say']; ?>,
                    <?php echo $eylulyazisaycek['say']; ?>,
                    <?php echo $ekimyazisaycek['say']; ?>,
                    <?php echo $kasimyazisaycek['say']; ?>,
                    <?php echo $aralikyazisaycek['say']; ?>
                ],
                fill: false
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</div>
</body>
</html>