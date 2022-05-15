<div class="content-wrapper" style="min-height: 1096px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void(0);">Examples</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php if($user[0]->pic =='' || $user[0]->pic == null) { echo base_url().'assets/images/avatar.ico'; } else { echo base_url().'assets/admin/images/upload/user/thumb/'.$user[0]->pic; } ?>" alt="User profile picture">
            <h3 class="profile-username text-center"><?php echo $user[0]->firstname.' '.$user[0]->lastname;?></h3>
            <p class="text-muted text-center">From : <?php echo $user[0]->city.', '.$user[0]->state.', '.$user[0]->country;?></p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Email : </b> <a class="pull-right"><?php echo $user[0]->email; ?></a>
              </li>
              <li class="list-group-item">
                <b>Phone : </b> <a class="pull-right"><?php echo $user[0]->phone; ?></a>
              </li>
              <li class="list-group-item">
                <b>ZIP : </b> <a class="pull-right"><?php echo $user[0]->zip; ?></a>
              </li>
            </ul>

            <!-- <a href="<?php echo base_url().'admin/vehicle/vehicle_details?id='.$user[0]->vehicle;?>" class="btn btn-primary btn-block"><b>Vehicle Details</b></a> -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">User Details</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" style="border-radius: 24%;" src="<?php echo base_url();?>assets/admin/images/car_insurance.png" alt="car image">
                  <span class="username">
                    <a href="javascript:void(0);">Quote Information</a>
                    <a href="javascript:void(0);" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Purchased quote detail</span>
                </div><!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>
              </div><!-- /.post -->

              <!-- Post -->
              <div class="post clearfix">

                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>assets/admin/images/groups.png" alt="group image">
                  <span class="username">
                    <a href="javascript:void(0);">Group Information</a>
                    <a href="javascript:void(0);" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">User's group</span>
                </div><!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>

              </div><!-- /.post -->

              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>assets/admin/images/contacts.png" style="border-radius: 24%;" alt="coontact image">
                  <span class="username">
                    <a href="javascript:void(0);">Contact Information</a>
                    <a href="javascript:void(0);" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Users contact detais.</span>
                </div><!-- /.user-block -->
                <div class="row margin-bottom">
                  <div class="col-sm-6">

                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">

                      </div><!-- /.col -->
                      <div class="col-sm-6">

                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.col -->
                </div><!-- /.row -->

              </div><!-- /.post -->
            </div><!-- /.tab-pane -->

          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->
</div>