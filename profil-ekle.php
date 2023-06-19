<?php require_once 'header.php'; ?>
<div class="row mt-2 mb-2">
    <div class="col-sm-12 mt-2">
        <?php

        if ($_GET['durum'] == "hata") { ?>

            <div class="alert alert-danger">
                <strong>Hata!</strong> İşlem Başarısız
            </div>


        <?php } elseif ($_GET['durum'] == "ok") { ?>

            <div class="alert alert-success">
                <strong>Bilgi!</strong> İşlem Başarılı
            </div>


        <?php } elseif ($_GET['durum'] == "dosyabuyuk") { ?>

            <div class="alert alert-warning">
                <strong>Bilgi!</strong> Dosya Boyutu 500 KB Geçmemesi gerekmektedir.
            </div>


        <?php } ?>
        <h2>Resim Güncelle</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <form action="netting/islem.php" method="post" enctype="multipart/form-data" id="uploadform">
                    <div class="mb-3">
                        <label for="password" class="form-label">Yüklenen Resim</label><br>
                        <img id="profilresim" style="width:150px;height:150px;object-fit:cover" src="img<?php echo $kullanicicek['kullanici_profil'] ?>" class="rounded-circle mb-3" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Resim Yükle</label>
                        <input type="file" class="form-control" id="file" name="kullanici_profil" value="<?php echo $kullanicicek['kullanici_profil'] ?>" aria-describedby="emailHelp">
                    </div>

                    <input type="hidden" name="eski_yol" value="<?php echo $kullanicicek['kullanici_profil'] ?>">
                    <button type="submit" name="resimguncelle" class="btn btn-primary btn-block">Resim Güncelle</button>
                </form>
            </div>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('#file').change(function() {
            var reader = new FileReader();
            reader.onload = imageload;
            reader.readAsDataURL(this.files[0]);

        });

        function imageload(e) {
            $('#profilresim').attr('src', e.target.result);
        }
    });
</script>
</body>

</html>