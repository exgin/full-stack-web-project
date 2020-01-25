<?php
/** 
 * FORM VALIDATION PAGE
 * *****************************************************************************************************
 * @author Dellius Alexander
 * This page validates all form input as well as provides an algorithm to determine additional validation 
 * and integrity criterias, such as:
 *      - duplicate project assignments selected on the form
 *      - the employee is already assigned the new project selected
 *      - the current project selected is not currently assigned to employee at all, this triggers an 
 *        error because, in order to update a project assignment the employee must be assigned to the 
 *        current project selected
 */
////////////////////////////////////////////////////////////////////////////////////////////////////////
if(($_SERVER["REQUEST_METHOD"])== "POST" && isset($_POST["update"]))
{    
    // Input and Error variables are set to empty values
    $empErr = $fnameErr = $lnameErr =  $deptErr = $phoneErr = $projIdErr = $positionErr =  $projNameErr = "";
    $empnum = $lname = $fname = $dept = $phone = $current_proj_assmnt = $position = $projname  = "";
    $errorCounter = 0;
    $passCounter = 0;
    $totalCount = 0;
    $num_regex = "/^([0-9]+)$/";
    $name_regex = "/^[a-zA-Z'\s]+$/";
    $project_name_regex = "/^(\d*\D*\s*)$/";
    $phone_regex = "/^(\d){3}\D?(\d){3}\D?(\d){4}$/";
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
   
    if (empty($_POST["EmployeeNumber"])) 
    {		// Test $empnum	
        $empErr = "Employee Number is required!<br/>";
        $errorCounter++;
        $empnum="";
    } 
    else if (!preg_match($num_regex,$_POST["EmployeeNumber"]))
    {
        $empErr = "Only number and no white space allowed!<br/>";
        $errorCounter++;
        $empnum="";
    }
    else
    {
        $empnum = test_input($_POST["EmployeeNumber"]);
        $passCounter++;				
    }   
    // Test FirstName
    if (empty($_POST["FirstName"])) {
        $fnameErr = "First Name is required!<br/>";
        $errorCounter++;
    } 
    else if (!preg_match($name_regex, $_POST["FirstName"]))
    {
        $fnameErr = "Only letters and white space allowed!<br/>";
        $errorCounter++;
    }
    else
    {
        $fname = test_input($_POST["FirstName"]);
        $passCounter++;
    }
    // Test Last Name			
    if (empty($_POST["LastName"])) 
    {
        $lnameErr = "Last Name is required!<br/>";
        $errorCounter++;
    } 
    else if (!preg_match($name_regex, $_POST["LastName"]))
    {
        $lnameErr = "Only letters and white space allowed!<br/>";
        $errorCounter++;	
    }
    else
    {
        $lname = test_input($_POST["LastName"]);
        $passCounter++;
    }					   
    // Test Department
    if (empty($_POST["DepartmentName"])) 
    {
        $deptErr = "Department is required!<br/>";
        $errorCounter++;
    }
    else if (!preg_match($name_regex, $_POST["DepartmentName"]))
    {
        $deptErr = "Only letters and white space allowed!<br/>";	
        $errorCounter++;
    }
    else
    {
        $dept = test_input($_POST["DepartmentName"]);
        $passCounter++;
    }
    // Test Office phone
    if (empty($_POST["OfficePhone"]))
    {
        $phoneErr = "Office phone is required!<br/>";
        $errorCounter++;
    }
    else if (!preg_match($phone_regex, $_POST["OfficePhone"]))
    {
        $phoneErr = "Office Phone must be numbers only and may be separaged by hyphen or white space allowed!<br/>";
        $errorCounter++;
    }
    else
    {
        $phone = test_input($_POST["OfficePhone"]);
        $passCounter++;
    }
    
    
    // Test ProjectID
    if (empty($_POST["ProjectID"]))
    {
        $projIdErr = "Project ID is required!<br/>";
        $errorCounter++;
    }
    else if (!preg_match($num_regex, $_POST["ProjectID"]))
    {
        $projIdErr = "Must match pattern: [[0-9]] no white space allowed!<br/>";
        $errorCounter++;
    }
    else
    {
        $current_proj_assmnt = test_input($_POST["ProjectID"]);
        $passCounter++;
    }

    // Test Position
    if (empty($_POST["Position"])){
        $positionErr = "Position is required!<br/>";
        $errorCounter++;
    }
    else if (!preg_match($name_regex, $_POST["Position"]))
    {
        $positionErr = "Only letters and white space allowed!<br/>";
        $errorCounter++;
    }
    else
    {
        $position = test_input($_POST["Position"]);
        $passCounter++;
    }
    // Test ProjectName
    if (empty($_POST["ProjectName"]))
    {
        $projNameErr = "Project Name is required!<br/>";
        $errorCounter++;
    }
    else if (!preg_match($project_name_regex, $_POST["ProjectName"]) == 0)
    {
        $projNameErr = "Must match pattern: alpha and/or numeric characters, and white space allowed!<br/>";
        $errorCounter++;
    }
    else
    {
        $projname = test_input($_POST["ProjectName"]);
        $passCounter++;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////
    $project_currently_assigned_to_emp = get_field_value($conn, "SELECT ProjectName FROM PROJECT WHERE ProjectID='$current_proj_assmnt';");
    $new_proj_assmnt = get_field_value($conn, "SELECT ProjectID FROM PROJECT WHERE ProjectName='$projname';");
   
    $new_proj_assmnt = test_input($new_proj_assmnt);
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    
    if($passCounter > 0)
    {
        $projectID_results = $conn->query("SELECT ProjectID 
            FROM ASSIGNMENT 
            WHERE EmployeeNumber='$empnum';");
        $current_selection_not_assigned_to_emp = 0;
        $current_selection_assigned_to_emp = 0;
        $new_proj_currently_assigned_to_emp = 0;
        $dup_selection = 0;
        $index = 0;
        $projAssignErr = $dupEntryErr = $crntProjErr = "";
       
        /**
        * $crnt_emp_proj_asgmt_arr : an array that contain all employee's current project assignment by project ID
        */
        
        while($crnt_emp_proj_asgmt_arr = $projectID_results->fetch_array()) 
        {
            if($current_proj_assmnt == $new_proj_assmnt) // check for duplicate entries
            {
                ++$dup_selection; 
            }
            if($new_proj_assmnt == $crnt_emp_proj_asgmt_arr["ProjectID"]) // check for duplicate assignments
            { 
                ++$new_proj_currently_assigned_to_emp; 
            }
            if($current_proj_assmnt != $crnt_emp_proj_asgmt_arr["ProjectID"]) // verify if old project selected is assigned to employee
            { 
                ++$current_selection_not_assigned_to_emp; 
            }
            if($current_proj_assmnt == $crnt_emp_proj_asgmt_arr["ProjectID"]) // check if old project currently assigned to employee
            {
                ++$current_selection_assigned_to_emp;
            }           
            ++$index;
        } // End of while loop

        if($current_selection_not_assigned_to_emp == $index)
        { // verifies, if the "Project Name" of the "Select Current Project Assignment" field is in fact assigned to employee, if not assigned then display error message
            $crntProjErr = "Error...<strong>Current Project Assignment</strong> selected not currently assigned to employee...Review your current project choices...Employee was never assigned ".$project_currently_assigned_to_emp." project...<br/>";
        }
        if($new_proj_currently_assigned_to_emp > 0)
        { // verify if new project selection is currenly assigned to employee
            $projAssignErr = "This project is already assigned to employee!!!  Select another project...<br/>";
        }
        if($dup_selection > 0)
        {
            $dupEntryErr = "Error...You entered duplicate entries for current and new project assignments...Review your choices and try again...<br/>";
        }
    }   
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    global $empErr, $fnameErr, $lnameErr,  $deptErr, $phoneErr, $projIdErr, $positionErr,  $projNameErr;
    global $empnum, $lname, $fname, $dept, $phone, $current_proj_assmnt, $position, $projname;
    global $errorCounter, $passCounter, $totalCount;
    global $current_selection_not_assigned_to_emp, $current_selection_assigned_to_emp, $new_proj_currently_assigned_to_emp, $dup_selection;
    ////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>



