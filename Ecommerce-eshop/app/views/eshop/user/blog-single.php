
<?php $this->view("eshop/user/header", $data); ?>


	<section>
		<div class="container">
			<div class="row">
			<?php $this->view("eshop/user/slider_categories", $data); ?>

				<div class="col-sm-9">
					<?php if(isset($single_blog) && is_object($single_blog)) : ?>
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h2><?= $single_blog->title; ?></h2>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i><?= $author?></li>
									<li><i class="fa fa-clock-o"></i><?= numstotime(date_create($single_blog->date)); ?></li>
							
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
								<img src="<?= ROOT. $single_blog->image; ?>" alt="<?= $single_blog->title; ?>" style="width: 600px; ">
							 <div style="margin-top: 50px;">
							<p style="font-size: 15px;"><?= $single_blog->post; ?></p>
							</div>
							
							<button id="like"  onclick="liked('<?=$single_blog->id?>' ,'<?=$_SESSION['user_id']?>')" style="  width: 100px; height:40px; background:orange; border:none; border-radius:20px; 
							<?php  //Change Like Color
							$LikeColor = $Likes_model->GetLikesByUser($_SESSION['user_id'], $single_blog->id);
                            if(!empty($LikeColor[0]->Likes) && $LikeColor[0]->Likes == 1 )
							echo "color:white;";
							else
							echo "color:black;";
							?>">
						      
							<span id="LikeView"><?= $Likes_model->GetLikesByBlog($single_blog->id) ?></span>  <!-- #b29700 -->
							<i class="fa fa-thumbs-up"></i>
						<span class="icon">Like</span>
						</button>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->
                      <?php  endif; ?> 
					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<li>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</li>
							<li class="color">(6 votes)</li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->


				   <form method="post">
					<textarea name="Comment" id="" cols="30" rows="5" placeholder="Add Comment..."></textarea>
					<br>
					<br>
					<button type="reload" class="btn btn-warning">Comment</button>
				   </form>

                  <?php if(isset($Comments) && !empty($Comments)) : ?>
					<?php foreach ($Comments as $comment) : ?>
					<div class="media commnets">

					    <a href="#" style="margin-left: 10px;">
							<img  src="<?=ROOT . $comment->image; ?>" alt="" style="width:50px; border-radius:30px;">
						</a>

						<div class="media-body" style="margin-left:10px; margin-top:10px;">
							<h3 class="media-heading"><?= $comment->name ?></h3>
							<h4><?= $comment->comment; ?></h4>

							<h5><?= numstotime(date_create($comment->date)); ?></h5>
							
						</div>
					</div><!--Comments-->
					<?php endforeach; ?>
					
					<?php else: ?>
						<div style="margin:50px 0px 0px 350px;">No Comments Yet</div>
					<?php endif; ?>
					
				</div>	
			</div>
		</div>
	</section>



<script>

 var like = document.getElementById("like");
 var LikeView = document.getElementById("LikeView");

 
  function liked(BlogId, UserId){
    

		let form = new FormData();
		form.append("Blog_id", BlogId);
		form.append("user_id", UserId);

	let ajax = new XMLHttpRequest();
	ajax.addEventListener("readystatechange", function () {
	if(ajax.readyState == 4 && ajax.status == 200){
		handle_request(ajax.responseText);
	}
  });
  ajax.open("POST", "<?=ROOT?>SingleBlog_ajax/AddLike");
  ajax.send(form);
  }

  
  function handle_request(result){
	
	let json = JSON.parse(result);

	LikeView.innerHTML =  json.feedback;
	if(json.value == true)
		like.style.color = 'white';
	else
	like.style.color = 'black';

    
   }
    
</script>
<?php $this->view("eshop/user/footer", $data); ?>	
