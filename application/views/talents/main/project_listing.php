<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 pageTitle">Project Listing</h1>
</div>
<div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Castind Director</th>
                                            <th>Project Name </th>
                                            <th>Optional Shoot Dates</th>
                                            <th>Project wide conflicts </th>
                                            <!-- <th>Mobile No.</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($projects as $project){?>
                                        <tr>
                                            <td><?php  $cd_id=$project['created_by'];$user=$this->project_model->get_all_user();foreach($user as $u){if($u['id']==$cd_id){echo $u['company_name_or_individual_name'];}}?>
                                            </td>
                                            <td><?php echo $project['project_name'];?></td>
                                            <td><?php echo $project['optional_shoot_dates'];?></td>
                                            <td><?php echo $project['current_conflicts'];?></td>
                                            <!-- <td><?php echo $project['self_tape'];?></td> -->
                                            <td>
											    <a href="<?php echo base_url();?>talent/talent_details/view_project?id=<?php echo $project['id'];?>" class="btn btn-primary"><i class="far fa-eye"></i></a>	
											</td>
                                        </tr>
										<?php } ?>										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                