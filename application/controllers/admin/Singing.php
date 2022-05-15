<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Singing extends CI_Controller {

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
			$data['singing']=$this->project_model->view_singing();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/main/singing_listing',$data);
			$this->load->view('admin/includes/footer');
		}

		
	}
    public function add_singing() 
    {
        $post=$this->input->post(NULL, TRUE);
       // echo '<pre>';print_r($post);die;
        $data = array(
                            "singing_name"=> $post['singing_name'],
                            "created_at"=>date('Y-m-d H:i:s'),
                            "created_by"=>$this->session->userdata('user_id'),
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
                   // echo '<pre>';print_r($data);die;
       $received = $this->project_model->insert_singing($data);
        if($received != ""){
			$message = array('message' => 'singing created','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/singing','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/singing','refresh');
		}           
        
    }
    public function view_singing(){

		$singing_id = $this->input->get('singing_id');
		$data['singing'] = $this->project_model->get_training_by_id($singing_id);
		
		$this->load->view('admin/includes/header');
		$this->load->view('admin/main/singing_by_id',$data);
		$this->load->view('admin/includes/footer');

	}
    public function update_singing() 
    {
		$post=$this->input->post(NULL, TRUE);
        $data = array(
                            "singing_name"=> $post['singing_name'],
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
        $received = $this->project_model->update_singing($data,$post['singing_id']); 
        if($received >= 1){
			$message = array('message' => 'singing updated','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/singing','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/singing','refresh');
		}     
	}
    public function delete_singing(){
		$singing_id = $this->input->get('id');
		$data = array("status"=>0);
		$received = $this->project_model->update_singing($data,$singing_id);
		if($received >= 1){
			$message = array('message' => 'singing deleted','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/singing','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/singing','refresh');
		}
	}	
}