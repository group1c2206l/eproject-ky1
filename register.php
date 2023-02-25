<?php
    require "classlist.php";
    $p = new member;
    $mes = "";
    $select = "";
    if(isset($_POST["login"])) {
        $select = "login";
    }
    if(isset($_POST["register"])) {
        $select = "register";
    }

    echo $select;
    switch($select) {
        case "login":
            if(isset($_POST["l_user_name"])) {
                $p->user_name = $_POST["l_user_name"];
            }
            if(isset($_POST["l_pwd"])) {
                $p->password_hash = sha1($_POST["l_pwd"]);
            }
            if($p->user_name != NULL && $p->password_hash != NULL) {
                if(isset($_POST["saveme"])) {
                    $p->saveme = $_POST["saveme"];
                }
                $p->logins();
            } else {
                $mes = "Please enter full information !";
            }
            break;
        case "register":
            $mes = "";
            if(isset($_POST["save"])) {
                if(isset($_POST["pwd"])) {
                    $p->password_hash = $_POST["pwd"];
                }
                if(isset($_POST["repwd"])) {
                    $p->re_password_hash = $_POST["repwd"];
                }
                if(isset($_POST["fname"])) {
                    $p->fname = $_POST["fname"];
                }
                if(isset($_POST["mname"])) {
                    $p->mname = $_POST["mname"];
                }
                if(isset($_POST["lname"])) {
                    $p->lname = $_POST["lname"];
                }
                if(isset($_POST["address"])) {
                    $p->address = $_POST["address"];
                }
                if(isset($_POST["phone_number"])) {
                    $p->phone_number = $_POST["phone_number"];
                }
                if(isset($_POST["email"])) {
                    $p->email = $_POST["email"];
                }
                

                if($p->fname != NULL && $p->lname != NULL && $p->password_hash != NULL && $p->re_password_hash != NULL && $p->phone_number != NULL && $p->email != NULL) {   
                    if($p->password_hash == $p->re_password_hash) {
                        $p->addnew();
                    } else {
                        $mes = "The password is not the same !";
                    }
                } else {
                    $mes = "Please enter full information !";
                }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="container" >
        <div class="select">
            <div class="reg ">
                <p id="reg-menu" class="active btn-select"  onclick="show(1)">Register</p>
            </div>
            <div class="login">
                <p id="login-menu" class="btn-select"  onclick="show(2)">Login</p>
                <a href="./index.php"><i class="bi bi-x-lg"></i></a>
            </div>

        </div>
        <form id="register-form" action="" method="POST">
            <h2>REGISTRATION</h2>
            <div class="group-item">
                <label for="">Email :</label>
                <input class="email" type="email" name="email" placeholder="Email" onchange="email_check()">
            </div>
            <div class="group-item">
                <label for="">Password :</label>
                <input type="password" name="pwd" placeholder="Password" onkeydown="email_check()">
            </div>
            <div class="group-item">
                <label for="">Repassword :</label>
                <input type="password" name="repwd" placeholder="Re-password">
            </div>
            <div class="group-item">
                <label for="">First Name :</label>
                <input type="text" name="fname" placeholder="">
            </div>
            <div class="group-item">
                <label for="">Mid Name :</label>
                <input type="text" name="mname" placeholder="">
            </div>
            <div class="group-item">
                <label for="">Last Name :</label>
                <input type="text" name="lname" placeholder="">
            </div>
            <div class="group-item">
                <label for="">Phone :</label>
                <input type="tel" name="phone" placeholder="Phone">
            </div>
            
            <div class="group-btn">
                <input type="submit" name="register" value="register">
            </div>
        </form>
        <form id="login-form" action="" method="POST">
            <h2>Login</h2>
            <div class="group-item">
                <label for="">Username</label>
                <input type="text" name="l_user_name" placeholder="User name">
            </div>
            <div class="group-item">
                <label for="">Password</label>
                <input type="password" name="l_pwd" placeholder="Password">
            </div>
            <div class="remember">
                <input type="checkbox" id="save_me" name="saveme" value="saveme">
                <label for="save_me" class="lable-remember">Remember me</label>
            </div>
            <div class="group-btn">
                <input type="submit" name="login" value="login">
            </div>
            <div class="mes">
                <span><?php echo $mes ?></span>
            </div>
        </form>
    </div>
    <script src="./assets/js/register.js"></script>
</body>
</html>