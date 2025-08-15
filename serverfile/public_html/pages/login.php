<link rel="stylesheet" href="css/util.css">
<link rel="stylesheet" href="css/main.css">
<style>
    @media only screen and (min-width: 370px) {
        .layout-div {
            margin-top: -0.7vh;
        }
    }

    .layout-div {
        padding-left: 0px;
        margin-top: 5px;
    }

    .curve-main {
        height: 200px;
    }

    .h-v100 {
        height: 100vh;
    }

    .p-b-v10 {
        padding-bottom: 10vh;
    }

    .p-bt-5 {
        padding-bottom: 2vh;
    }

    .p-t-5 {
        padding-top: 5vh;
    }

    .image-logo {
        top: 0;
        margin-top: -33.4414vh;
        width: 40vw;
        height: auto;
        margin-left: 30.5vw;
    }
      .container-fluid *{
       text-transform:capitalize; 
    }
</style>

<div style="padding-left: 0px;" class="sticky-top container-fluid h20 bg-white">

    <div style="width: 100vw;" class="h-100 d-flex align-items-center sticky-top">
        <img src="images/layout-red.png" style="width: 101vw; height: 30vh;" alt="">
    </div>
    <div class="h-100 d-flex align-items-center sticky-top">
        <img src="images/logo.png" class="image-logo" alt="">
    </div>


</div>

<div class="container-fluid text-center p-bt-5 p-t-5 bg-white">
    <span class="f-v7 fw-600">Login to your account</span>
</div>

<div style="width: 100%; padding-bottom: 50vh;" class="container-fluid overflow-auto h-v100 p-b-v20 bg-white">
    <div style="width: 90%; padding-left: 5%; margin-top: 30px " class="bg-white ">
        
            <div class="wrap-input100 validate-input m-b-30 " data-validate="Phone Number is required">
                <input class="input100" type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" pattern="[1-9]{1}[0-9]{9}"  maxlength="10">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <div class="container">
                        <span class="fas fa-stack fa-2x " style="margin-left: -53px; text-shadow: 1px 6px 5px 1px;">
                            <i class="fas fa-user fa-stack-1x circle" style="color: #ed1b24;font-size: 19px;"></i>
                        </span>
                    </div>
                </span>
            </div>

            <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                <input style="text-transform: none !important; " class="input100" type="password" name="password" id="password" placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <div class="container">
                        <span class="fas fa-stack fa-2x " style="margin-left: -53px;box-shadow: 0px 0px 0px 0px;">
                            <i class="fas fa-lock fa-stack-1x circle" style="color: #ed1b24;font-size: 19px;"></i>
                        </span>
                    </div>
                </span>
            </div>
            <div class=" p-b-14 p-l-152">
                <a href="#" onclick="modal_toggle('forget_password');" class="txt1">
                    Forgot Password?
                </a>
            </div>
            <div class="container-login100-form-btn p-t3 p-b-25">
                <button onclick="verify_user()" class="login100-form-btn">
                    Login
                </button>
            </div>
            <div class="text-center w-full">
                <span style="color:gray;"> Don't have an account? </span>
                <a class="txt1" style="font-weight:bold;" href="#" onclick="fetch_page('signup')">
                   Sign up here
                    <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
<!-- Modal -->
    <div class="modal fade" id="forget_password" tabindex="-1" aria-labelledby="forget_password"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content b-rad-4">
                <div class="modal-header">
                    <!--<h5 class="madal-title">Enter Your Mail</h5>-->
                </div>
                <div class="modal-body">
                    <input type="email" class="form-control" name="emai" placeholder="Enter Your Email" id="emai">
                    <br>
                    <div class="container-login100-form-btn p-t3 p-b-25">
                        <button onclick="f_pass()" class="login100-form-btn">
                            Submit
                        </button>
                  </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="fixed-bottom text-center">
    <div class="" style="padding-bottom: 30px">
        <img src="images/login_bottom.png" style="width:80vw" alt="">
    </div>
</div>

    

    
<script>



    function verify_user() {

        var phonenumber = $("#phonenumber").val();
        var password    = $("#password").val();

        var cordova = device.cordova;
        var model = device.model;
        var platform = device.platform;
        var uuid = device.uuid;
        var version = device.version;

        if (phonenumber != "" && password != "") {

            $.ajax({
                url: URL_SITE,
                type: "POST",
                crossOrigin: true,
                data: {
                    "REQUEST_KIND": "ACCESS_VERIFICAION",
                    "VALIDATION_ACTION": "LOGIN_VERIFICAION",

                    "phonenumber": phonenumber,
                    "password": password,

                    "cordova": cordova,
                    "model": model,
                    "platform": platform,
                    "uuid": uuid,
                    "version": version,
                },
                dataType: "JSON",
                success: function(msg) {
                    if (msg.status == "USER VALID") {
                        window.localStorage.setItem("user_id", msg.user_id);
                        window.localStorage.setItem("current_ip", msg.current_ip);
                        window.localStorage.setItem("loggedIn", 1);

                        fetch_page('home');
                    } else {
                        alert(msg.status);
                    }
                },
            });
        }
        else{
            alert("Please Enter Phone Number and Password");
        }
    }
    
    
    
    function f_pass() {

        var email = $("#emai").val();
        
        if (email != "") {

            $.ajax({
                url: URL_SITE,
                type: "POST",
                crossOrigin: true,
                data: {
                    "REQUEST_KIND": "ACCESS_VERIFICAION",
                    "VALIDATION_ACTION": "FORGET_PASSWORD",
                    "EMAIL" : email
                },
                dataType: "JSON",
                success: function(msg) {
                        alert("We Will Send Your Password");
                        modal_toggle('forget_password');
                },
            });
        }
    }
    
</script>