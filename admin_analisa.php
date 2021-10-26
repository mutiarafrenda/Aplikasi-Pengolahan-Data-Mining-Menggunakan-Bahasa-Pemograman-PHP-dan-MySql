<?php 
session_start();
if (ISSET($_SESSION['username'])) {
$menu	= "analisa";
include "header.php"; 
//SESSION OK
?>

<?php if($_GET['aksi']=='lihat') { 
if ($_POST['tblihat']) {
$var1	= trim($_POST['bulan']);
$var2	= trim($_POST['tahun']);
}else{
$var1	= trim($_GET['bulan']);
$var2	= trim($_GET['tahun']);
}
				
$sql1 = mysql_query("SELECT sum(pembelian) as total from pembelian where bulan='$var1' and tahun='$var2'"); 
$i=$start+1;
while($row1 = mysql_fetch_array($sql1)) {$total= $row1['total'];	}?>

 
<form name="form" action="?aksi=analisa" method="post">	
	<div id="tab1" class="tabcontent">
			<h3>Jumlah Transaksi</h3>
			<div class="form">
					<div class="form_row">
						<label>Bulan</label>
						<input type="text" class="form_input" name="bulan1" value="<?php echo $var1 ?>" />
					</div>
					
					<div class="form_row">
						<label>Tahun</label>
						<input type="text" class="form_input" name="tahun1" value="<?php echo $var2 ?>"/>
					</div>
					
					<div class="form_row">
						<label>Jumlah Transaksi</label>
						<input type="text" class="form_input" name="jumlah" value="<?php echo $total ?>" />
					</div>
					
					<div class="form_row">
						<label>Minimum Support</label>
						<input type="text" class="form_input" name="support" />
					</div>
					
					<div class="form_row">
						<label>Minimum Confidence</label>
						<input type="text" class="form_input" name="confidence" />
					</div>
					
					<div class="form_row">
					<input type="submit" class="form_submit" value="Analisa" />
					</div>
					
				<div class="clear"></div>
			</div>
	</div>
</form>		


<?php } else if($_GET['aksi']=='analisa') {?>				
	<div id="tab1" class="tabcontent">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th>No.</th>
				<th>Aturan K=Items 2</th>
				<th>Support</th>
				<th>Confidence</th>
			</tr>
		</thead>
			<tfoot>
			
		</tfoot>
		<tbody>
		<?php
			$chemical=array();
			$chemical2=array();
			$bulan= trim($_POST['bulan1']);
			$tahun= trim($_POST['tahun1']);	
			$support= trim($_POST['support']);	
			$confedence= trim($_POST['confidence']);
		
			$total= trim($_POST['jumlah']);	

			function isi_keranjang(){
			$bulan= trim($_POST['bulan1']);
			$tahun= trim($_POST['tahun1']);	
			$isikeranjang = array();
			$sql = mysql_query("SELECT a.*,b.*,sum(b.pembelian) as total from suplier a,pembelian b 
	where a.kode_suplier=b.kode_suplier and  b.bulan='$bulan' and b.tahun='$tahun' 
			group by b.kode_suplier ")or die (mysql_error());
				
				while ($r=mysql_fetch_array($sql)) {
					$isikeranjang[] = $r;
				}
				return $isikeranjang;
			}

			//========================================
			$isikeranjang = isi_keranjang();
			$jml          = count($isikeranjang);
			//========================================


			$no=0;
			$i=1;
			for($a=0; $a<$jml;$a++){
					$n++;
					for($b=0+$n; $b<$jml;$b++){ 
					
					$bnyAB = $isikeranjang[$a]['pembelian']+$isikeranjang[$b]['pembelian'];
					
					
					$bnyA = $isikeranjang[$a]['pembelian'];
					$bnyB = $isikeranjang[$b]['pembelian'];
					
					?>
					
					<?php 
					$supp=($bnyAB/$total)*100;
					if($supp>=$support){ 
						$conf=($bnyA/$bnyAB)*100;
						if($conf>= $confedence){
							mysql_query("insert into final values('','".$isikeranjang[$a]['nama_suplier']."','$bnyA')");
							mysql_query("insert into final values('','".$isikeranjang[$b]['nama_suplier']."','$bnyB')");
							?>
							<tr class="even">
							<td ><?php echo $i;?>.</td>	  
							<td ><?php echo "Jika Membeli ";?><?php echo $isikeranjang[$a]['nama_suplier']?><?php echo " Maka Akan Membeli ";?>
							<?php echo $isikeranjang[$b]['nama_suplier']?></td>   
							<td ><?php echo number_format($supp,2); ?></td>	        
							<td ><?php echo number_format($conf,2) ?> %</td>	 
						   </tr> 
						<?php $i++; } ?>
						
						<?php $conf=($bnyB/$bnyAB)*100;
						if($conf>=$confedence) {
							mysql_query("insert into final values('','".$isikeranjang[$b]['nama_suplier']."','$bnyB')");
							mysql_query("insert into final values('','".$isikeranjang[$a]['nama_suplier']."','$bnyA')");
							?>
							<tr class="odd">
							<td ><?php echo $i;?>.</td>	  
							<td ><?php echo "Jika Membeli ";?><?php echo $isikeranjang[$b]['nama_suplier']?><?php echo " Maka Akan Membeli ";?>
							<?php echo $isikeranjang[$a]['nama_suplier']?></td>   
							<td ><?php echo number_format($supp,2); ?></td>	        
							<td ><?php echo number_format($conf,2) ?>%</td>	 
							</tr>  
						<?php

						$i++;
						}
					}
			}
			}
			?>
</table>
</div>

<div id="tab1" class="tabcontent">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th>No.</th>
				<th>Aturan K=Items 3</th>
				<th>Support</th>
				<th>Confidence</th>
			</tr>			
			<?php
			$totalAkhir=0;
				$sql2 = mysql_query("select * from final group by suplier order by id asc")or die (mysql_error());				
				while ($r2=mysql_fetch_array($sql2)) {
					$chemical[]=$r2['suplier'];
					$chemical2[]=$r2['beban'];
					$totalAkhir=$totalAkhir+$r2['beban'];
				}
			
				$count_chem=count($chemical);
				$no=1;
				for ($i=0; $i <= $count_chem; $i++) { 


						for ($j=$i+1; $j < $count_chem; $j++) { 
							
							 for ($k=$j+1; $k < $count_chem; $k++) { 							
							 if($no%2==1) { $klas='odd'; } else { $klas='even'; }	
								$bnyABC=$chemical2[$i]+$chemical2[$j]+$chemical2[$k];
								$supporAkhir=($bnyABC/$totalAkhir)*100;
								$confAkhir=($chemical2[$k]/$bnyABC)*100;
							?>
									
									<tr class="<?php echo $klas;?>">
									<td><?php echo $no;?>.</td>
									<td>Jika Membeli <?php echo $chemical[$i];?> dan <?php echo $chemical[$j];?> maka akan membeli <?php echo $chemical[$k];?></td>
									<td ><?php echo number_format($supporAkhir,2); ?></td>	        
									<td ><?php echo number_format($confAkhir,2) ?> %</td>	 
									</tr>
								<?php
								$no++;
							 }
						}
				}
				mysql_query("delete from final");
						
			?>

			
</table>
</div>



			<?php } else { ?>  
   <form name="form" action="?aksi=lihat" method="post" onsubmit="return cek_kosong();">	
			 <h2>Analisa Data Mining</h2> 			                 
				<div class="form_row"style="margin-top:10px;">
				<label>Bulan</label>
					<select class="form_select" name="bulan">
					<option value="1">Pilih Bulan</option>									
					<option value="01">Januari</option>									
					<option value="02">Februari</option>									
					<option value="03">Maret</option>									
					<option value="04">April</option>									
					<option value="05">Mei</option>									
					<option value="06">Juni</option>									
					<option value="07">Juli</option>									
					<option value="08">Agustus</option>									
					<option value="09">September</option>									
					<option value="10">Oktober</option>									
					<option value="11">November</option>									
					<option value="12">Desember</option>									
					</select>
					</div> 	
				<div class="form_row"style="margin-top:10px;">
				<label>Tahun</label>
					<select class="form_select" name="tahun">
					<option value="1">Pilih Tahun</option>	
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>											
					</select>
					</div> 			
				<div class="form_row">
								<input type="submit" class="form_submit" name="tblihat" value="Ambil Data" />
				</div> 
				<div class="clear"></div>
</form>		
				
<table id="rounded-corner">
    <thead>
    	<tr>
						<th width="50">No</th>								
                           <th >Pembelian</th> 
                           <th>Kemunculan</th> 
                           <th colspan="2">Nilai Suport</th> 
						</tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="12"></td>
        </tr>
    </tfoot>
    <tbody>
<?php 
    $var1	= trim($_POST['bulan']);
$var2	= trim($_POST['tahun']);
$thispage = $PHP_SELF ;
	$query = mysql_query("SELECT sum(pembelian) as total from pembelian where  
							   bulan='$var1' and tahun='$var2' ");
    $num = mysql_num_rows($query); // number of items in list
    $per_page = 10; // Number of items to show per page
	$start = $_GET['start'];
    if(empty($start))$start=0;  // Current start position

    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

$sql = mysql_query("SELECT sum(pembelian) as total from pembelian where  
							   bulan='$var1' and tahun='$var2' LIMIT $start,$per_page"); 

$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas='odd'; } else { $klas='even'; }	
	?>							
			<tr class="<?php echo $klas;?>">
			<td><?php echo $i;?>.</td>
			<td><?php echo $row['kode_beli']; ?></td>
			<td><?php echo $row['nama_suplier']; ?></td>
			<td><?php echo $row['bulan']; ?></td>
			<td><?php echo $row['tahun']; ?></td>
			<td align='right'><?php echo $row['pembelian']; ?></td>			
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