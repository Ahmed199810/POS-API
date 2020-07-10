<?php

    
    require_once '../database/DBCOnnect.php';
    
    if(isset($_POST['user']) && isset($_POST['pass'])){
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sql_user = "SELECT * FROM users WHERE user = " . "'$user'" . " and pass = " . "'$pass'";
        
        if($result = mysqli_query($conn, $sql_user)){
            
            if(mysqli_num_rows($result) > 0){
                // user exists
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
                $response["message"] = "No Such User Exist";
                echo json_encode($response);
            }
        }
    }  else {
        $response["success"] = 0;
        $response["message"] = "Required Field(s) !";
        echo json_encode($response);
    }