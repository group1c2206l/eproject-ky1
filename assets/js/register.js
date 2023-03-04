let register = document.getElementById("register-form");
let login = document.getElementById("login-form");
let reset = document.getElementById("reset-form");
let menu_reg = document.getElementById("reg-menu");
let menu_login = document.getElementById("login-menu");
// login.style.display = "none";
let num;

num =Number.parseInt(localStorage.getItem("menu")) ;
console.log(num);
if(num == 1 || num == 2 || num == 3) {
    show(num);
} else {
    show(1);
}

function show(a) {
    num = a;
    localStorage.setItem("menu",num);
    switch(a) {
        case a = 1:
            register.style.display = "block";
            login.style.display = "none";
            reset.style.display = "none";
            menu_login.classList.remove("active");
            menu_reg.classList.add("active");
        break;
        case a = 2:
            register.style.display = "none";
            login.style.display = "block";
            reset.style.display = "none";
            menu_login.classList.add("active");
            menu_reg.classList.remove("active");
        break;
        case a = 3:
            register.style.display = "none";
            login.style.display = "none";
            reset.style.display = "block";
            menu_login.classList.remove("active");
            menu_reg.classList.remove("active");
        break;
    }
}

let r_email = document.querySelector(".r_email");
let l_email = document.querySelector(".l_email");
let f_email = document.querySelector(".f_email");
let l_pwd = document.querySelector('.l_pwd');
let r_pwd = document.querySelector('.r_pwd');
let repwd = document.querySelector('input[name="repwd"]');
let fname = document.querySelector('input[name="fname"]');
let mname = document.querySelector('input[name="mname"]');
let lname = document.querySelector('input[name="lname"]');
let phone = document.querySelector('input[name="phone_number"]');
const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const regexPass = /^[a-zA-Z0-9@]{6,}$/;
const regexPhone = /^0[0-9]{9}$/;

function email_check(email) {
    console.log(email.value);
    if(regexEmail.test(email.value)) {
        email.classList.add("validate");
        email.classList.remove("err");
    } else {
        email.classList.add("err");
        email.classList.remove("validate");
    }
}
function password_check(pwd) {
    if(regexPass.test(pwd.value)) {
        pwd.classList.add("validate");
        pwd.classList.remove("err");
    } else {
        pwd.classList.add("err");
        pwd.classList.remove("validate");
    }
}

function re_password_check() {
    if(repwd.value == r_pwd.value) {
        repwd.classList.add("validate");
        repwd.classList.remove("err");
    } else {
        repwd.classList.add("err");
        repwd.classList.remove("validate");
    }
}

function fname_check() {
    if(fname.value !== "") {
        fname.classList.add("validate");
        fname.classList.remove("err");
    } else {
        fname.classList.add("err");
        fname.classList.remove("validate");
    }
}
function lname_check() {
    if(lname.value !== "") {
        lname.classList.add("validate");
        lname.classList.remove("err");
    } else {
        lname.classList.add("err");
        lname.classList.remove("validate");
    }
}

function phone_check() {
    if(regexPhone.test(phone.value)) {
        phone.classList.add("validate");
        phone.classList.remove("err");
    } else {
        phone.classList.add("err");
        phone.classList.remove("validate");
    }
}

function validate_Register_Form() {    
    if(!regexEmail.test(r_email.value.trim())) {
        alert("Email khong hop le");
        return false;
    }

    if(!regexPass.test(r_pwd.value.trim())) {
        alert("pass khong hop le");
        return false;
    }

    if(pwd.value.trim() !== repwd.value.trim()) {
        alert("pass khong trung nhau");
        return false;
    }

    if(fname.value.trim() === "" || lname.value.trim() === "") {
        alert("Khong de trong truong nay");
        return false;
    }

    if(!regexPhone.test(phone.value.trim())) {
        alert("Phone khong hop le");
        return false;
    }
    return true;
}

function validate_Login_Form() {
    if(!regexEmail.test(l_email.value.trim())) {
        alert("Email khong hop le");
        return false;
    }
    if(!regexPass.test(l_pwd.value.trim())) {
        alert("pass khong hop le");
        return false;
    }
    return true;
}

function validate_Reset_Form() {
    if(!regexEmail.test(email.value.trim())) {
        alert("Email khong hop le");
        return false;
    }
    return true;
}
