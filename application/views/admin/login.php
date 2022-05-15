<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url();?>assets2/assets/admin2/images/favicon.ico">

        <title>HYDROILTEK CRM</title>

        <!-- Base Css Files -->
        <link href="<?php echo base_url();?>assets2/assets/admin2/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?php echo base_url();?>assets2/assets/admin2/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets2/assets/admin2/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets2/assets/admin2/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="<?php echo base_url();?>assets2/assets/admin2/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?php echo base_url();?>assets2/assets/admin2/css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="<?php echo base_url();?>assets2/assets/admin2/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets2/assets/admin2/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url();?>assets2/assets/admin2/js/modernizr.min.js"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>HYDROILTEK SYSTEMS</strong> </h3>
                </div> 

<div style="color: red; font-style: inherit; margin-bottom: 4%;">
					<center>
						<b><?php echo $this->session->userdata('err_msg'); $this->session->set_userdata('err_msg','');?></b>
					</center>
				</div>
                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="post" action="<?php echo base_url();?>login/validate">
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg " type="text" required placeholder="Username" id="username" name="uname">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required placeholder="Password" id="password" name="pass">
                        </div>
                    </div>

                    <!--<div class="form-group ">-->
                    <!--    <div class="col-xs-12">-->
                    <!--        <div class="checkbox checkbox-primary">-->
                    <!--            <input id="checkbox-signup" type="checkbox">-->
                    <!--            <label for="checkbox-signup">-->
                    <!--                Remember me-->
                    <!--            </label>-->
                    <!--        </div>-->
                            
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Sign In</button>
                        </div>
                    </div>

                    <!--<div class="form-group m-t-30">-->
                    <!--    <div class="col-sm-7">-->
                    <!--       <a href="javascript:void(0);"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>-->
                    <!--    </div>-->
                    <!--    <div class="col-sm-5 text-right">-->
                    <!--        <a href="<?php echo base_url()?>">Back to Home Page</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	
    	<script src="<?php echo base_url();?>assets2/assets/admin2/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/js/waves.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/js/wow.min.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/assets/jquery-detectmobile/detect.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/assets/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets2/assets/admin2/assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="<?php echo base_url();?>assets2/assets/admin2/js/jquery.app.js"></script>
	<script>
            var resizefunc = [];
        </script>
	</body>
</html>