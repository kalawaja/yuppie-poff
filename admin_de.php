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

        <div class="btn-group mt-3 w-100" role="group">
            <button type="button" class="btn btn-outline-dark bg-dark bg-gradient">
                <a href="admin_iy.php" class="text-white text-decoration-none"><i class="bi bi-card-text"></i> İçerik Yönetimi</a>
            </button>
            <button type="button" class="btn btn-outline-dark bg-dark bg-gradient">
                <a href="admin_is.php" class="text-white text-decoration-none"><i class="bi bi-list-ol"></i> İstatistikler</a>
            </button>
            <button type="button" class="btn btn-outline-dark bg-dark bg-gradient">
                <a href="admin_dy.php" class="text-white text-decoration-none"><i class="bi bi-bell"></i> Duyurular</a>
            </button>
            <button type="button" class="btn btn-outline-dark bg-black bg-gradient active">
                <a href="admin_de.php" class="text-white fw-bold text-decoration-none"><i class="bi bi-info-circle"></i> Destek</a>
            </button>
        </div>
        <h2 class="fw-2 mt-3">Destek</h2>

        <table class="table table-hover table-dark bg-gradient table-bordered mt-3 border border-secondary" >
            <thead>
                <tr>
                    <th style="max-width: 15%; width: 15%"><i class="bi bi-person-fill"></i> YAZAR</th>
                    <th style="max-width: 74%; width: 74%;"><i class="bi bi-chat-quote-fill"></i> İLETİ İÇERİĞİ</th>
                    <th class="w-25 text-center"><i class="bi bi-gear-fill"></i> SEÇENEKLER</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <tr>
                    <th scope="row">
                        <a href="#" class="text-decoration-none text-white">@Deneme</a>
                    </th>
                    <td class="text-justify">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</td>
                    <td class="text-center">

                        <!-- Button relpy modal -->
                        <button type="button" class="btn btn-success bg-gradient" data-bs-toggle="modal" data-bs-target="#replyModal">
                            <a href="#" class="text-light text-decoration-none" title="İletiyi Yanıtla"><i class="bi bi-reply-fill"></i></a>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-dark text-start" id="replyModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalLabel">İletiyi Yanıtla</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="answerControl" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="answerControl" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="answerTextarea" class="form-label">Your message</label>
                                    <textarea class="form-control" id="answerTextarea" rows="3"></textarea>
                                </div>

                                <button type="button" class="btn btn-primary bg-gradient text-center fw-bold w-100">Send</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary bg-gradient" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!-- Button delete modal -->
                        <button type="button" class="btn btn-danger bg-gradient" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <a href="#" class="text-light text-decoration-none" title="İletiyi Yanıtla"><i class="bi bi-trash3-fill"></i></a>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-dark text-start" id="deleteModal" tabindex="-1" aria-labelledby="modalLabelDel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalLabelDel">Are you sure?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary bg-gradient" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger bg-gradient">Delete</button>
                            </div>
                            </div>
                        </div>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>
       
        <footer class="footer mt-3 mb-2 py-2 bg-dark bg-gradient rounded">
            <div class="container-fluid text-center align-middle">
                <span class="text-white fw-bold">© <?php echo date("Y"); ?> Yuppie Poff. </span>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>