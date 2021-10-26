<?php
session_start();
include "./config/koneksi.php" ;

$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));

if ($username!='' AND $password!='')
{ 
	//user pass OK
	$passmd5 = md5($password);

	$query = mysql_query("SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'") or die( mysql_error() );
	$login = mysql_fetch_array($query);

	if ( $login['id_admin']!='' ) {
		//login OK		
		$_SESSION['username']	= $login['username'];
		$_SESSION['userid']		= $login['id_admin'];
		header("location: admin_home.php"); 
	} else {
		//login FAILED
		header("location: index.php");
	}
} else {
	//username atau password kosong
	echo "<div class='err'><strong>ERROR</strong><br />Karakter yang di izinkan hanya <strong>huruf</strong> dan <strong>angka</strong> tanpa spasi</div>";
}            
?>