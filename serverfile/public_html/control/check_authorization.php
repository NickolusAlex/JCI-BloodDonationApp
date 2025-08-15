<?php

// print_r($_POST);
if (isset($_POST['VALIDATION_ACTION'])) {
    $phone_number = $_POST['phonenumber'];
    $password    = $_POST['password'];
    $status = "";

    $current_ip = get_client_ip();
    $user_id = "";

    $check_sql = " SELECT * FROM user_creation WHERE (phone_number = '$phone_number') AND password = '$password' AND active_status = 1 LIMIT 1 ";
    $prepare = $DB_conn->prepare($check_sql);
    $exc = $prepare->execute();
    $user_details = $prepare->fetchAll();

    if ($exc == true) {
        if (COUNT($user_details) > 0) {
            foreach ($user_details as $value_ur) {
                if ($value_ur['active_status'] == "1") {

                    $user_id        = $value_ur['user_id'];
                    $old_logged_in  = $value_ur['logged_in_status'];

                    $status = "USER VALID";
                    $old_ip = $value_ur['last_used_ip'];

                    if ($current_ip != $old_ip) {
                        $ip_update_sql = " UPDATE user_creation SET logged_in_status = 1, last_used_ip = '$current_ip' WHERE user_id = '$user_id' ";
                        $prepare = $DB_conn->prepare($ip_update_sql);
                        $exc = $prepare->execute();
                    }
                    else{
                        $update_sql = " UPDATE user_creation SET logged_in_status = 1 WHERE user_id = '$user_id' ";
                        $prepare = $DB_conn->prepare($update_sql);
                        $exc = $prepare->execute();
                    }

                } else {
                    $status = "USER NOT ACTIVED";
                }
            }
        } else {
            $status = "VALIDATION INVALID";
        }
    } else {
        $status = "CONNECTION INTERRUPTED";
    }

    echo json_encode(array("status" => $status, "user_id" => $user_id, "current_ip" => $current_ip));
}
