<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

	public function __construct() {

        parent::__construct();

        $this->load->library('session');
        $this->session;
        $this->load->helper('url');
        $this->load->model('project_model');
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

		if($this->session->userdata('user_id') == null || $this->session->userdata('user_id') == '') {

			redirect(base_url().'login');
		}
		else {
			
			//$this->load->view('castingDirector/includes/topbar');
			//$this->load->view('castingDirector/includes/sidebar');
            $data['language']=$this->project_model->view_language();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/main/language_listing',$data);
			$this->load->view('admin/includes/footer');
		}
		
	}
    public function add_language() 
    {
        $post=$this->input->post(NULL, TRUE);
       // echo '<pre>';print_r($post);die;
        $data = array(
                            "language_name"=> $post['language_name'],
                            "created_at"=>date('Y-m-d H:i:s'),
                            "created_by"=>$this->session->userdata('user_id'),
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
                   // echo '<pre>';print_r($data);die;
       $received = $this->project_model->insert_language($data);
        if($received != ""){
			$message = array('message' => 'language created','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/language','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/language','refresh');
		}           
        
    }
    public function view_language(){

		$language_id = $this->input->get('language_id');
		$data['language'] = $this->project_model->get_language_by_id($language_id);
		//echo '<pre>'; print_r($data['language']);die;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/main/language_by_id',$data);
		$this->load->view('admin/includes/footer');

	}
    public function update_language() 
    {
		$post=$this->input->post(NULL, TRUE);
        $data = array(
                            "language_name"=> $post['language_name'],
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
        $received = $this->project_model->update_language($data,$post['language_id']); 
        if($received >= 1){
			$message = array('message' => 'language updated','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/language','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/language','refresh');
		}     
	}
    public function delete_language(){
		$language_id = $this->input->get('id');
		$data = array("status"=>0);
		$received = $this->project_model->update_language($data,$language_id);
		if($received >= 1){
			$message = array('message' => 'language deleted','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/language','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/language','refresh');
		}
	}	
   
		
}