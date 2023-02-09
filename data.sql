CREATE DATABASE prime_fitness
USE prime_fitness

CREATE TABLE role (
    role_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50),
    password_hash VARCHAR(100),
    flag INT,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_role PRIMARY KEY (role_id)
);
CREATE TABLE branch(
    branch_id int AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
    address VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
    hotline VARCHAR(15),
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_branch PRIMARY KEY (branch_id)
);
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
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_employee PRIMARY KEY (employee_id)
);
CREATE TABLE member(
    member_id int not null AUTO_INCREMENT,
    
);