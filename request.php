<?php
    if(session_id() == "") {
        session_start();
    }
    $ssid = "";
    $cid = 1;
    $cloggedin = 2;
    if(isset($_SESSION["loggedin"])) {
        $ssid = $_SESSION["loggedin"];
    }
    if(isset($_COOKIE["id"])) {
        $cid = $_COOKIE["id"];
    }
    if(isset($_COOKIE["loggedin"])) {
        $cloggedin = md5($_COOKIE["loggedin"]);
    }
    if($ssid == TRUE || $cloggedin == $cid) { 
        
    } else {
        header("location: ../register.php");
    }

?>