CREATE DATABASE prime_fitness
USE prime_fitness

CREATE TABLE role (
    role_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50),
    password_hash VARCHAR(100),
    flag INT,
)
CREATE TABLE employee(
    employee_id INT NOT NULL AUTO_INCREMENT,
    fname VARCHAR(50) NOT NULL,
    mname VARCHAR(50),
    lname VARCHAR(50) NOT NULL,
    dob DATETIME NOT NULL,
    address VARCHAR(200) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    id_person VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    contact VARCHAR(50),
    contact_phone VARCHAR(15),
    flag VARCHAR(10),
)
CREATE TABLE member(
    member_id int not null AUTO_INCREMENT,
    
)