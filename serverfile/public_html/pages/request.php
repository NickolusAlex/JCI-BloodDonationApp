<?php 

    $rand  = rand(1000, 9999);
    $d = new DateTime();
    $micro_time = $d->format("Hisv");
    $random_sc = $rand . $micro_time;

?>
<style>
    .h-v100 {
        height: 100vh;
    }

    .p-b-v20 {
        padding-bottom: 20vh;
    }

    .icon {
        width: 15px;
    }

    .custom-shape-divider-top-1630635629 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
    }

    .custom-shape-divider-top-1630635629 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 150px;
    }

    .custom-shape-divider-top-1630635629 .shape-fill {
        fill: #C20101;
    }
  .container-fluid *{
       text-transform:capitalize; 
    }
    /** For mobile devices **/
    @media (max-width: 767px) {
        .custom-shape-divider-top-1630635629 svg {
            width: calc(100% + 1.3px);
            height: 167px;
        }
    }

    .full-container {
        /* margin-right: -6%; */
        border: 0px solid black;
    }

    .container-login100-form-btn {
        width: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        padding: 30px 0;
        justify-content: center;
    }



    .semicircle {
        padding-top: 45%;
    }

    .inner-container {
        margin: 1px;
        border: 0px solid;
        /* padding: 10px; */
        -webkit-box-shadow: 0 0 10px rgb(119, 118, 118);
        box-shadow: 0 0 10px rgb(119, 118, 118);
        border-radius: 30px;
    }

    .fist {
        padding-top: 20px;
    }

    .login100-form-btn {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 15px;
        line-height: 1.5;
        color: #e0e0e0;

        width: 58%;
        height: 42px;
        border-radius: 25px;
        background: #ed1b24;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 25px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;

        position: relative;
        z-index: 1;
    }

    .login100-form-btn::before {
        content: "";
        display: block;
        position: absolute;
        z-index: -1;
        width: 100%;
        height: 100%;
        border-radius: 25px;
        top: 0;
        left: 0;
        background: #ea4200;
        background: -webkit-linear-gradient(left, #ea4200, #fb7100);
        background: -o-linear-gradient(left, #ea4200, #fb7100);
        background: -moz-linear-gradient(left, #ea4200, #fb7100);
        background: linear-gradient(left, #ea4200, #fb7100);
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
        opacity: 0;
    }

    .login100-form-btn:hover {
        background: transparent;
        color: #fff;
    }

    .login100-form-btn:hover:before {
        opacity: 1;
    }

    .input-field-list {
        margin-bottom: 0px;
        border-bottom: 1px rgb(184, 184, 184) solid;
    }

    .input-field {
        border: none;
    }

    /* Centered text */
    .centered {
        position: absolute;
        top: 3vh;
        left: 11%;

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
    .h-v70{
        height: 70vh;
    }
</style>

<div class="sticky-top container-fluid h20 bg-white" style="padding-left: 0px; width: 100vw !important;">
    <div style="width: 100vw !important;" class="h-100 d-flex align-items-center sticky-top">
        <img src="images/layout-red.png " style="width: 101vw; height: 30vh;" alt="">

        <div class="centered text-white">
            Request for Blood   
            <div style="font-size: 3vw; font-weight: normal;">
                Fill the below details accurately to help you better
            </div>
        </div>
        <div onclick="fetch_page('home')" class="left-top">
            <i class="fas fa-chevron-left fa-1x"></i>
        </div>
    </div>
</div>

<div class="container-fluid overflow-auto h-v70 p-b-v20 ">
    <div class=" container-fluid full-container">
        <div class=" container inner-container">
            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/u-1.png">
                    </div>
                    <input type="hidden" value="<?php echo $random_sc; ?>" name="random_no" id="random_no">

                    <div class="col">
                        <input placeholder="Patient Name" name="patient_name" id="patient_name" class="form-control input-field" type="text">
                    </div>
                </div>
            </div>


            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/p.png">
                    </div>
                    <div class="col">
                        <input placeholder="Hospital" class="form-control input-field" name="hospital" id="hospital" type="text">
                    </div>
                </div>
            </div>

            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/i-2.png">
                    </div>
                    <div class="col">
                        <input placeholder="Reason" class="form-control input-field" name="reason" id="reason" type="text">
                    </div>
                </div>
            </div>

            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/b.png">
                    </div>
                    <div class="col">
                        <select class="form-control input-field" id="blood_group" name="blood_group">
                            <option value="">Select Blood Group</option>
                            <?php 
                            $SQL = "SELECT * FROM blood_type";
                            $prepare = $DB_conn -> prepare($SQL);
                            $exc = $prepare->execute();
                            $blood_details = $prepare->fetchAll();
                            foreach($blood_details as $detail){
                                ?>
                                <option value='<?php echo $detail['blood_id']; ?>'><?php echo $detail['blood_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <!--<input placeholder="Blood Group" class="form-control input-field" name="blood_group" id="blood_group" type="text">-->
                    </div>
                </div>
            </div>

            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/i-3.png">
                    </div>
                    <div class="col">
                        <input placeholder="No of Units" class="form-control input-field" name="no_off_units" id="no_off_units" type="number">
                    </div>
                </div>
            </div>
            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/u-1.png">
                    </div>
                    <div class="col">
                        <input placeholder="Contact Person" class="form-control input-field" name="contact_per" id="contact_per" type="text">
                    </div>
                </div>
            </div>
            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/i-4.png">
                    </div>
                    <div class="col">
                        <input placeholder="Contact Number" class="form-control input-field" name="contact_no" id="contact_no" type="text" pattern="[1-9]{1}[0-9]{9}"  maxlength="10">
                    </div>
                </div>
            </div>
            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/i-8.png">
                    </div>
                    <div class="col">
                        <input placeholder="Place" class="form-control input-field" name="place" id="place" type="text">
                    </div>
                </div>
            </div>
            <div class="container input-icons fist">
                <div class="row input-field-list">
                    <div class="col-1 d-flex align-items-center">
                        <img class="icon" src="icons/i-5.png">
                    </div>
                    <div class="col">
                        <input placeholder="District" class="form-control input-field" name="district" id="district" type="text">
                    </div>
                </div>
            </div>

            <div class=" container-login100-form-btn p-t3 p-b-25">
                <button id="request_button" onclick="request_send()" class="login100-form-btn">
                    Request Now >
                </button>
            </div>
        </div>
    </div>
    </div>
    <script>
     function request_send(){
         
       var CONNECTION_DETAIL = checkConnection();

        // <!--var random_no = window.localStorage.getItem("random_no");-->

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
        
        var patient_name = $("#patient_name").val();
        var hospital = $("#hospital").val();
        var reason = $("#reason").val();
        var blood_group = $("#blood_group").val();
        var no_off_units = $("#no_off_units").val();
        var contact_per = $("#contact_per").val();
        var contact_no = $("#contact_no").val();
        var place = $("#place").val();
        var district = $("#district").val();
        var random_no = $("#random_no").val();
       
     if (blood_group != "" && hospital != "" && contact_no!='' && district!='') {

            $.ajax({
                url: URL_SITE,
                type: "POST",
                crossOrigin: true,
                beforesend: function(){
                    $("#request_button").val();
                },
                data: {
                    "REQUEST_KIND": "ACCESS_VERIFICAION",
                    "VALIDATION_ACTION": "REQUEST_INSERT",
                    
                    "random_no": random_no,
                    "patient_name": patient_name,
                    "hospital": hospital,
                    "reason": reason,
                    "blood_group": blood_group,
                    "no_off_units": no_off_units,
                    "contact_per": contact_per,
                    "contact_no": contact_no,
                    "place": place,
                    "district": district,
                    "user_id":LOGIN_USER,
                },
                dataType: "JSON",
                success: function(msg) {
                    
                    if (msg.status_code == "SUCCESS") {
                            fetch_page('home');
                    }   else {
                            alert(msg.status_code);
                        }
                    
                },
            });

        } else {
            alert("Fill Blood Grp/Hospital/Contact number/District");
        }
 
 }
 </script>
