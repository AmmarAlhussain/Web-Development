let input = document.querySelectorAll("form > div > input");
let Button = document.querySelector("form > button");

Button.addEventListener("click", function (e) {
    input.forEach(function (item) {
        if (item.value.trim() == "" || item.value.trim().length < 8) {
            item.classList.add("cancel");
            item.parentElement.classList.add("wrong");
            e.preventDefault();
        }
    })
});
input.forEach(function (item) {
    item.addEventListener("blur", function () {
        if (item.value.trim() != "" && item.value.trim().length >= 8) {
            item.classList.remove("cancel");
            item.parentElement.classList.remove("wrong");
        }
    })
});
