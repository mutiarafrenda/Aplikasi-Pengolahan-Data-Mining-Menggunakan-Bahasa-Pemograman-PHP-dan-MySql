<?php 
session_start();
if (ISSET($_SESSION['username'])) {
$menu	= "import";
include "header.php"; 


?>


 <?php if($_GET['aksi']=='add2') { //PROSES ?>

<?php }elseif($_GET['aksi']=='edit2') { //UPDATE POSTING ?>	

<?php }elseif($_GET['aksi']=='del') { //DEL POSTING ?>	
<?php
$idbarang	= trim($_GET['idb']);
$query	= "DELETE FROM barang";
//
if(mysql_query($query)) {
?>
<div class="msg msg-ok"><!-- Message OK -->
	<p><strong>Data terhapus</strong></p>
</div><!-- End Message OK -->
<?php
} else {
?>
<div class="msg msg-error"><!-- Message Error -->
	<p><strong>cTidak dapat menghapus data</strong></p>
</div><!-- End Message Error -->
<?php
}
?>		
<?php } //AKHIR PROSES ?>

<?php if($_GET['aksi']=='add') { //ADD POSTING =========================================================================================== ?>		
			
<?php } elseif($_GET['aksi']=='edit') { //EDIT POSTING =========================================================================================== ?>
		
<?php } else { ?>                   
    <div class="form_sub_buttons">
	
	 <form enctype="multipart/form-data" method="post" action="save_data.php">
            <input type="file" class="form_input" id="fileupload" name="fileupload" />                                
            <button type="submit" name="submit" value="Submit" style="margin:0px 20px; padding:7px 15px;">Masukan Data</button>
        </form>
		</div>
		
		 <div class="form_sub_buttons">
			<a href="?aksi=del" class="button blue" onClick="return confirm('Apakah anda yakin ingin menghapus data ini? ?')"><span>Hapus</span></a></h2>
			</div>
	<h2>Data Barang</h2> 
						
<table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Data Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal</th>
            <th>Stock</th>
            <th>Penjualan</th>
            <th>Satuan</th>            
        </tr>
    </thead>
       
    <tbody>
<?php 
  

$sql = mysql_query("SELECT * from barang order by idbarang asc "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['data_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			<td><?php echo $row['tanggal']; ?></td>
			<td><?php echo $row['stock']; ?></td>
			<td><?php echo $row['penjualan']; ?></td>
			<td><?php echo $row['satuan']; ?></td>
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>

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