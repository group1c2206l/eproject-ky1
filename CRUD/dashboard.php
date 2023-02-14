<?php
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
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        body {
            position: relative;
            z-index: 0;
        }
        .dashboard {
            min-width: 1200px;
         }
         .menu-body {
            width: 100%;
         }
    	.mmm {
            min-width: 33.3%;
            display: inline-block;
            height: 50px;
        }
        .table-result td {
            color: white;
        }
        .search-bar {
            width: 100%;
            height: 40px;
        }
        #search-box {
            margin-left: 40px;
            height: 100%;
            padding: 0 5px;
            border-radius: 5px;
            margin-top: 2px;
        }
        #search_list {
            height: 100%;
            padding: 0 5px;
            border-radius: 5px;
        }
        .noti {
            display: inline-block;
            padding: 30px;
            border: 1px solid chocolate;
            background-color: orange;
            position: absolute;
            z-index: 10;
            top: 0;
        }
    </style>
</head>
<body class="bg-secondary">
	<div class="dashboard container-fluid position-relative">

		<!-- <div class="dropdown border position-absolute top-0 start-40">
			<a class="nav-link  table-hover dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"> USER: <?php echo $_COOKIE["user_name"]  ?></a>
			<ul class="dropdown-menu bg-warning">
				<li><a class="dropdown-item " href="index.php?product=accessory">Change Password</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="logout.php">Logout</a></li>
			</ul>
		</div> -->

		<h1 class="text-center text-warn mt-3">DASHBOARD PAGE</h1>
        <div class="menu-body bg-dark">
            <table class="table table-dark home-menu container-lg">
                <tr>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=role" ><i class="bi bi-person"></i>  Account</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=branch" ><i class="bi bi-building-add"></i>  Branch</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=employee" ><i class="bi bi-person-bounding-box"></i>  Employee</a></div></td>
                </tr>
                <tr>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=member" ><i class="bi bi-bookmarks"></i>  Member</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=utilities" ><i class="bi bi-apple"></i>  Utilities</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=brand" ><i class="bi bi-microsoft"></i>  Device</a></div></td>
                </tr>
                <tr>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=service"><i class="bi bi-gift-fill"></i>  Service</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=package" ><i class="bi bi-images"></i>  Package</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="dashboard.php?select=galery" ><i class="bi bi-images"></i>  Galery</a></div></td>
                </tr>
                <tr>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="../index.php"><i class="bi bi-house-heart-fill"></i>  Home</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="logout.php"><i class="bi bi-box-arrow-in-left"></i>  Logout</a></div></td>
                    <td class="text-start align-middle mmm"><div class="dblink" style="width: 100px; margin-left: calc(50% - 50px);"><a class="fw-bold text-light open text-decoration-none"  href="logout.php"></a></div></td>
                </tr>
            </table>
        </div>
        <!-- Khoi tim kiem -->
        <div class="">
            <form action="" method="GET" class="search-bar <?php if($select == "") {echo "d-none";} else {echo "d-block";}  ?>">
                <button class="btn btn-primary <?php if($select == "galery") echo "d-none"  ?>"><a class="text-light" href="addnew.php?select=<?php  echo $select ?>">Add new</a></button>
                <input type="text" class="d-none" name="select" value="<?php  echo $select ?>">
                <input type="text" id="search-box" name="search_data">
                <select name="search_list" id="search_list">
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
                           case "utilities":
                                $arr = ["name","points"];
                                $s = new utilities;
                                $s->search_list($arr);
                                break;
                       }
                   ?>
                </select>
                
                <button type="submit" class="btn btn-primary" value="send" name="search">Search</button>
            </form>
        </div>
     
         <table class="table table-result">
            <?php
                


                    switch($select) {
                        
                        case "role":
                            $p = new role;
                            $p->show_header();
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
                            if($search_data == NULL && $search_list == NULL) {
                                $results = $p->arr_result("branch");
                            } else {
                                if($search_data == "") {
                                    $results = [];
                                    echo "
                                        <script>alert('Please enter value on search box !')</script>
                                    ";
                                } else {
                                    $results = $p->search_item('branch', $search_list,$search_data);
                                    if(count($results)<1) {
                                        echo "khong co gia tri nao phu hop";
                                    }}
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
                        
                        case "utilities":
                            $p = new utilities;
                            $p->show_header();
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
                        // case "galery":  // hien thi danh muc galery
                        //     $a = new config;
                        //     $conn = $a->connect();
                        //     $p = new galery;
                        //     $p->show_header();
                        //     $sql1 = "SELECT P.PRODUCT_ID,P.NAME PNAME,C.NAME CNAME FROM product P INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID"; //hien thi toan bo danh sach product da co
                        //     $stmt1 = $conn->prepare($sql1);
                        //     $stmt1->execute();
                        //     $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                        //     foreach($results1 as $row1) {
                        //         $p->product_id = $row1["PRODUCT_ID"];
                        //         $p->product_name = $row1["PNAME"];
                        //         $p->category = $row1["CNAME"];
                        //         $sql_product = "SELECT COUNT(PRODUCT_ID) NUM FROM galery WHERE PRODUCT_ID = ".$p->product_id." "; //kiem tra xem san pham da ton tai trong galery hay chua
                        //         $check = $conn->prepare($sql_product);
                        //         $check->execute();
                        //         $num = $check->fetchColumn();
                        //         if($num>0) {  //neu san pham da ton tai anh thi hien thi thong tin
                        //             $sql = "SELECT G.GALERY_ID,G.PRODUCT_ID,G.DIR,G.FILENAME,CONCAT(G.DIR,G.FILENAME) PICTURE,G.CREATE_AT,G.UPDATE_AT FROM `galery` G INNER JOIN product P ON G.PRODUCT_ID = P.PRODUCT_ID "
                        //             ."WHERE G.PRODUCT_ID = ".$p->product_id." ";
                        //             $tsql = $conn->prepare($sql);
                        //             $tsql->execute();
                        //             $results = $tsql->fetchAll(PDO::FETCH_ASSOC);
                        //             $p->galery_id = $results[0]["GALERY_ID"];
                        //             $p->dir = $results[0]["DIR"];
                        //             $p->filename = $results[0]["FILENAME"];
                        //             $p->fullpart = $results[0]["PICTURE"];
                        //             $p->create_at = $results[0]["CREATE_AT"];
                        //             $p->update_at = $results[0]["UPDATE_AT"];
                        //         } else { //neu chua ton tai thi de trong cac muc tren
                        //             $p->galery_id = "";
                        //             $p->dir = "";
                        //             $p->filename = "";
                        //             $p->fullpart = "";
                        //             $p->create_at = "";
                        //             $p->update_at = "";
                        //         }
                        //         $p->show_item();    
                        //     }
                        //     $conn = NULL;
                        //     break;

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