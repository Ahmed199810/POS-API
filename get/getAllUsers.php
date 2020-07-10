<?php

    require_once '../database/DBCOnnect.php';
    $sql = "SELECT * FROM users ORDER BY id DESC";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["users"] = array();
            while ($row = mysqli_fetch_array($result)){
                $users = array();
                $users["id"] = $row["id"];
                $users["user"] = $row["user"];
                $users["pass"] = $row["pass"];
                $users["type"] = $row["type"];

                
                array_push($response["users"], $users);
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