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
				<h1 style="color:#008080 ; margin-left:20px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-top:30px; margin-bottom:20px;">Proses Clustering Data</h1>
				<div class="form">
					
					<div class="form_row">
					<label>Tanggal</label>
					<input type="text" class="form_input" id="tanggal1" style="width:200px" name="var1" value="<?php echo $_POST['var1'];?>" required />
					<label style="width:50px;text-align:center;">s/d</label>
					<input type="text" class="form_input" id="tanggal2" style="width:200px" name="var2" value="<?php echo $_POST['var2'];?>"required />
					</div>
					 
					
					<div class="form_row">
					<input type="submit" class="form_submit" value="Proses Data" style="float:left;"/>
					</div> 
					<div class="clear"></div>
				</div>
			</div>
    
</form>		
				
			
			<?php 				

			
			$sql1 = mysql_query("SELECT avg(a.stock) as stock, avg(a.penjualan) as penjualan FROM barang a,  cluster b where a.kode_barang=b.kode_barang and b.keterangan='C1' and b.tanggal between '$var1' and '$var2' order by id asc "); 
			$row1 = mysql_fetch_array($sql1);	
			$sql2 = mysql_query("SELECT avg(a.stock) as stock, avg(a.penjualan) as penjualan FROM barang a,  cluster b where a.kode_barang=b.kode_barang and b.keterangan='C2' and b.tanggal between '$var1' and '$var2' order by id asc "); 
			$row2 = mysql_fetch_array($sql2);	
			$sql3 = mysql_query("SELECT avg(a.stock) as stock, avg(a.penjualan) as penjualan FROM barang a,  cluster b where a.kode_barang=b.kode_barang and b.keterangan='C3' and b.tanggal between '$var1' and '$var2' order by id asc "); 
			$row3 = mysql_fetch_array($sql3);	
			?>
			<table id="rounded-corner" style="margin-bottom:20px;">
    <thead>
    	<tr>
        	         
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
        </tr>
		<tr>        	           
            <th><?php echo  number_format($row1['stock'],2,".",".")?></th>
            <th><?php echo  number_format($row2['stock'],2,".",".")?></th>
            <th><?php echo  number_format($row3['stock'],2,".",".")?></th>
        </tr>
		<tr>        	           
            <th><?php echo  number_format($row1['penjualan'],2,".",".")?></th>
            <th><?php echo  number_format($row2['penjualan'],2,".",".")?></th>
            <th><?php echo  number_format($row3['penjualan'],2,".",".")?></th>
        </tr>
    </thead>
       
    
</table>

<?php

			
			
			mysql_query("DELETE FROM cluster_baru where  tanggal between '$var1' and '$var2' ")  or die (mysql_error());
			$sql = mysql_query("SELECT a.*,b.*  FROM barang a,  cluster b where a.kode_barang=b.kode_barang and b.tanggal between '$var1' and '$var2' order by id_cluster asc "); 
			while($row = mysql_fetch_array($sql)) {	
					$pusat = ($row['stock'] + $row['penjualan'])/2;		
				
					$C1=	sqrt((($row['stock']-$row1['stock'])*($row['stock']-$row1['stock']))+(($row['penjualan']-$row1['penjualan'])*($row['penjualan']-$row1['penjualan'])));
					$C2=	sqrt((($row['stock']-$row2['stock'])*($row['stock']-$row2['stock']))+(($row['penjualan']-$row2['penjualan'])*($row['penjualan']-$row2['penjualan'])));
					$C3=	sqrt((($row['stock']-$row3['stock'])*($row['stock']-$row3['stock']))+(($row['penjualan']-$row3['penjualan'])*($row['penjualan']-$row3['penjualan'])));
	
					
					
					$selisih1=abs($pusat - $C1);		
					$selisih2=abs($pusat - $C2);		
					$selisih3=abs($pusat - $C3);	
					
				
				
					
					if($selisih1<$selisih2 and $selisih1<$selisih3){
						$cluster="C1";						
					}elseif($selisih2<$selisih1 and $selisih2<$selisih3){
						$cluster="C2";						
					}elseif($selisih3<$selisih1 and $selisih3<$selisih2){
						$cluster="C3";						
					}
					mysql_query("insert into cluster_baru  values ('0','".$row['kode_barang']."','".$row['tanggal']."','".$row['nama_barang']."','$C1','$C2','$C3','$cluster')")  or die (mysql_error());
			} 			
			?>
			
			
	<table id="rounded-corner">
    <thead>
    	<tr>
        	<th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>            
           
        </tr>
    </thead>
       
    <tbody>
<?php 
  

$sql = mysql_query("SELECT * from cluster_baru order by id_cluster_baru asc "); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['kode_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			<td><?php echo $row['tanggal']; ?></td>
			<td <?php if ($row['keterangan']=='C1'){?> style="color:#F00"  <?php } ?>><?php echo number_format($row['nilai_c1'],2,".","."); ?></td>
			<td <?php if ($row['keterangan']=='C2'){?> style="color:#F00"  <?php } ?>><?php echo number_format($row['nilai_c2'],2,".","."); ?></td>
			<td <?php if ($row['keterangan']=='C3'){?> style="color:#F00"  <?php } ?>><?php echo number_format($row['nilai_c3'],2,".","."); ?></td>
		   
        </tr>
<?php $i++; } ?>							
  
    </tbody>
</table>

<?php } else { ?>  
  <form name="form" action="?aksi=lihat" method="post" >	
<!-- Box  -->
				<div id="tab1" class="tabcontent">
				<h1 style="color:#333; margin-left:20px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-top:30px; margin-bottom:20px;">Proses Clustering Baru</h1>
				<div class="form">
					
					<div class="form_row">
					<label>Tanggal</label>
					<input type="text" class="form_input" id="tanggal1" style="width:200px" name="var1" required />
					<label style="width:50px;text-align:center;">s/d</label>
					<input type="text" class="form_input" id="tanggal2" style="width:200px" name="var2" required />
					</div>
					 
				
				
					
					
					<div class="form_row">
					<input type="submit" class="form_submit" value="Proses Data" style="float:left;"/>
					</div> 
					<div class="clear"></div>
				</div>
			</div>
    
</form>	
				


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