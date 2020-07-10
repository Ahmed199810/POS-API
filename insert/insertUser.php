<?php

    
    
// check for required fields
if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['type'])) {
        
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];
    
    
    require_once '../database/DBCOnnect.php';

    // connecting to db
    
    $sql = "INSERT INTO users (user, pass, type) " . "VALUES ("
            . "'$user',"
            . "'$pass'," 
            . "'$type'"
            . ");";
    
        
    if(mysqli_query($conn, $sql)){
        //echo "Records inserted successfully.";
        $response["success"] = 1;
        $response["message"] = "Records inserted successfully.";
        $response["query"] = $sql;
        echo json_encode($response);
    } else{
        //echo " ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        $response["success"] = 0;
        $response["message"] =  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        echo json_encode($response);
    }
    // check if row inserted or not
    $response["success"] = 1;
    echo json_encode($response);

    
    
    } else {
        // required field is missing
        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";

        // echoing JSON response
        echo json_encode($response);
    
    }