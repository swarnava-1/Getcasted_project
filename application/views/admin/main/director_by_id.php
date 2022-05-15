<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>




<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">View director</h1>
    </div>
    <?php if($this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
	?>
	<div class="<?php echo $message['class'] ?>"><?php echo $message['message'];?>
	</div>
    <?php } ?> 
    <div class="card shadow mb-4"> 
        <div class="card-body">
            <form class="user" action="<?php echo base_url();?>admin/castingdirector/view_directors" method="post">
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                    <lable>director name</lable>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="agent Name" name="company_name_or_individual_name" value="<?php echo $director[0]['company_name_or_individual_name'];?>">
                            <lable>director address</lable>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="director Name" name="address" value="<?php echo $director[0]['address'];?>">
                            <lable>director contact no</lable>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="agent Name" name="contact_no" value="<?php echo $director[0]['contact_no'];?>">
                            <lable>director mobile no</lable>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="agent Name" name="mobile_number" value="<?php echo $director[0]['mobile_number'];?>">                
                            <lable>director email id</lable>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="agent Name" name="email_id" value="<?php echo $director[0]['email_id'];?>">
                            <lable>director tax regitration no</lable>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="agent Name" name="tax_reg_number" value="<?php echo $director[0]['tax_reg_number'];?>"> 
                    </div>
                </div>
            
            </form>
        </div>
    </div>
</div>

    