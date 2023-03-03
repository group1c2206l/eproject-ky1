<?php
    require "config.php";
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
    <link rel="stylesheet" href="./assets/css/template.css">
</head>
<body >
    <header class="header">
        <a href="./index.php" class="logo">Prime<span>Fitness</span></a>
        
        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="./trainer.php">Trainer</a>
            <a href="#">Contact</a>
        </nav>

        <div class="icons">
            <a href="" class="btn">Become a memeber</a>
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
                <div class="box">
                    <div class="content">
                        <h1>BASIC</h1>
                        <div><span></span></div>
                        <p><?php echo $results[0]["note"];  ?></p>
                        <p>Day active : 3 day / Week</p>
                        <p>PT : Yes</p>
                        <p>Service : Full</p>
                        <p>Ultiliti : No</p>
                        <p>Points : 1000</p>
                        <div class="button">
                            <a href="#" class="btn">Order Now</a>
                        </div>
                    </div>
                    <div class="content">
                        <h1>STANDARD</h1>
                        <div><span></span></div>
                        <p><?php echo $results[0]["note"];  ?></p>
                        <p>Day active : 5 day / Week</p>
                        <p>PT : Yes</p>
                        <p>Service : Full</p>
                        <p>Ultiliti : Massage</p>
                        <p>Points : 2000</p>
                        <div class="button">
                            <a href="#" class="btn">Order Now</a>
                        </div>
                    </div>
                    <div class="content">
                        <h1>PREMIUM</h1>
                        <div><span></span></div>
                        <p><?php echo $results[0]["note"];  ?></p>
                        <p>Day active : 7 day / Week</p>
                        <p>PT : Yes</p>
                        <p>Service : Full</p>
                        <p>Ultiliti : Massage, Spa</p>
                        <p>Points : 3000</p>
                        <div class="button">
                            <a href="#" class="btn">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- home ends -->
    <section class="feature">
        <h1 class="heading"><span>accompanying </span>utilities</h1>
        <div class="swiper feature-slider">
            <div class="swiper-wrapper wapper">
                <div class="swiper-slide box">
                    <div class="image">
                        <img src='./assets/image/service/pic-1.jpeg' alt="">
                    </div>
                    <div class="content">
                        <h3>'.$row["sname"].'</h3>
                        <p>'.$row["title"].'</p>
                    </div>
                </div>
                <div class="swiper-slide box">
                    <div class="image">
                        <img src='./assets/image/service/pic-1.jpeg' alt="">
                    </div>
                    <div class="content">
                        <h3>'.$row["sname"].'</h3>
                        <p>'.$row["title"].'</p>
                    </div>
                </div>
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