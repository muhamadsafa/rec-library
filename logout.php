<?php
session_start();

// Menghapus semua data session
session_unset();

// Menghancurkan session
session_destroy();

// Mengarahkan pengguna kembali ke halaman login atau halaman lain yang sesuai
header("Location: login.php");
exit();
?>
