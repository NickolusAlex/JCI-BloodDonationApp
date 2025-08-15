<?php

if (isset($_POST['VALIDATION_ACTION'])) {

    $logged_out = 0;
    $status = "";

    $user_id    = $_POST['LOGIN_USER'];
    $CURRENT_IP = $_POST["CURRENT_IP"];

    $DEVICE_INFO = $_POST['DEVICE_INFO'];

    $cordova    = $DEVICE_INFO['cordova_version'];
    $model      = $DEVICE_INFO['device_model'];
    $platform   = $DEVICE_INFO['device_platform'];
    $uuid       = $DEVICE_INFO['device_uuid'];
    $version    = $DEVICE_INFO['device_version'];


    $DEVICE_IP = get_client_ip();

    $sql_logout = " UPDATE user_creation SET logged_in_status = '0', last_used_ip = '$DEVICE_IP', cordova = '$cordova', uuid = '$uuid', platform = '$platform' WHERE user_id = '$user_id' ";
    $prepare = $DB_conn->prepare($sql_logout);
    $exc = $prepare->execute();
    if ($exc == true) {
        $logged_out = 1;
        $status = "LOGGED OUT SUCCESSFULL";
    } else {
        $logged_out = 0;
        // print_r($prepare->errorInfo());
        $status = "LOGGED OUT FAILED";
    }

    echo json_encode(array("logged_out" => $logged_out, "status" => $status));
}
