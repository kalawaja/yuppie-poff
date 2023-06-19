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
            <button type="button" class="btn btn-outline-dark bg-black bg-gradient active">
                <a href="admin_iy.php" class="text-white fw-bold text-decoration-none"><i class="bi bi-card-text"></i> İçerik Yönetimi</a>
            </button>
            <button type="button" class="btn btn-outline-dark bg-dark bg-gradient">
                <a href="admin_is.php" class="text-white text-decoration-none"><i class="bi bi-list-ol"></i> İstatistikler</a>
            </button>
            <button type="button" class="btn btn-outline-dark bg-dark bg-gradient">
                <a href="admin_dy.php" class="text-white text-decoration-none"><i class="bi bi-bell"></i> Duyurular</a>
            </button>
            <button type="button" class="btn btn-outline-dark bg-dark bg-gradient">
                <a href="admin_de.php" class="text-white text-decoration-none"><i class="bi bi-info-circle"></i> Destek</a>
            </button>
        </div>
        <h2 class="fw-2 mt-3">İçerik Yönetimi</h2>
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

                        <!-- Button delete modal -->
                        <button type="button" class="btn btn-warning bg-gradient" data-bs-toggle="modal" data-bs-target="#blockUser">
                            <a href="#" class="text-dark text-decoration-none" title="Kullanıcıyı Yasakla"><i class="bi bi-person-x"></i></a>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-dark text-start" id="blockUser" tabindex="-1" aria-labelledby="modalLabelBlock" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalLabelBlock">Are you sure?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary bg-gradient" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger bg-gradient">Block</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <h2 class="fw-2 mt-3">Yasaklı Kelime Filtre Yönetimi</h2>
        <form action="#">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Yeni kelime eklemek için tıklayın</label>
                <button class="btn btn-dark bg-gradient mt-2">Kelimeyi Ekle</button>
            </div>
        </form>
        <h2 class="fw-2 mt-3">Yasaklı Kelimeler</h2>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-primary bg-gradient position-relative"> ANA <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-danger">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        </span>
                    </button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-primary bg-gradient position-relative"> BACI <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-danger">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        </span>
                    </button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-primary bg-gradient position-relative"> SOY <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-danger">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        </span>
                    </button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-primary bg-gradient position-relative"> SOP <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-danger">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        </span>
                    </button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-primary bg-gradient position-relative"> KARDAŞ <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-danger">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <footer class="footer mt-3 mb-2 py-2 bg-dark bg-gradient rounded">
            <div class="container-fluid text-center align-middle">
                <span class="text-white fw-bold">© <?php echo date("Y"); ?> Yuppie Poff. </span>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>