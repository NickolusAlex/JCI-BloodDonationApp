<?php 

$user_id = $_POST['LOGIN_USER'];

$request_details_sql = "SELECT *,( SELECT blood_name_short FROM blood_type WHERE blood_id = R.p_blood_type ) AS blood_name FROM request_table R WHERE request_status = 0 ORDER BY created_date DESC ";
$prepare = $DB_conn->prepare($request_details_sql);
$exc = $prepare->execute();

$request_details = $prepare -> fetchAll();



?>


<link rel="stylesheet" href="css/donation_list.css">
<div class="sticky-top container-fluid h20">
    <div class="h-100 d-flex align-items-center">
        <i onclick="fetch_page('home')" class="fas fa-chevron-left fa-1x"></i>
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
    .container-fluid * {
        text-transform: capitalize;
    }
</style>
<div class="container-fluid p-bt-5">
    <span class="f-v7 fw-600"> Donation Needed</span>
</div>

<div class="container-fluid overflow-auto h-v100 p-b-v20 ">

    <?php 
    foreach($request_details as $values){
        ?>
    <div onclick="modal_toggle('donation_details_modal_<?php echo $values['request_id']; ?>')" class="container-fluid list-request">
        <div class="p-10">
            <div class="row p-10 shadow shadow-4 b-rad-2">
                <div class="col-1">
                    <img src="images/b_<?php echo $values['blood_name']; ?>.png" class="w-40-px" alt="">
                </div>
                <div class="col">
                    <div class="container-fluid text-black-50 patient-name">
                        <?php echo $values['p_name']; ?>
                    </div>
                    <div class="container-fluid text-black patient-unit-distance">
                        <?php echo $values['blood_units']; ?> Unit.
                    </div>
                </div>
                <div class="col-4 d-flex align-items-end">
                    <span class="time-requested-ago text-black-50"><?php echo time_elapsed_string($values['created_date']); ?></span>
                </div>
            </div>
        </div>
    </div>
        
    <?php
    }
    ?>

</div>

<?php 
    foreach($request_details as $values){
        ?>
<!-- Modal -->
    <div class="modal fade" id="donation_details_modal_<?php echo $values['request_id']; ?>" tabindex="-1" aria-labelledby="donation_details_modal_<?php echo $values['request_id']; ?>"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content b-rad-4">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">
                                <img src="images/b_<?php echo $values['blood_name']; ?>.png" class="w-40-px" alt="">
                            </div>
                            <div class="col">
                                <table class="request_table">
                                    <tr>
                                        <th style="vertical-align:top">Patient Name</th>
                                        <td>:</td>
                                        <td><?php echo $values['p_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align:top">Blood Needed</th>
                                        <td>:</td>
                                        <td><?php echo $values['blood_units']; ?> Unit</td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align:top">Problem</th>
                                        <td>:</td>
                                        <td><?php echo $values['p_reason']; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align:top">Location</th>
                                        <td>:</td>
                                        <td><?php 
                                        echo ($values['p_hospital'] != '')? ($values['p_hospital']. ','): ("")  ;
                                        echo ($values['place'] != '')? ($values['place']. ','): ("")  ;
                                        echo $values['district'];
                                        ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div onclick="call_option('<?php echo $values['contact_number']; ?>')" class="call-option text-center ">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

        
    <?php 
    }
    ?>
