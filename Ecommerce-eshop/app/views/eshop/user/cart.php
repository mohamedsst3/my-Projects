<?php $this->view("eshop/user/header", $data);
?>

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php if (isset($Rows) && $Rows != null) : ?>
							<?php foreach ($Rows as $Cart_Saved) : ?>
								<td class="cart_product">
									<a href=""><img src="<?= ROOT . $Cart_Saved->image ?>" alt="" width="70px"></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?= $Cart_Saved->description ?></a></h4>
									<p>Web ID: 1089772</p>
								</td>
								<td class="cart_price">
									<p>$<?= $Cart_Saved->price ?></p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" onclick="Add_one(<?= $Cart_Saved->id?>)"> + </a>

										<input id="quantity_val" class="cart_quantity_input"  type="text" name="quantity" value="<?=$Cart_Saved->Cart_qty?>"  autocomplete="off" size="2">

										<a class="cart_quantity_down" onclick="subtract(<?= $Cart_Saved->id ?>)"> - </a>

									</div>
								</td>
                                
								<td class="cart_total"> <!--- Get The Total Value For The Product  -->
								 <?php foreach($_SESSION['CART'] as $value) : ?>
								 <?php if($Cart_Saved->id == $value['id']) :  ?>
									<p class="cart_total_price" id="math_val">$<?= $value['total'];?></p>
									<?php endif; ?>
									<?php endforeach; ?>
								</td>
								
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="<?= ROOT ?>AddToCard/delete/<?= $Cart_Saved->id; ?>"><i class="fa fa-times"></i></a>
								</td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td class="cart_product">
						<a href=""><img src="" alt="" width="70px"></a>
					</td>
					<td class="cart_description">
						<h4><a href=""></a></h4>
						<p>Web ID: 1089772</p>
					</td>
					<td class="cart_price">
						<p>$</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<a class="cart_quantity_up" href=""> + </a>
							<input class="cart_quantity_input" type="text" name="quantity" value="" autocomplete="off" size="2">
							<a class="cart_quantity_down" href=""> - </a>
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price"></p>
					</td>
					<td class="cart_delete">
						<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
					</td>
				</tr>


			<?php endif; ?>

				</tbody>
			</table>
		</div>
		<a href="<?=ROOT?>Checkout">
		<input type="button" class="btn btn-warning pull-right" value="Click">
		</a>
		<a href="<?=ROOT?>Shop">
		<input type="button" class="btn btn-warning" value="< Continue-Shopping">
		</a>
	</div>
	<br>
	<br>
	<br>
</section> <!--/#cart_items-->

<?php $this->view("eshop/user/footer"); ?>

<script>
	function Add_one(id){

	 let ajax = new XMLHttpRequest();

	 let form = new FormData();
	 form.append("id", id);

	 ajax.addEventListener("readystatechange", function () {
		if(ajax.readyState == 4 && ajax.status == 200){
			handle_request(ajax.responseText);
		}
	 })
	 ajax.open("POST", "<?=ROOT?>Ajax_cart/add");
	 ajax.send(form);
	}


	function subtract(id) {

		let ajax = new XMLHttpRequest();

		let form = new FormData();
		form.append("id", id);

			 ajax.addEventListener("readystatechange", function () {
			if(ajax.readyState == 4 && ajax.status == 200){
				handle_request(ajax.responseText);
			}
	      });
		  ajax.open("POST", "<?=ROOT?>Ajax_cart/subtract");
	      ajax.send(form);
	}



	function handle_request (result){

           
		let en = JSON.parse(result);
		

		window.location.href = window.location.href;

	}
</script>