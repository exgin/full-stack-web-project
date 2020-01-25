<?php
	header("refresh: 10");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>WP DB Stats</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style>
			iframe{
				width: 70em ;
				height: 1000px;
				border: inset 3px lightgray;
			}
		</style>		
	
	</head>
	<body>
		<hr />
		<div class="heading">
			<!-- this anchor used and image hyperlink to link to the homepage -->
			<a class="logo"	href="index.php"><img src="images/logo.png" alt="Company logo" height="100" width="auto"></a><br><br>
			<h2 class="h2" >					
				Welcome to the Wedgewood Pacific Corporation Forms Page
			</h2>				
		</div>	 
		<hr />
		<div	class="menubox"> 
			<p class="menutitle">WPC Menu</p><br>
			<a href="wpcHome.php" 	class="menu">WPC HOME</a><br>
			<div class="dropdown">
				<button href="forms.php" class="dropbtn">Forms					
				</button>
				<div class="dropdown-content">
					<!-- Place the html file name of your forms page in the [ href ] element 
						below and delete the hash symbol place holder.  Also, add a descriptive 
						name of your document that will be displayed on the dropdown menu. -->
					<a class="a" href="form_Upd_Emp_Proj.php" class="menu">Project Assignment Form</a>
					<a class="a" href="#" class="menu">Form 2</a>
					<a class="a" href="#" class="menu">Form 3</a>
				</div>
			</div>
			<div class="dropdown">
				<button href="reports.php" class="dropbtn">Reports					
				</button>
				<div class="dropdown-content">
					<!-- Place the html file name of your forms page in the [ href ] element 
						below and delete the hash symbol place holder.   Also, add a descriptive 
						name of your document that will be displayed on the dropdown menu. -->
					<a class="a" href="#" class="menu">Report 1</a>
					<a class="a" href="#" class="menu">Report 2</a>
					<a class="a" href="#" class="menu">Report 3</a>
				</div>
			</div>
			
		</div>
		<div 	class="content">    
		
				<iframe src="access.log" title="Access Logs" id="frame" >  </iframe>                  
				<iframe src="includes/db-info.php" title="Database Stats" class="iframe"> </iframe>
			
			
		</div>
	
	</body>
</html>