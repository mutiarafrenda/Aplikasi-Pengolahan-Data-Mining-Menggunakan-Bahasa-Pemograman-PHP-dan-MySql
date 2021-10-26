<?php 
session_start();
if (ISSET($_SESSION['username'])) {
include "header.php";  

?>		
		<div style="border:50px solid #FFF; padding:30px; font-family:'comic sans ms' font-size:20px">
		
				<p><br><br><br><strong>PT Cahaya Fitriendika berdiri pada tahun 2013 bertempat di jalan Aru nomor 8 Lubuk Begalung Padang. PT Cahaya Firiendika ini bergerak di bidang perdagangan bahan bangunan dan pengadaan besi stainless steel. Pada tahun tersebut Syarifudin sebagai direktur menanamkan modal awal sebesar Rp 1.000.000.000,00 dengan pemegang saham yaitu Syarifudin, Syahburdin, dan Yarniati. Usaha yang dijalani oleh Bapak Syarifudin ini semakin berkembang, sehingga Bapak Syarifudin terus berupaya agar usaha nya semakin besar dan dapat merenggut omset yang lebih besar pula, oleh karena itu PT Cahaya Fitriendika memiliki beberapa anak perusahaan salah satunya Batik Tanah Liek. Dalam usaha perdagangan dan pengadaan bahan bangunan seperti stainless steel, PT Cahaya Fitriendika bekerjasama dengan beberapa PT yang ada di indonesia diantaranya Medan, Surabaya, dan Jakarta.</strong></p></br></br></br>
		
		</div>
    
        
      
     
  
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
