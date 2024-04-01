<?php
include "connection.php";

// Inisialisasi variabel keyword
$keyword = "";

// Memeriksa apakah form pencarian dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil kata kunci pencarian dari formulir
    $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
}

// Jika session 'user_name' ada, ambil hasil pencarian dari tabel 'sear'
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];

    // Ambil dua keyword teratas dari hasil pencarian user
    $searQuery = "SELECT kolsear, COUNT(*) as jumlah_klik 
                  FROM sear 
                  WHERE usesear = '$username' 
                  GROUP BY kolsear 
                  ORDER BY jumlah_klik DESC 
                  LIMIT 2";
    $searResult = mysqli_query($conn, $searQuery);

    // Inisialisasi array untuk menyimpan keyword
    $keywords = array();

    // Ambil keyword dari hasil pencarian terakhir
    while ($searRow = mysqli_fetch_assoc($searResult)) {
        $keywords[] = $searRow['kolsear'];
    }

    // Tampilkan hasil pencarian dari tabel 'sear' untuk dua keyword teratas
    if (count($keywords) > 0) {
        for ($i = 0; $i < count($keywords); $i++) {
            $query = "SELECT * FROM book1 WHERE BookTitle LIKE '%$keywords[$i]%'";
            $result = mysqli_query($conn, $query);

            // Menampilkan hasil pencarian atau seluruh data buku
            while ($row = mysqli_fetch_assoc($result)) {
                $isbn = $row['ISBN'];
                $booktitle = $row['BookTitle'];
                $author = $row['Author'];
                $lempe = $row['Edition'];
                $publish = $row['Publisher'];
                ?>
                <!-- Card template -->
                <div class="container-dalneg">
                    <h5><?php echo $booktitle; ?></h5>
                    <button class="<?php echo $class; ?>"><?php echo $publish; ?></button>
                    <p> Author : <?php echo $author; ?>&nbsp;<a class="linkis" href="becend.php?id=<?php echo $isbn; ?>&title=<?php echo urlencode($booktitle); ?>">Info Selengkapnya</a></p>
                    <br/>
                    <?php
                    // Check if the current user matches lempe
                    if (isset($_SESSION['user_name']) && $_SESSION['user_name'] == 'admin') {
                        ?>
                        <form method="post" action="">
                            <input type="hidden" name="idToDelete" value="<?php echo $isbn; ?>" />
                            <button type="submit" name="delete">Hapus</button>
                        </form>
                        <br/>
                    <?php
                    }
                    ?>
                </div>
                <div class="container-spc pt-1 pb-2"></div>
                <?php
            }
        }
    }
} else {
    // Jika session 'user_name' tidak ada, tampilkan hasil pencarian biasa
    if (!empty($keyword)) {
        $query = "SELECT * FROM book1 WHERE BookTitle LIKE '%$keyword%'";
    } else {
        $query = "SELECT * FROM book1";
    }

    $result = mysqli_query($conn, $query);

    // Menampilkan hasil pencarian atau seluruh data buku
    while ($row = mysqli_fetch_assoc($result)) {
        $isbn = $row['ISBN'];
        $booktitle = $row['BookTitle'];
        $author = $row['Author'];
        $lempe = $row['Edition'];
        $publish = $row['Publisher'];
        ?>
        <!-- Card template -->
        <div class="container-dalneg">
            <h5><?php echo $booktitle; ?></h5>
            <button class="<?php echo $class; ?>"><?php echo $publish; ?></button>
            <p> Author : <?php echo $author; ?>&nbsp;<a class="linkis" href="becend.php?id=<?php echo $isbn; ?>&title=<?php echo urlencode($booktitle); ?>">Info Selengkapnya</a></p>
            <br/>
            <?php
            // Check if the current user matches lempe
            if (isset($_SESSION['user_name']) && $_SESSION['user_name'] == 'admin') {
                ?>
                <form method="post" action="">
                    <input type="hidden" name="idToDelete" value="<?php echo $isbn; ?>" />
                    <button type="submit" name="delete">Hapus</button>
                </form>
                <br/>
            <?php
            }
            ?>
        </div>
        <div class="container-spc pt-1 pb-2"></div>
        <?php
    }
}

// Menampilkan pesan jika tidak ada hasil pencarian
if (empty($keyword) && mysqli_num_rows($result) == 0) {
    echo "<div class='container-dalneg'>Tidak ada hasil pencarian.</div>";
}

// Menutup koneksi database
mysqli_close($conn);
?>
