<?php

    require_once '../database/DBCOnnect.php';
    $sql = "SELECT * FROM cafe_tables ORDER BY id ASC";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["tables"] = array();
            while ($row = mysqli_fetch_array($result)){
                $tables = array();
                $tables["id"] = $row["id"];
                $tables["price"] = $row["price"];
                $tables["chair_num"] = $row["chair_num"];
                $tables["table_num"] = $row["table_num"];
                $tables["bill_num"] = $row["bill_num"];
                $tables["state"] = $row["state"];
                array_push($response["tables"], $tables);
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No tables found";    
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }