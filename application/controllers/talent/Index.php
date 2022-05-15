<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {

        parent::__construct();

        $this->load->library('session');
        $this->session;
        $this->load->helper('url');
        $this->load->model('project_model');
        $this->load->model('user');
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
		    $user_id = $this->session->userdata('user_id');
		    $data['subscription_plan'] = $this->user->getSubscription_data($user_id);
		    //echo '<pre>';print_r($data['subscription_plan']);
			$this->load->view('talents/includes/header');
			$this->load->view('talents/main/index',$data);
			$this->load->view('talents/includes/footer');
		}
		
	}
			
		
}