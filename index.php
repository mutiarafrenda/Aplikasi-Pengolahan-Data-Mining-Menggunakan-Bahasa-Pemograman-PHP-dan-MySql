<?php include "./config/koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel Admin</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="login">
<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head" align="center">
						<h2>LOGIN ADMIN</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="login.php" method="post">
						
						
						<div class="form">
								<p>
									<label>USERNAME</label>
									<input type="text" class="field ukuran" name="username" maxlength="20" />
								</p>										
								<p>
									<label>PASSWORD</label>
									<input type="password" class="field ukuran" name="password" maxlength="20" />
								</p>
								
								
								
								
								
								
							
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="LOGIN" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->	
</div>				
</body>
</html>