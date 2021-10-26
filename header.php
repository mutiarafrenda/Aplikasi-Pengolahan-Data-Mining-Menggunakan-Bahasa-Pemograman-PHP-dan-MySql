<?php include "./config/koneksi.php"; 
include"./config/librari.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!-- jQuery file -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var $ = jQuery.noConflict();
$(function() {
$('#tabsmenu').tabify();
$(".toggle_container").hide(); 
$(".trigger").click(function(){
	$(this).toggleClass("active").next().slideToggle("slow");
	return false;
});
});
</script>
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="js/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : 'yy-mm-dd',        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>
	 <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal1").datepicker({
					dateFormat  : 'yy-mm-dd',        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>
	 <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal2").datepicker({
					dateFormat  : 'yy-mm-dd',        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>

</head>
<body>
<div id="panelwrap">
<div id="header">
	<div class="shell" style="background:none;">
		<!-- Logo + Top Nav -->
		<div id="top">
				<a href="#"></a>
			
			
		</div>
	</div>
	<div class="cl">&nbsp;</div>
	
	<div class="shell">	
	<div class="menu">
			<ul>
			   
			</ul>
		</div>
	</div>
	<div class="shell">	
		 <div class="submenu">
				<ul>
					
				</ul>
		</div> 
	</div>
</div>
<!-- End Header -->
	<div class="cl">&nbsp;</div>
	
	
        
                    
    <div class="center_content">   
    <div id="right_wrap">
    <div id="right_content">            
