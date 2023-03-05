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
    <link rel="stylesheet" href="./assets/css/package.css">
</head>
<body >
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
    
    <section class="home">
        <div class="home-slide">
            <div class="wapper">
                <div class="box">
                    <?php
                        $c = new config;
                        $conn = $c->connect();
                        $sql = "SELECT * FROM package";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $results = $stmt->fetchAll();
                        foreach($results as $row) {
                            echo '  <div class="content">
                                        <h1>'.$row["name"].'</h1>
                                        <div><span></span></div>
                                        <p class="des">'.$row["description"].'</p>
                                        <p>Day active : '.$row["day_active"].' day / Week</p>
                                        <p>PT : '.$row["mentor"].'</p>
                                        <p>Service : Full</p>
                                        <p>Utilities : '.$row["utilities"].'</p>
                                        <p>Points : '.$row["points"].'</p>
                                        <div class="button">
                                            <h1>'.$row["price"].'$</h1>
                                            <a href="#" class="btn">Order Now</a>
                                        </div>
                                    </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
<!-- home ends -->
    <section class="feature">
        <h1 class="heading"><span>accompanying </span>utilities</h1>
        <div class="swiper feature-slider">
            <div class="swiper-wrapper wapper">
                <?php
                    $sql = "select G.dir gdir,G.img_name gimgname,S.name sname FROM galery G INNER JOIN utilities S ON G.item_id = S.utilities_id WHERE G.galery_type_name = 'utilities' AND S.flag = '1';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '<div class="swiper-slide box">
                                    <div class="image">
                                        <img src='.$row["gdir"].$row["gimgname"].' alt="">
                                    </div>
                                    <div class="content">
                                        <h3>'.$row["sname"].'</h3>
                                    </div>
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
        </div>
    </section>


<!-- senior coach -->

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./assets/js/template.js"></script>
    <!-- <script src="./assets/js/index.js"></script> -->

</body>
</html>