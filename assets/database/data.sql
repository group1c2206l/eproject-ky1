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

-- danh sach nguoi huong dan club
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

-- CREATE TABLE service_device(
--     service_device_id INT AUTO_INCREMENT NOT NULL ,
--     service_id INT NOT NULL,
--     device_id INT NOT NULL,
--     flag INT DEFAULT 1, 
--     create_at DATETIME,
--     update_at DATETIME,
--     CONSTRAINT PK_service_device_id PRIMARY KEY (service_device_id)
-- );

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

ALTER TABLE galery_type
ADD CONSTRAINT PK_galery_type_name PRIMARY KEY (galery_type_name);

ALTER TABLE role
ADD FOREIGN KEY (employee_id) REFERENCES employee(employee_id);

ALTER TABLE member
ADD CONSTRAINT FK_member_package_id FOREIGN KEY (package_id) REFERENCES package(package_id);

ALTER TABLE member
ADD CONSTRAINT FK_member_course_id FOREIGN KEY (course_id) REFERENCES course(course_id);

-- ALTER TABLE service_device
-- ADD CONSTRAINT FK_service_id FOREIGN KEY (service_id) REFERENCES service(service_id);

-- ALTER TABLE service_device
-- ADD CONSTRAINT FK_device_id FOREIGN KEY (device_id) REFERENCES device(device_id);

ALTER TABLE course
ADD CONSTRAINT FK_person_trainer_id FOREIGN KEY (person_trainer_id) REFERENCES person_trainer(person_trainer_id);

ALTER TABLE galery
ADD CONSTRAINT FK_galery_type FOREIGN KEY (galery_type_id) REFERENCES galery_type(galery_type_id);

-- Mô hình kinh doanh :
-- * các dịnh vụ luyện tập bao gồm:
--     + Cycling.
--     + Swimming.
--     + Sports & Fitness (một số môn thể theo và các thiết bị luyện tập tiêu chuẩn).
--     + Group Exercise (thể dục nhóm, giảm cân nâng cao sức khỏe).
-- * Các khóa học được tổ chức tại trung tâm:
--     + Martial arts (lớp võ thuật)
--         - MMA (võ tổng hợp) - chi phi : 80$ / lớp.
--         - Boxing (Quyền anh nghiệp dư). - chi phi : 80$ / lớp.
--         - Muay Thai. - chi phi : 80$ / lớp.
--     + GYM / FITNESS
--         - Yoga - chi phi : 80$ / lớp.
--         - CrossFit - chi phi : 80$ / lớp.
--         - Inferno & Burn - chi phi : 80$ / lớp.
--     + Dance - chi phi : 50$ / lớp.
--     + Zumba - chi phi : 50$ / lớp.
-- * Các tiện ích bao gồm :
--     + Salon & Spa. - 200 điểm / lần.
--     + functional foods. - tùy theo giá trị của từng sản phẩm.
--     + massager - 20 điểm/ 20 phút.
-- * Dòng tiền sẽ tập trung vào việc bán các gói thành viên và khóa học .
-- * Gói thành viên chia làm 3 gói:
--  + Gói cơ bản (basic):
--     - Thời gian tập luyện : 3 ngày trong tuần , kiểm soát khi dùng thẻ thành viên checkin tại cổng.
--     - người hướng dẫn : có.
--     - sử dụng thiết bị: tất cả các thiết bị luyện tập tiêu chuẩn tại trung tâm.
--     - điểm thưởng tiện ích: 1000 điểm (được sử dụng để thanh toán cho các tiện ích tại trung tâm).
--     - giá tiền : 50$ / tháng  - 500$/1 năm.
--  + Gói tiêu chuẩn (standard)
--     - Thời gian tập luyện : 5 ngày trong tuần , kiểm soát khi dùng thẻ thành viên checkin tại cổng.
--     - người hướng dẫn : có.
--     - sử dụng thiết bị: tất cả các thiết bị luyện tập tiêu chuẩn tại trung tâm.
--     - điểm thưởng tiện ích: 2000 điểm (được sử dụng để thanh toán cho các tiện ích tại trung tâm).
--     - giá tiền : 80$/ tháng - 800$/ 1 năm.
--  + Gói cao cấp (premium)
--     - Thời gian tập luyện : 7 ngày trong tuần , kiểm soát khi dùng thẻ thành viên checkin tại cổng.
--     - người hướng dẫn : có.
--     - sử dụng thiết bị: tất cả các thiết bị luyện tập  tại trung tâm.
--     - điểm thưởng tiện ích: 3000 điểm (được sử dụng để thanh toán cho các tiện ích tại trung tâm).
--     - free massager
--     - giá tiền : 120$ / tháng  - 1200$/năm. 

-- rename("user/image1.jpg", "user/del/image1.jpg");
