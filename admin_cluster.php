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
$var11	= trim($_POST['var11']);
$var12	= trim($_POST['var12']);
$var21	= trim($_POST['var21']);
$var22	= trim($_POST['var22']);
$var31	= trim($_POST['var31']);
$var32	= trim($_POST['var32']);
?>  
 		
			
			<?php 				

			mysql_query("DELETE FROM cluster ")  or die (mysql_error());
			$sql = mysql_query("SELECT * FROM barang order by idbarang asc "); 
			while($row = mysql_fetch_array($sql)) {	
					$pusat = ($row['stock'] + $row['penjualan'])/2;		
				
					$C1=	sqrt((($row['stock']-$var11)*($row['stock']-$var11))+(($row['penjualan']-$var12)*($row['penjualan']-$var12)));
					$C2=	sqrt((($row['stock']-$var21)*($row['stock']-$var21))+(($row['penjualan']-$var22)*($row['penjualan']-$var22)));
					$C3=	sqrt((($row['stock']-$var31)*($row['stock']-$var31))+(($row['penjualan']-$var32)*($row['penjualan']-$var32)));
					
					
					
					$selisih1=abs($pusat - $C1);		
					$selisih2=abs($pusat - $C2);		
					$selisih3=abs($pusat - $C3);	
					
				
				
					
					if($C1<$C2 and $C1<$C3){
						$cluster="C1";						
					}elseif($C2<$C1 and $C2<$C3){
						$cluster="C2";						
					}elseif($C3<$C1 and $C3<$C2){
						$cluster="C3";						
					}
					mysql_query("insert into cluster  values ('0','".$row['data_barang']."','".$row['tanggal']."','".$row['nama_barang']."','$C1','$C2','$C3','$cluster')")  or die (mysql_error());
			} 			
			?>
			
			
	 <form name="form" action="?aksi=lihat" method="post" >	
<!-- Box  -->
				<div id="tab1" class="tabcontent">
				<h1 style="color:#669999; margin-left:20px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-top:30px; margin-bottom:20px;">Proses Data Clustering </h1>
				<div>
					<div class="left">
							<table id="rounded-corner">
								<thead>
									<tr>
										<th>No.</th>
										<th>Data Barang</th>
										<th>Nama Barang</th>
										<th>C1</th>
										<th>C2</th>
										<th>C3</th>            
									   
									</tr>
								</thead>
								<tbody>
								<?php 
  
									$sql = mysql_query("SELECT * from cluster order by id_cluster asc "); 
									$i=$start+1;
									while($row = mysql_fetch_array($sql)) {		
											if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
										?>							
												<tr class="<?php echo $klas;?>">
												<td><?php echo $i;?>.</td>
												<td><?php echo $row['data_barang']; ?></td>
												<td><?php echo $row['nama_barang']; ?></td>
												<td <?php if ($row['keterangan']=='C1'){?> style="color:#F00"  <?php } ?>><?php echo number_format($row['nilai_c1'],2,".","."); ?></td>
												<td <?php if ($row['keterangan']=='C2'){?> style="color:#F00"  <?php } ?>><?php echo number_format($row['nilai_c2'],2,".","."); ?></td>
												<td <?php if ($row['keterangan']=='C3'){?> style="color:#F00"  <?php } ?>><?php echo number_format($row['nilai_c3'],2,".","."); ?></td>
											   
											</tr>
									<?php $i++; } ?>							
									  
										</tbody>
							</table>
				</div>
				
				
				<div class="right">
					
					<div class="form_row1">
					<label>C1</label>
					<input type="text" class="form_input"  style="width:70px; margin-right:5px;" name="var11" value="<?php echo $_POST['var11'];?>" required />				
					<input type="text" class="form_input"  style="width:70px" name="var12" value="<?php echo $_POST['var12'];?>"required />
					</div>
					 
				
					<div class="form_row1">
					<label>C2</label>
					<input type="text" class="form_input"  style="width:70px;margin-right:5px;" name="var21" value="<?php echo $_POST['var21'];?>" required />				
					<input type="text" class="form_input"  style="width:70px" name="var22" value="<?php echo $_POST['var22'];?>"required />
					</div>
					 
				
					<div class="form_row1">
					<label>C3</label>
					<input type="text" class="form_input"  style="width:70px;margin-right:5px;" name="var31" value="<?php echo $_POST['var31'];?>" required />				
					<input type="text" class="form_input"  style="width:70px" name="var32" value="<?php echo $_POST['var32'];?>"required />
					</div>
					 
				
					
					
					<div class="form_row1">
					<input type="submit" class="form_submit" value="Proses Data" style="float:left;"/>
					</div> 
					
					</div>
				
				<div class="clear"></div>
				</div>
				
			</div>
    
</form>	

<?php } else { ?>  
  <form name="form" action="?aksi=lihat" method="post" >	
<!-- Box  -->
				<div id="tab1" class="tabcontent">
				<h1 style="color:#000000 ; margin-left:20px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-top:30px; margin-bottom:20px;">Proses Data Clustering </h1>
				<div>
					<div class="left">
							<table id="rounded-corner">
								<thead>
									<tr>
										<th>No.</th>
										<th>Data Barang</th>
										<th>Nama Barang</th>
										<th>C1</th>
										<th>C2</th>
										<th>C3</th>            
									   
									</tr>
								</thead>
							
							</table>
				</div>
				
				
				<div class="right">
					
					<div class="form_row1">
					<label>C1</label>
					<input type="text" class="form_input"  style="width:70px; margin-right:5px;" name="var11" value="<?php echo $_POST['var11'];?>" required />				
					<input type="text" class="form_input"  style="width:70px" name="var12" value="<?php echo $_POST['var12'];?>"required />
					</div>
					 
				
					<div class="form_row1">
					<label>C2</label>
					<input type="text" class="form_input"  style="width:70px;margin-right:5px;" name="var21" value="<?php echo $_POST['var21'];?>" required />				
					<input type="text" class="form_input"  style="width:70px" name="var22" value="<?php echo $_POST['var22'];?>"required />
					</div>
					 
				
					<div class="form_row1">
					<label>C3</label>
					<input type="text" class="form_input"  style="width:70px;margin-right:5px;" name="var31" value="<?php echo $_POST['var31'];?>" required />				
					<input type="text" class="form_input"  style="width:70px" name="var32" value="<?php echo $_POST['var32'];?>"required />
					</div>
					 
				
					
					
					<div class="form_row1">
					<input type="submit" class="form_submit" value="Proses Data" style="float:left;"/>
					</div> 
					
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