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
        case "package":
            $p = new package;
            $p->package_id = $_GET["package_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=package");
            } else {
                header("location: dashboard.php?select=package");
            }
            break;
        case "course":
            $p = new course;
            $p->course_id = $_GET["course_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=course");
            } else {
                header("location: dashboard.php?select=course");
            }
            break;
        case "member":
            $p = new member;
            $p->member_id = $_GET["member_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=member");
            } else {
                header("location: dashboard.php?select=member");
            }
            break;
        case "galery_type":
            $p = new galery_type;
            $p->galery_type_id = $_GET["galery_type_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=galery_type");
            } else {
                header("location: dashboard.php?select=galery_type");
            }
            break;
        case "galery":
            $p = new galery;
            $p->galery_id = $_GET["galery_id"];
            if($confirm == "true") {
                $p->delete();
                header("location: dashboard.php?select=galery");
            } else {
                header("location: dashboard.php?select=galery");
            }
            break;
    }
        
?>