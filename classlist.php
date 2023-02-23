<?php
    require "config.php";
    // class parent
    class main {
        public $select;
        public $name;
        public $flag;
        public $create_at;
        public $update_at;
        public $sl ;

        public function arr_result($query) {
            require_once "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = "SELECT * FROM ".$query." ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function search_list($arr) { //xuat danh sach danh muc tim kiem
            foreach($arr as $item) {
                echo '
                    <option value="'.$item.'">'.$item.'</option>
                ';
            }
        }

        public function search_item($table,$search_list,$search_data) {
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT * FROM '.$table.' WHERE '.$search_list.' LIKE :search_data ;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":search_data" => '%'.$search_data.'%'
                )
            );
            $conn = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function id_to_name($select,$from,$where,$value) {
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT '.$select.' FROM '.$from.' WHERE '.$where.' = "'.$value.'" ';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

        public function list_data($id_check,$id,$name,$table) {
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
        public function list_data_name($id_check,$id,$name,$table) {
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT '.$id.','.$name.' FROM '.$table.'';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row) {
                if($id_check == $row[$name]) {
                    echo  '<option value='.$row[$name].' selected>'.$row[$name].'</option>';
                } else {
                    echo  '<option value='.$row[$name].'>'.$row[$name].'</option>';

                }
            }
        }

        public function list_data_with_condition($id_check,$id,$name,$table,$where,$condition) {
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT '.$id.','.$name.' FROM '.$table.' WHERE '.$where.' = "'.$condition.'" ';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach($results as $row) {
                if($id_check == $row[$id]) {
                    echo  '<option value='.$row[$id].' selected>'.$row[$name].'</option>';
                } else {
                    echo  '<option value='.$row[$id].'>'.$row[$name].'</option>';
                    $this->sl = $row["name"];
                    echo $this->sl;
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
                    <td class='table-dark text-warning fw-bold'>ROLE_ID</td>
                    <td class='table-dark text-warning fw-bold'>USER NAME</td>
                    <td class='table-dark text-warning fw-bold'>PASSWORD</td>
                    <td class='table-dark text-warning fw-bold'>EMPLOYEE NAME</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->role_id.'</td>
                    <td>'.$this->user_name.'</td>
                    <td>'.$this->password_hash.'</td>
                    <td>'.$this->employee_name.'</td>
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
                setcookie("id",md5($name),time()+86400,"/");
                setcookie("user_name",$name, time() + 86400,"/");
                if($this->saveme == "saveme") {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    setcookie("loggedin",$name,time()+86400,"/");
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
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>NAME</td>
                    <td class='table-dark text-warning fw-bold'>ADDRESS</td>
                    <td class='table-dark text-warning fw-bold'>HOTLINE</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
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
            $conn = null;
        }

        public function edit() {
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
            $conn = null;
        }

        public function delete() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE branch SET flag = 0,update_at = NOW() WHERE branch_id = :branch_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":branch_id" => $this->branch_id
                )
            );
            $conn = null;
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
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>FNAME</td>
                    <td class='table-dark text-warning fw-bold'>MNAME</td>
                    <td class='table-dark text-warning fw-bold'>LNAME</td>
                    <td class='table-dark text-warning fw-bold'>DOB</td>
                    <td class='table-dark text-warning fw-bold'>ADDRESS</td>
                    <td class='table-dark text-warning fw-bold'>PHONE NUMBER</td>
                    <td class='table-dark text-warning fw-bold'>PERSON ID</td>
                    <td class='table-dark text-warning fw-bold'>EMAIL</td>
                    <td class='table-dark text-warning fw-bold'>CONTACT NAME</td>
                    <td class='table-dark text-warning fw-bold'>CONTACT PHONE</td>
                    <td class='table-dark text-warning fw-bold'>TYPE</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>NAME</td>
                    <td class='table-dark text-warning fw-bold'>POINT</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>NAME</td>
                    <td class='table-dark text-warning fw-bold'>BRAND</td>
                    <td class='table-dark text-warning fw-bold'>WIDTH</td>
                    <td class='table-dark text-warning fw-bold'>LENGTH</td>
                    <td class='table-dark text-warning fw-bold'>HEIGHT</td>
                    <td class='table-dark text-warning fw-bold'>WEIGHT</td>
                    <td class='table-dark text-warning fw-bold'>TITLE</td>
                    <td class='table-dark text-warning fw-bold'>DESCRIPTION</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>NAME</td>
                    <td class='table-dark text-warning fw-bold'>TITLE</td>
                    <td class='table-dark text-warning fw-bold'>DESCRIPTION</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
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
        public $mentor;
        public $points;
        public $price;
        public $expiry;
        public $day_active;

        public function show_header() {
            echo "<tr>
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>NAME</td>
                    <td class='table-dark text-warning fw-bold'>MENTOR</td>
                    <td class='table-dark text-warning fw-bold'>POINTER</td>
                    <td class='table-dark text-warning fw-bold'>PRICE ($)</td>
                    <td class='table-dark text-warning fw-bold'>EXPIRY (MONTH)</td>
                    <td class='table-dark text-warning fw-bold'>DAY ACTIVE (DAY/WEEK)</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td>'.$this->day_active.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=package&package_id='.$this->package_id.'&name='.$this->name.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=package&package_id='.$this->package_id.' ">Delete</a></button></td> 
                </tr>';
        }

       

        public function addnew() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO package(name,mentor,points,price,expiry,day_active,create_at) VALUES (:name,:mentor,:points,:price,:expiry,:day_active,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":mentor" => $this->mentor,
                    ":points" => $this->points,
                    ":price" => $this->price,
                    ":expiry" => $this->expiry,
                    ":day_active" => $this->day_active,
                )
            );
        }

        public function edit() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE service SET name = :name,mentor = :mentor,points = :points,price = :price,expiry = :expiry,day_active = :day_active,update_at = NOW() WHERE package_id = :package_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":mentor" => $this->mentor,
                    ":points" => $this->points,
                    ":price" => $this->price,
                    ":expiry" => $this->expiry,
                    ":day_active" => $this->day_active,
                    ":package_id" => $this->package_id,
                )
            );
        }

        public function delete() {
            
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
        public $employee_id; // Thong tin id PT cua khoa hoc
        public $mentor; // Thong tin PT cua khoa hoc
        public $description;
        public $start_day;
        public $end_day;
        public $price;

        public function show_header() {
            echo "<tr>
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>NAME</td>
                    <td class='table-dark text-warning fw-bold'>MENTOR</td>
                    <td class='table-dark text-warning fw-bold'>DESCRIPTION</td>
                    <td class='table-dark text-warning fw-bold'>START DAY</td>
                    <td class='table-dark text-warning fw-bold'>END DAY</td>
                    <td class='table-dark text-warning fw-bold'>PRICE</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
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
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO course(name,employee_id,description,start_day,end_day,price,create_at) VALUES (:name,:employee_id,:description,:start_day,:end_day,:price,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":employee_id" => $this->employee_id,
                    ":description" => $this->description,
                    ":start_day" => $this->start_day,
                    ":end_day" => $this->end_day,
                    ":price" => $this->price,
                )
            );
        }

        public function edit() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE service SET name = :name,mentor = :mentor,points = :points,price = :price,expiry = :expiry,update_at = NOW() WHERE package_id = :package_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":employee_id" => $this->employee_id,
                    ":description" => $this->description,
                    ":start_day" => $this->start_day,
                    ":end_day" => $this->end_day,
                    ":price" => $this->price,
                    ":course_id" => $this->course_id,
                )
            );
        }

        public function delete() {
            
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

        public function show_header() {
            echo "<tr>
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>CARD ID</td>
                    <td class='table-dark text-warning fw-bold'>PW HASH</td>
                    <td class='table-dark text-warning fw-bold'>FNAME</td>
                    <td class='table-dark text-warning fw-bold'>MNAME</td>
                    <td class='table-dark text-warning fw-bold'>LNAME</td>
                    <td class='table-dark text-warning fw-bold'>DOB</td>
                    <td class='table-dark text-warning fw-bold'>ADDRESS</td>
                    <td class='table-dark text-warning fw-bold'>PHONE NUMBER</td>
                    <td class='table-dark text-warning fw-bold'>EMAIL</td>
                    <td class='table-dark text-warning fw-bold'>VIP</td>
                    <td class='table-dark text-warning fw-bold'>PACKAGE</td>
                    <td class='table-dark text-warning fw-bold'>COURSE</td>
                    <td class='table-dark text-warning fw-bold'>POINTS</td>
                    <td class='table-dark text-warning fw-bold'>TYPE</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->member_id.'</td>
                    <td>'.$this->card_id.'</td>
                    <td>'.$this->password_hash.'</td>
                    <td>'.$this->fname.'</td>
                    <td>'.$this->mname.'</td>
                    <td>'.$this->lname.'</td>
                    <td>'.$this->dob.'</td>
                    <td>'.$this->address.'</td>
                    <td>'.$this->phone_number.'</td>
                    <td>'.$this->email.'</td>
                    <td>'.$this->vip.'</td>
                    <td>'.$this->package_id.'</td>
                    <td>'.$this->course_id.'</td>
                    <td>'.$this->points.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=member&member_id='.$this->member_id.'&card_id='.$this->card_id.'&password_hash='.$this->password_hash.'&fname='.$this->fname.'&mname='.$this->mname.'&lname='.$this->lname.'&dob='.$this->dob.'&address='.$this->address.'&phone_number='.$this->phone_number.'&vip='.$this->vip.'&email='.$this->email.'&package_id='.$this->package_id.'&course_id='.$this->course_id.'&points='.$this->points.' ">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=member&member_id='.$this->member_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO member(card_id,fname,mname,lname,dob,address,phone_number,person_id,email,contact_name,contact_phone,type,create_at) VALUES (:fname,:mname,:lname,:dob,:address,:phone_number,:person_id,:email,:contact_name,:contact_phone,:type,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":card_id" => $this->card_id,
                    ":password_hash" => $this->password_hash,
                    ":fname" => $this->fname,
                    ":mname" => $this->mname,
                    ":lname" => $this->lname,
                    ":dob" => $this->dob,
                    ":address" => $this->address,
                    ":phone_number" => $this->phone_number,
                    ":vip" => $this->vip,
                    ":email" => $this->email,
                    ":package_id" => $this->package_id,
                    ":course_id" => $this->course_id,
                    ":points" => $this->points,
                )
            );
            $conn = NULL;
        }

        public function edit() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE member SET card_id = :card_id,fname = :fname,mname = :mname,lname = :lname,password_hash = :password_hash,dob = :dob,address = :address,phone_number = :phone_number,vip = :vip,email = :email,package_id = :package_id,course_id = :course_id,points = :points,update_at = NOW() WHERE employee_id = :employee_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":card_id" => $this->card_id,
                    ":password_hash" => $this->password_hash,
                    ":fname" => $this->fname,
                    ":mname" => $this->mname,
                    ":lname" => $this->lname,
                    ":dob" => $this->dob,
                    ":address" => $this->address,
                    ":phone_number" => $this->phone_number,
                    ":vip" => $this->vip,
                    ":email" => $this->email,
                    ":package_id" => $this->package_id,
                    ":course_id" => $this->course_id,
                    ":points" => $this->points,
                    ":member_id" => $this->member_id,
                )
            );
            $conn = NULL;
        }

        public function delete() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE member SET flag = 0,update_at = NOW() WHERE member_id = :member_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":member_id" => $this->member_id
                )
            );
            $conn = NULL;
        }

    }

    class galery_type extends main {
        public $galery_type_id;

        public function show_header() {
            echo "<tr>
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>NAME</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
                </tr>";
        }

        public function show_item() {
            echo '<tr>
                    <td>'.$this->galery_type_id.'</td>
                    <td>'.$this->name.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=galery_type&galery_type_id='.$this->galery_type_id.'&name='.$this->name.'">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=galery_type&galery_type_id='.$this->galery_type_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO galery_type(name,create_at) VALUES (:name,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                )
            );
        }

        public function edit() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE galery_type SET name = :name,update_at = NOW() WHERE galery_type_id = :galery_type_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":galery_type_id" => $this->galery_type_id,
                )
            );
        }

        public function delete() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE galery_type SET flag = 0,update_at = NOW() WHERE galery_type_id = :galery_type_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":galery_type_id" => $this->galery_type_id
                )
            );
        }

    }

    class galery extends main {
        public $galery_id;
        public $galery_type_id;
        public $galery_type_name;
        public $galery_name;
        public $device_id;
        public $service_id;
        public $course_id;
        public $employee_id;
        public $member_id;
        public $package_id;
        public $code;
        public $dir;
        public $img_name;
        public $img_tmp;
        public $slide_name;



        public function show_header() {
            echo "<tr>
                    <td class='table-dark text-warning fw-bold'>ID</td>
                    <td class='table-dark text-warning fw-bold'>TYPE NAME</td>
                    <td class='table-dark text-warning fw-bold'>OPTION</td>
                    <td class='table-dark text-warning fw-bold'>CODE</td>
                    <td class='table-dark text-warning fw-bold'>DIR</td>
                    <td class='table-dark text-warning fw-bold'>IMAGE NAME</td>
                    <td class='table-dark text-warning fw-bold'>CREATE_AT</td>
                    <td class='table-dark text-warning fw-bold'>UPDATE_AT</td>
                    <td class='table-dark text-warning fw-bold' colspan='2'>ACTION</td>
                </tr>";
        }

        public function show_item() {
            echo '<tr>
                    <td>'.$this->galery_id.'</td>
                    <td>'.$this->galery_type_name.'</td>
                    <td>'.$this->galery_name.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=galery_type&galery_type_id='.$this->galery_type_id.'&name='.$this->name.'&name='.$this->name.'">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light del" href="delete.php?delete_id=galery_type&galery_type_id='.$this->galery_type_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            $c = new config;
            $conn = $c->connect();
            $file_path = $this->dir.$this->img_name;
            echo $file_path;
            $filetype = pathinfo($file_path,PATHINFO_EXTENSION);
            $allowtype = array('jpg','png','jpeg','gif','pdf');
            if(in_array($filetype,$allowtype)) {
                if(move_uploaded_file($this->img_tmp,$file_path)) {
                    $sql = "INSERT INTO galery(galery_type_name,device_id,service_id,course_id,employee_id,package_id,member_id,dir,img_name,CREATE_AT) VALUES (:galery_type_name,:device_id,:service_id,:course_id,:employee_id,:package_id,:member_id,:dir,:img_name,NOW())";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(
                        array (
                            "galery_type_name" => $this->galery_type_name,
                            "device_id" => $this->device_id,
                            "service_id" => $this->service_id,
                            "course_id" => $this->course_id,
                            "employee_id" => $this->employee_id,
                            "package_id" => $this->package_id,
                            "member_id" => $this->member_id,
                            "dir" => $this->dir,
                            "img_name" => $this->img_name,
                        )
                    );
                } else {
                    echo "file upload error";
                }
            } else {
                echo "please check file type";
            }
        }

        public function edit() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE galery SET name = :name,update_at = NOW() WHERE galery_type_id = :galery_type_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":galery_type_id" => $this->galery_type_id,
                )
            );
        }

        public function delete() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE galery SET flag = 0,update_at = NOW() WHERE galery_type_id = :galery_type_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":galery_type_id" => $this->galery_type_id
                )
            );
        }

    }
    


?>