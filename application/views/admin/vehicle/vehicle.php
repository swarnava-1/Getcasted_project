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

                </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" onsubmit="return validate_user();" action="insert_user" method="post">
                    <div class="box-body">

                      <div class="form-group" style="width: 30%;" id="fname_div">
                        <label for="exampleInputEmail1">Registration </label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
                      </div>
                      <div class="form-group" style="width: 30%; margin-left: 3%;" id="lname_div">
                        <label for="exampleInputPassword1">Model</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
                      </div>

                      <div class="form-group" style="width: 30%;"></div>

                      <div class="form-group" style="width: 30%;" id="email_div">
                        <label for="exampleInputPassword1">Make</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                      </div>
                      <div class="form-group" style="width: 30%; margin-left: 3%;" id="uname_div">
                        <label for="exampleInputEmail1">Distance Driven</label>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username">
                      </div>

                      <div class="form-group" style="width: 30%;"></div>

                      <div class="form-group" style="width: 30%; display: inline-block;" id="password_div">
                        <label for="exampleInputPassword1">Owner</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                      </div>
                      
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