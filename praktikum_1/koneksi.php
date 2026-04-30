<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_renciaprilia"; // Sesuaikan dengan nama database di phpMyAdmin Anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>