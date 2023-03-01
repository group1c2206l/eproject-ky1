<?php
    require "../request.php";
    require "../classlist.php";
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
                            <h3 class="text-center text-light">Edit Employee</h3>
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

                case "person_trainer":
                    $p = new person_trainer;
                    $mes = "";
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
                        if(isset($_POST["code"])) {
                            $p->code = $_POST["code"];
                        }
                        if(isset($_POST["dob"])) {
                            $p->dob = $_POST["dob"];
                        }
                        if(isset($_POST["gender"])) {
                            $p->gender = $_POST["gender"];
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
                        if(isset($_POST["trainer_job"])) {
                            $p->trainer_job = $_POST["trainer_job"];
                        }
                        if(isset($_POST["evaluate"])) {
                            $p->evaluate = $_POST["evaluate"];
                        }
                        if($p->fname != NULL && $p->lname != NULL && $p->dob != NULL && $p->address != NULL && $p->phone_number != NULL && $p->person_id != NULL && $p->email != NULL && $p->trainer_job != NULL) {    
                            $p->edit();
                            header("location: dashboard.php?select=person_trainer");
                        } else {
                            $mes = "Please enter full information !";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Person Trainer</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="fname" class="text-white-50">First Name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="fname" name="fname" value="'.$_GET["fname"].'" >
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
                                        <label for="code" class="text-white-50">CODE ID</label>
                                        <input type="text" class="form-control bg-dark text-white" id="code" name="code" value="'.$_GET["code"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="dob" class="text-white-50">Dob</label>
                                        <input type="date" class="form-control bg-dark text-white" id="dob" name="dob" value="'.$_GET["dob"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="dob" class="text-white-50">Dob</label>
                                        <select class="form-select form-select-md bg-dark text-white" name="gender">
                                            <option value="" selected disabled>Select Gender : </option>
                                            <option value="F">FEMALE</option>
                                            <option value="M">MALE</option>
                                        </select>
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
                                        <label for="trainer_job" class="text-white-50">trainer_job</label>
                                        <input type="text" class="form-control bg-dark text-white" id="trainer_job" name="trainer_job" value="'.$_GET["trainer_job"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="evaluate" class="text-white-50">Evaluate</label>
                                        <textarea name="evaluate"  class="form-control bg-dark text-white"  rows="4">'.$_GET["evaluate"].'</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=person_trainer">Back</a></button>
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
                                <h3 class="text-center text-light">Edit Utilities</h3>
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
                        if(isset($_POST["description"])) {
                            $p->description = $_POST["description"];
                        }
                        if($p->name != NULL &&  $p->title != NULL &&  $p->description != NULL) {
                            print_r($p);
                            $p->edit();
                            header("location: dashboard.php?select=service");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Service</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Service name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="title" class="text-white-50">Title</label>
                                        <input type="text" class="form-control bg-dark text-white" id="title" name="title" value="'.$_GET["title"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="description" class="text-white-50">Description</label>
                                        <textarea name="description"  class="form-control bg-dark text-white"  rows="4">'.$_GET["description"].'</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=service">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;    

                case "package":
                    $p = new package();
                    $mes = "";
                    if(isset($_POST["save"])) {
                        if(isset($_POST["name"])) {
                            $p->name = $_POST["name"];
                        }
                        if(isset($_POST["mentor"])) {
                            $p->mentor = $_POST["mentor"];
                        }
                        if(isset($_POST["points"])) {
                            $p->points = $_POST["points"];
                        }
                        if(isset($_POST["price"])) {
                            $p->price = $_POST["price"];
                        }
                        if(isset($_POST["expiry"])) {
                            $p->expiry = $_POST["expiry"];
                        }
                        if(isset($_POST["day_active"])) {
                            $p->day_active = $_POST["day_active"];
                        }
        
                        if($p->name != NULL &&  $p->mentor != NULL &&  $p->points != NULL && $p->price != NULL && $p->expiry != NULL && $p->day_active != NULL) {
                            $p->edit();
                            header("location: dashboard.php?select=package");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Package</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Package name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="text-white-50">Mentor</label>
                                        <select name="mentor" id="" class="form-control bg-dark text-white">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="points" class="text-white-50">Points</label>
                                        <input type="text" class="form-control bg-dark text-white" id="points" name="points" value="'.$_GET["points"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="price" class="text-white-50">Price</label>
                                        <input type="text" class="form-control bg-dark text-white" id="price" name="price" value="'.$_GET["price"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="text-white-50">Expiry</label>
                                        <select name="expiry" id="Expiry" class="form-control bg-dark text-white" value="'.$_GET["expiry"].'">
                                            <option value="1">1 Month</option>
                                            <option value="12">12 Month</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                            <label for="day_active" class="text-white-50">Day active</label>
                                            <select name="day_active" id="day_active" class="form-control bg-dark text-white" value="'.$_GET["day_active"].'">
                                                <option value="3">3 day/week</option>
                                                <option value="5">5 day/week</option>
                                                <option value="7">7 day/week</option>
                                            </select>
                                        </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=package">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;

                case "course":
                    $p = new course();
                    $mes = "";
                    if(isset($_GET["course_id"])) {
                        $p->course_id = $_GET["course_id"];
                    }
                    if(isset($_POST["save"])) {
                        if(isset($_POST["name"])) {
                            $p->name = $_POST["name"];
                        }
                        if(isset($_POST["person_trainer_id"])) {
                            $p->person_trainer_id = $_POST["person_trainer_id"];
                        }
                        if(isset($_POST["description"])) {
                            $p->description = $_POST["description"];
                        }
                        if(isset($_POST["start_day"])) {
                            $p->start_day = $_POST["start_day"];
                        }
                        if(isset($_POST["end_day"])) {
                            $p->end_day = $_POST["end_day"];
                        }
                        if(isset($_POST["price"])) {
                            $p->price = $_POST["price"];
                        }
                        if($p->name != NULL &&  $p->person_trainer_id != NULL &&  $p->description != NULL && $p->start_day != NULL && $p->end_day != NULL && $p->price != NULL) {
                            $p->edit();
                            header("location: dashboard.php?select=course");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Course</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Course name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="person_trainer_id" class="text-white-50">Mentor</label>
                                        <select name="person_trainer_id" id="person_trainer_id" class="form-control bg-dark text-white">';
                    echo                     $p->list_data("","person_trainer_id","lname","person_trainer");
                    echo                '</select>
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="description" class="text-white-50">description</label>
                                        <textarea name="description"  class="form-control bg-dark text-white"  rows="4">'.$_GET["description"].'</textarea>
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="start_day" class="text-white-50">start_day</label>
                                        <input type="date" class="form-control bg-dark text-white" id="start_day" name="start_day" value="'.$_GET["start_day"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="end_day" class="text-white-50">end_day</label>
                                        <input type="date" class="form-control bg-dark text-white" id="end_day" name="end_day" value="'.$_GET["end_day"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="price" class="text-white-50">price</label>
                                        <input type="text" class="form-control bg-dark text-white" id="price" name="price" value="'.$_GET["price"].'">
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=course">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;  
                
                case "member":
                    $p = new member;
                    $mes = '';
                    if(isset($_GET["member_id"])) {
                        $p->member_id = $_GET["member_id"];
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
                        if(isset($_POST["vip"])) {
                            $p->vip = $_POST["vip"];
                        }
                        if(isset($_POST["email"])) {
                            $p->email = $_POST["email"];
                        }
                        if(isset($_POST["package_id"])) {
                            $p->package_id = $_POST["package_id"];
                        }
                        if(isset($_POST["course_id"])) {
                            $p->course_id = $_POST["course_id"];
                        }
                        if(isset($_POST["points"])) {
                            $p->points = $_POST["points"];
                        }
                        if($p->fname != NULL && $p->lname != NULL && $p->dob != NULL && $p->address != NULL && $p->phone_number != NULL && $p->vip != NULL && $p->email != NULL && $p->points != NULL) {    
                            $p->edit();
                            header("location: dashboard.php?select=member");
                        } else {
                            $mes = "Please enter full information !";
                        }
                    }
    
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Member</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="fname" class="text-white-50">Card ID</label>
                                        <input type="text" class="form-control bg-dark text-white" id="card_id" name="card_id" value="'.$_GET["card_id"].'">
                                    </div>
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
                                        <label for="vip" class="text-white-50">VIP</label>
                                        <input type="text" class="form-control bg-dark text-white" id="vip" name="vip" value="'.$_GET["vip"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="text-white-50">Email</label>
                                        <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="'.$_GET["email"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="points" class="text-white-50">Points</label>
                                        <input type="text" class="form-control bg-dark text-white" id="points" name="points" value="'.$_GET["points"].'">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="package_id" class="text-white-50">Package</label>
                                        <select name="package_id" id="package_id" class="form-control bg-dark text-white">
                                             <option selected disabled>Select on list :</option>';
                    echo                     $p->list_data("","package_id","name","package");
                    echo                '</select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="course_id" class="text-white-50">Course</label>
                                        <select name="course_id" id="course_id" class="form-control bg-dark text-white">
                                             <option selected disabled>Select on list :</option>';
                    echo                     $p->list_data("","course_id","name","course");
                    echo                '</select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=member">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                    break;
                
                case "galery_type":
                    $p = new galery_type();
                    $mes = "";
                    if(isset($_GET["galery_type_id"])) {
                        $p->galery_type_id = $_GET["galery_type_id"];
                    }
                    if(isset($_POST["save"])) {
                        if(isset($_POST["name"])) {
                            $p->name = $_POST["name"];
                        }
                      
                        if($p->name != NULL) {
                            $p->edit();
                            header("location: dashboard.php?select=galery_type");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Galery Type</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Type name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=galery_type">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;    
                case "galery":
                    $p = new galery();
                    $mes = "";
                    if(isset($_GET["galery_id"])) {
                        $p->galery_id = $_GET["galery_id"];
                    }
                    if(isset($_POST["save"])) {
                        if(isset($_POST["name"])) {
                            $p->name = $_POST["name"];
                        }
                      
                        if($p->name != NULL) {
                            $p->edit();
                            header("location: dashboard.php?select=galery");
                        } else {
                            $mes = "Please enter full information";
                        }
                    }
                    echo   '<div class="mt-5 num">
                                <h3 class="text-center text-light">Edit Galery</h3>
                                <form action=""  method="POST">
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Type name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <div class="form-group mb-3 mt-6">
                                        <label for="name" class="text-white-50">Type name</label>
                                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$_GET["name"].'">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                    <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=galery_type">Back</a></button>
                                    <span class="text-warning">'.$mes.'</span>
                                </form>
                            </div>';
                break;    
        
    }





?>


    </div>
</body>
</html>



