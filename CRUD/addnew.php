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
    <title>Document</title>
</head>
<body class="bg-secondary">
    <div class="container ">
        <?php
            if(isset($_GET["select"])) {
                $select = $_GET["select"];
                switch($select) {
                    case "role":
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-white">Add new roles</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label  for="user_name" class="text-white">User name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="user_name" name="user_name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code" class="text-white">Password</label>
                                            <input type="password" class="form-control bg-dark text-white" id="password_hash" name="password_hash">
                                        </div>

                                        <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=role">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                        if(isset($_POST["save"])) {
                            if(isset($_POST["user_name"]) && isset($_POST["password_hash"])) {
                                $p = new role;
                                $p->user_name = $_POST["user_name"];
                                $p->password_hash = sha1($_POST["password_hash"]);
                                $p->addnew();
                                header("location: dashboard.php?select=role");
                            }
                        }
                    break;

                    case "branch":
                        $p = new branch;
                        $mes = "";
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
                            if($p->name != NULL && $p->address != NULL &&  $p->hotline != NULL) {
                                $p->addnew();
                                header("location: dashboard.php?select=branch");
                            } else {
                                $mes = "Please enter full information";
                            }
                        }
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-light">Add new Branch</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="name" class="text-white-50">Branch name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$p->name.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="category_name" class="text-white-50">Address</label>
                                            <input type="text" class="form-control bg-dark text-white" id="category_name" name="address" value="'.$p->address.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code" class="text-white-50">Hotline</label>
                                            <input type="text" class="form-control bg-dark text-white" id="category_code" name="hotline" value="'.$p->hotline.'">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=branch">Back</a></button>
                                        <span class="text-warning">'.$mes.'</span>
                                    </form>
                                </div>';
                    break;

                    case "employee":
                        $p = new employee;
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
                                $p->addnew();
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
                                            <input type="text" class="form-control bg-dark text-white" id="fname" name="fname" value="'.$p->fname.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="mname" class="text-white-50">Mid Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="mname" name="mname" value="'.$p->mname.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="lname" class="text-white-50">Last Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="lname" name="lname" value="'.$p->lname.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="dob" class="text-white-50">Dob</label>
                                            <input type="date" class="form-control bg-dark text-white" id="dob" name="dob" value="'.$p->dob.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="address" class="text-white-50">Address</label>
                                            <input type="text" class="form-control bg-dark text-white" id="address" name="address" value="'.$p->address.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone_number" class="text-white-50">PHONE NUMBER</label>
                                            <input type="text" class="form-control bg-dark text-white" id="phone_number" name="phone_number" value="'.$p->phone_number.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="person_id" class="text-white-50">Person ID</label>
                                            <input type="text" class="form-control bg-dark text-white" id="person_id" name="person_id" value="'.$p->person_id.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="text-white-50">Email</label>
                                            <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="'.$p->email.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="contact_name" class="text-white-50">Contact Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="contact_name" name="contact_name" value="'.$p->contact_name.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="contact_phone" class="text-white-50">Contact Phone</label>
                                            <input type="text" class="form-control bg-dark text-white" id="contact_phone" name="contact_phone" value="'.$p->contact_phone.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="type" class="text-white-50">Type</label>
                                            <input type="text" class="form-control bg-dark text-white" id="type" name="type" placeholder="M : Manager -- S : Staff  --  PT : Person Trainner" value="'.$p->type.'">
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
                                $p->addnew();
                                header("location: dashboard.php?select=person_trainer");
                            } else {
                                $mes = "Please enter full information !";
                            }
                        }
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-light">Add new Person Trainer</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="fname" class="text-white-50">First Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="fname" name="fname" value="'.$p->fname.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="mname" class="text-white-50">Mid Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="mname" name="mname" value="'.$p->mname.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="lname" class="text-white-50">Last Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="lname" name="lname" value="'.$p->lname.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="code" class="text-white-50">CODE ID</label>
                                            <input type="text" class="form-control bg-dark text-white" id="code" name="code" value="'.$p->code.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="dob" class="text-white-50">Dob</label>
                                            <input type="date" class="form-control bg-dark text-white" id="dob" name="dob" value="'.$p->dob.'">
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
                                            <input type="text" class="form-control bg-dark text-white" id="address" name="address" value="'.$p->address.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone_number" class="text-white-50">PHONE NUMBER</label>
                                            <input type="text" class="form-control bg-dark text-white" id="phone_number" name="phone_number" value="'.$p->phone_number.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="person_id" class="text-white-50">Person ID</label>
                                            <input type="text" class="form-control bg-dark text-white" id="person_id" name="person_id" value="'.$p->person_id.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="text-white-50">Email</label>
                                            <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="'.$p->email.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="trainer_job" class="text-white-50">trainer_job</label>
                                            <input type="text" class="form-control bg-dark text-white" id="trainer_job" name="trainer_job" value="'.$p->trainer_job.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="evaluate" class="text-white-50">Evaluate</label>
                                            <textarea name="evaluate"  class="form-control bg-dark text-white"  rows="4">'.$p->evaluate.'</textarea>
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
                        if(isset($_POST["save"])) {
                            if(isset($_POST["name"])) {
                                $p->name = $_POST["name"];
                            }
                            if(isset($_POST["points"])) {
                                $p->points = $_POST["points"];
                            }
                            if($p->name != NULL &&  $p->points != NULL) {
                                $p->addnew();
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
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$p->name.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Point</label>
                                            <input type="text" class="form-control bg-dark text-white" id="points" name="points" value="'.$p->points.'">
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
                                $p->addnew();
                                header("location: dashboard.php?select=device");
                            } else {
                                $mes = "Please enter full information";
                            }
                        }
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-light">Add new Device</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="name" class="text-white-50">Device name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$p->name.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Brand</label>
                                            <input type="text" class="form-control bg-dark text-white" id="brand" name="brand" value="'.$p->brand.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Width</label>
                                            <input type="text" class="form-control bg-dark text-white" id="width" name="width" value="'.$p->width.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Length</label>
                                            <input type="text" class="form-control bg-dark text-white" id="length" name="length" value="'.$p->length.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Height</label>
                                            <input type="text" class="form-control bg-dark text-white" id="height" name="height" value="'.$p->height.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Weight</label>
                                            <input type="text" class="form-control bg-dark text-white" id="weight" name="weight" value="'.$p->weight.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Title</label>
                                            <input type="text" class="form-control bg-dark text-white" id="title" name="title" value="'.$p->title.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Description</label>
                                            <textarea name="description"  class="form-control bg-dark text-white"  rows="4">'.$p->description.'</textarea>
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
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$p->name.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="title" class="text-white-50">Title</label>
                                            <input type="text" class="form-control bg-dark text-white" id="title" name="title" value="'.$p->title.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="description" class="text-white-50">Description</label>
                                            <input type="text" class="form-control bg-dark text-white" id="description" name="description" value="'.$p->description.'">
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
                                $p->addnew();
                                header("location: dashboard.php?select=package");
                            } else {
                                $mes = "Please enter full information";
                            }
                        }
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-light">Add new Package</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="name" class="text-white-50">Package name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$p->name.'">
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
                                            <input type="text" class="form-control bg-dark text-white" id="points" name="points" value="'.$p->points.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="price" class="text-white-50">Price</label>
                                            <input type="text" class="form-control bg-dark text-white" id="price" name="price" value="'.$p->price.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="text-white-50">Expiry</label>
                                            <select name="expiry" id="Expiry" class="form-control bg-dark text-white" value="'.$p->expiry.'">
                                                <option value="1">1 Month</option>
                                                <option value="12">12 Month</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="day_active" class="text-white-50">Day active</label>
                                            <select name="day_active" id="day_active" class="form-control bg-dark text-white" value="'.$p->day_active.'">
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
                                $p->addnew();
                                header("location: dashboard.php?select=course");
                            } else {
                                $mes = "Please enter full information";
                            }
                        }
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-light">Add new Course</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="name" class="text-white-50">Course name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$p->name.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="person_trainer_id" class="text-white-50">Mentor</label>
                                            <select name="person_trainer_id" id="person_trainer_id" class="form-control bg-dark text-white">';
                        echo                     $p->list_data("","person_trainer_id","lname","person_trainer");
                        echo                '</select>
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="description" class="text-white-50">description</label>
                                            <textarea name="description"  class="form-control bg-dark text-white"  rows="4">'.$p->description.'</textarea>
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="start_day" class="text-white-50">start_day</label>
                                            <input type="date" class="form-control bg-dark text-white" id="start_day" name="start_day" value="'.$p->start_day.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="end_day" class="text-white-50">end_day</label>
                                            <input type="date" class="form-control bg-dark text-white" id="end_day" name="end_day" value="'.$p->end_day.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="price" class="text-white-50">price</label>
                                            <input type="text" class="form-control bg-dark text-white" id="price" name="price" value="'.$p->price.'">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=course">Back</a></button>
                                        <span class="text-warning">'.$mes.'</span>
                                    </form>
                                </div>';
                    break;

                    case "galery_type":
                        $p = new galery_type();
                        $mes = "";
                        if(isset($_POST["save"])) {
                            if(isset($_POST["name"])) {
                                $p->galery_type_name = $_POST["name"];
                            }
                            if(isset($_POST["galery_type_id"])) {
                                $p->galery_type_id = $_POST["galery_type_id"];
                            }
                            if($p->galery_type_name != NULL) {
                                $p->addnew();
                                header("location: dashboard.php?select=galery_type");
                            } else {
                                $mes = "Please enter full information";
                            }
                        }
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-light">Add new Galery Type</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="name" class="text-white-50">Type name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$p->name.'">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=service">Back</a></button>
                                        <span class="text-warning">'.$mes.'</span>
                                    </form>
                                </div>';
                    break;    
                    case "galery":
                        $p = new galery();
                        $mes = "";
                        // $p->item_id = $p->device_id = $p->service_id =  $p->package_id =  $p->course_id = $p->person_trainer_id = $p->member_id = "";
                        if(isset($_GET["option"])) {
                            if(isset($_GET["galery_type_id"])) {
                                $p->galery_type_id = $_GET["galery_type_id"];
                                $p->galery_type_name = $p->id_to_name("galery_type_name","galery_type","galery_type_id",$p->galery_type_id);
                            }
                        }

                        if(isset($_POST["save"])) {
                            if(isset($_POST["item_id"])) {
                                $p->item_id = $_POST["item_id"];
                            }
                            if(isset($_POST["note"])) {
                                $p->note = $_POST["note"];
                            }
                            if(isset($_FILES["img_name"]["name"])) {
                                $p->img_name = uniqid("",false)."_".basename($_FILES["img_name"]["name"]); //tranh viec trung ten file khi upload
                            }
                            if(isset($_FILES["img_name"]["tmp_name"])) {
                                $p->img_tmp = $_FILES["img_name"]["tmp_name"];
                            }

                            switch($p->galery_type_name) {
                                case "slide":
                                    $p->dir = './assets/image/slide/';
                                    $p->item_id = $p->galery_type_count("slide");
                                    $p->item_name = "slide ".$p->item_id;
                                break;
                                case "background":
                                    $p->dir = './assets/image/background/';
                                    $p->item_id = $p->galery_type_count("background");
                                    $p->item_name = "slide ".$p->item_id;
                                break;
                
                                case "course":
                                    $p->dir = './assets/image/course/';
                                    $p->item_name = $p->id_to_name("name","course","course_id",$p->item_id);
                                break;
                                case "logo":
                                    $p->dir = './assets/image/logo/';
                                    $p->item_id = $p->galery_type_count("slide");
                                    $p->item_name = "slide ".$p->item_id;
                                break;
                                case "person_trainer":
                                    $p->dir = './assets/image/PT/';
                                    $p->item_name = $p->id_to_name("lname","person_trainer","person_trainer_id",$p->item_id);
                                break;
                                case "device":
                                    $p->dir = './assets/image/device/';
                                    $p->item_name = $p->id_to_name("name","device","device_id",$p->item_id);
                                break;
                                case "utilities":
                                    $p->dir = './assets/image/utilities/';
                                    $p->item_name = $p->id_to_name("name","utilities","utilities_id",$p->item_id);
                                break;
                                case "service":
                                    $p->dir = './assets/image/service/';
                                    $p->item_name = $p->id_to_name("name","service","service_id",$p->item_id);
                                break;
                                case "package":
                                    $p->dir = './assets/image/package/';
                                    $p->item_name = $p->id_to_name("name","package","package_id",$p->item_id);
                                break;
                                case "member":
                                    $p->dir = './assets/image/member/';
                                    $p->item_name = $p->id_to_name("lname","member","member_id",$p->item_id);
                                break;
                                case "talk_about_me":
                                    $p->dir = './assets/image/talk_about_me/';
                                break;
                                case "about":
                                    $p->dir = './assets/image/about/';
                                    $p->item_id = $p->galery_type_count("about");
                                    $p->item_name = "about ".$p->item_id;
                                break;
                            }
                            
                            print_r($p);
                            // echo $_FILES["img_name"]["size"];

                            if($_FILES["img_name"]["size"] < $p->maxfilesize) {
                                if($p->galery_type_name != NULL) {
                                    $p->addnew();
                                    header("location: dashboard.php?select=galery");
                                } else {
                                    $mes = "Please enter full information";
                                }
                            } else {
                                $mes = "File upload limit 3MB";
                            }
                        }
                        
                        
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center text-light">Add news Galery</h3>
                                    <form action="" method="get">
                                        <label for="galery_type_id" class="text-white-50 ">Select Option</label>
                                        <input type="text" name="select" value="'.$select.'" class="d-none">
                                        <select name="galery_type_id" id="galery_type_id" class="form-control bg-dark text-white ">
                                            <option selected disabled>Please Select option below:</option>';
                        echo                $p->list_data($p->galery_type_name,"galery_type_id","galery_type_name","galery_type");
                        echo            '</select>
                                         <button type="submit" class="btn btn-primary mb-2 mt-3" name="option" value="ok">option</button>
                                    </form>
                                    <form action=""  method="POST" enctype="multipart/form-data">
                                        <div class="form-group mb-3">';       
                            switch($p->galery_type_name) {
                                case "device":
                                    echo        '<div class="form-group mb-3 mt-6">
                                                    <label for="device_id" class="text-white-50">Select Option</label>
                                                    <select name="item_id" id="device_id" class="form-control bg-dark text-white ">
                                                        <option selected disabled>Device list:</option>';
                                    echo                $p->list_data("","device_id","name","device");
                                    echo           '</select>
                                                    
                                                </div>';
                                    break;
                                case "service":
                                    echo        '<div class="form-group mb-3 mt-6">
                                                    <label for="service_id" class="text-white-50">Select Option</label>
                                                    <select name="item_id" id="service_id" class="form-control bg-dark text-white ">
                                                        <option selected disabled>Service list:</option>';
                                    echo                $p->list_data("","service_id","name","service");
                                    echo           '</select>
                                                </div>';
                                    break;
                                case "package":
                                    echo        '<div class="form-group mb-3 mt-6">
                                                    <label for="package_id" class="text-white-50">Select Option</label>
                                                    <select name="item_id" id="package_id" class="form-control bg-dark text-white ">
                                                        <option selected disabled>package list:</option>';
                                    echo                $p->list_data("","package_id","name","package");
                                    echo           '</select>
                                                </div>';
                                    break;
                                case "course":
                                    echo        '<div class="form-group mb-3 mt-6">
                                                    <label for="course_id" class="text-white-50">Select Option</label>
                                                    <select name="item_id" id="course_id" class="form-control bg-dark text-white ">
                                                        <option selected disabled>Course list:</option>';
                                    echo                $p->list_data("","course_id","name","course");
                                    echo           '</select>
                                                </div>';
                                    break;
                                case "person_trainer":
                                    echo        '<div class="form-group mb-3 mt-6">
                                                    <label for="item_id" class="text-white-50">Select Option</label>
                                                    <select name="item_id" id="item_id" class="form-control bg-dark text-white ">
                                                        <option selected disabled>Person Trainer list:</option>';
                                    echo                $p->list_data("","person_trainer_id","lname","person_trainer");
                                    echo           '</select>
                                                </div>';
                                    break;
                                case "member":
                                    echo        '<div class="form-group mb-3 mt-6">
                                                    <label for="item_id" class="text-white-50">Select Option</label>
                                                    <select name="item_id" id="item_id" class="form-control bg-dark text-white ">
                                                        <option selected disabled>Person Trainer list:</option>';
                                    echo                $p->list_data("","member_id","lname","member");
                                    echo           '</select>
                                                </div>';
                                    break;
                                case "utilities":
                                    echo        '<div class="form-group mb-3 mt-6">
                                                    <label for="item_id" class="text-white-50">Select Option</label>
                                                    <select name="item_id" id="item_id" class="form-control bg-dark text-white ">
                                                        <option selected disabled>Utilities_id list:</option>';
                                    echo                $p->list_data("","utilities_id","name","utilities");
                                    echo           '</select>
                                                </div>';
                                    break;
                                
                            }
                            echo               '<div class="form-group mb-3 mt-6">
                                                    <label for="note" class="text-white-50">Note</label>
                                                    <textarea name="note"  class="form-control bg-dark text-white"  rows="3">'.$p->note.'</textarea>
                                                </div>
                                                <div class="form-group mb-3 mt-6">
                                                    <label for="img_name" class="text-white-50">Picture Name</label>
                                                    <input type="file" class="form-control bg-dark text-white" id="img_name" name="img_name">
                                                </div>
                                           
                                        <button type="submit" class="btn btn-primary mb-2 mt-3" name="save" value="ok">Save</button>
                                        <button  class="btn btn-primary mb-2 mt-3"> <a class="text-light" href="dashboard.php?select=galery">Back</a></button>
                                        <span class="text-warning">'.$mes.'</span>
                                    </form>
                                </div>';
                    break;    


                
                }
            }
        ?>
    </div>
</body>
</html>
