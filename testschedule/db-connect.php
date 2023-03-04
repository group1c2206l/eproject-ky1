<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='gym_manager';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}