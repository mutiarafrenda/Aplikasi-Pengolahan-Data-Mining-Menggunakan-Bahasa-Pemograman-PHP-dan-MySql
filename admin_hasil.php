<?php 
session_start();
if (ISSET($_SESSION['username'])) {
$menu	= "cluster";
include "header.php"; 
//SESSION OK
?>
<script language="JavaScript">
function cek_kosong() {
if (document.form.bulan.value.length == "1") {
	alert("Bulan Belum dipilih");
	return false;
}
if (document.form.tahun.value.length == "1") {
	alert("Tahun Belum dipilih");
	return false;
}
if (document.form.barang.value.length == "6") {
	alert("Barang belum dipilih");
	return false;
}
if (document.form.jumlah.value.length == "") {
	alert("Jumlah kosong");
	return false;
}
return true;
}

</script>
<?php if($_GET['aksi']=='lihat') { 
$var1	= trim($_POST['var1']);
$var2	= trim($_POST['var2']);
?>  
  <form name="form" action="?aksi=lihat" method="post" >	
<!-- Box  -->
				<div id="tab1" class="tabcontent">
				<h1 style="color:#333; margin-left:20px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-top:30px; margin-bottom:20px;">Hasil Clustering</h1>
				<div class="form">
					
					<div class="form_row">
					<label>Tanggal</label>
					<input type="text" class="form_input" id="tanggal1" style="width:200px" name="var1" value="<?php echo $_POST['var1'];?>" required />
					<label style="width:50px;text-align:center;">s/d</label>
					<input type="text" class="form_input" id="tanggal2" style="width:200px" name="var2" value="<?php echo $_POST['var2'];?>"required />
					</div>
					 
					
					<div class="form_row">
					<input type="submit" class="form_submit" value="Lihat Hasil" style="float:left;"/>
					</div> 
					<div class="clear"></div>
				</div>
			</div>
    
</form>		
				
		<h2>Data Barang C1</h2> 	
	 <table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Data Barang</th>
            <th>Nama Barang</th>
                    
           
        </tr>
    </thead>
       
    <tbody>
  <?php 
  

$sql = mysql_query("SELECT * from  hasil_cluster where keterangan='C1' order by id_hasil_cluster asc  "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['data_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>


<h2>Data Barang C2</h2> 	
 <table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Data Barang</th>
            <th>Nama Barang</th>
                    
           
        </tr>
    </thead>
       
    <tbody>
  <?php 
  

$sql = mysql_query("SELECT * from  hasil_cluster where keterangan='C2' order by id_hasil_cluster asc  "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['data_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>

<h2>Data Barang C3</h2> 	
 <table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Data Barang</th>
            <th>Nama Barang</th>
                    
           
        </tr>
    </thead>
       
    <tbody>
  <?php 
  

$sql = mysql_query("SELECT * from  hasil_cluster where keterangan='C3' order by id_hasil_cluster asc  "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['data_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>

<?php } else { ?>  
  
 <h2>Data Barang C1</h2> 	
	 <table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Data Barang</th>
            <th>Nama Barang</th>
                    
           
        </tr>
    </thead>
       
    <tbody>
  <?php 
  

$sql = mysql_query("SELECT * from  cluster where keterangan='C1' order by id_cluster asc "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['data_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>


<h2>Data Barang C2</h2> 	
 <table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Data Barang</th>
            <th>Nama Barang</th>
                    
           
        </tr>
    </thead>
       
    <tbody>
  <?php 
  

$sql = mysql_query("SELECT * from  cluster where keterangan='C2' order by id_cluster asc "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['data_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>

<h2>Data Barang C3</h2> 	
 <table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Data Barang</th>
            <th>Nama Barang</th>
                    
           
        </tr>
    </thead>
       
    <tbody>
  <?php 
  

$sql = mysql_query("SELECT * from  cluster where keterangan='C3' order by id_cluster asc  "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['data_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>
 
				


<?php }?>						
	
    
        <div class="toogle_wrap">
            <div class="trigger">
			</div>
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