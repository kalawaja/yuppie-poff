<?php
require_once 'header.php';
if (!empty($_SESSION['kullanici_mail'])) {

    Header("Location:index.php");
    exit;
}

?>
<div class="row mt-2 mb-2">
    <div class="col-sm-12 mt-2">
        <h2 class="mb-3">Register</h2>

        <form action="netting/islem.php" method="post" id="forms">
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
                        <input type="text" class="form-control" name="kullanici_kad" id="deneme" placeholder="Username" required>
                    </div>
                    <b id="kullanicihata"></b>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label fw-bold">Name*</label>
                        <input type="text" class="form-control" name="kullanici_ad" id="firstname" placeholder="John" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="lastname" class="form-label fw-bold">Surname*</label>
                        <input type="text" class="form-control" name="kullanici_soyad" id="lastname" placeholder="Doe" required>
                    </div>
                </div>
                <div class="mt-2 col-12">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Email Adres*</label>
                        <input type="email" class="form-control" name="kullanici_mail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="john@doe.com" required>
                        <div id="emailHelp" class="form-text">E-postanızı asla başka biriyle paylaşmayacağız.</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password*</label>
                        <input type="password" class="form-control" name="kullanici_passwordone" id="password" required>
                    </div>
                    <b id="passwordhata"></b>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password Again*</label>
                        <input type="password" class="form-control" name="kullanici_passwordtwo" id="password2" required>
                    </div>
                    <b id="passwordhata2"></b>
                </div>
                <div class="col-6 form-group">
                    <label for="datepicker" class="fw-bold">Birthday</label>
                    <input type="date" name="kullanici_birth" class="form-control" id="birthday">
                </div>
                <div class="col-6 form-group">
                    <label for="gender" class="fw-bold">Gender</label>
                    <select class="form-select" id="gender" name="kullanici_gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="0">Other</option>
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
                            <option selected value="0">Nope</option>
                            <?php while ($ilcek = $ilsor->fetch(PDO::FETCH_ASSOC)) {


                            ?>

                                <option value="<?php echo $ilcek['id'] ?>"><?php echo $ilcek['sehiradi']; ?></option>
                            <?php } ?>

                        </select><br>
                        <label for="floatingSelectGrid">Select City*</label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-floating mt-2">
                        <?php

                        $ilsor = $db->prepare("SELECT * FROM ilceler order by id");
                        $ilsor->execute();

                        ?>
                        <!-- KATEGORİYE GÖRE SEÇME İŞLEMLERİ-->
                        <select required="required" class="form-select" id="MemberDistrict" name="id">
                            <option selected value="0">Nope</option>
                            <?php while ($ilcek = $ilsor->fetch(PDO::FETCH_ASSOC)) {

                            ?>

                                <option value="<?php echo $ilcek['id'] ?>"><?php echo $ilcek['ilceadi']; ?></option>
                            <?php } ?>

                        </select><br>
                        <label for="floatingSelectGrid">Select District*</label>
                    </div>
                </div>

                <div class="col-12 mb-2 text-end">
                    <button type="submit" name="register" class="btn btn-primary bg-gradient w-50 fw-bold fs-5 align-middle">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once 'footer.php' ?>

<script>
    $(function() {
        $('#deneme').blur(function() {
            if ($('#deneme').val().length < 6) {
                $('#kullanicihata').text("Lütfen 6 karakterden az girmeyiniz... ");
            } else {
                $('#kullanicihata').text("");
            }
        });
        $('#password').blur(function() {
            if ($('#password').val().length < 8) {
                $('#passwordhata').text("Lütfen 8 karakterden az girmeyiniz... ");
            } else {
                $('#passwordhata').text("");
            }
        });

    });
</script>