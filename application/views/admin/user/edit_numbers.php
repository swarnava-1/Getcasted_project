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
                                <h4 class="pull-left page-title">Numbers Management</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Fancynumber</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Edit Number</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Numbers Management</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return validate_quote();" action="<?php echo base_url();?>admin/numbers/update_number" method="post">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Date *</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="date" name="date" placeholder="Enter Date" type="date" value="<?php echo $number[0]->date; ?>">
                                                        <input type="text" name="cid" value="<?php echo $number[0]->id; ?>" style="display: none;">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Country *</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="country" name="country" placeholder="Enter Country" type="text" value="<?php echo $number[0]->country; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Mobie Number *</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" type="text" value="<?php echo $number[0]->mobnumber; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Network *</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="network" name="network" placeholder="Enter Network" type="text" value="<?php echo $number[0]->network; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Value *</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="value" name="value" placeholder="Enter Value" type="text" value="<?php echo $number[0]->value; ?>">
                                                    </div>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                  <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>                                   <a href="<?php echo base_url().'admin/numbers'?>"><button class="btn btn-default waves-effect" type="button">Cancel</button></a>
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