<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Director extends CI_Controller {

	public function __construct() {

        parent::__construct();

        $this->load->library('session');
        $this->session;
        $this->load->helper('url');
        $this->load->model('project_model');
		$this->load->model('register_model');
		if($this->session->userdata('user_id') == null || $this->session->userdata('user_id') == '') {
			redirect(base_url().'login');
		}
    }
	public function project_list(){
		$user_id=$this->session->userdata('user_id');
		$data['projects'] = $this->project_model->get_all_project($user_id);
		$this->load->view('castingDirector/includes/header');
        $this->load->view('castingDirector/main/project_listing',$data);
        $this->load->view('castingDirector/includes/footer');
	}

	public function project_archive_list(){
		$user_id=$this->session->userdata('user_id');
		$data['projects'] = $this->project_model->project_archive_list($user_id);
		$this->load->view('castingDirector/includes/header');
        $this->load->view('castingDirector/main/project_archive_listing',$data);
        $this->load->view('castingDirector/includes/footer');
	}
	public function view_project(){
		$id = $this->input->get('id');
		$data['project'] = $this->project_model->get_project_by_d($id);
		$data['roles'] = $this->project_model->get_all_roles_by_project_id($id);
		$this->load->view('castingDirector/includes/header');
        $this->load->view('castingDirector/main/project_view',$data);
        $this->load->view('castingDirector/includes/footer');
	}
	public function view_project_by_id(){
		$id = $this->input->post('id');
        $get_project = $this->project_model->get_project_by_d($id);
        echo json_encode($get_project); 
	}


	// public function view_project_role(){
	// 	$role_id = $this->input->get('id');
	// 	$data['role_by_id'] = $this->project_model->get_role_by_d($role_id);
	// 	$this->load->view('castingDirector/includes/header');
    //     $this->load->view('castingDirector/main/view_project_role',$data);
    //     $this->load->view('castingDirector/includes/footer');
	// }

	public function view_talent(){
		$talent_id = $this->input->get('talentid');
		$data['talents'] = $this->project_model->get_talents_id($talent_id);
		$data['agents'] = $this->register_model->get_agents();
		$this->load->view('castingDirector/includes/header');
        $this->load->view('castingDirector/main/view_talent_profile',$data);
        $this->load->view('castingDirector/includes/footer');
	}

	public function create_project(){
		$post=$this->input->post(NULL, TRUE);

		$shoot_dates = $post['optional_shoot_dates'];
        $shoot_dates = implode(",",$shoot_dates);

		$audition_dates = $post['optional_audition_dates'];
        $audition_dates = implode(",",$audition_dates);

		$data_array = array(
								'project_name'=>$post['project_name'],
								'project_description'=>$post['project_description'],
								'optional_shoot_dates'=>$shoot_dates,
								'optional_audition_dates'=>$audition_dates,
								'current_conflicts'=>$post['current_conflicts'],
								'self_tape'=>$post['self_tape'],
								'cutt_off_time'=>$post['cutt_off_time'],
								'self_tape_instruction'=>$post['self_tape_instruction'],
								'physical_or_digital'=>$post['physical_or_digital'],
								'audition_length'=>$post['audition_length'],
								'audition_window'=>$post['audition_window'],
								'specific_sides_upload'=>$post['specific_sides_upload'],
								'project_wide_geographic_area'=>$post['project_wide_geographic_area'],
								'shoot_location'=>$post['shoot_location'],
								'audition_location'=>$post['audition_location']
								//'closure_date'=>$post['closure_date']
							);
		$received_id = $this->project_model->new_project($data_array);
		if($received_id != ""){
			$update_project_data = array("created_by"=>$this->session->userdata('user_id'),"updated_at"=>date('Y-m-d H:i:s'),"updated_by"=>$this->session->userdata('user_id'));
            $this->project_model->update_project($update_project_data,$received_id);
			$message = array('message' => 'New project created','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/project_list','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/project_list','refresh');
		}
	}

	public function edit_project(){
		$post=$this->input->post(NULL, TRUE);
		$shoot_dates = $post['optional_shoot_dates'];
        $shoot_dates = implode(",",$shoot_dates);

		$audition_dates = $post['optional_audition_dates'];
        $audition_dates = implode(",",$audition_dates);

		$update_project_data = array(
										"project_name"=>$post["project_name"],
										'project_description'=>$post['project_description'],
										'optional_shoot_dates'=>$shoot_dates,
										'optional_audition_dates'=>$audition_dates,
										"current_conflicts"=>$post["current_conflicts"],
										"self_tape"=>$post["self_tape"],
										"cutt_off_time"=>$post["cutt_off_time"],
										"self_tape_instruction"=>$post["self_tape_instruction"],
										"physical_or_digital"=>$post["physical_or_digital"],
										"audition_length"=>$post["audition_length"],
										"audition_window"=>$post["audition_window"],
										"specific_sides_upload"=>$post["specific_sides_upload"],
										"project_wide_geographic_area"=>$post["project_wide_geographic_area"],
										'shoot_location'=>$post['shoot_location'],
								        'audition_location'=>$post['audition_location'],
										"updated_at"=>date('Y-m-d H:i:s'),
										"updated_by"=>$this->session->userdata('user_id'),
									);
		$received_id = $this->project_model->update_project($update_project_data,$post['project_id']);
		if($received_id != ""){
			$message = array('message' => 'Project updated','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/project_list','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/project_list','refresh');
		}
	}

	public function create_role(){
		$post=$this->input->post(NULL, TRUE);
		
		

        $language = $post['language_spoke'];
        $language_spoke = implode(",",$language);

        $training = $post['training'];
        $training_data = implode(",",$training);

        $athletics = $post['athletics'];
        $athletics_data = implode(",",$athletics);

        $singing = $post['singing'];
        $singing_data = implode(",",$singing);

        $dancing = $post['dancing'];
        $dancing_data = implode(",",$dancing);

		$accents = $post['accents'];
        $accents_data = implode(",",$accents);

        $driving_experience = $post['driving_experience'];
        $driving_experience_data = implode(",",$driving_experience);
		
		$data_to_insert_role = array(
										'project_id'=>$post['project_id'],
										'roles_name'=>$post['roles_name'],
										'roles_type'=>$post['roles_type'],
										'role_description'=>$post['role_description'],
										'self_tape_deadline'=>$post['self_tape_deadline'],
										'paymen_details'=>$post['paymen_details'],
										'union_status'=>$post['union_status'],
										'agent'=>$post['agent'],
										'age_range'=>$post['age_range'],
										'role_specific_loacation'=>$post['role_specific_loacation'],
										'ethnicity'=>$post['ethnicity'],
										'gender'=>$post['gender'],
										'feet'=>$post['feet'],
										'inches'=>$post['inches'],
										'clothing_size_chest'=>$post['clothing_size_chest'],
										'clothing_size_chest_inch'=>$post['clothing_size_chest_inch'],
										'clothing_size_bust'=>$post['clothing_size_bust'],
										'clothing_size_bust_inch'=>$post['clothing_size_bust_inch'],
										'clothing_size_waist'=>$post['clothing_size_waist'],
										'clothing_size_waist_inch'=>$post['clothing_size_waist_inch'],
										'language_spoke'=>$language_spoke,
										'accents'=>$accents_data,
										'athletics'=> $athletics_data,
										'tranning'=>$training_data,
										'singing'=>$singing_data,
										'dancing'=>$dancing_data,
										'driving_license'=>$driving_experience_data,
										'citizenship_or_visa_documents'=>$post['citizenship_or_visa_documents'],
										'other_upload'=>$post['other_upload'],
										'optional_shoot_dates'=>$post['optional_shoot_dates'],
										'optional_audition_dates'=>$post['optional_audition_dates'],
										'shoot_location'=>$post['shoot_location'],
										'audition_location'=>$post['audition_location'],
									);
		$received_id = $this->project_model->create_project_role($data_to_insert_role);
		// $create_slot = array();
		// array_push($create_slot,'10A.M-11A.M','11A.M-12P.M','112P.M-1P.M','1P.M-2P.M');
		// foreach($create_slot as $slot){
		// 	$data_slot= array('project_id'=>$post['project_id'],'role_id'=>$received_id,'time_slot'=>$slot);
		// 	$this->project_model->create_slot($data_slot);
		// }
		if($received_id != ""){
			$update_project_data = array("created_by"=>$this->session->userdata('user_id'),"updated_at"=>date('Y-m-d H:i:s'),"updated_by"=>$this->session->userdata('user_id'));
            $this->project_model->update_role($update_project_data,$received_id);
			$data_role_project = array("project_id"=>$post['project_id'],"project_role_id"=>$received_id);
			$this->project_model->insert_role_project($data_role_project);
			$message = array('message' => 'New role created','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/project_list','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/project_list','refresh');
		}
	}

	public function update_role(){
		$post=$this->input->post(NULL, TRUE);
		$language = $post['language_spoke'];
        $language_spoke = implode(",",$language);

        $training = $post['training'];
        $training_data = implode(",",$training);

        $athletics = $post['athletics'];
        $athletics_data = implode(",",$athletics);

        $singing = $post['singing'];
        $singing_data = implode(",",$singing);

        $dancing = $post['dancing'];
        $dancing_data = implode(",",$dancing);

        $driving_experience = $post['driving_experience'];
        $driving_experience_data = implode(",",$driving_experience);

		$accents = $post['accents'];
        $accents_data = implode(",",$accents);
		
		$data_to_update_role = array(
										'project_id'=>$post['project_id'],
										'roles_name'=>$post['roles_name'],
										'roles_type'=>$post['roles_type'],
										'role_description'=>$post['role_description'],
										'self_tape_deadline'=>$post['self_tape_deadline'],
										'paymen_details'=>$post['paymen_details'],
										'union_status'=>$post['union_status'],
										'agent'=>$post['agent'],
										'age_range'=>$post['age_range'],
										'role_specific_loacation'=>$post['role_specific_loacation'],
										'ethnicity'=>$post['ethnicity'],
										'gender'=>$post['gender'],
										'feet'=>$post['feet'],
										'inches'=>$post['inches'],
										'clothing_size_chest'=>$post['clothing_size_chest'],
										'clothing_size_chest_inch'=>$post['clothing_size_chest_inch'],
										'clothing_size_bust'=>$post['clothing_size_bust'],
										'clothing_size_bust_inch'=>$post['clothing_size_bust_inch'],
										'clothing_size_waist'=>$post['clothing_size_waist'],
										'clothing_size_waist_inch'=>$post['clothing_size_waist_inch'],
										'language_spoke'=>$language_spoke,
										'accents'=> $accents_data,
										'athletics'=> $athletics_data,
										'tranning'=>$training_data,
										'singing'=>$singing_data,
										'dancing'=>$dancing_data,
										'driving_license'=>$driving_experience_data,
										'citizenship_or_visa_documents'=>$post['citizenship_or_visa_documents'],
										'other_upload'=>$post['other_upload'],
										'optional_shoot_dates'=>$post['optional_shoot_dates'],
										'optional_audition_dates'=>$post['optional_audition_dates'],
										'shoot_location'=>$post['shoot_location'],
										'audition_location'=>$post['audition_location'],
										"updated_at"=>date('Y-m-d H:i:s'),"updated_by"=>$this->session->userdata('user_id')
									);
		$received_id = $this->project_model->update_role($data_to_update_role,$post['role_id']);
		if($received_id != ""){
			$message = array('message' => 'Role updated','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/view_project?id='.$post['project_id'].'','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('castingDirector/director/view_project?id='.$post['project_id'].'','refresh');
		}
	}

	// public function view_project_role(){
	// 	$role_id = $this->input->get('id');
	// 	$project_id = $this->input->get('project_id');
	// 	$data['role_by_id'] = $this->project_model->get_role_by_d($role_id);
	// 	$role_name = $data['role_by_id'][0]['roles_name'];
	// 	$data['talents'] = $this->project_model->get_talents_by_project($role_id,$project_id);
	// 	//echo '<pre>';print_r($data['talents']);die;
	// 	$talent_id = array();
	// 	foreach($data['talents'] as $talent){
	// 		$t_roles = $talent['talent_roles'];
	// 		$t_roles_explode = explode(",",$t_roles);
	// 		$role_name_array = array($role_name);
	// 		$result=array_intersect($t_roles_explode,$role_name_array);
	// 		if(!empty($result)){
	// 			array_push($talent_id,$talent['user_id']);
	// 		}
	// 	}
	// 	$talent_id_implode = implode(",",$talent_id);
	// 	$data['talents'] = $this->project_model->get_talents_by_apply_by_role($talent_id_implode);
	// 	//echo '<pre>';print_r($data['talents']);die;
	// 	$data['agents'] = $this->register_model->get_agents();
	// 	   $this->load->view('castingDirector/includes/header');
    //     $this->load->view('castingDirector/main/view_project_role',$data);
    //     $this->load->view('castingDirector/includes/footer');
	// }
	public function view_project_role(){
		$role_id = $this->input->get('id');
		$project_id = $this->input->get('project_id');
		$data['role_by_id'] = $this->project_model->get_role_by_d($role_id);
		$data['agents'] = $this->register_model->get_agents();
		$data['talents'] = $this->project_model->get_all_talents();
		$data['requested_talents'] = $this->project_model->get_requested_talents($role_id,$project_id);
		$data['self_tape_submitted_talents'] = $this->project_model->get_self_tape_submitted_talents($role_id,$project_id);
		$this->load->view('castingDirector/includes/header');
        $this->load->view('castingDirector/main/view_project_role',$data);
        $this->load->view('castingDirector/includes/footer');
	}
	public function view_project_role_by_id(){
		$role_id = $this->input->post('id');
        $get_role = $this->project_model->get_role_by_d($role_id);
        echo json_encode($get_role); 
	}

	public function request_talent(){
		$project_id = $this->input->post('project_id');
		$talent_id = $this->input->post('talent_id');
		$role_id = $this->input->post('role_id');
		//$srequest = array('srequest'=>$this->input->post('srequest'));
		$data_to_insert = array(
								'project_id'=>$project_id,
								'talent_id'=>$talent_id,
								'role_id'=>$role_id
							  );
		$notification = array(
								'request_status'=>1,
								'project_id'=>$project_id,
								'role_id'=>$role_id,
								'user_id'=>$talent_id
							);
		$this->project_model->insert_notification($notification);
		$received = $this->project_model->insert_talent_req_status($data_to_insert);
		return $received;
	}

	public function delete_project(){
		$id = $this->input->get('id');
		$data = array('status'=>0,'updated_at'=>date('Y-m-d H:i:s'),"updated_by"=>$this->session->userdata('user_id'));
		$flag = $this->project_model->delete_project($data,$id);
		if($flag){
			$message = array('message' => 'Project deleted','class' => 'alert alert-success');
			$this->session->set_flashdata('message', $message);
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
			$this->session->set_flashdata('message', $message);
			$this->session->keep_flashdata('message',$message);
		}
	}
	
	public function delete_role(){
		$id = $this->input->get('id');
		$data = array('status'=>0,'updated_at'=>date('Y-m-d H:i:s'),"updated_by"=>$this->session->userdata('user_id'));
		$flag = $this->project_model->delete_role($data,$id);
		if($flag){
			$message = array('message' => 'Role deleted','class' => 'alert alert-success');
			$this->session->set_flashdata('message', $message);
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
			$this->session->set_flashdata('message', $message);
			$this->session->keep_flashdata('message',$message);
		}
	}
	
	public function view_agent(){
		$agentid = $this->input->get('agentid');
		$data['agent']=$this->project_model->get_user_by_id($agentid);
		$data['talents'] = $this->project_model->get_talents_by_agent_id($agentid);
		$this->load->view('castingDirector/includes/header');
        $this->load->view('castingDirector/main/view_agent_profile',$data);
        $this->load->view('castingDirector/includes/footer');
	}

	public function get_slot_project_and_role_wise(){
		$project_id = $this->input->post('project_id');
		$role_id = $this->input->post('role_id');
		$received = $this->project_model->get_slot_project_and_role_wise($project_id,$role_id);
		echo json_encode($received);
	}

	public function scheduleaudition(){
		$post=$this->input->post(NULL, TRUE);
		$data_talent_project_mapping = array('audition_schedule'=>1,'slot_id'=>$post['contnet']);
		$data_role_wise_adition_date = array('bookedstatus'=>1);
		$received1=$this->project_model->schedule_update_projectmapping($data_talent_project_mapping,$post['project_id'],$post['role_id'],$post['talent_id']);
		$received=$this->project_model->schedule_update_auditiondate($data_role_wise_adition_date,$post['project_id'],$post['role_id'],$post['contnet']);
		if($received==1 && $received1==1){
			redirect('castingDirector/director/view_project_role?id='.$post['role_id'].'&project_id='.$post['project_id'].'','refresh');
		}
	}

	public function request_shoot_or_audition(){
		$request_status = $this->input->post('request_status');
		$project_id = $this->input->post('project_id');
		$talent_id = $this->input->post('talent_id');
		$role_id = $this->input->post('role_id');
		$data = array('request_status'=>$request_status);
		$received = $this->project_model->update_selftape_by_talent($data,$project_id,$role_id,$talent_id);
		echo json_encode($received);
	}
}