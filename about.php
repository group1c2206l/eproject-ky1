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
    <title>About</title>
    <!-- link icon -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/83128b721a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!-- link swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/about.css">
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
        $sql = "SELECT note,dir,img_name FROM galery WHERE galery_type_name = 'about'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $fullpart = $results[0]["dir"].$results[0]["img_name"];
?>
    <section class="home">
        <div class="home-slide">
            <div class="wapper">
                <div class="box" style="background: linear-gradient(rgba(0,0,0,.3),rgba(0,0,0,.3)), url(<?php echo $fullpart;  ?>);">
                    <div class="content">
                        <h1>ABOUT</h1>
                        <div><span></span></div>
                        <p><?php echo $results[0]["note"];  ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- home ends -->


    <section class="preview">
        <div class="box-container">
            <h2>EXPERIENCE TEAM WITH KNOWLEDGE BACKGROUND</h2>
            <div class="line"></div>
            <div class="box">
                <div class="title">
                    <p id="1">Prime's Coach Team Aren't Just Servicemen, They Are Your Own Brother, Teammate, Teacher, Coach. They Both Motivate You To Overcome All Boundaries, Your Limits, And A Spiritual Support When You Feel Tired, Want To Give Up.</p>
                    <p id="2">Our business is based on knowledge, so each coach has a wealth of knowledge and experience. Not only are they deeply knowledgeable in the fields of health, nutrition, and human anatomy and muscle movement, they are also responsible and energetic companions to push members to reach new heights, new term.</p>
                    <p id="3">Understanding that each person's needs and physique are different, there is no one-size-fits-all exercise program. Therefore, for each client, the coaches have a process of thoroughly researching, researching and analyzing their body condition, and designing a suitable exercise program for them.</p>
                </div>   
                <div class="image">
                    <img src="./assets/image/trainer_page/title/title-1.jpeg" alt="">
                </div>   
            </div>
        </div>

    </section>


    
    <!-- photo libraly -->
    <section class="blogs">
        <h1 class="heading">Photos <span>GALLERY</span></h1>
        <div class="swiper blogs-slider">
            <div class="swiper-wrapper wapper">
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "SELECT G.dir gdir,G.img_name gimgname,G.note,M.lname lname, M.mname, M.fname fname FROM galery G INNER JOIN member M ON G.item_id = M.member_id WHERE M.vip = 1 AND G.galery_type_name = 'member';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '<div class="swiper-slide box">
                                    <div class="image">
                                        <img src='.$row["gdir"].$row["gimgname"].' alt="">
                                    </div>
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
        </div>
    </section>



    <!-- slide -->
    <div class="galery">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper main">
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "SELECT * FROM galery  WHERE galery_type_name = 'photos';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '  <div class="swiper-slide">
                                    <img src='.$row["dir"].$row["img_name"].' />
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "SELECT * FROM galery  WHERE galery_type_name = 'photos';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '  <div class="swiper-slide">
                                    <img src='.$row["dir"].$row["img_name"].' />
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
        </div>
    </div>
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
    <script src="../Style/Javascript/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./assets/js/trainer.js"></script>
</body>
</html>