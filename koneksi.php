<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'dbclustering';
$sitename	= 'PERUSAHAAN CAHAYA FITRIAENDIKA';

$koneksi = mysql_connect( $host, $username, $password )
or die ("Gagal Koneksi Database".mysql_error());
$db = mysql_select_db($database,$koneksi)
or die ("Gagal Membuka Database".mysql_error());
?>