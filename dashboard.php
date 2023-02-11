<?php
    require "config.php";
    require "classlist.php";



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
    	.mmm {height: 50px};
		a	{
			display: inline-block;
			padding-left: 20px !important;
			color: red !important;
		};
		.dashboard {
			min-width: 1200px;
		 }
        .table-result td {
            color: white;
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

		<h1 class="text-center mt-3">DASHBOARD PAGE</h1>
		<table class="table table-dark home-menu w-100">
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=roles" ><i class="bi bi-person"></i>  Account</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=branch" ><i class="bi bi-building-add"></i>  Branch</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=employee" ><i class="bi bi-person-bounding-box"></i>  Employee</a></td>
			</tr>
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=category" ><i class="bi bi-bookmarks"></i> Category</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=platform" ><i class="bi bi-apple"></i>  OS</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=brand" ><i class="bi bi-microsoft"></i>  Brand</a></td>
			</tr>
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=product"><i class="bi bi-gift-fill"></i>  Product</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=description" ><i class="bi bi-images"></i>  Description</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="dashboard.php?select=galery" ><i class="bi bi-images"></i>  Galer</a></td>
			</tr>
			<tr>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="index.php"><i class="bi bi-house-heart-fill"></i>  Home</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="logout.php"><i class="bi bi-box-arrow-in-left"></i>  Logout</a></td>
				<td class="text-start align-middle mmm"><a class="fw-bold text-light open text-decoration-none" style="padding-left: 20px;" href="logout.php"></a></td>
			</tr>
		</table>

        <?php
            if(isset($_GET["select"])) {
                $select = $_GET["select"];
            }
        ?>
         <button class="btn btn-primary <?php if($select == "galery") echo "d-none"  ?>"><a class="text-light" href="addnew.php?select=<?php  echo $select ?>">Add new</a></button>
        
         <table class="table table-result">
            <?php
                function arr_result($query) {
                    $a = new config;
                    $conn = $a->connect();
                    $sql = "SELECT * FROM ".$query." ";
                    $tsql = $conn->prepare($sql);
                    $tsql->execute();
                    return $tsql->fetchAll(PDO::FETCH_ASSOC);
                }

                if(isset($_GET["select"])) {
                    $select = $_GET["select"];
                    switch($select) {
                        case "roles":
                            $p = new roles;
                            $p->show_header();
                            $results = arr_result("roles");
                            foreach($results as $row) {
                                $p->flag = $row["flag"];
                                if($p->flag == 1) {
                                    $p->role_id = $row["roles_id"];
                                    $p->user_name = $row["user_name"];
                                    $p->password_hash = $row["password_hash"];
                                    $p->employee_name = "nam";
                                    $p->create_at = $row["create_at"];
                                    $p->update_at = $row["update_at"];
                                    $p->show_item();
                                }
                            }
                            break;
                        case "product":
                            $a = new config;
                            $conn = $a->connect();
                            $sql = "SELECT * FROM product";
                            $tsql = $conn->prepare($sql);
                            $tsql->execute();
                            $results = $tsql->fetchAll(PDO::FETCH_ASSOC);
                            $p = new product;
                            $p->show_header();
                            foreach($results as $row) {
                                $p->product_id = $row["PRODUCT_ID"];
                                $p->product_name = $row["NAME"];
                                $p->category_id = $p->id_to_name($conn,"NAME","category","CATEGORY_ID",$row["CATEGORY_ID"]);
                                $p->os_id = $p->id_to_name($conn,"NAME","platform","OS_ID",$row["OS_ID"]);
                                $p->brand_id = $p->id_to_name($conn,"NAME","brand","BRAND_ID",$row["BRAND_ID"]);
                                $p->cpu_brand = $row["CPU_BRAND"];
                                $p->cpu_name = $row["CPU_NAME"];
                                $p->ram = $row["RAM"];
                                $p->screen_type = $row["SCREEN_TYPE"];
                                $p->screen_size = $row["SCREEN_SIZE"];
                                $p->battery = $row["BATTERY"];
                                $p->camera = $row["CAMERA"];
                                $p->price = $row["PRICE"];
                                $p->discount = $row["DISCOUNT"];
                                $p->create_at = $row["CREATE_AT"];
                                $p->update_at = $row["UPDATE_AT"];

                                $p->show_item();
                            }
                        break;

                        case "brand":  // hien thi danh muc brand
                            $p = new brand;
                            $p->show_header();
                            $results = arr_result("brand");
                            foreach($results as $row) {
                                $p->brand_id = $row["BRAND_ID"];
                                $p->name = $row["NAME"];
                                $p->country = $row["COUNTRY"];
                                $p->create_at = $row["CREATE_AT"];
                                $p->update_at = $row["UPDATE_AT"];

                                $p->show_item();
                            }
                            break;

                        case "category":  // hien thi danh muc brand
                            $p = new category;
                            $p->show_header();
                            $results = arr_result("category");
                            foreach($results as $row) {
                                $p->category_id = $row["CATEGORY_ID"];
                                $p->name = $row["NAME"];
                                $p->description = $row["DESCRIPTION"];
                                $p->code = $row["CATEGORY_CODE"];
                                $p->create_at = $row["CREATE_AT"];
                                $p->update_at = $row["UPDATE_AT"];

                                $p->show_item();
                            }
                            break;

                        case "platform":  // hien thi danh muc brand
                            $p = new platform;
                            $p->show_header();
                            $results = arr_result("platform");
                            foreach($results as $row) {
                                $p->os_id = $row["OS_ID"];
                                $p->name = $row["NAME"];
                                $p->version = $row["VERSION"];
                                $p->create_at = $row["CREATE_AT"];
                                $p->update_at = $row["UPDATE_AT"];

                                $p->show_item();
                            }
                            break;

                        case "galery":  // hien thi danh muc galery
                            $a = new config;
                            $conn = $a->connect();
                            $p = new galery;
                            $p->show_header();
                            $sql1 = "SELECT P.PRODUCT_ID,P.NAME PNAME,C.NAME CNAME FROM product P INNER JOIN category C ON P.CATEGORY_ID = C.CATEGORY_ID"; //hien thi toan bo danh sach product da co
                            $stmt1 = $conn->prepare($sql1);
                            $stmt1->execute();
                            $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                            foreach($results1 as $row1) {
                                $p->product_id = $row1["PRODUCT_ID"];
                                $p->product_name = $row1["PNAME"];
                                $p->category = $row1["CNAME"];
                                $sql_product = "SELECT COUNT(PRODUCT_ID) NUM FROM galery WHERE PRODUCT_ID = ".$p->product_id." "; //kiem tra xem san pham da ton tai trong galery hay chua
                                $check = $conn->prepare($sql_product);
                                $check->execute();
                                $num = $check->fetchColumn();
                                if($num>0) {  //neu san pham da ton tai anh thi hien thi thong tin
                                    $sql = "SELECT G.GALERY_ID,G.PRODUCT_ID,G.DIR,G.FILENAME,CONCAT(G.DIR,G.FILENAME) PICTURE,G.CREATE_AT,G.UPDATE_AT FROM `galery` G INNER JOIN product P ON G.PRODUCT_ID = P.PRODUCT_ID "
                                    ."WHERE G.PRODUCT_ID = ".$p->product_id." ";
                                    $tsql = $conn->prepare($sql);
                                    $tsql->execute();
                                    $results = $tsql->fetchAll(PDO::FETCH_ASSOC);
                                    $p->galery_id = $results[0]["GALERY_ID"];
                                    $p->dir = $results[0]["DIR"];
                                    $p->filename = $results[0]["FILENAME"];
                                    $p->fullpart = $results[0]["PICTURE"];
                                    $p->create_at = $results[0]["CREATE_AT"];
                                    $p->update_at = $results[0]["UPDATE_AT"];
                                } else { //neu chua ton tai thi de trong cac muc tren
                                    $p->galery_id = "";
                                    $p->dir = "";
                                    $p->filename = "";
                                    $p->fullpart = "";
                                    $p->create_at = "";
                                    $p->update_at = "";
                                }
                                $p->show_item();    
                            }
                            $conn = NULL;
                            break;
                                
                        case "description":
                            $p = new description;
                            $p->show_header();
                            $results = arr_result("description");
                            foreach($results as $row) {
                                $p->description_id = $row["DESCRIPTION_ID"];
                                $p->product_id = $row["PRODUCT_ID"];
                                $p->product_name = $p->id_to_name('NAME','product','PRODUCT_ID',$p->product_id);
                                $p->summary = $row["SUMMARY"];
                                $p->content = $row["CONTENT"];
                                $p->create_at = $row["CREATE_AT"];
                                $p->update_at = $row["UPDATE_AT"];

                                $p->show_item();
                            }
                            break;

                        case "account":

                            
                    
                    }                   
                }
                
            ?>
        </table>




    </div>
</body>
</html>