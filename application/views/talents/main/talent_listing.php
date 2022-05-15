<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 pageTitle">Talent Listing</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Talent name</th>
                                <th>Current Conflicts</th>
                                <th>Expiration Date</th>
                                <th>Address</th>
                                <th>Distance Range</th>
                                <th>Talent Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($talents as $talent){?>
                            <tr>
                                <td><?php echo $talent['profile_name']?></td>
                                <td><?php echo $talent['current_conflicts']?></td>
                                <td><?php echo $talent['expiration_date']?></td>
                                <td><?php echo $talent['address']?></td>
                                <td><?php echo $talent['distance']?></td>
                                <td><?php echo $talent['talent_roles']?></td>
                                <td>
                                    <a href="<?php echo base_url();?>agents/agent/view_talent?talentid=<?php echo $talent['user_id']?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php } ?>							
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
