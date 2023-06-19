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

        <h1 class="fw-1 mt-2">Edit your profile</h1>

        <div class="card bg-light p-3" id="editProfileForm">
                        <form action="netting/islem.php" method="post">
                            <div class="form-group mt-2">
                                <label for="inputName">Username</label>
                                <input type="text" disabled class="form-control" name="kullanici_kad" id="inputName" value="<?php echo $kullanicicek['kullanici_kad'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" name="kullanici_ad" id="inputName" value="<?php echo $kullanicicek['kullanici_ad'] ?>">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputName">Surname</label>
                                <input type="text" class="form-control" name="kullanici_soyad" id="inputName" value="<?php echo $kullanicicek['kullanici_soyad'] ?>">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputEmail">E-mail</label>
                                <input type="email" class="form-control" id="inputEmail" value="<?php echo $kullanicicek['kullanici_mail'] ?>">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputCity">Birthday</label>
                                <input type="date" class="form-control" id="inputCity" placeholder="<?php echo $kullanicicek['sehiradi'] ?>">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputCity">Gender</label>
                                <select class="form-select" id="gender" name="kullanici_gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="0">Other</option>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputCity">City</label>
                                <input class="form-control" id="inputCity" placeholder="<?php echo $kullanicicek['sehiradi'] ?>">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputCity">District</label>
                                <input class="form-control" id="inputDistrict" placeholder="<?php echo $kullanicicek['ilceadi'] ?>">
                            </div>
                            
                            <div class="mt-2">Social Media Accounts</div>

                            <div class="input-group mt-2">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-twitter"></i></span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mt-2">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-facebook"></i></span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mt-2">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-instagram"></i></span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mt-2">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-github"></i></span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <hr>

                            <h5 class="fw-5">Change your password and profile</h5>

                            <div class="form-group mt-2">
                                <label for="inputCity">Old Password (required)</label>
                                <input type="password" class="form-control" id="oldPassword" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputCity">New Password</label>
                                <input type="password" class="form-control" id="newPassword">
                            </div>

                            <div class="form-group mt-2">
                                <label for="inputCity">New Password Again</label>
                                <input type="password" class="form-control" id="newPasswordAgain">
                            </div>

                            <button type="submit" name="bilgiguncelle" class="btn btn-primary mt-2 w-100 fw-bold">Save</button>
                        </form>
                    </div>
       
        <footer class="footer mt-3 mb-2 py-2 bg-primary bg-gradient rounded">
            <div class="container-fluid text-center align-middle">
                <span class="text-white fw-bold">
                    © <?php echo date("Y"); ?> Yuppie Poff.
                </span>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>