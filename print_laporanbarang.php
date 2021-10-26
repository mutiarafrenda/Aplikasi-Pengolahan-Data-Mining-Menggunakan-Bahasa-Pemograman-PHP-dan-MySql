<?php 
session_start();
if (ISSET($_SESSION['username'])) {
include "config/koneksi.php";	
include "config/library.php";	


//SESSION OK
?>		

<body   onLoad="javascript:window.print()" style="margin:10px auto; width:900px;">
			     <div style="width:900px; margin:0 auto; border:1px solid #ccc; padding:10px; text-align:center" >
                    		<img src="images/logo laporan.png" width="100%">
				<p style="text-align:center; margin-top:-10px; padding-top:10px; font-size:18px;">LAPORAN DATA BARANG</p>
				<p style="text-align:center; margin-top:-10px; padding-top:10px; font-size:18px;">Tanggal :<?php echo $tgl_sekarang; ?></p>
				
			       
						<table style="border:1px solid #000;" width=100%>
						<tr>
							<th  style="border-right:1px solid #000;">No.</th>
							<th style="border-right:1px solid #000;">Data Barang</th>
							<th style="border-right:1px solid #000;">Nama Barang</th>
							<th style="border-right:1px solid #000;">Nilai C1</th>
							<th style="border-right:1px solid #000;">Nilai C2</th>
                            <th style="border-right:1px solid #000;">Nilai C3</th>
                             <th style="border-right:1px solid #000;">Keterangan</th>
									
						</tr>
						 <?php 
							$sql1 = mysql_query("SELECT  * from cluster order by id_cluster  "); 
							$total=0;
							$i=1;
							while ($row1=mysql_fetch_array($sql1))
							{ 
                             
							 
							?>
							<tr>
							<tr style="border-top:1px solid #000;">
							<td  style="border-right:1px solid #000; border-top:1px solid #000;"><?php echo $i;?>.</td>							
							<td  style="border-right:1px solid #000; border-top:1px solid #000;" align="center"><?php echo $row1['data_barang'];?></td>	
							<td  style="border-right:1px solid #000; border-top:1px solid #000;"><?php echo $row1['nama_barang'];?></td>							
							<td  style=" border-top:1px solid #000;" ><?php echo $row1['nilai_c1'];?></td>>							
							<td  style=" border-top:1px solid #000;" ><?php echo $row1['nilai_c2'];?></td>						
							<td  style=" border-top:1px solid #000;" ><?php echo $row1['nilai_c3'];?></td>	
                            <td  style=" border-top:1px solid #000;" ><?php echo $row1['keterangan'];?></td>	
							</tr>
							<?php $i++;}?>
							
							
					</table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:20px;">
							<td style="padding-left:600px; padding-bottom:10px;margin-top:20px;">Lubuk Begalung, <?php echo $tgl_sekarang;?></td>
                            <tr><td style="padding-left:600px; padding-bottom:50px;">Ttd</td></tr>
							<tr><td style="padding-left:600px;">Pimpinan</td></tr>
							<tr><td></td></tr>                            
                        </table>
                        </body>
<?php }?>