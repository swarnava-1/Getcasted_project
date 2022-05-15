<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
function decline(role_id,project_id,talent_id){
                $.ajax({
                    url: '<?php echo base_url();?>talent/talent_details/decline_role',
                    data: {'project_id': project_id,'role_id':role_id,'talent_id':talent_id},
                    type: "post",
                    success: function(data){
                            location.reload();
                        }
                    });
                }
</script>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">View Project</h1>
    </div>
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
        <h1 class="h3 mb-0 pageTitle">Self Tape Requested Role</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Roles Name</th>
                                            <th>Union Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($roles as $role){?>
                                        <tr>
                                            <td><?php echo $role['roles_name'];?></td>
                                            <td><?php echo $role['union_status'];?></td>
                                            <td>
                                                <a href="<?php echo base_url();?>talent/talent_details/view_project_role?id=<?php echo $role['id'];?>&project_id=<?php echo $this->input->get('id');?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                                <?php $selftape=$this->project_model->get_selftape_data($this->input->get('id'),$this->session->userdata('user_id'),$role['id']);if(!empty($selftape) && $selftape[0]['submit_selftape']==2){?>
                                                <button type="button" class="btn btn-dark" disabled>Decline</button>
                                                <?php } else {?>
                                                <button type="button" onclick="decline('<?php echo $role['id']?>','<?php echo $this->input->get('id');?>','<?php echo $this->session->userdata('user_id');?>')" class="btn btn-dark">Decline</button>
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