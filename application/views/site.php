<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title> <?php echo $title ?> </title>

	<!-- Icons -->
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

	<!-- Custom styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/owner_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/motion.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/notifications.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/animation.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/reformat.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/profile.css">

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

	<!-- FOR DELIVERING MESSAGES -->
	<div class="notification_messages ">
		<span>This right here is the message, so check it out</span>
		<!-- <i class="las la-times close_notification_message"></i> -->
	</div>

	<!-- FOR SHOW USER PROFILE -->
	<div class="user_profile disabled">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
					<div class="profile_image_active">
						<span class="c1"></span>
						<span class="c2"></span>
						<span class="c3"></span>
						<img src="<?php echo base_url();?>resources/images/default/users/user.jpg" id="image_preview">
						<form method="post" action="#" id="upload_profile" enctype="multipart/form-data" >
							<input  accept="image/*"  type="file" name="profile_image_to_upload" id="profile_image_to_upload">
							<label for="profile_image_to_upload"><span class="uploader">Select and preview image <i class="las la-camera "></i></span></label>
							<input   type="submit" name="" id="upload_profile_image_btn">
							<label for="upload_profile_image_btn"><span class="image_uploader"><i class="las la-cloud-upload-alt "></i> Upload previewed image</span></label>
						</form>
					</div>
				</div>
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
					<div class="user_profile_details">
						<span class="c4"></span>
						<a href="" class="edit_profile">
							<i class="las la-edit"></i>
						</a>
						<div class="profile_head h">
							<i class="las la-user-edit"></i>
							<span><b>User</b> <br> <small>Profile Details</small></span>
						</div>
						<div class="actual_profile">
							<div class="ragistry_details">
								<span><b> <i class="las la-user"></i> name: </b><i class="profile_user_name gf"></i></span>
								<span><b> <i class="las la-envelope"></i> email: </b><i class="profile_user_email gf"></i></span>
								<span><b> <i class="las la-phone-alt"></i> telephone: </b><i class="profile_user_telephone gf"></i></span>
								<span><b> <i class="las la-certificate"></i> account: </b><i class="profile_user_account gf"></i></span>
								<span><b> <i class="las la-flag"></i> country: </b><i class="profile_user_country gf"></i></span>
								<span><b> <i class="las la-male"></i> gender: </b><i class="profile_user_gender gf"></i></span>
								<span><b> <i class="las la-calendar"></i> dob: </b><i class="profile_user_dob gf"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
					<div class="other_profile_images">
						<div class="profile_head ">
							<i class="las la-camera"></i>
							<span><b>Previous</b> <br> <small>Profile photos</small></span>
						</div>
						<i class="las la-chevron-left navigator"></i>
						<div class="previous">
							<div class="particuler_image">
								<div class="set_image">
									<img src="<?php echo base_url();?>resources/images/default/users/user.jpg" class="">
								</div>
								<div class="set_date">
									<span><b>Set on: </b>Sept 1 <sup>st</sup> May 2021 00:00:00</span>
									<span><b>Chenged on: </b>Sept 1 <sup>st</sup> May 2021 00:00:00</span>
								</div>
								<div class="image_action">
									<i class="las la-plus"></i>
									<i class="las la-times"></i>
								</div>
							</div>
							<div class="particuler_image">
								<div class="set_image">
									<img src="<?php echo base_url();?>resources/images/default/users/men_default_icon.png" class="">
								</div>
								<div class="set_date">
									<span><b>Set on: </b>Sept 1 <sup>st</sup> May 2021 00:00:00</span>
									<span><b>Chenged on: </b>Sept 1 <sup>st</sup> May 2021 00:00:00</span>
								</div>
								<div class="image_action">
									<i class="las la-plus"></i>
									<i class="las la-times"></i>
								</div>
							</div>
							<div class="particuler_image">
								<div class="set_image">
									<img src="<?php echo base_url();?>resources/images/default/users/female_default_icon.png" class="">
								</div>
								<div class="set_date">
									<span><b>Set on: </b>Sept 1 <sup>st</sup> May 2021 00:00:00</span>
									<span><b>Chenged on: </b>Sept 1 <sup>st</sup> May 2021 00:00:00</span>
								</div>
								<div class="image_action">
									<i class="las la-plus"></i>
									<i class="las la-times"></i>
								</div>
							</div>
						</div>
						<i class="las la-chevron-right navigator"></i>
					</div>
				</div>
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
					<div class="other_profile_images">
						<div class="profile_head h">
							<i class="las la-user-edit"></i>
							<span><b>Edit</b> <br> <small>Profile details</small></span>
						</div>

						<div class="edit_profile_details">
							<h1>Edit Profile</h1>
							<p>
								To save changes to your profile please refill the form fields below and then click on the save changes button please. <br>
								NOTE: Changing your email will lead to automatic logout as anew session associated with your email has to be formed.
							</p>
							<form class="edit_profile_form" method="post" action="#">
								<div class="container-fluid">
									<div class="form-row">
									    <div class="form-group col-md-6">
									      	<input type="text" class="form-control update_input edit_profile_first_name" placeholder="Enter First Name">
									    </div>
									    <div class="form-group col-md-6">
									      	<input type="text" class="form-control update_input edit_profile_last_name" placeholder="Enter Last Name">
									    </div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-6">
									      	<input type="email" class="form-control update_input edit_profile_email" placeholder="Enter Email">
									    </div>
									    <div class="form-group col-md-6">
									      	<input type="text" class="form-control update_input edit_profile_telephone" placeholder="Enter telephone Number">
									    </div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-6 edit_country">
									    	<select class="form-control update_input edit_profile_country">
			                                    <option class="hidden"  selected disabled>Please select your country</option>
			                                    <?php  
			                                    /**
			                                     *  DISPLAY THE COUNRIES HERE IN DROP DOWN FORM
			                                     */
			                                    $country = country_drop_down();
			                                    echo $country;

			                                    ?>
			                                </select>
			                            </div>
									    <div class="form-group col-md-6 edit_gender">
									      	<select class="form-control update_input edit_profile_gender">
			                                    <option class="hidden"  selected disabled>Please select your gender</option>
			                                    <?php  
			                                    /**
			                                     *  DISPLAY THE GENDER HERE IN DROP DOWN FORM
			                                     */
			                                    $gender = gender_drop_down();
			                                    echo $gender;

			                                    ?>
			                                </select>
									    </div>
									</div>
								    <div class="form-row">
									    <div class="form-group col-md-12">
									      	<input type="date" class="form-control update_input edit_profile_dob" title ="Choose your date of birth">
									    </div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-6">
									      	<input type="submit" class=" btn btn-success edit_profile_btn" value="Save changes">
									    </div>
									    <div class="form-group col-md-6">
									      	<input type="reset" class=" btn btn-warning edit_profile_clear_btn" value="Clear">
									    </div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<!-- Side Navigation -->
		<div class="upper_sect">
			<img src="<?php echo base_url();?>resources/images/logo.png" class="logo">
		</div>
	<div class="n_section">
		<div class="middle_sect">
			<a href="<?php echo site_url('Dashboard') ?>">
				<i class="las la-braille"></i>
				<span>Dashbord</span>
			</a>
			<a href=" <?php echo site_url('Dashboard/owner_create') ?>">
				<i class="lab la-opencart"></i>
				<span>Create</span>
			</a>
			<a href=" <?php echo site_url('Dashboard/owner_listing') ?>">
				<i class="las la-spinner"></i>
				<span>Listings</span>
			</a>
			<a href="#">
				<i class="las la-shopping-cart"></i>
				<span>Transactions </span>
			</a>
			<a href=" <?php echo site_url('Dashboard/owner_rentals') ?>">
				<i class="las la-tags"></i>
				<span>Rentals</span>
			</a>
		</div>
		<div class="lower_sect">
			<a href="<?php echo site_url('Dashboard/owner_settings') ?>">
				<i class="las la-cog"></i>
				<span>Settings</span>
			</a>
		</div>
	</div>

	<!-- Main Section -->
	<div class="m_section">
		<!-- Top Nav -->
		<div class="tn_section">
			<div class="menu">
				<i class="las la-bars"></i> <b>Dashboard</b>
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
					<li><a href="<?php echo site_url('Dashboard/home') ?>">Home</a></li>
					<li><a href="<?php echo site_url('Dashboard/property_listing') ?>">Propery Listings</a></li>
					<li><a href="<?php echo site_url('Dashboard/services') ?>">Services</a></li>
					<li><a href="<?php echo site_url('Dashboard/contact') ?>">Contact us</a></li>
				</ul>
			</nav>
			<div class="iconic_links">
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
		<!-- Dynamic page load -->
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
	</div>



	<!-- Optional JavaScript -->
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom jQuery -->
    <!-- <script type="text/javascript" src="<?php echo base_url();?>resources/JS/main.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url();?>resources/JS/process_logs.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>resources/JS/check_session.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>resources/JS/profile.js"></script>
</body>
</html>
<!-- <link rel="stylesheet" href="path/to/line-awesome/css/line-awesome-font-awesome.min.css"> -->