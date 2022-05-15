<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<script type="text/javascript">
//$('select').selectpicker('refresh');
    function checkDelete(id) {
        if(confirm("Sure ! Are you want to delete ?")){
            $("#loader").show();
            $.ajax({
                      url: "<?php echo base_url().'castingDirector/director/';?>delete_role?id="+id,
                      success: function(result) {
                                //alert('result');
                                $("#loader").hide();
                                location.reload();
                      }
            });
        }
    }

function view_role_by_id(id)
	{
		$.ajax({
					type: "POST",
					url: "<?php echo base_url().'castingDirector/director/';?>view_project_role_by_id",
					data: "id="+id,
					success: function(response) {
						datos = jQuery.parseJSON(response);
						document.getElementById('project_id').value = datos[0]['project_id'];
						document.getElementById('role_id').value = datos[0]['id'];
                    	document.getElementById('roles_name').value = datos[0]['roles_name'];
						document.getElementById('union_status').value = datos[0]['union_status'];
						document.getElementById('agent').value = datos[0]['agent'];
						document.getElementById('age_range').value = datos[0]['age_range'];

						document.getElementById('self_tape_deadline').value = datos[0]['self_tape_deadline'];
						document.getElementById('paymen_details').value = datos[0]['paymen_details'];

						document.getElementById('roles_type').value = datos[0]['roles_type'];
						document.getElementById('role_description').value = datos[0]['role_description'];
						
						document.getElementById('role_specific_loacation').value = datos[0]['role_specific_loacation'];
						document.getElementById('ethnicity').value = datos[0]['ethnicity'];
						document.getElementById('gender').value = datos[0]['gender'];
						document.getElementById('feet').value = datos[0]['feet'];

						document.getElementById('inches').value = datos[0]['inches'];
						document.getElementById('clothing_size_chest').value = datos[0]['clothing_size_chest'];
						document.getElementById('clothing_size_chest_inch').value = datos[0]['clothing_size_chest_inch'];
						document.getElementById('clothing_size_bust').value = datos[0]['clothing_size_bust'];
						document.getElementById('clothing_size_bust_inch').value = datos[0]['clothing_size_bust_inch'];

                        document.getElementById('clothing_size_waist').value = datos[0]['clothing_size_waist'];
						document.getElementById('clothing_size_waist_inch').value = datos[0]['clothing_size_waist_inch'];
                        var sta = datos[0]['language_spoke'];
                        $.each(sta.split(","), function(i,e){
                            $("#language_spoke option[value='" + e + "']").prop("selected", "selected");
                        });
                        
                        var sta1= datos[0]['tranning'];
                        $.each(sta1.split(","), function(i,e){
                            $("#training option[value='" + e + "']").prop("selected", true);
                        });

                        var sta2= datos[0]['athletics'];
                        $.each(sta2.split(","), function(i,e){
                            $("#athletics option[value='" + e + "']").prop("selected", true);
                        });

                        var sta3= datos[0]['singing'];
                        $.each(sta3.split(","), function(i,e){
                            $("#singing option[value='" + e + "']").prop("selected", true);
                        });

                        var sta4= datos[0]['dancing'];
                        $.each(sta4.split(","), function(i,e){
                            $("#dancing option[value='" + e + "']").prop("selected", true);
                        });

                        var sta5= datos[0]['driving_license'];
                        $.each(sta5.split(","), function(i,e){
                            $("#driving_experience option[value='" + e + "']").prop("selected", true);
                        });
						var sta6= datos[0]['accents'];
                        $.each(sta6.split(","), function(i,e){
                            $("#accents option[value='" + e + "']").prop("selected", true);
                        });
                        $('.languageSpoke .filter-option-inner-inner').text(sta);
                        $('.training .filter-option-inner-inner').text(sta1);
                        $('.athletics .filter-option-inner-inner').text(sta2);
                        $('.singing .filter-option-inner-inner').text(sta3);
                        $('.dancing .filter-option-inner-inner').text(sta4);
                        $('.driving_experience .filter-option-inner-inner').text(sta5);
						$('.accents .filter-option-inner-inner').text(sta6);
						document.getElementById('citizenship_or_visa_documents').value = datos[0]['citizenship_or_visa_documents'];
                        document.getElementById('other_upload').value = datos[0]['other_upload'];
					}
				});
	}
</script>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">View Project</h1>
    </div>
    <?php if($this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
	?>
	<div class="<?php echo $message['class'] ?>"><?php echo $message['message'];?>
	</div>
    <?php } ?>
    <div class="card shadow mb-4">
    <div class="card-body">
    <form class="user">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                <lable>Project name</lable>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Project Name" name="project_name" value="<?php echo $project[0]['project_name'];?>">
                </div>
            </div>
			<div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                <lable>Project description</lable>
				<div class="form-group">
					<textarea class="form-control form-control-user" id="project_description" placeholder="Project Description" name="project_description" rows="3" required><?php echo $project[0]['project_description'];?></textarea>
				</div>
                </div>
            </div>
			<div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Optional shoot date</lable>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Project Name" name="project_name" value="<?php echo $project[0]['optional_shoot_dates'];?>">
                </div>
				<div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Shoot Location</lable>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Project Name" name="project_name" value="<?php echo $project[0]['shoot_location'];?>">
                </div>
            </div>
			<div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Optional audition date</lable>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Project Name" name="project_name" value="<?php echo $project[0]['optional_audition_dates'];?>">
                </div>
				<div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Audition Location</lable>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Project Name" name="project_name" value="<?php echo $project[0]['audition_location'];?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Current conflicts</lable>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php echo $project[0]['current_conflicts'];?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Self tape request</lable>
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Self Tape Request" value="<?php echo $project[0]['self_tape'];?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Cut off time for self-tape submissions</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Cut off time for self-tape submissions" value="<?php echo $project[0]['cutt_off_time'];?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Self-tape instructions</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Self-tape instructions" value="<?php echo $project[0]['self_tape_instruction'];?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Self tape request</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Physical or Digital casting location" value="<?php echo $project[0]['physical_or_digital'];?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Audition length</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition Length" value="<?php echo $project[0]['audition_length'];?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Audition window (potential days)</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition window (potential days)" value="<?php echo $project[0]['audition_window'];?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Audition specific sides upload (optional)</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition specific sides upload (optional)" value="<?php echo $project[0]['specific_sides_upload'];?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Project wide geographic area</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Project wide geographic area" value="<?php echo $project[0]['project_wide_geographic_area'];?>">
                </div>
				<!-- <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Application closer date</lable>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Project wide geographic area" value="<?php echo $project[0]['closure_date'];?>">
                </div> -->
            </div>
        </form>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">Related Role</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>roles_name</th>
                                            <th>union_status</th>
                                            <th>agent</th>
                                            <th>agent_info</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($roles as $role){?>
                                        <tr>
                                            <td><?php echo $role['roles_name'];?></td>
                                            <td><?php echo $role['union_status'];?></td>
                                            <td><?php echo $role['agent'];?></td>
                                            <td><?php echo $role['age_range'];?></td>
                                            <td>
                                                <a href="<?php echo base_url();?>castingDirector/director/view_project_role?id=<?php echo $role['id'];?>&project_id=<?php echo $this->input->get('id');?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
											    <a href="#" data-toggle="modal" onclick="javascript:view_role_by_id(<?php echo $role['id'];?>)" data-target="#myModaledit" class="btn btn-success"><i class="fas fa-edit"></i></a>
												<a href="#" onclick="checkDelete(<?php echo $role['id']; ?>)" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
											</td>
                                        </tr>
                                        <?php } ?> 										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- The Modal View for create role -->
			  <div class="modal fade" id="myModaledit">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Edit Project Role</h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
                    <form class="user" action ="<?php echo base_url();?>castingDirector/director/update_role" method="post">
								<input type="hidden" name="project_id" id="project_id">
								<input type="hidden" name="role_id" id="role_id">
								<div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
										<input id="roles_name" type="text" class="form-control form-control-user" placeholder="Role Name" name="roles_name" required>
                                    </div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12 mb-3 mb-sm-0">
										<textarea class="form-control form-control-user" id="role_description" placeholder="Role Description" name="role_description" rows="3" required></textarea>
                                    </div>  
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control form-control-select" id="roles_type" name="roles_type" required>
										<option selected> Select Talent Roles</option>
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
                                        <select class="form-control form-control-select" name="union_status" id="union_status" required>
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
										<select class="form-control form-control-select" id="age_range" name="age_range" required>
										    <option>Select Age</option>
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
                                    <input type="text" class="form-control form-control-user"
                                            placeholder="Role specific location" id="role_specific_loacation" name="role_specific_loacation" required>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" id="ethnicity" name="ethnicity" required>
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
                                        <div class="form-control form-control-radio">
											<div class="form-check-inline">
											<span>Gender</span>
											</div>
											<div class="form-check-inline">
												<label class="form-check-label" for="radio1">
													<input type="radio" class="form-check-input" id="gender" name="gender" required value="Male" checked>Male
												</label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="gender" name="gender" required value="Female">Female
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label" for="radio2">
												<input type="radio" class="form-check-input" id="gender" name="gender" required value="Others">Others
											  </label>
											</div>
										</div>	
                                    </div> 
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">	
									<label>Height(Feet)</label>
										<select class="form-control form-control-select" id="feet" name="feet" required>
										    <option >Select Feet</option>
											<?php $range = range(1,10);
											foreach ($range as $r) {
											echo "<option value='$r'>$r'</option>";
											}?>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Height(Inches)</label>
										<select class="form-control form-control-select" id="inches" name="inches" required>
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
										<select class="form-control form-control-select" name="clothing_size_chest" id="clothing_size_chest" required>
											<option value="Chest">Chest</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
									    <select class="form-control form-control-select" name="clothing_size_chest_inch" id="clothing_size_chest_inch" required>
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
										<select class="form-control form-control-select" name="clothing_size_bust" id="clothing_size_bust" required>
											<option value="Bust">Bust</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
									    <select class="form-control form-control-select" name="clothing_size_bust_inch" id="clothing_size_bust_inch" required>
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
										<select class="form-control form-control-select" name="clothing_size_waist" id="clothing_size_waist" required>
											<option value="Waist">Waist</option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<label>Select Inches</label>
									    <select class="form-control form-control-select" name="clothing_size_waist_inch" id="clothing_size_waist_inch" required>
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
									<div class="form-control form-control-selectAll">
										<select class="form-control languageSpoke form-control-select selectpicker" multiple data-live-search="true" id="language_spoke" name="language_spoke[]" required>
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
									<div class="form-control form-control-selectAll">
									<select class="form-control accents form-control-select selectpicker" multiple data-live-search="true" id="accents" title="Select Accents" name="accents[]" required>
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
									<div class="form-control form-control-selectAll">
										<select class="form-control training form-control-select selectpicker" multiple data-live-search="true" title="Select Training" name="training[]" id="training" required>
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
										<select class="form-control athletics form-control-select selectpicker" multiple data-live-search="true" title="Select Athletics" name="athletics[]" id="athletics" required>
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
									<div class="form-control form-control-selectAll">
										<select class="form-control singing form-control-select selectpicker" multiple data-live-search="true" title="Select Singing" name="singing[]" id="singing" required>
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
										<select class="form-control dancing form-control-select selectpicker" multiple data-live-search="true" id="dancing" title="Select Dancing" name="dancing[]" required>
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
										<select class="form-control driving_experience form-control-select selectpicker" multiple data-live-search="true" id="driving_experience" title="Select Driving Experience" name="driving_experience[]" required>
											<option value="Personal vehicle license">Personal vehicle license </option>
											<option value="Motocycle Endorsement">Motocycle Endorsement</option>
											<option value="Other">Other</option>
											<option value="None">None</option>
										</select>
									</div>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-control form-control-selectAll">
										<select class="form-control form-control-select" id="citizenship_or_visa_documents" name="citizenship_or_visa_documents" title="Select Citizenship or visa documents" required>
											<option value="American Passport">American Passport</option>
											<option value="Work Visa">Work Visa</option>
											<option value="Other Passport">Other Passport</option>
										</select>
                                    </div>
									</div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control form-control-select" name="other_upload" id="other_upload" required>
											<option selected> Other</option>
											<option value="Sides upload">Sides upload</option>
											<option value="Role specific self tape submission deadline (optional)">Role specific self tape submission deadline (optional)</option>
											<option value="Role specific self tape instructions">Role specific self tape instructions </option>
										</select>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
                                        <select id="agent" class="form-control form-control-select" name="agent" required>
											<option selected> Select Agent</option>
											<option value="Repped">Repped</option>
											<option value="Non Repped">Non Repped</option>
										</select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<input id="self_tape_deadline" type="datetime-local" class="form-control form-control-user" placeholder="Self tape Submission Deadline" name="self_tape_deadline" required>
                                    </div>
									<div class="col-sm-6 mb-3 mb-sm-0">
                                    	<input id="paymen_details" type="text" class="form-control form-control-user" placeholder="Put Payment Details" name="paymen_details" required>
                                    </div>
                                </div>
								<!-- Modal footer -->
								<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Submit">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
					</div>
				</div>

<script>
    /*$(document).ready(function(){
       
        

        $(document).on('click', '.btn', function () {
            $('.selectpicker').selectpicker('refresh');
            alert("f");
        });


    })*/
</script>