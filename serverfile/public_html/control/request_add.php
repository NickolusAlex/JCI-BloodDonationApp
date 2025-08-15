<?php

if (isset($_POST['VALIDATION_ACTION'])) {

    $random_no   = $_POST['random_no'];
    $patient_name   = $_POST['patient_name'];

    $hospital      = $_POST['hospital'];
    $reason      = $_POST['reason'];
    $blood_group  = $_POST['blood_group'];

    $no_off_units    = $_POST['no_off_units'];
    $contact_per      = $_POST['contact_per'];
    $contact_no   = $_POST['contact_no'];
    $place       = $_POST['place'];
    $district    = $_POST['district'];
    $user_id       = $_POST['user_id'];
    
    $DEVICE_IP = get_client_ip();

    $status = "";

            

        $auth_array = array(
            "random_no"         => $random_no,
            "patient_name" => $patient_name,
            "hospital"         => $hospital,
            "reason"    => $reason,
            "blood_group"     => $blood_group,
            "no_off_units"      => $no_off_units,
            "contact_per"        => $contact_per,
            "contact_no"     => $contact_no,
            "place"         => $place,
            "district"      => $district,
            "user_id"     => $user_id,
           

        );

        $sql_auth = "INSERT INTO request_table (`requested_by`, `p_name`, `p_blood_type`,`p_reason`, `p_hospital`, `blood_units`, `contact_person`, `contact_number`, `place`, `district`, `request_status`,`random_sc`) VALUES ( '$user_id', '$patient_name', '$blood_group', '$reason', '$hospital', '$no_off_units', '$contact_per', '$contact_no', '$place', '$district', '0','$random_no')";
        $prepare = $DB_conn->prepare($sql_auth);
        $exc = $prepare->execute();

        $user_details_id = $DB_conn->lastInsertId();
        
        if($exc==true){
            $status='SUCCESS';
        }
        else{
            $status="NOT SUCCESS";
        }
   

    echo json_encode(array("status_code" => $status));
}
