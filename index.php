<?php
    require "config.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/image/logo/logo.png" type="image/x-icon" />
    <title>Gym</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">
    <!-- link icon -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/83128b721a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!-- link swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
</head>
<body>
    <header class="header">
        <a href="./index.php" class="logo">Prime<span>Fitness</span></a>
        
        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Course</a>
            
            <a href="./trainer.php">Trainer</a>
            <a href="#">Contact</a>
            <a href="./register.php">Login</a>
        </nav>

        <div class="icons">
            <a href="" class="btn">Become a memeber</a>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </header>

    <!-- home section starts -->

    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "SELECT note,dir,img_name FROM galery WHERE galery_type_name = 'slide'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '<div class="swiper-slide box" style="background: linear-gradient(rgba(0,0,0,.3),rgba(0,0,0,.3)), url('.$row["dir"].$row["img_name"].');">
                                    <div class="content">
                                        <h3>join prime-fitness today</h3>
                                        <p>'.$row["note"].'</p>
                                        <div class="button">
                                            <a href="#" class="btn btn-1">get started</a>
                                            <a href="#" class="btn">download</a>
                                        </div>
                                    </div>
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
        </div>
    </section>

    <!-- service starts -->

    <section class="feature">
        <h1 class="heading">our <span>service</span></h1>
        <div class="swiper feature-slider">
            <div class="swiper-wrapper wapper">
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "select G.dir gdir,G.img_name gimgname,S.name sname,S.title FROM galery G INNER JOIN service S ON G.item_id = S.service_id WHERE G.galery_type_name = 'service' AND S.flag = '1';";
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
                                        <p>'.$row["title"].'</p>
                                    </div>
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
        </div>
    </section>
<!-- schedule starts -->
    <section class="schedule">
        <h1 class="heading"><span>FEATURED</span> CLASS</h1>

        <div class="box-container">
            <?php
                $c = new config;
                $conn = $c->connect();
                $sql = "select G.dir gdir,G.img_name gimgname,C.name cname,C.description,C.price cprice,C.start_day,C.end_day FROM galery G INNER JOIN course C ON G.item_id = C.course_id WHERE G.galery_type_name = 'course' AND C.flag = '1';";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll();
                foreach($results as $row) {
                    echo '<div class="box">
                                <div class="content">
                                    <h3>'.$row["cname"].'</h3>
                                    <p>'.$row["description"].'</p>
                                </div>
                                <div class="icons">
                                        <span><i class="far fa-clock"></i>Start: '.$row["start_day"].'</span>
                                        <span><i class="far fa-clock"></i>End    : '.$row["end_day"].'</span>
                                </div>
                                <a href="" class="btn">join form price</a>
                            </div>
                            <div class="box">
                                <img src='.$row["gdir"].$row["gimgname"].' alt="">
                            </div>';
                }
                $conn = null;
            ?>
        </div>
    </section>

    <!-- trainer section starts -->
    
    <section class="trainers">
        <h1 class="heading">Expert <span>trainer</span></h1>
        <div class="swiper trainer-slider">
            <div class="swiper-wrapper wrapper">
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "select G.dir gdir,G.img_name gimgname,P.lname,P.trainer_job FROM galery G INNER JOIN person_trainer P ON G.item_id = P.person_trainer_id WHERE G.galery_type_name = 'person_trainer' AND P.flag = '1';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '<div class="swiper-slide box">
                                    <a href="">
                                        <div class="image">
                                            <img src='.$row["gdir"].$row["gimgname"].' alt="">
                                        </div>
                                        <div class="info-trainer">
                                            <h1>'.$row["lname"].'</h1>
                                            <p>'.$row["trainer_job"].'</p>
                                        </div>
                                    </a>
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
        </div>
    </section>
    
    <!-- trainer section ends -->

    <!-- testimonial section starts -->

    <section class="testimonial">
        <h1 class="heading">testimonial</h1>
            <div class="box-container">
            <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "select G.dir gdir,G.img_name gimgname,P.lname,P.trainer_job,P.evaluate FROM galery G INNER JOIN person_trainer P ON G.item_id = P.person_trainer_id WHERE G.galery_type_name = 'person_trainer' AND P.flag = '1' LIMIT 3;";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '<div class="box">
                                    <div class="image">
                                        <img src='.$row["gdir"].$row["gimgname"].' alt="">
                                    </div>
                                    <div class="info">
                                        <h1>'.$row["lname"].'</h1>
                                        <p>'.$row["trainer_job"].'</p>
                                    </div>
                                    <p>'.$row["evaluate"].'</p>
                                </div>';
                    }
                    $conn = null;
                ?>
            </div>
    </section>

    <!-- testimonial section ends -->

    <!-- blogs section starts -->

    <section class="blogs">
        <h1 class="heading">Famous <span>members</span></h1>
        <div class="swiper blogs-slider">
            <div class="swiper-wrapper wapper">
                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./assets/image/blog/blog-1.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>fitness class name heer</h3>
                        <span><i class="fad fa-calendar-alt"></i>april 12,2023</span>
                        <p>I have found this fantastic gym and I couldn't be happier.</p>
                    </div>
                    <div class="button">
                        <a href="#" class="btn">Read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./assets/image/blog/blog-2.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>fitness class name heer</h3>
                        <span><i class="fad fa-calendar-alt"></i>april 12,2023</span>
                        <p>I have found this fantastic gym and I couldn't be happier.</p>
                    </div>
                    <div class="button">
                        <a href="#" class="btn">Read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./assets/image/blog/blog-3.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>fitness class name heer</h3>
                        <span><i class="fad fa-calendar-alt"></i>april 12,2023</span>
                        <p>I have found this fantastic gym and I couldn't be happier.</p>
                    </div>
                    <div class="button">
                        <a href="#" class="btn">Read more</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="./assets/image/blog/blog-4.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>fitness class name heer</h3>
                        <span><i class="fad fa-calendar-alt"></i>april 12,2023</span> 
                        <p>I have found this fantastic gym and I couldn't be happier.</p>
                    </div>
                    <div class="button">
                        <a href="#" class="btn">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blogs section ends -->

    <!-- footer section starts -->

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

    <!-- footer section starts -->

    <!-- custom -->
    <script src="https://kit.fontawesome.com/83128b721a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./assets/js/index.js"></script>
</body>
</html>