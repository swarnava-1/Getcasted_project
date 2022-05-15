<script type="text/javascript">
    function checkDelete(id) {
        if(confirm("Sure ! Are you want to delete ?")){
            $("#loader").show();
            $.ajax({
                      url: "<?php echo base_url().'admin/numbers/';?>delete_user?id="+id,
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
                url: "<?php echo base_url().'admin/customers/';?>change_status?id="+id+"&status="+status,
                success: function(result) {
                          //alert(result);
                          location.reload();
                }
            });
    }

</script>


<!-- ====================================================Loader========================================================= -->
    <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Future Guides Admin</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#"></a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">List of Registered Customer</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       
                                    </div>
                                    <div class="panel-body">
                                    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">

                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Firstname</th>
                                                            <th>Id</th>
                                                            <th>Sponser Id</th>
                                                            <th>Email</th>
                                                            <th>Mobile Number</th>
                                                            <th>Registration Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php $i=1; foreach($under_member as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $row->username;?></td>
                                                            <td><?php echo $row->applicantId;?></td>
                                                            <td><?php echo $row->sponsorId;?></td>
                                                            <td><?php echo $row->email; ?></td>
                                                            <td><?php echo $row->mobile;?></td>
                                                            <td><?php echo $row->Date;?></td>
                                                            <td><?php if($_SESSION['applicantId']=='Admin'){?><div style="display: none;"><?php if($row->status=='1'){?><button class="btn btn-block btn-success btn-xs">Active</button><?php } else {?>
                                                              <button class="btn btn-block btn-danger btn-xs">Inactive</button>
                                                            <?php } ?></div><?php } ?>
                                                            <?php if($_SESSION['applicantId']=='Admin'){?>
                                                            <?php if($row->status) { ?>
                                                            <div style="display: inline-block;">
                                                                <button class="btn btn-block btn-success btn-xs" onclick="changeStatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)">Active</button>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div style="display: inline-block;">
                                                                <button class="btn btn-block btn-danger btn-xs" onclick="changeStatus(<?php echo $row->id; ?>, <?php echo $row->status;?>)">Inactive</button>
                                                            </div>
                                                        <?php } ?>         

                                                            </td>
                                                            
                                                            <?php } ?>
                                                           
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

               

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
    
</script> 