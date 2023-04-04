let buttons = document.querySelectorAll("form button")[0];
let inputform = document.querySelectorAll("form input");
let textarea = document.querySelector("textarea");
buttons.addEventListener("click", function (e) {
    if (inputform[0].value.trim() == "") {
        e.preventDefault();
        inputform[0].style.border = "solid 3px red";
    } else {
        inputform[0].style.border = "none";
    }
    if (inputform[1].value.trim() == "") {
        inputform[1].style.border = "solid 3px red";
        e.preventDefault();
    } else {
        inputform[1].style.border = "none";
    }
    if (inputform[2].value.trim() == "") {
        e.preventDefault();
        inputform[2].style.border = "solid 3px red";
    } else {
        inputform[2].style.border = "none";
    }
    if (textarea.value.trim() == "") {
        e.preventDefault();
        textarea.style.border = "solid 3px red";
    } else {
        textarea[2].style.border = "none";
    }
})
