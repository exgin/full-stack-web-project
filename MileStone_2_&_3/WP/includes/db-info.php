<?php
    include 'config.php';
    include 'functions.php';
    header("refresh: 1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>DB INFO</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
 </head>
 <body style="font-size: 1.25rem;"> 
    
        <h1>MySQL Database Server Information</h1>
        <?php
            
            
            // Check for connection
            if($conn)
            {
                
                echo "<p style='font-weight: bold; background: lightgray; width: 550px; border-bottom: ridge 3px gray; border-top: ridge 3px gray;'>Connected to the " . $DB_DATABASE . " successfully!</p><br>";
                printf("MySQL host info: %s\n<br>", mysqli_get_host_info($conn));
                printf("MySQL client info: %s\n<br>", mysqli_get_client_info($conn));
                printf("MySQL server version: %s\n<br>", mysqli_get_server_info($conn));
                printf("MySQL protocol version: %s\n<br>", mysqli_get_proto_info($conn));
                
                $query = "SHOW STATUS;";
                echo '<div class="container" style="display:flex; flex-direction: row;">';
               if ($result = mysqli_query($conn, $query)) {
                    echo "<br>";
                      /* Table 1 container */
                      echo '<div class="table1" style="display: flex; flex-direction: column; text-align: left; padding: none; margin: none; width: 600px;">';
                    /* Header */
                    echo "<h3 style='background: lightgray; width: 550px; border-bottom: ridge 3px gray; border-top: ridge 3px gray;'>Database Status</h3>";                  
                    /* Create table */
                    echo "<table>";
                    echo "<tr>";
                    echo "<th style='padding-bottom: 10px; width:auto;'>Variable Name</th> ";
                    echo "<th style='padding-bottom: 10px; width:auto;'>Value</th>";
                    echo "</tr>";

                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='width:auto;'>" . $row['Variable_name'] . "</td>";
                        echo "<td style='width:auto;'>" . $row['Value'] . "</td>";
                        echo "</tr>";                      
                    }
                    echo "</table>";
                    echo '</div>';
                    /* free result set */
                    //$result->free();                  
                }               
            }
            else
            {
                die("ERROR: Could not connect to $DB_DATABASE " . mysqli_connect_error() );
            }
            echo "<br>";


            if ($stat_result = $conn->get_connection_stats()){
                echo "<br>";
                /* Table 2 container */
                echo '<div class="table2" style="display: flex; flex-direction: column; text-align: left; padding: none; margin: none; width: 600px;">';
                    /* Header */
                    echo "<h3 style='background: lightgray; width: 550px; border-bottom: ridge 3px gray; border-top: ridge 3px gray;'>Connection Status</h3>";                    
                    /* Create table */
                    echo "<table>";
                    echo "<tr>";
                    echo "<th style='padding-bottom: 10px; width:auto;'>Variable Name</th> ";
                    echo "<th style='padding-bottom: 10px; width:auto;'>Value</th>";
                    echo "</tr>";
     
                    while(list($item, $desc) = each($stat_result))
                    {       
                        echo "<tr>";
                        echo "<td style='width:auto;'>" . $item . "</td>";
                        echo "<td style='width:auto;'>" . $desc . "</td>";
                        echo "</tr>";                      
                    }
                    echo "</table>";
                    echo '</div>';
                    /* free result set */
                    //$stat_result->free();
                      
                }
            echo "</div>";
    ?>

    
 </body>
</html>