<?php
    $DB_SERVER = '172.17.0.1:32769';        // The server address/name/location and port; this field is required
    $DB_USERNAME = 'root';             // The username of your database server if applicable, usually 'root'; 
    $DB_PASSWORD = 'developer';             // The password of your database server if applicable; leave blank ('') if none
    $DB_DATABASE = 'WP_Database';           // The name of your database; this field is required
    // The boolean value returned from the connection attempt
    // ......THE DATABASE CONNECTION PROPERTY VARIABLE.........
    $conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);      
