<script type="text/javascript">
    function checkDelete(id) {
        if(confirm("Sure ! Are you want to delete ?")) {
            $("#loader").show();
            $.ajax({
                      url: "<?php echo base_url();?>administrator/vehicle/delete_vehicle?id="+id,
                      success: function(result) {
                                //alert('success');
                                $("#loader").hide();
                                location.reload();
                      }
            });
        }
    }

    function changeStatus(id, status) {
        $.ajax({
                url: "<?php echo base_url();?>administrator/vehicle/change_status?id="+id+"&status="+status,
                success: function(result) {
                          //alert(result);
                          location.reload();
                }
            });
    }

</script>

<!-- ====================================================Loader========================================================= -->
    <div style="opacity: 0.5; background: rgba(0, 0, 0, 0.12); width: 100%; height: 100%; z-index: 10; top: 0; left: 0; position: fixed; display: none;" id="loader">
      <div style="margin-top: 17%; width: 100%; margin-left: 5%;">
        <center>
          <img src="<?php echo base_url();?>assets/admin/images/loader2.gif"><br/><br/>
          <label style="color: #000000;">Please wait while delete...</label>
        </center>
      </div>
    </div>
<!-- ==================================================End Loader======================================================= -->

<!-- Content Wrapper. Contains page content --> 
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Vehicle Management
            <small>Vehicle List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li> -->
            <li class="active">Vehicle Management</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Registered Vehicles</h3>
                  <h3 class="box-title" style="float: right;"><a href="<?php echo base_url().'admin/vehicle/add_vehicle'; ?>"><button class="btn btn-block btn-success">Add Vehicle</button></a></h3>
                </div><!-- /.box-header -->

                <!-- ==============================Message============================ -->
                        <?php 
                              $flash_message = $this->session->userdata('message');
                              if($flash_message == 'inserted') { ?>

                                  <div class="alert alert-success alert-dismissable">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <h4>  <i class="icon fa fa-check"></i> Success !</h4>
                                      Record has been inserted successfully !
                                  </div>

                        <?php $this->session->set_userdata('message',''); }  if($flash_message == 'updated') { ?>

                                  <div class="alert alert-success alert-dismissable">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                     <h4> <i class="icon fa fa-check"></i> Success !</h4>
                                      Record has been updated successfully !
                                  </div>

                        <?php $this->session->set_userdata('message',''); }  if($flash_message == 'not_updated') { ?>

                                  <div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <h4><i class="icon fa fa-ban"></i> Oops !</h4>
                                      Faied to update record !
                                  </div>

                        <?php $this->session->set_userdata('message',''); }  if($flash_message == 'not_inserted') { ?>

                                  <div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <h4><i class="icon fa fa-ban"></i> Oops !</h4>
                                      Faied to insert record !
                                  </div>

                        <?php $this->session->set_userdata('message',''); } if($flash_message == 'deleted') { ?>

                                  <div class="alert alert-success alert-dismissable">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                     <h4> <i class="icon fa fa-check"></i> Success !</h4>
                                      Record has been deleted successfully !
                                  </div>

                        <?php $this->session->set_userdata('message',''); } if($flash_message == 'not_deleted') { ?>

                                  <div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <h4><i class="icon fa fa-ban"></i> Oops !</h4>
                                      Faied to delete record !
                                  </div>

                        <?php $this->session->set_userdata('message',''); } ?>
                <!-- ================================================================= -->

                <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead style="background: #FAFAFA;">
                      <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Registration</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Model</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Make</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Distance Driven</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Purchase Date</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Fuel Type</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Color</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Details</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Owner</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach($vlist as $row) { ?>
                          <tr role="row" class="even">
                            <td class="sorting_1">
                                <?php echo $row->registration; ?>
                            </td>
                            <td>
                                <?php echo $row->model; ?>
                            </td>
                            <td>
                                <?php echo $row->make; ?>
                            </td>
                            <td>
                                <?php echo $row->distanceDriven; ?>
                            </td>
                            <td>
                                <?php echo $row->purchaseDate; ?>
                            </td>
                            <td>
                                <?php echo $row->fuel; ?>
                            </td>
                            <td>
                                <?php echo $row->color; ?>
                            </td>
                            <td>
                                <?php if($row->image != null) { ?>
                                  <a href="<?php echo base_url().'assets/admin/images/upload/original/'.$row->image; ?>"><img src="<?php echo base_url().'assets/admin/images/upload/thumb/'.$row->image; ?>" /></a>
                                <?php } ?>
                            </td>
                            <td>
                                <div style="display: inline-block;">
                                    <a href="<?php echo base_url();?>admin/vehicle/vehicle_details?id=<?php echo $row->id;?>"><button class="btn btn-block btn-warning btn-xs">View</button></a>
                                </div>
                            </td>
                            <td>
                              <?php if($row->ownerId != 0) { ?>
                                <a href="<?php base_url();?>user_details?id=<?php echo $row->ownerId;?>"><button class="btn btn-block btn-info btn-xs">Details</button></a>
                              <?php } ?>
                            </td>
                            <td>
                                <?php if($row->status) { ?>
                                    <div style="display: inline-block;">
                                        <button class="btn btn-block btn-success btn-xs" onclick="changeStatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)">Active</button>
                                    </div>
                                <?php } else { ?>
                                    <div style="display: inline-block;">
                                        <button class="btn btn-block btn-danger btn-xs" onclick="changeStatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)">Inactive</button>
                                    </div>
                                <?php } ?>
                            </td>
                            <td>
                                <div style="display: inline-block; width: 45%;">
                                    <a href="<?php echo base_url().'admin/vehicle/edit_vehicle?id='.$row->id; ?>">
                                        <button class="btn btn-block btn-default btn-sm">
                                            <img src="<?php echo base_url().'assets/admin/icons/edit2.png';?>">
                                        </button>
                                    </a>
                                </div>
                                <div style="display: inline-block; width: 45%;">
                                    <button class="btn btn-block btn-default btn-sm" onclick="checkDelete(<?php echo $row->id; ?>)">
                                        <img src="<?php echo base_url().'assets/admin/icons/delete2.png';?>">
                                    </button>
                                </div>
                            </td>
                          </tr>
                      <?php } ?>

                    </tbody>
                    <tfoot>
                      <!-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> -->
                    </tfoot>
                  </table></div></div><!-- <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div> -->
                </div><!-- /.box-body -->
                <div class="box-footer"><?php echo $pagination; ?></div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper