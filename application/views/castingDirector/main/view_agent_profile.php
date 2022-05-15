<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">View Agent Details</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
				<form class="user">
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Name (Company / Individual)</lable>
							<input type="text" class="form-control form-control-user" value="<?php echo $agent[0]['company_name_or_individual_name']?>" id="exampleFirstName"
								placeholder="Profile Name">
						</div>
						<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Email ID</lable>
						<input type="text" class="form-control form-control-user" value="<?php echo $agent[0]['email_id']?>" id="exampleFirstName"
								placeholder="Profile Name">
						</div>
						<!-- <div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Address</lable>
						<input type="text" class="form-control form-control-user" value="<?php echo $agent[0]['address']?>" id="exampleFirstName"
								placeholder="Profile Name">
						</div> -->
					</div>
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Contact No</lable>
							<input type="text" class="form-control form-control-date" value="<?php echo $agent[0]['contact_no']?>" id="exampleFirstName"
								placeholder="Expiration Date">
						</div>
						<div class="col-sm-6 mb-3 mb-sm-0">
						<lable>Mobile No</lable>
							<input type="text" class="form-control form-control-user" value="<?php echo $agent[0]['mobile_number']?>" id="exampleFirstName"
								placeholder="Geographic Area">
						</div>
					</div>
				</form>
		</div>
	</div>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">Talent List</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="table-responsive">
		<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Talent name</th>
                                            <th>Current Conflicts</th>
                                            <th>Expiration Date</th>
                                            <th>Address</th>
                                            <th>Distance Range</th>
                                            <th>Talent Roles</th>
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
                                            <td>
                                                <a href="<?php echo base_url();?>castingDirector/director/view_talent?talentid=<?php echo $talent['user_id']?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
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
