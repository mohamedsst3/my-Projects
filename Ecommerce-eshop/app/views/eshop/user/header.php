<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="<?=ASSETS . THEME?>images/web_logo.jpg" type="image/x-icon/">
    <title><?= $data['Page_Title']; ?> | E-Shopper</title>
    <link href="<?=ASSETS . THEME?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=ASSETS . THEME?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=ASSETS . THEME?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=ASSETS . THEME?>css/price-range.css" rel="stylesheet">
    <link href="<?=ASSETS . THEME?>css/animate.css" rel="stylesheet">
	<link href="<?=ASSETS . THEME?>css/main.css" rel="stylesheet">
	<link href="<?=ASSETS . THEME?>css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=ASSETS . THEME?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=ASSETS . THEME?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=ASSETS . THEME?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=ASSETS . THEME?>images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<style>
	.center {
  margin-left: 400px;
  width: 1500px;
  justify-content: center;
  padding-left: 360px;
}
	.style{
		display: none;
	}
</style>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i><?= isset($data['user_data']) ?  $data['user_data']->name: ""  ?></a></li>
								<li><a href=""><i class="fa fa-user"></i><?= isset($data['user_data']) ? $data['user_data']->email : ""  ?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?=ROOT?>Home"><img src="<?=ASSETS . THEME?>images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

                            <!-- if the user not in home page wil appear this to back home -->
							<?php if(isset($_GET["url"]) && ucfirst($_GET["url"]) != "Home"){ ?>
								<li><a href="<?=ROOT?>Home"><i class="fa fa-home"></i>Home</a></li>
							<?php	} ?>
							<!-- if the rank is admin will appear this to go to the admin page -->
							<?php if(isset($data['user_data']) && $data['user_data']->rank == "admin" ){ ?> 
								<li><a href="<?=ROOT?>Admin/Admin"><i class="fa fa-cog"></i>Admin</a></li>
							<?php } ?> 
                            <!-- if i loged in will appear this to go to user profile -->
							<?php if(isset($data['user_data'])){ ?>
								<li><a href="<?=ROOT?>Profile"><i class="fa fa-user"></i> Account</a></li>
							<?php } ?> 

								
								<li><a href="<?=ROOT?>Checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="<?=ROOT?>Cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php if(!isset($_SESSION["user_url"])){?>
								<li><a href="Login"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="<?=ROOT?>Signup"><i class="fa fa-unlock"></i> Signup</a></li>
								<?php }else{ ?>
									<li><a href="<?=ROOT?>Logout"><i class="fa fa-lock"></i> Logout </a></li>
								
								<li><img src="<?=ROOT. $data['user_data']->image?>" style="border-radius:50px; width:65px;" ></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	               

	    <?php if($data['Page_Title'] == "HomePage") : ?>
		<div class="alert alert-success center" id="thx" style="position:absolute; width:1000px; content:counter;"></div>
       <?php endif; ?>
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								
								<li><a href="<?= ROOT?>Home"  class="<?= $Page_Title == "HomePage" ? "active" : "" ; ?>">Home</a></li>
								<li class="Gold_color"><a href="<?=ROOT?>Shop"  class="<?= $Page_Title == "Save" ? "active" : "" ; ?>">Shop</a>
                                <li></li>
                                </li>
								<li class="dropdown"><a  href="<?=ROOT?>Blog" class="<?= $Page_Title == "Blog" ? "active" : "" ; ?>">Blog </a>
                                </li> 
								
								<li><a href="Contact" class="<?= $Page_Title == "Contact Us" ? "active" : "" ; ?>">Contact</a></li>
							</ul>
						</div>
					</div>
					<?php if($data['Page_Title'] == "Save") : ?>
					<div class="col-sm-3">
						<form method="get">
						<div class="search_box pull-right">
							<input type="text" name="find" placeholder="Search"/>
							<button class="btn btn-warning">Click</button>
						</div>
						</form>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
</body>
</html>

	
	