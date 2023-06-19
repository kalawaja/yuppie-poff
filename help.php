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

        <h1 class="fw-1 mt-2">Contact with us</h1>

                <div class="mb-3">
                    <label for="formControl" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="formControl" placeholder="name@example.com">
                </div>

                <div class="mb-3">
                    <label for="formControlTextArea" class="form-label">Your message</label>
                    <textarea class="form-control" id="formControlTextArea" rows="3"></textarea>
                </div>

                <button type="button" class="btn btn-primary bg-gradient">Send</button>
       
       
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