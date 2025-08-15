<link rel="stylesheet" href="css/signup_donor.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<style>
    
      .container-fluid *{
       text-transform:capitalize; 
    }
    .select2-selection__rendered{
            background: #dadada;
            border: none;
    }
    .select2-selection__rendered {
    line-height: 25px !important;
}
.select2-container .select2-selection--single {
    height: 25px !important;
}
.select2-selection__arrow {
    height: 25px !important;
}
.select2-container--default .select2-selection--single {
    
    border: none;
    border-radius: 6px;
}

</style>
<script>
$(document).ready(function() {
    $('.select2_cus41').select2();
});
</script>

<div class="sticky-top container-fluid h20 bg-white" style="padding-left: 0px; width: 100vw !important;">
    <div style="width: 100vw !important;" class="h-100 d-flex align-items-center sticky-top">
        <img src="icons/c-2.png " style="width: 101vw; height: 40vh;" alt="">

        <div class="centered text-white">
            Become a Blood Donor
            <div style="font-size: 3vw; font-weight: normal;">
                Fill the below details accurately to help you better
            </div>
        </div>
        <div onclick="fetch_page('login')" class="left-top">
            <i class="fas fa-chevron-left fa-1x"></i>
        </div>
    </div>
</div>
<!--<input type="hidden" value="<?php echo $_GET['random_no'] ?>" name="random_no" id="random_no">-->
<div class="container-fluid overflow-auto h-v50 p-b-v20 ">
    <div class="row blood-type-list text-center d-flex align-items-center">
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="a_p">
                        A+
                    </label>
                    <input type="radio" name="blood_type" id="a_p" value="5" style="display: none;">
                </span>
            </span>
        </div>
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="a_n">
                        A-
                    </label>
                    <input type="radio" name="blood_type" id="a_n" value="6" style="display: none;">
                </span>
            </span>
        </div>
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="b_p">
                        B+
                    </label>
                    <input type="radio" name="blood_type" id="b_p" value="1" style="display: none;">
                </span>
            </span>
        </div>
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="b_n">
                        B-
                    </label>
                    <input type="radio" name="blood_type" id="b_n" value="2" style="display: none;">
                </span>
            </span>
        </div>
    </div>


    <div class="blood-list-hidden">
        <div class="row blood-type-list text-center d-flex align-items-center">
            <div class="col-3 h50">
                <span class="shadow-custom cicle-white">
                    <span class="inner-cicle red-border">
                        <label for="o_p">
                            O+
                        </label>
                        <input type="radio" name="blood_type" id="o_p" value="3" style="display: none;">
                    </span>
                </span>
            </div>
            <div class="col-3 h50">
                <span class="shadow-custom cicle-white">
                    <span class="inner-cicle red-border">
                        <label for="o_n">
                            O-
                        </label>
                        <input type="radio" name="blood_type" id="o_n" value="4" style="display: none;">
                    </span>
                </span>
            </div>
            <div class="col-3 h50">
                <span class="shadow-custom cicle-white">
                    <span class="inner-cicle blood-2 red-border">
                        <label for="ab_p">
                            AB+
                        </label>
                        <input type="radio" name="blood_type" id="ab_p" value="7" style="display: none;">
                    </span>
                </span>
            </div>
            <div class="col-3 h50">
                <span class="shadow-custom cicle-white">
                    <span class="inner-cicle blood-2 red-border">
                        <label for="ab_n">
                            AB-
                        </label>
                        <input type="radio" name="blood_type" id="ab_n" value="8" style="display: none;">
                    </span>
                </span>
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-end ">
        <span onclick="toggle_blood_type()" class="more-details">
            More Details >>
        </span>
    </div>

    <div class="container blood-type-head">
        <span>
            <i class="fas fa-tint text-danger fa-1x"></i>
            <!-- <i class="fas fa-home text-danger fa-1x"></i> -->
        </span>
        <span style="font-weight: 500;">
            How Often would you like to donate ?
        </span>
    </div>

    <div class="container periodic">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-3 period-type text-center d-flex align-items-center">
                <div class="period-border">
                    <label for="m_3">
                        3 Months
                    </label>
                    <input type="radio" name="periodic_time" value="3" id="m_3" style="display: none;">
                </div>
            </div>
            <div class="col-3 period-type text-center">
                <div class="period-border">
                    <label for="m_4">
                        4 Months
                    </label>
                    <input type="radio" name="periodic_time" value="4" id="m_4" style="display: none;">
                </div>
            </div>
            <div class="col-3 period-type text-center">
                <div class="period-border">
                    <label for="m_5">
                        5 Months
                    </label>
                    <input type="radio" name="periodic_time" value="5" id="m_5" style="display: none;">
                </div>
            </div>
            <div class="col-3 period-type text-center">
                <div class="period-border">
                    <label for="m_6">
                        6 Months
                    </label>
                    <input type="radio" name="periodic_time" value="6" id="m_6" style="display: none;">
                </div>
            </div>
        </div>
    </div>

    <div class="container p-t-20 blood-type-head">
        <span>
            <!-- <i class="fas fa-tint text-danger fa-1x"></i> -->
            <i class="fas fa-home text-danger fa-1x"></i>
        </span>
        <span style="font-weight: 500;">
            Location
        </span>
    </div>

    <div class="container input-field">
        <div class="row">
            <div class="col-12">
                <input type="text" name="address" id="address" placeholder="Address" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="text" name="area" id="area" placeholder="Area" class="form-control">
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <select name="district"  id="district"  placeholder="District" class="form-control select2_cus41">
                    <option>Select District</option>
                    <?php      
                    $user_details_sql = "SELECT * FROM districts";
                    $prepare = $DB_conn->prepare($user_details_sql);
                    $exc = $prepare->execute();
                    
                    $user_details = $prepare -> fetchAll(); 
                    foreach($user_details as $val){?>
                        <option value='<?php echo $val['district_name']; ?>'><?php echo $val['district_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="text" name="pincode" id="pincode" placeholder="Pincode" class="form-control">
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                
                <select name="state" id="state" placeholder="State" class="form-control select2_cus41">
                    
                    <option>Select State</option>
                    <?php      
                        $user_details_sql1 = "SELECT * FROM state_list";
                        $prepare = $DB_conn->prepare($user_details_sql1);
                        $exc = $prepare->execute();
                        
                        $user_details = $prepare -> fetchAll(); 
                        foreach($user_details as $val){?>
                            <option value='<?php echo $val['state']; ?>'><?php echo $val['state']; ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="container-fluid p-t-20 d-flex justify-content-center ">
        <button onclick="signup_donor2();" class="btn btn-danger register-btn">Register</button>
    </div>
</div>

<script>
 function signup_donor2(){
        var CONNECTION_DETAIL = checkConnection();

        var random_no = window.localStorage.getItem("random_no");

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
        var cordova = device.cordova;
        var model = device.model;
        var platform = device.platform;
        var uuid = device.uuid;
        var version = device.version;
        
        // var random_no = $("#random_no").val();
        var address = $("#address").val();
        var area = $("#area").val();
        var district = $("#district").val();
        var state = $("#state").val();
        var pincode = $("#pincode").val();
        
        var blood_type = $("input[name='blood_type']:checked").val(); 
        
        var offten_time = $("input[name='periodic_time']:checked").val(); 
    


     if (blood_type != undefined && district != "") {

            $.ajax({
                url: URL_SITE,
                type: "POST",
                crossOrigin: true,
                data: {
                    "REQUEST_KIND": "ACCESS_VERIFICAION",
                    "VALIDATION_ACTION": "SIGNUP_DONOR",
                    "random_no": random_no,
                    "address": address,
                    "area": area,
                    "district": district,
                    "state": state,
                    "pincode": pincode,
                    "blood_type": blood_type,
                    "offten_time": offten_time,
                    "cordova": cordova,
                    "model": model,
                    "platform": platform,
                    "uuid": uuid,
                    "version": version,
                },
                dataType: "JSON",
                success: function(msg) {
                        if (msg.status_code == "SUCCESS") {
                            
                            window.localStorage.setItem("loggedIn", 1);
                            window.localStorage.setItem("user_id", msg.user_id);
                            window.localStorage.setItem("random_no", random_no);
                            
                            fetch_page('home');
                            
                        }  else {
                            alert(msg.status_code);
                        }
                    
                },
            });

        } else {
            alert("Fill Blood Grp/District");
        }
 
 }
    $(document).ready(function () {

        $(".period-type").on("click", function () {

            $('input[name="periodic_time"]').each(function () {
                if ($(this).is(':checked')) {
                    $(this).parent().css({
                        "border": "solid #ff0000 1px",
                        "color": "white",
                        "background-color": "red",
                    });
                } else {
                    $(this).parent().css({
                        "border": "solid #666666 1px",
                        "color": "#666666",
                        "background-color": "white",
                    });
                }
            });

        });


        $(".cicle-white").on("click", function () {
            $('input[name="blood_type"]').each(function () {
                if ($(this).is(':checked')) {
                    $(this).parent().css({
                        "border": "solid #ff0000 1px",
                        "color": "white",
                        "background-color": "red",
                    });
                } else {
                    $(this).parent().css({
                        "border": "solid #ff0000 1px",
                        "color": "#ff0000",
                        "background-color": "white",
                    });
                }
            });
        });
    });

    function toggle_blood_type() {
        $(".blood-list-hidden").toggle("slow");
    }


</script>