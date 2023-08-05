<?php  $this->view("eshop/user/header", $data); ?>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
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
									<h4 class="panel-title">         <!--- if the cat has a parent go to it possition else    --->
										<a <?= in_array($cat->id, $allparent) ? 'data-toggle="collapse"' : ""; ?>  data-parent="#accordian" href="<?= in_array($cat->id, $allparent) ?  "#" . $cat->category :  ROOT . "Shop/category/" . $cat->category; ?>">
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
											<!-- if tha parent equal with category id -->
											<?php if($sub_cat->parent == $cat->id) : ?>
											<li><a href="<?= ROOT . "Shop/category/" . $sub_cat->category?>"><?= $sub_cat->category ?></a></li>
											<?php endif; ?>
						                 	<?php  endforeach; ?>										
										</ul>
									</div>
								</div>
								<?php  endif; ?>
							</div>

							<?php  endforeach; ?>
							
						</div><!--/category-products-->
						</div><!--/category-productsr-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right" style="float: right; bottom:855px;" >
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>


				     <!-- Start Product -->
				<div class="col-sm-9 padding-right">
					<?php if(isset($product) && is_array($product)) : ?>
				<?php foreach($product as $prod) { ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="<?=ROOT?>Single_product?product=<?= $prod->slag?>"><div style="overflow: hidden;"><img src="<?= ROOT . $prod->image ?>" alt="Image Not Found" id="image_product"/></div></a>
										<h2>$<?= $prod->price ?></h2>
										<p><?=$prod->description ?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
						<?php } ?>
						<br style="clear: both;">
					  
						<?php endif; ?>
						
						<ul class="pagination" style="margin-left:200px ; margin-top:50px;">
						<li ><a href="<?= Page::get_pagination()->prev ?>">Prev</a></li>
							<li <?= Page::get_pagination()->pg == 1 ? "class='active'" : ''; ?>><a href="<?=ROOT?>Shop?pg=1">1</a></li>
							<li <?= Page::get_pagination()->pg == 2 ? "class='active'"  : ''; ?> ><a href="<?=ROOT?>Shop?pg=2">2</a></li>
							<li <?= Page::get_pagination()->pg == 3 ? "class='active'"  : ''; ?> ><a href="<?=ROOT?>Shop?pg=3">3</a></li>
							<li><a href="<?= Page::get_pagination()->Next; ?>">Next</a></li>	
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

<?php  $this->view("eshop/user/footer", $data);