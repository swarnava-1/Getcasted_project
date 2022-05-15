 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->   
            
      <style>
      	* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; 
	text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	padding-top: 64px;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 70;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

      </style>                  
            <div class="content-page" style="background:#98918f82;">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row" style="background:white;">
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
                        </div><br>

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        
                                    
                                    <div class="panel-body" style="background:skyblue;" style="overflow-y: scroll;overflow-x: scroll;">
                                    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                             <div class="table-responsive" data-pattern="priority-columns">
                                                <div class="col-sm-offset-2">
                                                    <div class="tree">
                                                        <?php printTree($tree);?>
                                                       <!-- <ul>
                                                            <li>
                                                    		<b>	<a style="background:yellow" href="#"><?php echo $this->session->userdata('applicantId'); ?></a>
                                                    			<?php //print_menu($this->session->userdata('applicantId'));?></b>
                                                            </li>		
                                                        </ul>-->	 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div> <!-- End Row -->
                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
            
            <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script> 
                                    <!-- ============================================================== -->
                                    <!-- End Right content here -->
                                    <!-- ============================================================== -->