<?php
    $sname= "sibuhuan.iixcp.rumahweb.net";
    $unmae= "ptik2214_rec-library";
    $password = "*Rwm&6?6KsI(";

    $db_name = "ptik2214_rec-library";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    if (!$conn) {
    	echo "Connection failed!";
    }
?>