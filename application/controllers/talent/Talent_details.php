<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talent_details extends CI_Controller {

     public function __construct() {

        parent::__construct();

        $this->load->library('session');
        $this->session;
        $this->load->helper('url');
        $this->load->model('project_model');
        if($this->session->userdata('user_id') == null || $this->session->userdata('user_id') == '') {
                redirect(base_url().'login');
        }
    }
    public function project_list() {
        $user_id=$this->session->userdata('user_id');
        $data['projects'] = $this->project_model->get_talent_projects($user_id);
        $this->load->view('talents/includes/header');
        $this->load->view('talents/main/project_listing',$data);
        $this->load->view('talents/includes/footer');
        }

    public function view_project(){
        $user_id = $this->session->userdata('user_id');
        $project_id = $this->input->get('id');
        $data['project'] = $this->project_model->get_project_by_d($project_id);
        $data['roles'] = $this->project_model->get_talent_roles_by_project_id($user_id,$project_id);
        $this->load->view('talents/includes/header');
        $this->load->view('talents/main/project_view',$data);
        $this->load->view('talents/includes/footer');
	}

    public function view_project_role(){
        $role_id = $this->input->get('id');
        $talent_id = $this->session->userdata('user_id');
        $data['role_by_id'] = $this->project_model->get_role_by_d($role_id);
        $data['talent'] = $this->project_model->get_talents_by_id($talent_id);
	    $this->load->view('talents/includes/header');
        $this->load->view('talents/main/view_project_role',$data);
        $this->load->view('talents/includes/footer');
	}
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

    public function decline_role(){
        $project_id = $this->input->post('project_id');
        $talent_id = $this->input->post('talent_id');
        $role_id = $this->input->post('role_id');
            $data_to_update = array(
                                    'submit_selftape'=>2
                                    );
        $received=$this->project_model->update_selftape_by_talent($data_to_update,$project_id,$role_id, $talent_id);
        echo json_encode($received);
	}

    public function get_slot_date(){
		$project_id = $this->input->post('project_id');
		$role_id = $this->input->post('role_id');
		$received = $this->project_model->get_shoot_date($project_id,$role_id);
		echo json_encode($received);
	}

    public function get_slot(){
        $received_slot = $this->project_model->get_slot();
        $received_shoot_date = $this->project_model->get_slot();
		echo json_encode($received_slot);
    }

	public function scheduleaudition(){
		$post=$this->input->post(NULL, TRUE);
		$data_talent_project_mapping = array('slot_date'=>$post['shoot_date'],'slot_time'=>$post['slot_time'],'audition_schedule'=>$post['shootoption']);
		$received=$this->project_model->schedule_update_projectmapping($data_talent_project_mapping,$post['project_id1'],$post['role_id1'],$post['talent_id1']);
		if($received==1){
			redirect('talent/talent_details/view_project_role?id='.$post['role_id1'].'&project_id='.$post['project_id1'].'','refresh');
		}
	}

    public function submit_self_tape(){
        $project_id = $this->input->post('project_id');
		$role_id = $this->input->post('role_id');
        $talent_id = $this->input->post('talent_id');
        //print_r($_FILES['self_tape']);die;

        $data_to_update = array(
                                    'submit_selftape'=>1,
                                    'self_tape'=>$this->selftape_upload($_FILES['self_tape'])
                                );
        $received=$this->project_model->update_selftape_by_talent($data_to_update,$project_id,$role_id, $talent_id);
            if($received==1){
                $message = array('message' => 'Your Self Tape successfully submitted','class' => 'alert alert-success');
			    $this->session->set_flashdata('message', $message);
                redirect('talent/talent_details/view_project_role?id='.$role_id.'&project_id='.$project_id.'','refresh');
            }
    }

    public function selftape_upload($headshot_upload) {
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
                    $p="upload/submit_self_tape/".$fileName;
                    move_uploaded_file($headshot_upload["tmp_name"],"upload/submit_self_tape/".$fileName);
                }
            }
        }
        return $p;
    }

    public function read_notification(){
        $noti_id = $this->input->post('id');
        $data = array('read_status'=>1);
        $received = $this->project_model->update_read_notification($data,$noti_id);
		echo json_encode($received);
    }
    
    public function subscription_plan(){
        $this->load->view('talents/includes/header');
        $this->load->view('talents/main/membership');
        $this->load->view('talents/includes/footer');
    }
		
}
			
		
