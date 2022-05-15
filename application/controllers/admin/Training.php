<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {

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
			$data['training']=$this->project_model->view_training();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/main/training_listing',$data);
			$this->load->view('admin/includes/footer');
		}

		
	}
    public function add_training() 
    {
        $post=$this->input->post(NULL, TRUE);
       // echo '<pre>';print_r($post);die;
        $data = array(
                            "training_name"=> $post['training_name'],
                            "created_at"=>date('Y-m-d H:i:s'),
                            "created_by"=>$this->session->userdata('user_id'),
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
                   // echo '<pre>';print_r($data);die;
       $received = $this->project_model->insert_training($data);
        if($received != ""){
			$message = array('message' => 'training created','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/training','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/training','refresh');
		}           
        
    }
    public function view_training(){

		$training_id = $this->input->get('training_id');
		$data['training'] = $this->project_model->get_training_by_id($training_id);
		
		$this->load->view('admin/includes/header');
		$this->load->view('admin/main/training_by_id',$data);
		$this->load->view('admin/includes/footer');

	}
    public function update_training() 
    {
		$post=$this->input->post(NULL, TRUE);
        $data = array(
                            "training_name"=> $post['training_name'],
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
        $received = $this->project_model->update_training($data,$post['training_id']); 
        if($received >= 1){
			$message = array('message' => 'training updated','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/training','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/training','refresh');
		}     
	}
    public function delete_training(){
		$training_id = $this->input->get('id');
		$data = array("status"=>0);
		$received = $this->project_model->update_training($data,$training_id);
		if($received >= 1){
			$message = array('message' => 'training deleted','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/training','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/training','refresh');
		}
	}	
}    