<?php 
session_start();
if (ISSET($_SESSION['username'])) {
$menu	= "supplier";
include "header.php"; 

?>


 <?php if($_GET['aksi']=='add2') { //PROSES ?>
<?php
$var1	= trim($_POST['var1']);
$var2	= trim($_POST['var2']);
$var3	= trim($_POST['var3']);
$var4	= trim($_POST['var4']);
$var5	= trim($_POST['var5']);

//
//
$query = "INSERT INTO admin VALUES ('0','$var1','$var2','$var3','$var4','$var5')";
if(mysql_query($query)) {
?>
<div class="msg msg-ok"><!-- Message OK -->
	<p><strong>DATA TELAH DISIMPAN</strong></p>
</div><!-- End Message OK -->
<?php
} else {
?>
<div class="msg msg-error"><!-- Message Error -->
	<p><strong>DATA GAGAL DISIMPAN</strong></p>
</div><!-- End Message Error -->
<?php
}

?> 
		
<?php }elseif($_GET['aksi']=='edit2') { //UPDATE POSTING ?>	
<?php
$id		= trim($_GET['id']);
$var1	= trim($_POST['var1']);
$var2	= trim($_POST['var2']);
$var3	= trim($_POST['var3']);
$var4	= trim($_POST['var4']);
$var5	= trim($_POST['var5']);


//
$query = "UPDATE admin SET nama_admin='$var1',`email`='$var2',`telpon`='$var3',`username`='$var4',`password`='$var5' WHERE id_admin='$id'";
if(mysql_query($query)) {
?>
<div class="msg msg-ok">
	<p><strong>DATA BERHASIL DIUPDATE</strong></p>
</div><!-- End Message OK -->
<?php
} else {
?>
<div class="msg msg-error"><!-- Message Error -->
	<p><strong>DATA GAGAL DIUPDATE</strong></p>
</div><!-- End Message Error -->
<?php
} //end proses add
?>			
				<?php } elseif($_GET['aksi']=='del') { //DEL POSTING ?>	
				<?php
				$id		= trim($_GET['id']);
				$query	= "DELETE FROM admin WHERE id_admin='$id' LIMIT 1";
				//
				if(mysql_query($query)) {
				?>
				<div class="msg msg-ok"><!-- Message OK -->
					<p><strong>DATA TELAH DIHAPUS</strong></p>
				</div><!-- End Message OK -->
				<?php
				} else {
				?>
				<div class="msg msg-error"><!-- Message Error -->
					<p><strong>DATA GAGAL DIHAPUS</strong></p>
				</div><!-- End Message Error -->
				<?php
				}
				?>		
				<?php }  ?>


<?php if($_GET['aksi']=='add') { //ADD POSTING =========================================================================================== ?>		
<form name="form" action="?aksi=add2" method="post" >	
<!-- Box  -->
				<div id="tab1" class="tabcontent">
				<h3>Tambah Data Admin</h3>
				<div class="form">
					
					<div class="form_row">
					<label>Nama Admin</label>
					<input type="text" class="form_input" name="var1" required />
					</div>
					 
					<div class="form_row">
					<label>Email</label>
					<input type="text" class="form_input" name="var2" required />
					</div>
					
					<div class="form_row">
					<label>Telpon</label>
					<input type="text" class="form_input" name="var3" required />
					</div>
					
					<div class="form_row">
					<label>Username</label>
					<input type="text" class="form_input" name="var4" required />
					</div>
					
					<div class="form_row">
					<label>Password</label>
					<input type="text" class="form_input" name="var5" required />
					</div>
					
					
					
					
					<div class="form_row">
					<input type="submit" class="form_submit" value="Simpan Data" />
					</div> 
					<div class="clear"></div>
				</div>
			</div>
    
</form>		
					
<?php } elseif($_GET['aksi']=='edit') { //EDIT POSTING =========================================================================================== ?>
<?php
$id		= trim($_GET['id']);
$query	= mysql_query("SELECT * FROM admin WHERE id_admin='$id'");
$rows	= mysql_fetch_array($query);
?>	
<form name="form"  action="?aksi=edit2&id=<?php echo $rows['id_admin']; ?>"  method="post" onsubmit="return cek_kosong();">	
<!-- Box  -->
				<div id="tab1" class="tabcontent">
				<h3>Update Data Admin</h3>
				<div class="form">
					
					
					 
					<div class="form_row">
					<label>Nama Admin</label>
					<input type="text" class="form_input" name="var1" value="<?php echo $rows['nama_admin'];?>" required />
					</div>
					 
					<div class="form_row">
					<label>Email</label>
					<input type="text" class="form_input" name="var2" value="<?php echo $rows['email'];?>" required />
					</div>
					
					<div class="form_row">
					<label>Telpon</label>
					<input type="text" class="form_input" name="var3" value="<?php echo $rows['telpon'];?>" required />
					</div>
					
					<div class="form_row">
					<label>Username</label>
					<input type="text" class="form_input" name="var4" value="<?php echo $rows['username'];?>" required />
					</div>
					
					<div class="form_row">
					<label>Password</label>
					<input type="text" class="form_input" name="var5" value="<?php echo $rows['password'];?>" required />
					</div>
					
					<div class="form_row">
					<input type="submit" class="form_submit" value="Update Data" />
					</div> 
					<div class="clear"></div>
				</div>
			</div>
    
</form>		
					
<?php } else { ?>                   
    <div class="form_sub_buttons">
	<a href="?aksi=add" class="button green"><span>Tambah Data</span></a></h2>
	</div>
	<h2>Data Admin</h2> 
						
<table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Kode Admin</th>                
            <th>Nama Admin</th>                
            <th>Email</th>     
            <th>Username</th>                
            <th>Password</th>                
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
        <tfoot>
    	
    </tfoot>
    <tbody>
<?php 
    $thispage = $PHP_SELF ;
	$query = mysql_query("SELECT *from admin order by id_admin desc");
    $num = mysql_num_rows($query); // number of items in list
    $per_page = 10; // Number of items to show per page
	$start = $_GET['start'];
    if(empty($start))$start=0;  // Current start position

    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

$sql = mysql_query("SELECT * from admin order BY id_admin desc LIMIT $start,$per_page"); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['nama_admin']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['telpon']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><a href="?aksi=edit&id=<?php echo $row['id_admin']; ?>" ><img src="images/edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="?aksi=del&id=<?php echo $row['id_admin']; ?>" onClick="return confirm('Apakah anda ingin menghapus data ini?')" ><img src="images/trash.gif" alt="" title="" border="0" /></a></td>
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>
<div class="pagging">
<div class="left">Menampilkan <?php print($cur);?> dari <?php print($max_pages);?> ( <?php print($num);?> data )</div>
<div class="right">
<?php
if(($start-$per_page) >= 0){
    $next = $start-$per_page;
?>
<a href="<?php print("$thispage".($next>=0?("?start=").$next:""));?>">Prev<<</a> 
<?php
}
?>
<?php 
if($start+$per_page<$num)
{
?>
<a href="<?php print("$thispage?start=".max(0,$start+$per_page));?>">>>Next</a> 
<?php
}
?>
</div>
</div>
<?php }?>						
	
    
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