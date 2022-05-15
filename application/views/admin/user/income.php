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
                                <h4 class="pull-left page-title">User Income</h4>
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
                                            <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url();?>admin/customers/sendmoney" method="post">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="control-label col-lg-2">Name</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" id="fname" name="name" placeholder="Enter First Name" value="<?php echo $ulist[0]->username;?>">
                                                        <input type="hidden" name="id" value="<?php echo $ulist[0]->id;?>">
                                                    </div>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="control-label col-lg-2">User Id</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" id="lname" name="appid" placeholder="Enter User Id" value="<?php echo $ulist[0]->applicantId;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="control-label col-lg-2">PNR</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" required class="form-control" id="pnr" name="pnr" placeholder="Enter PNR" value="">
                                                        </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="control-label col-lg-2">Amount</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" required class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="control-label col-lg-2">Date</label>
                                                        <div class="col-lg-10">
                                                            <input type="date" class="form-control" id="date" name="date" required placeholder="Enter Email" value="">
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="control-label col-lg-2">Which Id</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="whichid" name="whichid" required placeholder="Which Id" value="">
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="control-label col-lg-2">Collecter name</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="cname" name="cname" required placeholder="Collecter name" value="">
                                                        </div>
                                                </div>
                                              
                        					    
                                                <div class="form-group">
                                                 <div class="col-lg-offset-2 col-lg-10">
                                                       <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button><a href="<?php echo base_url().'admin/index'?>"><button class="btn btn-default waves-effect" type="button">Cancel</button></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->



           