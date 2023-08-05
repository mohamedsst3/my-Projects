<?php  $this->view("eshop/user/header", $data); ?>


<style>
	#image_product{
		width: 260px;
		height: 220px;
		transition: all 1s ease;
	}
	#image_product:hover{

    transform: scale(1.5);

	}
</style>



	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							
							<?php if(!empty($image_slider)) :
							
							for($i = 0; $i < count($image_slider); $i++) :
							 ?>
							<li data-target="#slider-carousel" data-slide-to="<?= $i ?>" class="<?= $i ?>"></li>
							
							<?php endfor;
							      endif;
							 ?>
						</ol>
                
						<div class="carousel-inner" style="height: 350px;">
						<?php if(!empty($image_slider)) :?>
						
							<?php foreach($image_slider as $imd) :?>
								
							<div class="item <?=  $imd->id == 5 ? "active" : ""; ?>">
								<div class="col-sm-5" style="height:430px;">
									<h1><span><?= $imd->header1_text[0]?></span>-<?= substr($imd->header1_text, 1) ?></h1>
									<h2><?= $imd->header2_text ?></h2>
									<p><?= $imd->text ?></p>
									<button type="button" class="btn btn-default get">Get it now</button>
									</a>
								</div>
								<div class="col-sm-6">
									<img src="<?=ROOT.$imd->image ?>" class="girl img-responsive" alt="" style="width:450px; height:230px; box-shadow: 10px 10px 30px 10px gray; margin: 30px 0 0 0 ; ">
								</div>
							</div>
							
							<?php endforeach; ?>
							<?php   endif;  ?>
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>

						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->

							<!-- Categories -->
							<?php foreach($category as $cat) : 
								
								if($cat->parent > 0){
									continue;
								}
								$allparent = array_column($category, "parent"); 
								?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">         <!--- if the cat has a parent go to it possition else  --->
										<a <?= in_array($cat->id, $allparent) ? 'data-toggle="collapse"' : ""; ?> data-parent="#accordian" href=" <?= in_array($cat->id, $allparent) ? "#" . $cat->category :  ROOT . "Shop/category/" . $cat->category; ?>">
										<?= $cat->category; ?>
									   <?php if(in_array($cat->id, $allparent)) : ?>
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<?php  endif; ?>

										</a>
									</h4>
								</div>
								<?php if(in_array($cat->id, $allparent)) : ?>
								<div id="<?= $cat->category ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
										
										<?php foreach($category as $sub_cat) :  ?>
											<?php if($sub_cat->parent == $cat->id) : ?>
											<li><a href="#"><?= $sub_cat->category ?></a></li>
											<?php  endif; ?>
						                 	<?php  endforeach; ?>										
										</ul>
									</div>
								</div>
								<?php  endif; ?>
							</div>

							<?php  endforeach; ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php if(isset($brands)) : ?>
										<?php foreach($brands as $brand) : ?>
											<li><a href="#"> <span class="pull-right">(50)</span><?=$brand->Brand_Name?></a></li>
										<?php endforeach; ?>
										<?php endif; ?>
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
                            <?php
							 if(isset($product) && is_array($product)) : ?>
							<div onclick="change_price_range(event)" class="well text-center price_range" >

								 <input type="text" class="span2" value="" data-slider-min="1" data-slider-max="5000" data-slider-step="5" data-slider-value="[<?= isset($_SESSION['Price_range'][0]) ? $_SESSION['Price_range'][0] :"" ; ?>,<?= isset($_SESSION['Price_range'][1]) ?$_SESSION['Price_range'][1] : ""; ?>]" id="sl2" ><br />
								 
								 <b class="pull-left">$ 0</b> <b class="pull-right" id="last_price">$5,000,00</b>
								 <br>
								 <button id="filter_btn" style="color: #fff; background-color: #f0ad4e; border-radius:5px; padding:10px; border:none; ">Filter</button>
								 <?php else: ?>
								 <div>There's not Products To define a Price Range</div>
								 <?php endif; ?>
							</div>
						
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?=ASSETS . THEME?>images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
				       <?php if(isset($product) && is_array($product)) : ?>
						<?php foreach($product as $product) : ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="<?=ROOT?>Single_product?product=<?= $product->slag?>"><div style="overflow: hidden;"><img src="<?= ROOT . $product->image ?>" alt="Image Not Found" id="image_product"/></div></a>
										<h2>$<?= $product->price ?></h2>
										<p><?=$product->description ?></p>
										<a href="<?=ROOT?>AddToCard/<?= $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
							
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach ?>
						<?php else: ?>
						<div style="background: #FE980F; padding:15px; text-align:center; margin:200px; color:white;">there's No Products To Displayed</div>
						<?php endif; ?>
					
					
					</div><!--features_items-->
					<?php if(isset($segment) && is_array($segment)) : ?>
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<?php $num = 0; foreach($segment as $key => $segm) : $num++; ?>
								<li <?= $num == 1 ? "class='active'": ""; ?>><a href="<?= "#" . $key?>" data-toggle="tab"><?=$key?></a></li>
								 <?php endforeach; ?>
							</ul>
						</div>
						<div class="tab-content">
						
						<?php $num = 0; foreach($segment as $key => $seg) : $num++ ?>
					
							<div class="tab-pane fade <?= $num == 1 ? "active in": ''; ?>" id="<?= $key; ?>">
							<?php foreach($seg as $prod)  : ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<div style="overflow:hidden;"><img src="<?= ROOT . $prod->image ?>" alt="" /></div>
												<h2>$<?=$prod->price?></h2>
												<p><?=$prod->description?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
								
								</div>	
								<?php endforeach; ?>	
							</div>
							
							<?php endforeach; ?>
						</div>
					</div><!--/category-tab-->
					<?php endif; ?>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							<div class="item active">
                                   
                                <?php
								 if($three_Product != null) :
								 foreach($three_Product as $prod) : 
								 ?>
								
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?= $prod->image?>" alt="" style="height:300px;"/>
													<h2><?=$prod->price?></h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								
						     <?php 
							 endforeach;
							endif;
							  ?>
							 </div>

							 <div class="item">

                                <?php
								 if($three_Product != null) :
								 foreach($three_Product_desc as $prod) : ?>
								
									
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?= $prod->image?>" alt="" style="height:300px;"/>
													<h2><?=$prod->price?></h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									
								
						     <?php endforeach; 
							 endif;
							 ?>
							 </div>

							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					<br style="clear: both;">
					  
					  
					<ul class="pagination" style="margin-left:200px ; margin-top:50px;">
						<li ><a href="<?= Page::get_pagination()->prev ?>">Prev</a></li>
							<li ><a href="<?=ROOT?>Home?pg=1">1</a></li>
							<li><a href="<?=ROOT?>Home?pg=2">2</a></li>
							<li><a href="<?=ROOT?>Home?pg=3">3</a></li>
							<li><a href="<?= Page::get_pagination()->Next ?>">Next</a></li>	
						</ul>
		       </div>
			</div>
		</div>
	</section>

 <script>
	
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

   ajax.open("POST", "<?=ROOT?>ajax/home_ajax/slow", true);
   ajax.send(form);

   }

   function handle_request(result){
       window.location.href = window.location.href;
   }
 </script>

	<?php $this->view("eshop/user/footer", $data); ?>