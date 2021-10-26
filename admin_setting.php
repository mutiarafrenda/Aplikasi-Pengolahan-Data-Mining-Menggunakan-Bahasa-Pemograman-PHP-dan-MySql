<?php 
session_start();
if (ISSET($_SESSION['username'])) {
$menu	= "setting";
include "header.php"; 
?>



<?php if($_GET['aksi']=='add2') { //PROSES ?>
<?php



if(mysql_query($query)) {
?>
<div class="msg msg-ok"><!-- Message OK -->
	<p><strong>Data BERHASIL disimpan</strong></p>
</div><!-- End Message OK -->
<?php
} else {
?>
<div class="msg msg-error"><!-- Message Error -->
	<p><strong>Data GAGAL disimpan</strong></p>
</div><!-- End Message Error -->
<?php
} //end proses add
?>
		
<?php }elseif($_GET['aksi']=='edit2') { //UPDATE POSTING ?>	
<?php
$id			= trim($_GET['id']);
$var1		= trim($_POST['nama']);
$var2		= trim($_POST['username']);
$var3		= trim($_POST['password']);

//
$query = "UPDATE admin SET nama_admin='$var1',username='$var2',password='$var3' where id_admin='$id'";
if(mysql_query($query)) {
?>
<div class="msg msg-ok"><!-- Message OK -->
	<p><strong>Data BERHASIL diupdate</strong></p>
</div><!-- End Message OK -->
<?php
} else {
?>
<div class="msg msg-error"><!-- Message Error -->
	<p><strong>Data GAGAL diupdate</strong></p>
</div><!-- End Message Error -->
<?php
} //end proses add
?>
<?php }elseif($_GET['aksi']=='del') { //DEL POSTING ?>	
<?php
$id		= trim($_GET['id']);
//
if(mysql_query($query)) {
?>
<div class="msg msg-ok"><!-- Message OK -->
	<p><strong>Data BERHASIL dihapus</strong></p>
</div><!-- End Message OK -->
<?php
} else {
?>
<div class="msg msg-error"><!-- Message Error -->
	<p><strong>Data GAGAL dihapus</strong></p>
</div><!-- End Message Error -->
<?php
}
?>		
<?php } //AKHIR PROSES ?>

<?php if($_GET['aksi']=='add') { //ADD POSTING =========================================================================================== ?>		
<form name="form" action="?aksi=add2" method="post" >	
<!-- Box  -->
			
				<!-- End Box  -->	
</form>							
<?php } elseif($_GET['aksi']=='edit') { //EDIT POSTING =========================================================================================== ?>
<?php
$id		= $_SESSION['userid'];
$query	= mysql_query("SELECT * FROM user WHERE id_user='$id'");
$rows	= mysql_fetch_array($query);
?>	
<form name="form" action="?aksi=edit2&id=<?php echo $rows['id_user']; ?>" method="post" >
<!-- Box FORM -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Setting Akun</h2>
					</div>
					
					<div class="form">
								<p class="inline-field">
									<label>Nama Lengkap  <span>(wajib di isi)</span></label>
									<input type="text" class="field size5" name="nama" maxlength="60" value="<?php echo $rows['nama']; ?>"  required/>
								</p>
								
								<p class="inline-field">
									<label>Username <span>(wajib di isi)</span></label>
									<input type="text" class="field size5" name="username" maxlength="60" value="<?php echo $rows['username']; ?>" required/>
								</p>
								
								
								<p class="inline-field">
									<label>Password  <span>(wajib di isi)</span></label>
									<input type="text" class="field size5" name="password" maxlength="60" value="<?php echo $rows['password']; ?>" required/>
								</p>
								
								
                               
													
						</div>
						
						
					
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Update data" />
						</div>
						<!-- End Form Buttons -->
				</div>
				<!-- End Box FORM -->
<!-- End Box FORM -->
</form>					
<?php } else { //TAMPIL TABEL =========================================================================================== ?>					
<!-- Box -->
<?php
$id		= $_SESSION['userid'];
$query	= mysql_query("SELECT * FROM admin WHERE id_admin='$id'");
$rows	= mysql_fetch_array($query);
?>	
<form name="form" action="?aksi=edit2&id=<?php echo $rows['id_admin']; ?>" method="post" >
<!-- Box FORM -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h3>Setting Akun</h3>
					</div>
					
					<div class="form">
								<p class="inline-field">
									<label>Nama Lengkap  <span>(wajib di isi)</span></label>
									<input type="text" class="field size5" name="nama" maxlength="60" value="<?php echo $rows['nama_admin']; ?>"  required/>
								</p>
								
								<p class="inline-field">
									<label>Username <span>(wajib di isi)</span></label>
									<input type="text" class="field size5" name="username" maxlength="60" value="<?php echo $rows['username']; ?>" required/>
								</p>
								
								
								<p class="inline-field">
									<label>Password  <span>(wajib di isi)</span></label>
									<input type="text" class="field size5" name="password" maxlength="60" value="<?php echo $rows['password']; ?>" required/>
								</p>
								
								
                               
													
						</div>
						
						
					
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Update data" />
						</div>
						<!-- End Form Buttons -->
				</div>
				<!-- End Box FORM -->
<!-- End Box FORM -->
</form>	
				<!-- End Box LIST -->
<?php } //AKHIR =========================================================================================== ?>			
 <div class="toogle_wrap">
            <div class="trigger"><a href="#"></a></div>

        </div>
      
     </div>
     </div><!-- end of right content-->
                      
<?php
include "footer.php"; 
} else { 
	//SESSION KOSONG
	header("location: index.php");
} 
?>						