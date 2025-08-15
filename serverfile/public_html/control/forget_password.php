<?php

// print_r($_POST);
if (isset($_POST['VALIDATION_ACTION'])) {
    $email = $_POST['EMAIL'];
    
    $status = "";

    $sql = " SELECT password FROM user_creation WHERE user_email = '$email' AND active_status = 1 ";
    $prepare = $DB_conn->prepare($sql);
    $exc = $prepare->execute();
    $password = $prepare->fetchcolumn();
    
    $status = send_mail($email, $password);

    echo json_encode(array("status" => $status, ));
}



function send_mail($email, $password){
    
    $status = "";
    
    // the message
    $msg = "Your Password is : " + $password;
    
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    
    // send email
    if(mail($email,"Your Password from JCI Blood",$msg)){
        
        $status = "VALID MAIL";
        
    }else{
        
        $statsu = "NOT VALID";
    
        
    }
    return $status;    
}