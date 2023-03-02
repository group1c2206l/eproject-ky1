<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./assets/css/course.css">
        <link rel="stylesheet" href="./Course/fonts/fontawesome-free-6.3.0-web/fontawesome-free-6.3.0-web/css/all.min.css">
    </head>
    <body>
        <div class="wrapper">
           <div class="container">
                <div class="row1" style="background-image: url(./assets/image/anh/kickfit-mma.jpg);background-size: cover;height: 685px;position: relative;">
                    <div class="messenger">
                        <a href=""><img src="./assets/image/anh/fb-messenger.png" alt=""></a>
                    </div>
                    <div class="row-content">
                        <div class="tittle">
                            <h1>Matial arts</h1>
                            <p>
                                Võ thuật (martial arts) là một hình thức nghệ thuật, thể thao và tự vệ<br>
                                được phát triển từ các kỹ năng và chiến thuật chiến đấu. Võ thuật bao gồm<br>
                                nhiều phương pháp và hình thức khác nhau, từ các bộ môn truyền thống của<br>
                                châu Á như Karate, Taekwondo, Kung Fu và Judo đến các hình thức hiện đại<br>
                                như Kickboxing, MMA (Mixed Martial Arts) và Krav Maga.
                            </p>
                        </div>
                        <div class="learn-about" >
                            <a href=""><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                            <div style="position: absolute; top: 40%; left: 20%; transform: translate(-50%, -50%); z-index: 1;">
                            <a href=""><p>Tìm hiểu thêm</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row2" style=" background-image: url(./assets/image/anh/c2.jpg); background-size: cover;height: 620px;position: relative;">
                    <div class="row-content">
                        <div class="tittle">
                            <h1>Gym & fitness</h1>
                            <p>
                                Phòng tập gym và tập luyện fitness là nơi mà người tập thể dục và rèn luyện<br>
                                sức khỏe bằng cách sử dụng các thiết bị tập luyện và các bài tập thể dục. Tập<br>
                                luyện thể dục và rèn luyện sức khỏe là một phần quan trọng của một lối sống<br>
                                lành mạnh, và phòng tập gym và tập luyện fitness cung cấp một môi trường thuận<br>
                                tiện và chuyên nghiệp để thực hiện việc này.
                            </p>
                        </div>
                        <div class="learn-about">
                            <a href=""><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                            <div style="position: absolute; top: 40%; left: 20%; transform: translate(-50%, -50%); z-index: 1;">
                            <a href=""><p>Tìm hiểu thêm</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row3" style=" background-image: url(./assets/image/anh/dancee.jpg); background-size: cover;height: 620px;position: relative;">
                    <div class="row-content">
                        <div class="tittle">
                            <h1>Dance</h1>
                            <p>
                                Dance là một nghệ thuật biểu diễn mà nó thể hiện qua những bước nhảy phối</br>
                                hợp với âm nhạc. Nó có thể được thực hiện một mình hoặc nhóm, trong phòng tập,</br>
                                trên sân khấu hoặc trên đường phố. Dance đã trở thành một phần của nhiều nền</br>
                                văn hóa và được phát triển với nhiều phong cách khác nhau, từ ballet cổ điển đến</br>
                                hip-hop đương đại.</br>
                            </p>
                        </div>
                        <div class="learn-about">
                            <a href=""><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                            <div style="position: absolute; top: 40%; left: 20%; transform: translate(-50%, -50%); z-index: 1;">
                            <a href=""><p>Tìm hiểu thêm</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row3" style=" background-image: url(./assets/image/anh/zumm_auto_x2.jpg); background-size: cover;height: 620px;position: relative;">
                   <div class="row-content">
                    <div class="tittle">
                        <h1>Zumba</h1>
                        <p>
                            Zumba là một loại hình thể dục thể thao kết hợp giữa các bài tập nhảy và nhạc latin.<br>
                            Nó đã trở thành một trào lưu tập thể dục phổ biến trên toàn thế giới với hàng triệu người<br>
                            tham gia mỗi ngày.<br>
                        </p>
                   </div>
                    <div class="learn-about">
                        <a href=""><img src="./assets/image/anh/btn-orange-1.png" alt=""></a>
                        <div style="position: absolute; top: 40%; left: 20%; transform: translate(-50%, -50%); z-index: 1;">
                        <a href=""><p>Tìm hiểu thêm</p></a>
                        </div>
                    </div>
                   </div>
                </div>
           </div>
        </div>
        <script>
            window.addEventListener('scroll',function(){
                const header = document.querySelector('header');
                header.classList.toggle('header-fixed',window.scrollY >0);
            });
        </script>
    </body>
</html>