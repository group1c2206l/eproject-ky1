<?php 
    require_once('./testconnect/DBinfo.php');
    
    class employeeInfo{
        public $employee_id;
        public $fname;
        public $mname;
        public $lname;
        public $dob;
        public $address;
        public $phone_number;
        public $person_id;
        public $email;
        public $image;
        public $contact_name;
        public $contact_phone;
        public $type;
        public $flag;
        public $create_at;
        public $update_at;

        public function showInfo(){
            $option =  array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $dsn = "mysql:host=" .DBinfo::getServer().";dbname=".DBinfo::getDBname().";charset=utf8";
            $conn = new PDO($dsn, DBinfo::getUserName(), DBinfo::getPassword(), $option);

            $sql = "SELECT * FROM `employee`;";

            $stmt = $conn -> prepare($sql);

            $stmt->execute();
            $arr = Array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $trainer = new employeeInfo();

                $trainer->employee_id = $row["employee_id"];
                $trainer->fname = $row["fname"];
                $trainer->mname = $row["mname"];
                $trainer->lname = $row["lname"];
                $trainer->dob = $row["dob"];
                $trainer->address = $row["address"];
                $trainer->phone_number = $row["phone_number"];
                $trainer->email = $row["email"];
                $trainer->image = $row["image"];
                $trainer->contact_name = $row["contact_name"];
                $trainer->contact_phone = $row["contact_phone"];
                $trainer->type = $row["type"];
                $trainer->flag = $row["flag"];
                $trainer->create_at = $row["create_at"];
                $trainer->update_at = $row["update_at"];

                array_push($arr, $trainer);
            }

            $conn = null;
            return $arr;
        }

        public function showInfoTrainer($trainerID){
            $option =  array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $dsn = "mysql:host=" .DBinfo::getServer().";dbname=".DBinfo::getDBname().";charset=utf8";
            $conn = new PDO($dsn, DBinfo::getUserName(), DBinfo::getPassword(), $option);

            $sql = "SELECT * FROM `employee` WHERE `employee_id` = $trainerID;";

            $stmt = $conn -> prepare($sql);

            $stmt->execute();
            $arr = Array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $trainer = new employeeInfo();

                $trainer->employee_id = $row["employee_id"];
                $trainer->fname = $row["fname"];
                $trainer->mname = $row["mname"];
                $trainer->lname = $row["lname"];
                $trainer->dob = $row["dob"];
                $trainer->address = $row["address"];
                $trainer->phone_number = $row["phone_number"];
                $trainer->email = $row["email"];
                $trainer->image = $row["image"];
                $trainer->contact_name = $row["contact_name"];
                $trainer->contact_phone = $row["contact_phone"];
                $trainer->type = $row["type"];
                $trainer->flag = $row["flag"];
                $trainer->create_at = $row["create_at"];
                $trainer->update_at = $row["update_at"];

                array_push($arr, $trainer);
            }

            $conn = null;
            return $arr;
        }
    }
?>