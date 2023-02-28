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
    <link rel="stylesheet" href="./assets/css/service.css">
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
    <div class=" d-flex flex-wrap justify-content-center">
            <div class="item " >
                <div class="item-text d-flex flex-column fade-in-left ">
                    <h1>Cycling</h1>
                    <h2>ĐẲNG CẤP QUỐC TẾ</h2>
                    <p>Hãy tới chúng tôi để cùng nhau phát triển bản thân<br>
                        Cùng giúp nhau có một cơ thể khỏe mạnh</p>
                        <div class="text-box d-flex justify-content-center text-center">
                            <p>TẶNG 1 BUỔI TRẢI NGHIỆM MIỄN PHÍ</p>
                        </div>
                        <button class="btn d-flex justify-content-center text-center"><p>ĐĂNG KÝ NGAY</p></button>    
                </div>
                <div class="item-con "></div>
            </div>
            <div class="item1 " >
                <img class="fade-in-left" src="./img/pexels-nathan-cowley-1089164-removebg.png" alt="Gym And Fitness">
                <div class="item-text2 d-flex flex-column fade-in-right">
                    <h1>Đạp xe chưa bao giờ tuyệt vời đến thế !</h1>
                    <div class="item-hr"></div>
                    <p>Cycling là một hoạt động giải trí và thể dục đầy mạnh mẽ, 
                        với việc sử dụng một chiếc xe đạp để di chuyển từ nơi này đến nơi khác.
                        Nó cũng là một hình thức hoạt động giải trí cực kỳ sức khỏe, giúp bạn giảm cân, 
                        tăng sức mạnh và tốt cho sức khỏe của bạn. 
                        Cycling có thể làm tại bất kỳ nơi nào, 
                        từ đường phố của thành phố đến khu vực ngoại ô hoặc quần thể đồi núi. 
                        Nó cũng có thể là một hoạt động cộng đồng, với nhiều nhóm đạp xe và sự kiện được tổ chức hàng năm. 
                        Tất cả trong tất cả, cycling là một trải nghiệm tuyệt vời cho cả cơ thể và tâm hồn của bạn.</p>
                    <button class="cta">
                        <span class="hover-underline-animation"> TÌM HIỂU THÊM </span>
                        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                            <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                        </svg>
                    </button>    
                </div>
            </div>
        </div>







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
    <!-- custom -->
    <script src="https://kit.fontawesome.com/83128b721a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./assets/js/index.js"></script>
</body>
</html>