<?php require_once 'header.php';


if (!empty($_SESSION['kullanici_mail'])) {

    Header("Location:index.php");
    exit;
}

?>
<!-- SWEET ALERT  -->
<div class="row mt-2 mb-2">
    <div class="col-sm-12 mt-2">
        <h2>Log In</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <form method="post" id="forms">
                    <div class="mb-3">
                        <label for="text" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="kullanici_mail" name="kullanici_mail" aria-describedby="emailHelp" placeholder="john@doe.com" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="kullanici_password" name="kullanici_password" id="kullanici_password">
                    </div>
                    <input type="hidden" name="login">
                    <div class="col-12 mb-2">
                        <button type="submit" class="btn btn-primary bg-gradient fs-5 fw-bold btn-block w-50">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer mt-3 mb-2 py-3 bg-primary bg-gradient rounded">
    <div class="container-fluid text-center align-middle">
        <span class="text-white fw-bold">© <?php echo date("Y"); ?> Yuppie Poff. </span>
    </div>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#forms').submit(function() {
            var formID = $(this).attr('id');
            var formDetails = $('#' + formID);
            $.ajax({
                type: 'POST',
                url: 'netting/islem.php',
                data: formDetails.serialize(),
                success: function(data) {
                    veri = JSON.parse(data);
                    Swal.fire('İşlem Sonucu', veri.message, veri.status).then((value) => {
                        window.location.href = "index.php";
                        if (veri.status == 'error') {
                            window.location.href = "log.php"
                        }
                    });
                }
            });
            return false;
        });
    });
</script>
</body>

</html>