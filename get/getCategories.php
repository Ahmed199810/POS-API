<?php

    require_once '../database/DBCOnnect.php';
    $sql = "SELECT * FROM categories";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["categories"] = array();
            while ($row = mysqli_fetch_array($result)){
                $categories = array();
                $categories["id"] = $row["id"];
                $categories["name"] = $row["name"];
                $categories["img_url"] = $row["img_url"];
                $categories["printer"] = $row["printer"];

                
                array_push($response["categories"], $categories);
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