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
    <link rel="stylesheet" href="./assets/css/trainer.css">
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
            <h2>Đội ngũ giàu kinh nghiệm với nền tảng kiến thức vững chãi</h2>
            <div class="line"></div>
            <div class="box">
                <div class="title">
                    <p id="1">Đội ngũ Coach của Swequity không chỉ là người làm dịch vụ, họ còn là người anh em, người đồng đội, người thầy, người huấn luyện của riêng bạn. Họ vừa thúc đẩy bạn vượt qua mọi ranh giới, giới hạn của bản thân, vừa là chỗ dựa tinh thần khi bạn cảm thấy mỏi mệt, muốn từ bỏ.</p>
                    <p id="2">Chúng tôi kinh doanh dựa trên nền tảng tri thức, nên mỗi người coach đều có bề dày kiến thức và kinh nghiệm. Không chỉ hiểu biết sâu rộng về lĩnh vực sức khỏe, dinh dưỡng và giải phẫu học về cơ và chuyển động của cơ thể người; họ còn là những người đồng hành đầy trách nhiệm và năng lượng để thúc đẩy hội viên vươn tới những giới hạn mới.</p>
                    <p id="3">Hiểu được nhu cầu và thể trạng mỗi người một khác, không có chương trình tập luyện nào phù hợp cho tất cả. Vì thế với từng khách hàng, các coach đều có quá trình tìm hiểu, nghiên cứu, phân tích tình trạng cơ thể một cách kỹ lưỡng, và thiết kế ra chương trình tập luyện phù hợp dành riêng cho họ</p>
                </div>   
                <div class="image">
                    <img src="./assets/image/trainer_page/title/title-1.jpeg" alt="">
                </div>   
            </div>
        </div>

        <div class="box-container">
            <h2>Phương pháp đào tạo Coach tại SUF</h2>
            <div class="line"></div>
            <div class="box">
                <div class="image">
                    <img src="./assets/image/trainer_page/title/title-1.jpeg" alt="">
                </div> 
                <div class="title">
                    <p id="1">Đội ngũ coach ở Swequity phải trải qua một chương trình đào tạo 3 tháng bài bản và thực hiện những bài kiểm tra kiến thức ngặt nghèo. Chỉ những người xuất sắc nhất mới được giữ lại và trở thành coach chính thức ở Swequity.</p>
                    <p>Phương pháp đào tạo của chúng tôi chú trọng vào kiến thức chuyên môn, kĩ năng sư phạm và kĩ năng tìm hiểu, phân tích, chẩn đoán vấn đề cơ thể, để mỗi người coach đều đủ năng lực thiết kế ra chương trình luyện tập mang lại hiệu quả cho khách hàng.</p>
                </div>     
            </div>
        </div>
    </section>

    <!-- senior coach -->
    <section class="trainers" style="background-image: url('./assets/image/trainer_page/info-pt/bg1.png');">
        <h1 class="heading">Senior<span> coach</span></h1>
        <div class="trainer-slider">
            <div class="wrapper">
                <?php
                    $c = new config;
                    $conn = $c->connect();
                    $sql = "select G.dir gdir,G.img_name gimgname,P.lname,P.trainer_job, P.person_id FROM galery G INNER JOIN person_trainer P ON G.item_id = P.person_trainer_id WHERE G.galery_type_name = 'person_trainer' AND P.flag = '1';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    foreach($results as $row) {
                        echo '<div class="swiper-slide box">
                                    <a href="./infomation-trainer.php?trainerID='.$row["person_id"].'">
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