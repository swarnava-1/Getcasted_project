<script type="text/javascript">
    $( document ).ready(function() {
        //alert( "ready!" );

        $(".form-group").click(function(){
            $(".form-group").removeClass('form-group has-error').addClass('form-group');
        });

       $(".form-group").focusout(function(){
            $(".form-group").removeClass('form-group has-error').addClass('form-group');
        });
    });

    function show_error_message(id, div_id, message) {

        $("#"+div_id).removeClass('form-group').addClass('form-group has-error');
        $("#"+id).focus();
        $("#error_message").text(message);
        $("#error_message_div").show();
    }

    function validate_vehicle() {

      var registration = $("#registration").val();
      var model = $("#model").val();
      var make = $("#make").val();
      var distanceDriven = $("#distanceDriven").val();
      var purchase = $("#purchase").val();
      var fuel = $("#fuel").val();
      var color = $("#color").val();
      var flag = false;

      if(registration.search(/\S/)==-1 || registration=="") {
          show_error_message("registration","registration_div", "Registration can not be blank ! Please provide valid Registration !");
          return false;
      }
      else if(model.search(/\S/)==-1 || model=="") {
          show_error_message("model","model_div", "Model can not be blank ! Please provide valid Model !");
          return false;
      }
      else if(make.search(/\S/)==-1 || make=="") {
          show_error_message("make","make_div", "Make can not be blank ! Please provide valid Make !");
          return false;
      }
      else if(distanceDriven.search(/\S/)==-1 || distanceDriven=="") {
          show_error_message("distanceDriven","distanceDriven_div", "Distance Driven can not be blank !");
          return false;
      }
      else if(purchase.search(/\S/)==-1 || purchase=="") {
          show_error_message("purchase","purchase_div", "Purchase Date can not be blank ! Please provide Purchase Date !");
          return false;
      }
      else if(fuel=='none') {
          show_error_message("fuel","fuel_div", "Fuel Type can not be blank !");
          return false;
      }
      else if(color.search(/\S/)==-1 || color=="") {
          show_error_message("color","color_div", "Color can not be blank ! Please provide Color !");
          return false;
      }

      else {
            var image_file = document.getElementById("image");
            //checking file name and extension here
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
            
            if (regex.test(image_file.value.toLowerCase())) {
         
                //check file uploaded support HTML5 or not!
                if (typeof (image_file.files) != "undefined") {
                    //create object of FileReader
                    var reader = new FileReader();
                    //Read the contents of Image File.
                    reader.readAsDataURL(image_file.files[0]);
                    reader.onload = function (e) {
                        //create image object to get height and width
                        var image = new Image(); 
                        image.src = e.target.result;
                               
                        //Validate the image Height and Width.
                        image.onload = function () {
                            var height = this.height;
                            var width = this.width;
                            // here you can do your code as per your requirement
                            if ((height > 250 && width > 350) && (height > 768 && width > 1366)) {
                                //alert("Please upload image between the resolution of : 350x250 and 1366x768");
                                show_error_message("image","image_div", "Please upload image between the resolution of : 350x250 and 1366x768 !");
                                $('#image').val('');
                                flag = false;
                            }
                            else {
                              // flag = true;
                              // alert('ggggggggg'+flag);
                              $("#vform").submit();
                            }
                        };
                    }
                } else {
                    show_error_message("image","image_div", "This browser does not support HTML5 !");
                    flag = false;
                }
            } else {
                show_error_message("image","image_div", "Please select a valid Image file !");
                flag = false;
            }
            return flag;
      }
    }

</script> 

<div style="opacity: 0.5; background: #000; width: 100%; height: 100%; z-index: 10; top: 0; left: 0; position: fixed; display: none;"></div>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Vehicle Management
            <small>Add New Vehicle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Vehicle Management</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
            <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Vehicle</h3>

                    <div class="alert alert-danger alert-dismissable" id="error_message_div" style="display: none;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Registration Failed !</h4>
                      <span id="error_message"></span>
                    </div>

                </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo base_url();?>admin/vehicle/insert_vehicle" method="post" enctype="multipart/form-data" id="vform"> <!--  onsubmit="return validate_user();" --> <!-- action="<?php echo base_url();?>admin/vehicle/insert_vehicle" -->
                    <div class="box-body">

                      <div class="form-group" style="width: 30%; display: inline-block;" id="registration_div">
                        <label for="exampleInputEmail1">Registration</label>
                        <input type="text" class="form-control" id="registration" name="registration" placeholder="Enter Registration">
                      </div>
                      <div class="form-group" style="width: 30%; display: inline-block; margin-left: 3%;" id="model_div">
                        <label for="exampleInputPassword1">Model</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model">
                      </div>

                      <div class="form-group" style="width: 30%;"></div>

                      <div class="form-group" style="width: 30%; display: inline-block;" id="make_div">
                        <label for="exampleInputEmail1">Make</label>
                        <input type="text" class="form-control" id="make" name="make" placeholder="Enter Make">
                      </div>
                      <div class="form-group" style="width: 30%; display: inline-block; margin-left: 3%;" id="distanceDriven_div">
                        <label for="exampleInputPassword1">Distance Driven</label>
                        <input type="text" class="form-control" id="distanceDriven" name="distanceDriven" placeholder="Enter Distance Driven">
                      </div>

                      <div class="form-group" style="width: 30%;"></div>

                      <div class="form-group" style="width: 30%; display: inline-block;" id="purchase_div">
                        <label for="exampleInputEmail1">Purchase Date</label>
                        <input type="date" class="form-control" id="purchase" name="purchase" placeholder="Enter Purchase Date">
                      </div>
                      <div class="form-group" style="width: 30%; display: inline-block; margin-left: 3%;" id="fuel_div">
                        <label for="exampleInputPassword1">Fuel Type</label>
                        <select class="form-control" id="fuel" name="fuel">
                          <option value="none">Select</option>
                          <option value="Diesel">Diesel</option>
                          <option value="Petrol">Petrol</option>
                          <option value="Electric">Electric</option>
                        </select>
                      </div>

                      <div class="form-group" style="width: 30%;"></div>

                      <div class="form-group" style="width: 30%; display: inline-block;" id="color_div">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Enter Color">
                      </div>
                      <div class="form-group" style="width: 30%; display: inline-block; margin-left: 3%;" id="image_div">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                      </div>

                       <div class="form-group" style="width: 30%;"></div>

                       <div class="form-group" style="width: 30%; display: inline-block;;" id="owner_div">
                        <label for="exampleInputPassword1">Owner</label>
                        <select class="form-control" id="owner" name="owner">
                          <option value="0">Select</option>
                          <?php foreach($users as $usr) { ?>
                            <option value="<?php echo $usr->id;?>"><?php echo $usr->firstname.' '.$usr->lastname.'  :  ['.$usr->email.'] ';?></option>
                          <?php } ?>
                        </select>
                      </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="button" class="btn btn-primary" id="sbmt_btn" onclick="validate_vehicle()">Submit</button>
                      <a href="<?php echo base_url().'admin/vehicle'?>"><button type="button" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Cancel</button></a>
                    </div>
                  </form>
                </div>
            </div><!-- /.col -->
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
