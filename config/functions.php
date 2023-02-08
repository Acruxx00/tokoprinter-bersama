<?php
// koneksi ke db
session_start();
$conn   = mysqli_connect("localhost", "root", "", "tokoprinter_bersama") or die("gagal koneksi");
$eror   = "";

// sistem register
function register($data)
{
    global $conn;
    $username       = mysqli_real_escape_string($conn, $data["username"]);
    $password       = mysqli_real_escape_string($conn, $data["password"]);
    $confirmpass    = mysqli_real_escape_string($conn, $data["confirm_pass"]);

    // cek username sudah ada atau belum
    $result         = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = $username");

    // cek apakah password sama dengan konfimasi password
    if ($password != $confirmpass) {
        echo "<script>
            alert('Password tidak sama dengan konfirmasi password');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masukkan ke database
    mysqli_query($conn, "INSERT INTO tb_users (username, password, status) VALUES ('$username', '$password', 0)");

    return mysqli_affected_rows($conn);
}

// sistem cek status user
function cek_status($username)
{
    global $conn;

    $name   = mysqli_escape_string($conn, $username);
    $query  = "SELECT status FROM tb_users WHERE username = '$name'";

    if ($result = mysqli_query($conn, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row["status"];
        }
    }
    return $status;
}
