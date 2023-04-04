let search = document.getElementsByClassName("fa-search")[0];
let header = document.querySelector(".search > input");
search.addEventListener("click", function () {
    window.open(`add.php?name=${header.value}`, `_self`);
})