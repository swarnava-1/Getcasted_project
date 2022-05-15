<script type="text/javascript">
    function checkDelete(id) {
        if(confirm("Sure ! Are you want to delete ?")){
            $("#loader").show();
            $.ajax({
                      url: "<?php echo base_url().'contacts/';?>delete_user?id="+id,
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
                url: "<?php echo base_url().'contacts/';?>change_status?id="+id+"&status="+status,
                success: function(result) {
                          //alert(result);
                          location.reload();
                }
            });
    }
</script>
<script>
	function edit_bil(id){
		var name=$('#editid'+id).data('name');
		document.getElementById('name').value=name;

		var designation=$('#editid'+id).data('designation');
		document.getElementById('designation').value=designation;

		var email=$('#editid'+id).data('email');
		document.getElementById('email').value=email;

        var companies=$('#editid'+id).data('companies');
		document.getElementById('cwe').value=companies;

		var birthday=$('#editid'+id).data('birthday');
		document.getElementById('birthday').value=birthday;

        var department=$('#editid'+id).data('department');
		document.getElementById('department').value=department;

        var cdate=$('#editid'+id).data('create_date');
		document.getElementById('cdate').value=cdate;

        var udate=$('#editid'+id).data('updated_date');
		document.getElementById('udate').value=udate;
		
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
                                <h4 class="pull-left page-title">Contact Management</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">List of Contact</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Contact</h3>
                                        <!--<a href="<?php echo base_url();?>contacts/add_contact"> <button id="addToTable" class="btn btn-primary waves-effect waves-light" style="margin-top: -29px;">Add Contact<i class="fa fa-plus"></i> </button></a>-->
                                    </div>
                                    
                                    <div class="panel-body">
                                    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">

                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl. no</th>
                                                            <th>Emails</th>
                                                            <th>Comment</th>
                                                            <th>Types</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;foreach($mail_list as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td>
                                                            <td><?php echo $row->mailids;?></td>
                                                            <td><?php echo $row->comment;?></td>
                                                            <td><?php echo $row->type; ?></td>
                                                            <td><?php if($row->status) { ?>
                                                            <div style="display: inline-block;">
                                                                <button class="btn btn-block btn-success btn-xs" onclick="changeStatus(<?php echo $row->id; ?>, <?php echo $row->status;?>)">Active</button>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div style="display: inline-block;">
                                                                <button class="btn btn-danger btn-xs" onclick="changeStatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)">Inactive</button>
                                                            <?php } ?>
                                                        
                                                            <td><center>
                                                            <a href="#"><i class="fa fa-eye"></i></a>
                                                            <a href="#" data-toggle="modal" data-target="#myModal"></a>
                                                            <a href="#"><i class="fa fa-edit"></i></a>
                                                            <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> <center></td>
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

                <!-- Modal -->
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
                </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
