<table border="1">

	<?php
	//koneksi ke database
	mysql_connect("localhost", "root", "");
	mysql_select_db("dbclustering");
	
	//query menampilkan data
	$sql = mysql_query("SELECT * from barang order by id_barang asc");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['data_barang'].'</td>
			<td>'.$data['tanggal'].'</td>
			<td>'.$data['nama_barang'].'</td>
			<td>'.$data['stock'].'</td>
			<td>'.$data['penjualan'].'</td>
			<td>'.$data['satuan'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>