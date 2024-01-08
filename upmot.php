<?php
include "connection.php";
session_start(); 

if (isset($_POST['submit'])) {
    $promot = $_SESSION['profile'];
    $jumot = $_POST['jumot'];
    $cermot = $_POST['cermot'];

    // Escape karakter khusus dalam inputan
    $promot = mysqli_real_escape_string($conn, $promot);
    $jumot = mysqli_real_escape_string($conn, $jumot);
    $cermot = mysqli_real_escape_string($conn, $cermot);

    // Simpan nilai ke dalam tabel motivasi
    $insertQuery = "INSERT INTO motivasi (promot, jumot, cermot) VALUES ('$promot', '$jumot', '$cermot')";
    if (mysqli_query($conn, $insertQuery)) {
        header('location:motivasi.php');
        exit; // Pastikan untuk keluar setelah mengarahkan
    } else {
        echo "Gagal menyimpan data baru.";
    }
}
?>