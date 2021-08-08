
	<div class="signup">
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<div class="signup_form">
					<h1>Signup now</h1>
					<p>
						to receive exclusive offers and promotions. <br> In order to receive the best deals that are customized to your testes.
					</p>
				</div>

					<form id="reg_form" >
						<div class="row">
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<input type="text" class="form-control" id="reg_first_name" placeholder="Enter First Name">
							    </div>
							    <div class="form-group col-md-6">
							      	<input type="text" class="form-control" id="reg_last_name" placeholder="Enter Last Name">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<input type="email" class="form-control" id="reg_email" placeholder="Enter Email">
							    </div>
							    <div class="form-group col-md-6">
							      	<input type="text" class="form-control" id="reg_telephone" placeholder="Enter telephone Number">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<select class="form-control" id="reg_account_type">
	                                    <option class="hidden"  selected disabled>Please select your Option</option>
	                                    <?php  
	                                    /**
	                                     *  DISPLAY THE ACCOUNT TYPES ON HERE IN DROP DOWN FORM
	                                     */
	                                    $account_type = account_type_drop_down();
	                                    echo $account_type;

	                                    ?>
	                                </select>
							    </div>
							    <div class="form-group col-md-6">
							    	<select class="form-control" id="reg_country">
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
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<select class="form-control" id="reg_gender">
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
							    <div class="form-group col-md-6">
							      	<input type="date" class="form-control" id="reg_dob" title ="Choose your date of birth">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<input type="password" class="form-control" id="reg_password" placeholder="Enter password" autocomplete="false">
							    </div>
							    <div class="form-group col-md-6">
							      	<input type="password" class="form-control" id="reg_confirm_password" placeholder="Re-Enter Password" autocomplete="false">
							    </div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
							      	<div class="form-check policy">
								        <input class="form-check-input" type="checkbox" id="terms" >
								        <label class="form-check-label" for="terms">
								          I agree to the <a href="#"> terms of services</a> and <a href="#"> privacy policy</a>
								        </label>
							      	</div>
							    </div>
							</div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<input type="submit" class=" btn btn-success" id="reg_register" value="Register">
						    </div>
						    <div class="form-group col-md-6">
						      	<input type="reset" class=" btn btn-warning" id="reg_clear" value="Clear">
						    </div>
						</div>
					</form>

			</div>
			<div class="col-lg-6 col-sm-12">
				<div class="signup_info">
					<h2>
						Your free account is only a few secounds away
					</h2>
					<p>
						"
						The huge cost of using street firms hits both landlords and tenants but now we have an alternative THE ESTATE
						"
					</p>
					<p>
						Signup today and get access to: <br>
						personalized listing <br>
						Save your interested properties <br>
						unlimited contact straight to the agents <br>
						property booking etc.
					</p>
				</div>
			</div>
		</div>
	</div>