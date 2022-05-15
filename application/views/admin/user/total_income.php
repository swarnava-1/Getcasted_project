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
                            <h4 class="pull-left page-title">Welcome !<b style="color:red;"><?php echo $this->session->userdata('name')?></b> &nbsp;
                                <?php if( $this->session->userdata('status')==1){?>
                                <button class="text-success"> Active </button>
                                 <?php }else{ ?>
                                 <button class="text-danger"> Inactive </button>
                                  <?php } ?>
                                  <button class="text-success"> Complete Label : <?php echo $this->session->userdata('label')  ?>  </button>
                                
                                <br/>
                                
                                 
                                </h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Future Guides Admin</a></li>
                                    <li class="active">List of Registered Customer INCOME</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                     
                                     <?php echo prize_money() ?>
                                    </div>
                                    <div class="panel-body">
                                    
                              <!--          <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">

                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>USER NAME</th>
                                                            <th>USER ID</th>
                                                            <th>PNR</th>
                                                            <th>COLLECT AMOUNT</th>
                                                            <th>WHICH CUSTOMER</th>
                                                            <th>WHICH ID</th>
                                                            <th>DATE OF COLLECTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php $i=1;foreach($ulist as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $row->name;?></td>
                                                            <td><?php echo $row->user_id;?></td>
                                                            <td><?php echo $row->pnr;?></td>
                                                            <td><?php echo $row->amount; ?></td>
                                                            <td><?php echo $row->col_name;?></td>
                                                            <td><?php echo $row->whichid;?></td>
                                                            <td><?php echo $row->date;?></td>
                                                            
                                                           </td>
                                                        </tr>
                                                         <?php } ?>
                                                    </tbody> 
                                                </table>
                                             </div>
                                            </div>
                                        </div>
                              -->      </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->

               

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
