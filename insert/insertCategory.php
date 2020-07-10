<?php
    
// check for required fields
if (isset($_POST['name'])) {
    
    $name = $_POST['name'];
    $img = $_POST['img_url'];
    $printer = $_POST['printer'];
    
    // connecting to db
    require_once '../database/DBCOnnect.php';
    
    $sql = "INSERT INTO categories (name, img_url, printer) " . "VALUES ("
            . "'$name',"
            . "'$img'," 
            . "'$printer'"
            . ");";
    
    if(mysqli_query($conn, $sql)){
        //echo "Records inserted successfully.";
        $response["success"] = 1;
        $response["message"] = "Records inserted successfully.";
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