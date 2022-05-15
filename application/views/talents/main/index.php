<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">Talent Dashboard</h1>
    </div>
    <div class="text-center bg-white pt-5 pb-5 mt-5 mb-5">
        <div class="row">
            <div class="w-50 d-block float-left mt-4 mx-auto rsp-w-100">
              <?php if(!empty($subscription_plan)){if (new DateTime() > new DateTime($subscription_plan[0]['plan_period_start']) && new DateTime() < new DateTime($subscription_plan[0]['plan_period_end'])){?>
              <div class="card mb-3">
                <div class="card-body border border-primary">
                    <div class="card-mn-cntnt">
                        <h4 class="d-block w-50 float-left mb-2 font-weight-bold top-titl">Active Plan</h4>
                        <h6 class="d-block w-100 float-left mb-2 mt-4">
                            <p class="d-inline-block w-100 font-weight-bold mb-2"><?php echo $subscription_plan[0]['plan_name'];?></p>
                            <strong class="d-inline-block w-100 mb-2">USD: <?php echo $subscription_plan[0]['plan_price'];?> </strong>
                            <div class="d-inline-block w-100 mt-2">
                                <span class="">Plan Valid Till -</span> 
                                <span class=""> <?php echo $subscription_plan[0]['plan_period_start'];?> -<?php echo $subscription_plan[0]['plan_period_end'];?></span>
                            </div>
                        </h6>
                        
                    </div>
                </div>
              </div>
              <?php } else {?>
              <div class="card mb-3 opacity">
                <div class="card-body border border-primary">
                    <div class="card-mn-cntnt">
                        <h4 class="d-block w-50 float-left mb-2 font-weight-bold top-titl bg-danger">Plan Expired</h4>
                        <h6 class="d-block w-100 float-left mb-2 mt-4">
                            <p class="d-inline-block w-100 font-weight-bold mb-2">Monthly Talent Account Subscription</p>
                            <strong class="d-inline-block w-100 mb-2">USD: 14.99 </strong>
                            <div class="d-inline-block w-100 mt-2">
                                <span class="">Plan Valid Till -</span> 
                                <span class=""> <?php echo $subscription_plan[0]['plan_period_start'];?> -<?php echo $subscription_plan[0]['plan_period_end'];?></span>
                            </div>
                        </h6>
                        
                    </div>
                </div>
              </div>
              <?php }} ?>
              <?php if(!empty($subscription_plan)){if(new DateTime() > new DateTime($subscription_plan[0]['plan_period_start']) && new DateTime() < new DateTime($subscription_plan[0]['plan_period_end'])){?>
                  <div class="hide">
                      <h4 class="d-inline-block w-100 mt-3"><b>Please Renew Your Subscription.</b></h4>
                      <a href="javascript:void(0)" class="btn btn-primary mt-4 w-25 p-2 mx-auto">Renew</a>
                  </div>
                <?php } else {?>
                <div class="show">
                      <h4 class="d-inline-block w-100 mt-3 blink_me"><b>Please Renew Your Subscription.</b></h4>
                      <a href="<?php echo base_url();?>talent/Subscription" class="btn btn-primary mt-4 w-25 p-2 mx-auto">Renew</a>
                 </div>
            <?php }}else{ ?>
                <div class="show">
                      <h4 class="d-inline-block w-100 mt-3 blink_me"><b>Please Renew Your Subscription.</b></h4>
                      <a href="<?php echo base_url();?>talent/Subscription" class="btn btn-primary mt-4 w-25 p-2 mx-auto">Renew</a>
                 </div>
            <?php } ?>
            </div> 
        </div>
    </div>
</div>