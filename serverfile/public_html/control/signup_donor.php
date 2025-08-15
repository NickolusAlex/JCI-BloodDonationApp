<?php

if (isset($_POST['VALIDATION_ACTION'])) {

    $random_no   = $_POST['random_no'];
    $address     = $_POST['address'];

    $area        = $_POST['area'];
    $district    = $_POST['district'];
    $state       = $_POST['state'];
    $pincode     = $_POST['pincode'];
    $blood_type  = $_POST['blood_type'];
    $offten_time = $_POST['offten_time'];
    
    $cordova    = $_POST['cordova'];
    $model      = $_POST['model'];
    $platform   = $_POST['platform'];
    $uuid       = $_POST['uuid'];
    $version    = $_POST['version'];
    

    $DEVICE_IP = get_client_ip();

    $status = "";
    $user_id = "";

        $sql_auth = "UPDATE user_creation SET `address`='$address', `area`='$area', `district`='$district', `state`='$state', `pincode`='$pincode', `logged_in_status`=1, last_used_ip='$DEVICE_IP', `blood_type`='$blood_type', `offten_time`='$offten_time',active_status='1', availability='1' WHERE random_no = '$random_no'";
        
        $prepare = $DB_conn->prepare($sql_auth);
        $exc = $prepare->execute();


        if($exc==true){
            
            
            $SQL_last = "SELECT user_id FROM user_creation WHERE random_no = '$random_no'";
            $prepare = $DB_conn->prepare($SQL_last);
            $exc = $prepare->execute();
            $user_id = $prepare->fetchColumn();

            $status = 'SUCCESS';
            
        } else {
            
          $status = 'USER NOT CREATED';
            
        }

    echo json_encode(array("status_code" => $status, "user_id" => $user_id));
}
