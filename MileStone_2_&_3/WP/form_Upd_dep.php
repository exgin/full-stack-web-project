<?php
	include 'includes/inc_config.php';
	/**
	 * @author Samuel
	 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Wedgewood Pacific Corporation Demonstration Pages</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- This is the code to style the form section of this webpage -->
        <style>
			.form-box{
				padding-left: 100px;
			}
			.form-content{
				background-color: white;			
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
			<h2 style="text-align: center; color: blue">
				Create or Update Department Information
			</h2>

			<?php
			// define variables and set to empty values
			$deptnameErr = $deptphoneErr = $budcodeErr = $officenumErr = "";
			$deptname = $deptphone = $budcode = $officenum = "";
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}

			  if (empty($_POST["deptname"])) {
				$deptnameErr = "**A department name is required**";
			  } else {
				$deptname = test_input($_POST["deptname"]);
				if (!preg_match("/^[a-zA-Z ]*$/", $deptname)){
					$deptnameErr = "Please only enter letters & white space.";
				}
			  }
			
			  if (empty($_POST["budcode"])) {
				$budcodeErr = "**A budget code is required**";
			  } else {
				$budcode = test_input($_POST["budcode"]);
				if (!preg_match("/^[BC]+-[0-9][0-9][0-9]+-[0-9][0-9]*$/", $budcode)){
					$budcodeErr = "Please follow the correct format 'BC-000-00'";
				}
			  }

			  if (empty($_POST["officenum"])){
				  $officenumErr = "**A office number is required**";
			  }	else { 
				  $officenum = test_input($_POST["officenum"]);
				  if (!preg_match("/^[BLDG0-9]+-[0-9][0-9][0-9]*$/", $officenum)){
					  $officenumErr = "Please follow the corect format 'BLDG00-000'";
				  }
			  }

			  if (empty($_POST["deptphone"])){
				$deptphoneErr = "**A department number is required**";
			}	else { 
				$deptphone = test_input($_POST["deptphone"]);
				if(!preg_match("/^[1-9][0-9]{0,10}$/", $deptphone)){
					$deptphoneErr = "Please enter only (9) numbers, not extention needed.";
				}
			}
			
			}
			?>
				<form class="form-box" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					Department Name: <input class="form-content" type="text" name="deptname">
					<span class="error"> <?php echo $deptnameErr;?></span>
					<br><br>
					Department Phone #:
					<input type="text" name="deptphone">
					<span class="error"> <?php echo $deptphoneErr;?></span>
					<br><br>
					Budget Code 'BC-000-00':
					<input type="text" name="budcode">
					<span class="error"><?php echo $budcodeErr;?></span>
					<br><br>
					Office Number 'BLDG00-000': 
					<input type="text" name="officenum"> 
					<span class="error"> <?php echo $officenumErr; ?></span>
					<br><br>
					<input type="submit" name="submit" value="Submit">
				</form>
				<?php
					echo "<h5>User Input</h5>";
					echo $deptname;
					echo "<br>";
					echo $deptphone;
					echo "<br>";
					echo $budcode;
					echo "<br>";
					echo $officenum;
//Connecting to DB & Printing Results

					
//					$connect = mysqli_connect("localhost", "root", "", "wp") or die ("Couldn't connect.");
					$sql = "select * from DEPARTMENT;";
					if(($result = $conn->query($sql)) == 0){
						die ("Bad Query: $sql");
					}



//Creating a table for our department table
					echo "<h2>Department Table</h2>";
					echo"<table border = '2'>";
					echo"<tr>
						<td>DepartmentName</td>
						<td>BudgetCode</td>
						<td>OfficeNumber</td>
						<td>DepartmentPhone</td>
						<tr>";
//Printing out each row in the query
					while($row = mysqli_fetch_assoc($result)){
						echo"<tr>
							<td>{$row['DepartmentName']}</td>
							<td>{$row['BudgetCode']}</td>
							<td>{$row['OfficeNumber']}</td>
							<td>{$row['DepartmentPhone']}</td>
							<tr>";
					}
					echo "</table>";
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