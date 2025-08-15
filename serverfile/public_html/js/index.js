/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

// Wait for the deviceready event before using any of Cordova's device APIs.
// See https://cordova.apache.org/docs/en/latest/cordova/events/events.html#deviceready

// IP ADDRESS : 192.168.29.247

// var IP_SITE = "http://192.168.0.108:8080/design_corner_app/";

var IP_SITE = "https://dcapptest.000webhostapp.com/";

var URL_SITE = IP_SITE + "index.php";
// var URL_SITE = "http://192.168.29.247/design_corner_app/index.php";
// var URL_SITE = "http://localhost/design_corner_app/index.php";

var CURRENT_PAGE = "login";

function onOffline() {
    window.localStorage.setItem("online_status", "offline");
    // fetch_page(CURRENT_PAGE);
}
function onOnline() {
    window.localStorage.setItem("online_status", "online");
    // fetch_page(CURRENT_PAGE);    
}


document.addEventListener("deviceready", function () {
    
    screen.orientation.lock('portrait');
    
    // document.addEventListener("offline", onOffline, false);
    // document.addEventListener("online", onOnline, false);
    
    // var CONNECTION_DETAIL = checkConnection();
    
    // if (CONNECTION_DETAIL != "No network connection") {
        //     window.localStorage.setItem("online_status", "online");
    // }
    
    
    
    // var LOGIN_STATUS = window.localStorage.getItem("loggedIn");
    
    // var LOGIN_USER = window.localStorage.getItem("user_id");
    
    // console.log(navigator.notification);
    // var LAST_IP = window.localStorage.getItem("last_ip");
    // var CURRENT_IP = window.localStorage.getItem("current_ip");
    
    // alert("CONNECTION_DETAIL : " + CONNECTION_DETAIL);
    // alert("DEVICE_INFO : " + DEVICE_INFO);
    
    var CURRENT_PAGE = "login";
    
    // if (CURRENT_PAGE == "login") {
    //     if (LOGIN_STATUS == 1) {
    //         CURRENT_PAGE = "home";
    //         // window.localStorage.setItem("loggedIn", 1);
    //     } else if (LOGIN_STATUS != 1) {
    //         CURRENT_PAGE = "login";
    //     }
    // }

    load_page(CURRENT_PAGE);
    // fetch_page(CURRENT_PAGE);

    // cordovaDevice();
    
}, false);



function fetch_page(page_name, menu_tigger = 0) {

    // var CONNECTION_DETAIL = checkConnection();

    // var DEVICE_INFO = DeviceInfo();

    // var ONLINE_STATUS = window.localStorage.getItem("online_status");

    // var LOGIN_USER = window.localStorage.getItem("user_id");

    // if (ONLINE_STATUS != "online") {
    //     // $("#app").html("<div style='font-size: 20px'>Offline</div>");
    //     $("#app").load("pages/error_offline.html");
    //     return false;
    // }

    // if (CONNECTION_DETAIL == "No network connection") {
    //     // $("#app").html("<div style='font-size: 20px'>No Connection</div>");
    //     $("#app").load("pages/error_interrupted_connection.html");
    //     return false;
    // }


    $.ajax({
        url: URL_SITE,
        type: "POST",
        crossOrigin: true,
        data: {
            "REQUEST_KIND": "ACCESS_REQUEST",
            "page_name": "pages/" + page_name,
            "IP_SITE": IP_SITE,
            "DEVICE_INFO": DEVICE_INFO,
            "LOGIN_USER": LOGIN_USER,
        },
        beforeSend: function () {
            $("#app").html(' <div style="margin: 80% 0;" class="container"><div class="row"><div class="col-md-6"><img class="mx-auto d-block" width="60%" src="img/DC-light-logo.png"></div></div></div> ');
        },
        success: function (msg) {
            $("#app").html(msg);
            CURRENT_PAGE = page_name;
        },
        error: function (jqXHR, exception) {
            var msg = network_error(jqXHR, exception);
            $("#app").html(msg);
            // $("#app").html(' <div style="margin: 80% 0;" class="container"><div class="row"><div class="col-md-6"><img class="mx-auto d-block" width="60%" src="img/DC-light-logo.png"></div></div></div> ');
        },
    });
}



function network_error(jqXHR, exception) {
    var msg = "";
    if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
    } else if (jqXHR.status == 404) {
        msg = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
    } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg = 'Time out error.';
    } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
    } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
    }
    return msg;
}

function onDeviceReady() {
    // set to either landscape
    screen.orientation.lock('portrait');
}

function load_page(page_name, menu_tigger = 0) {
    // var menu_element = $('#menu_checkbox');
    // if (menu_element.length > 0 && menu_tigger == 0) {
    //     if (menu_element.prop("checked") == true) {
    //         $('#menu_checkbox').prop('checked', false);
    //         return false;
    //     }
    // }

    $("#app").load('pages/' + page_name + '.html');

    CURRENT_PAGE = page_name;
    return 0;
}

function checkConnection() {
    var networkState = navigator.connection.type;

    var states = {};
    states[Connection.UNKNOWN] = 'Unknown connection';
    states[Connection.ETHERNET] = 'Ethernet connection';
    states[Connection.WIFI] = 'WiFi connection';
    states[Connection.CELL_2G] = 'Cell 2G connection';
    states[Connection.CELL_3G] = 'Cell 3G connection';
    states[Connection.CELL_4G] = 'Cell 4G connection';
    states[Connection.CELL] = 'Cell generic connection';
    states[Connection.NONE] = 'No network connection';

    // alert('Connection type: ' + states[networkState]);
    return states[networkState];
}

function modal_toggle(modal_id) {
    $("#" + modal_id).modal("toggle");
}

function DeviceInfo() {
    device_info = {
        "cordova_version": device.cordova,
        "device_model": device.model,
        "device_platform": device.platform,
        "device_uuid": device.uuid,
        "device_version": device.version,
    };

    return device_info;

    /* alert("Cordova version: " + device.cordova + "\n" +
        "Device model: " + device.model + "\n" +
        "Device platform: " + device.platform + "\n" +
        "Device UUID: " + device.uuid + "\n" +
        "Device version: " + device.version); */
}

document.addEventListener("backbutton", onBackKeyDown, false);
function onBackKeyDown(e) {
    e.preventDefault();
    switch (CURRENT_PAGE) {
        case "login":
            navigator.app.exitApp();
            break;
        case "signup":
            fetch_page("login");
            break;
        case "home":
            fetch_page("login");
            break;
        case "order_status":
            fetch_page("home");
            break;
        case "place_order":
            fetch_page("home");
            break;
        case "bill":
            fetch_page("home");
            break;
        default:
            fetch_page("home");
            break;
    }

}

function call_option() {
    window.plugins.CallNumber.callNumber(onSuccess, onError, "7402148766", false);
}

function onSuccess(result) {
    console.log("Success:" + result);
}

function onError(result) {
    console.log("Error:" + result);
}


function logout() {

    var CONNECTION_DETAIL = checkConnection();

    var DEVICE_INFO = DeviceInfo();

    var ONLINE_STATUS = window.localStorage.getItem("online_status");

    var LOGIN_USER = window.localStorage.getItem("user_id");

    var CURRENT_IP = window.localStorage.getItem("current_ip");

    if (ONLINE_STATUS != "online") {
        $("#app").html("<div style='font-size: 20px'>Connection Failed</div>");
        return false;
    }
    if (CONNECTION_DETAIL == "No network connection") {
        $("#app").html("<div style='font-size: 20px'>Connection Failed</div>");
        return false;
    }

    swal({
        title: "Are you sure want to Log out ?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willLogout) => {

        if (willLogout) {

            $.ajax({
                url: URL_SITE,
                type: "POST",
                crossOrigin: true,
                data: {
                    "REQUEST_KIND": "ACCESS_VERIFICAION",
                    "VALIDATION_ACTION": "LOGOUT_USER",
                    "LOGIN_USER": LOGIN_USER,
                    "CURRENT_IP": CURRENT_IP,
                    "DEVICE_INFO": DEVICE_INFO,
                },
                dataType: "JSON",
                success: function (msg) {

                    if (msg.logged_out == 1) {

                        window.localStorage.setItem("user_id", 0);
                        window.localStorage.setItem("current_ip", 0);
                        window.localStorage.setItem("loggedIn", 0);
                        CURRENT_PAGE = "login";

                        fetch_page(CURRENT_PAGE);
                        window.location.reload();

                        // swal("Logged Out Successfull", {
                        //     buttons: false,
                        //     timer: 2000,
                        //     icon: "success",
                        // }).then(() => {
                        //     //   alert("asdf");
                        // });

                    } else {
                        swal("Log Out Failed", {
                            icon: "error",
                        });
                    }
                },
            });

        } else {
            swal("Glad You Stay with us");
        }
    });

}