CREATE DATABASE prime_fitness
USE prime_fitness

CREATE TABLE role (
    role_id INT AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(50) UNIQUE,
    password_hash VARCHAR(100),
    employee_id INT,  -- nhan vien dang quan ly tai khoan
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
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_branch PRIMARY KEY (branch_id)
);

CREATE TABLE employee(
    employee_id INT AUTO_INCREMENT NOT NULL ,
    fname VARCHAR(50) NOT NULL,
    mname VARCHAR(50),
    lname VARCHAR(50) NOT NULL,
    dob DATETIME NOT NULL,
    address VARCHAR(200) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    person_id VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    contact_name VARCHAR(50), -- full name nguoi lien he
    contact_phone VARCHAR(15), -- so dien thoai nguoi lien he
    type VARCHAR(10) NOT NULL,  -- phan biet staff va PT (person trainer)
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_employee PRIMARY KEY (employee_id)
);

-- list of person trainer
CREATE TABLE person_trainer(
    person_trainer_id INT AUTO_INCREMENT NOT NULL,
    fname VARCHAR(50) NOT NULL,
    mname VARCHAR(50),
    lname VARCHAR(50) NOT NULL,
    code VARCHAR(10) NOT NULL, -- ma nhan vien
    dob DATETIME NOT NULL,
    gender VARCHAR(20) NOT NULL,
    address VARCHAR(200) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    person_id VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    trainer_job VARCHAR(100),
    evaluate VARCHAR(500),
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_person_trainer PRIMARY KEY (person_trainer_id)
);


CREATE TABLE utilities(
    utilities_id INT AUTO_INCREMENT NOT NULL ,
    name VARCHAR(50) NOT NULL,
    points INT NOT NULL, -- so diem tich luy can de su dung dich vu
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_utilities PRIMARY KEY (utilities_id)
);

CREATE TABLE device(
    device_id INT AUTO_INCREMENT NOT NULL ,
    name VARCHAR(100) NOT NULL,
    brand VARCHAR(50),
    width FLOAT ,
    length FLOAT,
    height FLOAT,
    weight FLOAT,
    title VARCHAR(100),
    description VARCHAR(500),
    flag INT DEFAULT 1,
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_device_id PRIMARY KEY (device_id)
);

CREATE TABLE service(
    service_id INT AUTO_INCREMENT NOT NULL ,
    name VARCHAR(50) NOT NULL,
    title VARCHAR(200),
    description VARCHAR(500),
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_service_id PRIMARY KEY (service_id)
);

CREATE TABLE package(
    package_id INT AUTO_INCREMENT NOT NULL ,
    name VARCHAR(50) NOT NULL,
    mentor VARCHAR(10) NOT NULL DEFAULT "YES",
    points INT NOT NULL, -- diem thuong trong goi
    price INT NOT NULL, -- chi phi goi 
    expiry INT NOT NULL, -- thoi gian goi dang ky, tinh theo thang.
    day_active INT NOT NULL, -- so ngay tap luyen toi da trong tuan
    utilities_id INT,  -- tien ich duoc su dung trong goi
    description VARCHAR(500),
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_package_id PRIMARY KEY (package_id)
);

CREATE TABLE course(
    course_id INT AUTO_INCREMENT NOT NULL ,
    name VARCHAR(50) NOT NULL,
    person_trainer_id INT,   -- thong tin PT khoa hoc
    description VARCHAR(500) NOT NULL,
    start_day DATETIME NOT NULL,
    end_day DATETIME NOT NULL,
    price INT NOT NULL,
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_course_id PRIMARY KEY (course_id)
);

CREATE TABLE member(
    member_id INT AUTO_INCREMENT NOT NULL ,
    card_id VARCHAR(20) UNIQUE NOT NULL,  -- ma the thanh vien 
    password_hash VARCHAR(50) NOT NULL,
    fname VARCHAR(50) NOT NULL,
    mname VARCHAR(50),
    lname VARCHAR(50) NOT NULL,
    dob DATE NOT NULL,
    address VARCHAR(200) NOT NULL,
    phone_number VARCHAR(15) UNIQUE NOT NULL, -- thong tin dang nhap tk cua thanh vien tren he thong
    email VARCHAR(50) UNIQUE NOT NULL, -- thong tin dang nhap tk cua thanh vien tren he thong
    vip INT DEFAULT 0, -- mac dinh la 0, 1 neu la nguoi noi tieng
    package_id INT, -- thong tin ve goi thanh vien
    course_id INT, -- thong tin ve khoa hoc da dang ky
    points INT DEFAULT 0, -- so diem tich luy
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_member_id PRIMARY KEY (member_id)
);

-- phan tach thu vien anh cho tung chuyen muc khac nhau
CREATE TABLE galery_type(
    galery_type_id INT AUTO_INCREMENT NOT NULL,
    galery_type_name VARCHAR(50) NOT NULL, -- ex: slide, device, package, course, service, employee
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_galery_type_id PRIMARY KEY (galery_type_id),
    CONSTRAINT PK_galery_type_name PRIMARY KEY (galery_type_name)
);

CREATE TABLE galery(
    galery_id INT AUTO_INCREMENT NOT NULL ,
    galery_type_id INT NOT NULL,
    galery_type_name VARCHAR(50) NOT NULL, 
    item_id INT,
    item_name VARCHAR(50),
    note INT VARCHAR(500),
    dir VARCHAR(200) NOT NULL,
    img_name VARCHAR(100) NOT NULL,
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_galery_id PRIMARY KEY (galery_id),
);

CREATE TABLE about(
    about_id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(200),
    title VARCHAR(300),
    description VARCHAR(500),
    flag INT DEFAULT 1, 
    create_at DATETIME,
    update_at DATETIME,
    CONSTRAINT PK_about_id PRIMARY KEY (about_id)
);

CREATE TABLE 

ALTER TABLE galery_type
ADD CONSTRAINT PK_galery_type_name PRIMARY KEY (galery_type_name);

ALTER TABLE role
ADD FOREIGN KEY (employee_id) REFERENCES employee(employee_id);

ALTER TABLE member
ADD CONSTRAINT FK_member_package_id FOREIGN KEY (package_id) REFERENCES package(package_id);

ALTER TABLE member
ADD CONSTRAINT FK_member_course_id FOREIGN KEY (course_id) REFERENCES course(course_id);

ALTER TABLE course
ADD CONSTRAINT FK_person_trainer_id FOREIGN KEY (person_trainer_id) REFERENCES person_trainer(person_trainer_id);

ALTER TABLE galery
ADD CONSTRAINT FK_galery_type FOREIGN KEY (galery_type_id) REFERENCES galery_type(galery_type_id);

-- M?? h??nh kinh doanh :
-- * c??c d???nh v??? luy???n t???p bao g???m:
--     + Cycling.
--     + Swimming.
--     + Sports & Fitness (m???t s??? m??n th??? theo v?? c??c thi???t b??? luy???n t???p ti??u chu???n).
--     + Group Exercise (th??? d???c nh??m, gi???m c??n n??ng cao s???c kh???e).
-- * C??c kh??a h???c ???????c t??? ch???c t???i trung t??m:
--     + Martial arts (l???p v?? thu???t)
--         - MMA (v?? t???ng h???p) - chi phi : 80$ / l???p.
--         - Boxing (Quy???n anh nghi???p d??). - chi phi : 80$ / l???p.
--         - Muay Thai. - chi phi : 80$ / l???p.
--     + GYM / FITNESS
--         - Yoga - chi phi : 80$ / l???p.
--         - CrossFit - chi phi : 80$ / l???p.
--         - Inferno & Burn - chi phi : 80$ / l???p.
--     + Dance - chi phi : 50$ / l???p.
--     + Zumba - chi phi : 50$ / l???p.
-- * C??c ti???n ??ch bao g???m :
--     + Salon & Spa. - 200 ??i???m / l???n.
--     + functional foods. - t??y theo gi?? tr??? c???a t???ng s???n ph???m.
--     + massager - 20 ??i???m/ 20 ph??t.
-- * D??ng ti???n s??? t???p trung v??o vi???c b??n c??c g??i th??nh vi??n v?? kh??a h???c .
-- * G??i th??nh vi??n chia l??m 3 g??i:
--  + G??i c?? b???n (basic):
--     - Th???i gian t???p luy???n : 3 ng??y trong tu???n , ki???m so??t khi d??ng th??? th??nh vi??n checkin t???i c???ng.
--     - ng?????i h?????ng d???n : c??.
--     - s??? d???ng thi???t b???: t???t c??? c??c thi???t b??? luy???n t???p ti??u chu???n t???i trung t??m.
--     - ??i???m th?????ng ti???n ??ch: 1000 ??i???m (???????c s??? d???ng ????? thanh to??n cho c??c ti???n ??ch t???i trung t??m).
--     - gi?? ti???n : 50$ / th??ng  - 500$/1 n??m.
--  + G??i ti??u chu???n (standard)
--     - Th???i gian t???p luy???n : 5 ng??y trong tu???n , ki???m so??t khi d??ng th??? th??nh vi??n checkin t???i c???ng.
--     - ng?????i h?????ng d???n : c??.
--     - s??? d???ng thi???t b???: t???t c??? c??c thi???t b??? luy???n t???p ti??u chu???n t???i trung t??m.
--     - ??i???m th?????ng ti???n ??ch: 2000 ??i???m (???????c s??? d???ng ????? thanh to??n cho c??c ti???n ??ch t???i trung t??m).
--     - gi?? ti???n : 80$/ th??ng - 800$/ 1 n??m.
--  + G??i cao c???p (premium)
--     - Th???i gian t???p luy???n : 7 ng??y trong tu???n , ki???m so??t khi d??ng th??? th??nh vi??n checkin t???i c???ng.
--     - ng?????i h?????ng d???n : c??.
--     - s??? d???ng thi???t b???: t???t c??? c??c thi???t b??? luy???n t???p  t???i trung t??m.
--     - ??i???m th?????ng ti???n ??ch: 3000 ??i???m (???????c s??? d???ng ????? thanh to??n cho c??c ti???n ??ch t???i trung t??m).
--     - free massager
--     - gi?? ti???n : 120$ / th??ng  - 1200$/n??m. 

-- rename("user/image1.jpg", "user/del/image1.jpg");
