<?php
    
    // check for required fields
    
    $price = $_POST['price'];
    $table_num = $_POST['table_num'];
    $chair_num = $_POST['chair_num'];
    $bill_num = $_POST['bill_num'];
    $state = $_POST['state'];
    
    // connecting to db
    require_once '../database/DBCOnnect.php';
    
    $sql = "INSERT INTO cafe_tables (price, table_num, chair_num, bill_num, state) " . "VALUES ("
            . "'$price'," 
            . "'$table_num'," 
            . "'$chair_num'," 
            . "'$bill_num',"
            . "'$state'"
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