
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_GET["select"])) {
                $select = $_GET["select"];
                switch($select) {
                    case "roles":
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center">Add new roles</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label  for="brand_name">User name</label>
                                            <input type="text" class="form-control" id="brand_name" name="brand_name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code">Password</label>
                                            <input type="text" class="form-control" id="country" name="country">
                                        </div>

                                        <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="manage.php?select=brand">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                        if(isset($_POST["save"])) {
                            if(isset($_POST["brand_name"]) && isset($_POST["country"])) {
                                require "show-manage.php";
                                echo $_POST["brand_name"];
                                $b = new brand;
                                $b->name = $_POST["brand_name"];
                                $b->country = $_POST["country"];
                                $b->create_at = "NOW()";
                                $b->addnew();
                                header("location: manage.php?select=brand");
                                
                            }
                        }
                    break;

                    case "category":
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center">Add new Category</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="category_name">Category name</label>
                                            <input type="text" class="form-control" id="category_name" name="category_name">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="category_name">Description</label>
                                            <input type="text" class="form-control" id="category_name" name="description">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code">Code</label>
                                            <input type="text" class="form-control" id="category_code" name="category_code">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="manage.php?select=category">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                        if(isset($_POST["save"])) {
                            if(isset($_POST["category_name"]) && isset($_POST["description"]) && isset($_POST["category_code"])) {
                                require "show-manage.php";
                                $b = new category;
                                $b->name = $_POST["category_name"];
                                $b->description = $_POST["description"];
                                $b->code = $_POST["category_code"];
                                $b->addnew();
                                header("location: manage.php?select=category");
                            }
                        }
                    break;

                    case "platform":
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center">Add new OS</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label class="label label-default" for="os_name">OS name</label>
                                            <input type="text" class="form-control" id="name" name="platform_name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code">Version</label>
                                            <input type="text" class="form-control" id="version" name="version">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php?select=platform">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                        if(isset($_POST["save"])) {
                            if(isset($_POST["platform_name"]) && isset($_POST["version"])) {
                                require "show-manage.php";
                                $b = new platform;
                                $b->name = $_POST["platform_name"];
                                $b->version = $_POST["version"];
                                $b->addnew();
                                header("location: manage.php?select=platform");
                            }
                        }
                    break;

                    case "product":
                        require_once "config.php";
                        require "show-manage.php";
                        $a = new config;
                        $conn = $a->connect();
                        $p = new product;      
                        if(isset($_POST["save"])) {
                            if(isset($_POST["product_name"]) && isset($_POST["category_id"]) && isset($_POST["os_id"]) && isset($_POST["brand_id"])) {   // && isset($_POST["cpu_brand"]) && isset($_POST["cpu_name"])&& isset($_POST["ram"]) && isset($_POST["screen_type"])&& isset($_POST["screen_size"]) && isset($_POST["battery"]) && isset($_POST["camera"]) && isset($_POST["price"]) && isset($_POST["discount"])
                                // $p = new product;
                                $p->product_name = $_POST["product_name"];
                                $p->category_id = $_POST["category_id"];
                                $p->os_id = $_POST["os_id"];
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
                                print_r($p);
                                $p->add($conn);
                                header("location: manage.php?select=product");
                            } else {
                                echo "dien day du thong tin";
                            }
                        }

                        echo   '<div class="mt-5 num" >
                                    <h3 class="text-center">Add new Product</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="">Product name</label>
                                            <input type="text" class="form-control"  name="product_name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Category</label>
                                            <select name="category_id" id="" class="form-control">';
                                                  
                                                $p->list_category($conn,1);

                        echo                '</select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">OS</label>
                                            <select name="os_id" id="" class="form-control">';
                                                $p->list_platform($conn,1);
                        echo                 '</select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Brand</label>
                                            <select name="brand_id" id="" class="form-control">';
                                                $p->list_brand($conn,1);
                        echo                '</select>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <label for="">Cpu brand</label>
                                            <input type="text" class="form-control"  name="cpu_brand">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Cpu name</label>
                                            <input type="text" class="form-control"  name="cpu_name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Ram</label>
                                            <input type="text" class="form-control"  name="ram">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Screen type</label>
                                            <input type="text" class="form-control"  name="screen_type">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Screen size</label>
                                            <input type="text" class="form-control"  name="screen_size">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Battery</label>
                                            <input type="text" class="form-control"  name="battery">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Camera</label>
                                            <input type="text" class="form-control"  name="camera">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Price</label>
                                            <input type="number" class="form-control"  name="price">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Discount</label>
                                            <input type="number" class="form-control"  name="discount">
                                        </div>

                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="manage.php?select=product">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                        
                    break;

                    case "galery":
                        require "show-manage.php";
                        $p = new galery;
                        $p->product_name = $_GET["product_name"];
                        $p->category = $_GET["category"];
                        $p->product_id = $_GET["product_id"];
                        $p->galery_id = $_GET["galery_id"];
                        
                        echo  '<div class="mt-5 num">
                                    <h3 class="text-center">Add new galery</h3>
                                    <form action=""  method="POST" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="picture">Select picture for : '.$p->product_name.'</label>
                                            <input type="file" class="form-control" id="file" name="file">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" value="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php?select=galery">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                                // $p->files = basename($_FILES["file"]["name"]);
                                // echo $a;  
                        if(isset($_POST)) {
                            if(isset($_FILES["file"]["name"])) {
                                $p->files = basename($_FILES["file"]["name"]);
                                $p->addnew();
                            }
                        }
                        
                        print_r($p) ;
                    break;

                    case "description":
                        require_once "config.php";
                        require "show-manage.php";
                        $a = new config;
                        $conn = $a->connect();
                        $p = new description;
                        if(isset($_POST["save"])) {
                            $p->product_id = $_POST["product_id"];
                            $p->summary = $_POST["summary"];
                            $p->content = $_POST["content"];
                            $p->addnew($conn);
                        }


                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center">Add new Description</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3">
                                            <label for="">Product name</label>
                                            <select name="product_id" id="" class="form-control">';
                                                $p->list_show($conn);
                        echo                '</select>
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label class="label label-default" for="os_name">Summary</label>
                                            <input type="text" class="form-control" id="name" name="summary">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code">Content</label>
                                            <textarea name="content"  class="form-control"  rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="./manage.php?select=description">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';

                }




            }







        ?>
    </div>
</body>
</html>




