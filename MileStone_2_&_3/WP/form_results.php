<?php

/**
 * @author Dellius Alexander
 * Update Query Variable
 */
////////////////////////////////////////////////////////////////////////////////////////////////////////
if     (($errorCounter == 0) && ($new_proj_currently_assigned_to_emp == 0) && ($current_selection_assigned_to_emp > 0))
{
    
    /***********Update Query Syntax********************************************************************\
     *        
     * UPDATE table_name
     * SET column1=value, column2=value2,...
     * WHERE some_column=some_value
     * 
     * UPDATE ASSIGNMENT    
     * SET ProjectID='1000',
     * HoursWorked='50.00'
     * WHERE EmployeeNumber='1' AND ProjectID='1600';
     **************************************************************************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////////
/*********************** Updating the EMPLOYEE & ASSIGNMENT Tables ************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////////
$upd_emp_asgmt_sql_qry ="   UPDATE ASSIGNMENT  as A, 
                                EMPLOYEE as E
                            SET E.FirstName='$fname',
                                E.LastName='$lname',
                                E.Department='$dept',
                                E.OfficePhone='$phone',
                                E.Position='$position',
                                A.ProjectID='$new_proj_assmnt'
                            WHERE A.EmployeeNumber='$empnum' 
                            AND A.ProjectID='$current_proj_assmnt' 
                            AND E.EmployeeNumber='$empnum';";
////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(($result = $conn->query($upd_emp_asgmt_sql_qry)) == false)
    {  /* Ok...If you have made it this far pass all the validation and your parameters are correct, the only possible error i can thing of you may have is a mismatch */
        die("<p class='error'>Project ID & Project Name Mismatch...".$conn->connect_error."</p>");
    }
    else
    { // Displaying results and input back to client display on include statement
        echo "<h2>Records updated successfully!!!</h2>";
        echo "<pre style='text-align:left; font-size:1.8em; padding-top:50px;'>";
        echo "Employee Number:	".$empnum ."<br>";
        echo "First Name:      	".$fname."<br>";
        echo "Last Name:        	".$lname."<br>";
        echo "Department:   		".$dept."<br>";
        echo "Phone:			".$phone."<br>";
        echo "Old Project Assignment: ".$project_currently_assigned_to_emp."<br>";
        echo "Position:  		".$position."<br>";
        echo "New Project Assignment: ".$projname."<br>";
        echo "<br>";
        echo "<br>";
        echo "<hr />";
        echo "A total of $errorCounter input values have failed validation.<br />";
        echo "A total of $passCounter input values have passed validation.";
        echo "</pre>";
        /////////////// Display Results from Database to verify changes ////////////////////////////////
        /***********************************************************************************************/
        echo "<div style='align-content:left;'>";
        $sql_verify = " SELECT AP.ProjectID, ProjectName, LastName, FirstName, E.Department, StartDate, EndDate,                    HoursWorked
                        FROM EMPLOYEE AS E JOIN 
                        (SELECT EmployeeNumber, A.ProjectID, ProjectName, MaxHours, StartDate, EndDate, HoursWorked
                        FROM ASSIGNMENT AS A JOIN PROJECT AS P ON A.ProjectID = P.ProjectID) AS AP ON AP.EmployeeNumber = E.EmployeeNumber
                        WHERE E.EmployeeNumber='$empnum';";
        echo get_result_table(@$conn->query($sql_verify)); // Display results using the get_results_table() function        
        echo "</div>";
        ////////////////////////////////////////////////////////////////////////////////////////////////
    }
}
$conn->close();
////////////////////////////////////////////////////////////////////////////////////////////////////////
