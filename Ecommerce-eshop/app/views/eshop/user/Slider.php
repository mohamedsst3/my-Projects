
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
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?=ASSETS . THEME?>images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					