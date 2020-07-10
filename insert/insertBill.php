<?php
    
// check for required fields
if (isset($_POST['bill_num']) && isset($_POST['price']) && isset($_POST['products']) && isset($_POST['date_time'])) {
    
    $bill_num = $_POST['bill_num'];
    $price = $_POST['price'];
    $products = $_POST['products'];
    $date_time = $_POST['date_time'];
    $discount = $_POST['discount'];
    $service_tax = $_POST['service_tax'];
    $bill_tax = $_POST['bill_tax'];
    
    // connecting to db
    require_once '../database/DBCOnnect.php';
    
    $sql = "INSERT INTO bills (bill_num, price, products, date_time, discount, service_tax, bill_tax) " . "VALUES ("
            . "'$bill_num'," 
            . "'$price'," 
            . "'$products',"
            . "'$date_time'," 
            . "'$discount'," 
            . "'$service_tax'," 
            . "'$bill_tax'"
            . ");";
    
    if(mysqli_query($conn, $sql)){
        //echo "Records inserted successfully.";
        $response["success"] = 1;
        $response["message"] = "Records inserted successfully.";
        echo json_encode($response);
    } else{
        //echo " ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        $response["success"] = 0;
        $response["message"] =  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        echo json_encode($response);
    }
    // check if row inserted or not
    $response["success"] = 1;
    echo json_encode($response);

    
    
    } else {
        // required field is missing
        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";

        // echoing JSON response
        echo json_encode($response);
    
    }