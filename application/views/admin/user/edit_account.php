<script type="text/javascript">
     $( document ).ready(function() {
       $('#account_type').change(function () {
            var value = $(this).val();//alert(value);
            if (value == 'Dealer') {
                $("#d_name").show();
            }else{
                $("#d_name").hide();
            }

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
                                <h4 class="pull-left page-title">Account Management</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Edit Account</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Account Management</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return validate_quote();" action="<?php echo base_url();?>accounts/update_account" method="post" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Account type</label>
                                                    <div class="col-lg-10">
                                                      <select name="account_type" id="account_type" class="form-control">
                                                          <option value="Dealer" <?php if($number[0]->Account_type=='Dealer')echo "selected";?>>Dealer</option>
                                                          <option value="Direct" <?php if($number[0]->Account_type=='Direct')echo "selected";?>>Direct</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <?php if($number[0]->Account_type=='Dealer'){?>
                                                <div class="form-group" id="d_name">
                                                    <label for="firstname" class="control-label col-lg-2">Dealer Name</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="address" name="dealer_name" value="<?php echo $number[0]->delear_name;?>" placeholder="Dealer name" type="text" required="required">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Parent account</label>
                                                    <div class="col-lg-10">
                                                        <select name="account_id" id="account_id" class="form-control">
                                                            <option>Select Parent account</option>
                                                            <?php $this->load->model('web_model');$accounts = $this->web_model->get_all_account_data();foreach($accounts as $account){?>
                                                            <option value="<?php echo $account->id?>" <?php if($number[0]->parent_id==$account->id){ echo 'selected';}?>><?php echo $account->account_name;?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                     
                                                    </div>
                                                </div>
                                                <input type = "hidden" value="<?php echo $number[0]->id;?>" name="id">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Account name</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="address" value="<?php echo $number[0]->account_name;?>" name="account_name" placeholder="Account name" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Address</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="address" name="address" value="<?php echo $number[0]->Address;?>" placeholder="Address" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Working Hours</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="working_hours" name="working_hours" value="<?php echo $number[0]->Working_Hours;?>" placeholder="Working Hours" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Weekly off</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Weekly_off" name="Weekly_off" placeholder="Weekly off" value="<?php echo $number[0]->Weekly_off;?>" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Main Products of Customer</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Main_Products_of_Customer" name="Main_Products_of_Customer" value="<?php echo $number[0]->Main_Products_of_Customer;?>" placeholder="Main Products of Customer" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Special Feature</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="Special_Feature" name="Special_Feature" placeholder="Special Feature" type="text" value="<?php echo $number[0]->Special_Feature;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Any other information</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Any_other_information" name="Any_other_information" placeholder="Any other information" value="<?php echo $number[0]->Any_other_information;?>" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Competition Information</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="competition_information" name="competition_information" value="<?php echo $number[0]->competition_information;?>" placeholder="Competition Information" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Sales call</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="sales_call" name="sales_call" value="<?php echo $number[0]->sales_call;?>" placeholder="Sales call" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Service call</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="service_call" name="service_call" value="<?php echo $number[0]->service_call;?>" placeholder="Service call" type="text">
                                                    </div>
                                                </div>
                                                <!--<div class="form-group ">-->
                                                <!--    <label for="lastname" class="control-label col-lg-2"> Choose contact</label>-->
                                                <!--    <div class="col-lg-10">-->
                                                        
                                                <!--        <select name="contact_id" id="contact_id" class="form-control">-->
                                                <!--            <option>Select account</option>-->
                                                <!--            <?php $this->load->model('web_model');$contacts = $this->web_model->get_all_contacts();foreach($contacts as $contact){?>-->
                                                <!--            <option value="<?php echo $contact->id?>" <?php if($number[0]->contact_id==$contact->id){ echo 'selected';}?>><?php echo $contact->Name;?>-->
                                                <!--            </option>-->
                                                <!--            <?php } ?>-->
                                                <!--        </select>-->
                                                     
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                               <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button><a href="<?php echo base_url().'accounts'?>"><button class="btn btn-default waves-effect" type="button">Cancel</button></a>
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