<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>




<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">View Dancing</h1>
    </div>
    <?php if($this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
	?>
	<div class="<?php echo $message['class'] ?>"><?php echo $message['message'];?>
	</div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" action="<?php echo base_url();?>admin/dancing/update_dancing" method="post">
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                    <lable>Dancing name</lable>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="dancing Name" name="dancing_name" value="<?php echo $dancing[0]['dancing_name'];?>">
                        <input type="hidden"  name="dancing_id" value="<?php echo $dancing[0]['id'];?>">
                    </div>
                </div>
            <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
</div>

    