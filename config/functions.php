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
    $result         = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Sudah ada username yang terdaftar');
        </";
        return false;
    }

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
    mysqli_query($conn, "INSERT INTO user (username, password, level) VALUES ('$username', '$password', 0)");

    return mysqli_affected_rows($conn);
}

// sistem cek status user
function cek_status($username)
{
    global $conn;

    $name   = mysqli_escape_string($conn, $username);
    $query  = "SELECT level FROM user WHERE username = '$name'";

    if ($result = mysqli_query($conn, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $level = $row["level"];
        }
    }
    return $level;
}
