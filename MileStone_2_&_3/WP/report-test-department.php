<?php
	include 'includes/inc_config.php';  
	/**
	 * @author Samuel
	 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>PHP Code Blocks</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
        
            h2{
                text-align: center;
            }
			.table-data{
				text-align: left;
			}	
				/*-- style for footer element container --*/
				footer	{
				position: absolute;
				right: 0;
				left: 0;
				bottom: 0;
				top: 500px;
				font-size: 1em;
				color: black;
				text-align: center;
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
					<h1>Report of WPC's Department Budget</h1>
					<p>
					Below is a report of the WPC Department table. With the information provided, investors &
					company managers have this data at their expoure to efficiently communicate with each department
					according to their budget.
					</p>
					<p>
					Generally speaking, budget codes are a way to keep track of these accounts for
					the organization, WPC. These contains any sort of company related transcations & costs. Along with the BudgetCode,
					the name of the department corresponding to the budget code is listed next to it for clearer understanding for end
					users. The case is the same with the specific deparment's phone # being displayed. Hypothetically, if there was
					an ongoing business meeting, the board directors have the ease of calling the deparment's phone on the spot.
					</p>
							
							<?php
							echo "<form>";	
								$sql = "SELECT BudgetCode, DepartmentName, DepartmentPhone FROM DEPARTMENT;";
								$result = mysqli_query($conn, $sql) or die ("Bad Query: $sql");

			//Creating a table for our department table

								echo"<table border='5'>";
								echo"<tr>
									<th class='table-header'><strong>BudgetCode</strong></td>
									<th class='table-header'><strong>DepartmentName</strong></td>
									<th class='table-header'><strong>DepartmentPhone</strong></td>
									<tr>";
			//Printing out each row in the query
								while($row = mysqli_fetch_assoc($result)){
									echo"<tr>
										<td class ='table-data'>".$row['BudgetCode']."</td>
										<td class ='table-data'>".$row['DepartmentName']."</td>
										<td class ='table-data'>".$row['DepartmentPhone']."</td>
										<tr>";
								}
								echo "</form>";
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
</html>