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
<script>
	function edit_bil(id){
		var comment=$('#editid'+id).data('comment');
		//alert(comment);
		document.getElementById('comment').value=comment;
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
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return validate_quote();" action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Name</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="Name" name="Name" placeholder="Name" type="text" readonly value="<?php echo $contact[0]->Name;?>">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $contact[0]->id;?>">
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Designation</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Designation" name="Designation" placeholder="Designation" type="text" readonly value="<?php echo $contact[0]->Designation;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Email</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="email_address" name="email_address" placeholder="Email address" type="text" readonly value="<?php echo $contact[0]->email_address;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Companies worked earlier</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Companies_worked_earlier" name="Companies_worked_earlier" placeholder="Companies worked earlier" type="text" readonly value="<?php echo $contact[0]->Companies_worked_earlier;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Birthday</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="Birthday" name="Birthday" placeholder="Birthday" type="text" readonly value="<?php echo $contact[0]->Birthday;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Department</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Department" name="Department" placeholder="Department" type="text" readonly value="<?php echo $contact[0]->Department;?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div>
                        <div class="row">
                            <div class="col-md-12"><h3 class="panel-title">Related account list</h3>
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
                                                            <th>Parent account</th>
                                                            <th>Address</th>
                                                            <th>Working Hours</th>
                                                            <th>Weekly off</th>
                                                            <th>Main Products of Customer</th>
                                                            <th>Special Feature</th>
                                                            <th>Any other information</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;$acc_id = $contact[0]->accounts_id;$account_id_exp = explode(',',$acc_id);if(!empty($account_id_exp)){foreach($account_id_exp as $eip) {?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) echo $row->Account_type;}?></td>
                                                            <td><a href="<?php echo base_url();?>accounts/view_account?id=<?php echo $eip;?>" target="_blank"><?php foreach($accounts as $row){if($eip==$row->id) echo $row->account_name;}?></a></td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) {$p_id = $row->parent_id;$this->load->model('web_model');
                                                            $parent_account_name = $this->web_model->get_account_by_id($p_id);echo $parent_account_name[0]->account_name;}}?></td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) echo $row->Address;}?></td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) echo $row->Working_Hours;}?></td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) echo $row->Weekly_off;}?></td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) echo $row->Main_Products_of_Customer;}?></td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) echo $row->Special_Feature;}?></td>
                                                            <td><?php foreach($accounts as $row){if($eip==$row->id) echo $row->Any_other_information;}?></td> 
                                                        </tr>
                                                         <?php }}else{?> <tr><?php echo 'No Related Accounts';}?></tr>
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
                            <div class="col-md-12"><h3 class="panel-title">Sent Email</h3>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="datatable1" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial Number</th>
                                                            <th>To</th>
                                                            <th>From</th>
                                                            <th>Subject</th>
                                                            <!--<th>Message Body</th>-->
                                                            <th>Cc</th>
                                                            <!--<th>Bcc</th>-->
                                                            <th>Attachment 1</th>
                                                            <th>Attachment 2</th>
                                                            <th>Attachment 3</th>
                                                            <th>Attachment 4</th>
                                                            <th>Attachment 5</th>
                                                            <th>Sent Date</th>
                                                            <th>View Message</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;foreach($emails as $email){$cont_id = $email->contact_id;$contact_id_exp = explode(',',$cont_id);if(in_array($contact[0]->id, $contact_id_exp)){?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td>
                                                            <td><?php echo $contact[0]->Name;?></td>
                                                            <td><?php echo $this->session->userdata('User');?></td>
                                                            <td><?php echo $email->subject;?></td>
                                                            <!--<td><?php// echo $email->comment;?></td>-->
                                                            <td><?php echo $email->cc;?></td>
                                                            <!--<td><?php echo $email->bcc;?></td>-->
                                                            <td><?php if($email->attachment1!=''){?><a href="<?php echo base_url();echo $email->attachment1;?>">File 1</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment2!=''){?><a href="<?php echo base_url();echo $email->attachment2;?>">File 2</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment3!=''){?><a href="<?php echo base_url();echo $email->attachment3;?>">File 3</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment4!=''){?><a href="<?php echo base_url();echo $email->attachment4;?>">File 4</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment5!=''){?><a href="<?php echo base_url();echo $email->attachment5;?>">File 5</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php echo $email->created_date;?></td>
                                                            <td><a href="#" data-toggle="modal" data-target="#myModal" data-eid="<?php echo $email->id;?>" 
                                                            data-comment="<?php echo $email->comment;?>" id="editid<?php echo $email->id;?>" onclick="edit_bil(<?php echo $email->id;?>)"><i class="fa fa-eye"></i></a></td>
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
                         <div class="row">
                            <div class="col-md-12"><h3 class="panel-title">Received Email</h3>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="datatable2" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial Number</th>
                                                            <th>To</th>
                                                            <th>From</th>
                                                            <th>Subject</th>
                                                            <!--<th>Message Body</th>-->
                                                            <th>Cc</th>
                                                            <!--<th>Bcc</th>-->
                                                            <th>Attachment 1</th>
                                                            <th>Attachment 2</th>
                                                            <th>Attachment 3</th>
                                                            <th>Attachment 4</th>
                                                            <th>Attachment 5</th>
                                                            <th>Received Date</th>
                                                            <th>View Message</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;foreach($receivedemails as $email){$cont_id = $email->contact_id;$contact_id_exp = explode(',',$cont_id);if(in_array($contact[0]->id, $contact_id_exp)){?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td> 
                                                            <td><?php echo $this->session->userdata('User');?></td>
                                                            <td><?php echo $contact[0]->Name;?></td>
                                                            <td><?php echo $email->subject;?></td>
                                                            <!--<td><?php echo $email->comment;?></td>-->
                                                            <td><?php echo $email->cc;?></td>
                                                            <!--<td><?php echo $email->bcc;?></td>-->
                                                            <td><?php if($email->attachment1!=''){?><a href="<?php echo base_url();echo $email->attachment1;?>">File 1</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment2!=''){?><a href="<?php echo base_url();echo $email->attachment2;?>">File 2</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment3!=''){?><a href="<?php echo base_url();echo $email->attachment3;?>">File 3</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment4!=''){?><a href="<?php echo base_url();echo $email->attachment4;?>">File 4</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php if($email->attachment5!=''){?><a href="<?php echo base_url();echo $email->attachment5;?>">File 5</a><?php }else{echo 'No attachment';}?></td>
                                                            <td><?php echo $email->created_date;?></td>
                                                            <td><a href="#" data-toggle="modal" data-target="#myModal" data-eid="<?php echo $email->id;?>" 
                                                            data-comment="<?php echo $email->comment;?>" id="editid<?php echo $email->id;?>" onclick="edit_bil(<?php echo $email->id;?>)"><i class="fa fa-eye"></i></a></td>
                                                            
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
                            
                        </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->
                <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <!--<h4 class="modal-title">Contacts</h4>-->
                            </div>
                            <div class="modal-body">
                            <div class="container">
                                <h5>Message Body</h5>
                                           
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td><textarea  id="comment" readonly class=" form-control" style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></textarea></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->