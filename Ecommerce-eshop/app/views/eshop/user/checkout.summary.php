<?php $this->view("eshop/user/header", $data); 

	$Address = "";
	$PostalCode = "";
	$Scountry = "";
	$HomePhone = "";
	$MobilePhone = "";
	$message = "";
if(isset($POST_DATA)){

	extract($POST_DATA);

}
?>

	<section id="cart_items">
		<div class="container">


		
                    <div style="background: #eee; padding:10px; text-align:center; margin:20px; color: black; font-size:15px;"> Please Confirm The Information! </div>
			
                    <div style="width:500px;">
                

                     

                    <table class="table" style=" position:relative;   margin-left: 600px;">
                        <?php if(isset($user_orders)) : ?>
                        <?php foreach($user_orders as $order) : ?>
                        <tr><th>Country</th><td><?= $country_model->get_country_byid($order->country);?></td></tr>
                        <tr><th>State</th><td><?=  $country_model->get_states($order->states, "state");?></td></tr>
                        <tr><th>Zip Code</th><td><?= $order->zip ?></td></tr>
                        <tr><th>taxes</th><td><?= $order->tax ?></td></tr>
                        <tr><th>Home_Phone</th><td><?= $order->home_phone ?></td></tr>
                        <tr><th>Mobile_Phone</th><td><?= $order->mobile_phone ?></td></tr>
                        <tr><th>Date</th><td><?= $order->date ?></td></tr>
                        
                       <?php endforeach; ?>
                       <?php endif; ?>
                       </table>

                    </div>

                    <div style="background: #eee; padding:10px; text-align:center; margin:20px; color: black; font-size:15px;"> Order Summary </div>

                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Description</th><th>Price</th><th>Quantity</th><th>Total</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($details)) : ?>
                        <?php foreach($details as $detail) : ?>
                            <tr>
                                <td><?= $detail->description; ?></td>
                                <td><?= $detail->amount ?></td>
                                <td><?= $detail->qty ?></td>
                                <td><?= $detail->total ?></td>
                            </tr>
                      
                       <?php endforeach; ?>
                       <?php endif; ?>
                       </tbody>
                       </table>
                       <div style="float: left; margin: 100px 0px 0px 900px; font-size:20px;">Bill $<?= $Bill ?></div>
                  
                       <br style="clear:both;">
                       <br style="clear:both;">
                       <br >
		<a href="<?=ROOT?>checkout/thanks" onclick="set_session1()"> 
		<input type="button" class="btn btn-warning pull-right" onclick="setsession()"  value=" Payment >">
		</a>
      
		<a href="<?=ROOT?>Cart">
		<input type="button" class="btn btn-warning" value="< Back To Cart">
		</a>
        
		</div>
	</section> <!--/#cart_items-->
   <br><br>


	<script>
 
      function setsession(){
        sessionStorage.setItem("Thanks", "Done Thanks For Choosing Us");

      }
       

        function set_session1() {
            sessionStorage.setItem("Thanks","Done Thanks For Choosing Us");
        }

        let country = document.querySelector('#country');

		function send_country(){
           let form = new FormData();
		   form.append("country", country.value);
		   form.append("data_type", "select_states");
			send_data(form);
		}

		function send_data(data){

			let ajax = new XMLHttpRequest();
			

			ajax.addEventListener("readystatechange", function (e) {
            if(ajax.readyState == 4 && ajax.status == 200){
				handle_result(ajax.responseText);
			}
			});

			ajax.open("POST", "<?=ROOT?>ajax/Ajax_checkout", true);
			ajax.send(data);
		}

		function handle_result(result){
			alert(result);

			let obj = JSON.parse(result);
			
			let select_inp = document.querySelector("#select_input");
			
		    select_inp.innerHTML = "<option>-- State / Province / Region --</option>";
			 if(obj){
		   for(var i = 0; i < obj.length; i++){
          if(obj[i].id){
		   select_inp.innerHTML += "<option value="+ obj[i].id +">"+ obj[i].state +"</option>";
		  }
		   }
		   }
		} 

	</script>



<?php $this->view("eshop/user/footer", $data); ?>