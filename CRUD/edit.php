<?php
    require "../request.php";

?>
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
<body class="bg-dark">
    <div class="container">

<?php
    
    require "../classlist.php";

    if(isset($_GET["edit_id"])) {
        $edit_id = $_GET["edit_id"];
        
    }

    switch($edit_id) {
        case "role":

            echo   '<div class="mt-5 num">
                        <h3 class="text-center text-light">Change Password</h3>
                        <form action=""  method="POST">
                            <div class="form-group mb-3 mt-6">
                                <label  for="brand_name" class="text-white-50">User name</label>
                                <input type="text" class="form-control bg-dark text-white" id="brand_name" name="user_name" value="'.$_GET["user_name"].'" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_code" class="text-white-50">Current Password</label>
                                <input type="text" class="form-control bg-dark text-white" id="country" name="current_password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_code" class="text-white-50">New Password</label>
                                <input type="text" class="form-control bg-dark text-white" id="country" name="new_password">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                            <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=role">Back</a></button>
                            <span><?php echo $mes ?></span>
                        </form>
                    </div>';

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
            break;

            case "branch":
                $p = new branch;
                $mes = '';
                if(isset($_GET["branch_id"])) {
                    $p->branch_id = $_GET["branch_id"];
                }
                if(isset($_POST["save"])) {
                    if(isset($_POST["name"])) {
                        $p->name = $_POST["name"];
                    }
                    if(isset($_POST["address"])) {
                        $p->address = $_POST["address"];
                    }
                    if(isset($_POST["hotline"])) {
                        $p->hotline = $_POST["hotline"];
                    }
                    if($p->name != "" && $p->address != "" && $p->hotline != "") {
                        $p->edit();
                        header("location: dashboard.php?select=branch");
                    } else {
                        $mes = "please input full information";
                    }
                }

                echo   '<div class="mt-5 num">
                            <h3 class="text-center">Edit Branch</h3>
                            <form action=""  method="POST">
                                <div class="form-group mb-3 mt-6">
                                    <label  for="brand_name">Branch name</label>
                                    <input type="text" class="form-control"  name="name" value="'.$_GET["name"].'" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category_code">Address</label>
                                    <input type="text" class="form-control"  name="address" value="'.$_GET["address"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category_code">Hotline</label>
                                    <input type="text" class="form-control"  name="hotline" value="'.$_GET["hotline"].'">
                                </div>

                                <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                                <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=branch">Back</a></button>
                                <span>'.$mes.'</span>
                            </form>
                        </div>';
                break;

            case "employee":
                $p = new employee;
                $mes = '';
                if(isset($_GET["employee_id"])) {
                    $p->employee_id = $_GET["employee_id"];
                }
                if(isset($_POST["save"])) {
                    if(isset($_POST["fname"])) {
                        $p->fname = $_POST["fname"];
                    }
                    if(isset($_POST["mname"])) {
                        $p->mname = $_POST["mname"];
                    }
                    if(isset($_POST["lname"])) {
                        $p->lname = $_POST["lname"];
                    }
                    if(isset($_POST["dob"])) {
                        $p->dob = $_POST["dob"];
                    }
                    if(isset($_POST["address"])) {
                        $p->address = $_POST["address"];
                    }
                    if(isset($_POST["phone_number"])) {
                        $p->phone_number = $_POST["phone_number"];
                    }
                    if(isset($_POST["person_id"])) {
                        $p->person_id = $_POST["person_id"];
                    }
                    if(isset($_POST["email"])) {
                        $p->email = $_POST["email"];
                    }
                    if(isset($_POST["contact_name"])) {
                        $p->contact_name = $_POST["contact_name"];
                    }
                    if(isset($_POST["contact_phone"])) {
                        $p->contact_phone = $_POST["contact_phone"];
                    }
                    if(isset($_POST["type"])) {
                        $p->type = $_POST["type"];
                    }
                    if($p->fname != NULL && $p->lname != NULL && $p->dob != NULL && $p->address != NULL && $p->phone_number != NULL && $p->person_id != NULL && $p->email != NULL && $p->type != NULL) {    
                        $p->edit();
                        header("location: dashboard.php?select=employee");
                    } else {
                        $mes = "Please enter full information !";
                    }
                }

                echo   '<div class="mt-5 num">
                            <h3 class="text-center text-light">Add new Employee</h3>
                            <form action=""  method="POST">
                                <div class="form-group mb-3 mt-6">
                                    <label for="fname" class="text-white-50">First Name</label>
                                    <input type="text" class="form-control bg-dark text-white" id="fname" name="fname" value="'.$_GET["fname"].'">
                                </div>
                                <div class="form-group mb-3 mt-6">
                                    <label for="mname" class="text-white-50">Mid Name</label>
                                    <input type="text" class="form-control bg-dark text-white" id="mname" name="mname" value="'.$_GET["mname"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="lname" class="text-white-50">Last Name</label>
                                    <input type="text" class="form-control bg-dark text-white" id="lname" name="lname" value="'.$_GET["lname"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="dob" class="text-white-50">Dob</label>
                                    <input type="date" class="form-control bg-dark text-white" id="dob" name="dob" value="'.$_GET["dob"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address" class="text-white-50">Address</label>
                                    <input type="text" class="form-control bg-dark text-white" id="address" name="address" value="'.$_GET["address"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone_number" class="text-white-50">PHONE NUMBER</label>
                                    <input type="text" class="form-control bg-dark text-white" id="phone_number" name="phone_number" value="'.$_GET["phone_number"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="person_id" class="text-white-50">Person ID</label>
                                    <input type="text" class="form-control bg-dark text-white" id="person_id" name="person_id" value="'.$_GET["person_id"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="text-white-50">Email</label>
                                    <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="'.$_GET["email"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="contact_name" class="text-white-50">Contact Name</label>
                                    <input type="text" class="form-control bg-dark text-white" id="contact_name" name="contact_name" value="'.$_GET["contact_name"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="contact_phone" class="text-white-50">Contact Phone</label>
                                    <input type="text" class="form-control bg-dark text-white" id="contact_phone" name="contact_phone" value="'.$_GET["contact_phone"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type" class="text-white-50">Type</label>
                                    <input type="text" class="form-control bg-dark text-white" id="type" name="type" placeholder="M : Manager -- S : Staff  --  PT : Person Trainner" value="'.$_GET["type"].'">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=employee">Back</a></button>
                                <span class="text-warning">'.$mes.'</span>
                            </form>
                        </div>';
                break;

                case "utilities":
                    $p = new utilities;
                    $mes = "";
                    if(isset($_GET["utilities_id"])) {
                        $p->utilities_id = $_GET["utilities_id"];
                    }
                    if(isset($_POST["save"])) {
                        if(isset($_POST["name"])) {
                            $p->name = $_POST["name"];
                        }
                        if(isset($_POST["points"])) {
                            $p->points = $_POST["points"];
                        }
                        if($p->name != NULL &&  $p->points != NULL) {
                            $p->edit();
                            header("location: dashboard.php?select=utilities");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Add new Utilities</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Utilities name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Point</label>
                                        <input type="text" class="form-control bg-dark text-white" id="points" name="points" value="'.$_GET["points"].'">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=utilities">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;    

                case "device":
                    $p = new device;
                    $mes = "";
                    if(isset($_GET["utilities_id"])) {
                        $p->device_id = $_GET["device_id"];
                    }
                    if(isset($_POST["save"])) {
                        if(isset($_POST["name"])) {
                            $p->name = $_POST["name"];
                        }
                        if(isset($_POST["brand"])) {
                            $p->brand = $_POST["brand"];
                        }
                        if(isset($_POST["width"])) {
                            $p->width = $_POST["width"];
                        }
                        if(isset($_POST["length"])) {
                            $p->length = $_POST["length"];
                        }
                        if(isset($_POST["height"])) {
                            $p->height = $_POST["height"];
                        }
                        if(isset($_POST["weight"])) {
                            $p->weight = $_POST["weight"];
                        }
                        if(isset($_POST["title"])) {
                            $p->title = $_POST["title"];
                        }
                        if(isset($_POST["description"])) {
                            $p->description = $_POST["description"];
                        }
                        if($p->name != NULL &&  $p->brand != NULL) {
                            $p->edit();
                            header("location: dashboard.php?select=device");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Device</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Device name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Brand</label>
                                        <input type="text" class="form-control bg-dark text-white" id="brand" name="brand" value="'.$_GET["brand"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Width</label>
                                        <input type="text" class="form-control bg-dark text-white" id="width" name="width" value="'.$_GET["width"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Length</label>
                                        <input type="text" class="form-control bg-dark text-white" id="length" name="length" value="'.$_GET["length"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Height</label>
                                        <input type="text" class="form-control bg-dark text-white" id="height" name="height" value="'.$_GET["height"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Weight</label>
                                        <input type="text" class="form-control bg-dark text-white" id="weight" name="weight" value="'.$_GET["weight"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Title</label>
                                        <input type="text" class="form-control bg-dark text-white" id="title" name="title" value="'.$_GET["title"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Description</label>
                                        <textarea name="description"  class="form-control bg-dark text-white"  rows="4">'.$_GET["description"].'</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=device">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;

                case "service":
                    $p = new service();
                    $mes = "";
                    if(isset($_GET["service_id"])) {
                        $p->service_id = $_GET["service_id"];
                    }
                    if(isset($_POST["save"])) {
                        if(isset($_POST["name"])) {
                            $p->name = $_POST["name"];
                        }
                        if(isset($_POST["title"])) {
                            $p->title = $_POST["title"];
                        }
                        if(isset($_POST["rescription"])) {
                            $p->description = $_POST["description"];
                        }
                        if($p->name != NULL &&  $p->title != NULL &&  $p->description != NULL) {
                            $p->addnew();
                            header("location: dashboard.php?select=service");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Add new Service</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Service name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Title</label>
                                        <input type="text" class="form-control bg-dark text-white" id="points" name="title" value="'.$_GET["title"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Description</label>
                                        <input type="text" class="form-control bg-dark text-white" id="points" name="description" value="'.$_GET["description"].'">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=service">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;    

                        
        
    }





?>


    </div>
</body>
</html>



