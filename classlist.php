<?php
    class roles {
        public $role_id;
        public $user_name;
        public $password_hash;
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
                    <td><button class="btn btn-primary"><a  class="text-light" href="">Edit</a></button></td>
                    <td><button class="btn btn-primary"><a  class="text-light"  >Delete</a></button></td> 
                </tr>';
        }
        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO roles(user_name,password_hash,flag,create_at) VALUES ("'.$this->user_name.'","'.$this->password_hash.'",NOW())';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE brand SET user_name = "'.$this->user_name.'",password_hash = "'.$this->password_hash.'",flag = "'.$this->flag.'",update_at = NOW() WHERE roles_id = "'.$this->roles_id.'"';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
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
                    <td>ROLES_ID</td>
                    <td>USER NAME</td>
                    <td>PASSWORD</td>
                    <td>EMPLOYEE NAME</td>
                    <td>FLAG</td>
                    <td>CREATE_AT</td>
                    <td>UPDATE_AT</td>
                </tr>";
        }
        public function show_item() {
            echo '<tr>
                    <td>'.$this->brand_id.'</td>
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
        public function addnew() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'INSERT INTO brand(user_name,password_hash,flag,create_at) VALUES ("'.$this->user_name.'","'.$this->password_hash.'",NOW())';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }

        public function edit() {
            require "config.php";
            $c = new config;
            $conn = $c->connect();
            $sql = 'UPDATE brand SET user_name = "'.$this->user_name.'",password_hash = "'.$this->password_hash.'",flag = "'.$this->flag.'",update_at = NOW() WHERE roles_id = "'.$this->roles_id.'"';
            $tsql = $conn->prepare($sql);
            $tsql->execute();
        }

    }














?>