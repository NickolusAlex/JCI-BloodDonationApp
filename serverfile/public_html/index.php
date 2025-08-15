<?php
header("Access-Control-Allow-Origin: *");
// print_r($_POST);

if (isset($_POST['REQUEST_KIND'])) {

    require_once("control/connection_center.php");
    require_once("control/additional_operation.php");

    if ($_POST['REQUEST_KIND'] == "ACCESS_VERIFICAION") {

        if ($_POST['VALIDATION_ACTION'] == "LOGIN_VERIFICAION") {
            include("control/check_authorization.php");
        } else if ($_POST['VALIDATION_ACTION'] == "SIGNUP_USER") {
            include("control/signup_user.php");
        } else if ($_POST['VALIDATION_ACTION'] == "SIGNUP_DONOR") {
            include("control/signup_donor.php");
        } else if ($_POST['VALIDATION_ACTION'] == "CHANGE_AVALILABILITY") {
            include("control/change_availability.php");
        } else if ($_POST['VALIDATION_ACTION'] == "MANAGE_REQUEST") {
            include("control/request_update.php");
        } else if ($_POST['VALIDATION_ACTION'] == "FORGET_PASSWORD") {
            include("control/forget_password.php");
        } else if ($_POST['VALIDATION_ACTION'] == "REQUEST_INSERT") {
            include("control/request_add.php");
        } else if ($_POST['VALIDATION_ACTION'] == "EDIT_PROFILE") {
            include("control/edit_profile.php");
        } else if ($_POST['VALIDATION_ACTION'] == "LOGOUT_USER") {
            include("control/logout.php");
        } else {
            include "pages/error.php";
        }
    } else if ($_POST['REQUEST_KIND'] == "ACCESS_REQUEST") {
        
        if (($_POST['page_name'] != 'login' && $_POST['page_name'] != 'signup' && $_POST['page_name'] != 'signup_donor')){
            $DEVICE_IP = get_client_ip();
             if (!(isset($_POST['CURRENT_IP'])) && $_POST['CURRENT_IP'] !=  $DEVICE_IP){
                $_POST['page_name'] = 'login';
             }
        }

        if (isset($_POST['page_name']) && ($_POST['page_name'] != "")) {
            $page_name = $_POST['page_name'] . '.php';
            $IP_SITE = $_POST['IP_SITE'];

            if (file_exists($page_name)) {
                include $page_name;
            } else {
                include "pages/error.php";
            }
        }
    } else {
        include "pages/error.php"; // invalid action
    }
} else {
    include "pages/error.php";
}

