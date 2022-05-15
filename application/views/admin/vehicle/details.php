<script type="text/javascript">
    $( document ).ready(function() {
        //alert( "ready!" );

        $(".form-group").click(function(){
            $(".form-group").removeClass('form-group has-error').addClass('form-group');
        });

       $(".form-group").focusout(function(){
            $(".form-group").removeClass('form-group has-error').addClass('form-group');
        });

       $("#update").click(function() {
            var registration = $("#registration").val(); 
            var make = $("#make").val(); 
            var model = $("#model").val(); 
            var distanceDriven = $("#distanceDriven").val();
            var vid = $("#vid").val();

            $.ajax({
                    url: 'update_vehicle?registration='+registration+'&make='+make+'&model='+model+'&distanceDriven='+distanceDriven+'&vid='+vid,
                    success: function(result){
                        if(result) {
                            location.reload();
                        }
                    }
            });
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
      var uname = $("#uname").val();
      var password = $("#password").val();
      var cpassword = $("#cpassword").val();
      var phone = $("#phone").val();
      var zip = $("#zip").val();
      var address = $("#address").val();
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
      else if(uname.search(/\S/)==-1 || uname=="") {
          show_error_message("uname","uname_div", "Username can not be blank ! Please provide an username !");
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
      else {
          return true;
      }

    }

    function editable() {

        $("#registration").attr("readonly", false); 
        $("#make").attr("readonly", false); 
        $("#model").attr("readonly", false); 
        $("#distanceDriven").attr("readonly", false); 

        $("#update").show();
        $("#cancel").show();

        $("#registration").focus();
    }

    function readonly() {

        $("#registration").attr("readonly", true); 
        $("#make").attr("readonly", true); 
        $("#model").attr("readonly", true); 
        $("#distanceDriven").attr("readonly", true);

        $("#update").hide();
        $("#cancel").hide();
    }

</script>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Vehicle Details
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> User Management</a></li>
            <li class="active">Vehicle Details</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
            <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Vehicle Details</h3>
                  <a href="<?php echo base_url();?>admin/vehicle"><button type="button" class="btn btn-danger" style="float: right;"><?php echo '<< ';?>  Back To List</button></a>
                </div><!-- /.box-header -->
                  <!-- form start -->
                  <!-- <form role="form" onsubmit="return validate_user();" action="insert_user" method="post"> -->
                    <div class="box-body" style="width: 30%; display: inline-block;">

                      <input id="vid" value="<?php echo $vehicle[0]->id; ?>" style="display: none;"/>

                      <div class="form-group" style="width: 100%;" id="fname_div">
                        <label for="exampleInputEmail1">Registration </label>
                        <input type="text" class="form-control" id="registration" name="registration" value="<?php echo $vehicle[0]->registration; ?>" readonly>
                      </div>
                      <div class="form-group" style="width: 100%"; id="lname_div">
                        <label for="exampleInputPassword1">Model</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?php echo $vehicle[0]->model; ?>" readonly>
                      </div>

                      <div class="form-group" style="width: 100%;"></div>

                      <div class="form-group" style="width: 100%;" id="email_div">
                        <label for="exampleInputPassword1">Make</label>
                        <input type="text" class="form-control" id="make" name="make"  value="<?php echo $vehicle[0]->make; ?>" readonly>
                      </div>
                      <div class="form-group" style="width: 100%;" id="uname_div">
                        <label for="exampleInputEmail1">Distance Driven</label>
                        <input type="text" class="form-control" id="distanceDriven" name="distanceDriven"  value="<?php echo $vehicle[0]->distanceDriven; ?>" readonly>
                      </div>

                      <!-- <div class="form-group" style="width: 100%;"></div>

                      <div class="form-group" style="width: 100%;" id="password_div">
                        <label for="exampleInputPassword1" style="display: inline-block;">Owner </label>
                        <a class="form-control" href="javascript:void(0);" style="display: inline-block; width: inherit;"><button class="btn btn-block btn-info btn-xs" type="button"></button></a>
                      </div> -->
                      
                    </div><!-- /.box-body -->

                    <div class="box-body" style="width: 60%; display: inline-block;">
                      <div class="form-group">
                        <img src="<?php echo base_url().'assets/admin/images/upload/original/'.$vehicle[0]->image; ?>" style="width: 100%; height: 100%;" />  <!-- style="width: 650px;" -->
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="button" class="btn btn-primary" id="update" style="display: none;">Update</button>
                      <button type="button" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39; display: none;" onclick="readonly()" id="cancel">Cancel</button>
                    </div>
                  <!-- </form> -->
                </div>
            </div><!-- /.col -->
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper