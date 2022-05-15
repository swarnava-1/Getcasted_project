<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

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
			$data['agents']=$this->project_model->view_agents();
            //echo '<pre>'; print_r($data['agents']);die;
			$this->load->view('admin/includes/header');
			$this->load->view('admin/main/agent_listing',$data);
			$this->load->view('admin/includes/footer');
		}
        
    }
    public function view_agents(){

		$agents_id = $this->input->get('agents_id');
		$data['agents'] = $this->project_model->get_agents_by_id($agents_id);
		//echo '<pre>';print_r($data['agents']);die;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/main/agents_by_id',$data);
		$this->load->view('admin/includes/footer');
    }

	
}    