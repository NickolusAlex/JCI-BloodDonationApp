<?php

if (isset($_POST['VALIDATION_ACTION'])) {

    $user_id        = $_POST['LOGIN_USER'];

    $user_name      = $_POST['user_name'];
    $date           = $_POST['date'];
    $phone_number   = $_POST['phone_number'];
    $user_email     = $_POST['user_email'];
    $password       = $_POST['password'];
    $blood_group    = $_POST['blood_group'];
    $offten_time    = $_POST['offten_time'];
    $district       = $_POST['district'];
    $address        = $_POST['address'];
    $pincode        = $_POST['pincode'];
    $area           = $_POST['area'];
    $state          = $_POST['state'];
    
    $last_donated   = $_POST['last_donated'];
    

    $random_no  = $_POST['random_no'];

    $cordova    = $_POST['cordova'];
    $model      = $_POST['model'];
    $platform   = $_POST['platform'];
    $uuid       = $_POST['uuid'];
    $version    = $_POST['version'];

    $DEVICE_IP = get_client_ip();

    $status = "";

    $verfy_count="SELECT count(*) as count from user_creation  where ( phone_number = '$phone_number' OR user_email = '$user_email' ) AND active_status = 1 AND user_id != '$user_id'";
    $prepare = $DB_conn->prepare($verfy_count);
        $exc = $prepare->execute();

        $fetch_cnt= $prepare->fetchcolumn();
        if($fetch_cnt==0){

            $path ="";

        $auth_array = array(
            
            "user_name"     => $user_name,
            "date"          => $date,
            "phone_number"  => $phone_number,
            "user_email"    => $user_email,
            "password"      => $password,
            "blood_group"   => $blood_group,
            "offten_time"   => $offten_time,
            "district"      => $district,
            "address"       => $address,
            "pincode"       => $pincode,
            "area"          => $area,
            "state"         => $state,
            
            "last_donated"  => $last_donated,
            
            "random_no"    => $random_no,
            
            "cordova"      => $cordova,
            "model"        => $model,
            "platform"     => $platform,
            "uuid"         => $uuid,
            "version"      => $version,
            
            "active_status"     => 1,
            "logged_in_status"  => 1,
            "last_used_ip"      => $DEVICE_IP,
            "profile_file"      => $path,

        );

        
        $sql_auth = "UPDATE user_creation SET name=:user_name, date=:date, phone_number=:phone_number, user_email=:user_email, password=:password, blood_type=:blood_group, offten_time=:offten_time, district=:district, address=:address, pincode=:pincode, area=:area, state=:state, last_donated=:last_donated, random_no=:random_no, cordova=:cordova, model=:model, platform=:platform, uuid=:uuid, version=:version, active_status=:active_status, logged_in_status=:logged_in_status, last_used_ip=:last_used_ip, profile_file=:profile_file WHERE user_id = '$user_id'";
        
        $prepare = $DB_conn->prepare($sql_auth);
        $exc = $prepare->execute($auth_array);

        if($exc==true){
            $status='SUCCESS';
        }
        else{
            $status='NOT SUCCESS';
            // $status=$prepare->errorInfo();
        }
    }
      else{
          $status='REPEATED CONTACT';
      }

    echo json_encode(array("status_code" => $status));
}
