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

    function validate_quote() {

      var name = $("#name").val();
      var price = $("#price").val();
      var description = $("#description").val();

      if(name.search(/\S/)==-1 || name=="") {
          show_error_message("name","name_div", "Name can not be blank ! Please provide a valid Name !");
          return false;
      }
      else if(price.search(/\S/)==-1 || price=="") {
          show_error_message("price","price_div", "Price can not be blank ! Please provide price !");
          return false;
      }
      else if(description.search(/\S/)==-1 || description=="") {
          show_error_message("description","description_div", "Description can not be blank ! Please provide description !");
          return false;
      }
      else {
          return true;
      }

    }

</script>

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
                                <h4 class="pull-left page-title">Product Management</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Azenta</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Add New Products</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Form-validation -->
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Product Management</h3></div>
                                    <div class="panel-body">
                                        <div class=" form">
                                            <form class="cmxform form-horizontal tasi-form" onsubmit="return validate_quote();" action="<?php echo base_url();?>admin/product/insert_number" method="post" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="firstname" class="control-label col-lg-2">Name of land</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="Name_of_land" name="Name_of_land" placeholder="Name of land" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Nearest Popular Area</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="nearest_popular_area" name="nearest_popular_area" placeholder="Nearest Popular Area" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Name of Property woner</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="owner" name="owner" placeholder="Name of Property woner" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Address</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="address" name="address" placeholder="Name of Property woner" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Description</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="description" name="description" placeholder="Description" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Property size</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="property_size" name="property_size" placeholder="Property Size" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Location map</label>
                                                    <div class="col-lg-10">
                                                        <input class=" form-control" id="location_map" name="location_map" placeholder="Location map" type="text" required="required">
                                                    </div>
                                                </div>
                                              
                                              <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Land authentication  link west bengal land website</label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="Land_authentication_link" name="Land_authentication_link" placeholder="Land authentication  link west bengal land website" type="text" required="required" value="https://banglarbhumi.gov.in/BanglarBhumi/Home.action" readonly>
                                                    </div>
                                                </div>
                                              
                                              <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Near by police station </label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="police_station" name="police_station" placeholder="Near by police station" type="text" required="required">
                                                    </div>
                                                </div>
                                              
                                              <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Near by rail station </label>
                                                    <div class="col-lg-10">
                                                    <input class="form-control" id="rail_station" name="rail_station" placeholder="Near by rail station" type="text" required="required">
                                                    </div>
                                                </div>
                                              
                                              <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2">Near by bus stop</label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="bus_stop" name="bus_stop" placeholder="Near by bus stop" type="text" required="required">
                                                    </div>
                                                </div>
                                              
                                              <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2"> Near by fire station </label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="fire_station" name="fire_station" placeholder="Near by fire station" type="text" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2"> Near by Hospital </label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="hospital" name="hospital" placeholder="Near by Hospital" type="text" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2"> Near by Market </label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="market" name="market" placeholder="Near by Market" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2"> Main Image</label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="img" name="img" placeholder="Status" type="file" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2"> Side Image 1</label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="img1" name="img1" placeholder="Status" type="file" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2"> Side Image 2</label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="img2" name="img2" placeholder="Status" type="file" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="lastname" class="control-label col-lg-2"> Side Image 3</label>
                                                    <div class="col-lg-10">
                                                    <input class=" form-control" id="img3" name="img3" placeholder="Status" type="file" required="required">
                                                    </div>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                               <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button><a href="<?php echo base_url().'admin/customers'?>"><button class="btn btn-default waves-effect" type="button">Cancel</button></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->



            </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->