<?php 

    $rand  = rand(1000, 9999);
    $d = new DateTime();
    $micro_time = $d->format("Hisv");
    $random_sc = $rand . $micro_time;

?>
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
  /*.container-fluid *{*/
  /*     text-transform:capitalize; */
  /*  }*/
    .bg-danger {
        background-color: #C20101 !important;
    }

    body {
        background-color: white !important;
    }

    .wrap-input1000 {
        position: relative;
        width: 100%;
        z-index: 1;
    }

    .input1000 {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 12px;
        line-height: 1.2;
        color: #333333;
        display: block;
        width: 100%;
        background: #fff;
        height: 46px;
        /* border-radius: 25px; */
        padding: 3px 30px 3px 66px;
        box-shadow: -3px 6px 7px -2px rgba(118, 112, 112, 0.75);
        -webkit-box-shadow: -3px 6px 7px -2px rgba(118, 112, 112, 0.75);
        -moz-box-shadow: -3px 6px 7px -2px rgba(118, 112, 112, 0.75);
    }


    .focus-input1000 {
        display: block;
        position: absolute;
        border-radius: 25px;
        bottom: 0;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        box-shadow: 0px 0px 0px 0px;
        color: rgba(234, 125, 0, 0.945);
    }

    .input1000:focus+.focus-input1000 {
        -webkit-animation: anim-shadow 0.5s ease-in-out forwards;
        animation: anim-shadow 0.5s ease-in-out forwards;
    }

    .symbol-input1000 {
        font-size: 15px;
        color: #f80000;

        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        position: absolute;
        border-radius: 25px;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding-left: 30px;
        pointer-events: none;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .input1000:focus+.focus-input1000+.symbol-input1000 {
        color: #fb7100;
        padding-left: 23px;
    }

    .login100-form-title {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 15px;
        color: #666666;
        line-height: 1.2;
        text-align: center;
        margin-bottom: 1vh;
        width: 100%;
        display: block;
    }

    .image-logo {
        top: 0;
        margin-top: -13.4414vh;
        /* font-size: 7vw; */
        margin-left: 37.5vw;
        /* padding: 10px 15px; */
        /* border-radius: 50%; */
        /* background-color: #666666; */
        color: white;
        width: 50vw;
        height: 20vh;
    }

    /* Centered text */
    .centered {
        position: absolute;
        top: 1vh;
        left: 15%;
        transform: translate(-6vw, 4vh);
        font-weight: 500;
        font-size: 5vw;
    }

    .left-top {
        position: absolute;
        color: rgb(255, 255, 255);
        top: 1vh;
        left: 15vw;
        transform: translate(-10vw, 0vh);
        font-weight: 500;
        font-size: 4vw;
    }

    .p-t-10 {
        padding-top: 10vh
    }

    .f-v6 {
        font-size: 7vw;
    }

    .fw-600 {
        font-weight: 600;
    }
    .h-50v{
        height: 75vh;
    }
</style>
<div style="padding-left: 0px; width: 100vw !important;" class="sticky-top container-fluid h20 bg-white ">
    <div style="width: 100vw !important;" class="h-100 d-flex align-items-center sticky-top">
        <img src="images/layout-red.png" style="width: 101vw; height: 25vh;" alt="">
        
        <input type="hidden" value="<?php echo $random_sc; ?>" name="random_sc" id="random_sc">
        
        <div class="centered text-white" style="text-transform:capitalize; ">
            Create Donor Profile
        </div>
        <div onclick="fetch_page('login')" class="left-top">
            <i class="fas fa-chevron-left fa-1x"></i>
        </div>
    </div>
    <div class="h-100 d-flex align-items-center sticky-top">
        <div class="image-logo">
            <!-- onclick="document.getElementById('profile_input').click();" -->
            <img  src="icons/p1.png" id="profile_img" style="width: 25vw; padding-top: 2vh;" alt="">
            <input id="profile_input" accept="image/*" name="profile_input" type="file" style="display:none;" />
            
            <!-- <i class="fas fa-user-plus"></i> -->
        </div>
    </div>


</div>

<div class="container-fluid  p-bt-5 text-center bg-white ">
    <span class="f-v7 fw-600" style="text-transform:capitalize; ">Fill the details</span>
</div>

<div style="width: 100%; padding-bottom: 30vh;"
    class="bg-white container-fluid overflow-auto h-50v p-b-v20 bg-white d-flex justify-content-center">

    <div style="width: 90%;">


        <div style="padding-top: 6vh;" class="login100-form validate-form bg-white ">

            <div class="wrap-input1000 m-b-30" data-validate="Name is required">
                <input class="input1000" type="text" name="user_name" id="user_name" placeholder="Name">
                <span class="focus-input1000"></span>
                <span class="symbol-input1000">
                    <i class="fa fa-user"></i>
                </span>
            </div>

            <div class="wrap-input1000 m-b-30" data-validate="Date is required">
                <input class="input1000 " type="text" onfocus="(this.type='date')" onfocusout="if(this.value==''){(this.type='text')}" name="date" id="date" placeholder="Date Of Birth">
                <span class="focus-input1000"></span>
                <span class="symbol-input1000">
                    <i class="fa fa-calendar-alt"></i>
                </span>
            </div>
            
            <div class="wrap-input1000 m-b-30" data-validate="Phone is required">
                <input class="input1000" pattern="[1-9]{1}[0-9]{9}"  maxlength="10" type="text" name="phone_number" id="phone_number" placeholder="Phone Number">
                <span class="focus-input1000"></span>
                <span class="symbol-input1000">
                    <i class="fa fa-phone"></i>
                </span>
            </div>
            
            <div class="wrap-input1000 m-b-30" data-validate="Email is required">
                <input class="input1000" type="email" name="user_email" id="user_email" placeholder="Email">
                <span class="focus-input1000"></span>
                <span class="symbol-input1000">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
            <div class="wrap-input1000 m-b-30" data-validate="Password is required">
                <input class="input1000" type="password" name="password" id="password" placeholder="Password">
                <span class="focus-input1000"></span> 
                <span class="symbol-input1000">
                    <i class="fa fa-key"></i>
                </span>
            </div>

            <div class="container-login100-form-btn p-t3 p-b-25">
                <button onclick="sign_step1(random_sc.value,user_name.value,phone_number.value,user_email.value,date.value,password.value)" class="login100-form-btn">
                    Next >
                </button>
            </div>

        </div>

    </div>

</div>e
<script>


 function sign_step1(random_sc,user_name,phone_number,user_email,date,password){
        
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
        
        
        var signup_form = new FormData();
        
        
        signup_form.append("REQUEST_KIND", "ACCESS_VERIFICAION");
        signup_form.append("VALIDATION_ACTION", "SIGNUP_USER");
        
        signup_form.append("name", user_name);
        signup_form.append("phone_number", phone_number);
        signup_form.append("user_email", user_email);
        signup_form.append("date", date);
        signup_form.append("random_no", random_sc);
        signup_form.append("password", password);
        
        var cordova = device.cordova;
        
        
        var model = device.model;
        var version = device.version;
        var uuid = device.uuid;
        var platform = device.platform;
        
        
        
        signup_form.append('cordova', cordova);
        signup_form.append('model', model);
        signup_form.append('platform', platform);
        signup_form.append('uuid', uuid);
        signup_form.append('version', version);
        
        var profile_img = [];
        if($("#profile_input").length > 0){
            signup_form.append('profile_img', $("#profile_input")[0].files[0]);
        }else{
            signup_form.append('profile_img', profile_img);
        }
        
        if (user_name != "" && phone_number != "" && password!="" && user_email!="") {

            $.ajax({
                url: URL_SITE,
                type: "POST",
                crossOrigin: true,
                contentType: false,
                cache: false,
                processData: false,
                data: signup_form,
                dataType: "JSON",
                success: function(msg) {
                    
                        if (msg.status_code == "REPEATED CONTACT") {
                                alert("You are already registered with this mobile number please login");
                        }
                        else if (msg.status_code == "SUCCESS") {
                            window.localStorage.setItem("random_no", random_sc);
                            fetch_page('signup_donor');
                        }  else {
                            alert(msg.status_code);
                        }
                    
                },
            });

        } else {
            alert("Fill Name/Phone Number/Password/Email");
        }
 
 }
</script>