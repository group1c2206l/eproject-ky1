let del = document.getElementsByClassName("del");
for(let s=0; s<del.length; s++) {
    let text = "Are you sure delete data ?"
    del[s].addEventListener("click", function() {
        if(confirm(text) == true) {
            document.cookie = "delete=true";
        } else {
            document.cookie = "delete=false";
        }
    });
}


