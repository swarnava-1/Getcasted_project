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
                                <h4 class="pull-left page-title">Account Management</h4>
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
                                    <div class="panel-heading"><h3 class="panel-title">Account Management</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return validate_quote();" action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Account type</label>
                                                    <div class="col-lg-10">
                                                      <select name="account_type" id="account_type" class="form-control" disabled>
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
                                                        <select name="account_id" id="account_id" class="form-control" disabled>
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
                                                        <input class="form-control" id="address" value="<?php echo $number[0]->account_name;?>" name="account_name" placeholder="Account name" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Address</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="address" name="address" value="<?php echo $number[0]->Address;?>" placeholder="Address" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Working Hours</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="working_hours" name="working_hours" value="<?php echo $number[0]->Working_Hours;?>" placeholder="Working Hours" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Weekly off</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Weekly_off" name="Weekly_off" placeholder="Weekly off" value="<?php echo $number[0]->Weekly_off;?>" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Main Products of Customer</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Main_Products_of_Customer" name="Main_Products_of_Customer" value="<?php echo $number[0]->Main_Products_of_Customer;?>" placeholder="Main Products of Customer" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Special Feature</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="Special_Feature" name="Special_Feature" placeholder="Special Feature" type="text" value="<?php echo $number[0]->Special_Feature;?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Any other information</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Any_other_information" name="Any_other_information" placeholder="Any other information" value="<?php echo $number[0]->Any_other_information;?>" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Competition Information</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="competition_information" name="competition_information" value="<?php echo $number[0]->competition_information;?>" placeholder="Competition Information" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Sales call</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="sales_call" name="sales_call" value="<?php echo $number[0]->sales_call;?>" placeholder="Sales call" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Service call</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="service_call" name="service_call" value="<?php echo $number[0]->service_call;?>" placeholder="Service call" type="text" readonly>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div>
                        <div class="row">
                            <div class="col-md-12"><h3 class="panel-title">Child account list</h3>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>serial number</th>
                                                            <th>Account type</th>
                                                            <th>Account name</th>
                                                            <th>Address</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;foreach($childe_account as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td>
                                                            <td><?php echo $row->Account_type;?></td>
                                                            <td><?php echo $row->account_name;?></td>
                                                            <td> <?php echo $row->Address;?></td>
                                                        </tr>
                                                         <?php } ?>
                                                    </tbody>
                                                </table>
                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->
                        <div class="row">
                            <div class="col-md-12"><h3 class="panel-title">Related contact list</h3><button type="button" class="btn btn-warning" style="float:right;
    margin-top: -38px;" data-toggle="modal" data-target="#myModal">Email</button>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="datatable1" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>serial number</th>
                                                            <th>Contact Name</th>
                                                            <th>Designation</th>
                                                            <th>Email address</th>
                                                            <th>Companies worked earlier</th>
                                                            <th>Birthday</th>
                                                            <th>Department</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;foreach($contacts as $row){
                                                            $acc_id = $row->accounts_id;$account_id_exp = explode(',',$acc_id);if(in_array($number[0]->id, $account_id_exp)){?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td>
                                                            <td><a href="<?php echo base_url();?>contacts/view_contact?id=<?php echo $row->id;?>" target="_blank"><?php echo $row->Name;?></a></td>
                                                            <td><?php echo $row->Designation;?></td>
                                                            <td><?php echo $row->email_address; ?></td>
                                                            <td><?php echo $row->Companies_worked_earlier;?></td>
                                                            <td><?php echo $row->Birthday;?></td>
                                                            <td><?php echo $row->Department;?></td>
                                                        </tr>
                                                         <?php } } ?>
                                                    </tbody>
                                                </table>
                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
                
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Email</h4>
                      </div>
                      <form action="<?php echo base_url();?>accounts/sendmail" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contacts mailid:</label>
                            <input type="text" class="form-control" name="mailid" id="mailid" value="<?php foreach($contacts as $row){
                                                            $acc_id = $row->accounts_id;$account_id_exp = explode(',',$acc_id);if(in_array($number[0]->id, $account_id_exp)){echo $row->email_address.',';}}?>" placeholder="Contacts mailid">
                         </div>
                         <input type="hidden" class="form-control" name="contact_id" id="contact_id" value="<?php foreach($contacts as $row){
                                                            $acc_id = $row->accounts_id;$account_id_exp = explode(',',$acc_id);if(in_array($number[0]->id, $account_id_exp)){echo $row->id.',';}}?>" placeholder="Contacts mailid">
                         <div class="form-group">
                            <label for="exampleInputPassword1">Cc:</label>
                            <input type="text" class="form-control" name="cc" id="mailid" value="" placeholder="Cc">
                         </div>
                         <div class="form-group">
                            <label for="exampleInputPassword1">Bcc:</label>
                            <input type="text" class="form-control" name="bcc" id="mailid" value="" placeholder="Bcc">
                         </div>
                         <div class="form-group">
                            <label for="exampleInputPassword1">Subject:</label>
                            <input type="text" class="form-control" name="subject" id="mailid" value="" placeholder="Subject">
                         </div>
                         <div class="form-group">
                          <label for="comment">Body:</label>
                          <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="comment">Attachment 1:</label>
                                <input type='file' name='file1'>
                        </div> 
                        <div class="form-group">
                          <label for="comment">Attachment 2:</label>
                                <input type='file' name='file2'>
                        </div> 
                        <div class="form-group">
                          <label for="comment">Attachment 3:</label>
                                <input type='file' name='file3'>
                        </div> 
                        <div class="form-group">
                          <label for="comment">Attachment 4:</label>
                                <input type='file' name='file4'>
                        </div> 
                        <div class="form-group">
                          <label for="comment">Attachment 5:</label>
                                <input type='file' name='file5'>
                        </div> 
                      </div>
                      <button type="submit" class="btn btn-success waves-effect waves-light">Send</button>
                      </form>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                
                  </div>
                </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->