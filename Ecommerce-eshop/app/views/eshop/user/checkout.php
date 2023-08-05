<?php $this->view("eshop/user/header", $data); 


if(isset($POST_DATA)){

	extract($POST_DATA);

}
?>

	<section id="cart_items">
		<div class="container">
		<form method="post">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
				<?php if(isset($data['errors'])) : ?>
				<p style="color: #BB0000; font-size:18px; font-weight: 350;"><?= $data['errors']; ?></p>
				<?php else :?>
					<p style=" font-size:18px; font-weight: 300;">Welcome To Payment Page</p>
				<?php endif; ?>
			</div><!--/register-req-->
	  
			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-8 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
							
									<input name="Address" class="form-control" value="<?= !empty($Address) ?$Address : '' ?>" type="text" placeholder="Address 1 *">
									
									<input name="PostalCode" class="form-control" value="<?= !empty($PostalCode) ?$PostalCode : '' ?>"  type="text" placeholder="Zip / Postal Code *">
								
							</div>
							<div class="form-two">
	
									<select name="Scountry" id="country" onchange="send_country()">
									<!-- to stil have the information after submit  -->
									<?php if(isset($Scountry) && $Scountry !=  null){
                                             echo "<option value=". $Scountry ." >". $Scountry ."</option>";
											}else{
											echo "<option selcted>-- SELECT A COUNTRY --</option>";
											}
											?>
										<?php if(isset($coutry) && is_array($coutry)) : ?>
										<?php foreach($coutry as $cat) : ?>
										<option value="<?= $cat->id; ?>"><?= $cat->country; ?></option>
										<?php endforeach; ?>
										<?php  endif; ?>
								
									</select>
									<br>
									<br>
									<select name="Sstate" id="select_input">
										 <option >-- State / Province / Region --</option> 
									</select>
									<br>
									<br>
									<input name="HomePhone" class="form-control" value="<?= !empty($HomePhone) ?$HomePhone : '';?>" style="background:#F0F0E9; color:black;" type="text" placeholder="Phone *"><br>
									<input name="MobilePhone" class="form-control" value="<?= !empty($MobilePhone) ?$MobilePhone : '';?>" style="background:#F0F0E9; color:black;" type="text" placeholder="Mobile Phone"><br>
								</div>
							</div>
						</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16" ><?= !empty($message) ?$message : ''; ?></textarea>
							<label><input name="checkbox" type="checkbox" checked> Shipping to bill address</label>
						</div>	
					</div>
				</div>
			</div>
        <br>
		
		<input type="submit" class="btn btn-warning pull-right" value=" Payment >">
		</form>
		<a href="<?=ROOT?>Cart">
		<input type="button" class="btn btn-warning" value="< Back To Cart">
		</a>
               
		</div>
	</section> <!--/#cart_items-->
   <br><br>


	<script>

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

			ajax.open("POST", "<?=ROOT?>Ajax_checkout", true);
			ajax.send(data);
		}

		function handle_result(result){
			

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