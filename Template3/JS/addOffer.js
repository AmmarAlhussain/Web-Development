let selecto = document.querySelector("select");
let buttons = document.querySelectorAll("form button")[0];
buttons.addEventListener("click", function (e) {
    if (selecto.value.trim() == "") {
        e.preventDefault();
        selecto.style.border = "solid 3px red";
    } else {
        selecto.style.border = "solid 1px black";
    }
});
function updateTextInput(val) {
    document.getElementById('textnumber').value=val+"%"; 
  }