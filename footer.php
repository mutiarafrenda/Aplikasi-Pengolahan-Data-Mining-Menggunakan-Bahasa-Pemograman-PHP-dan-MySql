	
 <div class="sidebar" id="sidebar">
    <h2>MENU</h2>
    
        <ul>
         
         	<li><a href="admin_home.php" <?php if($menu=="home") echo 'class="selected"'; ?>><span>Profil Perusahaan</span></a></li>
         	<li><a href="admin_barang.php" <?php if($menu=="") echo 'class="selected"'; ?>><span>Manajemen Data Barang</span></a></li>
         	<li><a href="admin_cluster.php" <?php if($menu=="") echo 'class="selected"'; ?>><span>Cluster</span></a></li>
         	<li><a href="admin_cluster_baru.php" <?php if($menu=="") echo 'class="selected"'; ?>><span>Cluster Baru</span></a></li>
         	<li><a href="admin_hasil.php" <?php if($menu=="") echo 'class="selected"'; ?>><span>Hasil Clustering</span></a></li>
			<li><a href="admin_export.php" <?php if($menu=="analisa") echo 'class="selected"'; ?>><span>Eksport Data</span></a></li>
			<li><a href="grafik.php" target="_blank"><span>Diagram C1</span></a></li>
            <li><a href="grafikc2.php" target="_blank"><span>Diagram C2</span></a></li>
            <li><a href="grafikc3.php" target="_blank"><span>Diagram C3</span></a></li>
			<li><a href="print_laporanbarang.php" <?php if($menu=="analisa") echo 'class="selected"'; ?> target="_new"><span>Laporan Data</span></a></li>
			<li><a href="admin_setting.php" <?php if($menu=="analisa") echo 'class="selected"'; ?>><span>Pengaturan Akun</span></a></li>
			<li> <a href="logout.php" onClick="return confirm('Apakah anda ingin Logout ?')" ><span>Logout</span></a></li>
					
</ul> 
    </div>             
    
    
    <div class="cl">&nbsp;</div>
    </div>    
    <div class="footer">
<?php echo $sitename; ?><a href="#" target="_blank">@2018</a>
</div>

</div>

    	
</body>
</html>