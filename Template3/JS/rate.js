ratestars = [...document.querySelectorAll("#stars i")];
ratestars.forEach(element => {
    element.addEventListener("click", function (e) {
        document.getElementById("star").value = `${element.getAttribute("star")}`;
        for (i = 0; i < 5; i++) {
            ratestars[i].style = "color:black;";
        }
        for (i = 0; i < element.getAttribute("star"); i++) {
            ratestars[i].style = "color:gold;";
        }
    });
});



