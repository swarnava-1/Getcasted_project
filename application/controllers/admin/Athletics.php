<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Athletics extends CI_Controller {

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
			$data['athletics']=$this->project_model->view_athletics();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/main/athletics_listing',$data);
			$this->load->view('admin/includes/footer');
		}

		
    }
    public function add_athletics() 
    {
        $post=$this->input->post(NULL, TRUE);
       // echo '<pre>';print_r($post);die;
        $data = array(
                            "athletics_name"=> $post['athletics_name'],
                            "created_at"=>date('Y-m-d H:i:s'),
                            "created_by"=>$this->session->userdata('user_id'),
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
                   // echo '<pre>';print_r($data);die;
       $received = $this->project_model->insert_athletics($data);
        if($received != ""){
			$message = array('message' => 'athletics created','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/athletics','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/athletics','refresh');
		}           
        
    }
    public function view_athletics(){

		$athletics_id = $this->input->get('athletics_id');
		$data['athletics'] = $this->project_model->get_athletics_by_id($athletics_id);
		
		$this->load->view('admin/includes/header');
		$this->load->view('admin/main/athletics_by_id',$data);
		$this->load->view('admin/includes/footer');

	}
    public function update_athletics() 
    {
		$post=$this->input->post(NULL, TRUE);
        $data = array(
                            "athletics_name"=> $post['athletics_name'],
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
        $received = $this->project_model->update_athletics($data,$post['athletics_id']); 
        if($received >= 1){
			$message = array('message' => 'athletics updated','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/athletics','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/athletics','refresh');
		}     
	}
    public function delete_athletics(){
		$athletics_id = $this->input->get('id');
		$data = array("status"=>0);
		$received = $this->project_model->update_athletics($data,$athletics_id);
		if($received >= 1){
			$message = array('message' => 'athletics deleted','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/athletics','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/athletics','refresh');
		}
	}	
}