<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {

        parent::__construct();

        $this->load->library('session');
        $this->session;
        $this->load->helper('url');
        $this->load->model('login_model');
		$this->load->helper('cookie');
    }

	public function index() {
		$this->load->view('login');
	}
	public function validate() { 
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$remeberme = $this->input->post('customCheck');

		$flag = $this->login_model->check_login($email, $password);
		if(sizeof($flag) > 0) {
			if($flag[0]->id > 0) {
				if($remeberme=='on'){
					$this->input->set_cookie('email', $email,time()+ (365 * 24 * 60 * 60)); 
					$this->input->set_cookie('password', $password,time()+ (365 * 24 * 60 * 60));
				} 
				else {
					if(isset($_COOKIE["email"]))   
					{  
						setcookie ("email","");  
					}  
					if(isset($_COOKIE["password"]))   
					{  
						setcookie ("password","");  
					} 
				} 
				$this->session->set_userdata('user_id', $flag[0]->id);
				$this->session->set_userdata('email', $flag[0]->email);
				$this->session->set_userdata('user_name', $flag[0]->company_name_or_individual_name);
				$this->session->set_userdata('role_id', $flag[0]->role_id);
				$this->session->set_userdata('err_msg','');
				if($flag[0]->role_id == "1"){
					redirect(base_url().'admin/index');
				}elseif($flag[0]->role_id == "2"){
					redirect(base_url().'castingDirector/director/project_list');
				}elseif($flag[0]->role_id == "3"){
					redirect(base_url().'agents/agent/project_list');
				}elseif($flag[0]->role_id == "4"){
					redirect(base_url().'talent/index');
				}
			}
			else {

				$this->session->set_userdata('err_msg','* Invalid Email or Password !');
				redirect(base_url().'login');
			}
		}
		else {

			$this->session->set_userdata('err_msg','* Invalid Email or Password !');
			redirect(base_url().'login');
		}
		//redirect(base_url().'index');
	}
			
		
}