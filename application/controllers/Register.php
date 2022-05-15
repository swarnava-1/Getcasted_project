<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    private $error;
    private $success;
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->session;
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('register_model');
        //$this->load->model('web_model');
        //$this->load->model('user_model');

	/*	$this->load->model('about_us_model');
        $this->load->model('sitesetting_model');
		$this->load->model('header_model');

        //if(!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }*/ 
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
        $data['agents'] = $this->register_model->get_agents();
		$this->load->view('register',$data);	
	}

    public function newUser(){
        $post=$this->input->post(NULL, TRUE);
        if($post['password']!=$post['password1']){
            $message = array('message' => 'Confirm password is not match','class' => 'alert alert-danger');
            $this->session->set_flashdata('warning_message', $message);
            $this->session->keep_flashdata('warning_message',$message);
            redirect('register','refresh');
        }else{
                $data = array(
                            'company_name_or_individual_name'=>$post['company_name_or_individual_name'],
                            //'address'=>$post['address'],
                            'contact_no'=>$post['contact_no'],
                            'mobile_number'=>$post['mobile_number'],
                            'email_id'=>$post['email_id'],
                            //'tax_reg_number'=>$post['tax_reg_number'],
                            'password'=>$post['password'],
                            'role_id'=>$post['role_id'],
                        );
           $received_id = $this->register_model->new_register($data);
            if($received_id != ""){
                $update_user_data = array("created_by"=>$received_id,"updated_at"=>date('Y-m-d H:i:s'),"updated_by"=>$received_id);
                $this->register_model->update_user($update_user_data,$received_id);
                $this->session->set_userdata('user_id', $received_id);
                $data['get_record_by_received_id'] = $this->register_model->get_record_by_received_id($received_id);
                $this->session->set_userdata('user_id', $data['get_record_by_received_id'][0]['id']);
				$this->session->set_userdata('email', $data['get_record_by_received_id'][0]['email']);
				$this->session->set_userdata('user_name',$data['get_record_by_received_id'][0]['company_name_or_individual_name']);
				$this->session->set_userdata('role_id', $data['get_record_by_received_id'][0]['role_id']);
				$this->session->set_userdata('err_msg','');
				
                if($data['get_record_by_received_id'][0]['role_id'] == "2"){
					redirect(base_url().'castingDirector/director/project_list');
				}
                elseif($data['get_record_by_received_id'][0]['role_id'] == "3"){
				redirect(base_url().'agents/agent/project_list');
				}
                       
            }else{
                redirect('register');
            }
        }
    }
    
    public function newTalent(){
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
            redirect('register','refresh');
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
            $received_id = $this->register_model->new_register($data);
            $data_to_insert = array(
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
                                    'user_id' =>$received_id,
                                    'Headshot_upload'=>$this->headshot_upload($_FILES['Headshot_upload']),
                                    'reel_upload'=>$this->reel_upload($_FILES['reel_upload']),
                                    'photo_upload'=>$this->photo_upload($_FILES['photo_upload'])
                                );
            //echo '<pre>';print_r($data_to_insert);die;
            $received_talent_id = $this->register_model->new_talent_register($data_to_insert);
            if($received_talent_id != ""){
                $update_user_data = array("created_by"=>$received_id,"updated_at"=>date('Y-m-d H:i:s'),"updated_by"=>$received_id);
                $this->register_model->update_user($update_user_data,$received_id);
                $this->register_model->update_talent_user($update_user_data,$received_talent_id);
                $this->session->set_userdata('user_id', $received_id);
                $data['get_record_by_received_id'] = $this->register_model->get_record_by_received_id($received_id);
                $this->session->set_userdata('user_id', $data['get_record_by_received_id'][0]['id']);
				$this->session->set_userdata('email', $data['get_record_by_received_id'][0]['email']);
				$this->session->set_userdata('user_name',$data['get_record_by_received_id'][0]['company_name_or_individual_name']);
				$this->session->set_userdata('role_id', $data['get_record_by_received_id'][0]['role_id']);
				$this->session->set_userdata('err_msg','');
                redirect(base_url().'talent/subscription');           
            }else{
                redirect('register');
            }
         }
    }
    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "\r\n";
    }

    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "\r\n";
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
		
}
