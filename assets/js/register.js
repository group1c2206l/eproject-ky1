let register = document.getElementById("register-form");
let login = document.getElementById("login-form");
let menu_reg = document.getElementById("reg-menu");
let menu_login = document.getElementById("login-menu");
// login.style.display = "none";
let num;

num =Number.parseInt(localStorage.getItem("menu")) ;
console.log(num);
if(num == 1 || num == 2) {
    show(num);
    console.log("aaa");
} else {
    show(1);
    console.log("bbb");
}

function show(a) {
    num = a;
    localStorage.setItem("menu",num);
    switch(a) {
        case a = 1:
            register.style.display = "block";
            login.style.display = "none";
            menu_login.classList.remove("active");
            menu_reg.classList.add("active");
        break;
        case a = 2:
            register.style.display = "none";
            login.style.display = "block";
            menu_login.classList.add("active");
            menu_reg.classList.remove("active");
        break;
    }
}

let email = document.querySelector(".email");
let pwd = document.querySelector('input[name="pwd"]');
let repwd = document.querySelector('input[name="repwd"]');
let fname = document.querySelector('input[name="fname"]');
let mname = document.querySelector('input[name="mname"]');
let lname = document.querySelector('input[name="lname"]');
let phone = document.querySelector('input[name="phone_number"]');
const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const regexPass = /^[a-zA-Z0-9@]{6,}$/;
const regexPhone = /^0[0-9]{9}$/;

function email_check() {
    console.log(email.value);
    if(regexEmail.test(email.value)) {
        email.classList.add("validate");
        email.classList.remove("err");
    } else {
        email.classList.add("err");
        email.classList.remove("validate");
    }
}
function password_check() {
    if(regexPass.test(pwd.value)) {
        pwd.classList.add("validate");
        pwd.classList.remove("err");
    } else {
        pwd.classList.add("err");
        pwd.classList.remove("validate");
    }
}

function re_password_check() {
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

function validateForm() {
    if(email.value.trim() === "" || pwd.value.trim() === "" || repwd.value.trim() === "") {
        alert("Email khong hop le");
        return false;
    }
    
    if(!regexEmail.test(email.value.trim())) {
        alert("Email khong hop le");
        return false;
    }

    if(!regexPass.test(pwd.value.trim())) {
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
