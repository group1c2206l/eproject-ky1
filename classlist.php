<?php
    class role {
        public $role_id;
        public $user_name;
        public $password_hash;
        public $new_password_hash;
        public $employee_name;
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
                    <td><button class="btn btn-primary"><a  class="text-light" href="edit.php?editid=role&role_id='.$this->role_id.'&user_name='.$this->user_name.' ">Edit</a></button></td>
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
            echo count($results);
            if(count($results) == 1) {
                return true;
            } else {
                return false;
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
    

        public function arr_result($query) {
            require_once "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = "SELECT * FROM ".$query." ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    class branch {
        public $branch_id;
        public $name;
        public $address;
        public $hotline;
        public $flag;
        public $create_at;
        public $update_at;

        public function show_header() {
            echo "<tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>ADDRESS</td>
                    <td>HOTLINE</td>
                    <td>FLAG</td>
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
                    <td>'.$this->flag.'</td>
                    <td>'.$this->create_at.'</td>
                    <td>'.$this->update_at.'</td>
                    <td><button class="btn btn-primary"><a  class="text-light" href="">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light"  >Delete</a></button></td> 
                </tr>';
        }
        public function arr_result($query) {
            require_once "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = "SELECT * FROM ".$query." ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO brand(name,address,hotline,flag,create_at) VALUES (:name,:address,:hotline,:flag,NOW())';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    "name" => $this->name,
                    "address" => $this->address,
                    "hotline" => $this->hotline,
                )
            );
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE brand SET name = :name,address = :address,hotline = :hotline,flag = :flag,update_at = NOW() WHERE roles_id = :role_id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array (
                    "name" => $this->name,
                    "address" => $this->address,
                    "hotline" => $this->hotline,
                    "flag" => $this->flag,
                )
            );
        }

    }

    class galery {

    }














?>