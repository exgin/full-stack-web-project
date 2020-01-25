<?php
/**
 * @author Dellius Alexander
 */
    include_once 'includes/inc_config.php';  
    include_once 'includes/inc_functions.php';

    $errorCounter = 0;
    $passCounter = 0;
    $total_hours = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {    
        // Test Position
        if (empty($_POST["ProjectName"]))
        {
            $projNameErr = "Project Name is required!";
            $errorCounter++;
        }
        else if (!preg_match("/^(\d*\D*\s)$/", $_POST["ProjectName"]) == 0)
        {
            die("Must match pattern: alpha and/or numeric characters, and white space allowed!");
            $errorCounter++;
        }
        else
        {
            $projname = test_input($_POST["ProjectName"]);
            $passCounter++;
        }
        // Display Report by Project Name
        if($passCounter > 0)
        {                
            $query = "SELECT ProjectName, P.Department, EmployeeNumber, LastName, FirstName,  OfficePhone, P.ProjectID,  MaxHours, StartDate, EndDate, HoursWorked FROM PROJECT AS P JOIN (SELECT E.EmployeeNumber, A.HoursWorked, A.ProjectID, FirstName, LastName, Department, Position, OfficePhone, EmailAddress FROM ASSIGNMENT AS A JOIN EMPLOYEE AS E ON 	 A.EmployeeNumber = E.EmployeeNumber) AS AE ON P.ProjectID = AE.ProjectID WHERE ProjectName LIKE '%$projname%' ORDER BY EmployeeNumber;";
            /* check connection */
            @$result = $conn->query($query);
            if ($conn->connect_errno) 
            {
                printf("Connect failed: %s\n", $conn->connect_error);
                exit();
            }
            else if($result === false)
            {
                die("No records matching your query were found.");
            }                       
            else if ($result > 0)
            {
                $row_counter = 0; 
                echo "<table>";
                    echo "<tr>";
                        echo "<th class='table-header' >Project ID</th>";
                        echo "<th class='table-header' >Project Name</th>";
                        echo "<th class='table-header' >Department</th>";
                        echo "<th class='table-header' >Employee Number</th>";
                        echo "<th class='table-header' >First Name</th>";
                        echo "<th class='table-header' >Last Name</th>";
                        echo "<th class='table-header' >OfficePhone</th>";
                        //echo "<th class='table-header' >Max Hours</th>";
                        echo "<th class='table-header' >Start Date</th>";
                        echo "<th class='table-header' >End Date</th>";
                        echo "<th class='table-header' >Hours Worked</th>";
                    echo "</tr>";
            
                while($row = $result->fetch_assoc())
                {
                    $total_hours += $row['HoursWorked'];
                    ++$row_counter;
                    echo "<tr>";
                        echo "<td class='table-field' >" . $row['ProjectID'] . "</td>";
                        echo "<td class='table-field' >" . $row['ProjectName'] . "</td>";
                        echo "<td class='table-field' >" . $row['Department'] . "</td>";
                        echo "<td class='table-field' >" . $row['EmployeeNumber'] . "</td>";
                        echo "<td class='table-field' >" . $row['FirstName'] . "</td>";
                        echo "<td class='table-field' >" . $row['LastName'] . "</td>";
                        echo "<td class='table-field' >" . $row['OfficePhone'] . "</td>";
                        //echo "<td class='table-field' >" . $row['MaxHours'] . "</td>";
                        echo "<td class='table-field' >" . $row['StartDate'] . "</td>";
                        echo "<td class='table-field' >" . $row['EndDate'] . "</td>";
                        echo "<td class='table-field' >" . $row['HoursWorked'] . "</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<th class='table-header' >Total Hours Worked</th>";
                echo "<td class='table-field' >".number_format($total_hours)."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th class='table-header' >Average Hours Worked</th>";
                echo "<td class='table-field' >".number_format($total_hours/$row_counter,2)."</td>";
                echo "</tr>";
                echo "</table>";
                mysqli_free_result($result);
            } 
        }
    }
?>