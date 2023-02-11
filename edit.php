<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit</title>
</head>
<body>
    <div class="container">

<?php
    require "classlist.php";

    if(isset($_GET["editid"])) {
        $editid = $_GET["editid"];
        
    }

    switch($editid) {
        case "role":
            
            $p = new role;
            if(isset($_GET["role_id"])) {
                $p->role_id = $_GET["role_id"];
            }
            if(isset($_GET["user_name"])) {
                $p->user_name = $_GET["user_name"];
            }
            if(isset($_POST["save"])) {
                if(isset($_POST["current_password"]) && isset($_POST["new_password"]) ) {
                    $p->password_hash = sha1($_POST["current_password"]);
                    $p->new_password_hash = sha1($_POST["new_password"]);
                    if($p->check_current_pass()) {   //kiem tra current password
                        if($p->regexp($_POST["new_password"])) {
                            $p->edit();
                            header("location: dashboard.php?select=role");
                        } else {
                            echo "password chi su dung chu thuong, chu hoa , chu so va @";
                        }
                    } else {
                        echo "password hien tai khong chinh xac";
                    }
                    
                } else {
                    echo "Nhap day du thong tin";
                }
            }

            echo   '<div class="mt-5 num">
                        <h3 class="text-center">Change Password</h3>
                        <form action=""  method="POST">
                            <div class="form-group mb-3 mt-6">
                                <label  for="brand_name">User name</label>
                                <input type="text" class="form-control" id="brand_name" name="user_name" value="'.$_GET["user_name"].'" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_code">Current Password</label>
                                <input type="text" class="form-control" id="country" name="current_password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_code">New Password</label>
                                <input type="text" class="form-control" id="country" name="new_password">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                            <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=role">Back</a></button>
                            <span><?php echo $mes ?></span>
                        </form>
                    </div>';
            break;

        case "product":
            require_once "config.php";
            require "show-manage.php";
            $a = new config;
            $conn = $a->connect();
            $p = new product;
            $p->product_id = $_GET["product_id"];
            if(isset($_POST["save"])) {
                if(isset($_POST["product_name"]) && isset($_POST["category_id"]) && isset($_POST["os_id"]) && isset($_POST["brand_id"]) && isset($_POST["cpu_brand"]) && isset($_POST["cpu_name"])&& isset($_POST["ram"]) && isset($_POST["screen_type"])&& isset($_POST["screen_size"]) && isset($_POST["battery"]) && isset($_POST["camera"]) && isset($_POST["price"]) && isset($_POST["discount"])) {
                    $p->product_name = $_POST["product_name"];
                    $p->category_id = $_POST["category_id"];
                    $p->os_id =  $_POST["os_id"];
                    $p->brand_id = $_POST["brand_id"];
                    $p->cpu_brand = $_POST["cpu_brand"];
                    $p->cpu_name = $_POST["cpu_name"];
                    $p->ram = $_POST["ram"];
                    $p->screen_type = $_POST["screen_type"];
                    $p->screen_size = $_POST["screen_size"];
                    $p->battery = $_POST["battery"];
                    $p->camera = $_POST["camera"];
                    $p->price = $_POST["price"];
                    $p->discount = $_POST["discount"];
                    // print_r($p);
                    $p->edit($conn);
                } else {
                    echo "Vui long dien day du thong tin";
                }
            }


            echo   '<div class="mt-5 num" >
                                    <h3 class="text-center">Add new Product</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="">Product name</label>
                                            <input type="text" class="form-control"  name="product_name" value="'.$_GET["name"].'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Category</label>
                                            <select name="category_id" id="" class="form-control">';
                                                  
                                                $p->list_category($conn,$_GET["category"]);

                        echo                '</select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">OS</label>
                                            <select name="os_id" id="" class="form-control">';
                                                $p->list_platform($conn,$_GET["os"]);
                        echo                 '</select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Brand</label>
                                            <select name="brand_id" id="" class="form-control">';
                                                $p->list_brand($conn,$_GET["brand"]);
                        echo                '</select>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <label for="">Cpu brand</label>
                                            <input type="text" class="form-control"  name="cpu_brand" value="'.$_GET["cpu_brand"].'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Cpu name</label>
                                            <input type="text" class="form-control"  name="cpu_name" value="'.$_GET["cpu_name"].'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Ram</label>
                                            <input type="text" class="form-control"  name="ram" value="'.$_GET["ram"].'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Screen type</label>
                                            <input type="text" class="form-control"  name="screen_type" value="'.$_GET["screen_type"].'">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Screen size</label>
                                            <input type="text" class="form-control"  name="screen_size" value="'.$_GET["screen_size"].'">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Battery</label>
                                            <input type="text" class="form-control"  name="battery" value="'.$_GET["battery"].'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Camera</label>
                                            <input type="text" class="form-control"  name="camera" value="'.$_GET["camera"].'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Price</label>
                                            <input type="number" class="form-control"  name="price" value="'.$_GET["price"].'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Discount</label>
                                            <input type="number" class="form-control"  name="discount" value="'.$_GET["discount"].'">
                                        </div>

                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="manage.php?select=product">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
    }





?>


    </div>
</body>
</html>



