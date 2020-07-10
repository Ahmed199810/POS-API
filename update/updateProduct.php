<?php
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $img = $_POST['img_url'];
    
    $sql = "UPDATE products SET name = '$name' ,"
            . " amount = '$amount' ,"
            . " type = '$type' ,"
            . " price = '$price' ,"
            . " img_url = '$img' WHERE id = '$id'";
    
    if(strcmp($img, "") == 0){
        $sql = "UPDATE products SET name = '$name' ,"
            . " amount = '$amount' ,"
            . " type = '$type' ,"
            . " price = '$price'"
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
