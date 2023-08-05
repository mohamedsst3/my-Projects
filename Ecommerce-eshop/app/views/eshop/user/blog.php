<?php $this->view("eshop/user/header", $data); ?>
	<section>
		<div class="container">
			<div class="row">
			<?php $this->view("eshop/user/slider_categories", $data); ?>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<!-- Blog Starts -->
						<?php if($Blog_data): ?>
						<?php foreach($Blog_data as $blog) : ?>
						<div class="single-blog-post">
							<h3><?= $blog->title ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i><?= $author; ?></li>
									<li><i class="fa fa-clock-o"></i><?= numstotime(date_create($blog->date)); ?></li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="<?=ROOT?>Single_blog/<?=$blog->url_address;?>">
								<img src="<?=$blog->image?>" alt="Image Not Found" >
							</a>
							<p style="margin: 10px;"><?= nl2br(htmlspecialchars(substr($blog->post,0, 100))); ?></p>
							<a  class="btn btn-primary" href="<?=ROOT?>Single_blog/<?=$blog->url_address;?>">Read More</a>
							
						</div>
						<?php 
					      endforeach;
						 endif;
						   ?>
						
						<!-- Blog End -->

						<!-- pagination -->
						<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
                       <!-- pagination -->
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
<?php $this->view("eshop/user/footer", $data); ?>