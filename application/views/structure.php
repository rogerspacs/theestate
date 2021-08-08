<!DOCTYPE html>
<html>
<head>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/owner_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/animation.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/notifications.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/motion.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/reformat.css">

</head>
<body class="selector">

	<!-- FOR USER ACTIVELY DESIDES TO LOG OUT -->
	<div class="login_out_info disabled">
		<div class="buttons">
			<button class="count_down_ok">OK</button>
			<button class="count_down_cancel">Cancel</button>
		</div>
		<div class="timer">
			<span class="text">Your will be logged out</span>
			<span class="in"> in</span> 
			<span class="countdown">10 <small>s</small></span>
		</div>
	</div>
	<!-- FOR USER AUTOMATICALLY LOGED OUT BY THE SYSTEM -->

	<div class="lock_automatic disabled">
		<div class="logout_user_detail">
			<div class="user_info">
				<form method="post" action="#">
					<span class="text">Account session locked</span>
					<input type="password" name="lock_password" id="lock_password" placeholder="Enter account password pleace">
					<div class="buttons">
						<button type="submit" class ="lock_login">Login</button>
						<button class ="lock_logout">Logout</button>
					</div>
				</form>
			</div>
			<div class="user_image">
				<img src="<?php echo base_url();?>resources/images/default/users/default_icon.png" class="user_icon"> 
			</div>
		</div>
	</div>
	<div class="notification_messages ">
		<span>This right here is the message, so check it out</span>
	</div>

	<!-- Top Nav -->
		<div class="tn_section">
			<div class="upper_sect ">
				<img src="<?php echo base_url();?>resources/images/logo.png" class="logo">
			</div>
			<div class="menu ml5">
				<!-- Zulla Uganda --> <b>Zulla Uganda</b>
			</div>
			<div class="search">
				<form>
					<input type="text" name="search" placeholder="Search...">
					<label for="search"><i class="las la-search"></i></label>
					<input type="submit" name="search" id="search" value="Search">
				</form>
			</div>
			<nav>
				<ul>
					<li><a href="<?php echo site_url('Home') ?>">Home</a></li>
					<li><a href="<?php echo site_url('Home/property_listing') ?>">Propery Listings</a></li>
					<li><a href="<?php echo site_url('Home/services') ?>">Services</a></li>
					<li><a href="<?php echo site_url('Home/contact') ?>">Contact us</a></li>
					
					<li><a href="<?php echo site_url('Signup') ?>" class="account_setup_access">Sign Up</a></li>
					<li><a href="<?php echo site_url('Login') ?>" class="account_setup_access">Login</a></li>
					
				</ul>
			</nav>

			<!-- IF USE ACCOUNT IS BUYER AND HAS LOGED IN SHOW THESE  AND REMOVE LOGIN AND SIGN UP IN THE UPPER SECTION -->
			<div class="iconic_links disabled">
				<a href="" class="user_account">
					<img src="<?php echo base_url();?>resources/images/default/users/default_icon.png" class="user_icon"> 
					<i class="las la-chevron-down drop"></i>
				</a>
				<a href="" class="log_all_users_out"><i class="notify las la-bell"></i></a>
				<a href=""><i class="liked las la-thumbs-up"></i></a>
				<a href="" class="lock_user_account_screen"><i class="account_lock las la-user-lock"></i></a>
				<a href="" class="logout"><i class="leave las la-sign-out-alt"></i></a>
			</div>
			<img src="<?php echo base_url();?>resources/images/menu.png" class="menu-icon">
		</div>

	<?php $this->load->view($view_page)  ?>

	
		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4">
						<h4>About us</h4>
						<p>
							We are Ugandan based company under THE ESTATE, offering a wide range of services including 
							selling and buying of properties, surveying, Land title processing, Property consultancy, Estates development among others.
						</p>
					</div>
					<div class="col-lg-4">
						<h4>Our property types</h4>
						<p>
							Houses for rent <br>
							Houses for Sale <br>
							Land for rent <br>
							Residential plots <br>
						</p>
					</div>
					<div class="col-lg-4">
						<h4>Signup to our news letter</h4><br><br>
						<div class="fi">
							<form class="search-box">
								<div class="inp-search">
									<input type="text" name="search" placeholder="Enter Email Address">
									<label for="search"><i class="las la-envelope"></i></label>
									<input type="submit" name="search" value="search" id="search">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="copy">
				&copy; 2021 All rights reserved | The Estate
			</div>
		</footer>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom jQuery -->
    <!-- <script type="text/javascript" src="<?php echo base_url();?>resources/JS/main.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url();?>resources/JS/process_logs.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url();?>resources/JS/structure_check.js"></script> -->
</body>
</html>