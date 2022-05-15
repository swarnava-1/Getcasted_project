<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">View project role</h1>
    </div>
    <div class="card shadow mb-4">
    <div class="card-body">
            <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <img src="<?php echo base_url();?><?php echo $talents[0]['photo_upload'];?>" class="img-thumbnail" alt="no image" width="304" height="236">
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
            </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Profile Name</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Profile Name" name="profile_name" value="<?php echo $talents[0]['profile_name'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Current Conflicts</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Profile Name" name="profile_name" value="<?php echo $talents[0]['current_conflicts'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Expiration Date</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Expiration Date" name="expiration_date"   value="<?php echo $talents[0]['expiration_date'];?>" readonly>
                </div> 
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Age</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Age" name="expiration_date" value="<?php echo $talents[0]['age'];?>" readonly>
                </div> 
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Address</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Expiration Date" name="expiration_date"   value="<?php echo $talents[0]['address'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Distance range for how far talent will travel for auditions</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Geographic Area" name="geographic_area"   value="<?php echo $talents[0]['distance'];?>" readonly>
                </div>  
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Roles</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Geographic Area" name="geographic_area"   value="<?php echo $talents[0]['talent_roles'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Union Status</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Geographic Area" name="geographic_area"   value="<?php echo $talents[0]['union_status'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Agent</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Geographic Area" name="geographic_area" value="<?php echo $talents[0]['agent'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Agent Info</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Geographic Area" name="geographic_area" value="<?php foreach($agents as $agent){if($agent['id']==$talents[0]['agent_id']){echo $agent['company_name_or_individual_name'];}}?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Ethnicity</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Geographic Area" name="geographic_area" value="<?php echo $talents[0]['ethnicity'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Gender</lable>
                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Geographic Area" name="geographic_area" value="<?php echo $talents[0]['gender'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">	
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Height(Feet)</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['feet'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Height(Inches)</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['inches'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">	
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Clothing Size(Chest)</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['clothing_size_chest'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Inches</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['clothing_size_chest_inch'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">	
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Clothing Size(Bust)</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['clothing_size_bust'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Inches</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['clothing_size_bust_inch'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">	
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Clothing Size(West)</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['clothing_size_waist'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Inches</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['clothing_size_waist_inch'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Language Spoke</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Clothing Size (waist, shirt, pant length, and so on)" name="clothing_size"  value="<?php echo $talents[0]['language_spoke'];?>" readonly>
                </div> 
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <lable>Language Spoke</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['accents'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <lable>Training</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['training'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <lable>Athletics</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['athletics'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <lable>Singing</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['singing'];?>" readonly>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Dancing</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['dancing'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Driving Experience</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['driving_experience'];?>" readonly>
                </div> 
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Citizenship or visa documents</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Height" name="height" value="<?php echo $talents[0]['citizenship_or_visa_documents'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Citizenship or visa documents other</lable>
                    <input type="text" class="form-control form-control-date" id="exampleFirstName" name="height" value="<?php echo $talents[0]['citizenship_or_visa_documents_other'];?>" readonly>
                </div> 
                <div class="col-sm-6 mb-3 mb-sm-0">
                <lable>Email</lable>
                    <input type="email" class="form-control form-control-date" id="exampleFirstName" placeholder="Email" name="email" value="<?php echo $talents[0]['email'];?>" readonly>
                </div>  
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                <lable>Social Media Link(Instagram)</lable>
                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Social Media Link" name="social_media_link" value="<?php echo $talents[0]['social_media_link_instagram'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                <lable>Social Media Link(Tik tok)</lable>
                        <input type="text" class="form-control form-control-date" id="exampleFirstName" placeholder="Social Media Link" name="social_media_link" value="<?php echo $talents[0]['social_media_link_tik_tok'];?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">   
                <lable>Headshot Upload</lable>
                <?php if($talents[0]['Headshot_upload']!=""){?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo base_url();?><?php echo $talents[0]['Headshot_upload'];?>" allowfullscreen></iframe>
                </div>
                <?php } else {?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
                <?php } ?>
                </div>  
                <div class="col-sm-6 mb-3 mb-sm-0"> 
                <lable>Reel Upload</lable>
                <?php if($talents[0]['reel_upload']!=""){?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo base_url();?><?php echo $talents[0]['reel_upload'];?>" allowfullscreen></iframe>
                </div>
                <?php } else {?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
                <?php } ?>
                </div>   
            </div>
        </div>
    </div>
</div>
