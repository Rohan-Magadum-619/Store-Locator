<?php 
//  Defining required variables 
    
    $db_hostname = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "storelocator";

    //Establishing connection with the database
    $con = mysqli_connect("$db_hostname","$db_username","$db_password","$db_database");

    //Checking the connection

    if (!$con)
    {
       dir("Connection Unsuccessful");
    }
?>