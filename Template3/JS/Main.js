var [father, father1] = document.getElementsByClassName("gameImg");
var [offerLeft, bestLeft] = document.getElementsByClassName("fas fa-chevron-left");
var [offerRight, bestRight] = document.getElementsByClassName("fas fa-chevron-right");

function Rotate(array, father, delay = 70) {
    array.forEach((item, i) => {
        const from = parseInt(item.style.left);
        const to = 80 + 300 * i;
        if (isNaN(from)) {
            item.style.left = `${to}px`;
            return;
        }
        for (let i = 1; i <= delay; i++)
            setTimeout(() => {
                item.style.left = `${from + (to - from) * i / delay}px`;
            }, i);
    })
    array.forEach((item) => father.appendChild(item))
}

offerRight.addEventListener("click", function () {
    const offerArray = [...father.querySelectorAll('a.imgDisplay')];
    offerArray.push(offerArray.shift());
    Rotate(offerArray, father);
});

offerLeft.addEventListener("click", function () {
    const offerArray = [...father.querySelectorAll('a.imgDisplay')];
    offerArray.unshift(offerArray.pop());
    Rotate(offerArray, father);
})

bestRight.addEventListener("click", function () {
    const bestArray = [...father1.querySelectorAll('a.imgDisplay')];
    bestArray.push(bestArray.shift());
    Rotate(bestArray, father1);
});

bestLeft.addEventListener("click", function () {
    const bestArray = [...father1.querySelectorAll('a.imgDisplay')];
    bestArray.unshift(bestArray.pop());
    Rotate(bestArray, father1);
})
offerLeft.click();
bestLeft.click();