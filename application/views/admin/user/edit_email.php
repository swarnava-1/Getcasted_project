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
                                <h4 class="pull-left page-title">Receiver's Email Management</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Fancynumber</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Edit Email</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Receiver's Email Management</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url();?>admin/index/update_email" method="post">
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Email *</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="email" name="email" placeholder="Enter Email" type="text" value="<?php echo $curemail[0]->email; ?>" required>
                                                        <input type="text" name="cid" value="<?php echo $curemail[0]->id; ?>" style="display: none;">
                                                    </div>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                  <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>                                   <a href="<?php echo base_url().'admin'?>"><button class="btn btn-default waves-effect" type="button">Cancel</button></a>
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