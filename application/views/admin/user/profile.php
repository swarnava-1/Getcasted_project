<script type="text/javascript">
    $( document ).ready(function() {
        //alert( "ready!" );

        $(".form-group").click(function(){
            $(".form-group").removeClass('form-group has-error').addClass('form-group');
        });

       $(".form-group").focusout(function(){
            $(".form-group").removeClass('form-group has-error').addClass('form-group');
        });
        
    });

    function show_error_message(id, div_id, message) {

        $("#"+div_id).removeClass('form-group').addClass('form-group has-error');
        $("#"+id).focus();
        $("#error_message").text(message);
        $("#error_message_div").show();
    }

    function validate_quote() {

      var name = $("#name").val();
      var price = $("#price").val();
      var description = $("#description").val();

      if(name.search(/\S/)==-1 || name=="") {
          show_error_message("name","name_div", "Name can not be blank ! Please provide a valid Name !");
          return false;
      }
      else if(price.search(/\S/)==-1 || price=="") {
          show_error_message("price","price_div", "Price can not be blank ! Please provide price !");
          return false;
      }
      else if(description.search(/\S/)==-1 || description=="") {
          show_error_message("description","description_div", "Description can not be blank ! Please provide description !");
          return false;
      }
      else {
          return true;
      }

    }

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
                                <h4 class="pull-left page-title">User Profile</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Future Guides Admin</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active"></li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Profile Details</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="form-horizontal" action="<?php echo base_url();?>admin/profile/update_profile" method="post" onsubmit="return valid()" style="width: 65%; margin: auto;">
			<!--<br>-->
			<!--	<center><h4 style="background-color: #378ed8; padding: 8px; color:white;">Register Form</h4></center>-->
			<!--<br>-->
			
            
			<div class="form-group">
			    <label class="control-label col-sm-2" for="">USER NAME <lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="name" id="name" value="<?php echo $ulist[0]->username;?>" placeholder="ENTER USER NAME">
					<label id="name_err" style="color: red;"></label>
				</div>
				<label class="control-label col-md-2" for="name">MOBILE NO <lable style="color:red">*</lable></label> 
				<div class="col-md-4">
					<input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $ulist[0]->mobile;?>" placeholder="ENTER MOBILE NO">
					<label id="mobile_err" style="color: red;"></label>
				</div>
				<input type="hidden" value="<?php echo $ulist[0]->id;?>" name="cid" id="cid">
				<input type="hidden" value="<?php echo $ulist[0]->Date;?>" name="date" id="date">
				<input type="hidden" value="<?php echo $ulist[0]->status;?>" name="status" id="status">
				<input type="hidden" value="<?php echo $ulist[0]->usr_label;?>" name="userLable" id="userLable">
				<input type="hidden" value="<?php echo $ulist[0]->password;?>" name="pass" id="pass">
				<input type="hidden" value="<?php echo $ulist[0]->payment_date;?>" name="payment_date" id="payment_date">
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="name">SPONSOR ID <lable style="color:red">*</lable></label> 
				<div class="col-md-4">
					<input type="text" class="form-control" name="sponsorId" id="sponsorId" value="<?php echo $ulist[0]->sponsorId;?>" placeholder="ENTER SPONSOR ID" readonly>
					<label id="sponsorId_err" style="color: red;"></label>
				</div>
				<label class="control-label col-sm-2" for="">APPLICATION ID</lable></label> 
				<div class="col-sm-4">
				    <input type="text" class="form-control" value="<?php echo $ulist[0]->applicantId;?>" name="applicationId" id="sponsorName" readonly>
				</div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-2" for="">Gender<lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="gender" id="gender" value="<?php echo $ulist[0]->gender;?>" placeholder="ENTER(Male/Female)">
					<label id="Email_err" style="color: red;"></label>
				</div>
				<label class="control-label col-sm-2" for="">DOB<lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="dob" id="dob" alue="<?php echo $ulist[0]->date_of_birth;?>" placeholder="ENTER DATE OF BIRTH">
					<label id="Email_err" style="color: red;"></label>
				</div>
			</div>
			
			<div class="form-group">
			    <label class="control-label col-sm-2" for="">Pan Card no<lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="pan" id="pan" value="<?php echo $ulist[0]->pancardno;?>" placeholder="ENTER PAN CARD NO" >
					<label id="Email_err" style="color: red;"></label>
				</div>
				<label class="control-label col-sm-2" for="">Adhar Card no<lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="adhar" id="adhar" value="<?php echo $ulist[0]->adharcardno;?>" placeholder="ENTER ADHAR CARD NUMBER">
					<label id="Email_err" style="color: red;"></label>
				</div>
			</div>
			
			<div class="form-group">
			    <label class="control-label col-sm-2" for="">A/C Holder Name<lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="holderName"  value="<?php echo $ulist[0]->accholdername;?>" id="holderName" placeholder="ENTER A/C HOLDER NAME" >
					<label id="Email_err" style="color: red;"></label>
				</div>
				<label class="control-label col-sm-2" for="">A/C Number <lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="accno" id="accno" value="<?php echo $ulist[0]->accname;?>" placeholder="ENTER A/C NUMBER">
					<label id="Email_err" style="color: red;"></label>
				</div>
			</div>
			
			<div class="form-group">
			    <label class="control-label col-sm-2" for="">Bank Name<lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="bankname" id="bankname"  value="<?php echo $ulist[0]->bankname;?>" placeholder="ENTER BANK NAME">
					<label id="Email_err" style="color: red;"></label>
				</div>
				<label class="control-label col-sm-2" for="">IFSC Code<lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="ifsc" id="ifsc"  value="<?php echo $ulist[0]->ifsccode;?>" placeholder="ENTER IFSC CODE">
					<label id="Email_err" style="color: red;"></label>
				</div>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-2" for="">EMAIL ID <lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="email" class="form-control" name="Email" id="Email" value="<?php echo $ulist[0]->email;?>" placeholder="ENTER EMAIL">
					<label id="Email_err" style="color: red;"></label>
				</div>
				<label class="control-label col-sm-2" for="">ADDRESS <lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<textarea class="form-control" rows="3" name="address" id="address" value="<?php echo $ulist[0]->address;?>" placeholder="ENTER ADDRESS"></textarea>
					<label id="address_err" style="color: red;"></label>
				</div>
			</div>

			<div class="form-group">
			    <label class="control-label col-md-2" for="name">CITY <lable style="color:red">*</lable></label> 
				<div class="col-md-4">
					<input type="text" class="form-control" name="city" id="city" value="<?php echo $ulist[0]->city;?>" placeholder="ENTER CITY">
					<label id="city_err" style="color: red;"></label>
				</div>
			    <label class="control-label col-sm-2" for="">DISTRICT <lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="district" value="<?php echo $ulist[0]->district;?>" id="district" placeholder="ENTER DISTRICT">
					<label id="district_err" style="color: red;"></label>
				</div>
				
			</div>

			<div class="form-group">
			    <label class="control-label col-md-2" for="name">PINCODE <lable style="color:red">*</lable></label> 
				<div class="col-md-4">
					<input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo $ulist[0]->pincode;?>" placeholder="ENTER PINCODE">
					<label id="pincode_err" style="color: red;"></label>
				</div>
			    
				<label class="control-label col-md-2" for="name">STATE <lable style="color:red">*</lable></label> 
				<div class="col-md-4">
					<input type="text" class="form-control" name="state" value="<?php echo $ulist[0]->state;?>" id="state" placeholder="ENTER STATE">
					<label id="state_err" style="color: red;"></label>
				</div>
				
			</div>
			
			<div class="form-group">
			    <label class="control-label col-sm-2" for="">NOMINEE INFORMATION <lable style="color:red">*</lable></label> 
				<div class="col-sm-4">
					<input type="text" class="form-control" name="nominee" value="<?php echo $ulist[0]->nominee;?>" id="nominee" placeholder="ENTER NOMINEE INFORMATION">
					<label id="nominee_err" style="color: red;"></label>
				</div>
				<label class="control-label col-md-2" for="name">NOMINEE RELATION <lable style="color:red">*</lable></label> 
				<div class="col-md-4">
					<input type="text" class="form-control" value="<?php echo $ulist[0]->nomineeRelation;?>" name="nomineeRelation" id="nomineeRelation" placeholder="ENTER NOMINEE RELATION">
					<label id="nomineeRelation_err" style="color: red;"></label>
				</div>
			</div>
			
    		<div class="form-group">
    				<div class="col-sm-12">
    					<center><button type="submit" class="btn btn-success">Submit</button></center>
    				</div>
    			</div>
    		</form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->



           