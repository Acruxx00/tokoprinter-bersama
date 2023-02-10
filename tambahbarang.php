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

<div class="container">
    <h1 class="modal-title fs-5" id="exampleModalLabel"> Tambah Barang </h1>
    <hr>     
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Nama Barang" name="nama_barang" class="form-control" required>
            <br>
            <input type="text" placeholder="Harga" name="harga" class="form-control" required>
            <br>
            <input type="number" placeholder="Stok" name="stok" class="form-control" required
            ><br>
            <input type="text" placeholder="Deskripsi" name="deskripsi" class="form-control" required>
            <br>
            <input type="file" name="gambar" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary"> Tambah </button>
        </form>
</div>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>