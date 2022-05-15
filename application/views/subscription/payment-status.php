<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
  .mn-content-sec{
      display:inline-block;
      width:100%;
  }  
  .mn-cntnt{
    float: none;
    margin: 0 auto;
    border: 1px solid #ccc;
    text-align: left;
    margin-top: 50px;
    padding: 25px 15px;
  }
  .mn-cntnt h3{
    font-weight: 600;
    font-size: 22px;
    margin-bottom: 10px;
    display: inline-block;
    width: 100%;
    color: #0ea804;
  }
  .mn-cntnt h4{
    font-weight: 600;
    font-size: 20px;
    display: inline-block;
    width: 100%;
    border-bottom: 1px solid #d2d2d2;
    padding-bottom: 10px;
  }
  .mn-cntnt p{
    font-size: 18px;
  }
  .mn-cntnt p b{
    display: block;
    float: left;
    width: 33%;
  }
  .top25{
      margin-top:25px;
  }
  .btn-back{
    width: 100%;
    padding: 12px 0;
    font-size: 18px;
    margin-top: 15px;
  }
</style>
<?php if(!empty($subscription)){ ?>
    <?php if($subscription['status'] == 'active'){ ?>
    <div class="mn-content-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mn-cntnt">
                    <h3 class="success">Your Subscription Payment has been Successful!</h3>
                    <?php }else{ ?>
                    <h1 class="error">Subscription activation failed!</h1>
                    <?php } ?>
                
                    <h4>Payment Information</h4>
                    <p><b>Reference Number:</b> <?php echo $subscription['id']; ?></p>
                    <p><b>Transaction ID:</b> <?php echo $subscription['stripe_subscription_id']; ?></p>
                    <p><b>Amount:</b> <?php echo $subscription['plan_amount'].' '.$subscription['plan_amount_currency']; ?></p>
                    
                    <h4 class="top25">Subscription Information</h4>
                    <p><b>Plan Name:</b> <?php echo $subscription['plan_name']; ?></p>
                    <p><b>Amount:</b> <?php echo $subscription['plan_price'].' '.$subscription['plan_price_currency']; ?></p>
                    <p><b>Plan Interval:</b> <?php echo $subscription['plan_interval']; ?></p>
                    <p><b>Period Start:</b> <?php echo $subscription['plan_period_start']; ?></p>
                    <p><b>Period End:</b> <?php echo $subscription['plan_period_end']; ?></p>
                    <p><b>Status:</b> <?php echo $subscription['status']; ?></p>
                    <a href="<?php echo base_url();?>talent/index" class="btn btn-primary btn-back">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <h1 class="error">The transaction has been failed!</h1>
<?php } ?>