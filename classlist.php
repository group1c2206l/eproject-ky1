<?php
    class main {
        public $name;
        public $flag;
        public $create_at;
        public $update_at;

        // public function __construct($flag,$create_at,$update_at)
        // {   
        //     $this->flag = $flag;
        //     $this->create_at = $create_at;
        //     $this->update_at = $update_at;
        // }


        public function arr_result($query) {
            require_once "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = "SELECT * FROM ".$query." ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function search_list($arr) {
            foreach($arr as $item) {
                echo '
                    <option value="'.$item.'">'.$item.'</option>
                ';
            }
        }

        public function search_item($table,$search_list,$search_data) {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT * FROM '.$table.' WHERE '.$search_list.' LIKE :search_data ;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":search_data" => '%'.$search_data.'%'
                )
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        
    }
    class role extends main {
        public $role_id;
        public $user_name;
        public $password_hash;
        public $new_password_hash;
        public $employee_name;
        public $saveme;
        public $flag;
        public $create_at;
        public $update_at;

        public function show_header() {
            echo "<tr>
                    <td>ROLE_ID</td>
                    <td>USER NAME</td>
                    <td>PASSWORD</td>
                    <td>EMPLOYEE NAME</td>
                    <td>FLAG</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->role_id.'</td>
                    <td>'.$this->user_name.'</td>
                    <td>'.$this->password_hash.'</td>
                    <td>'.$this->employee_name.'</td>
                    <td>'.$this->flag.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=role&role_id='.$this->role_id.'&user_name='.$this->user_name.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light"  >Delete</a></button></td> 
                </tr>';
        }

        //kiem tra current co chinh xac 
        public function check_current_pass() {
            require_once "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT * FROM role WHERE user_name = :user_name AND password_hash = :password_hash;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":user_name" => $this->user_name,
                    ":password_hash" => $this->password_hash,
                )
            );
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($results) == 1) {
                return true;
            } else {
                return false;
            }
        }

        public function logins() {
            if($this->check_current_pass()) {
                $name = $this->user_name;
                setcookie("id",md5($name),time()+6000,"/");

                if($this->saveme == "saveme") {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    setcookie("loggedin",$name,time()+6000,"/");
                    header("location: ./CRUD/dashboard.php");
                } else {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    header("location: ./CRUD/dashboard.php");
                }
            } else {
                echo "Invalid username or password";
            }
        }

        //kiem tra password moi nhap vao co chinh quy
        public function regexp($str) {
            $pattern = '/^[a-zA-Z0-9@]{6,20}$/';
            if(preg_match($pattern,$str)) {
                return true;
            } else {
                return false;
            }
        }
    
        public function addnew() {
            require_once "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO role(user_name,password_hash,create_at) VALUES (:user_name,:password_hash,NOW() )';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":user_name" => $this->user_name,
                    ":password_hash" => $this->password_hash,
                )
            );
        }

        public function edit() {
            require_once "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE role SET password_hash = :new_password_hash,update_at = NOW() WHERE user_name = :user_name;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":user_name" => $this->user_name,
                    ":new_password_hash" => $this->new_password_hash,
                )
            );
        }

    }

    class branch extends main {
        public $branch_id;
        public $name;
        public $address;
        public $hotline;
        public $flag;
        public $create_at;
        public $update_at;
        public $search_list;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>ADDRESS</td>
                    <td>HOTLINE</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->branch_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->address.'</td>
                    <td>'.$this->hotline.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=branch&branch_id='.$this->branch_id.'&name='.$this->name.'&address='.$this->address.'&hotline='.$this->hotline.'">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=branch&branch_id='.$this->branch_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO branch(name,address,hotline,create_at) VALUES (:name,:address,:hotline,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":address" => $this->address,
                    ":hotline" => $this->hotline,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE branch SET name = :name,address = :address,hotline = :hotline,update_at = NOW() WHERE branch_id = :branch_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":branch_id" => $this->branch_id,
                    ":name" => $this->name,
                    ":address" => $this->address,
                    ":hotline" => $this->hotline,
                )
            );
        }

        public function delete() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE branch SET flag = 0,update_at = NOW() WHERE branch_id = :branch_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":branch_id" => $this->branch_id
                )
            );
        }

    }

    class employee extends main {
        public $employee_id;
        public $fname;
        public $mname;
        public $lname;
        public $dob;
        public $address;
        public $phone_number;
        public $person_id;
        public $email;
        public $contact_name;
        public $contact_phone;
        public $type;
        public $flag;
        public $create_at;
        public $update_at;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>FNAME</td>
                    <td>MNAME</td>
                    <td>LNAME</td>
                    <td>DOB</td>
                    <td>ADDRESS</td>
                    <td>PHONE NUMBER</td>
                    <td>PERSON ID</td>
                    <td>EMAIL</td>
                    <td>CONTACT NAME</td>
                    <td>CONTACT PHONE</td>
                    <td>TYPE</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->employee_id.'</td>
                    <td>'.$this->fname.'</td>
                    <td>'.$this->mname.'</td>
                    <td>'.$this->lname.'</td>
                    <td>'.$this->dob.'</td>
                    <td>'.$this->address.'</td>
                    <td>'.$this->phone_number.'</td>
                    <td>'.$this->person_id.'</td>
                    <td>'.$this->email.'</td>
                    <td>'.$this->contact_name.'</td>
                    <td>'.$this->contact_phone.'</td>
                    <td>'.$this->type.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=employee&employee_id='.$this->employee_id.'&fname='.$this->fname.'&mname='.$this->mname.'&lname='.$this->lname.'&dob='.$this->dob.'&address='.$this->address.'&phone_number='.$this->phone_number.'&person_id='.$this->person_id.'&email='.$this->email.'&contact_name='.$this->contact_name.'&contact_phone='.$this->contact_phone.'&type='.$this->type.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=employee&employee_id='.$this->employee_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO employee(fname,mname,lname,dob,address,phone_number,person_id,email,contact_name,contact_phone,type,create_at) VALUES (:fname,:mname,:lname,:dob,:address,:phone_number,:person_id,:email,:contact_name,:contact_phone,:type,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":fname" => $this->fname,
                    ":mname" => $this->mname,
                    ":lname" => $this->lname,
                    ":dob" => $this->dob,
                    ":address" => $this->address,
                    ":phone_number" => $this->phone_number,
                    ":person_id" => $this->person_id,
                    ":email" => $this->email,
                    ":contact_name" => $this->contact_name,
                    ":contact_phone" => $this->contact_phone,
                    ":type" => $this->type,
                )
            );
            $conn = NULL;
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE employee SET fname = :fname,mname = :mname,lname = :lname,dob = :dob,address = :address,phone_number = :phone_number,person_id = :person_id,email = :email,contact_name = :contact_name,contact_phone = :contact_phone,type = :type,update_at = NOW() WHERE employee_id = :employee_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":fname" => $this->fname,
                    ":mname" => $this->mname,
                    ":lname" => $this->lname,
                    ":dob" => $this->dob,
                    ":address" => $this->address,
                    ":phone_number" => $this->phone_number,
                    ":person_id" => $this->person_id,
                    ":email" => $this->email,
                    ":contact_name" => $this->contact_name,
                    ":contact_phone" => $this->contact_phone,
                    ":type" => $this->type,
                    ":employee_id" => $this->employee_id,
                )
            );
            $conn = NULL;
        }

        public function delete() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE employee SET flag = 0,update_at = NOW() WHERE employee_id = :employee_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":employee_id" => $this->employee_id
                )
            );
            $conn = NULL;
        }

    }

    class utilities extends main {
        public $utilities_id;
        public $name;
        public $points;
        public $flag;
        public $create_at;
        public $update_at;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>POINT</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->utilities_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->points.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=utilities&utilities_id='.$this->utilities_id.'&name='.$this->name.'&points='.$this->points.'">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=utilities&utilities_id='.$this->utilities_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO utilities(name,points,create_at) VALUES (:name,:points,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":points" => $this->points,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE utilities SET name = :name,points = :points,update_at = NOW() WHERE utilities_id = :utilities_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":utilities_id" => $this->utilities_id,
                    ":name" => $this->name,
                    ":points" => $this->points
                )
            );
        }

        public function delete() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE utilities SET flag = 0,update_at = NOW() WHERE utilities_id = :utilities_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":utilities_id" => $this->utilities_id
                )
            );
        }

    }

    class device extends main{
        public $device_id;
        public $name;
        public $brand;
        public $width;
        public $length;
        public $height;
        public $weight;
        public $rescription;
        public $flag;
        public $create_at;
        public $update_at;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>BRAND</td>
                    <td>WIDTH</td>
                    <td>LENGTH</td>
                    <td>HEIGHT</td>
                    <td>WEIGHT</td>
                    <td>RESCRIPTION</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->device_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->brand.'</td>
                    <td>'.$this->width.'</td>
                    <td>'.$this->length.'</td>
                    <td>'.$this->height.'</td>
                    <td>'.$this->weight.'</td>
                    <td>'.$this->rescription.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=device&device_id='.$this->device_id.'&name='.$this->name.'&brand='.$this->brand.'&width='.$this->width.'&length='.$this->length.'&height='.$this->height.'&weight='.$this->weight.'&rescription='.$this->rescription.'">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=device&device_id='.$this->device_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO device(name,brand,width,length,height,weight,rescription,create_at) VALUES (:name,:brand,:width,:length,:height,:weight,:rescription,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":brand" => $this->brand,
                    ":width" => $this->width,
                    ":length" => $this->length,
                    ":height" => $this->height,
                    ":weight" => $this->weight,
                    ":rescription" => $this->rescription,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE device SET name = :name,brand = :brand,width = :width,length = :length,height = :height,weight = :weight,rescription = :rescription,update_at = NOW() WHERE device_id = :device_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":brand" => $this->brand,
                    ":width" => $this->width,
                    ":length" => $this->length,
                    ":height" => $this->height,
                    ":weight" => $this->weight,
                    ":rescription" => $this->rescription,
                    ":device_id" => $this->device_id,
                )
            );
        }

        public function delete() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE device SET flag = 0,update_at = NOW() WHERE device_id = :device_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":device_id" => $this->device_id
                )
            );
        }

    }  
    class service extends main {
        public $service_id;
        public $title;
        public $rescription;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>TITLE</td>
                    <td>RESCRIPTION</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->service_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->title.'</td>
                    <td>'.$this->rescription.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=role&service_id='.$this->service_id.'&name='.$this->name.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light"  >Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO service(name,title,rescription,create_at) VALUES (:name,:title,:rescription,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":title" => $this->title,
                    ":rescription" => $this->rescription,
                )
            );
        }


    }










    class member extends main {
        public $member_id;
        public $card_id;
        public $password_hash;
        public $fname;
        public $mname;
        public $lname;
        public $dob;
        public $address;
        public $phone_number;
        public $email;
        public $vip;
        public $package_id;
        public $course_id;
        public $points;
        public $flag;
        public $create_at;
        public $update_at;

        public function show() {
            
        }
    }














?>