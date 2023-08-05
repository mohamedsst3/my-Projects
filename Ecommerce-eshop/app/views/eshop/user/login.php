<?php $this->view("eshop/user/header", $data); ?>

	<section style="padding-bottom:80px;"><!--form-->
		<div class="container">
				<div class="col-sm-4 col-sm-offset-1">
                 <div class="col-sm-4">
					<div class="login-form" style="margin-left: 300px;"><!--sign up form-->
					  <?php if(isset($_SESSION["Errors"])){ ?>
					<div style="background: #ee3a3a9c; padding:6px; width: 300px; border-radius: 8px;">
                     <div style="width: 200px; color: black; margin-left: 60px; "><?=$_SESSION["Errors"] ?></div>
					 </div>
					 <?php  } ?>
						<label style="width: 200px; margin-left: 95px;"><h1>Login</h1></label>
						<form method="post">
							<input name="name" type="text" id="inputsl" placeholder="Name" style="width: 300px;"/>
							<input name="password" type="password" placeholder="password" style="width: 300px;"/>
							<div style="width: 130px;">	Keep me signed in </div>
							<input name="Submit" type="checkbox" class="checkbox" style="width: 20px; "> 
							<button type="submit" class="btn btn-default" style="margin-left:100px; margin-top: 0;">Login</button>
						</form>
					   
					</div><!--/sign up form-->
				</div>
				</div>
			
		</div>
	</section><!--/form-->

	<?php $this->view("eshop/user/footer"); ?>
	