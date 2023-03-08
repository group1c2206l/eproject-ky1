<?php
    if(session_id() == "") {
        session_start();
    }
    $ss_admin_id = "";
    $c_admin_id = 1;
    $c_admin_loggedin = 2;
    if(isset($_SESSION["loggedin"])) {
        $ss_admin_id = $_SESSION["loggedin"];
    }
    if(isset($_SESSION["admin"])) {    // xac định người dùng là admin không phải member
        $ss_admin = $_SESSION["admin"];
    }
    if(isset($_COOKIE["id"])) {
        $c_admin_id = $_COOKIE["id"];
    }
    if(isset($_COOKIE["admin_loggedin"])) {
        $c_admin_loggedin = md5($_COOKIE["admin_loggedin"]);
    }
    if($ss_admin_id == TRUE  && $ss_admin == TRUE || $c_admin_loggedin == $c_admin_id) { 
        
    } else {
        header("location: ../admin/index.php");
    }

?>