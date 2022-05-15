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
                url: "<?php echo base_url().'admin/numbers/';?>change_status?id="+id+"&status="+status,
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
                                <h4 class="pull-left page-title">Customer Management</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">eGoldTV</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">List of Shipping Company</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">List of Shipping Company</h3>
                                        <!-- <a href="<?php echo base_url();?>admin/customers/add_customers"> <button id="addToTable" class="btn btn-primary waves-effect waves-light" style="margin-left: 887px; margin-top: -29px;">Add Customer<i class="fa fa-plus"></i> </button></a> -->
                                    </div>
                                    <div class="panel-body">
                                    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">

                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Gateway</th>
                                                            <th>Center</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php foreach($shipping as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $row->shippingcompany;?></td>
                                                            <td> <?php echo $row->satus;?></td>
                                                           </td>
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
