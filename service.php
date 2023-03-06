<?php
    include "config.php";
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cycling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@1,300&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"rel="stylesheet"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/service.css">
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
        <div class=" d-flex flex-wrap justify-content-center">
            <?php
                $c = new config;
                $conn = $c->connect();
                $sql = "select G.dir gdir,G.img_name gimgname,S.name sname,S.title,S.description FROM galery G INNER JOIN service S ON G.item_id = S.service_id WHERE G.galery_type_name = 'service' AND S.flag = '1' AND S.name = 'Cycling';";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll();
                $fullpart = $results[0]["gdir"].$results[0]["gimgname"];
                $conn = null;
            ?>
            <div class="item-cycling " style="background-image: url(<?php echo $fullpart;   ?>);">
                <div class="item-text-cycling d-flex flex-column fade-in-left pt-5">
                    <h1><?php echo $results[0]["sname"];   ?></h1>
                    <h2><?php echo $results[0]["title"];   ?></h2>
                    <p><?php echo $results[0]["description"];   ?></p>
                        <div class="text-box-cycling d-flex justify-content-center text-center">
                            <p>GET 1 FREE EXPERIENCE SESSION</p>
                        </div>
                        <button class="btn-cycling d-flex justify-content-center text-center"><a href="./register.php">Register now</a></button>    
                </div>
            </div>
            <div class="item1-cycling " >
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "select G.dir gdir,G.img_name gimgname,S.name sname,S.title,S.description FROM galery G INNER JOIN service S ON G.item_id = S.service_id WHERE G.galery_type_name = 'service' AND S.flag = '1' AND S.name = 'Sports & Fitness';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    $fullpart = $results[0]["gdir"].$results[0]["gimgname"];
                    $conn = null;
                ?>
                <img class="fade-in-left" src=<?php echo $fullpart; ?> alt="Gym And Fitness">
                <div class="item-text2-cycling d-flex flex-column fade-in-right">
                    <h1><?php echo $results[0]["sname"];   ?></h1>
                    <div class="item-hr-cycling"></div>
                    <p><?php echo $results[0]["description"];   ?></p>
                    <button class="cta-cycling">
                        <span class="hover-underline-animation"> Find out more </span>
                        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                            <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                        </svg>
                    </button>    
                </div>
            </div>
        </div>
        <div class="container d-flex flex-wrap justify-content-center">
            <?php
                $c = new config;
                $conn = $c->connect();
                $sql = "select G.dir gdir,G.img_name gimgname,S.name sname,S.title,S.description FROM galery G INNER JOIN service S ON G.item_id = S.service_id WHERE G.galery_type_name = 'service' AND S.flag = '1' AND S.name = 'Swimming';";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll();
                $conn = null;
            ?>
            <div class="item-swim" style="background-image: url(<?php echo $results[0]["gdir"].$results[0]["gimgname"]  ?>);">
                <div class="item-text-swim"></div>
                <div class="item-text1-swim d-flex flex-column justify-content-center">
                    <h1><?php echo $results[0]["sname"];   ?></h1>
                    <h2><?php echo $results[0]["description"];   ?></h2>
                    <h3><?php echo $results[0]["title"];   ?></h3>
                    <button class="btnswimming">
                        <span>Register now</span>
                    </button>
                </div>
            </div>
            <div class="item1-swim">
                <div class="item1-con-swim">
                    <img src=<?php echo $results[1]["gdir"].$results[1]["gimgname"]  ?> alt="">
                </div>
                <div class="item1-con-swim">
                    <img src=<?php echo $results[2]["gdir"].$results[2]["gimgname"]  ?> alt="">
                </div>
                <div class="item1-con-swim">
                    <img src=<?php echo $results[3]["gdir"].$results[3]["gimgname"]  ?> alt="">
                </div>
            </div>
        </div>
        <div class="container-fix">
        <div class="container-ex"> 
            <?php
                $c = new config;
                $conn = $c->connect();
                $sql = "select G.dir gdir,G.img_name gimgname,S.name sname,S.title,S.description FROM galery G INNER JOIN service S ON G.item_id = S.service_id WHERE G.galery_type_name = 'service' AND S.flag = '1' AND S.name = 'Group Exercise';";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll();
                $conn = null;
            ?>
            <div class="item-ex" style="background-image: url(<?php echo $results[0]["gdir"].$results[0]["gimgname"]  ?>);"></div>
            <div class="item-ex2">
                <h1><?php echo $results[0]["sname"];   ?></h1>
                <ul>
                    <li><?php echo $results[0]["description"]; ?></li>
                </ul>
                <div class="item-ex2-btn">
                    <button class="btn-ex">Register now</button>
                </div>
            </div>
        </div>

        <div class="spAndfn">
            <div class="bgr-sp"></div>
            <div class="container-sp" style="background-image: url(https://th.bing.com/th/id/R.5e3afdbc3df8ad43667e88420ede0417?rik=JjM%2fcj47oZPQ3w&riu=http%3a%2f%2fwww.musclemango.com%2fwp-content%2fuploads%2f2019%2f12%2f468884-PFZ4P2-187.jpg&ehk=AvU3cpcXr4j%2fjw6nR2e9EeCx69ODNcpeB0VMgYvAYGg%3d&risl=&pid=ImgRaw&r=0);"></div>
            <div class="container-text">    
                <h1>ĐĂNG KÝ ĐỂ ĐƯỢC SỬ DỤNG NHỮNG TRANG THIẾT BỊ CAO CẤP NHẤT HIỆN NAY</h1>
                <div class="btn-sp">
                    <button class="learn-more">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Register now</span>
                      </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="title-sp">
                <h2>Một số sản phẩm hiện tại<br>của chúng tôi: </h2>
        </div>
        <div class="product-sp">
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/260352/pexels-photo-260352.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/4162449/pexels-photo-4162449.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://images.pexels.com/photos/136404/pexels-photo-136404.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://th.bing.com/th/id/R.576f831d695b2e6d23ebd53d879942ad?rik=gV6SXXK6gBmjaQ&pid=ImgRaw&r=0" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://toiyeugym.vn/wp-content/uploads/2020/09/phong-tap-gym-quan-go-vap-02.jpg" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://pt-fitness.com/wp-content/uploads/2020/06/tieu-chuan-thiet-ke-phong-tap-gym-1024x500.jpg" alt="">
            </div>
            <div class="product-sp-item">
                <img src="https://th.bing.com/th/id/R.711b31753207fe9ed5b6227fe4045d78?rik=Ru4lW2gHP30u8g&pid=ImgRaw&r=0" alt="">
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
    <script src="./assets/js/navbar.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- MDBootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdbootstrap/bootstrap-free@4.19.0/css/mdb.min.css" integrity="sha384-pK+jKzIx2N/ZN3qd5oy5NlX9MyIcR+z/F/0KjOv4/z+tMeOaMfWGm8TTJj9zm+0" crossorigin="anonymous">

    <!-- MDBootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@mdbootstrap/bootstrap-free@4.19.0/js/mdb.min.js" integrity="sha384-iRHfQV91qxFc2h2zKtIV8L7W4OMvn5h5nZp5B8P5jlSxvx0anW4M/vSlHYltVt2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</body>
</html>

  