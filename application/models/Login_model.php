<?php
class Login_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct() {

        $this->load->database();
    }

    public function check_login($email, $password) {
    	$this->db->select('*');
    	$this->db->from('user');
    	$this->db->where('email_id', $email);
    	$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->result();
    
    }
}

?>