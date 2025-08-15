<?php

if (isset($_POST['VALIDATION_ACTION'])) {

    $username   = $_POST['name'];
    $password   = $_POST['password'];

    $phone      = $_POST['phone_number'];
    $user_email      = $_POST['user_email'];
    $date      = $_POST['date'];
    $random_no  = $_POST['random_no'];

    $cordova    = $_POST['cordova'];
    $model      = $_POST['model'];
    $platform   = $_POST['platform'];
    $uuid       = $_POST['uuid'];
    $version    = $_POST['version'];

    $DEVICE_IP = get_client_ip();

    $status = "";

    $verfy_count="SELECT count(*) as count from user_creation  where phone_number = '$phone' AND active_status = 1";
    $prepare = $DB_conn->prepare($verfy_count);
        $exc = $prepare->execute();

        $fetch_cnt= $prepare->fetchcolumn();
        if($fetch_cnt==0){

            $path ="";


            if(isset($_FILES['profile_img']) && $_FILES['profile_img']){
                $path = 'profile_images/';
                $img = $_FILES['profile_img']['name'];
                $tmp = $_FILES['profile_img']['tmp_name'];
                
                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                
                $final_image = rand(1000,1000000).$img;
                
                $path = $path.strtolower($final_image); 
                if(! (move_uploaded_file($tmp,$path))){
                    $path = "";
                }
            }


        $auth_array = array(
            "name"         => $username,
            "phone_number" => $phone,
            "date"         => $_POST['date'],
            "last_donated" => date('Y-m-d'),
            "random_no"    => $random_no,
            "password"     => $password,
            "user_email"     => $user_email,
            "cordova"      => $cordova,
            "model"        => $model,
            "platform"     => $platform,
            "uuid"         => $uuid,
            "version"      => $version,
            "active_status"     => 0,
            "logged_in_status"  => 0,
            "last_used_ip"      => $DEVICE_IP,
            "profile_file"      => $path,

        );

        $sql_auth = "INSERT INTO user_creation (`name`, `phone_number`, `user_email`, `date`, `last_donated`,`address`, `random_no`, `password`, `cordova`, `model`, `platform`, `uuid`, `version`, `active_status`, `logged_in_status`, `last_used_ip`, `profile_file`) VALUES (:name, :phone_number,:user_email, :date, :last_donated,'', :random_no, :password, :cordova, :model, :platform, :uuid, :version, :active_status, :logged_in_status, :last_used_ip, :profile_file)";
        $prepare = $DB_conn->prepare($sql_auth);
        $exc = $prepare->execute($auth_array);

        $user_details_id = $DB_conn->lastInsertId();
        
        if($exc==true){
            $status='SUCCESS';
        }
        else{
            $status=$prepare->errorInfo();
        }
    }
      else{
          $status='REPEATED CONTACT';
      }

    echo json_encode(array("status_code" => $status));
}
