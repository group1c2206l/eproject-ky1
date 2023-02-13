<?php
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
                                $r = new role;
                                $r->user_name = $_POST["user_name"];
                                $r->password_hash = sha1($_POST["password_hash"]);
                                $r->addnew();
                                header("location: dashboard.php?select=role");
                            }
                        }
                    break;

                    case "branch":
                        $b = new branch;
                        $mes = "";
                        if(isset($_POST["save"])) {
                            if(isset($_POST["name"])) {
                                $b->name = $_POST["name"];
                            }
                            if(isset($_POST["address"])) {
                                $b->address = $_POST["address"];
                            }
                            if(isset($_POST["hotline"])) {
                                $b->hotline = $_POST["hotline"];
                            }
                            if($b->name != NULL && $b->address != NULL &&  $b->hotline != NULL) {
                                $b->addnew();
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
                                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="'.$b->name.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="category_name" class="text-white-50">Address</label>
                                            <input type="text" class="form-control bg-dark text-white" id="category_name" name="address" value="'.$b->address.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code" class="text-white-50">Hotline</label>
                                            <input type="text" class="form-control bg-dark text-white" id="category_code" name="hotline" value="'.$b->hotline.'">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=branch">Back</a></button>
                                        <span class="text-warning">'.$mes.'</span>
                                    </form>
                                </div>';
                    break;

                    case "employee":
                        $e = new employee;
                        $mes = "";
                        if(isset($_POST["save"])) {
                            if(isset($_POST["fname"])) {
                                $e->fname = $_POST["fname"];
                            }
                            if(isset($_POST["mname"])) {
                                $e->mname = $_POST["mname"];
                            }
                            if(isset($_POST["lname"])) {
                                $e->lname = $_POST["lname"];
                            }
                            if(isset($_POST["dob"])) {
                                $e->dob = $_POST["dob"];
                            }
                            if(isset($_POST["address"])) {
                                $e->address = $_POST["address"];
                            }
                            if(isset($_POST["phone_number"])) {
                                $e->phone_number = $_POST["phone_number"];
                            }
                            if(isset($_POST["person_id"])) {
                                $e->person_id = $_POST["person_id"];
                            }
                            if(isset($_POST["email"])) {
                                $e->email = $_POST["email"];
                            }
                            if(isset($_POST["contact_name"])) {
                                $e->contact_name = $_POST["contact_name"];
                            }
                            if(isset($_POST["contact_phone"])) {
                                $e->contact_phone = $_POST["contact_phone"];
                            }
                            if(isset($_POST["type"])) {
                                $e->type = $_POST["type"];
                            }
                            if($e->fname != NULL && $e->lname != NULL && $e->dob != NULL && $e->address != NULL && $e->phone_number != NULL && $e->person_id != NULL && $e->email != NULL && $e->type != NULL) {    
                                $e->addnew();
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
                                            <input type="text" class="form-control bg-dark text-white" id="fname" name="fname" value="'.$e->fname.'">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="mname" class="text-white-50">Mid Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="mname" name="mname" value="'.$e->mname.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="lname" class="text-white-50">Last Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="lname" name="lname" value="'.$e->lname.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="dob" class="text-white-50">Dob</label>
                                            <input type="date" class="form-control bg-dark text-white" id="dob" name="dob" value="'.$e->dob.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="address" class="text-white-50">Address</label>
                                            <input type="text" class="form-control bg-dark text-white" id="address" name="address" value="'.$e->address.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone_number" class="text-white-50">PHONE NUMBER</label>
                                            <input type="text" class="form-control bg-dark text-white" id="phone_number" name="phone_number" value="'.$e->phone_number.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="person_id" class="text-white-50">Person ID</label>
                                            <input type="text" class="form-control bg-dark text-white" id="person_id" name="person_id" value="'.$e->person_id.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="text-white-50">Email</label>
                                            <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="'.$e->email.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="contact_name" class="text-white-50">Contact Name</label>
                                            <input type="text" class="form-control bg-dark text-white" id="contact_name" name="contact_name" value="'.$e->contact_name.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="contact_phone" class="text-white-50">Contact Phone</label>
                                            <input type="text" class="form-control bg-dark text-white" id="contact_phone" name="contact_phone" value="'.$e->contact_phone.'">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="type" class="text-white-50">Type</label>
                                            <input type="text" class="form-control bg-dark text-white" id="type" name="type" placeholder="M : Manager -- S : Staff  --  PT : Person Trainner" value="'.$e->type.'">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=employee">Back</a></button>
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
