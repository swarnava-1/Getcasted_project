<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fullcalendar_model');
		$this->load->helper('url');
		if($this->session->userdata('user_id') == null || $this->session->userdata('user_id') == '') {
			redirect(base_url().'login');
		}
	}

 	public function index()
		{
			$talentid = $this->input->get('talentid');
			$this->session->set_userdata('talentid',$talentid);
			$this->load->view('agents/includes/header');
			$this->load->view('agents/main/calendar');
			//$this->load->view('castingDirector/includes/footer');
			//$this->load->view('castingDirector/includes/footer');
		}

	public function load()
		{
		$user_id = $this->session->userdata('talentid');
		$event_data = $this->fullcalendar_model->fetch_all_event($user_id);
		//echo '<pre>';print_r($event_data);die;
		foreach($event_data->result_array() as $row)
			{
			$data[] = array(
				'id' => $row['id'],
				'title' => $row['title'],
				'start' => $row['start_event'],
				'end' => $row['end_event']
			);
			}
			echo json_encode($data);
		}

	public function insert()
		{
		if($this->input->post('title'))
			{
			$data = array(
				'title'  => $this->input->post('title'),
				'start_event'=> $this->input->post('start'),
				'end_event' => $this->input->post('end'),
				'created_by' => $this->session->userdata('user_id'),
				'updated_by' => $this->session->userdata('user_id')
			);
			$this->fullcalendar_model->insert_event($data);
			}
		}

	public function update()
		{
		if($this->input->post('id'))
			{
			$data = array(
				'title'   => $this->input->post('title'),
				'start_event' => $this->input->post('start'),
				'end_event'  => $this->input->post('end'),
				'updated_by' => $this->input->get('user_id')
			);

			$this->fullcalendar_model->update_event($data, $this->input->post('id'));
			}
		}

	public function delete()
	{
		if($this->input->post('id'))
		{
		$this->fullcalendar_model->delete_event($this->input->post('id'));
		}
	}

}

?>

