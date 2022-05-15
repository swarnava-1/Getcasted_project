<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript">	
	$(document).ready(function(){
		$('select').on('change', function() {
		var contact_id = $("#contact_id").val();
		$.ajax({
                url: "<?php echo base_url().'reply/';?>get_mail_id?contact_id="+contact_id,
                success: function(result) {
                          document.getElementById ("email").value=result;
                          
                }
            });
	    });
	});


    $( document ).ready(function() {
       $('#account_type').change(function () {
            var value = $(this).val();//alert(value);
            if (value == 'Dealer') {
                $("#d_name").show();
            }else{
                $("#d_name").hide();
            }

        });
        
    });

  
    function show_error_message(id, div_id, message) {

        $("#"+div_id).removeClass('form-group').addClass('form-group has-error');
        $("#"+id).focus();
        $("#error_message").text(message);
        $("#error_message_div").show();
    }

    // function validate_quote() {

    //   var name = $("#name").val();
    //   var price = $("#price").val();
    //   var description = $("#description").val();

    //   if(name.search(/\S/)==-1 || name=="") {
    //       show_error_message("name","name_div", "Name can not be blank ! Please provide a valid Name !");
    //       return false;
    //   }
    //   else if(price.search(/\S/)==-1 || price=="") {
    //       show_error_message("price","price_div", "Price can not be blank ! Please provide price !");
    //       return false;
    //   }
    //   else if(description.search(/\S/)==-1 || description=="") {
    //       show_error_message("description","description_div", "Description can not be blank ! Please provide description !");
    //       return false;
    //   }
    //   else {
    //       return true;
    //   }

    // }
    function ckChange(ckType){
    var ckName = document.getElementsByName(ckType.name);
    var checked = document.getElementById(ckType.id);
    if(checked.id=='progress1'){
              $("#p_aacount").show();
          }else{
              $("#p_aacount").hide();
          }
    if (checked.checked) {
      for(var i=0; i < ckName.length; i++){
        //alert(ckName[i].checked);
          
          if(!ckName[i].checked){
              ckName[i].disabled = true;
          }else{
              ckName[i].disabled = false;
          }
      } 
    }
    else {
      for(var i=0; i < ckName.length; i++){
        ckName[i].disabled = false;
      } 
    }    
}
$('select').selectpicker();
</script>

<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Minutes of Meeting</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Minutes of Meeting</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">View Minutes of Meeting</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Minutes of Meeting</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return validate_quote();" action="#" method="post" enctype="multipart/form-data">
                                                <div class="form-group " id="d_name">
                                                    <label for="firstname" class="control-label col-lg-2">Date</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="date" name="date" value="<?php echo $number[0]->date?>" placeholder="Date" type="date" readonly>
                                                    </div>
                                                </div>
                                                 <input value="<?php echo $number[0]->id?>" name="id" type="hidden">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Subject</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" class="form-control" value="<?php echo $number[0]->subject;?>" id="subject" name="subject" placeholder="Subject" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group " id="d_name">
                                                    <label for="firstname" class="control-label col-lg-2">Minutes of Meeting Description</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control"  id="description" name="description" value="" placeholder="Minutes of Meeting description" type="text" readonly><?php echo $number[0]->description;?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Select Accounts</label>
                                                    <div class="col-lg-10">
                                                        <?php $acc_id = $number[0]->accounts;$account_id_exp = explode(',',$acc_id);?>
                                                        <!--<select class="form-control selectpicker" multiple data-live-search="true" name="account_id[]" readonly>-->
                                                          <!--<option value="">Please select</</option>-->
                                                             
                                                        <input type="text" class="form-control" value="<?php foreach($accounts as $acc){foreach($account_id_exp as $eip){ if($eip==$acc->id) { echo $acc->account_name.',';}}}?>">
                                                             
                                                         <!--</select>-->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-default waves-effect" type="button">Cancel</button></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->
                    </div>
</div>