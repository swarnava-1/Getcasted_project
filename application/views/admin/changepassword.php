
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript"></script>
<script> 
        function show_error_message(field_id, error_id, message) {

            $("#"+field_id).css("border", "1px solid red");
            $("#"+error_id).show();
            $("#"+error_id).html(message);
            $("#"+field_id).focus();
        }

        function change_password()
        {
            //alert('hdsfsdfjslkdfd');
          
            var oldPassword = $("#oldPass").val();
             var newPassword = $("#newPass").val();
             var confirmPassword = $("#cPass").val();


            if(oldPassword.search(/\S/) ==-1 || oldPassword =="")  {
                show_error_message("oldPass","oldPass_err", "* Please enter Your Old password !");
                return false;
            }

            else if(newPassword.search(/\S/) ==-1 || newPassword =="")  {
                show_error_message("newPass","newPass_err", "* Please enter your New password !");
                return false;
            }
            else if(confirmPassword.search(/\S/) ==-1 || confirmPassword =="")  {
                show_error_message("cPass","cPass_err", "* Please enter your Confirm password !");
                return false;
            }
            else if(newPassword != confirmPassword) {
                show_error_message("cPass","cPass_err", "* Confirm password is not same !");
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
                                <h4 class="pull-left page-title">Future Guides Admin</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#"></a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Change password</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Change Password</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return change_password();" action="<?php echo base_url();?>admin/changepassword/changepass" method="post">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                </div>
                                                <label for="inputEmail3" class="col-sm-3 form-control-label">Old Password<span class="header-logo-highlight">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                <input type="password" class="form-control" id="oldPass" name ="oldPass" placeholder="Enter Old Password" >
                                                <label id="oldPass_err" style="color: red;"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                </div>
                                                <label for="inputEmail3" class="col-sm-3 form-control-label">New Password<span class="header-logo-highlight">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                <input type="password" class="form-control" id="newPass" name ="newPass" placeholder="Enter New Password" >
                                                <label id="newPass_err" style="color: red;"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                </div>
                                                <label for="inputEmail3" class="col-sm-3 form-control-label">Confirm Password<span class="header-logo-highlight">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                <input type="password" class="form-control" id="cPass" name ="cPass" placeholder="Enter Confirm Password" >
                                                <label id="cPass_err" style="color: red;"></label>
                                                </div>
                                            </div>
                                              
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                  <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button><a href="index"><button class="btn btn-default waves-effect" type="button">Cancel</button></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->



            </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->