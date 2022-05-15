<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    function checkDelete(id) {
        if(confirm("Sure ! Are you want to delete ?")){
            $("#loader").show();
            $.ajax({
                      url: "<?php echo base_url().'castingDirector/director/';?>delete_project?id="+id,
                      success: function(result) {
                                //alert('result');
                                $("#loader").hide();
                                location.reload();
                      }
            });
        }
    }

	function view_project_by_id(id)
	{
		$.ajax({
					type: "POST",
					url: "<?php echo base_url().'castingDirector/director/';?>view_project_by_id",
					data: "id="+id,
					success: function(response) {
						datos = jQuery.parseJSON(response);
                    	document.getElementById('project_name').value = datos[0]['project_name'];
						document.getElementById('optional_shoot_date').value = datos[0]['optional_shoot_dates'];
						document.getElementById('optional_audition_date').value = datos[0]['optional_audition_dates'];
						document.getElementById('project_descriptions').value = datos[0]['project_description'];
						document.getElementById('current_conflicts').value = datos[0]['current_conflicts'];
						document.getElementById('self_tape').value = datos[0]['self_tape'];
						document.getElementById('cutt_off_time').value = datos[0]['cutt_off_time'];
						document.getElementById('self_tape_instruction').value = datos[0]['self_tape_instruction'];
						document.getElementById('physical_or_digital').value = datos[0]['physical_or_digital'];
						document.getElementById('audition_length').value = datos[0]['audition_length'];

						document.getElementById('audition_window').value = datos[0]['audition_window'];
						document.getElementById('specific_sides_upload').value = datos[0]['specific_sides_upload'];
						document.getElementById('project_wide_geographic_area').value = datos[0]['project_wide_geographic_area'];
						document.getElementById('shoot_location_update').value = datos[0]['shoot_location'];
						document.getElementById('audition_location_update').value = datos[0]['audition_location'];
						document.getElementById('project_id').value = datos[0]['id'];
					}
				});
	}
</script>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 pageTitle">Project Listing</h1>
</div>
<?php if($this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
	?>
	<div class="<?php echo $message['class'] ?>"><?php echo $message['message'];?>
	</div>
<?php } ?>
<div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Project Name </th>
                                            <th>Optional Shoot Dates</th>
                                            <th>Project wide conflicts </th>
                                            <!-- <th>Mobile No.</th> -->
                                            <th>Create role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($projects as $project){?>
                                        <tr>
                                            <td><?php echo $project['project_name'];?></td>
                                            <td><?php echo $project['optional_shoot_dates'];?></td>
                                            <td><?php echo $project['current_conflicts'];?></td>
                                            <!-- <td><?php echo $project['self_tape'];?></td> -->
                                            <td><a href="#" data-toggle="modal" data-target="#myModalCreateRole" onclick="javascript:load_marks(<?php echo $project['id']; ?>)">Create role</a></td>
                                            <td>
											    <a href="<?php echo base_url();?>castingDirector/director/view_project?id=<?php echo $project['id'];?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
											    <a href="#" data-toggle="modal" onclick="javascript:view_project_by_id(<?php echo $project['id']; ?>)" data-target="#myModaledit" class="btn btn-success"><i class="fas fa-edit"></i></a>
												<a href="#" onclick="checkDelete(<?php echo $project['id']; ?>)" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
											</td>
                                        </tr>
										<?php } ?>										
                                    </tbody>
                                </table>
								<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModalAdd">Create Project</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- The Modal View -->
			  <div class="modal fade" id="myModalAdd">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Add Project</h4>
					  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
						<form action ="<?php echo base_url();?>castingDirector/director/create_project" method="post" class="user">
							<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Project Name" name="project_name" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<div class="form-group">
										<textarea class="form-control form-control-user" id="project_description" placeholder="Project Description" name="project_description" rows="3" required></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Shoot Dates" name="optional_shoot_dates[]" id="optional_shoot_dates" autocomplete="off">
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Shoot Location" name="shoot_location" id="shoot_location" autocomplete="off">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Audition Dates" name="optional_audition_dates[]" id="optional_audition_dates" autocomplete="off">
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Audition Location" name="audition_location" id="audition_location" autocomplete="off">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<select class="form-control form-control-select" name="current_conflicts" required>
										<option selected> Select Current Conflicts</option>
										<option value="Contractual">Contractual</option>
										<option value="Such as tech">Such as tech</option>
										<option value="Car commercials">Car commercials</option>
									</select>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Self Tape Request" name="self_tape" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Cut off time for self-tape submissions" name="cutt_off_time" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Self-tape instructions" name="self_tape_instruction" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Physical or Digital casting location" name="physical_or_digital" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition Length" name="audition_length" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition window (potential days)" name="audition_window" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition specific sides upload (optional)" name="specific_sides_upload" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Project wide geographic area" name="project_wide_geographic_area" required>
								</div>
								<!-- <div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder = "Application Closer Date" onfocus="(this.type='date')" name="closure_date" required>
								</div> -->
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Submit">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();">Close</button>
							</div>
						</form>
					</div>
				  </div>
				</div>
			  </div>
              <!-- The Modal View for create role -->
			  <div class="modal fade" id="myModalCreateRole">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Create Project Role</h4>
					  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
                    <form class="user" action ="<?php echo base_url();?>castingDirector/director/create_role" method="post">
								<input type="hidden" value="" name="project_id" id="id_field">
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
									<label>Role Name</label>
										<input id="roles_name" type="text" class="form-control form-control-user" placeholder="Role Name" name="roles_name" required>
                                    </div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
									<label>Role Description</label>
										<textarea class="form-control form-control-user" id="project_description" placeholder="Role Description" name="role_description" rows="3" required></textarea>
                                    </div>  
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Roles Type</label>
                                    <select class="form-control form-control-select" name="roles_type" required>
										<option selected> Select Roles Type</option>
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
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Union Status</label>
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
                                    <input id="agentId" type="text" class="form-control form-control-user"
                                            placeholder="Agent Contact Info" name="agent_info" required>
                                    </div>  
                                </div> -->
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Age Range</label>
										<select class="form-control form-control-select" name="age_range" required>
										    <option>Select Age Range</option>
											<option value="10-15">10-15</option>
											<option value="16-20">16-20</option>
											<option value="21-25">21-25</option>
											<option value="26-30">26-30</option>
											<option value="31-35">31-35</option>
											<option value="36-40">36-40</option>
											<option value="41-45">41-45</option>
											<option value="46-50">46-50</option>
											<option value="51-55">51-55</option>
											<option value="56-60">56-60</option>
											<option value="61-65">61-65</option>
											<option value="66-70">66-70</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Role specific location</label>
                                    <input id="agentId" type="text" class="form-control form-control-user"
                                            placeholder="Role specific location" name="role_specific_loacation" required>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Ethnicity</label>
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
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Gender</label>
                                        <div class="form-control form-control-radio">
											<div class="form-check-inline">
											<span>Gender</span>
											</div>
											<div class="form-check-inline">
												<label class="form-check-label" for="radio1">
													<input type="radio" class="form-check-input" id="radio1" name="gender" required value="Male" checked>Male
												</label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="radio2" name="gender" required value="Female">Female
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" name="gender" required value="Others">Others
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
										<select class="form-control form-control-select" name="clothing_size_chest" required>
											<option value="Chest">Chest</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
									    <select class="form-control form-control-select" name="clothing_size_chest_inch" required>
										    <option >Select chest size</option>
											<?php $range = range(1,100);
											foreach ($range as $cm) {
											echo "<option value='$cm'>$cm inch</option>";
											}?>
										</select>
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
									    <select class="form-control form-control-select" name="clothing_size_bust_inch" required>
										<option >Select bust size</option>
											<?php $range = range(1,100);
											foreach ($range as $cm) {
											echo "<option value='$cm'>$cm inch</option>";
											}?>
										</select>
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
									    <select class="form-control form-control-select" name="clothing_size_waist_inch" required>
										<option >Select waist size</option>
											<?php $range = range(1,100);
											foreach ($range as $cm) {
											echo "<option value='$cm'>$cm inch</option>";
											}?>
										</select>
                                    </div> 
                                </div>
								<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<label>Select Language Spoke</label>
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Language Spoke" name="language_spoke[]" required>
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
									<label>Select Accents</label>
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Accents" name="accents[]" required>
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
                                </div>
								<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<label>Select Training</label>
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Training" name="training[]" required>
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
									<label>Select Athletics</label>
										<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Athletics" name="athletics[]" required>
											<option value="Track and field">Track and field </option>
											<option value="Road running">Road running</option>
											<option value="Cross country running">Cross country running </option>
											<option value="Race walking">Race walking </option>
											<option value="None">None</option>
										</select>
                                    </div>
									</div>
                                </div>
								<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<label>Select Singing</label>
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select selectpicker" multiple data-live-search="true" title="Select Singing" name="singing[]" required>
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
									<label>Select Dancing</label>
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
									<label>Select Driving Experience</label>
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
									<label>Select Citizenship or visa documents</label>
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select" id="selectCitizen" name="citizenship_or_visa_documents" title="Select Citizenship or visa documents" required>
											<option value="American Passport">American Passport</option>
											<option value="Work Visa">Work Visa</option>
											<option value="Other Passport">Other Passport</option>
										</select>
                                    </div>
									</div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<label>Other</label>
										<select class="form-control form-control-select" name="other_upload" required>
											<option selected> Other</option>
											<option value="Sides upload">Sides upload</option>
											<option value="Role specific self tape submission deadline (optional)">Role specific self tape submission deadline (optional)</option>
											<option value="Role specific self tape instructions">Role specific self tape instructions </option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Agent</label>
                                        <select id="agentSelect" class="form-control form-control-select" name="agent" required>
											<option selected> Select Agent</option>
											<option value="Repped">Repped</option>
											<option value="Non Repped">Non Repped</option>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									<label>Self tape Submission Deadline</label>
										<input id="self_tape_deadline" type="datetime-local" class="form-control form-control-user" placeholder="Self tape Submission Deadline" name="self_tape_deadline" required>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Put Payment Details</label>
                                    	<input id="paymen_details" type="text" class="form-control form-control-user" placeholder="Put Payment Details" name="paymen_details" required>
                                    </div>
                                </div>
								<!-- Modal footer -->
								<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Submit">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();">Close</button>
								</div>
							</form>
						</div>
					</div>
					</div>
				</div>


				<!-- The Modal View -->
			  <div class="modal fade" id="myModaledit">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Edit Project</h4>
					  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
						<form action ="<?php echo base_url();?>castingDirector/director/edit_project" method="post" class="user">
						<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" placeholder="Project Name" id="project_name" name="project_name" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<div class="form-group">
										<textarea class="form-control form-control-user" placeholder="Project Description" name="project_description" rows="3" required id="project_descriptions"></textarea>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Shoot Dates" name="optional_shoot_dates[]" id="optional_shoot_date" autocomplete="off">
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Shoot Location" name="shoot_location" id="shoot_location_update" autocomplete="off">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Audition Dates" name="optional_audition_dates[]" id="optional_audition_date" autocomplete="off">
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control date form-control-user" placeholder="Audition Location" name="audition_location" id="audition_location_update" autocomplete="off">
								</div>
							</div>
							<input type="hidden" name="project_id" id="project_id">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<select class="form-control form-control-select" name="current_conflicts" required id="current_conflicts">
										<option selected> Select Current Conflicts</option>
										<option value="Contractual">Contractual</option>
										<option value="Such as tech">Such as tech</option>
										<option value="Car commercials">Car commercials</option>
									</select>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" id="self_tape" placeholder="Self Tape Request" name="self_tape" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="cutt_off_time" placeholder="Cut off time for self-tape submissions" name="cutt_off_time" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="self_tape_instruction" placeholder="Self-tape instructions" name="self_tape_instruction" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="physical_or_digital" placeholder="Physical or Digital casting location" name="physical_or_digital" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="audition_length" placeholder="Audition Length" name="audition_length" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="audition_window" placeholder="Audition window (potential days)" name="audition_window" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="specific_sides_upload" placeholder="Audition specific sides upload (optional)" name="specific_sides_upload" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="project_wide_geographic_area" placeholder="Project wide geographic area" name="project_wide_geographic_area" required>
								</div>
								<!-- <div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="closure_date" placeholder = "Closer Date" onfocus="(this.type='date')" name="closure_date" required>
								</div> -->
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Submit">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();">Close</button>
							</div>
						</form>
					</div>
				  </div>
				</div>
			  </div>


<script type="text/javascript">
function load_marks(id)
	{
		$.ajax({
				type: "POST",
				data: "id="+id,
				success: function (response) {	
					//$("#id_field").val()=id;
					document.getElementById ("id_field").value = id;
				}
			});
	}
</script>
<script type="text/javascript">
    $('#optional_shoot_dates').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
		multidate:true,
    });
    $('#datepicker').datepicker("setDate", new Date());

	$('#optional_audition_dates').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
		multidate:true,
    });
    $('#datepicker').datepicker("setDate", new Date());

	$('#optional_shoot_date').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
		multidate:true,
    });
    $('#datepicker').datepicker("setDate", new Date());

	$('#optional_audition_date').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
		multidate:true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>