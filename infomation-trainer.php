<?php require_once('./testschedule/db-connect.php'); 
    require_once('./testconnect/employee.php');    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- link icon -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/83128b721a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!-- link swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/navbar.css">
    <link rel="stylesheet" href="./assets/css/information-trainer.css">
    <!-- link schedule -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
</head>
<body>
    <?php include("navbar.php")?>

    <div class="container">
        <div class="other-options">
            <h2>BÀI VIẾT LIÊN QUAN</h2>
            <div class="line"></div>
            <div class="options">
                <div class="image">
                    <img src="./assets/image/trainer_page/info-pt/đặng-đức-đông.jpg" alt="">
                </div>
                <div class="name">ĐẶNG ĐỨC ĐÔNG</div>
            </div>

            <div class="options">
                <div class="image">
                    <img src="./assets/image/trainer_page/info-pt/đặng-đức-đông.jpg" alt="">
                </div>
                <div class="name">ĐẶNG ĐỨC ĐÔNG</div>
            </div>

            <div class="options">
                <div class="image">
                    <img src="./assets/image/trainer_page/info-pt/đặng-đức-đông.jpg" alt="">
                </div>
                <div class="name">ĐẶNG ĐỨC ĐÔNG</div>
            </div>

            <div class="options">
                <div class="image">
                    <img src="./assets/image/trainer_page/info-pt/đặng-đức-đông.jpg" alt="">
                </div>
                <div class="name">ĐẶNG ĐỨC ĐÔNG</div>
            </div>

            <div class="options">
                <div class="image">
                    <img src="./assets/image/trainer_page/info-pt/đặng-đức-đông.jpg" alt="">
                </div>
                <div class="name">ĐẶNG ĐỨC ĐÔNG</div>
            </div>
        </div>
        <div class="main-info">
            <div class="info">
                <?php $id = $_GET['trainerID'];
                    $trainer = new employeeInfo();
                    $info = $trainer->showInfoTrainer($id);
                    for($i=0; $i<count($info); $i++){
                        $s = $info[$i];
                ?> 
                <div class="image-main">
                    <img src="./assets/image/trainer_page/info-pt/<?php echo $s->image?>" alt="">
                </div>
                <div class="infomation"> 
                    <h2 class="name"><?php echo $s->fname." ". $s->mname." ".$s->lname;?></h2>
                    <h4 class="job">HLV/ JUNIOR COACH</h2>
                    
                    <p class="Personality-traits">
                        Tính cách: lạc quan, vui vẻ hòa đồng, trong công việc nghiêm túc, kỷ luật.
                    </p>
                    <p class="experience">
                    Kinh nghiệm làm việc: 5 năm huấn luyện viên, 9 năm tập luyện, hai bằng HLV liên đoàn cử tạ Việt Nam LV2-3
                    </p>
                    <p class="motto">
                    Phương châm coaching: Cân bằng giữa cuộc sống cá nhân và tập luyện để cải thiện chất lượng cuộc sống. Sự kỷ luật sẽ dẫn chúng ta tới mục tiêu đề ra. Sự kỷ luật của khách hàng đến từ người HLV của họ.
                    </p>
                    <p class="style">
                    Phong cách coaching: khá kỹ tính trong việc đảm bảo hiệu suất tập luyện, tuy nhiên vẫn cần sự cân bằng với tậm trạng của khách hàng. Hay tâm sự và nói chuyện về chuyên môn với khách hàng.
                    </p>
                </div>
                
            </div>

            <div class="calender">
                <div class="container1 py-5" id="page-container">
                    <div class="row">
                        <div class="col-md-9">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <!-- Event Details Modal -->
                <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-0">
                            <div class="modal-header rounded-0">
                                <h5 class="modal-title">Schedule Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body rounded-0">
                                <div class="container-fluid">
                                    <dl>
                                        <dt class="text-muted">Title</dt>
                                        <dd id="title" class="fw-bold fs-4"></dd>
                                        <dt class="text-muted">Description</dt>
                                        <dd id="description" class=""></dd>
                                        <dt class="text-muted">Start</dt>
                                        <dd id="start" class=""></dd>
                                        <dt class="text-muted">End</dt>
                                        <dd id="end" class=""></dd>
                                    </dl>
                                </div>
                            </div>
                            <!-- <div class="modal-footer rounded-0">
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                                    <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Details Modal -->  
            <?php 
            $schedules = $conn->query("SELECT * FROM employee INNER JOIN schedule ON employee.person_id = schedule.person_id WHERE employee.person_id='001202223337';");
            $sched_res = [];
            foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
                $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
                $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
                $sched_res[$row['id']] = $row;
            }
            ?>
            <?php 
            if(isset($conn)) $conn->close();
            ?>
            </body>
            <script>
                var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
            </script>
        </div>
    </div>
    <?php }?>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</body>
</html>