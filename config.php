<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "websys";
    $db_name = "tasks";

    // try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    // }
    // catch(mysqli_sql_exception){
    //     echo "Could not connect! <br>";
    // }

    // if($conn){
    //     echo "You are connected! <br>";
    // }
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>