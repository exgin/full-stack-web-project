<?php
/**
 * @author Dellius Alexander
 */
 	
	include 'includes/inc_config.php';
	include 'includes/inc_functions.php';
	include 'process_form_input.php';

	 
?>
<!--   Beginning of webpage   -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wedgewood Pacific Corporation Demonstration Pages</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- This is the code to style the form section of this webpage -->
		
        <style>
		/* styles search and update form-box */ 
		
		.content{
			display: grid;
			grid-template-areas:
				'left left left right right right'
				'left left left right right right'
				'left left left right right right'
				'left left left right right right'
				'left left left right right right'
				'left left left right right right';
			grid-gap: 50px;
			max-width:100%;	
			height: auto;
			margin: auto;
			padding-top: 5px;
			padding-bottom: 5px;
            background-image: url("images/shiney2.jpg");
		}
		.form-container{
			grid-area: left;
			width: 600px;
			max-width: 100%;
		}
		.result-container{
		grid-area: right;
		position: sticky;
		width: 1000px;
		max-width: 100%;
		display: flex;
		flex-direction: column;
		height: auto;
		justify-content: stretch;
		align-items: left;
		}
        .form-box{
			width: 100%;
			height: auto;
			font-size: 1.25em;
			background-image: url("images/shiney2.jpg");
		}
		.form-field{			
			display: grid;
			grid-gap: 2px;
			height: auto;
			background-color: #2196F3;
			padding: 5px;
			background-image: url("images/shiney2.jpg");
		}
		.label{
			grid-column: 1 / span 1;
			grid-row: 1;
			background-image: url("images/shiney2.jpg");
			max-width: 100%;
			padding-left: 5px;
		} 
		.form-content{
			grid-column: 3 / span 2;
			grid-row: 1;
			background-color: white;
			text-align: center;	
			height:  auto;	
			width: 100%;		
        }
		.error{
			grid-column: 1 / span 3;
			grid-row: 3;
			color: red;
			text-align: left;
			background-image: url("images/shiney2.jpg");
			max-width: 100%;
			font-size: 1.15em;
			top:10px;
			padding-left: 10px;
		}
	
		.dropdown-label{
			margin: 10px;
			font-size: 1em;
		}
		.form-button{
			font-size: 1.0em;
		}		
		.output-value{
			font-size: 1.2em;
		}
		.results-header{
			height:auto;
			width: 100%;
			font-size:1.2em;
			text-align: center;
		}
		table{
			max-width: 100%;
			height: auto;
		}
		.table-header{
                font-size: 1em;
                width: auto;
                font-weight: bold;
                text-align: left;
				padding-left:10px;
				padding-right:10px;
                color: black;
				border: 2px ridge gray;
				margin-left: 20px;
				margin-right: 20px;
            }
            .table-field{
                font-size: 1em;
                font-weight: bold;
                width: 100%;                
                text-align: left;
                border-left: 2px ridge black;
                border-right: 2px ridge black;
                border-bottom: 2px ridge black;
				background: lightblue;
            }
		.iframe-results{
			height: auto;
			width: 100%;
			zoom: .80;
		}
		.form-search{
			position: relative;
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
				<div class="form-container">
					<h2 >
							Update Project Assignment Form
					</h2>
					<!-- Form box -->
					<form class="form-box" method="post" action="form_upd_emp_proj.php">	
						<!-- Employee Number -->
						<hr/>
						<hr/>
						<h5 class="form-field-dropdown"><div class="dropdown-label"> Employee Number</div>	
							<?php	
								echo get_col_dropdown($conn,"EmployeeNumber","EMPLOYEE");
							?>
						</h5>
							<!-- <span class="error"><//?php echo $empErr;?></span> -->
							<!-- First Name -->
						<hr/>
						<hr/>
						<h5 class="form-field"> <div class="grid-item label"> First Name</div>
							<input class="grid-item form-content" type="text" name="FirstName" 
							value="<?php echo isset($fname) ? $fname : "" ;?>" 
							placeholder="First Name">	
							<p class="grid-item error"> <?php echo $fnameErr;?></p>
						</h5>
						<!--- Last Name -->
						<hr/>
						<hr/>
						<h5 class="grid-item form-field"> <div class="grid-item label">Last Name</div> 
							<input class="grid-item form-content" type="text" name='LastName' value="<?php echo isset($lname) ? $lname : "" ;?>" placeholder='Last Name'>
							<p class="grid-item error"> <?php echo $lnameErr;?></p>	
						</h5>
						<!--- Department -->
						<hr/>
						<hr/>
						<h5 class="form-field-dropdown"> <div class="dropdown-label">Department</div> 
							<?php	
								echo get_col_dropdown($conn,"DepartmentName","DEPARTMENT");
							?>				
								<!-- <span class="error"> <//?php echo $deptErr;?></span> -->				
						</h5>	
						<!-- Office Phone -->
						<hr/>
						<hr/>
						<h5 class="form-field"> <div class="grid-item label">Office Phone</div> 
							<input class="grid-item form-content" type="text" name='OfficePhone' value="<?php echo isset($phone) ? $phone : "" ;?>" placeholder="678-456-7891">
							<p class="grid-item error"> <?php echo $phoneErr;?></p>
						</h5>
						<!-- Project ID -->
						<hr/>
						<hr/>
						<h5 class="form-field-dropdown"> <div class="dropdown-label">Select Current Project Assignment</div> 								
						<select class="form-content" name="ProjectID">
							<option class="dropdown" name="ProjectID" value="1000">2017 Q3 Production Plan</option>
							<option class="dropdown" name="ProjectID" value="1100">2017 Q3 Marketing Plan</option>
							<option class="dropdown" name="ProjectID" value="1200">2017 Q3 Portfolio Analysis</option>
							<option class="dropdown" name="ProjectID" value="1300">2017 Q3 Tax Preparation</option>
							<option class="dropdown" name="ProjectID" value="1400">2017 Q4 Production Plan</option>
							<option class="dropdown" name="ProjectID" value="1500">2017 Q4 Marketing Plan</option>
							<option class="dropdown" name="ProjectID" value="1600">2017 Q4 Portfolio Analysis</option>
						</select>
								<p class="error"> <?php echo $dupEntryErr; echo "<br/>"; echo $crntProjErr;?></p>
						</h5> 
						<!-- Position -->
						<hr/>
						<hr/>
						<h5 class="form-field"> <div class="grid-item  label">Position</div>
								
							<input class="grid-item form-content" type="text" name='Position' value="<?php echo isset($position) ? $position : "" ;?>" placeholder='e.g. CEO'>
							<p class="grid-item error"> <?php echo $positionErr;?></p>
						</h5>
						<!-- Project Name -->
						<hr/>
						<hr/>
						<h5 class="form-field-dropdown"> <div class="dropdown-label">Select New Project Assignment</div> 
							<select class="form-content" name="ProjectName">
								<option class="dropdown" name="ProjectName" value="2017 Q3 Production Plan">2017 Q3 Production Plan</option>
								<option class="dropdown" name="ProjectName" value="2017 Q3 Marketing Plan">2017 Q3 Marketing Plan</option>
								<option class="dropdown" name="ProjectName" value="2017 Q3 Portfolio Analysis">2017 Q3 Portfolio Analysis</option>
								<option class="dropdown" name="ProjectName" value="2017 Q3 Tax Preparation">2017 Q3 Tax Preparation</option>
								<option class="dropdown" name="ProjectName" value="2017 Q4 Production Plan">2017 Q4 Production Plan</option>
								<option class="dropdown" name="ProjectName" value="2017 Q4 Marketing Plan">2017 Q4 Marketing Plan</option>
								<option class="dropdown" name="ProjectName" value="2017 Q4 Portfolio Analysis">2017 Q4 Portfolio Analysis</option>
							</select>
						<!-- <//?php echo get_col_dropdown($conn,"ProjectName","PROJECT");?> -->		
							<p class="error"> <?php echo $dupEntryErr; echo "<br/>"; echo $projAssignErr; ?></p>					
						</h5>
						<hr/>
						<hr/>
						<p class="form-field"><input class="form-button" onclick="<?php resetFunction();?>" type="submit"  name='reset' value="Reset">
						<input class="form-button" type="submit" name="update" value="Update"></p>
					</form>  <!-- End of Form -->
				</div>					
				<div class="result-container">
					<hr />	
						<!-- Search box Begin -->
					<div class="form-search">
						<?php echo "<hr />"; include 'form_search.php'; echo "<hr />";?> 
						<!-- <p class="error"> <//?php global $searchErr; echo $searchErr; ?></p> -->
					</div>		
					<!-- Search box End -->						
					<h3 class="results-header" >Results:<hr /></h3>
					<div class="iframe-results">
						<?php
							if(isset($_POST["submit-search"]) && $errorCounter == 0)
							{
								include 'search_results.php';
							}
							else if(isset($_POST["update"]) && $passCounter == 8)
							{	
								include 'form_results.php';								
							}
						?>
					</div>								
				</div> <!-- End of result-container -->		
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