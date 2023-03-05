<?php
    require "classlist.php";
    $p = new member;
    $p->mes = "";
    $select = "";
    if(isset($_POST["login"])) {
        $select = "login";
    }
    if(isset($_POST["register"])) {
        $select = "register";
    }
    if(isset($_POST["reset"])) {
        $select = "reset";
    }
    if(isset($_POST["new_pass"])) {
        $select = "new_pass";
    }
    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    echo $select;
    switch($select) {
        case "login":
            if(isset($_POST["l_email"])) {
                $p->email = $_POST["l_email"];
            }
            if(isset($_POST["l_pwd"])) {
                $p->password_hash = sha1($_POST["l_pwd"]);
            }
            if($p->email != NULL && $p->password_hash != NULL) {
                if(isset($_POST["saveme"])) {
                    $p->saveme = $_POST["saveme"];
                }
                $p->logins();
            } else {
                $p->mes = "Please enter full information !";
            }
            break;
        case "register":
                if(isset($_POST["r_pwd"])) {
                    $p->password_hash = sha1($_POST["r_pwd"]);
                }
                if(isset($_POST["repwd"])) {
                    $p->re_password_hash = sha1($_POST["repwd"]);
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
                if(isset($_POST["r_email"])) {
                    $p->email = $_POST["r_email"];
                }
                $p->card_id = $p->member_type_count();
                print_r($p);
                if($p->fname != NULL && $p->lname != NULL && $p->password_hash != NULL && $p->re_password_hash != NULL && $p->phone_number != NULL && $p->email != NULL) {   
                    if($p->regexp($_POST["r_pwd"])) {
                        if($p->password_hash == $p->re_password_hash) {
                            $p->addnew();
                            header("location: ./index.php");
                        } else {
                            $p->mes = "The password is not the same !";
                        }
                    } else {
                        $p->mes = "The password is not in the correct format!";
                    }
                } else {
                    $p->mes = "Please enter full information !";
                }
                break;
            case "reset":
                if(isset($_POST["f_email"])) {
                    $p->email = $_POST["f_email"];
                }
                echo $p->check_email();
                if($p->check_email()) {
                    $m = new mail;
                    $m->to = $p->email;
                    $m->subject = "Reset password!";
                    $m->link_reset = "http://localhost/eproject-ky1/register.php?page=4&mid=".md5($p->email);
                    // Always set content-type when sending HTML email
                    $m->headers = "MIME-Version: 1.0" . "\r\n";
                    $m->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $m->headers .= "From: <nampphaui91@gmail.com>" . "\r\n";
                    $m->message = ' <html>
                                        <head>
                                        <title>HTML email</title>
                                        </head>
                                        <body>
                                            <p>Please click below link to reset password:</p>
                                            <a href="'.$m->link_reset.'">Click here</a>
                                        </body>
                                    </html>';
                    // print_r($m);
                    $m->send_mail();
                } else {
                    $p->mes = "Email not available";
                }
                break;
            case "new_pass":
                if(isset($_POST["n_pwd"])) {
                    $p->password_hash = sha1($_POST["n_pwd"]);
                }
                if(isset($_POST["n_repwd"])) {
                    $p->re_password_hash = sha1($_POST["n_repwd"]);
                }
                if($p->regexp($_POST["n_pwd"])) {
                    if($p->password_hash == $p->re_password_hash) {
                        $p->new_pass();
                        $p->mes = "Update success, you can login.";
                    }
                }
                
                break;
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
        <!-- onsubmit="return validateForm()" -->
        <!-- onchange="re_password_check()" -->
        <form id="register-form" action="" method="POST" onsubmit="return validate_Register_Form()">
            <h2>REGISTRATION</h2>
            <div class="group-item">
                <label for="">Email :</label>
                <input class="r_email" type="email" name="email" placeholder="Email" onblur="email_check(r_email)">
            </div>
            <div class="group-item">
                <label for="">Password :</label>
                <input class="r_pwd" type="password" name="pwd" placeholder="Password" onblur="password_check(r_pwd)">
            </div>
            <div class="group-item">
                <label for="">Repassword :</label>
                <input class="r_repwd" type="password" name="repwd" placeholder="Re-password" onblur="re_password_check(r_repwd,r_pwd)"> 
            </div>
            <div class="group-item">
                <label for="">First Name :</label>
                <input type="text" name="fname" placeholder="" onblur="fname_check()">
            </div>
            <div class="group-item">
                <label for="">Mid Name :</label>
                <input type="text" name="mname" placeholder="">
            </div>
            <div class="group-item">
                <label for="">Last Name :</label>
                <input type="text" name="lname" placeholder="" onblur="lname_check()">
            </div>
            <div class="group-item">
                <label for="">Phone :</label>
                <input type="tel" name="phone_number" placeholder="Phone" onblur="phone_check()">
            </div>
            
            <div class="group-btn">
                <input type="submit" name="register" value="register">
            </div>
            <div class="mes">
                <span><?php echo $p->mes ?></span>
            </div>
        </form>
        <form id="login-form" action="" method="POST" onsubmit="return validate_Login_Form()">
            <h2>Login</h2>
            <div class="group-item">
                <label for="">Email</label>
                <input type="text" name="l_email" class="l_email" placeholder="email" onblur="email_check(l_email)">
            </div>
            <div class="group-item">
                <label for="">Password</label>
                <input class="l_pwd" type="password" name="l_pwd" placeholder="Password" onblur="password_check(l_pwd)">
            </div>
            <div class="remember">
                <input type="checkbox" id="save_me" name="saveme" value="saveme">
                <label for="save_me" class="lable-remember">Remember me</label>
            </div>
            <div class="remember">
                <a href="" onclick="show(3)" style="color:antiquewhite">Forget password , click here.</a>
            </div>
            <div class="group-btn">
                <input type="submit" name="login" value="login">
            </div>
            <div class="mes">
                <span><?php echo $p->mes ?></span>
            </div>
        </form>

        <!-- form reset password -->
        <form id="reset-form" action="" method="POST" onsubmit="return validate_Reset_Form()">
            <h2>Reset Password</h2>
            <div class="group-item">
                <label for="">Please input email :</label>
                <input class="f_email" type="text" name="f_email" placeholder="email" onblur="email_check(f_email)">
            </div>
            <div class="group-btn">
                <input type="submit" name="reset" value="reset">
            </div>
            <div class="mes">
                <span><?php echo $p->mes ?></span>
            </div>
        </form>

        <!-- form enter new password -->
        <form id="new-pass-form" action="" method="POST" onsubmit="return validate_NewPass_Form()">
            <h2>New Password</h2>
            <div class="group-item">
                <label for="">New Password :</label>
                <input class="n_pwd" type="password" name="n_pwd" placeholder="New Password" onblur="password_check(n_pwd)">
            </div>
            <div class="group-item">
                <label for="">New Password :</label>
                <input class="n_repwd" type="password" name="n_repwd" placeholder="Re New Password" onblur="re_password_check(n_repwd,n_pwd)">
            </div>
            <div class="group-btn">
                <input type="submit" name="new_pass" value="Update">
            </div>
            <div class="mes">
                <span><?php echo $p->mes ?></span>
            </div>
        </form>
    </div>

    <script>
        let page = <?php echo $page ?>;
        console.log(page);
        localStorage.setItem("menu",page);
    </script>
    <script src="./assets/js/register.js"></script>
</body>
</html>