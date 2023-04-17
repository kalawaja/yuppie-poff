<?php require_once "header.php"; ?>
<div class="row mt-2 mb-2">
    <div class="col-sm-12">
        <div class="d-flex">
            <canvas id="chart" height="400px" width="100%"></canvas>
        </div>
        <h2 class="mt-2 mb-2">What Do You Think?</h2>
        <form action="netting/islem.php" method="post">
            <div class="form-floating mt-2">
                <textarea class="form-control" name="yazi_detay" placeholder="Leave a comment here" id="text"></textarea>
                <label for="floatingTextarea">Comments</label>
            </div>
            <div class="btn-group mt-2 d-flex" role="group" aria-label="Basic radio toggle button group">

                <input type="radio" name="yazi_secenek" class="btn-check" value="0" id="mutlu" autocomplete="off">
                <label class="btn btn-outline-success" for="mutlu">😀</label>
                <input type="radio" name="yazi_secenek" class="btn-check" value="1" id="notr" autocomplete="off">
                <label class="btn btn-outline-warning" for="notr">😐</label>
                <input type="radio" name="yazi_secenek" class="btn-check" value="2" id="uzgun" autocomplete="off">
                <label class="btn btn-outline-danger" for="uzgun">😔</label>
                <?php

                if (isset($_SESSION['kullanici_mail'])) {
                ?>
                    <button onclick="gonder()" name="gonder" id="submitButton" class="btn btn-primary fw-bold">Gönder</button>
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
            $yazisor = $db->prepare("SELECT yazi.*,kullanici.* FROM yazi INNER JOIN kullanici ON yazi.kullanici_id=kullanici.kullanici_id where yazi_durum=:durum order by yazi_zaman DESC");

            $yazisor->execute([
                'durum' => 1
            ]);
            while ($yazicek = $yazisor->fetch(PDO::FETCH_ASSOC)) {
                $zaman = $yazicek['yazi_zaman'];
                $sonuc = explode(" ", $zaman);
            ?>

                <div class="list-group-item list-group-item-action"><span class="badge pill text-bg-primary"><?php echo $sonuc[1] ?></span>
                    <span class="badge pill text-bg-dark"><?php echo $yazicek['kullanici_ad'] ?></span> <span class="badge pill text-bg-light"><?php echo $yazicek['yazi_detay'] ?></span>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>

</html>