
			<!-- The Modal View -->
			  <div class="modal fade" id="myModaledit">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title">Edit Project</h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
						<form action ="<?php echo base_url();?>castingDirector/director/create_project" method="post" class="user">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Project Name" name="project_name" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleLastName" placeholder = "Shoot Dates" onfocus="(this.type='date')" name="optional_shoot_dates" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<select class="form-control form-control-select" name="current_conflicts" required>
										<option selected> Select Current Conflicts</option>
										<option value="Contractual">Contractual</option>
										<option value="Such as tech">Such as tech</option>
										<option value="Car commercials">Car commercials</option>
									</select>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Self Tape Request" name="self_tape" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Cut off time for self-tape submissions" name="cutt_off_time" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Self-tape instructions" name="self_tape_instruction" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Physical or Digital casting location" name="physical_or_digital" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition Length" name="audition_length" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition window (potential days)" name="audition_window" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Audition specific sides upload (optional)" name="specific_sides_upload" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Project wide geographic area" name="project_wide_geographic_area" required>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder = "Closer Date" onfocus="(this.type='date')" name="closure_date" required>
								</div>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Submit">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				  </div>
				</div>
			  </div>