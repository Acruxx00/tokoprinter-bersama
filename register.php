<?php
// koneksi ke function
require "config/functions.php";

// sistem input ke db
if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan');
        </script>";
        header("Location: index.php");
    } else {
        echo mysqli_error($conn);
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
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18">
                <div class="card" style="width: 20rem;">
                    <div class="card-header"> Register Page </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                        </svg>
                                    </div>
                                    <input type="password" name="confirm_pass" class="form-control" placeholder="Konfirmasi Password" required>
                                </div>
                                <br>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary"> Register </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <label class=""> Sudah punya akun? </label>
                        <a href="index.php" class="btn btn-danger"> Login </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>