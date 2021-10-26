<?php

include "./config/koneksi.php"; 
$file = $_FILES['fileupload']['tmp_name'];
$handle = fopen($file, "r");

while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
    $merek = $filesop[0];
    $sql = "INSERT INTO barang VALUES (0,'" . $filesop[0] . "','" . $filesop[1] . "','" . $filesop[2] . "','" . $filesop[3] . "','" . $filesop[4] . "','" . $filesop[5] . "')";
    mysql_query($sql)or die (mysql_error());
	echo "fff";
}

header("location:admin_barang.php");

?>