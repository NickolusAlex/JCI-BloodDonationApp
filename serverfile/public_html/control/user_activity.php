<?php 

$DEVICE_IP = get_client_ip();

if($_POST['current_id'] !=  $DEVICE_IP){
    fetch_page("login");
}