<script type="text/javascript">
    function checkDelete(id) {
        if(confirm("Sure ! Are you want to delete ?")){
            $("#loader").show();
            $.ajax({
                      url: "<?php echo base_url().'mom/';?>delete_reply?id="+id,
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
                                <h4 class="pull-left page-title">Minutes of Meeting</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Minutes of Meeting</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">List of MOM</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Minutes of Meeting</h3>
                                        <a href="<?php echo base_url();?>mom/add_mom"> <button id="addToTable" class="btn btn-primary waves-effect waves-light" style="margin-top: -29px;">Add Minutes of Meeting<i class="fa fa-plus"></i> </button></a>
                                    </div>
                                    
                                    <div class="panel-body">
                                    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">

                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>serial number</th>
                                                            <th>Subject</th>
                                                            <th>Description Minutes of Meeting</th>
                                                            <th>Date Of Meeting</th>
                                                            <th>Accounts</th>
                                                            <th>Created date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                          <?php $i=1;foreach($mom as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $i++;?>.</td>
                                                            <td><?php echo $row->subject;?></td>
                                                            <td><?php echo $row->description;?></td>
                                                            <td><?php echo $row->date;?></td>
                                                            <td><?php $a=explode(",",$row->accounts); foreach($a as $acc){foreach($accounts as $ac){if($ac->id==$acc){echo $ac->account_name.',';}}} ?></td>
                                                            <td><?php echo $row->created_date; ?></td>
                                                            <td><center>
                                                            <a href="<?php echo base_url();?>mom/view_mom?id=<?php echo $row->id;?>"><i class="fa fa-eye"></i></a>
                                                            <a href="<?php echo base_url();?>mom/edit_mom?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>
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
            
                