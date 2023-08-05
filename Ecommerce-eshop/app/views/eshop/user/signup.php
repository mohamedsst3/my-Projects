<?php $this->view("eshop/user/header", $data); ?>

	<section style="padding-bottom:80px;"><!--form-->
		<div class="container" >
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
                 <div class="col-sm-4">
					<div class="signup-form" style="margin-left: 300px;"><!--sign up form-->
                        <?php if(!empty($_SESSION["Errors"]) && isset($_POST["submit"])){ ?>
						<div style="background: #ee3a3a9c; padding:6px; width: 300px; border-radius: 8px;">
						<div  style="width: 200px; color: black; margin-left: 60px; "><?php checkmsg(); ?></div>	
						</div>
                         <?php }?>
						
						 <label style="width: 200px; margin-left: 95px;"><h1>Signin</h1></label>
						
						
						<form  method="post" enctype="multipart/form-data">
							<input name="name" type="text" placeholder="Name" value="<?= isset($_POST['name']) ? $_POST['name']: ''?>" style="width: 300px;"/>
							<input name="email" type="text" placeholder="Email Address" value="<?= isset($_POST['email']) ? $_POST['email']: ''?>" style="width: 300px;"/>
							<input name="password" type="password" placeholder="Password" value="<?=  isset($_POST['password']) ? $_POST['password']: '' ?>" style="width: 300px;"/>
							<input name="passwordTwo" type="password" placeholder="Confirm Password" value="<?= isset($_POST['passwordTwo']) ? $_POST['passwordTwo']: ''?>" style="width: 300px;"/>

							<label for="user_image" style="background:#FE980F; color:white; border-radius:5px; padding:10px; width:300px; text-align:center; cursor:pointer;">Add Profile Image</label>
							<input name="user_image" id="user_image" type="file" style="display: none;"/>

							<button name="submit" type="submit" class="btn btn-default" style="margin-left:100px;">Signup</button>
						</form>
					
					</div><!--/sign up form-->
				</div>
				</div>
			</div>
		</div>
	</section><!--/form-->


	
	
	</script>
	<?php $this->view("eshop/user/footer"); ?>

	