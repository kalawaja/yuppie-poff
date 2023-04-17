<?php
require_once 'header.php';
if (!empty($_SESSION['kullanici_mail'])) {

    Header("Location:index.php");
    exit;
}

?>
<div class="row mt-2 mb-2">
    <div class="col-sm-12 mt-2">
        <h2>Kayıt Ol</h2>
        <form action="netting/islem.php" method="post">
            <div class="row">
                <?php

                if (@$_GET['durum'] == "farklisifre") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
                    </div>

                <?php } elseif (@$_GET['durum'] == "eksiksifre") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
                    </div>

                <?php } elseif (@$_GET['durum'] == "mukerrerkayit") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
                    </div>

                <?php } elseif (@$_GET['durum'] == "basarisiz") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
                    </div>

                <?php }
                ?>

                <div class="col-12 mb-2">
                    <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input type="text" class="form-control" name="kullanici_kad" id="autoSizingInputGroup" placeholder="Username" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Ad*</label>
                        <input type="text" class="form-control" name="kullanici_ad" id="firstname" placeholder="John" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Soyad*</label>
                        <input type="text" class="form-control" name="kullanici_soyad" id="lastname" placeholder="Doe" required>
                    </div>
                </div>
                <div class="mt-2 col-12">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Adres*</label>
                        <input type="email" class="form-control" name="kullanici_mail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="john@doe.com" required>
                        <div id="emailHelp" class="form-text">E-postanızı asla başka biriyle paylaşmayacağız.</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Şifre*</label>
                        <input type="password" class="form-control" name="kullanici_passwordone" id="password" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Şifreniz Tekrar*</label>
                        <input type="password" class="form-control" name="kullanici_passwordtwo" id="password" required>
                    </div>
                </div>
                <div class="col-6 form-group">
                    <label for="datepicker">Birthday</label>
                    <input type="date" name="kullanici_birth" class="form-control" id="birthday">
                </div>
                <div class="col-6 form-group">
                    <label for="gender">Cinsiyet*</label>
                    <select class="form-select" id="gender" name="kullanici_gender">
                        <option value="1">Erkek</option>
                        <option value="2">Kadın</option>
                        <option value="0">Belirtilemedi</option>
                    </select>
                </div>

                <div class="col-6">
                    <div class="form-floating mt-2">
                        <?php

                        $ilsor = $db->prepare("SELECT * FROM iller order by id");
                        $ilsor->execute();

                        ?>
                        <!-- KATEGORİYE GÖRE SEÇME İŞLEMLERİ-->
                        <select required="required" class="form-select" id="MemberCity" name="id">
                            <option selected value="0">Yok</option>
                            <?php while ($ilcek = $ilsor->fetch(PDO::FETCH_ASSOC)) {


                            ?>

                                <option value="<?php echo $ilcek['id'] ?>"><?php echo $ilcek['sehiradi']; ?></option>
                            <?php } ?>

                        </select><br>
                        <label for="floatingSelectGrid">Şehir Seç*</label>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <button type="submit" name="register" class="btn btn-primary d-flex">Kayıt Ol</button>
                </div>

                <p class="mt-2"> * Alanları Boş Bırakma. </p>
            </div>
        </form>
    </div>
</div>
<?php require_once 'footer.php' ?>