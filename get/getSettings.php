<?php

    require_once '../database/DBCOnnect.php';

    $sql = "SELECT * FROM settings";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
    
            $response["settings"] = array();
            while ($row = mysqli_fetch_array($result)){
                $settings = array();
                $settings["id"] = $row["id"];
                $settings["name"] = $row["name"];
                $settings["cashier_printer"] = $row["cashier_printer"];
                $settings["chef_printer"] = $row["chef_printer"];
                $settings["img_url"] = $row["img_url"];
                
                array_push($response["settings"], $settings);
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No settings found";    
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }