
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
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">Edit Talent details</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
        <form class="user" action="<?php echo base_url();?>agents/agent/update_talent" method = "post" enctype="multipart/form-data">
                                <input type="hidden" name="talent_id" value="<?php echo $talents[0]['user_id'];?>">
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <img src="<?php echo base_url();?><?php echo $talents[0]['photo_upload'];?>" class="img-thumbnail" alt="no image" width="650" height="250"/><br><div class="form-control form-control-file"><span>Update Profile Picture</span><input type="file" class="" id="exampleFirstName" name="photo_upload"/></div>
                                    </div>  
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Profile Name" name="profile_name" required  value="<?php echo $talents[0]['profile_name'];?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" name="current_conflicts" required>
											<option> Select Current Conflicts</option>
											<option value="Contractual" <?php if($talents[0]['current_conflicts']=='Contractual'){ echo "selected";}?>>Contractual</option>
											<option value="Such as tech" <?php if($talents[0]['current_conflicts']=='Such as tech'){ echo "selected";}?>>Such as tech</option>
											<option value="Car commercials" <?php if($talents[0]['current_conflicts']=='Car commercials'){ echo "selected";}?>">Car commercials</option>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Expiration Date" onfocus="(this.type='date')" name="expiration_date" required value="<?php echo $talents[0]['expiration_date'];?>">
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" name="age" required>
										    <option >Select Age</option>
											<option value="10-15" <?php if($talents[0]['age']=='10-15'){ echo "selected";}?>>10-15</option>
											<option value="16-20" <?php if($talents[0]['age']=='16-20'){ echo "selected";}?>>16-20</option>
											<option value="21-25" <?php if($talents[0]['age']=='21-25'){ echo "selected";}?>>21-25</option>
											<option value="26-30" <?php if($talents[0]['age']=='26-30'){ echo "selected";}?>>26-30</option>
											<option value="31-35" <?php if($talents[0]['age']=='31-35'){ echo "selected";}?>>31-35</option>
											<option value="36-40" <?php if($talents[0]['age']=='36-40'){ echo "selected";}?>>36-40</option>
											<option value="41-45" <?php if($talents[0]['age']=='41-45'){ echo "selected";}?>>41-45</option>
											<option value="46-50" <?php if($talents[0]['age']=='46-50'){ echo "selected";}?>>46-50</option>
											<option value="51-55" <?php if($talents[0]['age']=='51-55'){ echo "selected";}?>>51-55</option>
											<option value="56-60" <?php if($talents[0]['age']=='56-60'){ echo "selected";}?>>56-60</option>
											<option value="61-65" <?php if($talents[0]['age']=='61-65'){ echo "selected";}?>>61-65</option>
											<option value="66-70" <?php if($talents[0]['age']=='66-70'){ echo "selected";}?>>66-70</option>
										</select>
                                    </div>  
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Address" name="address" required value="<?php echo $talents[0]['talent_address'];?>">
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Distance range for how far talent will travel for auditions" name="distance" required value="<?php echo $talents[0]['distance'];?>">
                                    </div>  
                                </div>
								<input type="hidden" name="role_id" value="4">
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
                                    <?php $talentrole = $talents[0]['talent_roles'];$talentrole_exp = explode(',',$talentrole);?>
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Talent Roles Types" name="talent_roles[]" required>
											<option value="Extra (Background)" <?php foreach($talentrole_exp as $te){if($te=='Extra (Background)'){ echo "selected";}}?>>Extra (Background)</option>
											<option value="Commercials" <?php foreach($talentrole_exp as $te){if($te=='Commercials'){ echo "selected";}}?>>Commercials</option>
											<option value="Television" <?php foreach($talentrole_exp as $te){if($te=='Television'){ echo "selected";}}?>>Television</option>
											<option value="Film" <?php foreach($talentrole_exp as $te){if($te=='Film'){ echo "selected";}}?>>Film </option>
											<option value="Modeling" <?php foreach($talentrole_exp as $te){if($te=='Modeling'){ echo "selected";}}?>>Modeling </option>
											<option value="Music Videos" <?php foreach($talentrole_exp as $te){if($te=='Music Videos'){ echo "selected";}}?>>Music Videos </option>
											<option value="Live Theater" <?php foreach($talentrole_exp as $te){if($te=='Live Theater'){ echo "selected";}}?>>Live Theater </option>
											<option value="Musical Theater" <?php foreach($talentrole_exp as $te){if($te=='Musical Theater'){ echo "selected";}}?>>Musical Theater </option>
										</select>
										</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" name="union_status" required>
											<option selected> Select Union Status</option>
											<option value="SAG" <?php if($talents[0]['union_status']=='SAG'){ echo "selected";}?>>SAG</option>
											<option value="SAG Eligible" <?php if($talents[0]['union_status']=='SAG Eligible'){ echo "selected";}?>>SAG Eligible</option>
											<option value="Non Union" <?php if($talents[0]['union_status']=='Non Union'){ echo "selected";}?>>Non Union</option>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                       <select id="agentSelect" class="form-control form-control-select" name="agent" required>
											<option selected> Select Agent</option>
											<option value="Repped" <?php if($talents[0]['agent']=='Repped'){ echo "selected";}?>>Repped</option>
											<option value="Non Repped" <?php if($talents[0]['agent']=='Non Repped'){ echo "selected";}?>>Non Repped</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" id="agentId" name="agent_id">
											<option selected> Select Agent</option>
											<?php foreach($agents as $agent){ ?>
											<option value="<?php echo $agent['id'];?>" <?php if($talents[0]['agent_id']==$agent['id']){ echo "selected";}?>><?php echo $agent['company_name_or_individual_name'];?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
											<select class="form-control form-control-select" name="ethnicity" required>
											<option selected> Select Ethnicity</option>
											<option value="African American" <?php if($talents[0]['ethnicity']=='African American'){ echo "selected";}?>>African American</option>
											<option value="Asian American" <?php if($talents[0]['ethnicity']=='Asian American'){ echo "selected";}?>>Asian American</option>
											<option value="European American" <?php if($talents[0]['ethnicity']=='European American'){ echo "selected";}?>>European American</option>
											<option value="Middle Eastern American" <?php if($talents[0]['ethnicity']=='Middle Eastern American'){ echo "selected";}?>>Middle Eastern American </option>
											<option value="Indian American" <?php if($talents[0]['ethnicity']=='Indian American'){ echo "selected";}?>>Indian American</option>
											<option value="Native American" <?php if($talents[0]['ethnicity']=='Native American'){ echo "selected";}?>>Native American</option>
											<option value="Pacific Islander American" <?php if($talents[0]['ethnicity']=='Pacific Islander American'){ echo "selected";}?>>Pacific Islander American</option>
											<option value="Multiple" <?php if($talents[0]['ethnicity']=='Multiple'){ echo "selected";}?>>Multiple</option>
											<option value="Other" <?php if($talents[0]['ethnicity']=='Other'){ echo "selected";}?>>Other</option>
										</select>
                                    </div>
								</div>
								<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
                                        <div class="form-control form-control-radio">
											 <div class="form-check-inline">
											  <span>Gender</span>
											 </div>
											 <div class="form-check-inline">
											  <label class="form-check-label" for="radio1">
												<input type="radio" <?php if($talents[0]['gender']=='Male'){ echo "checked";}?> class="form-check-input" id="radio1" value="Male" name="gender" required>Male
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="radio2" value="Female" <?php if($talents[0]['gender']=='Female'){ echo "checked";}?> name="gender" required>Female
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" <?php if($talents[0]['gender']=='Female'){ echo "checked";}?> class="form-check-input" id="radio2" value="Others" name="gender" required>Others
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
											foreach ($range as $r) {?>
                                            <option value='<?php echo $r;?>' <?php if($talents[0]['feet']==$r){ echo "selected";}?>><?php echo $r;?>'</option>
											<?php } ?>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Height(Inches)</label>
										<select class="form-control form-control-select" name="inches" required>
										    <option >Select Inches</option>
											<?php $range = range(1,12);
											foreach ($range as $r) {?>
                                                <option value='<?php echo $r;?>' <?php if($talents[0]['inches']==$r){ echo "selected";}?>><?php echo $r;?>''</option>
                                                <?php } ?>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">	
									<label>Clothing Size</label>
										<select class="form-control form-control-select" name="clothing_size_chest" required>
											<option value="Chest">Chest</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
										<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Put chest size" name="clothing_size_chest_inch" value="<?php echo $talents[0]['clothing_size_chest_inch'];?>" required>
                                    </div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">	
									<label>Clothing Size</label>
										<select class="form-control form-control-select" name="clothing_size_bust" required>
											<option value="Bust">Bust</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
										<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Put bust size" name="clothing_size_bust_inch" required value="<?php echo $talents[0]['clothing_size_bust_inch'];?>">
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
										<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Put waist size" name="clothing_size_waist_inch" required value="<?php echo $talents[0]['clothing_size_waist_inch'];?>">
                                    </div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
                                    <?php $talentlanguage = $talents[0]['language_spoke'];$talentlanguage_exp = explode(',', $talentlanguage);?>
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title = "Select Language Spoke" name="language_spoke[]" required>
											<option value="English" <?php foreach($talentlanguage_exp as $te){if($te=='English'){ echo "selected";}}?>>English</option>
											<option value="Spanish" <?php foreach($talentlanguage_exp as $te){if($te=='Spanish'){ echo "selected";}}?>>Spanish</option>
											<option value="Mandarin" <?php foreach($talentlanguage_exp as $te){if($te=='Mandarin'){ echo "selected";}}?>>Mandarin</option>
											<option value="Tagalog" <?php foreach($talentlanguage_exp as $te){if($te=='Tagalog'){ echo "selected";}}?>>Tagalog</option>
											<option value="Vietnamese" <?php foreach($talentlanguage_exp as $te){if($te=='Vietnamese'){ echo "selected";}}?>>Vietnamese</option>
											<option value="Arabic" <?php foreach($talentlanguage_exp as $te){if($te=='Arabic'){ echo "selected";}}?>>Arabic</option>
											<option value="French" <?php foreach($talentlanguage_exp as $te){if($te=='French'){ echo "selected";}}?>>French</option>
											<option value="Korean" <?php foreach($talentlanguage_exp as $te){if($te=='Korean'){ echo "selected";}}?>>Korean</option>
											<option value="Russian" <?php foreach($talentlanguage_exp as $te){if($te=='Russian'){ echo "selected";}}?>>Russian</option>
											<option value="German" <?php foreach($talentlanguage_exp as $te){if($te=='German'){ echo "selected";}}?>>German</option>
											<option value="Haitian Creole" <?php foreach($talentlanguage_exp as $te){if($te=='Haitian Creole'){ echo "selected";}}?>>Haitian Creole</option>
											<option value="Hindi" <?php foreach($talentlanguage_exp as $te){if($te=='Hindi'){ echo "selected";}}?>>Hindi</option>
											<option value="Portuguese" <?php foreach($talentlanguage_exp as $te){if($te=='Portuguese'){ echo "selected";}}?>>Portuguese</option>
											<option value="Italian" <?php foreach($talentlanguage_exp as $te){if($te=='Italian'){ echo "selected";}}?>>Italian</option>
											<option value="Polish" <?php foreach($talentlanguage_exp as $te){if($te=='Polish'){ echo "selected";}}?>>Polish</option>
											<option value="Yiddish" <?php foreach($talentlanguage_exp as $te){if($te=='Yiddish'){ echo "selected";}}?>>Yiddish</option>
											<option value="Japanese" <?php foreach($talentlanguage_exp as $te){if($te=='Japanese'){ echo "selected";}}?>>Japanese</option>
											<option value="Persian" <?php foreach($talentlanguage_exp as $te){if($te=='Persian'){ echo "selected";}}?>>Persian</option> 
											<option value="Gujarati" <?php foreach($talentlanguage_exp as $te){if($te=='Gujarati'){ echo "selected";}}?>>Gujarati</option>
											<option value="Telugu" <?php foreach($talentlanguage_exp as $te){if($te=='Telugu'){ echo "selected";}}?>>Telugu</option>
										</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="form-control form-control-selectAll">
                                    <?php $talentaccents = $talents[0]['accents'];$talentaccents_exp = explode(',', $talentaccents);?>
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title = "Select Accents" name="accents[]" required>
											<option value="English" <?php foreach($talentaccents_exp as $te){if($te=='English'){ echo "selected";}}?>>English</option>
											<option value="Scottish" <?php foreach($talentaccents_exp as $te){if($te=='Scottish'){ echo "selected";}}?>>Scottish</option>
											<option value="Welsh" <?php foreach($talentaccents_exp as $te){if($te=='Welsh'){ echo "selected";}}?>>Welsh</option>
											<option value="Irish" <?php foreach($talentaccents_exp as $te){if($te=='Irish'){ echo "selected";}}?>>Irish</option>
											<option value="Australian" <?php foreach($talentaccents_exp as $te){if($te=='Australian'){ echo "selected";}}?>>Australian</option>
											<option value="Canadian" <?php foreach($talentaccents_exp as $te){if($te=='Canadian'){ echo "selected";}}?>>Canadian</option>
											<option value="Mid-western" <?php foreach($talentaccents_exp as $te){if($te=='Mid-western'){ echo "selected";}}?>>Mid-western</option>
											<option value="Southern" <?php foreach($talentaccents_exp as $te){if($te=='Southern'){ echo "selected";}}?>>Southern</option>
											<option value="New York" <?php foreach($talentaccents_exp as $te){if($te=='New York'){ echo "selected";}}?>>New York</option>
											<option value="Boston" <?php foreach($talentaccents_exp as $te){if($te=='Boston'){ echo "selected";}}?>>Boston</option>
											<option value="Standard American" <?php foreach($talentaccents_exp as $te){if($te=='Standard American'){ echo "selected";}}?>>Standard American</option>
											<option value="Other" <?php foreach($talentaccents_exp as $te){if($te=='Other'){ echo "selected";}}?>>Other</option>
										</select>
                                    </div>
                                </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
                                    <?php $talenttraining = $talents[0]['training'];$talenttraining_exp = explode(',', $talenttraining);?>
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title=" Select Training" name="training[]" required>
											<option value="Method Acting" <?php foreach($talenttraining_exp as $te){if($te=='Method Acting'){ echo "selected";}}?>>Method Acting </option>
											<option value="Meisner Technique" <?php foreach($talenttraining_exp as $te){if($te=='Meisner Technique'){ echo "selected";}}?>>Meisner Technique</option>
											<option value="Stella Adler" <?php foreach($talenttraining_exp as $te){if($te=='Stella Adler'){ echo "selected";}}?>>Stella Adler </option>
											<option value="Improv" <?php foreach($talenttraining_exp as $te){if($te=='Improv'){ echo "selected";}}?>>Improv </option>
											<option value="Comedy" <?php foreach($talenttraining_exp as $te){if($te=='Comedy'){ echo "selected";}}?>>Comedy </option>
											<option value="Cold Reading" <?php foreach($talenttraining_exp as $te){if($te=='Cold Reading'){ echo "selected";}}?>>Cold Reading </option>
											<option value="None" <?php foreach($talenttraining_exp as $te){if($te=='None'){ echo "selected";}}?>>None</option>
										</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
                                    <?php $talentathletics = $talents[0]['athletics'];$talentathletics_exp = explode(',', $talentathletics);?>
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Athletics" name="athletics[]" required>
											<option value="Track and field" <?php foreach($talentathletics_exp as $te){if($te=='Track and field'){ echo "selected";}}?>>Track and field </option>
											<option value="Road running" <?php foreach($talentathletics_exp as $te){if($te=='Road running'){ echo "selected";}}?>>Road running</option>
											<option value="Cross country running" <?php foreach($talentathletics_exp as $te){if($te=='Cross country running'){ echo "selected";}}?>>Cross country running </option>
											<option value="Race walking" <?php foreach($talentathletics_exp as $te){if($te=='Race walking'){ echo "selected";}}?>>Race walking </option>
											<option value="None" <?php foreach($talentathletics_exp as $te){if($te=='None'){ echo "selected";}}?>>None</option>
										</select>
									</div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
                                    <?php $talentsinging = $talents[0]['singing'];$talentsinging_exp = explode(',', $talentsinging);?>
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title = "Select Singing" name="singing[]" required>
											<option value="Soprano" <?php foreach($talentsinging_exp as $te){if($te=='Soprano'){ echo "selected";}}?>>Soprano</option>
											<option value="Mezzo-soprano" <?php foreach($talentsinging_exp as $te){if($te=='Mezzo-soprano'){ echo "selected";}}?>>Mezzo-soprano</option>
											<option value="Contralto" <?php foreach($talentsinging_exp as $te){if($te=='Contralto'){ echo "selected";}}?>>Contralto</option>
											<option value="Countertenor" <?php foreach($talentsinging_exp as $te){if($te=='Countertenor'){ echo "selected";}}?>>Countertenor</option>
											<option value="Tenor" <?php foreach($talentsinging_exp as $te){if($te=='Tenor'){ echo "selected";}}?>>Tenor</option>
											<option value="Baritone" <?php foreach($talentsinging_exp as $te){if($te=='Baritone'){ echo "selected";}}?>>Baritone</option>
											<option value="Bass" <?php foreach($talentsinging_exp as $te){if($te=='Bass'){ echo "selected";}}?>>Bass</option>
											<option value="Treble" <?php foreach($talentsinging_exp as $te){if($te=='Treble'){ echo "selected";}}?>>Treble</option>
											<option value="None" <?php foreach($talentsinging_exp as $te){if($te=='None'){ echo "selected";}}?>>None</option>
										</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
                                    <?php $talentdancing = $talents[0]['dancing'];$talentdancing_exp = explode(',', $talentdancing);?>
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Dancing" name="dancing[]" required>
											<option value="Ballet" <?php foreach($talentdancing_exp as $te){if($te=='Ballet'){ echo "selected";}}?>>Ballet</option>
											<option value="Ballroom" <?php foreach($talentdancing_exp as $te){if($te=='Ballroom'){ echo "selected";}}?>>Ballroom</option>
											<option value="Contemporary" <?php foreach($talentdancing_exp as $te){if($te=='Contemporary'){ echo "selected";}}?>>Contemporary</option>
											<option value="Hip Hop" <?php foreach($talentdancing_exp as $te){if($te=='Hip Hop'){ echo "selected";}}?>>Hip Hop</option>
											<option value="Tap" <?php foreach($talentdancing_exp as $te){if($te=='Tap'){ echo "selected";}}?>>Tap</option>
											<option value="Folk" <?php foreach($talentdancing_exp as $te){if($te=='Folk'){ echo "selected";}}?>>Folk</option>
											<option value="Irish" <?php foreach($talentdancing_exp as $te){if($te=='Irish'){ echo "selected";}}?>>Irish</option>
											<option value="None" <?php foreach($talentdancing_exp as $te){if($te=='None'){ echo "selected";}}?>>None</option>
										</select>
                                    </div>
									</div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
                                    <?php $talendriving_experience = $talents[0]['driving_experience'];$talendriving_experience_exp = explode(',', $talendriving_experience);?>
											<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Driving Experience" name="driving_experience[]" required>
												<option value="Personal vehicle license" <?php foreach($talendriving_experience_exp as $te){if($te=='Personal vehicle license'){ echo "selected";}}?>>Personal vehicle license </option>
												<option value="Motocycle Endorsement" <?php foreach($talendriving_experience_exp as $te){if($te=='"Motocycle Endorsement'){ echo "selected";}}?>>Motocycle Endorsement</option>
												<option value="Other" <?php foreach($talendriving_experience_exp as $te){if($te=='Other'){ echo "selected";}}?>>Other</option>
												<option value="None" <?php foreach($talendriving_experience_exp as $te){if($te=='None'){ echo "selected";}}?>>None</option>
											</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" id="selectCitizen" name="citizenship_or_visa_documents" required>
											<option> Select Citizenship or visa documents</option>
											<option value="American Passport" <?php if($talents[0]['citizenship_or_visa_documents']=='American Passport'){ echo "selected";}?>>American Passport</option>
											<option value="Work Visa" <?php if($talents[0]['citizenship_or_visa_documents']=='Work Visa'){ echo "selected";}?>>Work Visa</option>
											<option value="Other Passport" <?php if($talents[0]['citizenship_or_visa_documents']=='Other Passport'){ echo "selected";}?>>Other Passport</option>
										</select>
                                    </div>  
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-date" id="exampleFirstName" placeholder="Email" value="<?php echo $talents[0]['email'];?>" name="email" required>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="otherDetails" placeholder="If other passport" name="citizenship_or_visa_documents_other" value="<?php echo $talents[0]['citizenship_or_visa_documents_other'];?>">
                                    </div>  
                                </div>
								<input type="hidden" name="citizenship_or_visa_documents_other" value="" id="otherDetailsblank">
								<!-- <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <div class="form-control form-control-file">
										<span>Headshot Upload</span>
                                        <input type="file" class="" id="exampleFirstName" name="Headshot_upload" value="<?php echo $talents[0]['Headshot_upload'];?>"/>
                                    </div>
                                    </div>   
                                </div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
										<div class="form-control form-control-file">
										<span>Reel Upload</span>
                                        	<input type="file" class="" id="exampleFirstName" name="reel_upload" value="<?php echo $talents[0]['reel_upload'];?>"/>
                                    	</div>
                                    </div>   
                                </div> -->
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Social Media Link For Instagram " name="social_media_link_instagram" value="<?php echo $talents[0]['social_media_link_instagram'];?>">
									</div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Social Media Link For tik tok " name="social_media_link_tik_tok" value="<?php echo $talents[0]['social_media_link_tik_tok'];?>">
									</div>
                                </div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Contact No" name="contact_info" required value="<?php echo $talents[0]['contact_info'];?>">
                                    </div>
                                </div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										 <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name = "password" required value="<?php echo $talents[0]['password'];?>"> 
									</div>
                                    <div class="col-sm-6">
										 <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name = "password1" required value="<?php echo $talents[0]['password'];?>">
									</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">   
                                    <lable>Headshot Upload</lable>
                                    <?php if($talents[0]['Headshot_upload']!=""){?>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?php echo base_url();?><?php echo $talents[0]['Headshot_upload'];?>" allowfullscreen></iframe>
                                    </div><div class="form-control form-control-file"><span>Update Headshot</span>
                                            <input type="file" name="Headshot_upload">
                                        </div>
                                    <?php } else {?>
                                        <div class="form-control form-control-file"><span>Headshot Upload</span>
                                            <input type="file" name="Headshot_upload">
                                        </div>
                                    <?php } ?>
                                    </div>  
                                    <div class="col-sm-6 mb-3 mb-sm-0"> 
                                    <lable>Reel Upload</lable>
                                    <?php if($talents[0]['reel_upload']!=""){?>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?php echo base_url();?><?php echo $talents[0]['reel_upload'];?>" allowfullscreen></iframe>
                                    </div><div class="form-control form-control-file"><span>Update Reel</span>
                                            <input type="file" name="reel_upload">
                                        </div>
                                    <?php } else {?>
                                        <div class="form-control form-control-file"><span>Reel Upload</span>
                                            <input type="file" name="reel_upload">
                                        </div>
                                    <?php } ?>
                                    </div>   
                                </div>
								<div class="form-group row">
                                <div class="col-sm-4 text-center"></div>
								<div class="col-sm-4 text-center">
									<input type="submit" class="btn btn-primary btn-user btn-block" value="Update"></a>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>	
                            </form>
                        </div>
                    </div>
                </div>
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
		});
	</script>
