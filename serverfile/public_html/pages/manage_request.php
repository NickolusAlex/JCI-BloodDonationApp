<?php 

$user_id = $_POST['LOGIN_USER'];

$request_details_sql = "SELECT *,( SELECT blood_name_short FROM blood_type WHERE blood_id = R.p_blood_type ) AS blood_name FROM request_table R WHERE requested_by = '$user_id' ORDER BY created_date DESC ";
$prepare = $DB_conn->prepare($request_details_sql);
$exc = $prepare->execute();

$request_details = $prepare -> fetchAll();



?>

<link rel="stylesheet" href="css/manage_request.css">
<style>
    .w-40-px {
        width: 40px;
    }

    ul {
        height: 2rem;
        width: 100%;
    }

    li {

        width: 40px;
        display: inline;
    }

    .call-list {
        height: 20px;
        padding: 5px;
        border-radius: 5px;
    }

    .call-option {
        padding-top: 20px;
    }

    .call-btn {
        color: white;
        padding: 10px 30px;
        /* padding-left: 30px;
        padding-right: 30px; */
        /* padding-top: 10px;
        padding-bottom:10px; */
    }

    .call-circle {

        border: 3px white solid;
        border-radius: 50%;
        height: 30px;
        padding: 10px;
        width: 30px;
        margin-left: -15px;
    }

    .call-circle i {
        /* width: 20px; */
        font-size: 18px;
        color: white;
    }

    table tr td {
        font-weight: 800 !important;
    }

    table th {
        font-weight: 200 !important;
    }

    .modal-content {
        -webkit-border-radius: 5px !important;
        -moz-border-radius: 5px !important;
        border-radius: 5px !important;
    }
    .request-status{
        color: #C20101;
    }
    .btn-danger{
        background-color: #C20101 !important;
        color: white;
    }
      .container-fluid *{
       text-transform:capitalize; 
    }
</style>

<div class="sticky-top container-fluid h20">
    <div class="h-100 d-flex align-items-center">
        <i onclick="fetch_page('home')" class="fas fa-chevron-left fa-1x"></i>
    </div>
</div>


<div class="container-fluid p-bt-5">
    <span class="f-v7 fw-600">Manage Request</span>
</div>

<div class="container-fluid overflow-auto h-v100 p-b-v20 ">
    
    <?php 
    foreach($request_details as $value){
        ?>
        
    <div class="list-request">
        <div class="container-fluid shadow shadow-4 b-rad-2 ">
            <div class="p-10">
                <div class="row p-10 ">
                    <div class="col">
                        <div class="container-fluid text-black-50 patient-name ">
                            <?php echo $value['p_name']; ?>
                        </div>
                        <div class="container-fluid text-black patient-unit-distance">
                            <?php echo $value['blood_units']; ?> Unit . <span class="patient-hospital"><?php echo $value['p_hospital'].$value['request_status'] ; ?></span>
                        </div>
                        <div class="container-fluid p-t-20">
                            <span onclick="modal_toggle('manage_request_modal_<?php echo $value['request_id']; ?>')" class="more-details">
                                More Details >>
                            </span>
                        </div>
                    </div>
                    <div class="col-4 request-status d-flex align-items-center justify-content-center ">
                <?php 
                if($value['request_status'] == 1){
                    ?>
                        <i class="far fa-check-circle fa-3x"></i>
                    <?php 
                }
                if($value['request_status'] == 0){
                    ?>
                    <i class="fas fa-exclamation-triangle fa-3x"></i>
                    <?php 
                }
                ?>

                    </div>
                </div>
                
                <?php 
                if($value['request_status'] == 0){
                ?>
                
                <div class="row question-span">
                    <div class="col-12">
                        <div>
                            Did you get blood?
                        </div>
                    </div>
                </div>
                <input type="hidden" name="request_id" id="request_id" value="<?php echo $value['request_id']; ?>">
                <div class="p-10 row">
                    <div class="col-3 h50">
                        <span class="shadow-custom cicle-white">
                            <span class="inner-cicle yes-pad red-border">
                                <label for="yes_<?php echo $value['request_id']; ?>">
                                    Yes
                                </label>
                                <input type="radio"  value='1' name="blood_response_<?php echo $value['request_id']; ?>" id="yes_<?php echo $value['request_id']; ?>" style="display: none;">
                            </span>
                        </span>
                    </div>
                    <div class="col-3 h50">
                        <span class="shadow-custom cicle-white">
                            <span class="inner-cicle red-border">
                                <label for="no_<?php echo $value['request_id']; ?>">
                                    No
                                </label>
                                <input type="radio" value='0' name="blood_response_<?php echo $value['request_id']; ?>" id="no_<?php echo $value['request_id']; ?>" style="display: none;">
                            </span>
                        </span>
                    </div>
                </div>

                    
                <?php 
                    }
                ?>
                

            </div>
        </div>
    </div>
    
        <?php 
        
    }
    ?>



</div>

<div class="fixed-bottom text-right">
    <div class="p-r-20">
        <button onclick="update_manage_request();" class="done-button btn btn-danger ">Done</button>
    </div>
</div>


    <?php 
    foreach($request_details as $value){
        ?>

        <div class="modal fade" id="manage_request_modal_<?php echo $value['request_id']; ?>" tabindex="-1" aria-labelledby="manage_request_modal"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content b-rad-4">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-2">
                                    <img src="images/b_<?php echo $value['blood_name']; ?>.png" class="w-40-px" alt="">
                                </div>
                                <div class="col">
                                    <table class="request_table">
                                        <tr>
                                            <th style="vertical-align:top">Patient Name</th>
                                            <td>:</td>
                                            <td><?php echo $value['p_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top">Blood Needed</th>
                                            <td>:</td>
                                            <td><?php echo $value['blood_units']; ?> Unit</td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top">Problem</th>
                                            <td>:</td>
                                            <td><?php echo $value['p_reason']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top">Location</th>
                                            <td>:</td>
                                            <td><?php 
                                                echo ($value['p_hospital'] != '')? ($value['p_hospital']. ','): ("")  ;
                                                echo ($value['place'] != '')? ($value['place']. ','): ("")  ;
                                                echo $value['district'];
                                        ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
        
                <?php 
                if($value['request_status'] == 0){
                ?>

                            <div class="call-option text-center ">
                                <ul>
                                    <li class="bg-danger call-list shadow">
                                        <span class="call-btn">
                                            More Details
                                        </span>
                                    </li>
                                    <li class="shadow">
                                        <span class="call-circle bg-danger">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                <?php } ?>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        
                
        <?php } ?>




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

function update_manage_request(){
    var request_array = [];
    
    $('.list-request').each(function(){
       var response = 0;  
       if ($(this).find('input[type=radio]').prop("checked")) {
            response   = $(this).find('input[type=radio]').val(); 
        }else{
            response = 0;
        }
       
       var request_id = $(this).find('input[name="request_id"]').val();
       var temp = [request_id, response];
      request_array.push(temp);
       
    });
    
                $.ajax({
                url: URL_SITE,
                type: "POST",
                crossOrigin: true,
                data: {
                    "REQUEST_KIND": "ACCESS_VERIFICAION",
                    "VALIDATION_ACTION": "MANAGE_REQUEST",
                    "request_array" : request_array,
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

    
    
}


</script>