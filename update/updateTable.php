<?php
    
    $id = $_POST['id'];
    $price = $_POST['price'];
    $table_num = $_POST['table_num'];
    $chair_num = $_POST['chair_num'];
    $bill_num = $_POST['bill_num'];
    $state = $_POST['state'];
    
    $sql = "UPDATE cafe_tables SET price = '$price'"
            . ", table_num = '$table_num', chair_num = '$chair_num', bill_num = '$bill_num' WHERE id = '$id'";
    
    // connecting to db
    require_once '../database/DBCOnnect.php';
        
    if(mysqli_query($conn, $sql)){
        $response["success"] = 1;
        $response["message"] = "Records updated successfully.";
        $response["query"] = $sql;
        echo json_encode($response);
    } else{
        $response["success"] = 0;
        $response["message"] =  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        echo json_encode($response);
    }
    // check if row inserted or not
    $response["success"] = 1;
    echo json_encode($response);
