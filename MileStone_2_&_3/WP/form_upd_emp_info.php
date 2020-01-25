<!-- @author Enoch-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wedgewood Pacific Corporation Demonstration Pages</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style>
			.content{
				height: auto;
				width: 100%;
			}
		</style>
	</head>
	<body>
	<div class="body">			
			<div class="heading">			
				<!-- this anchor used and image hyperlink to link to the homepage -->
				<h1><a class="logo"	href="index.php"><img src="images/logo.png" alt="Company logo" height="100" width="auto"></a><br><br>
				<h2 class="h2" >					
					Welcome to the Wedgewood Pacific Corporation
				</h2></h1>
			</div>
			<div class="container-menu">
				<div	class="menubox"> 
					<p class="menutitle">WPC Menu</p><br>
					<a href="index.php" 	class="menu">WPC HOME</a><br>
					<div class="dropdown">
							<a href="forms.php" class="menu"><button class="dropbtn">Forms</button></a>
							<div class="dropdown-content">
								<!-- Place the html file name of your forms page in the [ href ] element 
									below and delete the hash symbol place holder.  Also, add a descriptive 
									name of your document that will be displayed on the dropdown menu. -->
								<a class="a" href="form_upd_emp_proj.php" class="menu">Project Assignment Form</a>
								<a class="a" href="form_Upd_dep.php" class="menu">Project Department Form</a>
								<a class="a" href="form_select_&_project_assign.php" class="menu">Selection and Projection</a>
								<a class="a" href="form_upd_emp_info.php" class="menu">Update Employee Information</a>
							</div>
						</div>
						<div class="dropdown">
							<a href="reports.php" class="menu"><button class="dropbtn">Reports</button></a>
							
							<div class="dropdown-content">
								<!-- Place the html file name of your forms page in the [ href ] element 
									below and delete the hash symbol place holder.   Also, add a descriptive 
									name of your document that will be displayed on the dropdown menu. -->
								<a class="a" href="employees.php" class="menu">Employee Table</a>
								<a class="a" href="projects.php" class="menu">Project Table</a>
								<a class="a" href="departments.php" class="menu">Department Table</a>
								<a class="a" href="assignments.php" class="menu">Assignment Table</a>		
								<a class="a" href="report-test-department.php" class="menu">Budget Code Report</a>
								<a class="a" href="#" class="menu">Enoch</a>
								<a class="a" href="report_assign.php" class="menu">Hours Worked By Project Report</a>
								<a class="a" href="emp_proj_report.php" class="menu">Employee Project Report</a>
							</div>
						</div> <!-- End Of dropdown class -->
				</div>	<!-- End Of menubox class -->
			</div>	<!-- End Of container-menu -->
			<div 	class="container">
				<div 	class="content">

            <h2> Form to add a new/update employee information
			</h2>
            
			<!-- Begin Of Form -->
            <form action="form_upd_emp_info.php" method="POST">
                <!-- First Name -->
                <label for="fname"> First Name    
                <input type="text" id="fname" name="firstname"></label><br><br>
                
			 <!-- last Name -->
                <label for="lname"> Last Name
                <input type="text" id="lname" name="lastname"></label><br><br>
                
            <!-- email -->
                <label for="email"> E-mail
                <input type="text"id="E-mail"name="E-mail"></label><br><br>
                
			<!--officephone-->
                <label for="Phone">Officephone
                <input type="text" id="office Phone" name=" office phone"></label><br><br>

             <!--position-->
				<lable for ="position"> Position
               <input type="text" id="position" name="position"></lable><br><br>
                
             <!--supervisor-->
			   <label for="Supervisor"> Supervisor
			   <input type="text" id="Supervisor" name="Supervisor"></label><br><br>

			 <!--department-->
			   <label for="department"> Department
			   <input type="text" id="department" name="department"></label><br><br>

               <!--employee number-->
			   <label for="employee number"> Employee number
			   <input type="text" id="employee number" name="employee number"></label><br><br>
            
                <input type="submit" value="submit"><br>
               
             </form>
                
                <?php
                    echo '<pre>' . print_r($_POST, true) . '</pre>';
                ?>
					
					</div> <!-- End of content class -->
			</div> <!-- End of container class -->
		</div> <!-- End of body class -->	
			<!-- use the footer area to add webpage footer content -->
			<footer>
			<div id="copyright"> 
				<p>	&copy; Copyright 2019.  All Rights Reserved.<br><br>
				Wedgewood Pacific Corporation (WPC)<br/><br/>	
					<a href="index.php" style="color: #000000">www.wp.com</a><br><br> &nbsp; &nbsp; 
					Call us today at: &nbsp;						
					<a  href="#" style="color: #000000">(800) 650-9214</a><br>
					<br>Email us at: &nbsp;
					<a href="#" style="color: #000000"> info@wp.com</a>
				</p>  
			</div>		
			<div id="social">
				<p>Connect with us:</p>
				<!-- This code renders facebook logo badge to my facebook page. -->		
				<p><a href="#">
					<img src="/images/f-ogo_RGB_HEX-58.png" alt="Facebook logo" style="border:0;width:64px;height:auto;"></a>					
					<!-- This code renders google plus badge to my google plus account. -->
					<a href="#" rel="publisher" target="_top" style="text-decoration:none;">
					<img src="//ssl.gstatic.com/images/icons/gplus-64.png" alt="Google+" style="border:0;width:64px;height:auto;"/></a>
				</p>
			</div>
		</footer>
	</body>
<