<?php

// print_r($_POST);
if (isset($_POST['VALIDATION_ACTION'])) {
    $request_array = $_POST['request_array'];
    
    
    $status = "";

    foreach($request_array as $details){
        $change_sql = " UPDATE request_table SET request_status = '$details[1]'  WHERE request_id = '$details[0]'";
        $prepare = $DB_conn->prepare($change_sql);
        $exc = $prepare->execute();
        if($exc == true) {
            $status = "SUCCESS";
        } else{
            $status = "STATUS NOT UPDATED";
            break;
        }
            
    }
    

    
    echo json_encode(array("status_code" => $status, ));
}
