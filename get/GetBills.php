<?php

    require_once '../database/DBCOnnect.php';

    $sd = $_POST["start_date"];
    $ed = $_POST["end_date"];

    $sql = "SELECT * FROM bills WHERE date_time BETWEEN '$sd' AND '$ed' ORDER BY id DESC";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response["bills"] = array();
            while ($row = mysqli_fetch_array($result)){
                $bills = array();
                $bills["id"] = $row["id"];
                $bills["bill_num"] = $row["bill_num"];
                $bills["price"] = $row["price"];
                $bills["products"] = $row["products"];
                $bills["date_time"] = $row["date_time"];
                $bills["discount"] = $row["discount"];
                $bills["service_tax"] = $row["service_tax"];
                $bills["bill_tax"] = $row["bill_tax"];
                
                array_push($response["bills"], $bills);
            }
            
            $response["success"] = 1;
            echo json_encode($response);
            
        }  else {
            $response["success"] = 0;
            $response["message"] = "No bills found";    
            echo json_encode($response);
        }
    }  else {
        json_encode($result);
    }