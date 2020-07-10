<?php

    require_once '../database/DBCOnnect.php';
    $sql = "SELECT * FROM bill_count ORDER BY id DESC LIMIT 1";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["nums"] = array();
            while ($row = mysqli_fetch_array($result)){
                $nums = array();
                $nums["id"] = $row["id"];
                $nums["count"] = $row["count"];
                array_push($response["nums"], $nums);
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No nums found";   
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }