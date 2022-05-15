<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
	function onlyOne(checkbox,project_id,talent_id,role_id) {
		request_status=checkbox.value;
		var checkboxes = document.getElementsByName('active');
        checkboxes.forEach((item) => {
            if (item !== checkbox) 
            item.checked = false;
        })
		$.ajax({
			url: '<?php echo base_url();?>castingDirector/director/request_shoot_or_audition',
			data: {'request_status': request_status,'project_id': project_id,'talent_id':talent_id,'role_id':role_id},
			type: "post",
			success: function(data){
				location.reload();
			}
		});
	}
	function apply(project_id,talent_id,role_id){
			$.ajax({
			url: '<?php echo base_url();?>castingDirector/director/request_talent',
			data: {'project_id': project_id,'talent_id':talent_id,'role_id':role_id},
			type: "post",
			success: function(data){
				location.reload();
			}
		});
	}

	function schedule(project_id,talent_id,role_id){
		document.getElementById('project_id').value = project_id;
		document.getElementById('role_id').value = role_id;
		document.getElementById('talent_id').value = talent_id;
		$.ajax({
			url: '<?php echo base_url();?>castingDirector/director/get_slot_project_and_role_wise',
			data: {'project_id': project_id,'role_id':role_id}, // change this to send js object
			type: "post",
			success: function(data){
				var obj = jQuery.parseJSON(data);
				$.each(obj, function(key,value) {
					$('#slot').append('<input id="rad-'+key+'" type="radio" required name="contnet" value="'+value.id+'"><label for="rad-'+key+'">'+value.time_slot+'</label><br>');
				});
			}
		});
	}
	$(document).ready(function(){
		$('.active').each(function(){
			if ($(this).is(':checked')) {
				$(this).addClass("oo");
				$(this).closest("label").siblings("label").find(".inactive").attr("disabled", true);
			}
		});



		if ($('.active').attr('checked')) {
			$(this).addClass("oo");
			$(this).closest("label").siblings("label").find(".inactive").attr("disabled", true);
		}
	})
</script>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">View project role</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user">
				<div class="form-group row">
					<div class="col-sm-12 mb-3 mb-sm-0">
					<lable>Role Name</lable>
						<input id="roles_name" type="text" class="form-control form-control-user" placeholder="Role Name" name="roles_name" value="<?php echo $role_by_id[0]['roles_name'];?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12 mb-3 mb-sm-0">
					<lable>Role Description</lable>
						<textarea class="form-control form-control-user" id="role_description" placeholder="Role Description" name="role_description" rows="3" readonly><?php echo $role_by_id[0]['role_description'];?></textarea>
					</div>  
				</div>
            	<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Role Type</lable>
						<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['roles_type'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Union Status</lable>
						<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['union_status'];?>" readonly>
					</div>
            	</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Age Range</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $role_by_id[0]['age_range'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Role Specific Location</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $role_by_id[0]['role_specific_loacation'];?>" readonly>
					</div>  
				</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Ethnicity</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['ethnicity'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Gender</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['gender'];?>" readonly>
					</div>  
				</div>
				<div class="form-group row">	
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Height(Feet)</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['feet'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Height(Inches)</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['inches'];?>" readonly>
					</div>
				</div>
				<div class="form-group row">	
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Clothing Size(Chest)</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['clothing_size_chest'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Inches</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['clothing_size_chest_inch'];?>" readonly>
					</div>
				</div>
				<div class="form-group row">	
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Clothing Size(Bust)</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['clothing_size_bust'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Inches</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['clothing_size_bust_inch'];?>" readonly>
					</div>
				</div>
				<div class="form-group row">	
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Clothing Size(West)</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['clothing_size_waist'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Inches</lable>
						<input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $role_by_id[0]['clothing_size_waist_inch'];?>" readonly>
					</div>
            	</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Language Spoke</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['language_spoke'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Accents</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['accents'];?>" readonly>
					</div>  
				</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Training</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['tranning'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Athletics</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['athletics'];?>" readonly>
					</div>  
				</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Singing</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['singing'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Dancing</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['dancing'];?>" readonly>
					</div>  
				</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Driving Experience</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['driving_license'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Citizenship or visa documents</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['citizenship_or_visa_documents'];?>" readonly>
					</div>  
				</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Other upload</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo $role_by_id[0]['other_upload'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Agent</lable>
							<input type="text" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $role_by_id[0]['agent'];?>" readonly>
					</div>  
				</div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Self tape Submission Deadline</lable>
						<input id="self_tape_deadline" type="datetime-local" class="form-control form-control-user" placeholder="Self tape Submission Deadline" name="self_tape_deadline" value="<?php echo $role_by_id[0]['self_tape_deadline'];?>" readonly>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
					<lable>Payment Details</lable>
						<input id="paymen_details" type="text" class="form-control form-control-user" placeholder="Payment Details" name="paymen_details" value="<?php echo $role_by_id[0]['paymen_details'];?>" readonly>
					</div>
				</div>
            </form>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">Role Wise Talent List</h1>
    </div>

	<!--Tab wise  -->
	<div class="card shadow mb-4">
        <div class="card-body">
			<div class="row">
			<div class="col-xl-12 mb-4 mb-xl-0">
				<section>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item waves-effect waves-light">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Matched Talent</a>
						</li>
						<li class="nav-item waves-effect waves-light">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Invited Talent</a>
						</li>
						<li class="nav-item waves-effect waves-light">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Submitted Talent</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="table-responsive">
                                <table class="table table-hover" id="dataTable" style="width:1800px;" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Talent name</th>
                                            <th>Current Conflicts</th>
                                            <th>Expiration Date</th>
                                            <th>Address</th>
											<th>Distance</th>
											<th>Talent Roles Types</th>
											<th>Agent Information</th>
											<th>Profile Match</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($talents as $talent){?>
                                        <tr>
                                            <td><?php echo $talent['profile_name']?></td>
                                            <td><?php echo $talent['current_conflicts']?></td>
                                            <td><?php echo $talent['expiration_date']?></td>
                                            <td><?php echo $talent['talent_address']?></td>
											<td><?php echo $talent['distance']?></td>
                                            <td><?php echo $talent['talent_roles']?></td>
											<td><?php echo $talent['agent'];?><br><a href="<?php echo base_url();?>castingDirector/director/view_agent?agentid=<?php echo $talent['agent_id']?>"><strong><?php if($talent['agent']=='Repped'){foreach($agents as $agent){if($agent['id']== $talent['agent_id']){echo $agent['company_name_or_individual_name'];}else{echo '';}}}?></strong></a></td>
											<td><?php 
													$role_type_count = 10;
													$age_range_count;
													$ethnicity_count;
													$gender_count;
													$singing_count;
													$height_count;
													$dancing_count;
													$training_count;
													$citizenship_count;
													$role_age_range = $role_by_id[0]['age_range'];
													$talent_age_range = $talent['age'];
													if($role_age_range == $talent_age_range){
														$age_range_count = 10;
													}else{
														$age_range_count = 0;
													}
													$role_ethnicity = $role_by_id[0]['ethnicity'];
													$talent_ethnicity = $talent['ethnicity'];
													if($role_ethnicity == $talent_ethnicity){
														$ethnicity_count = 10;
													}else{
														$ethnicity_count = 0;
													}
													$role_gender = $role_by_id[0]['gender'];
													$talent_gender = $talent['gender'];
													if($role_gender == $talent_gender){
														$gender_count = 10;
													}else{
														$gender_count = 0;
													}
													$role_singing = $role_by_id[0]['singing'];
													$role_singing_explode = explode(",",$role_singing);
													$role_singing_count = count($role_singing_explode);
													$talent_singing = $talent['singing'];
													$talent_singing_explode = explode(",",$talent_singing);
													$result_singing = array_intersect($talent_singing_explode,$role_singing_explode);
													if(!empty($result_singing)){
														$result_singing_count = count($result_singing);
														$singing_count = ($result_singing_count * 10)/$role_singing_count;
													}else{
														$singing_count = 0;
													}

													$role_feet = $role_by_id[0]['feet'];
													$talent_feet = $talent['feet'];
													
													$role_inches = $role_by_id[0]['inches'];
													$talent_inches = $talent['inches'];

													$role_height = $role_feet.$role_inches;

													$talent_height = $talent_feet.$talent_inches;

													if($role_height == $talent_height){
														$height_count = 10;
													}else{
														$height_count = 0;
													}

													$role_dancing = $role_by_id[0]['dancing'];
													$role_dancing_explode = explode(",",$role_dancing);
													$role_dancing_count = count($role_dancing_explode);
													$talent_dancing = $talent['dancing'];
													$talent_dancing_explode = explode(",",$talent_dancing);
													$result_dancing = array_intersect($talent_dancing_explode,$role_dancing_explode);
													if(!empty($result_dancing)){
														$result_dancing_count = count($result_dancing);
														$dancing_count = ($result_dancing_count * 10)/$role_dancing_count;
													}else{
														$dancing_count = 0;
													}

													$role_training = $role_by_id[0]['tranning'];
													$role_training_explode = explode(",",$role_training);
													$role_training_count = count($role_training_explode);
													$talent_training = $talent['training'];
													$talent_training_explode = explode(",",$talent_training);
													$result_training = array_intersect($talent_training_explode,$role_training_explode);
													if(!empty($result_training)){
														$result_training_count = count($result_training);
														$training_count = ($result_training_count * 10)/$role_training_count;
													}else{
														$training_count = 0;
													}
													$role_citizenship = $role_by_id[0]['citizenship_or_visa_documents'];
													$talent_citizenship = $talent['citizenship_or_visa_documents'];
													if($role_citizenship == $talent_citizenship){
														$citizenship_count = 10;
													}else{
														$citizenship_count = 0;
													}
													$total = $role_type_count + $age_range_count + $ethnicity_count + $gender_count + $singing_count + $height_count + $dancing_count + $training_count;
													$percentage = (int)(round(($total * 100)/90));
													//$percentage = 55;
												?><?php if($percentage == 100){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">100% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"></div>
									</div>
												<?php } elseif($percentage >= 75 && $percentage <= 99){?>	
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">75% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="75" aria-valuemax="99"></div>
									</div>
									<?php } elseif($percentage >= 50 && $percentage <=74){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"> <span
											class="float-right">50% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="50" aria-valuemax="74"></div>
									</div>
									<?php } elseif($percentage >= 30 && $percentage <= 49){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">45% Match</span></h4>
									<div class="progress">
	  								<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="45" aria-valuemin="30" aria-valuemax="49" style="width:45%"></div>
									</div>
									<?php } elseif($percentage < 30 ){?>
										<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">Less than 30% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="29"></div>
									</div>
									<?php } ?></div>
											</td>
											<td><?php 
											$project_id = $this->input->get('project_id');
											$role_id = $this->input->get('id');$received_data=$this->project_model->get_srequst_status_row($project_id,$talent['user_id'],$role_id);
											if((empty($received_data))){?>
											<label class="requestbtn"><input type="checkbox" id="selfteprequest" name="selfteprequest" value="selfteprequest" onclick="apply('<?php echo $this->input->get('project_id');?>','<?php echo $talent['user_id']?>','<?php echo $this->input->get('id');?>')">Self tape request</label>
											<?php } else {?>
											<label class="requestbtn"><input type="checkbox" checked disabled>Self tape request</label>
											<?php } ?>
											</td>
                                            <td>
                                                <a href="<?php echo base_url();?>castingDirector/director/view_talent?talentid=<?php echo $talent['user_id']?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
											</td>
                                        </tr>
										<?php } ?>							
                                    </tbody>
                                </table>
                            </div>

						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="table-responsive">
                                <table class="table table-hover" id="dataTable" style="width:1800px;" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Talent name</th>
                                            <th>Current Conflicts</th>
                                            <th>Expiration Date</th>
                                            <th>Address</th>
											<th>Distance</th>
											<th>Talent Roles Types</th>
											<th>Agent Information</th>
											<th>Profile Match</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($requested_talents as $talent){?>
                                        <tr>
                                            <td><?php echo $talent['profile_name']?></td>
                                            <td><?php echo $talent['current_conflicts']?></td>
                                            <td><?php echo $talent['expiration_date']?></td>
                                            <td><?php echo $talent['talent_address']?></td>
											<td><?php echo $talent['distance']?></td>
                                            <td><?php echo $talent['talent_roles']?></td>
											<td><?php echo $talent['agent'];?><br><a href="<?php echo base_url();?>castingDirector/director/view_agent?agentid=<?php echo $talent['agent_id']?>"><strong><?php if($talent['agent']=='Repped'){foreach($agents as $agent){if($agent['id']== $talent['agent_id']){echo $agent['company_name_or_individual_name'];}else{echo '';}}}?></strong></a></td>
											<td><?php 
													$role_type_count = 10;
													$age_range_count;
													$ethnicity_count;
													$gender_count;
													$singing_count;
													$height_count;
													$dancing_count;
													$training_count;
													$citizenship_count;
													$role_age_range = $role_by_id[0]['age_range'];
													$talent_age_range = $talent['age'];
													if($role_age_range == $talent_age_range){
														$age_range_count = 10;
													}else{
														$age_range_count = 0;
													}
													$role_ethnicity = $role_by_id[0]['ethnicity'];
													$talent_ethnicity = $talent['ethnicity'];
													if($role_ethnicity == $talent_ethnicity){
														$ethnicity_count = 10;
													}else{
														$ethnicity_count = 0;
													}
													$role_gender = $role_by_id[0]['gender'];
													$talent_gender = $talent['gender'];
													if($role_gender == $talent_gender){
														$gender_count = 10;
													}else{
														$gender_count = 0;
													}
													$role_singing = $role_by_id[0]['singing'];
													$role_singing_explode = explode(",",$role_singing);
													$role_singing_count = count($role_singing_explode);
													$talent_singing = $talent['singing'];
													$talent_singing_explode = explode(",",$talent_singing);
													$result_singing = array_intersect($talent_singing_explode,$role_singing_explode);
													if(!empty($result_singing)){
														$result_singing_count = count($result_singing);
														$singing_count = ($result_singing_count * 10)/$role_singing_count;
													}else{
														$singing_count = 0;
													}

													$role_feet = $role_by_id[0]['feet'];
													$talent_feet = $talent['feet'];
													
													$role_inches = $role_by_id[0]['inches'];
													$talent_inches = $talent['inches'];

													$role_height = $role_feet.$role_inches;

													$talent_height = $talent_feet.$talent_inches;

													if($role_height == $talent_height){
														$height_count = 10;
													}else{
														$height_count = 0;
													}

													$role_dancing = $role_by_id[0]['dancing'];
													$role_dancing_explode = explode(",",$role_dancing);
													$role_dancing_count = count($role_dancing_explode);
													$talent_dancing = $talent['dancing'];
													$talent_dancing_explode = explode(",",$talent_dancing);
													$result_dancing = array_intersect($talent_dancing_explode,$role_dancing_explode);
													if(!empty($result_dancing)){
														$result_dancing_count = count($result_dancing);
														$dancing_count = ($result_dancing_count * 10)/$role_dancing_count;
													}else{
														$dancing_count = 0;
													}

													$role_training = $role_by_id[0]['tranning'];
													$role_training_explode = explode(",",$role_training);
													$role_training_count = count($role_training_explode);
													$talent_training = $talent['training'];
													$talent_training_explode = explode(",",$talent_training);
													$result_training = array_intersect($talent_training_explode,$role_training_explode);
													if(!empty($result_training)){
														$result_training_count = count($result_training);
														$training_count = ($result_training_count * 10)/$role_training_count;
													}else{
														$training_count = 0;
													}
													$role_citizenship = $role_by_id[0]['citizenship_or_visa_documents'];
													$talent_citizenship = $talent['citizenship_or_visa_documents'];
													if($role_citizenship == $talent_citizenship){
														$citizenship_count = 10;
													}else{
														$citizenship_count = 0;
													}
													$total = $role_type_count + $age_range_count + $ethnicity_count + $gender_count + $singing_count + $height_count + $dancing_count + $training_count;
													$percentage = (int)(round(($total * 100)/90));
													//$percentage = 55;
												?><?php if($percentage == 100){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">100% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"></div>
									</div>
												<?php } elseif($percentage >= 75 && $percentage <= 99){?>	
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">75% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="75" aria-valuemax="99"></div>
									</div>
									<?php } elseif($percentage >= 50 && $percentage <=74){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"> <span
											class="float-right">50% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="50" aria-valuemax="74"></div>
									</div>
									<?php } elseif($percentage >= 30 && $percentage <= 49){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">45% Match</span></h4>
									<div class="progress">
	  								<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="45" aria-valuemin="30" aria-valuemax="49" style="width:45%"></div>
									</div>
									<?php } elseif($percentage < 30 ){?>
										<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">Less than 30% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="29"></div>
									</div>
									<?php } ?></div>
											</td>
                                            <td>
												<?php if($talent['submit_selftape']==2){?>
												<button type="button" class="btn btn-dark">Declined</button>
												<?php } else { ?>
												<a href="<?php echo base_url();?>castingDirector/director/view_talent?talentid=<?php echo $talent['user_id']?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
												<?php } ?>
											</td>
                                        </tr>
										<?php } ?>							
                                    </tbody>
                                </table>
                            </div>
						</div>
						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="table-responsive">
                                <table class="table table-hover" id="dataTable" style="width:2500px;" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Talent name</th>
                                            <th>Current Conflicts</th>
                                            <th>Expiration Date</th>
                                            <th>Address</th>
											<th>Distance</th>
											<th>Talent Roles Types</th>
											<th>Agent Information</th>
											<th>Profile Match</th>
                                            <th>Self Tape</th>
											<th>Request</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($self_tape_submitted_talents as $talent){?>
                                        <tr>
                                            <td><?php echo $talent['profile_name']?></td>
                                            <td><?php echo $talent['current_conflicts']?></td>
                                            <td><?php echo $talent['expiration_date']?></td>
                                            <td><?php echo $talent['talent_address']?></td>
											<td><?php echo $talent['distance']?></td>
                                            <td><?php echo $talent['talent_roles']?></td>
											<td><?php echo $talent['agent'];?><br><a href="<?php echo base_url();?>castingDirector/director/view_agent?agentid=<?php echo $talent['agent_id']?>"><strong><?php if($talent['agent']=='Repped'){foreach($agents as $agent){if($agent['id']== $talent['agent_id']){echo $agent['company_name_or_individual_name'];}else{echo '';}}}?></strong></a></td>
											<td><?php 
													$role_type_count = 10;
													$age_range_count;
													$ethnicity_count;
													$gender_count;
													$singing_count;
													$height_count;
													$dancing_count;
													$training_count;
													$citizenship_count;
													$role_age_range = $role_by_id[0]['age_range'];
													$talent_age_range = $talent['age'];
													if($role_age_range == $talent_age_range){
														$age_range_count = 10;
													}else{
														$age_range_count = 0;
													}
													$role_ethnicity = $role_by_id[0]['ethnicity'];
													$talent_ethnicity = $talent['ethnicity'];
													if($role_ethnicity == $talent_ethnicity){
														$ethnicity_count = 10;
													}else{
														$ethnicity_count = 0;
													}
													$role_gender = $role_by_id[0]['gender'];
													$talent_gender = $talent['gender'];
													if($role_gender == $talent_gender){
														$gender_count = 10;
													}else{
														$gender_count = 0;
													}
													$role_singing = $role_by_id[0]['singing'];
													$role_singing_explode = explode(",",$role_singing);
													$role_singing_count = count($role_singing_explode);
													$talent_singing = $talent['singing'];
													$talent_singing_explode = explode(",",$talent_singing);
													$result_singing = array_intersect($talent_singing_explode,$role_singing_explode);
													if(!empty($result_singing)){
														$result_singing_count = count($result_singing);
														$singing_count = ($result_singing_count * 10)/$role_singing_count;
													}else{
														$singing_count = 0;
													}

													$role_feet = $role_by_id[0]['feet'];
													$talent_feet = $talent['feet'];
													
													$role_inches = $role_by_id[0]['inches'];
													$talent_inches = $talent['inches'];

													$role_height = $role_feet.$role_inches;

													$talent_height = $talent_feet.$talent_inches;

													if($role_height == $talent_height){
														$height_count = 10;
													}else{
														$height_count = 0;
													}

													$role_dancing = $role_by_id[0]['dancing'];
													$role_dancing_explode = explode(",",$role_dancing);
													$role_dancing_count = count($role_dancing_explode);
													$talent_dancing = $talent['dancing'];
													$talent_dancing_explode = explode(",",$talent_dancing);
													$result_dancing = array_intersect($talent_dancing_explode,$role_dancing_explode);
													if(!empty($result_dancing)){
														$result_dancing_count = count($result_dancing);
														$dancing_count = ($result_dancing_count * 10)/$role_dancing_count;
													}else{
														$dancing_count = 0;
													}

													$role_training = $role_by_id[0]['tranning'];
													$role_training_explode = explode(",",$role_training);
													$role_training_count = count($role_training_explode);
													$talent_training = $talent['training'];
													$talent_training_explode = explode(",",$talent_training);
													$result_training = array_intersect($talent_training_explode,$role_training_explode);
													if(!empty($result_training)){
														$result_training_count = count($result_training);
														$training_count = ($result_training_count * 10)/$role_training_count;
													}else{
														$training_count = 0;
													}
													$role_citizenship = $role_by_id[0]['citizenship_or_visa_documents'];
													$talent_citizenship = $talent['citizenship_or_visa_documents'];
													if($role_citizenship == $talent_citizenship){
														$citizenship_count = 10;
													}else{
														$citizenship_count = 0;
													}
													$total = $role_type_count + $age_range_count + $ethnicity_count + $gender_count + $singing_count + $height_count + $dancing_count + $training_count;
													$percentage = (int)(round(($total * 100)/90));
													//$percentage = 55;
												?><?php if($percentage == 100){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">100% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"></div>
									</div>
												<?php } elseif($percentage >= 75 && $percentage <= 99){?>	
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">75% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="75" aria-valuemax="99"></div>
									</div>
									<?php } elseif($percentage >= 50 && $percentage <=74){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"> <span
											class="float-right">50% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="50" aria-valuemax="74"></div>
									</div>
									<?php } elseif($percentage >= 30 && $percentage <= 49){?>
									<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">45% Match</span></h4>
									<div class="progress">
	  								<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="45" aria-valuemin="30" aria-valuemax="49" style="width:45%"></div>
									</div>
									<?php } elseif($percentage < 30 ){?>
										<h4 class="small font-weight-bold" style="display:inline-block;"><span
											class="float-right">Less than 30% Match</span></h4>
									<div class="progress">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="29"></div>
									</div>
									<?php } ?></div>
											</td>
											<td>
											<a href="<?php echo base_url();?><?php echo $talent['self_tape']?>" type="button" class="btn btn-success" target="_blank">Click here</a>
											</td>
											<td>
											<?php $project_id = $this->input->get('project_id');
											$role_id = $this->input->get('id');$received_data=$this->project_model->get_srequst_status_row($project_id,$talent['user_id'],$role_id);if($received_data[0]['request_status']==0 || $received_data[0]['request_status']==2){?>
											<label class="requestbtn">
												
											<input type="checkbox" class="active" id="active" value="1" onclick="onlyOne(this,'<?php echo $this->input->get('project_id');?>','<?php echo $talent['user_id']?>','<?php echo $this->input->get('id');?>')" >
											For Shoots
											</label>
											<?php } else {?>
											<label class="requestbtn">
													
											<input type="checkbox" class="active" id="active" value="1" onclick="onlyOne(this,'<?php echo $this->input->get('project_id');?>','<?php echo $talent['user_id']?>','<?php echo $this->input->get('id');?>')" checked>
											For Shoots</label>
											<?php } if($received_data[0]['request_status']==0 || $received_data[0]['request_status']==1){ ?>
												<label class="requestbtn">
														
												<input type="checkbox" class="inactive" id="inactive" value="2" onclick="onlyOne(this,'<?php echo $this->input->get('project_id');?>','<?php echo $talent['user_id']?>','<?php echo $this->input->get('id');?>')" >
											For Audition</label>
											<?php } else {?>
												<label class="requestbtn">
														
												<input type="checkbox" class="inactive" id="inactive" value="2" onclick="onlyOne(this,'<?php echo $this->input->get('project_id');?>','<?php echo $talent['user_id']?>','<?php echo $this->input->get('id');?>')"  checked>
											For Audition</label><?php } ?>
											</td>
                                            <td>
                                                <a href="<?php echo base_url();?>castingDirector/director/view_talent?talentid=<?php echo $talent['user_id']?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
												<?php if($received_data[0]['audition_schedule']==1){?>
													<a href="#" class="btn btn-success tooltipNw">Shoots Slot <span class="tooltiptext"><?php echo 'Date:-'.$received_data[0]['slot_date'].' '.'Time:-'.$received_data[0]['slot_time'];?></span></a>
												<?php }elseif($received_data[0]['audition_schedule']==2){
													echo 'Audition Slot:'.' '.'Date:-'.$received_data[0]['slot_date'].' '.'Time:-'.$received_data[0]['slot_time'];
												}else{?>
													<button type="button" class="btn btn-success" disabled>Shoots Slot</button>
												<?php } ?>
											</td>
                                        </tr>
										<?php } ?>							
                                    </tbody>
                                </table>
                            </div>					
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
	<!--Tab wise  -->
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Audition Schedule</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url()?>castingDirector/director/scheduleaudition" method="post">
						<div class="modal-body">
							<input type="hidden" name="project_id" id="project_id">
							<input type="hidden" name="role_id" id="role_id">
							<input type="hidden" name="talent_id" id="talent_id">
							<div id="slot"></div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>	
					</form>
				</div>
			</div>
		</div>