<?php
    if(session_id() == "") {
        session_start();
        session_destroy();
    }
    if(isset($_COOKIE["loggedin"])) {
        $ckname = $_COOKIE["loggedin"];
    }
    setcookie("id",$ckname,time()-86400,"/");
    setcookie("loggedin",$ckname,time()-86400,"/");
    header("location: ./register.php");
?>