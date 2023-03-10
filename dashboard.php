<?php
include "config/functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
}

$super_user = false;
if (isset($_SESSION["name"])) {
    $user = true;
    if (cek_status($_SESSION["name"]) == 1) {
        $super_user = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>tokoprinter - bersama</title>
</head>

<body>
    <!-- koneksi ke navbar -->
    <?php include("assets/view/navbar.php") ?>

    <br>

    <h5><?php $error; ?></h5>
    <!-- mengambil data dari db -->
    <div class="row">
        <?php
        $result         = mysqli_query($conn, "SELECT * FROM tb_barang");
        while ($row     = mysqli_fetch_assoc($result)) :
            $id         = $row["id_barang"];
            $produk     = $row["nama_barang"];
            $harga      = $row["harga"];
            $stok       = $row["stok"];
            $dekripsi   = $row["deskripsi"];
            $gambar     = $row["gambar"];
        ?>
            <div class="col g-3">
                <div class="card h-100" style="width: 15rem;">
                    <img src="assets/img/<?= $gambar ?>" class="card-img-top" width="100%" height="150px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="detail.php?detail=<?= $id ?>"><?= $produk ?></a>
                        </h5>
                        <p class="card-text"><?= "Rp " . number_format($harga, 0, ',', '.'); ?></p>
                        <?php if ($super_user == true) : ?>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusproduk<?= $id ?>">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editproduk<?= $id ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php endif; ?>
                        <?php if ($super_user == false) : ?>
                            <a href="detail.php?detail=<?= $id ?>" class="btn btn-primary">Beli</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Modal hapus-->
            <div class="modal fade" id="hapusproduk<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                Apakah Yakin ingin menghapus <?= $produk ?>?
                                <input type="hidden" name="idproduk" value="<?= $id ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="btnhapusproduk">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Edit-->
            <div class="modal fade" id="editproduk<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" value="<?= $produk ?>" name="produk" class="form-control" required><br>
                                <input type="text" value="<?= $harga ?>" name="harga" class="form-control" required><br>
                                <input type="number" value="<?= $stok ?>" name="stok" class="form-control" required><br>
                                <img src="assets/img/<?= $gambar ?>" class="card-img-top"><br><br>
                                <input type="file" value="<?= $gambar ?>" name="gambar" class="form-control"><br>
                                <input type="hidden" name="idproduk" value="<?= $id ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning" name="btneditproduk">Edit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>