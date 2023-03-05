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
    <div class="wrapper">
           <div class="container">
<<<<<<< HEAD
                <div class="row1" style="background-image: url(./assets/image/anh/kickfit-mma.jpg);background-size: cover;height: 685px;position: relative;">
                    <div class="messenger">
                        <a href=""><img src="./assets/image/anh/fb-messenger.png" alt=""></a>
                    </div>
                    <div class="row-content">
                        <div class="tittle">
                            <h1 font-size: 28px; >Matial arts</h1>
                            <p style="font-size:16px;margin-bottom:20px; ">
                                Võ thuật (martial arts) là một hình thức nghệ thuật, thể thao và tự vệ<br>
                                được phát triển từ các kỹ năng và chiến thuật chiến đấu. Võ thuật bao gồm<br>
                                nhiều phương pháp và hình thức khác nhau, từ các bộ môn truyền thống của<br>
                                châu Á như Karate, Taekwondo, Kung Fu và Judo đến các hình thức hiện đại<br>
                                như Kickboxing, MMA (Mixed Martial Arts) và Krav Maga.
                            </p>
                        </div>
                        <div class="learn-about" >
                            <a href="register.php"><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                            <div style="position: absolute; top: 40%; left: 17%; transform: translate(-50%, -50%); z-index: 1;">
                            <a href="register.php"><p style="font-size:16px">Đăng ký ngay</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row2" style=" background-image: url(./assets/image/anh/c2.jpg); background-size: cover;height: 620px;position: relative;">
                    <div class="row-content">
                        <div class="tittle">
                            <h1 font-size: 28px;>Gym & fitness</h1>
                            <p style="font-size:16px;margin-bottom:20px;">
                                Phòng tập gym và tập luyện fitness là nơi mà người tập thể dục và rèn luyện<br>
                                sức khỏe bằng cách sử dụng các thiết bị tập luyện và các bài tập thể dục. Tập<br>
                                luyện thể dục và rèn luyện sức khỏe là một phần quan trọng của một lối sống<br>
                                lành mạnh, và phòng tập gym và tập luyện fitness cung cấp một môi trường thuận<br>
                                tiện và chuyên nghiệp để thực hiện việc này.
                            </p>
                        </div>
                        <div class="learn-about">
                            <a href="register.php"><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                            <div style="position: absolute; top: 40%; left: 17%; transform: translate(-50%, -50%); z-index: 1;">
                            <a href="register.php"><p style="font-size:16px" >Đăng ký ngay</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row3" style=" background-image: url(./assets/image/anh/dancee.jpg); background-size: cover;height: 620px;position: relative;">
                    <div class="row-content">
                        <div class="tittle">
                            <h1 font-size: 28px;>Dance</h1>
                            <p style="font-size:16px;margin-bottom:20px;">
                                Dance là một nghệ thuật biểu diễn mà nó thể hiện qua những bước nhảy phối</br>
                                hợp với âm nhạc. Nó có thể được thực hiện một mình hoặc nhóm, trong phòng tập,</br>
                                trên sân khấu hoặc trên đường phố. Dance đã trở thành một phần của nhiều nền</br>
                                văn hóa và được phát triển với nhiều phong cách khác nhau, từ ballet cổ điển đến</br>
                                hip-hop đương đại.</br>
                            </p>
                        </div>
                        <div class="learn-about">
                            <a href="register.php"><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                            <div style="position: absolute; top: 40%; left: 17%; transform: translate(-50%, -50%); z-index: 1;">
                            <a href="register.php"><p style="font-size:16px">Đăng ký ngay</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row4" style=" background-image: url(./assets/image/anh/zumm_auto_x2.jpg); background-size: cover;height: 620px;position: relative;">
                   <div class="row-content">
                    <div class="tittle">
                        <h1 style="font-size: 28px;" >Zumba</h1>
                        <p style="font-size:16px;margin-bottom:20px;">
                            Zumba là một loại hình thể dục thể thao kết hợp giữa các bài tập nhảy và nhạc latin.<br>
                            Nó đã trở thành một trào lưu tập thể dục phổ biến trên toàn thế giới với hàng triệu người<br>
                            tham gia mỗi ngày.<br>
                            Zumba bao gồm các bài tập aerobic và nhảy, kết hợp với nhạc sôi động từ các thể loại âm <br>
                            nhạc khác nhau như salsa, merengue, cumbia, reggaeton, samba, hip-hop và nhiều thể loại <br>
                            khác. Với Zumba, người tập có thể tập trung vào việc di chuyển và nhảy theo nhạc, giúp họ <br>
                            cảm thấy vui vẻ và thư giãn.
                        </p>
                   </div>
                    <div class="learn-about">
                        <a href="register.php"><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                        <div style="position: absolute; top: 40%; left: 17%; transform: translate(-50%, -50%); z-index: 1;">
                        <a href="register.php"><p style="font-size:16px">Đăng ký ngay</p></a>
                        </div>
                    </div>
                   </div>
                </div>
=======
                <?php
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
                                                <a href="./package.php"><p>Jont Now</p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    }
                    $conn = null;
                ?>
>>>>>>> 251745915a21a7e93e8695d90b7ed5841293bfe9
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
        </div>
    </section>

    <!-- footer section starts -->

    <!-- custom -->
    <script src="https://kit.fontawesome.com/83128b721a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./assets/js/index.js"></script>
</body>
</html>