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
                                <h4 class="pull-left page-title">View Reply</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Reply</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">View Reply</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">View Reply</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Add Contacts</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" input class="form-control" value="<?php $cont_id = $number[0]->contact_id;foreach($contacts as $cont){$cont_id_exp = explode(',',$cont_id); foreach($cont_id_exp as $eip){ if($eip==$cont->id) echo $cont->Name.',';}}?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group " id="d_name">
                                                    <label for="firstname" class="control-label col-lg-2">Mail id</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="email" name="email" value="<?php echo $number[0]->mailids;?>" placeholder="Mail id" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Subject</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="subject" name="subject" value="<?php echo $number[0]->subject;?>" placeholder="Subject" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Body</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="body" name="body" value="<?php echo $number[0]->comment;?>" placeholder="Body" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Cc</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="cc" name="cc" value="<?php echo $number[0]->cc;?>" placeholder="Cc" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Bcc</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="bcc" name="bcc" value="<?php echo $number[0]->bcc;?>" placeholder="Bcc" type="text">
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div>
                    </div> <!-- container -->         
                </div> <!-- content -->
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->