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
            <a href="./package.php">Member</a>
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
    <?php
        $c = new config;
        $conn = $c->connect();
        $sql = "SELECT M.fname,M.mname,M.lname,M.card_id,M.dob,M.address,M.phone_number,M.points,M.create_at,P.name pname, C.name cname from member M INNER JOIN package P ON M.package_id = P.package_id INNER JOIN course C ON M.course_id = C.course_id WHERE M.email = 'nampv@aum.edu.vn'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $conn = null;
    ?>                   
    <section class="home" style="background: linear-gradient(180deg,#39373d,#18061b);">
        <div class="avata">
            <a href=""><img  src="./assets/image/logo/logo.png" alt=""></a>
        </div>
        <div class="uname">
            <p ><?php  echo $user  ?> </p>
        </div>
        <div class="infor">
                <div class="item-infor">
                    <p><i class="fas fa-box-open"></i> Card ID : <?php  echo $results[0]["card_id"]  ?> </p>
                    <p><i class="fas fa-box-open"></i> Join Date : <?php  echo $results[0]["create_at"]  ?> </p>
                    
                </div>
                <div class="item-infor">
                    <p><i class="fas fa-box-open"></i> Package : <?php  echo $results[0]["pname"]  ?> </p>
                    <p><i class="fas fa-box-open"></i> Course : <?php  echo $results[0]["cname"]  ?> </p>
                </div>
                <div class="item-infor">
                    <p><i class="fas fa-box-open"></i> Point : <?php  echo $results[0]["points"]  ?> </p>
                    <p><i class="fas fa-box-open"></i> Phone : <?php  echo $results[0]["phone_number"]  ?> </p>
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
                        <button type="button">Save  </button>
                    </div>
                </div>
            </form>

        </div>
        <div class="faq">
            <h4>FAQ</h4>
            <div class="faq-group">
                <h5>What is Fitness?</h5>
                <p>According to the dictionary definition, Fitness is a word used to refer to a person who possesses a fit, healthy body and has a healthy lifestyle. In terms of bodybuilding aspect, Fitness means general fitness and it includes subjects that help us human to perfect the body in terms of both Muscles, Cardiovascular, Respiratory and Joints.. At the same time, helping people to live healthier, live better. The general goal of Fitness is to give the practitioner a perfect, balanced, aesthetic appearance and muscle without being too big like bodybuilding. For both men and women, Doing Fitness The Right Way Will Bring You A Good Health, Good Body And Attractive Body...</p>
            </div>
            <div class="faq-group">
                <h5>What are the benefits of doing Fitness?</h5>
                <p>1. Fitness helps improve health.</p>
                <p>2. Fitness helps to own a beautiful body.</p>
                <p>3. Fitness helps prevent disease.</p>
                <p>4. Fitness helps reduce stress effectively.</p>
                <p>5. Helps to eat well and sleep well.</p>
            </div>
            <div class="faq-group">
                <h5>Difference between Fitness and Bodybuilding ?</h5>
                <p>When going to learn about Fitness, many people confuse and equate it with Bodybuilding. In fact, Fitness and Bodybuilding are two different forms of exercise, and the standards for assessing the ideal body of both are also different. According to experts, to distinguish these two forms of exercise, you need to pay attention to its detailed training regime and nutrition.</p>
            </div>
        </div>
    </section>
<!-- home ends -->

    <!-- footer -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h1>quick Link</h1>
                <div class="icon">
                    <a href="./index.php">Home</a>
                    <a href="#">About</a>
                    <a href="#">Services</a>
                    <a href="./trainer.php">Trainer</a>
                    <a href="#">Contact</a>
                    <a href="./register.php">Login</a>
                </div>
            </div>
            <?php
                $c = new config;
                $conn = $c->connect();
                $sql = "SELECT name,address,hotline,email FROM branch WHERE address = 'New York'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll();
                $conn = null;
            ?>        
            <div class="box">
                <h1>contact info</h1>
                <div class="icon">
                    <a href="#"><i class="fas fa-home"></i><?php  echo $results[0]["name"]  ?> </a>
                    <a href="#"><i class="fas fa-map-marker-alt"></i><?php  echo $results[0]["address"]  ?> </a>
                    <a href=""><i class="fas fa-phone-alt"></i><?php  echo $results[0]["hotline"]  ?></a>
                    <a href=""><i class="fas fa-envelope"></i><?php  echo $results[0]["email"]  ?></a>
                </div>
            </div>
            
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