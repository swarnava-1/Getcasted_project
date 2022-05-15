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

    function validate_user() {

      var fname = $("#fname").val();
      var lname = $("#lname").val();
      var email = $("#email").val();
      // modified by suvankar----------------------------------------------
	  var city = $("#city").val();
	  var state = $("#state").val();
	  var country = $("#country").val();
	  var image = $("#image").val();
	  
	  
      var password = $("#password").val();
      var cpassword = $("#cpassword").val();
      var phone = $("#phone").val();
      var zip = $("#zip").val();
      
      var emailPattern = /^[a-zA-Z0-9._-]+@(?!.*\.{2})[a-zA-Z0-9-.]+\.[a-zA-Z]{2,4}$/;
      var phone_regex = /^[0-9-+]+$/;
      var zip_regex = /(^\d{5}$)|(^\d{5}-\d{4}$)/;

      if(fname.search(/\S/)==-1 || fname=="") {
          show_error_message("fname","fname_div", "First Name can not be blank ! Please provide valid First Name !");
          return false;
      }
      else if(lname.search(/\S/)==-1 || lname=="") {
          show_error_message("lname","lname_div", "Last Name can not be blank ! Please provide valid Last Name !");
          return false;
      }
      else if(email.search(/\S/)==-1 || email=="") {
          show_error_message("email","email_div", "Email can not be blank ! Please provide valid Email !");
          return false;
      }
      else if (!emailPattern.test(email)) {
            show_error_message("email","email_div", "Please provide a valid Email !");
            return false;
      }
      
      else if(password.search(/\S/)==-1 || password=="") {
          show_error_message("password","password_div", "Password can not be blank ! Please provide Password !");
          return false;
      }
      else if(cpassword.search(/\S/)==-1 || cpassword=="") {
          show_error_message("cpassword","cpassword_div", "Confirm Password can not be blank ! Please type Password again !");
          return false;
      }
      else if(password != cpassword) {
          show_error_message("cpassword","cpassword_div", "Confirm Password not matched ! Please type Password again !");
          //$("#cpassword").clear();
          return false;
      }
      else if(phone.search(/\S/)==-1 || phone=="") {
          show_error_message("phone","phone_div", "Phone No can not be Blank ! Please enter your Mobile No !");
          return false;
      }
      else if (!phone_regex.test(phone)) {
            show_error_message("phone","phone_div", "Please provide a valid Phone No !");
            return false;
      }
      else if(zip.search(/\S/)==-1 || zip=="") {
          show_error_message("zip","zip_div", "Zip Code can not be Blank ! Please enter your Zip Code !");
          return false;
      }
      // else if (!zip_regex.test(zip)) {
      //       show_error_message("zip","zip_div", "Please provide a valid Zip Code !");
      //       return false;
      // }
      else if(address.search(/\S/)==-1 || address=="") {
          show_error_message("address","address_div", "Address can not be Blank ! Please enter your current address !");
          return false;
      }
	  //--------------------modified by suvankar -----------------------------
	  else if(city.search(/\S/)==-1 || city=="") {
          show_error_message("city","city_div", "city can not be Blank ! Please enter your current city !");
          return false;
      }
	  else if(state.search(/\S/)==-1 || state=="") {
          show_error_message("state","state_div", "state can not be Blank ! Please enter your current state !");
          return false;
      }
	  else if(country.search(/\S/)==-1 || country=="") {
          show_error_message("country","country_div", "country can not be Blank ! Please enter your current country !");
          return false;
      }
	  
      else {
          return true;
      }

    }

</script>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Management
            <small>Add New User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User Management</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
            <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add User</h3>

                    <div class="alert alert-danger alert-dismissable" id="error_message_div" style="display: none;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Registration Failed !</h4>
                      <span id="error_message"></span>
                    </div>

                </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" onsubmit="return validate_user();" action="update_user?id=<?php echo $ulist[0]->id; ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                      <div class="form-group" style="width: 30%; display: inline-block;" id="fname_div">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?php echo $ulist[0]->firstname; ?>">
                      </div>
                      <div class="form-group" style="width: 30%; display: inline-block;"  id="lname_div">
                        <label for="exampleInputPassword1">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?php echo $ulist[0]->lastname; ?>">
                      </div>

                      <div class="form-group" style="width: 30%;"></div>

                      <div class="form-group" style="width: 30%; display: inline-block;" id="email_div">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $ulist[0]->email; ?>">
                      </div>
					  <!---------------------Creted by suvankar---------------------------------------------->
					  <div class="form-group" style="width: 30%; display: inline-block;"  id="city_div">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your City" value="<?php echo $ulist[0]->city; ?>">
                      </div>
					  
					  <div class="form-group" style="width: 30%;"></div>
					  <div class="form-group" style="width: 30%; display: inline-block;" id="state_div">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter your State" value="<?php echo $ulist[0]->state; ?>">
                      </div>
					  
					  <div class="form-group" style="width: 30%; display: inline-block;"  id="state_div">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter your Country" value="<?php echo $ulist[0]->country; ?>">
                      </div>
					  
					  

                      <div class="form-group" style="width: 30%;"></div>
					  <div class="form-group" style="width: 30%; display: inline-block;" id="zip_div">
                        <label for="exampleInputEmail1">Zip Code</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter your Zip Code" value="<?php echo $ulist[0]->zip; ?>">
                      </div>

                      <div class="form-group" style="width: 30%; display: inline-block;" id="phone_div">
                        <label for="exampleInputPassword1">Phone No</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" value="<?php echo $ulist[0]->phone; ?>">
                      </div>
                      

                      <div class="form-group" style="width: 30%;"></div>
					  <div class="form-group" style="width: 30%; display: inline-block;" id="image_div">
						<img src="<?php echo base_url().'assets/admin/images/upload/user/thumb/'.$ulist[0]->pic;?>" alt="User Image" />
					  </div>
					  <div class="form-group" style="width: 30%; display: inline-block;" id="image_div">
						<label for="image">Change Image</label>
						<input type="file" class="form-control" id="image" name="image" >
					  </div>
                      <!-- <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">Example block-level help text here.</p>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Check me out
                        </label>
                      </div> -->
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="user"><button type="button" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Cancel</button></a>
                    </div>
                  </form>
                </div>
            </div><!-- /.col -->
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper