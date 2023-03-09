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
        public $limit = 10; // so dong hien thi tren moi trang
        public $row_current; //dong du lieu bat dau.
        public $previous;
        public $next;
        public $page; // thu tu trang hien tai dang hien thi
        public $sql; //cau truy van
        public $total; //tong so trang du lieu

        public function total_page($table) {
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT COUNT(*) FROM '.$table.'';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchColumn();
            return ceil($results/$this->limit);
        }

        public function show_pagination($table) {
            $row_current = 0;
            if($this->row_current == 0) {             //neu dang o page 1
                echo '<ul class="pagination pt-3">
                          <li class="page-item"><a class="page-link" href="#">Page '.$this->page.'</a></li>
                          <li class="page-item ps-3"><a class="page-link" href="#" style="color:#ccc;">Previous</a></li>';
                for($s = 1;$s <= $this->total;$s++) {
                    echo '<li class="page-item"><a class="page-link" href="dashboard.php?select='.$table.'&row_current='.$row_current.' ">'.$s.'</a></li>';
                    $row_current += $this->limit;
                }
                echo     '<li class="page-item"><a class="page-link" href="dashboard.php?select='.$table.'&row_current='.$this->next.'">Next</a></li>
                     </ul>';

            } elseif ($this->row_current == $this->total*$this->limit - $this->limit) {  //neu dang o page cuoi cung
                echo '<ul class="pagination pt-3">
                          <li class="page-item"><a class="page-link" href="#">Page '.$this->page.'</a></li>
                          <li class="page-item ps-3"><a class="page-link" href="dashboard.php?select='.$table.'&row_current='.$this->previous.'">Previous</a></li>';
                for($s = 1;$s <= $this->total;$s++) {
                    echo '<li class="page-item"><a class="page-link" href="dashboard.php?select='.$table.'&row_current='.$row_current.' ">'.$s.'</a></li>';
                    $row_current += $this->limit;
                }
                echo     '<li class="page-item"><a class="page-link" href="#" style="color:#ccc;">Next</a></li>
                     </ul>';
            } else {  
                echo '<ul class="pagination pt-3">
                          <li class="page-item"><a class="page-link" href="#">Page '.$this->page.'</a></li>
                          <li class="page-item ps-3"><a class="page-link" href="dashboard.php?select='.$table.'&row_current='.$this->previous.'">Previous</a></li>';
                for($s = 1;$s <= $this->total;$s++) {
                    echo '<li class="page-item"><a class="page-link" href="dashboard.php?select='.$table.'&row_current='.$row_current.' ">'.$s.'</a></li>';
                    $row_current += $this->limit;
                }
                echo     '<li class="page-item"><a class="page-link" href="dashboard.php?select='.$table.'&row_current='.$this->next.'">Next</a></li>
                     </ul>';
            }
        }

        public function show_page($table) {
            $this->total = $this->total_page($table);
            if(isset($_GET["row_current"])) {
                $this->row_current = $_GET["row_current"];
            } else {
                $this->row_current = 0;
            };
            $this->page = ceil($this->row_current/$this->limit)+1;
            if($this->page >1 && $this->page <= $this->total) {
                $this->previous = $this->row_current - $this->limit;
            } else {
                $this->previous = 0;
            };
            if($this->page < $this->total) {
                $this->next = $this->row_current + $this->limit;
            } else {
                $this->next = $this->page*$this->limit - $this->limit;
            }
            $this->show_pagination($table);
        }

        public function arr_result($table) {
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT * FROM '.$table.' LIMIT '.$this->row_current.','.$this->limit.'';
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
                    echo  '<option value="'.$row[$id].'" selected>'.$row[$name].'</option>';
                } else {
                    echo  '<option value="'.$row[$id].'">'.$row[$name].'</option>';

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
                    <td class=' text-warning fw-bold'>ROLE_ID</td>
                    <td class=' text-warning fw-bold'>USER NAME</td>
                    <td class=' text-warning fw-bold'>PASSWORD</td>
                    <td class=' text-warning fw-bold'>EMPLOYEE NAME</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                setcookie("user",$name, time() + 86400,"/");
                if($this->saveme == "saveme") {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    $_SESSION["admin"] = TRUE;
                    setcookie("admin_loggedin",$name,time()+86400,"/");
                    header("location: ../CRUD/dashboard.php");
                } else {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    $_SESSION["admin"] = TRUE;
                    header("location: ../CRUD/dashboard.php");
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
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>NAME</td>
                    <td class=' text-warning fw-bold'>ADDRESS</td>
                    <td class=' text-warning fw-bold'>HOTLINE</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=branch&branch_id='.$this->branch_id.' ">Delete</a></button></td> 
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
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>FNAME</td>
                    <td class=' text-warning fw-bold'>MNAME</td>
                    <td class=' text-warning fw-bold'>LNAME</td>
                    <td class=' text-warning fw-bold'>DOB</td>
                    <td class=' text-warning fw-bold'>ADDRESS</td>
                    <td class=' text-warning fw-bold'>PHONE NUMBER</td>
                    <td class=' text-warning fw-bold'>PERSON ID</td>
                    <td class=' text-warning fw-bold'>EMAIL</td>
                    <td class=' text-warning fw-bold'>CONTACT NAME</td>
                    <td class=' text-warning fw-bold'>CONTACT PHONE</td>
                    <td class=' text-warning fw-bold'>TYPE</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=employee&employee_id='.$this->employee_id.' ">Delete</a></button></td> 
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

    class person_trainer extends main {
        public $person_trainer_id;
        public $fname;
        public $mname;
        public $lname;
        public $code;
        public $dob;
        public $gender;
        public $address;
        public $phone_number;
        public $person_id;
        public $email;
        public $trainer_job;
        public $evaluate;

        public function show_header() {
            echo "<tr>
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>FNAME</td>
                    <td class=' text-warning fw-bold'>MNAME</td>
                    <td class=' text-warning fw-bold'>LNAME</td>
                    <td class=' text-warning fw-bold'>CODE</td>
                    <td class=' text-warning fw-bold'>DOB</td>
                    <td class=' text-warning fw-bold'>GENDER</td>
                    <td class=' text-warning fw-bold'>ADDRESS</td>
                    <td class=' text-warning fw-bold'>PHONE NUMBER</td>
                    <td class=' text-warning fw-bold'>PERSON ID</td>
                    <td class=' text-warning fw-bold'>EMAIL</td>
                    <td class=' text-warning fw-bold'>TRAINER JOB</td>
                    <td class=' text-warning fw-bold'>EVALUATE</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->person_trainer_id.'</td>
                    <td>'.$this->fname.'</td>
                    <td>'.$this->mname.'</td>
                    <td>'.$this->lname.'</td>
                    <td>'.$this->code.'</td>
                    <td>'.$this->dob.'</td>
                    <td>'.$this->gender.'</td>
                    <td>'.$this->address.'</td>
                    <td>'.$this->phone_number.'</td>
                    <td>'.$this->person_id.'</td>
                    <td>'.$this->email.'</td>
                    <td>'.$this->trainer_job.'</td>
                    <td>'.$this->evaluate.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=person_trainer&person_trainer_id='.$this->person_trainer_id.'&fname='.$this->fname.'&mname='.$this->mname.'&code='.$this->code.'&lname='.$this->lname.'&dob='.$this->dob.'&address='.$this->address.'&phone_number='.$this->phone_number.'&person_id='.$this->person_id.'&email='.$this->email.'&trainer_job='.$this->trainer_job.'&evaluate='.$this->evaluate.' ">Edit</a></button></td>
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=person_trainer&person_trainer_id='.$this->person_trainer_id.' ">Delete</a></button></td> 
                </tr>';
        }
        public function addnew() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO person_trainer(fname,mname,lname,code,dob,address,phone_number,person_id,email,trainer_job,evaluate,create_at) VALUES (:fname,:mname,:lname,:code,:dob,:address,:phone_number,:person_id,:email,:trainer_job,:evaluate,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":fname" => $this->fname,
                    ":mname" => $this->mname,
                    ":lname" => $this->lname,
                    ":code" => $this->code,
                    ":dob" => $this->dob,
                    ":address" => $this->address,
                    ":phone_number" => $this->phone_number,
                    ":person_id" => $this->person_id,
                    ":email" => $this->email,
                    ":trainer_job" => $this->trainer_job,
                    ":evaluate" => $this->evaluate,
                )
            );
            $conn = NULL;
        }
        public function edit() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE person_trainer SET fname = :fname,mname = :mname,lname = :lname,dob = :dob,address = :address,phone_number = :phone_number,email = :email,trainer_job = :trainer_job,evaluate = :evaluate,update_at = NOW() WHERE person_trainer_id = :person_trainer_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":fname" => $this->fname,
                    ":mname" => $this->mname,
                    ":lname" => $this->lname,
                    ":dob" => $this->dob,
                    ":address" => $this->address,
                    ":phone_number" => $this->phone_number,
                    ":email" => $this->email,
                    ":trainer_job" => $this->trainer_job,
                    ":evaluate" => $this->evaluate,
                    ":person_trainer_id" => $this->person_trainer_id,
                )
            );
            $conn = NULL;
        }

        public function delete() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE person_trainer SET flag = 0,update_at = NOW() WHERE person_trainer_id = :person_trainer_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":person_trainer_id" => $this->person_trainer_id
                )
            );
            $conn = NULL;
        }
    }

    // class utilities
    class utilities extends main {
        public $utilities_id;
        public $points;
        public $flag;
        public $create_at;
        public $update_at;

        public function show_header() {
            echo "<tr>
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>NAME</td>
                    <td class=' text-warning fw-bold'>POINT</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=utilities&utilities_id='.$this->utilities_id.' ">Delete</a></button></td> 
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
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>NAME</td>
                    <td class=' text-warning fw-bold'>BRAND</td>
                    <td class=' text-warning fw-bold'>WIDTH</td>
                    <td class=' text-warning fw-bold'>LENGTH</td>
                    <td class=' text-warning fw-bold'>HEIGHT</td>
                    <td class=' text-warning fw-bold'>WEIGHT</td>
                    <td class=' text-warning fw-bold'>TITLE</td>
                    <td class=' text-warning fw-bold'>DESCRIPTION</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=device&device_id='.$this->device_id.' ">Delete</a></button></td> 
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
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>NAME</td>
                    <td class=' text-warning fw-bold'>TITLE</td>
                    <td class=' text-warning fw-bold'>DESCRIPTION</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=service&service_id='.$this->service_id.'&name='.$this->name.'&title='.$this->title.'&description='.$this->description.' ">Edit</a></button></td>
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=service&service_id='.$this->service_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {  
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO service(name,title,description,create_at) VALUES (:name,:title,:description,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":title" => $this->title,
                    ":description" => $this->description,
                )
            );
        }

        public function edit() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE service SET name = :name,title = :title,description = :description,update_at = NOW() WHERE service_id = :service_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":title" => $this->title,
                    ":description" => $this->description,
                    ":service_id" => $this->service_id,
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
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>NAME</td>
                    <td class=' text-warning fw-bold'>MENTOR</td>
                    <td class=' text-warning fw-bold'>POINTER</td>
                    <td class=' text-warning fw-bold'>PRICE ($)</td>
                    <td class=' text-warning fw-bold'>EXPIRY (MONTH)</td>
                    <td class=' text-warning fw-bold'>DAY ACTIVE (DAY/WEEK)</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=package&package_id='.$this->package_id.'&name='.$this->name.'&mentor='.$this->mentor.'&points='.$this->points.'&price='.$this->price.'&expiry='.$this->expiry.'&day_active='.$this->day_active.' ">Edit</a></button></td>
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=package&package_id='.$this->package_id.' ">Delete</a></button></td> 
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
            $sql = 'UPDATE package SET flag = 0,update_at = NOW() WHERE package_id = :package_id;';
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
        public $person_trainer_id; // Thong tin id PT cua khoa hoc
        public $mentor; // Thong tin PT cua khoa hoc
        public $description;
        public $start_day;
        public $end_day;
        public $price;

        public function show_header() {
            echo "<tr>
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>NAME</td>
                    <td class=' text-warning fw-bold'>MENTOR</td>
                    <td class=' text-warning fw-bold'>DESCRIPTION</td>
                    <td class=' text-warning fw-bold'>START DAY</td>
                    <td class=' text-warning fw-bold'>END DAY</td>
                    <td class=' text-warning fw-bold'>PRICE</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=course&course_id='.$this->course_id.'&name='.$this->name.'&person_trainer_id='.$this->person_trainer_id.'&description='.$this->description.'&start_day='.$this->start_day.'&end_day='.$this->end_day.'&price='.$this->price.' ">Edit</a></button></td>
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=course&course_id='.$this->course_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO course(name,person_trainer_id,description,start_day,end_day,price,create_at) VALUES (:name,:person_trainer_id,:description,:start_day,:end_day,:price,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":person_trainer_id" => $this->person_trainer_id,
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
            $sql = 'UPDATE course SET name = :name,person_trainer_id = :person_trainer_id,description = :description,start_day = :start_day,end_day = :end_day,price = :price,update_at = NOW() WHERE course_id = :course_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":name" => $this->name,
                    ":person_trainer_id" => $this->person_trainer_id,
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
        public $re_password_hash;
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
        public $saveme;
        public $mes;

        public function show_header() {
            echo "<tr>
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>CARD ID</td>
                    <td class=' text-warning fw-bold'>PW HASH</td>
                    <td class=' text-warning fw-bold'>FNAME</td>
                    <td class=' text-warning fw-bold'>MNAME</td>
                    <td class=' text-warning fw-bold'>LNAME</td>
                    <td class=' text-warning fw-bold'>DOB</td>
                    <td class=' text-warning fw-bold'>ADDRESS</td>
                    <td class=' text-warning fw-bold'>PHONE NUMBER</td>
                    <td class=' text-warning fw-bold'>EMAIL</td>
                    <td class=' text-warning fw-bold'>VIP</td>
                    <td class=' text-warning fw-bold'>PACKAGE</td>
                    <td class=' text-warning fw-bold'>COURSE</td>
                    <td class=' text-warning fw-bold'>POINTS</td>
                    <td class=' text-warning fw-bold'>TYPE</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
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
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=member&member_id='.$this->member_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO member(card_id,password_hash,fname,mname,lname,phone_number,email,create_at) VALUES (:card_id,:password_hash,:fname,:mname,:lname,:phone_number,:email,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":card_id" => $this->card_id,
                    ":password_hash" => $this->password_hash,
                    ":fname" => $this->fname,
                    ":mname" => $this->mname,
                    ":lname" => $this->lname,
                    ":phone_number" => $this->phone_number,
                    ":email" => $this->email,
                )
            );
            $conn = NULL;
        }

        public function edit() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE member SET card_id = :card_id,fname = :fname,mname = :mname,lname = :lname,dob = :dob,address = :address,phone_number = :phone_number,vip = :vip,email = :email,package_id = :package_id,course_id = :course_id,points = :points,update_at = NOW() WHERE member_id = :member_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":card_id" => $this->card_id,
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

        //kiem tra current pass co chinh xac 
        public function check_current_pass() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'SELECT * FROM member WHERE email = :email AND password_hash = :password_hash;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":email" => $this->email,
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
                $name = $this->email;
                setcookie("id",md5($name),time()+86400,"/");
                setcookie("user_name",$name, time() + 86400,"/");
                if($this->saveme == "saveme") {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    setcookie("loggedin",md5($name),time()+86400,"/");
                    header("location: ./index.php");
                } else {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    header("location: ./index.php");
                }
            } else {
                $this->mes = "Invalid username or password";
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

        //dem so dong 
        public function member_type_count() {
            $c = new config;
            $conn = $c->connect();
            $sql = "SELECT COUNT(member_id) FROM member;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

        //check email
        public function check_email() {
            $c = new config;
            $conn = $c->connect();
            $sql = "SELECT email FROM member WHERE email = '".$this->email."';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if(count($results) == 1) {
                return true;
            } else {
                return false;
            }
        }

        //new password
        public function new_pass() {
            $c = new config;
            $conn = $c->connect();
            $sql = "UPDATE member SET  password_hash = '".$this->password_hash."' WHERE email = '".$this->email."';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }


    }

    class galery_type extends main {
        public $galery_type_id;
        public $galery_type_name;

        public function show_header() {
            echo "<tr>
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>NAME</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
                </tr>";
        }

        public function show_item() {
            echo '<tr>
                    <td>'.$this->galery_type_id.'</td>
                    <td>'.$this->galery_type_name.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=galery_type&galery_type_id='.$this->galery_type_id.'&galery_type_name='.$this->galery_type_name.'">Edit</a></button></td>
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=galery_type&galery_type_id='.$this->galery_type_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO galery_type(galery_type_name,create_at) VALUES (:galery_type_name,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":galery_type_name" => $this->galery_type_name,
                )
            );
        }

        public function edit() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE galery_type SET galery_type_name = :galery_type_name,update_at = NOW() WHERE galery_type_id = :galery_type_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":galery_type_name" => $this->galery_type_name,
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
        public $item_id;
        public $item_name;
        public $note;
        public $maxfilesize = 3000000;//3MB;
        public $code;
        public $dir;
        public $img_name;
        public $img_tmp;

        public function show_header() {
            echo "<tr>
                    <td class=' text-warning fw-bold'>ID</td>
                    <td class=' text-warning fw-bold'>GALERY TYPE</td>
                    <td class=' text-warning fw-bold'>ITEM ID</td>
                    <td class=' text-warning fw-bold'>ITEM NAME</td>
                    <td class=' text-warning fw-bold'>NOTE</td>
                    <td class=' text-warning fw-bold'>VIEW</td>
                    <td class=' text-warning fw-bold'>CREATE_AT</td>
                    <td class=' text-warning fw-bold'>UPDATE_AT</td>
                    <td class=' text-warning fw-bold' colspan='2'>ACTION</td>
                </tr>";
        }

        public function show_item() {
            echo '<tr>
                    <td>'.$this->galery_id.'</td>
                    <td>'.$this->galery_type_name.'</td>
                    <td>'.$this->item_id.'</td>
                    <td>'.$this->item_name.'</td>
                    <td>'.$this->note.'</td>
                    <td><img width="80px" height="auto" src=".'.$this->dir.$this->img_name.'" /></td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?edit_id=galery&galery_id='.$this->galery_id.'&galery_type_id='.$this->galery_type_id.'&galery_type_name='.$this->galery_type_name.'&item_id='.$this->item_id.'&item_name='.$this->item_name.'&note='.$this->note.'&dir='.$this->dir.'">Edit</a></button></td>
                    <td><button class="btn btn-danger"><a  class="text-light del" href="delete.php?delete_id=galery&galery_id='.$this->galery_id.' ">Delete</a></button></td> 
                </tr>';
        }

        public function addnew() {
            $c = new config;
            $conn = $c->connect();
            $file_path = '.'.$this->dir.$this->img_name;    //file addnew.php nam o ben trong thu muc
            $filetype = pathinfo($file_path,PATHINFO_EXTENSION);
            $allowtype = array('jpg','png','jpeg','gif','pdf');
            if(in_array($filetype,$allowtype)) {
                if(move_uploaded_file($this->img_tmp,$file_path)) {
                    $sql = "INSERT INTO galery(galery_type_id,galery_type_name,item_id,item_name,note,dir,img_name,CREATE_AT) VALUES (:galery_type_id,:galery_type_name,:item_id,:item_name,:note,:dir,:img_name,NOW())";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(
                        array (
                            "galery_type_id" => $this->galery_type_id,
                            "galery_type_name" => $this->galery_type_name,
                            "item_id" => $this->item_id,
                            "item_name" => $this->item_name,
                            "note" => $this->note,
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
            $file_path = '.'.$this->dir.$this->img_name;    //file addnew.php nam o ben trong thu muc
            $filetype = pathinfo($file_path,PATHINFO_EXTENSION);
            $allowtype = array('jpg','png','jpeg','gif','pdf','svg');
            if(in_array($filetype,$allowtype)) {
                if(move_uploaded_file($this->img_tmp,$file_path)) {
                    $sql = 'UPDATE galery SET item_id = :item_id,item_name = :item_name,note = :note,dir = :dir,img_name = :img_name,update_at = NOW() WHERE galery_id = :galery_id;';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(
                        array (
                            "item_id" => $this->item_id,
                            "item_name" => $this->item_name,
                            "note" => $this->note,
                            "dir" => $this->dir,
                            "img_name" => $this->img_name,
                            ":galery_id" => $this->galery_id,
                        )
                        );
                } else {
                    echo "file upload error";
                }
            } else {
                echo "please check file type";
            } 
        }

        public function delete() {
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE galery SET flag = 0,update_at = NOW() WHERE galery_id = :galery_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    ":galery_id" => $this->galery_id
                )
            );
        }

        public function galery_type_count($type) {
            $c = new config;
            $conn = $c->connect();
            $sql = "SELECT COUNT(galery_type_name) FROM galery WHERE galery_type_name = '".$type."';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

    }

    class mail extends main {
        public $from ;
        public $to  ;
        public $subject  ;
        public $message  ;
        public $headers ;
        public $link_reset;

       public function send_mail() {
            mail($this->to,$this->subject,$this->message,$this->headers);
       }
    }
    


?>