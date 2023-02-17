<?php
    require "classlist.php";
    $p = new role;
    $mes = "";
    if(isset($_POST["l_user_name"])) {
        $p->user_name = $_POST["l_user_name"];
    }
    if(isset($_POST["l_pwd"])) {
        $p->password_hash = sha1($_POST["l_pwd"]);
    }
    if(isset($_POST["login"])) {
        if($p->user_name != NULL && $p->password_hash != NULL) {
            if(isset($_POST["saveme"])) {
                $p->saveme = $_POST["saveme"];
            }
            $p->logins();
        } else {
            $mes = "Please enter full information !";
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
</head>
<body>
    <div class="container" >
        <div class="select">
            <div class="reg ">
                <p id="reg-menu" class="active btn-select"  onclick="show(1)">Register</p>
            </div>
            <div class="login">
                <p id="login-menu" class="btn-select"  onclick="show(2)">Login</p>
            </div>
        </div>
        <form id="register-form" action="" method="POST">
            <h2>REGISTRATION</h2>
            <div class="group-item">
                <label for="">Username :</label>
                <input type="text" name="r_user_name" placeholder="User name">
            </div>
            <div class="group-item">
                <label for="">Password :</label>
                <input type="password" name="r_pwd" placeholder="Password">
            </div>
            <div class="group-item">
                <label for="">Repassword :</label>
                <input type="password" name="r_repwd" placeholder="Re-password">
            </div>
            <div class="group-item">
                <label for="">Phone :</label>
                <input type="text" name="r_phone" placeholder="Phone">
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
                <label for="save_me">Remember me</label>
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