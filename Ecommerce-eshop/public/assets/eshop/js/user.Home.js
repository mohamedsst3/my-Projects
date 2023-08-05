
let idsd = document.querySelector("#tooltip-inner");
let thx = document.querySelector("#thx");

 
thx.classList.add("style");
  
if(sessionStorage.getItem("Thanks") != null) {

   thx.innerHTML = sessionStorage.getItem("Thanks");
   thx.classList.remove("style");
   setInterval(function(){
       sessionStorage.removeItem("Thanks");
       location.reload();

   },4000);
}
   function change_price_range(e){
       let filter_btn = document.querySelector("#filter_btn");
       var tooltip = e.currentTarget.querySelector(".tooltip-inner"); 
       filter_btn.onclick = function (){
       send_data(tooltip.innerHTML);
       }
   }

   function send_data(price){
   let ajax = new XMLHttpRequest();
   let form = new FormData();
   form.append("price", price);
       ajax.addEventListener("readystatechange", function () {
       if(ajax.readyState == 4 && ajax.status == 200){
           handle_request(ajax.responseText);
       }
       });

   ajax.open("POST", "<?=ROOT?>home_ajax/slow", true);
   ajax.send(form);

   }

   function handle_request(result){
       window.location.href = window.location.href;
   }