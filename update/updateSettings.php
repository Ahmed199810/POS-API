<?php
    
    $id = "1";
    $name = $_POST['name'];
    $cashier_printer = $_POST['cashier_printer'];
    $chef_printer = $_POST['chef_printer'];
    $img = $_POST['img_url'];
    
    $sql = "UPDATE settings SET name = '$name' ,"
            . " cashier_printer = '$cashier_printer' ,"
            . " chef_printer = '$chef_printer' ,"
            . " img_url = '$img' WHERE id = '$id'";
    
    if(strcmp($img, "") == 0){
        $sql = "UPDATE settings SET name = '$name' ,"
            . " cashier_printer = '$cashier_printer' ,"
            . " chef_printer = '$chef_printer'"
            . " WHERE id = '$id'";
    }
    
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
