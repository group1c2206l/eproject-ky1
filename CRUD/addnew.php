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
<body class="bg-dark">
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
                                            <input type="text" class="form-control" id="user_name" name="user_name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code" class="text-white">Password</label>
                                            <input type="password" class="form-control" id="password_hash" name="password_hash">
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
                                $p->rescription = $_POST["rescription"];
                            }
                            if($p->name != NULL &&  $p->title != NULL &&  $p->rescription != NULL) {
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
                                            <label for="points" class="text-white-50">Title</label>
                                            <input type="text" class="form-control bg-dark text-white" id="points" name="title" value="'.$p->title.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="points" class="text-white-50">Description</label>
                                            <input type="text" class="form-control bg-dark text-white" id="points" name="rescription" value="'.$p->rescription.'">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=service">Back</a></button>
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
