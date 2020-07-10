<?php
    
// check for required fields
if (isset($_POST['id']) && isset($_POST['amount'])) {
        
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    
    require_once '../database/DBCOnnect.php';

    // connecting to db
    
    $sql = "UPDATE products "
            . "SET amount = amount - " . "'$amount'"
            . "WHERE id = '$id'";
        
    if(mysqli_query($conn, $sql)){
        //echo "Records inserted successfully.";
        $response["success"] = 1;
        $response["message"] = "Records updated successfully.";
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