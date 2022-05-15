<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ethnicity extends CI_Controller {

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
			$data['ethnicity']=$this->project_model->view_ethnicity();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/main/ethnicity_listing',$data);
			$this->load->view('admin/includes/footer');
		}

		
	}
    //Add ethnicity
    public function add_ethnicity() 
    {
        $post=$this->input->post(NULL, TRUE);
        $data = array(
                            "ethnicity_name"=> $post['ethnicity_name'],
                            "created_at"=>date('Y-m-d H:i:s'),
                            "created_by"=>$this->session->userdata('user_id'),
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
        $received = $this->project_model->insert_ethnicity($data); 
        if($received != ""){
			$message = array('message' => 'Ethnicity created','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/ethnicity','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/ethnicity','refresh');
		}           
        
    }
	public function view_ethnicity(){

		$ethnicity_id = $this->input->get('ethnicity_id');
		$data['ethnicity'] = $this->project_model->get_ethnicity_by_id($ethnicity_id);
		//echo '<pre>'; print_r($data['ethnicity']);die;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/main/ethnicity_by_id',$data);
		$this->load->view('admin/includes/footer');

	}

	public function update_ethnicity() 
    {
		$post=$this->input->post(NULL, TRUE);
        $data = array(
                            "ethnicity_name"=> $post['ethnicity_name'],
                            "updated_at"=>date('Y-m-d H:i:s'),
		                    "updated_by"=>$this->session->userdata('user_id')
                    );
        $received = $this->project_model->update_ethnicity($data,$post['ethnicity_id']); 
        if($received >= 1){
			$message = array('message' => 'Ethnicity updated','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/ethnicity','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/ethnicity','refresh');
		}     
	}

	public function delete_ethnicity(){
		$ethnicity_id = $this->input->get('id');
		$data = array("status"=>0);
		$received = $this->project_model->update_ethnicity($data,$ethnicity_id);
		if($received >= 1){
			$message = array('message' => 'Ethnicity delete','class' => 'alert alert-success');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/ethnicity','refresh');
		}else{
			$message = array('message' => 'Something went to wrong','class' => 'alert alert-danger');
            $this->session->set_flashdata('message', $message);
            $this->session->keep_flashdata('message',$message);
			redirect('admin/ethnicity','refresh');
		}
	}
		
}