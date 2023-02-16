<?php
    // class parent
    class main {
        public $name;
        public $flag;
        public $create_at;
        public $update_at;

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

        public function id_to_name($select,$from,$where,$value) {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT '.$select.' FROM '.$from.' WHERE '.$where.' = "'.$value.'" ';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

        public function list_data($id_check,$id,$name,$table) {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT '.$id.','.$name.' FROM '.$table.'';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row) {
                if($id_check == $row[$id]) {
                    echo  '<option value='.$row[$id].' selected>'.$row[$name].'</option>';
                } else {
                    echo  '<option value='.$row[$id].'>'.$row[$name].'</option>';
                }
            }
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

        //kiem tra current pass co chinh xac 
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

        // phuong thuc dang nhap
        public function logins() {
            if($this->check_current_pass()) {
                $name = $this->user_name;
                setcookie("id",md5($name),time()+6000,"/");
                setcookie("user_name",$name, time() + 10000,"/");
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

    //class brand 
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
        public $title;
        public $description;
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
                    <td>TITLE</td>
                    <td>DESCRIPTION</td>
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
                    <td>'.$this->title.'</td>
                    <td>'.$this->description.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=device&device_id='.$this->device_id.'&name='.$this->name.'&brand='.$this->brand.'&width='.$this->width.'&length='.$this->length.'&height='.$this->height.'&weight='.$this->weight.'&title='.$this->title.'&description='.$this->description.'">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=device&device_id='.$this->device_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO device(name,brand,width,length,height,weight,title,description,create_at) VALUES (:name,:brand,:width,:length,:height,:weight,:title,:description,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":brand" => $this->brand,
                    ":width" => $this->width,
                    ":length" => $this->length,
                    ":height" => $this->height,
                    ":weight" => $this->weight,
                    ":title" => $this->title,
                    ":description" => $this->description,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE device SET name = :name,brand = :brand,width = :width,length = :length,height = :height,weight = :weight,title = :title,description = :description,update_at = NOW() WHERE device_id = :device_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":brand" => $this->brand,
                    ":width" => $this->width,
                    ":length" => $this->length,
                    ":height" => $this->height,
                    ":weight" => $this->weight,
                    ":title" => $this->title,
                    ":description" => $this->description,
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
        public $description;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>TITLE</td>
                    <td>DESCRIPTION</td>
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
                    <td>'.$this->description.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=service&service_id='.$this->service_id.'&name='.$this->name.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=service&service_id='.$this->service_id.' ">Delete</a></button></td> 
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
                    ":rescription" => $this->description,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE service SET name = :name,title = :title,rescription = :rescription,update_at = NOW() WHERE service_id = :service_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":title" => $this->title,
                    ":rescription" => $this->description,
                )
            );
        }

        public function delete() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE device SET flag = 0,update_at = NOW() WHERE service_id = :service_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":service_id" => $this->service_id
                )
            );
        }

    }

    class package extends main {
        public $package_id;
        public $employee_id;
        public $mentor;
        public $points;
        public $price;
        public $expiry;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>MENTOR</td>
                    <td>POINTER</td>
                    <td>PRICE</td>
                    <td>EXPIRY</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }

        public function show_item() {
            echo '<tr>
                    <td>'.$this->package_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->mentor.'</td>
                    <td>'.$this->points.'</td>
                    <td>'.$this->price.'</td>
                    <td>'.$this->expiry.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=package&package_id='.$this->package_id.'&name='.$this->name.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=package&package_id='.$this->package_id.' ">Delete</a></button></td> 
                </tr>';
        }

       

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO package(name,mentor,points,price,expiry,create_at) VALUES (:name,:mentor,:points,:price,:expiry,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":mentor" => $this->mentor,
                    ":points" => $this->points,
                    ":price" => $this->price,
                    ":expiry" => $this->expiry,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE service SET name = :name,mentor = :mentor,points = :points,price = :price,expiry = :expiry,update_at = NOW() WHERE package_id = :package_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":mentor" => $this->mentor,
                    ":points" => $this->points,
                    ":price" => $this->price,
                    ":expiry" => $this->expiry,
                    ":package_id" => $this->package_id,
                )
            );
        }

        public function delete() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE device SET flag = 0,update_at = NOW() WHERE package_id = :package_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":package_id" => $this->package_id
                )
            );
        }


    }

    //class course
    class course extends main {
        public $course_id;
        public $employee_id; // Thong tin PT cua khoa hoc
        public $mentor; // Thong tin PT cua khoa hoc
        public $description;
        public $start_day;
        public $end_day;
        public $price;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>MENTOR</td>
                    <td>DESCRIPTION</td>
                    <td>START DAY</td>
                    <td>END DAY</td>
                    <td>PRICE</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                    <td colspan='2'>ACTION</td>
                </tr>";
        }

        public function show_item() {
            echo '<tr>
                    <td>'.$this->course_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->mentor.'</td>
                    <td>'.$this->description.'</td>
                    <td>'.$this->start_day.'</td>
                    <td>'.$this->end_day.'</td>
                    <td>'.$this->price.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=course&course_id='.$this->course_id.'&name='.$this->name.'&name='.$this->name.'&name='.$this->name.'&name='.$this->name.'&name='.$this->name.'&name='.$this->name.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=course&course_id='.$this->course_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO course(name,mentor,description,start_day,end_day,price,create_at) VALUES (:name,:mentor,:description,:start_day,:end_day,:price,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":mentor" => $this->mentor,
                    ":description" => $this->description,
                    ":start_day" => $this->start_day,
                    ":end_day" => $this->end_day,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE service SET name = :name,mentor = :mentor,points = :points,price = :price,expiry = :expiry,update_at = NOW() WHERE package_id = :package_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":mentor" => $this->mentor,
                    ":description" => $this->description,
                    ":start_day" => $this->start_day,
                    ":end_day" => $this->end_day,
                    ":course_id" => $this->course_id,
                )
            );
        }

        public function delete() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE course SET flag = 0,update_at = NOW() WHERE course_id = :course_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":course_id" => $this->course_id
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