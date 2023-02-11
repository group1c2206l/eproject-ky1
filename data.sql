CREATE DATABASE prime_fitness
USE prime_fitness

CREATE TABLE role (
    role_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50),
    password_hash VARCHAR(100),
    flag INT DEFAULT 1,
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
    person_id VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    contact VARCHAR(50),
    contact_phone VARCHAR(15),
    points INT NOT NULL DEFAULT 0,
    type VARCHAR(10) NOT NULL,  --phan biet staff va PT (person trainer)
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_employee PRIMARY KEY (employee_id)
);

CREATE TABLE member(
    member_id INT not null AUTO_INCREMENT,
    card_id VARCHAR(20) NOT NULL,
    password_hash VARCHAR(50) NOT NULL,
    fname VARCHAR(50) NOT NULL,
    mname VARCHAR(50),
    lname VARCHAR(50) NOT NULL,
    dob DATETIME NOT NULL,
    address VARCHAR(200) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    vip INT DEFAULT 0,
    package_id INT,
    course_id INT,
    points INT,
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_member_id PRIMARY KEY (member_id)

);

CREATE TABLE utilities(
    utilities_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    points INT NOT NULL,
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_utilities PRIMARY KEY (utilities_id)
);

CREATE TABLE device(
    device_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    band VARCHAR(50),
    width FLOAT ,
    length FLOAT,
    height FLOAT,
    weight FLOAT,
    rescription VARCHAR(500),
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_device_id PRIMARY KEY (device_id)
);

CREATE TABLE service(
    service_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    title VARCHAR(200),
    rescription VARCHAR(500),
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_service_id PRIMARY KEY (service_id)
);

CREATE TABLE package(
    package_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    mentor VARCHAR(10) NOT NULL DEFAULT "YES",
    points INT NOT NULL, --diem thuong trong goi
    price INT NOT NULL, -- chi phi goi 
    expiry INT NOT NULL, -- thoi gian goi dang ky, tinh theo thang.
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME
    CONSTRAINT PK_package_id PRIMARY KEY (package_id)
);

CREATE TABLE course(
    course_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    employee_id INT,   --thong tin PT khoa hoc
    rescription VARCHAR(500) NOT NULL,
    start_day DATETIME NOT NULL,
    end_day DATETIME NOT NULL,
    price INT NOT NULL,
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME
    CONSTRAINT PK_course_id PRIMARY KEY (course_id)
);

CREATE TABLE galery_option(
    galery_option_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL, --ex: slide, device, package, course, service, employee
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_galery_option_id PRIMARY KEY (galery_option_id)
);

CREATE TABLE galery(
    galery_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    galery_option_id INT NOT NULL,
    member_id INT,
    device_id INT,
    service_id INT,
    course_id INT,
    employee_id INT,
    package_id INT,
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_galery_id PRIMARY KEY (galery_id)
);

