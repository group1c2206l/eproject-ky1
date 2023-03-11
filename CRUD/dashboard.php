<?php
    require "../request.php";
    require "../classlist.php";
    $select = "";
    if(isset($_GET["select"])) {
        $select = $_GET["select"];
    }
    $search_data = NULL;
    if(isset($_GET["search_data"])) {
        $search_data = $_GET["search_data"];
    }
    $search_list = NULL;
    if(isset($_GET["search_list"])) {
        $search_list = $_GET["search_list"];
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>
<body class="container-fluid bg-secondary ">
   
	<div class="dashboard container-fluid  pt-4">
        
		<h1 class="text-center text-warning mt-3">DASHBOARD PAGE</h1>
        <div class="user dropdown border border-warning rounded rounded-3 mb-2">
            <a class="nav-link  table-hover dropdown-toggle p-1 text-light " href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"> USER: <?php echo $_COOKIE["user"]  ?></a>
            <ul class="dropdown-menu bg-warning">
                <li><a class="dropdown-item " href="edit.php?edit_id=role&user_name=<?php echo $_COOKIE["user"]  ?>">Change Password</a></li>
                <li><a class="dropdown-item " href="../index.php">Home</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="menu-body bg-dark border border-warning rounded rounded-3">
            <table class="table table-dark home-menu container-lg mt-2">
                <tr>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=role" ><i class="bi bi-person"></i>  Account</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=branch" ><i class="bi bi-building-add"></i>  Branch</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=employee" ><i class="bi bi-person-bounding-box"></i>  Employee</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=member" ><i class="bi bi-person-fill-add"></i>  Member</a></div></td>
                </tr>
                <tr>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=person_trainer" ><i class="bi bi-person-workspace"></i>  Person Trainer</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=device" ><i class="bi bi-motherboard"></i>  Device</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=service"><i class="bi bi-bank"></i>  Service</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=package" ><i class="bi bi-box-seam-fill"></i>  Package</a></div></td>
                </tr>
                <tr>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=utilities" ><i class="bi bi-apple"></i>  Utilities</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=course" ><i class="bi bi-journal-check"></i>  Course</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=galery_type" ><i class="bi bi-file-earmark-image"></i>  Galery Type</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" ><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=galery" ><i class="bi bi-images"></i>  Galery</a></div></td>
                </tr>
            </table>
        </div>
        <!-- Khoi tim kiem -->
        <div class="">
            <form action="" method="GET" class="search-bar <?php if($select == "") {echo "d-none";} else {echo "d-block";}  ?>" onsubmit="return search_item()">
                <button class="btns <?php if($select == "member") echo "d-none"  ?>"><a class="text-light" href="addnew.php?select=<?php  echo $select ?>">Add new</a></button>
                <input type="hidden" class="d-none" name="select" value="<?php  echo $select ?>">
                <input type="text" id="search_data"  name="search_data" placeholder="Input content here:">
                <select name="search_list" id="search_list">
                    <option selected disabled>Open this select menu :</option>
                   <?php
                       switch($select) {
                           case "role":
                                $arr = ["user_name"];
                                $s = new role;
                                $s->search_list($arr);
                                break;
                           case "branch":
                                $arr = ["name","address","hotline"];
                                $s = new branch;
                                $s->search_list($arr);
                                break;
                           case "employee":
                                $arr = ["lname","dob","address","phone_number","person_id","email"];
                                $s = new employee;
                                $s->search_list($arr);
                                break;
                           case "person_trainer":
                                $arr = ["lname","dob","address","phone_number","person_id","email","trainer_job"];
                                $s = new person_trainer;
                                $s->search_list($arr);
                                break;
                           case "utilities":
                                $arr = ["name","points"];
                                $s = new utilities;
                                $s->search_list($arr);
                                break;
                           case "device":
                                $arr = ["name","brand"];
                                $s = new device;
                                $s->search_list($arr);
                                break;
                           case "service":
                                $arr = ["name"];
                                $s = new service();
                                $s->search_list($arr);
                                break;
                           case "package":
                                $arr = ["name","points","price"];
                                $s = new package();
                                $s->search_list($arr);
                                break;
                           case "course":
                                $arr = ["name","name","price"];
                                $s = new course();
                                $s->search_list($arr);
                                break;
                           case "member":
                                $arr = ["card_id","fname","lname","address","phone_number","email","vip","package_id","course_id"];
                                $s = new member();
                                $s->search_list($arr);
                                break;
                           case "galery_type":
                                $arr = ["name"];
                                $s = new galery_type();
                                $s->search_list($arr);
                                break;
                           case "galery":
                                $arr = ["galery_type_name","item_name","img_name"];
                                $s = new galery();
                                $s->search_list($arr);
                                break;
                       }
                   ?>
                </select>
                
                <input type="submit" class="btns" value="search" name="search">
            </form>
        </div>
        <script>
            function search_item() {
                let search_data = document.getElementById("search_data");
                let search_list = document.getElementById("search_list");
                console.log(search_list.value);
                if(search_data.value == '') {
                    alert("nhap du lieu tim kiem");
                    return false;
                }
                if(search_list.value == "Open this select menu :") {
                    alert("chon kieu du lieu tim kiem");
                    return false;
                }
                return true;
            }
        </script>
        <!-- Show data -->
         <table class="table table-dark table-hover table-result mt-2 table-bordered ">
            <?php
                    switch($select) {
                        
                        case "role":
                            $p = new role;
                            $p->show_header();
                            $p->show_page("role");
                            if($search_data == NULL) {
                                $results = $p->arr_result("role");
                                
                            } else {
                                $results = $p->search_item('role', $search_list,$search_data);
                                if(count($results)<1) {
                                    echo "khong co gia tri nao phu hop";
                                }
                             }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->role_id = $row["role_id"];
                                    $p->user_name = $row["user_name"];
                                    $p->password_hash = $row["password_hash"];
                                    $p->employee_name = "nam";
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            
                        break;

                        case "branch":
                            $p = new branch;
                            $p->show_header();
                            $p->show_page("branch");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result("branch");
                            } else {
                                $results = $p->search_item('branch', $search_list,$search_data);
                                if(count($results)<1) {
                                    echo "khong co gia tri nao phu hop";
                                }
                            }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->branch_id = $row["branch_id"];
                                    $p->name = $row["name"];
                                    $p->address = $row["address"];
                                    $p->hotline = $row["hotline"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                        break;

                        case "employee":
                            $p = new employee;
                            $p->show_header();
                            $p->show_page("employee");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result("employee");
                            } else {
                                if($search_data == "") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('employee', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
                                }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->employee_id = $row["employee_id"];
                                    $p->fname = $row["fname"];
                                    $p->mname = $row["mname"];
                                    $p->lname = $row["lname"];
                                    $p->dob = $row["dob"];
                                    $p->address = $row["address"];
                                    $p->phone_number = $row["phone_number"];
                                    $p->person_id = $row["person_id"];
                                    $p->email = $row["email"];
                                    $p->contact_name = $row["contact_name"];
                                    $p->contact_phone = $row["contact_phone"];
                                    $p->type = $row["type"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            break;

                        case "person_trainer":
                            $p = new person_trainer;
                            $p->show_header();
                            $p->show_page("person_trainer");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result("person_trainer");
                            } else {
                                if($search_data == "") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('person_trainer', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
                                }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->person_trainer_id = $row["person_trainer_id"];
                                    $p->fname = $row["fname"];
                                    $p->mname = $row["mname"];
                                    $p->lname = $row["lname"];
                                    $p->code = $row["code"];
                                    $p->dob = $row["dob"];
                                    $p->gender = $row["gender"];
                                    $p->address = $row["address"];
                                    $p->phone_number = $row["phone_number"];
                                    $p->person_id = $row["person_id"];
                                    $p->email = $row["email"];
                                    $p->trainer_job = $row["trainer_job"];
                                    $p->evaluate = $row["evaluate"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            break;
                        
                        case "utilities":
                            $p = new utilities;
                            $p->show_header();
                            $p->show_page("utilities");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result("utilities");
                            } else {
                                if($search_data == "") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('utilities', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
                                }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->utilities_id = $row["utilities_id"];
                                    $p->name = $row["name"];
                                    $p->points = $row["points"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            break;

                        case "device":
                            $p = new device;
                            $p->show_header();
                            $p->show_page("device");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result("device");
                            } else {
                                if($search_data == "") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('device', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
                                }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->device_id = $row["device_id"];
                                    $p->name = $row["name"];
                                    $p->brand = $row["brand"];
                                    $p->width = $row["width"];
                                    $p->length = $row["length"];
                                    $p->height = $row["height"];
                                    $p->weight = $row["weight"];
                                    $p->title = $row["title"];
                                    $p->description = $row["description"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            break;
                        
                        case "service":
                            $p = new service();
                            $p->show_header();
                            $p->show_page("service");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result('service');
                            } else {
                                if($search_data == "") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('service', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
                                }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->service_id = $row["service_id"];
                                    $p->name = $row["name"];
                                    $p->title = $row["title"];
                                    $p->description = $row["description"];
                                    $p->flag = $row["flag"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            break;

                        case "package":
                            $p = new package();
                            $p->show_header();
                            $p->show_page("package");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result('package');
                            } else {
                                if($search_data == "" || $search_list == "Open this select menu :") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box or select menu list !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('package', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
                                }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->package_id = $row["package_id"];
                                    $p->name = $row["name"];
                                    $p->mentor = $row["mentor"];
                                    $p->points = $row["points"];
                                    $p->price = $row["price"];
                                    $p->expiry = $row["expiry"];
                                    $p->day_active = $row["day_active"];
                                    $p->flag = $row["flag"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            break;

                        case "course":
                            $p = new course();
                            $p->show_header();
                            $p->show_page("course");
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result('course');
                            } else {
                                if($search_data == "") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('course', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
                                }
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->course_id = $row["course_id"];
                                    $p->name = $row["name"];
                                    $p->person_trainer_id = $row["person_trainer_id"];
                                    $p->mentor = $p->id_to_name("lname","person_trainer","person_trainer_id",$p->person_trainer_id);
                                    $p->description = $row["description"];
                                    $p->start_day = $row["start_day"];
                                    $p->end_day = $row["end_day"];
                                    $p->price = $row["price"];
                                    $p->flag = $row["flag"];
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            $conn = null;
                            break;

                            case "member":
                                $p = new member;
                                $p->show_header();
                                $p->show_page("member");
                                if($search_data == NULL && $search_list == NULL) {
                                    $results = $p->arr_result("member");
                                } else {
                                    if($search_data == "") {
                                        $results = [];
                                        echo "
                                            <script>alert('Please enter value on search box !')</script>
                                        ";
                                    } else {
                                        $results = $p->search_item('member', $search_list,$search_data);
                                        if(count($results)<1) {
                                            echo "khong co gia tri nao phu hop";
                                        }}
                                    }
                                foreach($results as $row) {
                                    $p->flag = $row["flag"];
                                    if($p->flag == 1) {
                                        $p->member_id = $row["member_id"];
                                        $p->card_id = $row["card_id"];
                                        $p->password_hash = $row["password_hash"];
                                        $p->fname = $row["fname"];
                                        $p->mname = $row["mname"];
                                        $p->lname = $row["lname"];
                                        $p->dob = $row["dob"];
                                        $p->address = $row["address"];
                                        $p->phone_number = $row["phone_number"];
                                        $p->vip = $row["vip"];
                                        $p->email = $row["email"];
                                        $p->package_id = $row["package_id"];
                                        $p->course_id = $row["course_id"];
                                        $p->points = $row["points"];
                                        $p->create_at = $row["create_at"];
                                        $p->update_at = $row["update_at"];
                                        $p->show_item();
                                    }
                                }
                                break;

                            case "galery_type":
                                $p = new galery_type;
                                $p->show_header();
                                $p->show_page("galery_type");
                                if($search_data == NULL && $search_list == NULL) {
                                    $results = $p->arr_result("galery_type");
                                } else {
                                    if($search_data == "") {
                                        $results = [];
                                        echo "
                                            <script>alert('Please enter value on search box !')</script>
                                        ";
                                    } else {
                                        $results = $p->search_item('galery_type', $search_list,$search_data);
                                        if(count($results)<1) {
                                            echo "khong co gia tri nao phu hop";
                                        }}
                                    }
                                foreach($results as $row) {
                                    $p->flag = $row["flag"];
                                    if($p->flag == 1) {
                                        $p->galery_type_id = $row["galery_type_id"];
                                        $p->galery_type_name = $row["galery_type_name"];
                                        $p->create_at = $row["create_at"];
                                        $p->update_at = $row["update_at"];
                                        $p->show_item();
                                    }
                                };
                                break;

                            case "galery":
                                $p = new galery;
                                $p->show_header();
                                $p->show_page("galery");
                                if($search_data == NULL && $search_list == NULL) {
                                    $results = $p->arr_result("galery");
                                } else {
                                    if($search_data == "") {
                                        $results = [];
                                        echo "
                                            <script>alert('Please enter value on search box !')</script>
                                        ";
                                    } else {
                                        $results = $p->search_item('galery', $search_list,$search_data);
                                        if(count($results)<1) {
                                            echo "khong co gia tri nao phu hop";
                                        }}
                                    }
                                foreach($results as $row) {
                                    $p->flag = $row["flag"];
                                    if($p->flag == 1) {
                                        $p->galery_id = $row["galery_id"];
                                        $p->galery_type_id = $row["galery_type_id"];
                                        $p->galery_type_name = $row["galery_type_name"];
                                        $p->item_id = $row["item_id"];
                                        $p->item_name = $row["item_name"];
                                        $p->note = $row["note"];
                                        $p->dir = $row["dir"];
                                        $p->img_name = $row["img_name"];
                                        $p->create_at = $row["create_at"];
                                        $p->update_at = $row["update_at"];
                                        $p->show_item();
                                    }
                                }
                                // print_r($p);
                                break;

                    }                 
            ?>
        </table>
        <div class="noti d-none">
            <h5>vui long nhap du thong tin</h5>
        </div>            
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>