<?php
    require "config.php";
    $user = "";
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
        $cloggedin = $_COOKIE["loggedin"];
    }
    if($ssid == TRUE || $cloggedin == $cid) { 
        if(isset($_COOKIE["user_name"])) {
            $user = $_COOKIE["user_name"];
        }
    } else {
        $user = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym</title>
    <!-- link icon -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/83128b721a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!-- link swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/member.css">
</head>
<body>
<header class="header">
        <a href="./index.php" class="logo">Prime<span>Fitness</span></a>
        
        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="./about.php">About</a>
            <a href="./service.php">Services</a>
            <a href="./course.php">Course</a>
            <a href="./trainer.php">Trainer</a>
            <a href="#">Contact</a>
            <?php
                if($user == "") {
                    echo '<a href="./register.php">Login</a>';
                } else {
                    echo '<a href="./logout.php">Logout</a>';
                }
            ?>
        </nav>

        <div class="icons">
            <?php 
                if($user == "") {
                    echo '<a href="./register.php" class="btn">Become a memeber</a>';
                } else {
                    echo '<a href="./member.php" class="btn">'.$user.'</a>';
                }
            ?>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </header>
<!-- <<<<<<< HEAD -->
<!-- home starts -->
    <section class="home" style="background: linear-gradient(180deg,#39373d,#18061b);">
        <div class="avata">
            <a href=""><img  src="./assets/image/logo/logo.png" alt=""></a>
        </div>
        <div class="uname">
            <p >Pham Nam</p>
        </div>
        <div class="infor">
                <div class="item-infor">
                    <p><i class="fas fa-box-open"></i> Card ID : 0x123456789</p>
                    <p><i class="fas fa-box-open"></i> Join Date : 26/1/2023</p>
                    
                </div>
                <div class="item-infor">
                    <p><i class="fas fa-box-open"></i> Package : Premium</p>
                    <p><i class="fas fa-box-open"></i> Course : Yoga,MMA</p>
                </div>
                <div class="item-infor">
                    <p><i class="fas fa-box-open"></i> Point : 2000</p>
                    <p><i class="fas fa-box-open"></i> Phone : Premium</p>
                </div>
        </div>
       
        <div class="edit-infor">
            <form action="">
                <div class="group-item">
                    <label for="">First name :</label>
                    <input type="text" name="fname" placeholder="First name">
                </div>
                <div class="group-item">
                    <label for="">Mid name :</label>
                    <input type="text" name="mname" placeholder="Mid name">
                </div>
                <div class="group-item">
                    <label for="">Last name :</label>
                    <input type="text" name="lname" placeholder="Last name">
                </div>
                <div class="group-item">
                    <label for="">Dob :</label>
                    <input type="text" name="dob" placeholder="Dob">
                </div>
                <div class="group-item">
                    <label for="">Address :</label>
                    <input type="text" name="address" placeholder="Address">
                </div>
                <div class="group-item">
                    <label for="">Phone :</label>
                    <input type="text" name="phone_number" placeholder="Phone">
                </div>
                <div class="btn-update">
                    <button type="button">Update Information  </button>
                </div>
            </form>
            <form action="">
                <div class="about-you">
                    <h4>What do you think about us?</h4>
                    <textarea name="about_u" id="about_u" cols="20" rows="10"></textarea>
                    <div class="btn-update">
                        <button type="button">Update Information  </button>
                    </div>
                </div>
            </form>

        </div>
    </section>
<!-- home ends -->

    <!-- footer -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h1>about</h1>
                <div class="text">
                    <p>I have found this fantastic gym and I couldn't be happier. The spacious and well-equipped facilities, along with the best workout equipment, have given me an amazing workout experience. The staff are attentive and helpful, and I have seen great improvements in my health and strength since I started working out here.</p>
                </div>
                <div class="icons">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="box">
                <h1>contact info</h1>
                <div class="icon">
                    <a href="#"><i class="fas fa-map-marker-alt"></i>Doi can, </a>
                    <a href=""><i class="fas fa-phone-alt"></i>030303030</a>
                    <a href=""><i class="fas fa-envelope"></i>primefitness@gmail.com</a>
                </div>
            </div>
        </div>
    </section>
    
    <script src="./ckeditor/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./assets/js/trainer.js"></script>
    <script>
        CKEDITOR.replace('about_u');
    </script>
</body>
</html>