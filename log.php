<?php require_once 'header.php';


if (!empty($_SESSION['kullanici_mail'])) {

    Header("Location:index.php");
    exit;
}

?><div class="row mt-2 mb-2">
    <div class="col-sm-12 mt-2">
        <?php

        if ($_GET['durum'] == "hata") { ?>

            <div class="alert alert-danger">
                <strong>Hata!</strong> Hatalı Giriş
            </div>


        <?php } elseif ($_GET['durum'] == "exit") { ?>

            <div class="alert alert-success">
                <strong>Bilgi!</strong> Çıkış Yapıldı
            </div>


        <?php } elseif ($_GET['durum'] == "ok") { ?>

            <div class="alert alert-success">
                <strong>Bilgi!</strong> Kaydınız Başarılı Giriş Yapabilirsiniz.
            </div>


        <?php } elseif ($_GET['durum'] == "captchahata") { ?>

            <div class="alert alert-danger">
                <strong>Bilgi!</strong> Güvenlik Kodu Hatalı..
            </div>


        <?php } ?>
        <h2>Giriş Yap</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <form action="netting/islem.php" method="post">
                    <div class="mb-3">
                        <label for="text" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="email" name="kullanici_mail" aria-describedby="emailHelp" placeholder="john@doe.com" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="kullanici_password" id="password" required>
                    </div>
                    <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div> -->
                    <button type="submit" name="giris" class="btn btn-primary btn-block">Giriş Yap</button>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer mt-auto mb-2 py-3 bg-light rounded">
    <div class="container-fluid">
        <span class="text-muted">© 2023 Yuppie Poff.</span>
    </div>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>

</html>