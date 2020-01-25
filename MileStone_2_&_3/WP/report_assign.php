<?php
include 'includes/inc_config.php';
include 'includes/inc_functions.php';
/**
 * @author Anthony
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title>Wedgewood Pacific Corporation Demonstration Pages</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- This is the code to style the form section of this webpage -->
    <style>
       
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
        <h5 style="text-align: center; color: red">
            
        Hours Worked By Project Report
        </h5>


        <h2>Data</h2>
        <?php
        // Rather than follow the Reinforcement Exercise 8.1 exactly,
        // This code assumes the guestbook schema and visitors table
        // have been created using MySQL Workbench.

        $empErr = "";
        $EmployeeNumber = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $empErr = "";
            $EmployeeNumber = "";

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        }

        $TableName = "ASSIGNMENT";

        if (empty($_POST["EmployeeNumber"])) {        // Test $empnum	
            $empErr = "Employee Number is required!";
        } else if (!preg_match("/^[1-9][0-9]?$|^20$[:]^[\\w ]+$/", $_POST["EmployeeNumber"])) {
            $empErr = "Invalid Input!";
        } else {
            $EmployeeNumber = test_input($_POST["EmployeeNumber"]);
        }
        $TableName = "ASSIGNMENT";
        $SQLstring = "SELECT ProjectID, EmployeeNumber, HoursWorked  
                    FROM  $TableName  
                    WHERE (EmployeeNumber='$EmployeeNumber')";
        $QueryResult = $conn->query($SQLstring);



        // If you want to display the results one by one

        //Creating a table for our department table
        echo "<p>If info entered does not match database there will be no information found.</p>";
        echo "<table border = '3'>";
        echo "<tr>
				<td>ProjectID</td>
				<td>EmpolyeeNumber</td>
				<td>HoursWorked</td>
			<tr>";
        //Printing out each row in the query
        while ($row = mysqli_fetch_assoc($QueryResult)) {
            echo "<tr>
					<td>{$row['ProjectID']}</td>
					<td>{$row['EmployeeNumber']}</td>
					<td>{$row['HoursWorked']}</td>
				<tr>";
        }

		?> 
		<form method="POST">
            <p>Which employee would you like a report on? (Enter Valid Employee Number) <input type="text" name="EmployeeNumber" /><span>
                <?php echo $empErr; ?></span></p>
            <p><input type="submit" value="Submit" /></p>
        </form>
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