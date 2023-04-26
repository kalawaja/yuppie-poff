<?php require_once "header.php";

$yazisay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM yazi where  yazi_durum=:durum and kullanici_id=:id");
$yazisay->execute(array(
    'id' => $_SESSION['kullanici_id'],
    'durum' => 1

));
$yazisaycek = $yazisay->fetch(PDO::FETCH_ASSOC);


require_once 'sorgu.php';
?>

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
</style>

<div class="row mt-2 mb-2">
    <div class="col-sm-12 mt-2">
        <!-- USER PANEL -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="resim">
                            <img src="img<?php echo $kullanicicek['kullanici_profil'] ?>" class="rounded-circle mb-3" alt="">
                            <a href="profil-ekle.php">
                                <i class="fa-sharp fa-solid fa-plus fa-xl"></i>
                            </a>
                        </div>
                        <h4><?php echo $kullanicicek['kullanici_ad'] . " " . $kullanicicek['kullanici_soyad'] ?></h4>
                        <p><?php echo $kullanicicek['kullanici_kad'] ?></p>

                        <p><?php echo $yazisaycek['say']; ?>  Comments</p>



                    </div>
                    <div class="card bg-light p-3" id="editProfileForm">
                        <h5 class="mb-3">Edit Profile</h5>
                        <form action="netting/islem.php" method="post">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" name="kullanici_ad" id="inputName" value="<?php echo $kullanicicek['kullanici_ad'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Surname</label>
                                <input type="text" class="form-control" name="kullanici_soyad" id="inputName" value="<?php echo $kullanicicek['kullanici_soyad'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName">username</label>
                                <input type="text" disabled class="form-control" name="kullanici_kad" id="inputName" value="<?php echo $kullanicicek['kullanici_kad'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">e-mail</label>
                                <input type="email" disabled class="form-control" id="inputEmail" value="<?php echo $kullanicicek['kullanici_mail'] ?>">
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input disabled class="form-control" id="inputCity" placeholder="<?php echo $kullanicicek['sehiradi'] ?>">
                                </div>
                            </div>
                            <button type="submit" name="bilgiguncelle" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9 mb-2">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                        <hr>
                        <h4>My Comments</h4>
                        <ul class="list-group">
                            <?php
                            $yazisor = $db->prepare("SELECT yazi.*,kullanici.* FROM yazi INNER JOIN kullanici ON yazi.kullanici_id=kullanici.kullanici_id where yazi_durum=:durum and kullanici_mail=:mail order by yazi_zaman DESC");

                            $yazisor->execute([
                                'durum' => 1,
                                'mail' => $_SESSION['kullanici_mail']
                            ]);
                            $say = 0;
                            while ($yazicek = $yazisor->fetch(PDO::FETCH_ASSOC)) {
                                $zaman = $yazicek['yazi_zaman'];
                                $sonuc = explode(" ", $zaman);
                                $say++; ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Comment <?php echo $say ?> - <?php echo $yazicek['yazi_detay'] ?><span class="badge bg-secondary"><?php echo $sonuc[0] ?></span>
                                </li>
                            <?php } ?>

                            <!-- Diğer yazılar buraya gelecek -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- USER PANEL -->
        <?php require_once 'footer.php' ?>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
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
</body>

</html>