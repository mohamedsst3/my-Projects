let know = document.getElementById("somerr");

let btn = document.getElementById("btnin");

let input_category = document.querySelector("#category");

let closebtn = document.querySelector("#close");


closebtn.onclick = function (){
   
     know.classList.add("disnone");
     input_category.value = "";
   
}

 function show_div(){
   
    if(know.classList.contains("disnone")){
        know.classList.remove("disnone");
        input_category.focus();
    }else{
        know.classList.add("disnone");
        input_category.value = "";
    }


}







