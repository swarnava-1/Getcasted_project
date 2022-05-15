<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Get Casted - Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	<script type="text/javascript">
		$('select').selectpicker();
	</script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                        	<?php if($this->session->flashdata('warning_message')) {
                                $message = $this->session->flashdata('warning_message');
                                ?>
                                <div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?>
                                </div>
                            <?php } ?>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
								<a href="<?php echo base_url();?>"><img style="width:200px;" src="<?php echo base_url();?>assets/img/logo.jpg" alt=""/></a>
											<p class="subTxt"> Join Get Casted today and land your perfect role </p>
								<!-- Create an Account! --></h1>
                            </div>
							
							
							  <!-- Nav tabs -->
							  <ul class="nav nav-pills nav-tabs" role="tablist">
								<li class="nav-item">
								  <a class="nav-link nav-link1 active" data-toggle="tab" href="#home">Register as a Casting Director or Agent</a>
								</li>
								
								<li class="nav-item">
								  <a class="nav-link nav-link2" data-toggle="tab" href="#menu1">Register as an Artist</a>
								</li>
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
								<div id="home" class="tab-pane active"><br>
								<form class="user" action="<?php echo base_url();?>register/newUser" method = "post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Name (Company / Individual)" name="company_name_or_individual_name" required>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Address" name="address" required>
                                    </div> -->
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder="Contact No." name="contact_no" required>
									</div>
                                </div>
                                <div class="form-group row">
									<!-- <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder="Contact No." name="contact_no" required>
									</div> -->
                                    <div class="col-sm-6">
										<input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder="Mobile No." name="mobile_number" required>
									</div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email ID" name="email_id" required>
									</div>
                                </div>
								<!-- <div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email ID" name="email_id" required>
									</div>
                                    <div class="col-sm-6">
										<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Tax Reg N0." name="tax_reg_number" required>
									</div>
                                </div> -->
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										 <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name = "password" required>
									</div>
                                    <div class="col-sm-6">
										 <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name = "password1" required>
									</div>
                                </div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
                                        <select class="form-control form-control-select" name="role_id" required>
                                            <option selected> Select Role</option>
                                            <option value="3">Agent</option>
                                            <option value="2">Casting Director</option>
                                        </select>
									</div>
                                </div>
								<div class="form-group row">
								<div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account ">  
                                </div>	
                                </div>  
                            </form>
							</div>	
							<div id="menu1" class="tab-pane fade"><br>
							<form class="user" action="<?php echo base_url();?>register/newTalent" method = "post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Profile Name" name="profile_name" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" name="current_conflicts" required>
											<option> Select Current Conflicts</option>
											<option value="Contractual">Technology</option>
											<option value="Such as tech">Medical</option>
											<option value="Lifestyle">Lifestyle </option>
											<option value="Travel">Travel </option>
											<option value="Insurance">Insurance </option>
											<option value="Cars">Cars </option>
											<option value="Clothing">Clothing </option>
											<option value="Sports">Sports </option>
											<option value="Food">Food </option>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Expiration Date" onfocus="(this.type='date')" name="expiration_date" required>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="age">Age (between 0 and 100):</label>
                                    <input type="range" id="age" name="age" min="1" max="90">
                                    </div>  
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Address" name="address" required>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Distance range for how far talent will travel for auditions" name="distance" required>
                                    </div>  
                                </div>
								<input type="hidden" name="role_id" value="4">
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Talent Roles Types" name="talent_roles[]" required>
											<option value="Extra (Background)">Extra (Background)</option>
											<option value="Commercials">Commercials</option>
											<option value="Television">Television</option>
											<option value="Film">Film </option>
											<option value="Modeling">Modeling </option>
											<option value="Music Videos">Music Videos </option>
											<option value="Live Theater">Live Theater </option>
											<option value="Musical Theater">Musical Theater </option>
										</select>
										</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" name="union_status" required>
											<option selected> Select Union Status</option>
											<option value="SAG">SAG</option>
											<option value="SAG Eligible">SAG Eligible</option>
											<option value="Non Union">Non Union</option>
										</select>
                                    </div>
                                </div>
								<!-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                       <select id="agentSelect" class="form-control form-control-select" name="agent" required>
											<option selected> Select Agent</option>
											<option value="Repped">Repped</option>
											<option value="Non Repped">Non Repped</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" id="agentId" name="agent_id">
											<option selected> Select Agent</option>
											<?php foreach($agents as $agent){ ?>
											<option value="<?php echo $agent['id'];?>"><?php echo $agent['company_name_or_individual_name'];?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div> -->
								<input type="hidden" name="agent_id" value="" id="agentIdblank">
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
											<select class="form-control form-control-select" name="ethnicity" required>
											<option selected> Select Ethnicity</option>
											<option value="African American">African American</option>
											<option value="Asian American">Asian American</option>
											<option value="European American">European American</option>
											<option value="Middle Eastern American">Middle Eastern American </option>
											<option value="Indian American">Indian American</option>
											<option value="Native American">Native American</option>
											<option value="Pacific Islander American">Pacific Islander American</option>
											<option value="Multiple">Multiple</option>
											<option value="Other">Other</option>
										</select>
                                    </div>
								</div>
								<div class="form-group row">
								<div class="col-sm-12 mb-6 mb-2 sm-2">
                                        <div class="form-control form-control-radio">
											 <div class="form-check-inline">
											  <span>Gender</span>
											 </div>
											 <div class="form-check-inline">
											  <label class="form-check-label" for="radio1">
												<input type="radio" class="form-check-input" id="radio1" value="Male" name="gender" required>Male
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="radio2" value="Female" name="gender" required>Female
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="radio3" value="Transmale " name="gender" required>Transmale 
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="radio4" value="Transfemale " name="gender" required>Transfemale 
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="radio5" value="Non-binary " name="gender" required>Non-binary 
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="radio6" value="Others" name="gender" required>Others
											  </label>
											</div>
										</div>	
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">	
									<label>Height(Feet)</label>
										<select class="form-control form-control-select" name="feet" required>
										    <option >Select Feet</option>
											<?php $range = range(1,10);
											foreach ($range as $r) {
											echo "<option value='$r'>$r'</option>";
											}?>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Height(Inches)</label>
										<select class="form-control form-control-select" name="inches" required>
										    <option >Select Inches</option>
											<?php $range = range(1,12);
											foreach ($range as $r) {
											echo "<option value='$r'>$r''</option>";
											}?>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">	
									<label>Clothing Size</label>
										<select class="form-control form-control-select" name="clothing_size_chest" >
											<option value="Chest">Chest</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
										<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Put chest size" name="clothing_size_chest_inch" >
                                    </div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">	
									<label>Clothing Size</label>
										<select class="form-control form-control-select" name="clothing_size_bust" >
											<option value="Bust">Bust</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
										<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Put bust size" name="clothing_size_bust_inch" >
                                    </div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">	
									<label>Clothing Size</label>
										<select class="form-control form-control-select" name="clothing_size_waist" required>
											<option value="Waist">Waist</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
										<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Put waist size" name="clothing_size_waist_inch" required>
                                    </div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title = "Select Language Spoke" name="language_spoke[]" required>
											<option value="English">English</option>
											<option value="Spanish">Spanish</option>
											<option value="Mandarin">Mandarin</option>
											<option value="Tagalog">Tagalog</option>
											<option value="Vietnamese">Vietnamese</option>
											<option value="Arabic">Arabic</option>
											<option value="French">French</option>
											<option value="Korean">Korean</option>
											<option value="Russian">Russian</option>
											<option value="German">German</option>
											<option value="Haitian Creole ">Haitian Creole</option>
											<option value="Hindi">Hindi</option>
											<option value="Portuguese">Portuguese</option>
											<option value="Italian">Italian</option>
											<option value="Polish">Polish</option>
											<option value="Yiddish">Yiddish</option>
											<option value="Japanese">Japanese</option>
											<option value="Persian">Persian</option> 
											<option value="Gujarati">Gujarati</option>
											<option value="Telugu">Telugu</option>
										</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title = "Select Accents" name="accents[]" required>
											<option value="English">English</option>
											<option value="Scottish">Scottish</option>
											<option value="Welsh">Welsh</option>
											<option value="Irish">Irish</option>
											<option value="Australian">Australian</option>
											<option value="Canadian">Canadian</option>
											<option value="Mid-western">Mid-western</option>
											<option value="Southern">Southern</option>
											<option value="New York">New York</option>
											<option value="Boston">Boston</option>
											<option value="Standard American">Standard American</option>
											<option value="Other">Other</option>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title=" Select Training" name="training[]" required>
											<option value="Method Acting">Method Acting </option>
											<option value="Meisner Technique">Meisner Technique</option>
											<option value="Stella Adler">Stella Adler </option>
											<option value="Improv">Improv </option>
											<option value="Comedy">Comedy </option>
											<option value="Cold Reading">Cold Reading </option>
											<option value="None">None</option>
										</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Athletics" name="athletics[]" required>
											<option value="Track and field">Track and field </option>
											<option value="Road running">Road running</option>
											<option value="Cross country running">Cross country running </option>
											<option value="Football">Football  </option>
											<option value="Basketball">Basketball  </option>
											<option value="Baseball">Baseball  </option>
											<option value="Soccer">Soccer  </option>
											<option value="Ice Hockey">Ice Hockey  </option>
											<option value="Auto Racing">Auto Racing  </option>
											<option value="Tennis">Tennis  </option>
											<option value="Golf">Golf </option>
											<option value="Volleyball">Volleyball </option>
											<option value="Boxing">Boxing  </option>
											<option value="Gymnastics">Gymnastics </option>
											<option value="Motorcross">Motorcross  </option>
											<option value="Ice/Figure skating">Ice/Figure skating  </option>
											<option value="Rodeo">Rodeo  </option>
											<option value="Fishing">Fishing  </option>
											<option value="Swimming">Swimming</option>
											<option value="Wrestling">Wrestling </option>
											<option value="Bowling">Bowling  </option>
											<option value="Other">Other </option>
											<option value="None">None</option>
										</select>
									</div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title = "Select Singing" name="singing[]" required>
											<option value="Soprano">Soprano</option>
											<option value="Mezzo-soprano">Mezzo-soprano</option>
											<option value="Contralto">Contralto</option>
											<option value="Countertenor">Countertenor</option>
											<option value="Tenor">Tenor</option>
											<option value="Baritone">Baritone</option>
											<option value="Bass">Bass</option>
											<option value="Treble">Treble</option>
											<option value="None">None</option>
										</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Dancing" name="dancing[]" required>
											<option value="Ballet">Ballet</option>
											<option value="Ballroom">Ballroom</option>
											<option value="Contemporary">Contemporary</option>
											<option value="Hip Hop">Hip Hop</option>
											<option value="Tap">Tap</option>
											<option value="Folk">Folk</option>
											<option value="Irish">Irish</option>
											<option value="None">None</option>
										</select>
                                    </div>
									</div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
											<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Driving Experience" name="driving_experience[]" required>
												<option value="Personal vehicle license">Personal vehicle license </option>
												<option value="Motocycle Endorsement">Motocycle Endorsement</option>
												<option value="Other">Other</option>
												<option value="None">None</option>
											</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" id="selectCitizen" name="citizenship_or_visa_documents" required>
											<option selected> Select Citizenship or visa documents</option>
											<option value="American Passport">American Passport</option>
											<option value="Work Visa">Work Visa</option>
											<option value="Other Passport">Other Passport</option>
										</select>
                                    </div>  
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-date" id="exampleFirstName" placeholder="Email" name="email" required>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="otherDetails" placeholder="If other passport" name="citizenship_or_visa_documents_other">
                                    </div>  
                                </div>
								<input type="hidden" name="citizenship_or_visa_documents_other" value="" id="otherDetailsblank">
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <div class="form-control form-control-file">
										<span>Headshot Upload</span>
                                        <input type="file" class="" id="exampleFirstName" name="Headshot_upload"/>
                                    </div>
                                    </div>   
                                </div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
										<div class="form-control form-control-file">
										<span>Reel Upload</span>
                                        	<input type="file" class="" id="exampleFirstName" name="reel_upload"/>
                                    	</div>
                                    </div>   
                                </div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
										<div class="form-control form-control-file">
										<span>Upload Your Photo</span>
                                        	<input type="file" class="" id="exampleFirstName" name="photo_upload" required/>
                                    	</div>
                                    </div>   
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Social Media Link For Instagram " name="social_media_link_instagram">
									</div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Social Media Link For tik tok " name="social_media_link_tik_tok">
									</div>
                                </div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Contact No" name="contact_info" required>
                                    </div>
                                </div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										 <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name = "password" required>
									</div>
                                    <div class="col-sm-6">
										 <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name = "password1" required>
									</div>
                                </div>
								<div class="form-group row">
								<div class="col-sm-12 text-center">
									<input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account"></a>
                                </div>
                            </div>	
                            </form>
						</div>  
					</div>
					<div class="text-center">
						<a class="small" href="<?php echo base_url();?>forgetPassword">Forgot Password?</a>
						</div>
						<div class="text-center">
							<a class="small" href="<?php echo base_url();?>login">Already have an account? Login!</a>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>
	
	
	<script>
		$(document).ready(function(){
		
			$("#otherDetails").attr("disabled", true);
			$('body').on('change', '#selectCitizen', function() {
			  //alert( this.value );
			  var y = this.value;
			  if(y == "Other Passport"){
				$("#otherDetails").attr("disabled", false);
				$("#otherDetailsblank").attr("disabled", true);
			  }
			  else{
				$("#otherDetails").attr("disabled", true);
				$("#otherDetailsblank").attr("disabled", false);
			  }
			});
		
		
		
			$("#agentId").attr("disabled", true);
			$('body').on('change', '#agentSelect', function() {
			  //alert( this.value );
			  var x = this.value;
			  if(x == "Non Repped"){
				$("#agentId").attr("disabled", true);
				$("#agentIdblank").attr("disabled", false);
			  }
			  else{
				$("#agentId").attr("disabled", false);
				$("#agentIdblank").attr("disabled", true);
			  }
			});
			
		});
	</script>
	<script>
		$(document).ready(function(){
			var url = $(location).attr("href");
			var id = url.substring(url.lastIndexOf('=') + 1);
			if(id == 1){
				$(".nav-link1").addClass("active");
				$(".nav-link2").removeClass("active");
				$(".nav-link2").addClass("disabled");
				$("#home").addClass("active");
				$("#menu1").removeClass("active");
			}else{
				$(".nav-link2").addClass("active");
				$(".nav-link1").removeClass("active");
				$(".nav-link1").addClass("disabled");
				$("#menu1").addClass("active");
				$("#menu1").addClass("show");
				$("#home").removeClass("active");
			}
		});
  	</script>
	

</body>

</html>