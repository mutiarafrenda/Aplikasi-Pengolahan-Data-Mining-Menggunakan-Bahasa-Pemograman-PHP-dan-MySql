<?php
session_start();
include "./config/koneksi.php" ;

if ( ISSET($_SESSION['username']) ) {
	UNSET($_SESSION['username']);
	UNSET($_SESSION['userid']);
}

header("location: index.php");
session_destroy();
?>