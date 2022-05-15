<?php
class Register_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct() {

        $this->load->database();
    }
    
    public function new_register($data_to_insert) {
        $this->db->insert('user', $data_to_insert);
        return $this->db->insert_id();
    }
    public function new_talent_register($data_to_insert) {
        $this->db->insert('talent_profile', $data_to_insert);
        return $this->db->insert_id();
    }
    public function get_record_by_received_id($received_id){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("id", $received_id);
        $this->db->where('status',1);
        $res = $this->db->get();
        return $res->result_array();
    }
    public function update_user($update_user_data,$received_id){
        $this->db->where('id', $received_id);
    	$flag =$this->db->update('user', $update_user_data); 
    }
    public function update_talent_user($update_user_data,$received_id){
        $this->db->where('id', $received_id);
    	$flag =$this->db->update('talent_profile', $update_user_data); 
    }
    public function get_agents(){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("role_id", 3);
        $this->db->where('status',1);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function update_talent($update_user_data,$received_id){
        $this->db->where('id', $received_id);
    	return $flag =$this->db->update('user', $update_user_data); 
    }

    public function update_talent_by_agent($update_user_data,$received_id){
        $this->db->where('user_id', $received_id);
    	return $flag =$this->db->update('talent_profile', $update_user_data); 
    }
}

?>