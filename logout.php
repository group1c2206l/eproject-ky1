<?php
    if(session_id() == "") {
        session_start();
        session_destroy();
    }
    if(isset($_COOKIE["loggedin"])) {
        $ckname = $_COOKIE["loggedin"];
    }
    setcookie("id",$ckname,time()-6000,"/");
    setcookie("loggedin",$ckname,time()-6000,"/");
    header("location: ./register.php");
?>