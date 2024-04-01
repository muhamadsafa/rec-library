<?php
include "connection.php";

function query($query) {
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row[] = $row;
    }
    return $row;
}

function cari($keyword){
    $query = "SELECT * FROM book1 WHERE BookTitle LIKE '%$keyword%' OR Author LIKE '%$keyword%'";
    return query($query);
}
?>