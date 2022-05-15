<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

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
	public function project_list() {
		$user_id=$this->session->userdata('user_id');
		$data['talents'] = $this->project_model->get_talents_by_agent_id($user_id);
		$talet_id = array();
		foreach($data['talents'] as $talent){
			array_push($talet_id,$talent['user_id']);
		}
		$talet_id_implode = implode(",",$talet_id);
        $data['projects'] = $this->project_model->get_talent_projects_by_agent($talet_id_implode);
		$this->load->view('agents/includes/header');
		$this->load->view('agents/main/project_listing',$data);
		$this->load->view('agents/includes/footer');
		
	}

	public function view_project(){
		$id = $this->input->get('id');
		$data['project'] = $this->project_model->get_project_by_d($id);
		$data['roles'] = $this->project_model->get_all_roles_by_project_id_by_agentid($id);
		$this->load->view('agents/includes/header');
        $this->load->view('agents/main/project_view',$data);
        $this->load->view('agents/includes/footer');
	}

	public function view_project_role(){
        $user_id=$this->session->userdata('user_id');
		$project_id = $this->input->get('project_id');
		$role_id = $this->input->get('id');
        $data['role_by_id'] = $this->project_model->get_role_by_d($role_id);
        $data['talents'] = $this->project_model->get_requested_talents_by_agent($role_id,$project_id,$user_id);
		$this->load->view('agents/includes/header');
        $this->load->view('agents/main/view_project_role',$data);
        $this->load->view('agents/includes/footer');
	}
	
	public function view_talent(){
		$talent_id = $this->input->get('talentid');
		$data['talents'] = $this->project_model->get_talents_id($talent_id);
		$this->load->view('agents/includes/header');
        $this->load->view('agents/main/view_talent_profile',$data);
        $this->load->view('agents/includes/footer');
	}

	public function edit_talent(){
		$data['agents'] = $this->register_model->get_agents();
		$talent_id = $this->input->get('talentid');
		$data['talents'] = $this->project_model->get_talents_id($talent_id);
		$this->load->view('agents/includes/header');
        $this->load->view('agents/main/edit_talent_profile',$data);
        $this->load->view('agents/includes/footer'); 
	}

	public function talent_list() {
		$data['agents'] = $this->register_model->get_agents();
		$agent_id = $this->session->userdata('user_id');
		$data['talents'] = $this->project_model->get_talents_by_agent_id($agent_id);
		$this->load->view('agents/includes/header');
		$this->load->view('agents/main/talent_listing',$data);
		$this->load->view('agents/includes/footer');
		
	}

	//apply project by talent

	public function apply_talent_id(){
		$project_id = $this->input->post('project_id');
		$talent_id = $this->input->post('talent_id');
		$role_id = $this->input->post('role_id');
		$data_apply = array(	
							'project_id'=>$project_id,
							'talent_id'=>$talent_id,
							'role_id'=>$role_id 
						);
		$received = $this->project_model->apply_talent($data_apply);
		return $received;
	}

	public function get_slot_project_and_role_wise(){
		$project_id = $this->input->post('project_id');
		$role_id = $this->input->post('role_id');
		$received = $this->project_model->get_slot_project_and_role_wise($project_id,$role_id);
		echo json_encode($received);
	}

	public function scheduleaudition(){
		$post=$this->input->post(NULL, TRUE);
		$data_talent_project_mapping = array('slot_date'=>$post['shoot_date'],'slot_time'=>$post['slot_time'],'audition_schedule'=>$post['shootoption']);
		$received=$this->project_model->schedule_update_projectmapping($data_talent_project_mapping,$post['project_id1'],$post['role_id1'],$post['talent_id1']);
		if($received==1){
			redirect('agents/agent/view_project_role?id='.$post['role_id1'].'&project_id='.$post['project_id1'].'','refresh');
		}
	}

	public function update_talent(){
		$post=$this->input->post(NULL, TRUE);

        $talent = $post['talent_roles'];
        $talent_roles = implode(",",$talent);

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

        if($post['password']!=$post['password1']){
            $message = array('message' => 'Confirm password is not match','class' => 'alert alert-danger');
            $this->session->set_flashdata('warning_message', $message);
            $this->session->keep_flashdata('warning_message',$message);
            redirect(base_url().'agents/agent/talent_list','refresh');
        }else{
                $data = array(
                                'company_name_or_individual_name'=>$post['profile_name'],
                                //'address'=>$post['address'],
                                'contact_no'=>$post['contact_info'],
                                'mobile_number'=>"",
                                'email_id'=>$post['email'],
                                //'tax_reg_number'=>"",
                                'password'=>$post['password'],
                                'role_id'=>$post['role_id'],
                            );
            $received_id = $this->register_model->update_talent($data,$post['talent_id']);
            $data_to_update = array(
                                    'profile_name'=>$post['profile_name'],
                                    'current_conflicts'=>$post['current_conflicts'],
                                    'expiration_date'=>$post['expiration_date'],
                                    'age'=>$post['age'],
                                    'address'=>$post['address'],
                                    'distance'=>$post['distance'],
                                    'talent_roles'=>$talent_roles,
                                    'union_status'=>$post['union_status'],
                                    'agent'=>$post['agent'],
                                    'agent_id'=>$post['agent_id'],
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
                                    'training'=>$training_data,
                                    'athletics'=>$athletics_data,
                                    'singing'=>$singing_data,
                                    'dancing'=>$dancing_data,
                                    'driving_experience'=>$driving_experience_data,
                                    'citizenship_or_visa_documents'=>$post['citizenship_or_visa_documents'],
                                    'email'=>$post['email'],
                                    'citizenship_or_visa_documents_other'=>$post['citizenship_or_visa_documents_other'],
                                    'social_media_link_instagram'=>$post['social_media_link_instagram'],
                                    'social_media_link_tik_tok'=>$post['social_media_link_tik_tok'],
                                    'contact_info'=>$post['contact_info'],
                                    'Headshot_upload'=>$this->headshot_upload($_FILES['Headshot_upload']),
                                    'reel_upload'=>$this->reel_upload($_FILES['reel_upload']),
                                    'photo_upload'=>$this->photo_upload($_FILES['photo_upload']),
									"updated_at"=>date('Y-m-d H:i:s'),
									"updated_by"=>$this->session->userdata('user_id')
                                );
							//echo $post['talent_id'];echo '<pre>';print_r($data_to_update);die;
			$flag = $this->register_model->update_talent_by_agent($data_to_update,$post['talent_id']);
			if($flag==1){
				$message = array('message' => 'Talent Updated','class' => 'alert alert-success');
				$this->session->set_flashdata('message', $message);
				redirect(base_url().'agents/agent/talent_list','refresh');
			}else{
				$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
				$this->session->set_flashdata('message', $message);
				$this->session->keep_flashdata('message',$message);
				redirect(base_url().'agents/agent/talent_list','refresh');
			}
		}
		
	}

	public function headshot_upload($headshot_upload) {
        $p="";
        if(isset($headshot_upload)) {
            $fileName = '';
            $filename = $headshot_upload['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (($ext == "wmv") || ($ext == "mp4") || ($ext == "avi") || ($ext == "mov")
            && ($headshot_upload["size"] < 3000000000)) {
                if ($headshot_upload["error"] > 0) {
                    echo "File Error : " . $headshot_upload["error"] . "<br />" ."1";
                } else {
                    "Upload File Name: " . $headshot_upload["name"] . "<br />";
                    "File Type: " . $headshot_upload["type"] . "<br />";
                    "File Size: " . ($headshot_upload["size"] / 1024) . " Kb<br />"; 
                    //$temp = explode(".", $_FILES["file1"]["name"]);
                    $fileName =time()."_".$headshot_upload["name"];
                    $p="upload/headshot_upload/".$fileName;
                    move_uploaded_file($headshot_upload["tmp_name"],"upload/headshot_upload/".$fileName);
                }
            }
        }
        return $p;
    }
    public function reel_upload($reel_upload) {
        $p1="";
        if(isset($reel_upload)) {
            $fileName = '';
            $filename = $reel_upload['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (($ext == "wmv") || ($ext == "mp4") || ($ext == "avi") || ($ext == "mov")
            && ($reel_upload["size"] < 3000000000)) {
                if ($reel_upload["error"] > 0) {
                    echo "File Error : " . $reel_upload["error"] . "<br />" ."1";
                } else {
                    "Upload File Name: " . $reel_upload["name"] . "<br />";
                    "File Type: " . $reel_upload["type"] . "<br />";
                    "File Size: " . ($reel_upload["size"] / 1024) . " Kb<br />"; 
                    //$temp = explode(".", $_FILES["file1"]["name"]);
                    $fileName =time()."_".$reel_upload["name"];
                    $p1="upload/reel_upload/".$fileName;
                    move_uploaded_file($reel_upload["tmp_name"],"upload/reel_upload/".$fileName);
                }
            }
        }
        return $p1;
    }

    public function photo_upload($photo_upload) {
        $p1="";
        if(isset($photo_upload)) {
            $fileName = '';
            $filename = $photo_upload['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (($ext == "jpg") || ($ext == "png")
            && ($photo_upload["size"] < 3000000000)) {
                if ($photo_upload["error"] > 0) {
                    echo "File Error : " . $photo_upload["error"] . "<br />" ."1";
                } else {
                    "Upload File Name: " . $photo_upload["name"] . "<br />";
                    "File Type: " . $photo_upload["type"] . "<br />";
                    "File Size: " . ($photo_upload["size"] / 1024) . " Kb<br />"; 
                    //$temp = explode(".", $_FILES["file1"]["name"]);
                    $fileName =time()."_".$photo_upload["name"];
                    $p1="upload/photo_upload/".$fileName;
                    move_uploaded_file($photo_upload["tmp_name"],"upload/photo_upload/".$fileName);
                }
            }
        }
        return $p1;
    }
    public function get_slot(){
        $received_slot = $this->project_model->get_slot();
        $received_shoot_date = $this->project_model->get_slot();
		echo json_encode($received_slot);
    }

    public function get_slot_date(){
		$project_id = $this->input->post('project_id');
		$role_id = $this->input->post('role_id');
		$received = $this->project_model->get_shoot_date($project_id,$role_id);
		echo json_encode($received);
	}
}