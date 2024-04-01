<?php
    include("connection.php");
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rec-Library</title>
    <script src="https://kit.fontawesome.com/91d51d03ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="icon" href="Asset/img/isblogoo.png" type="image/x-icon" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="fixed-top">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img class="logo" src="Asset/img/logoisb.png" alt="logo" style="height: 80px" />
          <a href="index.php" style="color: rgb(48, 82, 236); font-size: medium">Rec-Library</a>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto m-sm-auto">
            <li class="nav-item">
              <a class="nav-link" href="tentang.php">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="book.php">Pencarian Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
          </ul>
           <?php
          if(isset($_SESSION['user_name'])&&$_SESSION['user_name'] == 'admin' ){
          ?>
          
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="Asset/profil/isb.png" alt="photo ptofil" class="rounded-circle dropdown-toggle" style="width: 59px; height: auto;">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item" href="unggah.php">Kelola Buku</a></li>
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </div>
          
          <?php
          }
           else if(isset($_SESSION['user_name'])){
          ?>
          
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="Asset/profil/isb.png" alt="photo ptofil" class="rounded-circle dropdown-toggle" style="width: 59px; height: auto;">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </div>
          
          <?php
          }
          
          else{ ?>
          <form class="d-flex">
            <a href="login.php">
              <button class="btn btn-primary" type="button" >Login</button>
            </a>
          </form>
          <?php } ?>
    </div>
    </nav>
        <div class="container-fluid">
            
            
            
            
            <?php
include "connection.php";

// Inisialisasi variabel keyword
$keyword = "";

// Memeriksa apakah form pencarian dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil kata kunci pencarian dari formulir
    $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);

    // Jika session 'user_name' ada, simpan log pencarian ke tabel 'sear'
    if (isset($_SESSION['user_name'])) {
        $username = $_SESSION['user_name'];

        // Simpan log pencarian ke tabel 'sear'
        $insertLogQuery = "INSERT INTO sear (kolsear, usesear) VALUES ('$keyword', '$username')";
        mysqli_query($conn, $insertLogQuery);
    }
}

// Membuat query berdasarkan apakah ada kata kunci pencarian atau tidak
if (!empty($keyword)) {
    $query = "SELECT * FROM book1 WHERE BookTitle LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM book1";
}

$result = mysqli_query($conn, $query);

// ... (Sesuaikan dengan bagian tampilan hasil pencarian yang Anda punya)

// Menutup koneksi database
mysqli_close($conn);
?>

            
            
            
            
<form action="book.php" method="post">
    <div class="row mt-3">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" id="keyword" name="keyword" autofocus required>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-success" type="submit" id="search" name="search">Cari</button>
        </div>
    </div>
</form>


<br/>
        </div>
        </div>
        <div class="container-fluid dalneg position-fixed">                   
                <a class="dalnegtx" href="javascript:history.back()"><i class="fa-solid fa-chevron-left" style="color: #030303;">
            </i> &ensp; </a>
        </div>
        
        
        <div class="dalneg"><br/></div>



<div class="container mt-5">
    <!-- Tambahkan div untuk hasil pencarian di sini -->
    <div class="result-container">
        <?php include "proses_pencarian.php"; ?>
    </div>
</div>



</body>
<footer class="bg-dark text-white pt-4 pb-4">
    <div class="container text-center text-md-left">
    <div class="row text-center text-md-left">
        <div class="col-md-4 col-lg-3 col-xl-4 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(27, 109, 231);">Tentang</h5>
        <p>Rec-Library merupakan penyedia layanan pencarian buku dan rekomendasi buku menggunakan metode Apriori</p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-3 mx-4 mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(27, 109, 231);">Layanan</h5>
        <p>
            <a href="tentang.php" class="text-white" style="text-decoration: none;">Tentang Kami</a>
        </p>
        <p>
            <a href="book.php" class="text-white" style="text-decoration: none;">Pencarian Buku</a>
        </p>
        <p>
            <a href="faq.php" class="text-white" style="text-decoration: none;">FAQ</a>
        </p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-4 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold" style="color: rgb(27, 109, 231);">Kontak</h5>
        <p>
            <i class="fas fa-home mr-3"></i>Kampus Ketintang Universitas Negeri Surabaya (UNESA)
        </p>
        <p>
            <i class="fas fa-envelope mr-3"></i>rec-library@unesa.ac.id
        </p>
        <p>
            <i class="fa fa-whatsapp fa-lg mr-3"></i>+62-821-4455-3232
            (Chat Only)
        </p>
        </div>
    </div>

    <hr class="mb-5">

    <div class="row align-items-center">
        <div class="col-md-7 col-lg-8">
        <p>Made with ♡ by:
          <a style="color: aliceblue;">
            <strong >Group of 3 (ASR, RRP, MSF, AT)</strong>
            </a></p>
        </div>
        <div class="col-md-5 col-lg-4">
        <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
                <a href="https://www.instagram.com/isb.indonesia" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="https://twitter.com/isb_indonesia?s=21&t=yM7eWoc0R6DQqirfJld1Zw" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="https://youtube.com/@ISBIndonesia" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="_blank"><i class="fab fa-youtube"></i></a>
            </li>
            </ul>
        </div>
        </div>
    </div>
</footer>
</html>