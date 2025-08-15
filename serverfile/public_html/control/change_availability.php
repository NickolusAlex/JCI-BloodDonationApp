<?php

// print_r($_POST);
if (isset($_POST['VALIDATION_ACTION'])) {
    $status_a    = $_POST['CURRENT_STATUS'];
    $user_id     = $_POST['LOGIN_USER'];
    
    $status = "";

    $change_sql = " UPDATE user_creation SET availability = '$status_a'  WHERE user_id = '$user_id' AND active_status = 1";
    $prepare = $DB_conn->prepare($change_sql);
    $exc = $prepare->execute();
    
    if($exc == true) {
        $status = "STATUS UPDATED";
    } else{
        $status = "STATUS NOT UPDATED";
    }
    
    echo json_encode(array("status" => $status, ));
}
