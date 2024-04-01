<?php 
  session_start(); 
  if (!isset($_SESSION['user_name'])) {
  	header("location: login.php");
  	exit();
  }
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
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-lg fixed-top">
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
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="Asset/profil/isb.png" alt="photo ptofil" class="rounded-circle dropdown-toggle" style="width: 59px; height: auto;">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item" href="unggah.php">Kelola Buku</a></li>
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        </nav>
        <div class="container-fluid dalneg">                   
            <a class="dalnegtx" href="javascript:history.back()"><i class="fa-solid fa-chevron-left" style="color: #030303;">
        </i>&ensp; UNGGAH BUKU</a>
    </div>
    <div class="container pt-5 pb-5 text-center">
        <h3>Formulir Unggah BUKU</h3>
    </div>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="namaBea">Judul Buku </label>
            <input name="BookTitle" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan nama dari judul di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Author Buku </label>
            <input name="Author" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Author Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Harga Buku </label>
            <input name="Price" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan harga Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Harga Second </label>
            <input name="Price_Used" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan harga second Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Halaman Buku </label>
            <input name="Pages" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan halaman Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Rating Buku </label>
            <input name="Avg_Review" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Rata-Rata Rating Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Rating Review Buku </label>
            <input name="N_Review" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Review Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Presentase Bintang 5 Buku </label>
            <input name="Star5" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Presentase bintang5 % Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Presentase Bintang 4 Buku </label>
            <input name="Star4" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Presentase bintang4 % Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Presentase Bintang 3 Buku </label>
            <input name="Star3" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Presentase bintang3 % Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Presentase Bintang 2 Buku </label>
            <input name="Star2" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Presentase bintang2 % Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Presentase Bintang 1 Buku </label>
            <input name="Star1" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Presentase bintang1 % Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Dimensi Buku </label>
            <input name="Dimension" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Dimensi Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">Berat Buku </label>
            <input name="Weight" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Berat Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="jenisBea">Bahasa Buku&emsp;</label>
            <select name="Language" class="form-select" required>
                <option>Inggris</option>
                <option>Indonesia</option>
            </select>
        </div>
        <div class="form-group">
            <label for="namaBea">Publish Buku </label>
            <input name="Publisher" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Publish Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="namaBea">ISBN Buku </label>
            <input name="ISBN" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan ISBN Buku di sini" required>
        </div>
        <div class="form-group">
            <label for="comment">Link Buku</label>
            <textarea name="Link" class="form-control" rows="5" id="comment" name="Link" placeholder="Masukkan Link Buku" required></textarea>
        </div>
        <div class="form-group">
            <label for="namaBea">Link Komplit Buku </label>
            <input name="Complete_Link" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Link komplit Buku di sini" required>
        </div>
        <div class="mt-4 mb-xl-5 text-center">
            <div>
                <button type="submit" class="btn btn-primary btn-lg" name="proses">Unggah</button>
            </div>
        </div>
    </form>
    <?php
    include "connection.php";
    
    if(isset($_POST['proses'])){
       
            mysqli_query($conn, "INSERT INTO book1 SET  
                BookTitle = '$_POST[BookTitle]',
                Author = '$_POST[Author]',
                Price = '$_POST[Price]',
                Price_Used = '$_POST[Price_Used]',
                Pages = '$_POST[Pages]',
                Avg_Review = '$_POST[Avg_Review]',
                N_Review = '$_POST[N_Review]',
                Star5 = '$_POST[Star5]',
                Star4 = '$_POST[Star4]',
                Star3 = '$_POST[Star3]',
                Star2 = '$_POST[Star2]',
                Star1 = '$_POST[Star1]',
                Dimension = '$_POST[Dimension]',
                Weight = '$_POST[Weight]',
                Language = '$_POST[Language]',
                Publisher = '$_POST[Publisher]',
                ISBN = '$_POST[ISBN]',
                Link = '$_POST[Link]',
                Complete_Link = '$_POST[Complete_Link]'
            ") or die("SQL Error ".mysqli_error($conn));
            
            echo "Data baru telah tersimpan";
            
            header('location:beadn.php');
            exit;
        } 
    
?>

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
            <a href="recom_book.php" class="text-white" style="text-decoration: none;">Rekomendasi Buku</a>
        </p>
        <p>
            <a href="search_book.php" class="text-white" style="text-decoration: none;">Pencarian Buku</a>
        </p>
        <p>
            <a href="book.php" class="text-white" style="text-decoration: none;">Dataset Buku</a>
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