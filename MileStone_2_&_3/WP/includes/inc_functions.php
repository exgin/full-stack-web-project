<?php
/* VARIABLE DECLARATIONS */
$email_regex2 = '"/^\w+([.-]?\w+)*" . "@\w+([.-]?\w+)*" . "(\.\w{2,3})+$/"';
$email_regex1 = '"/^([A-Za-z]+\d+)|" . ""/';
$wp_email_regex = "/^(([a-zA-Z']+ \d*) |" . "([a-zA-Z]+ \. [a-zA-Z]+))" . "@((\w\.)? WP\.com $/";

////////////////////////////////////////////////////////////////////////////////////////////////////////
// Wild card search returns all values in the database that meets the regex
$wildcard_search_query = "SELECT ProjectID, ProjectName, E.EmployeeNumber, LastName, FirstName, Department, E.Position, OfficePhone, MaxHours, StartDate, EndDate, HoursWorked, 
Supervisor, EmailAddress 
  FROM EMPLOYEE AS E 
  JOIN (SELECT EmployeeNumber, A.ProjectID, ProjectName, MaxHours, StartDate, EndDate, HoursWorked 
        FROM ASSIGNMENT AS A 
  JOIN PROJECT AS P 
        ON A.ProjectID = P.ProjectID) AS AP ON AP.EmployeeNumber = E.EmployeeNumber
  WHERE E.EmployeeNumber LIKE '%%' or LastName LIKE '%%' or FirstName LIKE '%%' or Department LIKE '%%' or ProjectID LIKE '%%' or ProjectName LIKE '%%' or MaxHours LIKE '%%' or StartDate LIKE '%%' or EndDate LIKE '%%' or HoursWorked LIKE '%%' or EmailAddress LIKE '%%' ORDER BY EmployeeNumber
                       ;";
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('test_input'))
{
  /**
 * Test the input
 * trim(), stripslashes(),htmlspecialchars()
 * @param  $data The data to be sanitized
 * @return $data  The sanitized data
 */
  function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  return htmlspecialchars($data);
  }
} // End of test_input
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('get_column_name'))
{
  /**
 * This function searches for the schema in which the specified column exists
 * @param $conn The database connection variable
 * @param $col_name The column name to search for
 * @return $result  The results set returned from sql query containing the schema information
 */
  function get_column_name($conn="", $col_name="")
  {

    $query = "SELECT table_name, column_name from information_schema.columns WHERE column_name LIKE '%$col_name%';";
    if(($result = $conn->query($query)) > 0)
    {
      return $result;
    }
    else
    {
      die("Unable to locate column in database, please try again!");
    }
  }
  
} // End of get_colomn_name
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('valid_email'))
{
  /**
 * Validates the email address
 * @param $wp_email_regex
 * @param $str  The email address
 */
  function valid_email($str="", $wp_email_regex="") 
  {
    return preg_match($wp_email_regex="", $str="");
  }
} // End Of valid_email
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('valid_column'))
{
  /**
 * Validates the column input value
 * @param col_val The department value to be tested 
 * @param Query    The query column returned
 */
  function valid_column($conn="",$col_val="", $Query="")
  {
    $n = 0;
    $result = $conn->query($Query);
      foreach($result as $val)
      {
        if($col_val != $val)
        {
          $n++;
        }      
      }
      return ($n > 0) ? 1 : 0;
  }
} // End Of valid_column
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('get_emp_num_row'))
{
  /**
 * Experimental function to get all values for one employee, given the EmployeeNumber
 * @param $emp_num  The employee number
 */
  function get_emp_num_row($conn="",$emp_num = ""){
    $get_employee_query = "SELECT EmployeeNumber, LastName, FirstName, P.Department, OfficePhone, P.ProjectID, ProjectName, MaxHours, StartDate, EndDate, HoursWorked FROM PROJECT AS P JOIN (SELECT E.EmployeeNumber, A.HoursWorked, A.ProjectID, FirstName, LastName, Department, Position, OfficePhone, EmailAddress FROM ASSIGNMENT AS A JOIN EMPLOYEE AS E ON 	 A.EmployeeNumber = E.EmployeeNumber) AS AE ON P.ProjectID = AE.ProjectID WHERE EmployeeNumber = $emp_num ORDER BY EmployeeNumber;";

    // Check connection
    if(!$conn){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    else if(mysqli_num_rows($result = mysqli_query($conn, $get_employee_query)) > 0)
        { 
          while($row = mysqli_fetch_array($result)){
          echo "<p>". $row['EmployeeNumber'] . "</p><br>";
          echo $row['FirstName'] . "<br>";
          echo $row['LastName'] . "<br>";
          echo $row['Department']. "<br>";
          echo $row['OfficePhone'] . "<br>";
          echo $row['ProjectID'] . "<br>";
          echo $row['ProjectName'] . "<br>";
          echo $row['MaxHours'] . "<br>";
          echo $row['StartDate'] . "<br>";
          echo $row['EndDate'] . "<br>";
          echo $row['HoursWorked'] . "<br>";
      
      }
    }
  }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('get_col_dropdown'))
{
  /**
 * Gets one column of values from any table, displays dropdown
 * @param $conn   The connection property
 * @param $col    The column/field name
 * @param $table  The table name
 * @return $dropdown The column dropdown
 */
  function get_col_dropdown($conn="", $col="", $table="")
  {    
    $dropdown = "";
    if ($conn->connect_errno) 
    {
      printf("Connect failed: %s\n", $conn->connect_error);
      exit();
    }
    else if(($result = $conn->query("SELECT $col FROM $table ORDER BY  $col ASC;")) > 0) 
    {
        // printf("Select returned %d rows.\n\n", $result->num_rows);      
        $dropdown = '<select class="form-content"  name="'.$col.'" >';
        // Fetch one and one row
            while($row=mysqli_fetch_row($result))
            {
              $dropdown .= '<option class="dropdown" name="'.$col.'" value="'.$row[0].'">'.$row[0]."</option>";
             }
          $dropdown .= "</select>";
    }
    else
    {
        echo "*****ERROR*****The search returned an empty array...!";
    }  
    return $dropdown;
  }
} // End Of get_col_dropdown
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('select_Timezone'))
{
  /**
 * Returns a dropdown list of timezones
 * @param $selected   The selected time zone
 * @return $select    The time zone dropdown
 */
  function select_Timezone($selected = '') 
  { 
    
      // Create a list of timezone 
      $OptionsArray = timezone_identifiers_list(); 
          $select= '<select name="SelectContacts"> 
                      <option disabled selected> 
                          Please Select Timezone 
                      </option>'; 
            
          while (list ($key, $row) = each ($OptionsArray) ){ 
              $select .='<option value="'.$key.'"'; 
              $select .= ($key == $selected ? : ''); 
              $select .= '>'.$row.'</option>'; 
          }   
      return $select; 
  }
} // End Of select_Timezone
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('search_db'))
{
  /**
   * This search_db function searches the database for rows that match the search parameter.
   * You may optionally include the table and connection variable
   * @param $search_param   The search keyword
   * @param $conn           The database connection variable
   * @param $table          The table to search
   * @return $result        The results of the search
   */
  function search_db($search_param="", $conn="", $table="")
  {
////////////////////////////////////////////////////////////////////////////////////////////////////////
    $param_search_query = "SELECT E.EmployeeNumber, LastName, FirstName, Department, E.Position, Supervisor,        OfficePhone, EmailAddress, AP.ProjectID, ProjectName, MaxHours, StartDate, EndDate, HoursWorked
    FROM EMPLOYEE AS E JOIN 
      (SELECT EmployeeNumber, A.ProjectID, ProjectName, MaxHours, StartDate, EndDate, HoursWorked
          FROM ASSIGNMENT AS A JOIN PROJECT AS P ON A.ProjectID = P.ProjectID) AS AP ON AP.EmployeeNumber = E.EmployeeNumber
    WHERE CAST(E.EmployeeNumber AS CHAR)  LIKE '%$search_param%' 
      OR CAST(FirstName AS CHAR)  LIKE '%$search_param%' 
      OR CAST(LastName AS CHAR)  LIKE '%$search_param%' 
      OR CAST(E.Department AS CHAR)  LIKE '%$search_param%' 
      OR CAST(E.Position AS CHAR)  LIKE '%$search_param%' 
      OR CAST(Supervisor AS CHAR)  LIKE '%$search_param%' 
      OR CAST(OfficePhone AS CHAR)  LIKE '%$search_param%' 
      OR CAST(EmailAddress AS CHAR)  LIKE '%$search_param%'
      OR CAST(AP.ProjectID AS CHAR)  LIKE '%$search_param%'
      OR CAST(ProjectName AS CHAR)  LIKE '%$search_param%'
      OR CAST(E.Department AS CHAR)  LIKE '%$search_param%'
      OR CAST(MaxHours AS CHAR)  LIKE '%$search_param%'
      OR CAST(StartDate AS CHAR)  LIKE '%$search_param%' 
      OR CAST(EndDate AS CHAR)  LIKE '%$search_param%'
      OR CAST(HoursWorked AS CHAR)  LIKE '%$search_param%' ORDER BY EmployeeNumber;";
    $sql_search_table = "SELECT * FROM $table WHERE EmployeeNumber LIKE '%$search_param%';";
    
    /*****************************************************************/
    
    if($table == "")
    {
      if (($result=mysqli_query($conn, $param_search_query))>0) 
      {               
         return $result;      
      }
    }
    else
    { // Get all the values in a table if the selected column contains the wildcard value
      if ($result=mysqli_query($conn, $sql_search_table))
      {
        return $result;       
      }else{
        die("Sorry zero results returned please try again!!!");
      }
    } // End of else    
  }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if(!function_exists('get_table_data'))
{
  /**
   * The get_table_data function takes a query and connection variable
   * and returns the results of the query as specified by the query
   * in the form of a table.
   * @param $conn  The connection variable
   * @param $query The MySQL query string
   * @return $table The table of the query results
   */
  function get_table_data($conn, $query="")
  {
    /* check for connection erro*/
    if ($conn->connect_errno) 
            {
                printf("Connect failed: %s\n", $conn->connect_error);
                exit();
            } // check if results set not empty or for error
            else if((@$result = $conn->query($query)) == false)
            {
                die("No records matching your query were found.");
            }     
            $col_count = $conn->field_count;
            $row_count = $result->num_rows;
            /* Get field information for all columns */
            $finfo = $result->fetch_fields();
            $table = "<table>"."<tr>";
            foreach($finfo as &$val) // build table header using field names
              {
               $table.= "<th class='table-header' >".$val->name."</th>";
            
              }
              $table .= "</tr>";
              while ($row = $result->fetch_assoc()) // build table data fields row by row
              {
                $table.= "<tr>";
                foreach ($row as $field)
                {
                  $table.= "<td class='table-field' >".$field. "</td>";
                } 
                $table.= "</tr>";
              }
            return $table .= "</table>";  // return completed table
  }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if(!function_exists("get_field_value"))
{
  /**
   * The get_field_value function gets the specified field value(S) given the correct parameters
   * @param $conn The connection variable
   * @param $query The MySQL Select statement
   * @return mixed Returns a single field is queried, or returns a result set if more than one field is selected
   */
  function get_field_value($conn, $query)
  {
    $result = $conn->query($query);
   
    if($result === false)
    {
      die("No results returned from database...".$conn->connect_error);
    }
    else if(($conn->field_count) > 0)
    {
        $row = $result->fetch_array();
        return $row[0];
    }
    else if(($conn->num_rows) > 1)	
    {
      return $result;
    }      
  }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if(!function_exists("get_result_table"))
{
  /**
   * The get_result_table() function accepts a result set from the
   * mysqli_query() function and returns a table of the result set
   * @param $result The results set from a mysql query
   * @return $table A table of the result set
   */
  function get_result_table($result){
     /* Get field information for all columns */
     $finfo = $result->fetch_fields();
     $table = "<table>"."<tr>";
     foreach($finfo as &$val) // build table header using field names
       {
        $table.= "<th class='table-header' >".$val->name."</th>";
     
       }
       $table .= "</tr>";
       while ($row = $result->fetch_assoc()) // build table data fields row by row
       {
         $table.= "<tr>";
         foreach ($row as $field)
         {
           $table.= "<td class='table-field' >".$field. "</td>";
         } 
         $table.= "</tr>";
       }
     return $table .= "</table>";  // return completed table
  }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if(!function_exists("resetFunction"))
{
  /**
   * This function refreshes or resets the current webpage
   */
  function resetFunction()
  {
    header("refresh:0");
  }	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

