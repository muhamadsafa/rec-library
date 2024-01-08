<?php
    $sname= "sibuhuan.iixcp.rumahweb.net";
    $unmae= "ptik2214_isb";
    $password = "@Kel2isb";

    $db_name = "ptik2214_isb";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    if (!$conn) {
    	echo "Connection failed!";
    }
?>