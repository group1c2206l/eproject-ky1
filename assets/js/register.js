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
let phone = document.querySelector('input[name="phone"]');
let flag = true;
function email_check() {
    console.log(email.value);
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(regex.test(email.value)) {
        email.classList.add("validate");
        email.classList.remove("err");
    } else {
        email.classList.add("err");
        email.classList.remove("validate");
        flag = false;
    }
}
function password_check() {
    console.log(pwd.value);
    let regex = /^[a-zA-Z0-9@]{6,}$/;
    if(regex.test(pwd.value)) {
        pwd.classList.add("validate");
        pwd.classList.remove("err");
    } else {
        pwd.classList.add("err");
        pwd.classList.remove("validate");
        flag = false;
    }
}



function validateForm() {
    console.log("flag:",flag);
    return true;
}