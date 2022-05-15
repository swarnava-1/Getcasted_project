<!DOCTYPE html>
<html lang="en">
<head>
  <title>GetCasted</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/css/style.css" type="text/css" media="all">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/js/main.js" type="text/javascript"></script>
</head>
<body>
  
<div class="main-cont bg-white d-inline-block w-100 pt-4">
	<div class="container">
	  <div class="row">
		<div class="col-sm-12 pb-4">
			<div class="mnu-all d-inline-block w-100">
				<img src="<?php echo base_url();?>assets/img/img/drpdnicon.png" alt="GetCasted" class="drpdnMnu"/>
			  <ul class="nav justify-content-left d-block float-left col-md-4 rspMnu">
				<li class="nav-item">
				  <a class="nav-link p-0 pt-1 w-auto" href="javascript:void(0);">
					<img src="<?php echo base_url();?>assets/img/img/logo.jpg" alt="GetCasted" class=""/>
				  </a>
				</li>
			  </ul>
			  <div class="mnu-all-hidn-shw mnu-mn">
				  <ul class="nav justify-content-center d-block float-left col-md-6 pt-3 rspMnuall">
					<li class="nav-item d-block float-left">
					  <a class="nav-link mnu" href="<?php echo base_url();?>register?id=2">Create Talent</a>
					</li>
					<li class="nav-item d-block float-left">
					  <a class="nav-link mnu" href="<?php echo base_url();?>register?id=1">Casting</a>
					</li>
					<li class="nav-item d-block float-left">
					  <a class="nav-link mnu" href="<?php echo base_url();?>register?id=1">Agent Profile</a>
					</li>
				  </ul>
				  <ul class="nav justify-content-right d-block float-left col-md-2 pt-4 logBtnmn">
					<li class="nav-item d-block float-right">
					  <a class="nav-link logBtn mnu" href="<?php echo base_url();?>login">Login</a>
					</li>
				  </ul>
				</div>
			</div>
		</div>
		<div class="col-md-6 mt-4 resp-txt-cntr">
			<div class="text-cntnt d-inline-block w-100">
				<span class="lft-txt">Get Casted</span>
				<span class="lft-txt-sub d-block float-left w-100">saves you time by</span>
				<span class="lft-txt-sml d-block float-left w-100">matching the right talent to the right 
				roles in seconds.</span>
			</div>
			<button type="button" class="btn-lrnmore pt-2 pb-2 pl-4 pr-4 mt-4" data-toggle="modal" data-target="#exampleModal">Learn More</button>			
		</div>
		<div class="col-md-6 mt-4">			
			<div id="demo" class="carousel slide carousel-fade round" data-ride="carousel">
			  <!-- Indicators -->
			  <ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			  </ul>
			  
			  <!-- The slideshow -->
			  <div class="carousel-inner round">
				<div class="carousel-item active round">
				  <img src="<?php echo base_url();?>assets/img/img/baner-rgt.png" alt="Los Angeles"class="w-100">
				</div>
				<div class="carousel-item">
				  <img src="<?php echo base_url();?>assets/img/img/baner-rgt2.png" alt="Los Angeles" class="w-100">
				</div>
				<div class="carousel-item">
				  <img src="<?php echo base_url();?>assets/img/img/baner-rgt3.png" alt="Los Angeles" class="w-100">
				</div>
			  </div>
			</div>
		</div>
		<div class="col-md-6 mtop-190">
			<div class="social d-inline-block w-100 mt-6">
				<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/img/Facebook.png" alt="GetCasted" class="social d-block float-left mr-1" /></a>
				<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/img/Twitter.png" alt="GetCasted" class="social d-block float-left mr-1" /></a>
				<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/img/Linkdin.png" alt="GetCasted" class="social d-block float-left" /></a>
			</div>
			<p class="d-inline-block w-100 resp-txt-cntr rspMtop">
				<span class="cpyrgt">&copy; 2022 GETCASTED </span>
				<span class="resvd">- ALL RIGHTS RESERVED. </span>
			</p>
		</div>
	  </div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content rounded-corner">
      <div class="modal-header rounded-corner bg-primary">
        <h5 class="modal-title text-center text-uppercase text-white" id="exampleModalLabel">Join GetCasted today and land your perfect role</h5>
        <button type="button" class="close color-white top-clse" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-left font-weight-normal linehgt25">Since 1960, GetCasted has served as the #1 resource for actors and performers to find high-quality roles to match their 
		interests and career goals. Unlimited submissions, best-in-class casting tools, and more performance roles than any other 
		casting service.</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
