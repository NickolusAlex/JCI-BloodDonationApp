<link rel="stylesheet" href="css/donor_search.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.select2_cus4').select2();
});
</script>
<style>
.select2-selection__rendered {
    line-height: 35px !important;
}
.select2-container .select2-selection--single {
    height: 25px !important;
}
.select2-selection__arrow {
    height: 25px !important;
}
.select2-selection__rendered{
            background: #e9e9e9;
    }
/*select option {*/
/*    margin: 40px;*/
/*    background: #e9e9e9;*/
/*    color: #fff;*/
/*    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);*/
/*}*/
    .image-logo {
        top: 0;
        margin-top: -33.4414vh;
        width: 40vw;
        height: auto;
        margin-left: 29.5vw;
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

    .h-v60 {
        height: 60vh;
    }
      .container-fluid *{
       text-transform:capitalize; 
    }
</style>

<div style="padding-left: 0px;" class="sticky-top container-fluid">

    <div class="h-100 d-flex align-items-center sticky-top">
        <img src="images/layout-red.png" style="width: 101vw; height: 30vh;" alt="">

        <div onclick="fetch_page('home')" class="left-top">
            <i class="fas fa-chevron-left fa-1x"></i>
        </div>

    </div>
    <div class="h-100 d-flex align-items-center sticky-top">
        <img src="images/logo.png" class="image-logo" alt="">
    </div>


</div>
<div class="container-fluid overflow-auto h-v60 p-t-20">

    <div class="blood-type-head">
        <span>
            <i class="fas fa-tint text-danger fa-1x"></i>
        </span>
        <span style="font-weight: 500;">
            Blood Type
        </span>
    </div>




    <div class="row blood-type-list text-center d-flex align-items-center">
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="a_p">
                        A+
                    </label>
                    <input type="radio" name="blood_type" value='5' id="a_p" style="display: none;">
                </span>
            </span>
        </div>
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="a_n">
                        A-
                    </label>
                    <input type="radio" name="blood_type" value='6' id="a_n" style="display: none;">
                </span>
            </span>
        </div>
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="b_p">
                        B+
                    </label>
                    <input type="radio" name="blood_type" value='1' id="b_p" style="display: none;">
                </span>
            </span>
        </div>
        <div class="col-3 h50">
            <span class="shadow-custom cicle-white">
                <span class="inner-cicle red-border">
                    <label for="b_n">
                        B-
                    </label>
                    <input type="radio" name="blood_type" value='2' id="b_n" style="display: none;">
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
                        <input type="radio" name="blood_type" value='3' id="o_p" style="display: none;">
                    </span>
                </span>
            </div>
            <div class="col-3 h50">
                <span class="shadow-custom cicle-white">
                    <span class="inner-cicle red-border">
                        <label for="o_n">
                            O-
                        </label>
                        <input type="radio" name="blood_type" value='4' id="o_n" style="display: none;">
                    </span>
                </span>
            </div>
            <div class="col-3 h50">
                <span class="shadow-custom cicle-white">
                    <span class="inner-cicle blood-2 red-border">
                        <label for="ab_p">
                            AB+
                        </label>
                        <input type="radio" name="blood_type" value='7' id="ab_p" style="display: none;">
                    </span>
                </span>
            </div>
            <div class="col-3 h50">
                <span class="shadow-custom cicle-white">
                    <span class="inner-cicle blood-2 red-border">
                        <label for="ab_n">
                            AB-
                        </label>
                        <input type="radio" name="blood_type" value='8' id="ab_n" style="display: none;">
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
<div class="search-field">
        <select  class="select2_cus4" style="width:100%;height:90px;"  placeholder="State" style='background:#e9e9e9'; name="state" id="state" class="search-filed-input form-control">
            <option>Select State</option>
              <?php      $user_details_sql1 = "SELECT * FROM state_list";
   $prepare = $DB_conn->prepare($user_details_sql1);
   $exc = $prepare->execute();
   
   $user_details = $prepare -> fetchAll(); 
   foreach($user_details as $val){?>
   <option value='<?php echo $val['state']; ?>'><?php echo $val['state']; ?></option>
   <?php } ?>
                </select>
    </div>

    <div class="search-field">
        <select  class="select2_cus4" style="width:100%;height:90px;"  placeholder="District" style='background:#e9e9e9'; name="district" id="district" class="search-filed-input form-control">
            <option>Select District</option>
              <?php      $user_details_sql = "SELECT * FROM districts";
   $prepare = $DB_conn->prepare($user_details_sql);
   $exc = $prepare->execute();
   
   $user_details = $prepare -> fetchAll(); 
   foreach($user_details as $val){?>
   <option value='<?php echo $val['district_name']; ?>'><?php echo $val['district_name']; ?></option>
   <?php } ?>
                </select>
    </div>

    <div class="search-field">
        <input type="text" name="pincode" id="pincode" class="search-filed-input form-control" placeholder="Pincode">
    </div>

    <div class="search-field text-center">
        <button onclick="search_donor();" class="form-control btn btn-danger search-button">Search Donor <i class="fas fa-chevron-right"></i>
        </button>
    </div>

</div>




<script>

    $(document).ready(function () {


        $(".cicle-white").on("click", function () {
            $('input:radio').each(function () {
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

    function search_donor(){
        var blood_type = $("input[name='blood_type']:checked").val();
        var district = $("#district").val();
        var pincode = $("#pincode").val();
                var state = $("#state").val();

        var extra_data = {
            "blood_type" : blood_type,
            "district" : district,
            "pincode" : pincode,
            "state" : state,
        };
        
        fetch_page('donor_list', extra_data);
        
    }


</script>