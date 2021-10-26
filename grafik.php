<html>
	<head>
	<script src="js1/jquery.min.js" type="text/javascript"></script>
    <script src="js1/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
	
	var chart1;
	$(document).ready(function() {
		chart1 = new Highcharts.Chart({
			chart: {
            	renderTo: 'container',
	            type: 'column'
    	    },   
        	title: {
            	text: 'Grafik Hasil Clustering C1'
	        },
    	    xAxis: {
        	    categories: ['Nama Barang']
	        },
    	    yAxis: {
        	    title: {
            	text: 'Nilai'
            }
        },
		series:             
            
			[
				<?php 
				include "config/koneksi.php";	//memanggil koneksi
				$sql = mysql_query("SELECT * FROM cluster where keterangan='C1'") or die (mysql_error());
				while ($data = mysql_fetch_array($sql)) {
					$nama = $data['nama_barang'];
					$jumlah = $data['nilai_c1'];
					
				?>
					{
						name: '<?php echo $nama; ?>',
						data: [<?php echo $jumlah; ?>]
					},
				<?php 
				} 
				?>
            ]
		});
	});	
</script>

	</head>
	<body>
		<div id='container'></div>		
	</body>
</html>
