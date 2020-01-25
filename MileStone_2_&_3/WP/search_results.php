
<style>
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
        .error{
            color: red;
			text-align: left;
			background-image: url("images/shiney2.jpg");
			max-width: 100%;
			font-size: 1.35em;
        }
    </style>
<?php
/**
 * @author Dellius Alexander
 */
include 'includes/inc_functions.php';
include 'includes/inc_config.php';
include 'process_form_input.php';
/* Testing search input value */
$searchErr = $search_term = "";
$search_errorCounter = 0;

    
    if (empty($_POST["search"]))
    {
        $searchErr = "Sorry... Search box is empty!\nPlease enter a search keyword or value...";
        $search_errorCounter++;
    }
    else if (!preg_match("/[A-Za-z0-9\-\.]+/",$_POST["search"]))
    {
        $searchErr = "Only letter, numbers, all non characters and no white space allowed!\nYou can only search one keyword at a time!";
        $search_errorCounter++;
    }
    else
    {
        $search_term = test_input($_POST["search"]);
    }
    global $search_errorCounter, $search_term;
    
if($search_errorCounter == 0)
{
    $results = search_db($search_term,$conn);  /* Query the database for the search term and get all rows that have a column that matches the search term; return the results to variable $results   */
    if(!$results === false)
    {
        if(mysqli_num_rows($results) > 0)
        {
            echo "<div >";
            echo "<table>";
            echo "<tr>";
                echo "<th class='table-header' >Project ID</th>";
                echo "<th class='table-header' >Project Name</th>";
                echo "<th class='table-header' >Employee Number</th>";
                echo "<th class='table-header' >First Name</th>";
                echo "<th class='table-header' >Last Name</th>";
                echo "<th class='table-header' >Department</th>";
                echo "<th class='table-header' >Position</th>";
                echo "<th class='table-header' >OfficePhone</th>";               
                echo "<th class='table-header' >Max Hours</th>";
                echo "<th class='table-header' >Start Date</th>";
                echo "<th class='table-header' >End Date</th>";
                echo "<th class='table-header' >Hours Worked</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($results))
            {
                echo "<tr>";
                    echo "<td class='table-field'>" . $row['ProjectID'] . "</td>";
                    echo "<td class='table-field'>" . $row['ProjectName'] . "</td>";
                    echo "<td class='table-field'>" . $row['EmployeeNumber']. "</td>";
                    echo "<td class='table-field'>" . $row['FirstName']. "</td>";
                    echo "<td class='table-field'>" . $row['LastName'] . "</td>";
                    echo "<td class='table-field'>" . $row['Department'] . "</td>";
                    echo "<td class='table-field'>" . $row['Position'] . "</td>";
                    echo "<td class='table-field'>" . $row['OfficePhone'] . "</td>";
                    echo "<td class='table-field'>" . $row['MaxHours'] . "</td>";
                    echo "<td class='table-field'>" . $row['StartDate'] . "</td>";
                    echo "<td class='table-field'>" . $row['EndDate'] . "</td>";
                    echo "<td class='table-field'>" . $row['HoursWorked'] . "</td>";
                echo "</tr>";
            }
        echo "</table>";
        echo "<div >";
        }
        else
        {
            $searchErr = 'Sorry... No results found for search keywork... "'.$search_term.'"';
            $search_errorCounter = 0;
        }
    }
}
echo "<br />";
echo "<h4 class='error'>$searchErr</h4>";
// End search Test

?>
   