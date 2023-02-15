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
    }




?>