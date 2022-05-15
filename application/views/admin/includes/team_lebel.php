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
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <form  method='post' action="<?php echo $this->config->base_url()?>admin/customers/search_label">
                        <div class="row">
							<div class="col-lg-2">
									Label :  
							</div>
							<div class="col-lg-3">
									<select name='label' class="form-control">
 											 <option value=0 <?php echo ($lebel==0)?'selected':'' ?> >0</option>
 											  <option value=1 <?php echo ($lebel==1)?'selected':'' ?>>1</option>
 											  <option value=2 <?php echo ($lebel==2)?'selected':'' ?>>2</option>
 											  <option value=3 <?php echo ($lebel==3)?'selected':'' ?>>3</option>
 											  <option value=4 <?php echo ($lebel==4)?'selected':'' ?>>4</option>
 											  <option value=5 <?php echo ($lebel==5)?'selected':'' ?>>5</option>
 											  <option value=6 <?php echo ($lebel==6)?'selected':'' ?>>6</option>
 											  <option value=7 <?php echo ($lebel==7)?'selected':'' ?>>7</option>
 											  <option value=8 <?php echo ($lebel==8)?'selected':'' ?>>8</option>
 											  <option value=9 <?php echo ($lebel==9)?'selected':'' ?>>9</option>
 											  <option value=10 <?php echo ($lebel==10)?'selected':'' ?>>10</option>
 											  
									</select>
							</div>
							<div class="col-lg-3">
								<button type="submit" class="btn btn-success">Search</button>
							</div>
						</div>
						</form>
						<br/>
					 
<div class="row">
<div class="col-lg-12">
 <div class="table-responsive">          
  <table class="table table-condensed table-bordered datatbl">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Id</th>
        <th>Sponser's Id</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Registration Date</th>
        <th>Status</th>
      
        
       </tr>
    </thead>
 
    <tbody>
    
    	<?php 
    	if(count($team_lebel)>0){
			
		 
    	
    	for($i=0; $i<count($team_lebel); $i++){ ?>
			<tr>
       		 <td><?php echo ($i+1)?></td>
        	<td><?php echo $team_lebel[$i]->username ;?></td>
        	<td><?php echo $team_lebel[$i]->applicantId;?></td>
        	<td><?php echo $team_lebel[$i]->sponsorId;?></td>
       	 	<td><?php echo $team_lebel[$i]->email;?></td>
       	 	<td><?php echo $team_lebel[$i]->mobile;?></td>
       	 	<td><?php echo $team_lebel[$i]->Date;?></td>
       	 	<td <?php echo $team_lebel[$i]->status==1? 'class="text-success"':'' ;?>><?php echo $team_lebel[$i]->status==1? 'Active':'Inactive' ;?></td>
       	 	
       	 	<?php if($_SESSION['applicantId']=='Admin'){?>
       	 	<td><?php echo $team_lebel[$i]->status==1? '<button type="button" data-set_status=0 data-val="'.  $team_lebel[$i]->applicantId.'"class="btn btn-success change-status">Active</button>':'<button type="button" data-set_status=1 data-val="'.  $team_lebel[$i]->applicantId.'"class="btn btn-danger change-status">Inactive</button>' ;?></td>
       	 	
       	 	<?php }
       	 	else{?>
       	 	
       	 	<?php 
       	 	} 
       	 	}?>
       	 	
       </tr>
		<?php } ?>
    
    
       
    </tbody>
  </table>
  </div>
 </div>                        
</div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>
             
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->