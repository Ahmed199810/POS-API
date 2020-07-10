<?php

    $type = $_POST["type"];
    require_once '../database/DBCOnnect.php';
    $sql = "SELECT * FROM products WHERE type = '$type'";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["products"] = array();
            while ($row = mysqli_fetch_array($result)){
                $products = array();
                $products["id"] = $row["id"];
                $products["name"] = $row["name"];
                $products["amount"] = $row["amount"];
                $products["type"] = $row["type"];
                $products["img_url"] = $row["img_url"];
                $products["price"] = $row["price"];
                
                array_push($response["products"], $products);
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No users found";    
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }