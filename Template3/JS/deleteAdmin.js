var button = document.querySelector("form > button");
let select = document.querySelector("select");
button.addEventListener("click", function (e) {
  
  if (select.value.trim() == ""){
    e.preventDefault(); 
    select.style.border = "solid 3px red";   
  }
  else{
      var del = confirm("Are you sure you want to delete the game ?");
      if(!del)
      e.preventDefault();
  }
});