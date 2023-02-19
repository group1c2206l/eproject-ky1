<?php
    require "../request.php";
    require "../classlist.php";
    if(isset($_GET["delete_id"])) {
        $delete_id = $_GET["delete_id"];
    }
    if(isset($_COOKIE["delete"])) {
        $confirm = $_COOKIE["delete"];
    }
    
    switch($delete_id) {
        case "branch":
            $p = new branch;
            $p->branch_id = $_GET["branch_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=branch");
            } else {
                header("location: dashboard.php?select=branch");
            }
            break;
        case "employee":
            $p = new employee;
            $p->employee_id = $_GET["employee_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=employee");
            } else {
                header("location: dashboard.php?select=employee");
            }
            break;
        case "utilities":
            $p = new utilities;
            $p->utilities_id = $_GET["utilities_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=utilities");
            } else {
                header("location: dashboard.php?select=utilities");
            }
            break;
        case "device":
            $p = new device;
            $p->device_id = $_GET["device_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=device");
            } else {
                header("location: dashboard.php?select=device");
            }
            break;
        case "service":
            $p = new service;
            $p->service_id = $_GET["service_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=service");
            } else {
                header("location: dashboard.php?select=service");
            }
            break;
    }




?>