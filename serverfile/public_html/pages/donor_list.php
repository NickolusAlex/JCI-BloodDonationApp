<?php 

$user_id = $_POST['LOGIN_USER'];
$condition = "";
$search = "";
if(isset($_POST['EXTRA_DATA']) && (!empty($_POST['EXTRA_DATA'])) ){

    if( isset($_POST['EXTRA_DATA']['blood_type']) && $_POST['EXTRA_DATA']['blood_type'] != "" ){
         $condition .= " AND U.blood_type = '". $_POST['EXTRA_DATA']['blood_type'] ."' ";
    }
    if( isset($_POST['EXTRA_DATA']['pincode']) && $_POST['EXTRA_DATA']['pincode'] != "" ){
         $condition .= " AND pincode LIKE '%". $_POST['EXTRA_DATA']['pincode'] ."%' ";
    }
    if( isset($_POST['EXTRA_DATA']['district']) && $_POST['EXTRA_DATA']['district'] != "" ){
         $condition .= " AND district LIKE '%". $_POST['EXTRA_DATA']['district'] ."%' ";
    }
    if( isset($_POST['EXTRA_DATA']['state']) && $_POST['EXTRA_DATA']['state'] != "" ){
         $condition .= " AND state LIKE '%". $_POST['EXTRA_DATA']['state'] ."%' ";
    }
}

 $user_details_sql = "SELECT *,( SELECT blood_name_short FROM blood_type WHERE blood_id = U.blood_type ) AS blood_name FROM user_creation U WHERE active_status = 1 AND availability = 1 " . $condition;
$prepare = $DB_conn->prepare($user_details_sql);
$exc = $prepare->execute();

$user_details = $prepare -> fetchAll();



?>


<link rel="stylesheet" href="css/donation_list.css">
<div class="sticky-top container-fluid h20">
    <div class="h-100 d-flex align-items-center">
        <i onclick="fetch_page('donor_search')" class="fas fa-chevron-left fa-1x"></i>
    </div>
</div>

<style>
  .container-fluid *{
       text-transform:capitalize; 
    }
    .w-40-px{
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
</style>
<div class="container-fluid p-bt-5">
    <span class="f-v7 fw-600"> Donor List</span>
</div>

<div class="container-fluid overflow-auto h-v100 p-b-v20 ">

    <?php 
    foreach($user_details as $values){
        ?>
    <div onclick="modal_toggle('donation_details_modal')" class="container-fluid list-request">
        <div class="p-10">
            <div class="row p-10 shadow shadow-4 b-rad-2">
                <div class="col-1">
                    <img src="images/b_<?php echo $values['blood_name']; ?>.png" class="w-40-px" alt="">
                </div>
                <div class="col">
                    <div class="container-fluid text-black-50 patient-name">
                        <?php echo $values['name']; ?>
                    </div>
                    <div class="container-fluid text-black patient-unit-distance">
                        <?php echo $values['district'].' '.$values['pincode']; ?> 
                    </div>
                </div>
                <div class="col-4 d-flex align-items-end">
                    <span onclick="call_option('<?php echo $values['phone_number']; ?>')" style="padding:5px;" class="text-white bg-danger">
                                        <i class="fas fa-phone fa-2x"></i>
                                    </span>
                </div>
            </div>
        </div>
    </div>
        
    <?php
    }
    ?>

</div>


