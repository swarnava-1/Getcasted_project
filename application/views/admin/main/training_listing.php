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
                      url: "<?php echo base_url().'admin/training';?>/delete_training?id="+id,
                      success: function(result) {
                                //alert('result');
                                $("#loader").hide();
                                location.reload();
                      }
            });
        }
    }
</script>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 pageTitle">Training  Listing</h1>
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
                                            <th>Training  Name </th>
                                           
                                            <th>Action</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
										<?php foreach($training as $train)  {?>
                                        <tr>
                                            <td><?php echo $train['training_name'];?></td>
											<td>
											<!-- <a href="<?php echo base_url();?>admin/training/view_training?training_id=<?php// echo $train['id'];?>" class="btn btn-primary"><i class="far fa-eye"></i></a> -->
											    <a href="<?php echo base_url();?>admin/training/view_training?training_id=<?php echo $train['id'];?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
												<a href="#" onclick="checkDelete(<?php echo $train['id']; ?>)" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
											</td>
                                        </tr>
										<?php } ?>										
                                    </tbody>
                                </table>
								<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModalAdd">Create Training</button>
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
					  <h4 class="modal-title">Add Training</h4>
					  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
						<form action ="<?php echo base_url()?>admin/training/add_training" method="post" class="user">
							<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="training Name" name="training_name" required>
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
              <!-- The Modal View for create role -->
			  <div class="modal fade" id="myModalCreateRole">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">view ethnicity</h4>
					  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
                    <form action ="<?php echo base_url()?>admin/ethnicity/index" method="post" class="user">
							<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Ethnicity Name" name="ethnicity_name" required>
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
					  <h4 class="modal-title">Edit training</h4>
					  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
						<form action ="<?php echo base_url();?>admin/training/update_training" method="post" class="user">
						<div class="form-group row">
								<div class="col-sm-12 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="training_name" placeholder="training Name" name="training_name" required>
								</div>
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


<script type="text/javascript">
function load_ethnicity(ethnicity_name,id)
	{
		$.ajax({
				type: "POST",
				data: "id="+id+"ethnicity_name="+ethnicity_name,
				success: function (response) {	
					//$("#id_field").val()=id;
					document.getElementById ("id_field").value = id;
					document.getElementById ("ethnicity_name").value = ethnicity_name;
					 
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