<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/course.css">
    <!-- link icon -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/83128b721a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!-- link swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Prime<span>Fitness</span></a>
        
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Trainer</a>
            <a href="#">Contact</a>
            <a href="./register.php">Login</a>
        </nav>

        <div class="icons">
            <a href="" class="btn">Become a memeber</a>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </header>
    <div class="wrapper">
           <div class="container">
                <?php
                    require "config.php";
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "select G.dir gdir,G.img_name gimgname,C.name cname,C.description,C.price cprice,C.start_day,C.end_day FROM galery G INNER JOIN course C ON G.item_id = C.course_id WHERE G.galery_type_name = 'course' AND C.flag = '1';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '  <div class="row3" style=" background-image: url('.$row["gdir"].$row["gimgname"].'); background-size: cover;height: 620px;position: relative;">
                                    <div class="row-content">
                                        <div class="tittle">
                                            <h1>'.$row["cname"].'</h1>
                                            <p>'.$row["description"].'</p>
                                        </div>
                                        <div class="learn-about">
                                            <a href=""><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                                            <div style="position: absolute; top: 40%; left: 10%; transform: translate(-50%, -50%); z-index: 1;">
                                                <a href=""><p>More...</p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    }
                    $conn = null;
                ?>
           </div>
        </div>
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