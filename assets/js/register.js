"use strict";
var register = document.getElementById("register-form");
var login = document.getElementById("login-form");
var reset = document.getElementById("reset-form");
var newPass = document.getElementById("new-pass-form");
var menu_reg = document.getElementById("reg-menu");
var menu_login = document.getElementById("login-menu");
// login.style.display = "none";
var num;
num =Number.parseInt(localStorage.getItem("menu")) ;
console.log(num);
if(num == 1 || num == 2 || num == 3 || num == 4) {
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
            newPass.style.display = "none";
            menu_login.classList.remove("active");
            menu_reg.classList.add("active");
        break;
        case a = 2:
            register.style.display = "none";
            login.style.display = "block";
            reset.style.display = "none";
            newPass.style.display = "none";
            menu_login.classList.add("active");
            menu_reg.classList.remove("active");
        break;
        case a = 3:
            register.style.display = "none";
            login.style.display = "none";
            reset.style.display = "block";
            newPass.style.display = "none";
            menu_login.classList.remove("active");
            menu_reg.classList.remove("active");
        break;
        case a = 4:
            register.style.display = "none";
            login.style.display = "none";
            reset.style.display = "none";
            newPass.style.display = "block";
            menu_login.classList.remove("active");
            menu_reg.classList.remove("active");
        break;
    }
}

var r_email = document.querySelector(".r_email");
var l_email = document.querySelector(".l_email");
var f_email = document.querySelector(".f_email");
var l_pwd = document.querySelector('.l_pwd');
var r_pwd = document.querySelector('.r_pwd');
var n_pwd = document.querySelector('.n_pwd');
var r_repwd = document.querySelector('.r_repwd');
var n_repwd = document.querySelector('.n_repwd');
var fname = document.querySelector('input[name="fname"]');
var mname = document.querySelector('input[name="mname"]');
var lname = document.querySelector('input[name="lname"]');
var phone = document.querySelector('input[name="phone_number"]');
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

function re_password_check(repwd,pwd) {
    if(repwd.value == pwd.value) {
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

    if(r_pwd.value.trim() !== r_repwd.value.trim()) {
        alert("pass khong trung nhau");
        return false;
    }

    if(fname.value.trim() === "" || lname.value.trim() === "") {
        alert("Do not leave first and last name blank");
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
    if(!regexEmail.test(f_email.value.trim())) {
        alert("Email khong hop le");
        return false;
    }
    return true;
}

function validate_NewPass_Form() {
    if(!regexPass.test(n_pwd.value.trim())) {
        alert("pass khong hop le");
        return false;
    }

    if(n_pwd.value.trim() !== n_repwd.value.trim()) {
        alert("pass khong trung nhau");
        return false;
    }
    return true;
}
