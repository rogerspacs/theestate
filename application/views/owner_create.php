
		<!-- Create asset section -->
		<div class="container-fluid">
			<div class="row bgwhite create_asset">
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
					<div class="row asset bgtransparent">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="title">My Assets</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
							<div class="a_asset bg1 br1">
								<i class="lab la-atlassian"></i>
								<span>Houses</span>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
							<div class="a_asset bg2 br1">
								<i class="lab la-gitter"></i>
								<span>Rental</span>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
							<div class="a_asset bg3 br1">
								<i class="lab la-buromobelexperte"></i>
								<span>Land</span>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
							<div class="a_asset bg4 br1">
								<i class="lab la-gripfire"></i>
								<span>Apartments</span>
							</div>
						</div>
					</div>
					<div class="row bgtranslucent collected_setails move" id="instractions">
						<div class="col-md-12">
							<h1>Instructions or usefull Informations</h1><hr style="background: #fff;">
						</div>
						<div class="col-xl-12">
							<p>
								On the left is a form for general details of the asset (land, house, rentals, partment etc) you would like to add, this is the first step
								to progress through the procedure of adding an asset to your collection please fill in the form details to procede to the next step.
								Fill in the first details in this section, they will lead you to the next detail page
							</p>
							<p>
								<b>Your probably wondering how many steps are you to  go through just to add you asset!</b> <br>
								No more wonders, there are just three simples steps and the only reason they were seperated was to ease the process of asset entry, these steps are structured in away that you assets a 
								stored with relevant informatio. For example rentals can't have a swimming pool or Land can't have a modern ceiling but a House can. Besides alot of details on one page is boring, enjoy our design as you progress through each step the moment you click next there will be slide to the left just to provide you with the next section, isn't that beter than endless scrolling. That's right, it's elegant and beautifull.
							</p>
							<p>
								<b>Incase your wondering what each step deals with</b><br> 
								I'll wall you throught these steps as explain what is required at each step, below are the three general rules for the asset entry section . Please check them out.
							</p>
						</div>
						<div class="col-xl-4">

							<p>
								<b>First Step</b> <br>
								This section is made up of the general required information of any asset such as the asset location, price, the type of asset and the description, filling in this section provides clients with relevant information about the asset for the to pick interest in it. Filling in this step leads you to the next section or step.
							</p>

						</div>
						<div class="col-xl-4">
							<p>
								<b>Secound Step</b> <br>
								This section depends on the previous section, the details required in this section vary depending on the asset category/type you choose in the first section. So don't wonder why your prevented with a different form than you previous got when you selected a different asset category/type.
							</p>
						</div>
						<div class="col-xl-4">
							<p>
								<b>Third Step</b> <br>
								This section is the last section, it is just for visuals. it's all about adding more clarity to the information you provide in the previuos sections, the way you do this is by upload a couple of images of your asset in different angles(Front side, rear/behind, left side, right side, arial and interior).
							</p>
						</div>
						<div class="col-xl-12">
							<p>
								Oh When you have moved on from one section to another don't worry, you can always go back to the previous section and check your inputs or make changes. Only the changed inputs will change the rest of the collected details will still be available to you, this way you don't have refill all the form fields againt.<br> 
								<b>Note</b><br> 
								The only change you can not make is changing the asset category/type because this would mean your changing every thing. If this is what you want then just navigate to the first section and click on reset, this should do it.
							</p>
						</div>
					</div>
					<div class="row bgtranslucent collected_setails keep_hidden" id="collected_general">
						<div class="col-md-12">
							<h1>Asset General details</h1><hr style="background: #fff;">
						</div>
						<div class="col-xl-2">
							<label><b>Asset:</b></label>
							<p id="asset_category_collected">None</p>
						</div>
						<div class="col-xl-4">
							<label><b>Location:</b></label>
							<p id="asset_location_collected">None</p>
						</div>
						<div class="col-xl-3">
							<label><b>Price:</b></label>
							<p id="asset_price_collected">None</p>
						</div>
						<div class="col-xl-3">
							<label><b>Lease Duration:</b></label>
							<p id="asset_lease_duration_collected">None</p>
						</div>
						<div class="col-xl-12">
							<label><b>Description</b></label>
							<p id="asset_description_collected">None</p>
						</div>
					</div>
					<hr>
					<div class="row bgtranslucent collected_setails keep_hidden" id="collected_house_features">
						<div class="col-md-12">
							<h1>House  details</h1><hr style="background: #fff;">
						</div>
						<div class="col-xl-4">
							<label><b>Size of land sitted on:</b></label>
							<p id="asset_size_of_land_sitted_on_collected">None</p>
						</div>
						<div class="col-xl-4">
							<label><b>Number of bedrooms:</b></label>
							<p id="asset_number_of_bedrooms_collected">None</p>
						</div>
						<div class="col-xl-4">
							<label><b>Number of birthrooms:</b></label>
							<p id="asset_number_of_birthrooms_collected">None</p>
						</div>
						<div class="col-xl-12">
							<label><b>House features</b></label>
						</div>
					</div>

					<div class="row bgtranslucent collected_setails keep_hidden" id="collected_land_features">
						<div class="col-md-12">
							<h1>Land  details</h1><hr style="background: #fff;">
						</div>
						<div class="col-xl-12">
							<label><b>Land size:</b></label>
							<p id="asset_land_size_collected">None</p>
						</div>
						<div class="col-xl-12">
							<label><b>Land features</b></label>
						</div>
					</div>

					<div class="row bgtranslucent collected_setails keep_hidden" id="collected_rental_features">
						<div class="col-md-12">
							<h1>Rentals  details</h1><hr style="background: #fff;">
						</div>
						<div class="col-xl-6">
							<label><b>Number of rooms:</b></label>
							<p id="asset_number_of_rooms_collected">None</p>
						</div>
						<div class="col-xl-6">
							<label><b>Size of rooms:</b></label>
							<p id="asset_size_of_rooms_collected">None</p>
						</div>
						<div class="col-xl-12">
							<label><b>Land features</b></label>
						</div>
					</div>

				</div>

				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
					<div class="row bgtransparent">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="enter_asset_det bgtranslucent">
								<div class="form_head">
									<i class="las la-pen-alt Clwhite bg1 size3"></i>
									<span class="Clwhite">Enter Asset details please</span>
								</div>
								<div class="steps">
									<a href="#" class="bg2 active">
										<i class="lab la-gitter"></i>
										<span class="bg2 active">Step 1</span>
									</a>
									<a href="#" class="bg3">
										<i class="las la-biking"></i>
										<span class="bg3">Step 2</span>
									</a>
									<a href="#" class="bg4">
										<i class="las la-broadcast-tower"></i>
										<span class="bg4">Step 3</span>
									</a>
									<a href="#" class="bg1">
										<i class="las la-check-circle"></i>
										<span class="bg1">Step 4</span>
									</a>
								</div>
								<div class="create_asset_form">
									<form id="general" class="revealed">
										<h4 class="Clwhite">General</h4>
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											    <div class="form-group">
											      	<select class="form-control" id="asset_category">
					                                    <option class="hidden" selected disabled>Choose asset category</option>
					                                    <?php  
					                                    /**
					                                     *  DISPLAY THE category HERE IN DROP DOWN FORM
					                                     */
					                                    $category = category_drop_down();
					                                    echo $category;

					                                    ?>
					                                </select>
											    </div>
											    <div class="form-group">
											      	<select class="form-control" id="asset_transaction_type">
					                                    <option class="hidden"  selected disabled>Choose transaction type</option>
					                                    <?php  
					                                    /**
					                                     *  DISPLAY THE transaction_type HERE IN DROP DOWN FORM
					                                     */
					                                    $transaction_type = transaction_type_drop_down();
					                                    echo $transaction_type;

					                                    ?>
					                                </select>
											    </div>
											    <div class="form-group">
											      	<input type="text" class="form-control no_show" id="asset_lease_duration" value="none" placeholder="Leanse duration">
											    </div>
											    <div class="form-group">
											      	<input type="text" id="asset_location" class="form-control" name="location" placeholder="Enter location">
											    </div>
											    <div class="form-group">
											      	<input type="text" id="asset_price" class="form-control" name="price" placeholder="Enter price">
											    </div>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											    <div class="form-group">
											      	<textarea class="form-control" id="asset_description" placeholder="Enter description"></textarea>
											    </div>
											</div>
										</div>
										<div class="form-row">
										    <div class="form-group col-sm-6">
										    	<a href="" class="prev back Clwhite bg2" id="reset">
										    		<i class="las la-gitter"></i>
										    		<span>Reset</span>
										    	</a>
										    </div>
										    <div class="form-group col-sm-6">
										    	<label for="go_to_next" class="next Clwhite bg1">
										    		<span>Next</span>
										    		<i class="las la-arrow-right"></i>
										    	</label>
										      	<input type="submit" name="proced" value="proced" id="go_to_next" class="no_show go_to_next ">
										    </div>
										</div>
									</form>
									<form id="house" class="move_right">
										<h4 class="Clwhite">House</h4>
										<div class="row">
											<div class="col-md-12">
											    <div class="row">
													<div class="col-md-12">
												    	<div class="form-group">
													      	<input type="text" class="form-control" id="sited_on_land_size" placeholder="Size of land sited on">
													    </div>
													</div>
													<div class="col-md-12">
													    <div class="form-group">
													      	<input type="text" class="form-control" id="number_of_bed_rooms" placeholder="Number of Bed rooms">
													    </div>
													</div>
													<div class="col-md-12">
													    <div class="form-group">
													      	<input type="text" class="form-control" id="number_of_birth_rooms" placeholder="Number of Birth rooms">
													    </div>
													</div>
											    </div>
											</div>
											<div class="col-md-12">
												<h5 class="Clwhite">Other features</h5>
											    <div class="form-row">
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="house_features" class="form-check-input" type="checkbox" id="indoor_toilets" value="Indoor toilets">
													        <label class="form-check-label Clwhite" for="indoor_toilets">Indoor toilets</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="house_features" class="form-check-input" type="checkbox" id="swimmming_pool" value="Swimmming pool">
													        <label class="form-check-label Clwhite" for="swimmming_pool">Swimmming pool</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="house_features" class="form-check-input" type="checkbox" id="laundry_room" value="Laundry room">
													        <label class="form-check-label Clwhite" for="laundry_room">Laundry room</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="house_features" class="form-check-input" type="checkbox" id="openspace_kitchen" value="Openspace kitchen">
													        <label class="form-check-label Clwhite" for="openspace_kitchen">Openspace kitchen</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="house_features" class="form-check-input" type="checkbox" id="indoor_birthrooms" value="Indoor birthrooms">
													        <label class="form-check-label Clwhite" for="indoor_birthrooms">Indoor birthrooms</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="house_features" class="form-check-input" type="checkbox" id="modern_interior" value="Modern interior">
													        <label class="form-check-label Clwhite" for="modern_interior">Modern interior</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="house_features" class="form-check-input" type="checkbox" id="suspecious_garden" value="Suspecious garden">
													        <label class="form-check-label Clwhite" for="suspecious_garden">Suspecious garden</label>
												      	</div>
												    </div>
												</div>
											</div>
										</div>
										<div class="row">
										    <div class="form-group col-sm-6">
										    	<a href="" class="prev back Clwhite bg2 go_to_general">
										    		<i class="las la-arrow-left"></i>
										    		<span>Back</span>
										    	</a>
										    </div>
										    <div class="form-group col-sm-6">
										    	<label for="go_to_images" class="next Clwhite bg1">
										    		<span>Next</span>
										    		<i class="las la-arrow-right"></i>
										    	</label>
										      	<input type="submit" name="proced" value="proced" id="go_to_images" class="no_show go_to_images">
										    </div>
										</div>
									</form>
									<form id="rentals" class="move_right">
										<h4 class="Clwhite">Rentals</h4>
										<div class="row">
											<div class="col-md-12">
											    <div class="form-group">
											      	<input type="text" class="form-control" id="number_of_rooms" placeholder="Number of rooms">
											    </div>
											</div>
											<div class="col-md-12">
										    	<div class="form-group">
											      	<input type="text" class="form-control" id="size_of_rooms" placeholder="Size of room(s)">
											    </div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<h5 class="Clwhite">Other features</h5>
											    <div class="row">
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="rental_features" class="form-check-input" type="checkbox" id="indoor_toilet" value="Indoor toilet">
													        <label class="form-check-label Clwhite" for="indoor_toilet">Indoor toilet</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="rental_features" class="form-check-input" type="checkbox" id="indoor_birthroom" value="Indoor birthrooms">
													        <label class="form-check-label Clwhite" for="indoor_birthroom">Indoor birthroom</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="rental_features" class="form-check-input" type="checkbox" id="rooms_with_ceiling" value="Rooms with ceiling">
													        <label class="form-check-label Clwhite" for="rooms_with_ceiling">Rooms with ceiling</label>
												      	</div>
												    </div>
												</div>
											</div>
										</div>
										<div class="form-row">
										    <div class="form-group col-sm-6">
										    	<a href="" class="prev back Clwhite bg2  go_to_general">
										    		<i class="las la-arrow-left"></i>
										    		<span>Back</span>
										    	</a>
										    </div>
										    <div class="form-group col-sm-6">
										    	<label for="rental_to_images" class="next Clwhite bg1">
										    		<span>Next</span>
										    		<i class="las la-arrow-right"></i>
										    	</label>
										      	<input type="submit" name="proced" value="proced" class="no_show rental_to_images" id="rental_to_images">
										    </div>
										</div>
									</form>
									<!-- go to rentals -->
									<form id="land" class="move_right">
										<h4 class="Clwhite">Land</h4>
										<div class="row">
											<div class="col-md-12">
											    <div class="row">
													<div class="col-md-12">
												    	<div class="form-group">
													      	<input type="text" class="form-control" id="land_size" placeholder="Size of land">
													    </div>
													</div>
											    </div>
											</div>
											<div class="col-md-12">
												<h5 class="Clwhite">Other features</h5>
											    <div class="form-row">
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="land_features" class="form-check-input" type="checkbox" id="has_land_title" value="Has land title">
													        <label class="form-check-label Clwhite" for="has_land_title">has land title</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="land_features" class="form-check-input" type="checkbox" id="close_to_the_road" value="Close to the road">
													        <label class="form-check-label Clwhite" for="close_to_the_road">Close to the road</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="land_features" class="form-check-input" type="checkbox" id="has_gentle_slop" value="has gentle slope">
													        <label class="form-check-label Clwhite" for="has_gentle_slop">has gentle slope</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="land_features" class="form-check-input" type="checkbox" id="has_water_source" value="has_water source">
													        <label class="form-check-label Clwhite" for="has_water_source">Has water source</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="land_features" class="form-check-input" type="checkbox" id="fertile" value="Fertile">
													        <label class="form-check-label Clwhite" for="fertile">Fertile</label>
												      	</div>
												    </div>
													<div class="form-group col-md-6">
												      	<div class="form-check policy">
													        <input name="land_features" class="form-check-input" type="checkbox" id="quiet_neighborhood" value="Quiet neighborhood">
													        <label class="form-check-label Clwhite" for="quiet_neighborhood">Quiet neighborhood</label>
												      	</div>
												    </div>
												</div>
											</div>
										</div>
										<div class="form-row">
										    <div class="form-group col-sm-6">
										    	<a href="#" class="prev back Clwhite bg2 go_to_general">
										    		<i class="las la-arrow-left"></i>
										    		<span>Back</span>
										    	</a>
										    </div>
										    <div class="form-group col-sm-6">
										    	<label for="land_to_images" class="next Clwhite bg1">
										    		<span>Next</span>
										    		<i class="las la-arrow-right"></i>
										    	</label>
										      	<input type="submit" name="proced" value="proced" class="go_to_images no_show" id="land_to_images">
										    </div>
										</div>
									</form>

									<form id="image_upload" class="move_right">
										<div class="form-row">
											<div class="col-md-12">
												<h4 class="Clwhite">Upload images</h4>
											</div>
										</div>
										<div class="form-row">
											<div class="col-sm-6 img_box">
												<img id="front_image_display" src="http://127.0.0.1/theestate/resources/images/default/background/img_bg.png" class="img_bg" />
												<label for="front_image" class="add_image">
													<i class="las la-plus Clgreen"></i>
													<span>Front Image</span>
												</label>
												<input type="file" name="image" id="front_image" class="no_show">
											</div>
											<div class="col-sm-6 img_box">
												<img id="rear_image_display" src="http://127.0.0.1/theestate/resources/images/default/background/img_bg.png" class="img_bg" />
												<label for="rear_image" class="add_image">
													<i class="las la-plus Clgreen"></i>
													<span>rear Image</span>
												</label>
												<input type="file" name="image" id="rear_image" class="no_show">
											</div>
											<div class="col-sm-6 img_box">
												<img id="left_side_image_display" src="http://127.0.0.1/theestate/resources/images/default/background/img_bg.png" class="img_bg" />
												<label for="left_side_image" class="add_image">
													<i class="las la-plus Clgreen"></i>
													<span>Left Side Image</span>
												</label>
												<input type="file" name="image" id="left_side_image" class="no_show">
											</div>
											<div class="col-sm-6 img_box">
												<img id="right_side_image_display" src="http://127.0.0.1/theestate/resources/images/default/background/img_bg.png" class="img_bg" />
												<label for="right_side_image" class="add_image">
													<i class="las la-plus Clgreen"></i>
													<span>Right Side Image</span>
												</label>
												<input type="file" name="image" id="right_side_image" class="no_show">
											</div>
											<div class="col-sm-6 img_box">
												<img id="arial_image_display" src="http://127.0.0.1/theestate/resources/images/default/background/img_bg.png" class="img_bg" />
												<label for="arial_image" class="add_image">
													<i class="las la-plus Clgreen"></i>
													<span>Ariail Image</span>
												</label>
												<input type="file" name="image" id="arial_image" class="no_show">
											</div>
											<div class="col-sm-6 img_box">
												<img id="interior_image_display" src="http://127.0.0.1/theestate/resources/images/default/background/img_bg.png" class="img_bg" />
												<label for="interior_image" class="add_image">
													<i class="las la-plus Clgreen"></i>
													<span>Interior Image</span>
												</label>
												<input type="file" name="image" id="interior_image" class="no_show">
											</div>
										</div>
										<div class="form-row">
										    <div class="form-group col-sm-6">
										    	<a href="" class="back Clwhite bg2" id="move_back_to_previous">
										    		<i class="las la-arrow-left"></i>
										    		<span>Back</span>
										    	</a>
										    </div>
										    <div class="form-group col-sm-6">
										    	<label for="submit_form" class="next Clwhite bg1">
										    		<span>Next</span>
										    		<i class="las la-arrow-right"></i>
										    	</label>
										      	<input type="submit" name="proced" value="proced" class="no_show submit_form" id="submit_form">
										    </div>
										</div>
									</form>

									<div class="form_head move_right prev" id="collection_success" style="padding: 5rem;">
										<span class="Clwhite">Data collection completed successfully</span>
										<i class="las la-check-circle Clwhite bg7" style="font-size: 80px;"></i>

										<a href="<?php site_url()?>owner_create" class="prev back Clwhite bg5" id="save_asset">
								    		<span>Save details</span>
								    	</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>