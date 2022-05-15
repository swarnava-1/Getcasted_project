<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">Talent Listing</h1>
    </div>
    <?php if($this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
	?>
	<div class="<?php echo $message['class'] ?>"><?php echo $message['message'];?>
	</div>
    <?php } ?>
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
                                            <th style="width: 102px;text-align: center;">Action</th>
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
                                                <a href="<?php echo base_url();?>agents/agent/view_talent?talentid=<?php echo $talent['user_id']?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                                <span><a href="<?php echo base_url();?>agents/agent/edit_talent?talentid=<?php echo $talent['user_id']?>" class="btn btn-success"><i class="fas fa-edit"></i></a></span>
											</td>
                                        </tr>
										<?php } ?>							
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

