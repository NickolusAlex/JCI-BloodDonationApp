<?php 
   $user_id = $_POST['LOGIN_USER'];
   
   $user_details_sql = "SELECT *,( SELECT blood_name FROM blood_type WHERE blood_id = U.blood_type ) AS blood_name FROM user_creation U where user_id = '$user_id' AND active_status = 1";
   $prepare = $DB_conn->prepare($user_details_sql);
   $exc = $prepare->execute();
   
   $user_details = $prepare -> fetchAll();
   $IP_SITE = "https://jcibld.000webhostapp.com/";
   
   $availablility = $request_count = $blood_name = "";
   if(!empty($user_details) &&  ($user_details[0]['availability'] == "1")){
       
       $availablility = "checked";
       $blood_name = $user_details[0]['blood_name'];
       
    $request_details = "SELECT IFNULL(COUNT(*), 0) as req FROM request_table where requested_by = '$user_id' AND request_status = 0";
    $prepare = $DB_conn->prepare($request_details);
    $exc = $prepare->execute();
    
    $request_count = $prepare -> fetchColumn();
       
   }
   
   ?>
<link rel="stylesheet" href="css/home.css">
<style>
   @media only screen and (min-width: 370px) {
   .layout-div {
   margin-top: -0.7vh;
   }
   }
   .bg-danger {
   background-color: #C20101 !important;
   }
   .layout-div {
   padding-left: 0px;
   margin-top: 5px;
   }
   .home_icons {
   margin-bottom: 24px;
   }
   .bg-danger {
   background-color: #C20101 !important;
   }
   body {
   background-color: white !important;
   }
   /* Centered text */
   .centered {
   position: absolute;
   top: 4vh;
   left: 6vw;
   transform: translate(0vw, 0vh);
   font-weight: 500;
   font-size: 5vw;
   }
   .right-top {
   position: absolute;
   color: rgb(255, 255, 255);
   top: 1vh;
   /* left: 0vw; */
   right: 6vw;
   transform: translate(0vw, 0vh);
   font-weight: 500;
   font-size: 4vw;
   }
   ul {
   height: 50px;
   width: 100%;
   }
   li {
   /* width: 50px; */
   display: inline;
   /* margin-left: -87%; */
   }
   .menu-list {
   height: 50px;
   padding: 5px 10vw;
   width: 50vw;
   word-break: normal;
   border-radius: 5px;
   }
   .menu-option *{
    font-weight: 700 !important;
   }
    .container-fluid *{
   text-transform: capitalize;
    }
   .menu-option {
    font-weight: 700;
   text-transform: capitalize;
   /* padding-top: 20px; */
   margin: 0 auto;
   }
   .menu-btn {
   font-weight: 600;
   color: black;
   padding: 10px 5vw 10px 5vw;
   /* padding: 10px 30px; */
   /* padding-left: 30px;
   padding-right: 30px; */
   /* padding-top: 10px;
   padding-bottom:10px; */
   }
   .menu-circle {
   border: 3px rgb(255, 0, 0) solid;
   border-radius: 50%;
   height: 30px;
   width: 30px;
   padding: 20px 10px;
   /* margin-left: -15px; */
   }
   .menu-circle i {
   /* width: 20px; */
   font-size: 18px;
   color: rgb(0, 0, 0);
   }
   .shadow-custom {
   box-shadow: 15px 5px 30px -5px rgba(0, 0, 0, 0.37);
   -webkit-box-shadow: 15px 5px 30px -5px rgba(0, 0, 0, 0.37);
   -moz-box-shadow: 15px 5px 30px -5px rgba(0, 0, 0, 0.37);
   }
   .img-shadow_bg{
   border-radius: 50%;
   width: 4rem;
   height: 4rem;
   box-shadow: -5px 0px 15px -5px rgb(0 0 0 / 40%);
   -webkit-box-shadow: -5px 0px 15px -5px rgb(0 0 0 / 40%);
   -moz-box-shadow: -5px 0px 15px -5px rgb(0 0 0 / 40%);
   }
   .b-left{
   border-left: 2px solid gray;
   }
   /*.b-right{*/
   /*border-right: 1px solid gray;*/
   /*}*/
   .head-con{
   width: 80vw;
   margin-top: 20vh;
   /*height: 3vh;*/
   border-radius: 20px;
   }
   .status-row{
   padding: 5px;
   }
   .blood_group{
   color: #c20101;
   font-size: 10vw;
   font-weight: 500;
   
   }
   .box-pending{
   border-radius: 50%;
   color: white;
   height: 25vw;
   width: 25vw;
   word-break: break-all;
   }
   .gray-theam{
   background-color: gainsboro;
   }
   .red-theam{
   background-color: red;
   }
   .request-count{
   font-size: 10vw;
   font-weight: 500;
   }
   .your_blood{
       font-weight: bold;
   }
     .container-fluid *{
       text-transform:capitalize; 
    }
</style>
<div style="padding-left: 0px; width: 100vw !important;" class="sticky-top container-fluid h20 bg-white ">
<div style="width: 100vw !important;" class="h-100 d-flex align-items-center sticky-top">
   <img src="images/layout-red.png" style="width: 101vw; padding-top: 10vh; height: 40vh;" alt="">
   <?php 
      if(!empty($user_details) && ($user_details[0]['name'] != "")){
      ?>
   <div class="centered text-white">
      Hello, <?php echo $user_details[0]['name']; ?>
   </div>
   <?php
      }
      ?>
   <div  class="right-top">
      <a onclick="fetch_page('edit_profile')" style="text-decoration: none; color: white" href="#"><i class="fas fa-cog fa-2x"></i></a>&nbsp;&nbsp;
      <a onclick="logout()" style="text-decoration: none; color: white" href="#"><i class="fas fa-sign-out-alt fa-2x"></i></a> 
   </div>

</div>
<div class="h-100 d-flex align-items-center d-flex justify-content-center sticky-top status-bar">
   <div class="head-con bg-white shadow">
      <div class="row status-row d-flex align-items-center">
         <div class="col-6 b-right bold-div text-center">
            <span class="your_blood ">Your Blood Group</span><br>
            <span class="blood_group "><?php echo $blood_name; ?></span>
         </div>
         <div class="col-6 b-left text-center">
            <div class="box-pending <?php echo ($request_count > 0)? ("bg-danger"): ("gray-theam"); ?>">
               <div style="padding:10px">
                  Pending <br> Request
                  <br>
                  <span class="request-count"><?php echo $request_count; ?></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div style=" padding-left: 3.25rem; padding-top: 20vh;right: 0;font-weight: 700;font-size: 15px; " class="container-fluid bg-white">
    <div class="row">
        <div class="col-6">
            
   <div class="custom-control custom-switch">
      <input type="checkbox" onchange="change_avaliablity()" <?php echo $availablility; ?> class="custom-control-input" id="avail">
      <label class="custom-control-label" for="avail">Your Availability</label>
   </div>
   
        </div>
        <div class="col-6">
            <span style="font-size: 2.3vw">Last Donated Date : <?php echo date_format(date_create($user_details[0]['last_donated']),"d/m/Y"); ?></span>
        </div>
   </div>
</div>
<div style=" padding-bottom: 30vh; height: 100vh;" class="container-fluid overflow-auto p-b-v20 bg-white">
   <div onclick="fetch_page('donor_search')" class="row menu-option d-flex justify-content-center p-t-20">
      <div class="col-2 bg-white">
         <img style="width: 4rem;height: 4rem;" class="img-shadow_bg" src="images/home_finde_donor.png">
      </div>
      <div class="col-10 d-flex align-items-center">
         <span class="shadow-custom menu-btn" style="width:100%;display:flex;border-radius: 0 10px 10px 0 ">
         Find a Donor
         </span>
      </div>
   </div>
   <div onclick="fetch_page('donation_list')" class="row menu-option d-flex justify-content-center p-t-20">
      <div class="col-2 bg-white">
         <!--<span class="">-->
         <img style="width: 4rem;height: 4rem;" class="img-shadow_bg" src="images/home_need_blood.png">
         <!--</span>-->
      </div>
      <div class="col-10 d-flex align-items-center">
         <span class="shadow-custom menu-btn" style="width:100%;display:flex;border-radius: 0 10px 10px 0 ">
         Donation Needed
         </span>
      </div>
   </div>
   <div onclick="fetch_page('request')" class="row menu-option d-flex justify-content-center p-t-20">
      <div class="col-2 bg-white">
         <!--<span class="">-->
         <img style="width: 4rem;height: 4rem;" class="img-shadow_bg" src="images/home_request_for_blood.png">
         <!--</span>-->
      </div>
      <div class="col-10 d-flex align-items-center">
         <span class="shadow-custom menu-btn" style="width:100%;display:flex;border-radius: 0 10px 10px 0 ">
         Request for blood
         </span>
      </div>
   </div>
   <div onclick="fetch_page('manage_request')" class="row menu-option d-flex justify-content-center p-t-20">
      <div class="col-2 bg-white">
         <!--<span class="">-->
         <img style="width: 4rem;height: 4rem;" class="img-shadow_bg" src="images/home_manage_request.png">
         <!--</span>-->
      </div>
      <div class="col-10 d-flex align-items-center">
         <span class="shadow-custom menu-btn" style="width:100%;display:flex;border-radius: 0 10px 10px 0 ">
         Manage Your Request
         </span>
      </div>
   </div>
   <div onclick="fetch_page('about_us')" class="row menu-option d-flex justify-content-center p-t-20">
      <div class="col-2 bg-white">
         <!--<span class="">-->
         <img style="width: 4rem;height: 4rem;" class="img-shadow_bg" src="images/home_about_us.png">
         <!--</span>-->
      </div>
      <div class="col-10 d-flex align-items-center">
         <span class="shadow-custom menu-btn" style="width:100%;display:flex;border-radius: 0 10px 10px 0 ">
             About Us
         </span>
      </div>
   </div>
   <div onclick="fetch_page('contact_us')" class="row menu-option d-flex justify-content-center p-t-20">
      <div class="col-2 bg-white">
         <!--<span class="">-->
         <img style="width: 4rem;height: 4rem;" class="img-shadow_bg" src="images/home_contact_us.png">
         <!--</span>-->
      </div>
      <div class="col-10 d-flex align-items-center">
         <span class="shadow-custom menu-btn" style="width:100%;display:flex;border-radius: 0 10px 10px 0 ">
         Contact Us
         </span>
      </div>
   </div>
</div>
<script>
   function change_avaliablity(){
       
       var status = 0;
       
       if($("#avail").prop('checked') == true){
           status = 1;
       }
       else{
           status = 0;
       }
       
       var CONNECTION_DETAIL = checkConnection();
   
       var ONLINE_STATUS = window.localStorage.getItem("online_status");
   
       var LOGIN_USER = window.localStorage.getItem("user_id");
   
       if (ONLINE_STATUS != "online") {
           $("#app").load('pages/error_offline.html');
           return false;
       }
       if (CONNECTION_DETAIL == "No network connection") {
           $("#app").load("pages/error_interrupted_connection.html");
           return false;
       }
   
           $.ajax({
               url: URL_SITE,
               type: "POST",
               crossOrigin: true,
               data: {
                   "REQUEST_KIND": "ACCESS_VERIFICAION",
                   "VALIDATION_ACTION": "CHANGE_AVALILABILITY",
                   
                   "CURRENT_STATUS" : status,
                   "LOGIN_USER" : LOGIN_USER,
               },
               dataType: "JSON",
               success: function(msg) {
                   
                   
               },
           });
   
       
   }
</script>