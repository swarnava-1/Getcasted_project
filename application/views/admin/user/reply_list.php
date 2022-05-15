<script type="text/javascript">
    function checkDelete(id) {
        if(confirm("Sure ! Are you want to delete ?")){
            $("#loader").show();
            $.ajax({
                      url: "<?php echo base_url().'reply/';?>delete_reply?id="+id,
                      success: function(result) {
                                //alert('result');
                                $("#loader").hide();
                                location.reload();
                      }
            });
        }
    }

    function changeStatus(id, status) {
        $.ajax({
                url: "<?php echo base_url().'accounts/';?>change_status?id="+id+"&status="+status,
                success: function(result) {
                          //alert(result);
                          location.reload();
                }
            });
    }

    function get_cntact_details(contact_id){
        $.ajax({
                url: "<?php echo base_url().'accounts/';?>get_contact_by_account?contact_id="+contact_id,
                success: function(result) {
                    datos = jQuery.parseJSON(result);
                    document.getElementById('name').value = datos[0]['Name'];
                    document.getElementById('designation').value = datos[0]['Designation'];
                    document.getElementById('email').value = datos[0]['email_address'];
                    document.getElementById('cwe').value = datos[0]['Companies_worked_earlier'];
                    document.getElementById('birthday').value = datos[0]['Birthday'];
                    document.getElementById('department').value = datos[0]['Department'];
                    document.getElementById('cdate').value = datos[0]['create_date'];
                    document.getElementById('udate').value = datos[0]['updated_date'];
                }
            });
        }
</script>
<script>
	function edit_bil(id){
		var account_type=$('#editid'+id).data('account_type');
		document.getElementById('account_type').value=account_type;

		var account_name=$('#editid'+id).data('account_name');
		document.getElementById('account_name').value=account_name;

		var address=$('#editid'+id).data('address');
		document.getElementById('address').value=address;

        var wh=$('#editid'+id).data('working_hours');
		document.getElementById('wh').value=wh;

		var Weekly_off=$('#editid'+id).data('weekly_off');
		document.getElementById('wo').value=Weekly_off;

        var Main_Products_of_Customer=$('#editid'+id).data('main_products_of_customer');
		document.getElementById('mpoc').value=Main_Products_of_Customer;
        
        var Special_Feature=$('#editid'+id).data('special_feature');
		document.getElementById('sf').value=Special_Feature;
		
		var Any_other_information=$('#editid'+id).data('any_other_information');
		document.getElementById('aoi').value=Any_other_information;
		
        var cdate=$('#editid'+id).data('created_date');
		document.getElementById('cdateacc').value=cdate;

        var udate=$('#editid'+id).data('updated_date');
		document.getElementById('udateacc').value=udate;
		
	}
</script>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>


<!-- =====================Loader========================================================= -->
    <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Reply</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Reply</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">List of Reply</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Reply</h3>
                                        <a href="<?php echo base_url();?>reply/add_reply"> <button id="addToTable" class="btn btn-primary waves-effect waves-light" style="margin-top: -29px;">Add reply<i class="fa fa-plus"></i> </button></a>
                                    </div>
                                    
                                    <div class="panel-body">
                                    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">

                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>serial number</th>
                                                            <th>Contact email</th>
                                                            <th>Subject</th>
                                                            <th>Body</th>
                                                            <th>Cc</th>
                                                            <th>Bcc</th>
                                                            <th>Created date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;foreach($reply as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td>
                                                            <td><?php echo $row->mailids;?></td>
                                                            <td> <?php echo $row->subject;?></td>
                                                            <td><?php echo $row->comment;?></td>
                                                            <td> <?php echo $row->cc;?></td>
                                                            <td><?php echo $row->bcc; ?></td>
                                                            <td><?php echo $row->created_date; ?></td>
                                                            <td><center>
                                                            <a href="<?php echo base_url();?>reply/view_reply?id=<?php echo $row->id;?>"><i class="fa fa-eye"></i></a>
                                                            <a href="<?php echo base_url();?>reply/edit_reply?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>
                                                            <a href="#" class="on-default remove-row" onclick="checkDelete(<?php echo $row->id; ?>)"><i class="fa fa-trash-o"></i></a> <center></td></td>
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


                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <!-- Modal contact -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Contacts</h4>
                            </div>
                            <div class="modal-body">
                            <div class="container">
                                <h2>Contact details</h2>
                                           
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name:</th>
                                        <td><input type="text" id="name" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Designation:</th>
                                        <td><input type="text" id="designation" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Email address:</th>
                                        <td><input type="text" id="email" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Companies worked earlier:</th>
                                        <td><input type="text" id="cwe" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Birthday:</th>
                                        <td><input type="text" id="birthday" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Department:</th>
                                        <td><input type="text" id="department" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Created date:</th>
                                        <td><input type="text" id="cdate" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Updated date:</th>
                                        <td><input type="text" id="udate" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
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
                    
                <!-- Modal account -->
                    <div class="modal fade" id="myModalaccount" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Account</h4>
                            </div>
                            <div class="modal-body">
                            <div class="container">
                                <h2>Account details</h2>
                                           
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:190px;">Account type:</th>
                                        <td style="width:190px;"><input type="text" id="account_type" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Account Name:</th>
                                        <td style="width:190px;"><input type="text" id="account_name" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td style="width:190px;"><input type="text" id="address" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;width:115%;"></td>
                                    </tr>
                                    <tr>
                                        <th>Working Hours:</th>
                                        <td style="width:190px;"><input type="text" id="wh" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Weekly off:</th>
                                        <td><input type="text" id="wo" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Main Products of Customer:</th>
                                        <td><input type="text" id="mpoc" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                        <th>Special Feature:</th>
                                        <td style="width:190px;"><input type="text" id="sf" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                     <tr>
                                        <th>Any other information:</th>
                                        <td style="width:190px;"><input type="text" id="aoi" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Created date:</th>
                                        <td style="width:190px;"><input type="text" id="cdateacc" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
                                    </tr>
                                    <tr>
                                        <th>Updated date:</th>
                                        <td style="width:190px;"><input type="text" id="udateacc" readonly style="border: none;outline: none;background-color: transparent;font-family: inherit;font-size: inherit;"></td>
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
