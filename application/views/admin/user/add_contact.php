<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
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
    $('select').selectpicker();
</script>

<style>
    .select2-container{width:59% !important;}
</style>

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
                                <h4 class="pull-left page-title">Contact Management</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Add New Contact</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Contact Management</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return validate_quote();" action="<?php echo base_url();?>contacts/insert_contact" method="post" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Name</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="Name" name="Name" placeholder="Name" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Designation</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Designation" name="Designation" placeholder="Designation" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Email</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="email_address" name="email_address" placeholder="Email address" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Companies worked earlier</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Companies_worked_earlier" name="Companies_worked_earlier" placeholder="Companies worked earlier" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Birthday</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="Birthday" name="Birthday" placeholder="Birthday(DD-MM)" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Department</label>
                                                    <div class="col-lg-10">
                                                        <!--<input class=" form-control" id="Department" name="Department" placeholder="Department" type="text" required="required">-->
                                                        <select class="form-control" id="Department" name="Department" required>
                                                            <option value="">Please select</option>
                                                            <option value="Administration">Administration</option>
                                                            <option value="Purchasing">Purchasing</option>
                                                            <option value="Production">Production</option>
                                                            <option value="Maintenance">Maintenance</option>
                                                            <option value="Central Maintenance">Central Maintenance</option>
                                                            <option value="User - Foundry">User - Foundry</option>
                                                            <option value="User - Machine Shop">User - Machine Shop</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Select Accounts</label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control selectpicker" multiple data-live-search="true" id="account_id" name="account_id[]" required>
                                                          <!--<option value="">Please select</</option>-->
                                                          <?php foreach($accounts as $acc){?>
                                                              <option 
                                                                value="<?php echo $acc->id;?>">
                                                                <?php echo $acc->account_name;?>
                                                              </option>
                                                            <?php } ?>
                                                         </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                               <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button><a href="<?php echo base_url().'contacts'?>"><button class="btn btn-default waves-effect" type="button">Cancel</button></a>
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