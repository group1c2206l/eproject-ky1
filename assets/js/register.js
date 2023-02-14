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



