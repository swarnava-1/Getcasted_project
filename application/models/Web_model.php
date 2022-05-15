<?php
class Web_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct() {

        $this->load->database();
    }
    
    public function insert_user($data_to_store) {

        $this->db->insert('user', $data_to_store);
        return $this->db->insert_id();
    }


    public function get_user() {

        // $this->db->where('id', $id);
        // $res = $this->db->update('user', $data_to_update);

        // return $res;

        $this->db->select("*");
        $this->db->from("web_user");

        $result = $this->db->get();

        return $result->result();
    }

    public function change_status($id, $data_to_update) {

        $this->db->where('id', $id);
        return $this->db->update('web_user', $data_to_update);
    }

    public function get_total_numbers() {

        $this->db->select("*");
        $result = $this->db->get("web_user");

        return $result->num_rows();
    }

    public function get_numbers() {

        $this->db->select("*");
        $this->db->from("customers");

        $res = $this->db->get();

        return $res->result();
    }
    //=====================Accounts===================================================================
    public function account_add($data_to_store) {

        $ins = $this->db->insert("accounts", $data_to_store);
        return $ins;
    }

    public function get_accounts() {

        $this->db->select("*");
        $this->db->from("accounts");
        $this->db->where('sstatus',1);
        $result = $this->db->get();

        return $result->result();
    }
    
    public function get_all_account_data() {

        $this->db->select("*");
        $this->db->from("accounts");
        $this->db->where('status',1);
        $result = $this->db->get();

        return $result->result();
    }

    public function delete_user_by_account_id($id) {

    	$this->db->where('id', $id);
		$flag = $this->db->delete('accounts');

    	return $flag;
    }

    public function change_status_account_model($id, $data_to_store) {

    	$this->db->where('id', $id);
    	$flag =$this->db->update('accounts', $data_to_store);

    	return $flag;
    }
    public function get_account_by_id($id) {

        $this->db->select("*");
        $this->db->from("accounts");
        $this->db->where("id", $id);
        $this->db->where('status',1);
        //$this->db->last_query();
       $res = $this->db->get();
       return $res->result();
    }

    public function update_account($data_to_store,$id) {

        $this->db->where("id", $id);
        $updt = $this->db->update("accounts", $data_to_store);

        return $updt;
    }

    public function get_childe_account($id) {

        $this->db->select("*");
        $this->db->from("accounts");
        $this->db->where("parent_id", $id);
        $res = $this->db->get();
        //echo $this->db->last_query();die;
        return $res->result();
    }
    //===============================contacts================================
    public function contact_add($data_to_store) {

        $ins = $this->db->insert("contacts", $data_to_store);
        return $ins;
    }

    public function get_contacts() {

        $this->db->select("*");
        $this->db->from("contacts");
        $result = $this->db->get();

        return $result->result();
    }

    public function delete_user_by_contact_id($id) {

    	$this->db->where('id', $id);
		$flag = $this->db->delete('contacts');

    	return $flag;
    }

    public function change_contact_status($id, $data_to_store) {

    	$this->db->where('id', $id);
    	$flag =$this->db->update('contacts', $data_to_store);

    	return $flag;
    }
    
    public function get_contact_by_id($id){
        
        $this->db->select("*");
        $this->db->from("contacts");
        $this->db->where("id", $id);
        $result = $this->db->get();
        return $result->result();
        
    }

    public function contact_update($data_to_store,$id){

        $this->db->where("id", $id);
        $updt = $this->db->update("contacts", $data_to_store);
        return $updt;
    }

    public function get_all_contacts(){
        $this->db->select("*");
        $this->db->from("contacts");
        $result = $this->db->get();
        return $result->result();
    }
    
    public function get_mail_id_by_contact_id($cont){
       $this->db->select("email_address");
       $this->db->from("contacts");
       $this->db->where('id',$cont);
       $result = $this->db->get();
       return $result->result(); 
    }
    
    //===============================contacts mail==============================
    public function insert_contactmail($data_to_store) {

        $ins = $this->db->insert("contact_mail", $data_to_store);
        return $ins;
    }
    
    public function get_contacts_mail(){
        $this->db->select("*");
        $this->db->from("contact_mail");
        $this->db->where("type", 'send');
        $result = $this->db->get();
        return $result->result();
    }
    public function get_contacts_received_mail(){
        $this->db->select("*");
        $this->db->from("contact_mail");
        $this->db->where("type", 'reply');
        $result = $this->db->get();
        return $result->result();
    }
    public function get_contacts_mail_for_reply(){
        $this->db->select("*");
        $this->db->from("contact_mail");
        $this->db->where("type", 'reply');
        $result = $this->db->get();
        return $result->result();
    }
    
    public function delete_reply_by_id($id){
        $this->db->where('id', $id);
		$flag = $this->db->delete('contact_mail');
    	return $flag;
    }
    
    public function get_reply_by_id($id){
        $this->db->select("*");
        $this->db->from("contact_mail");
        $this->db->where("id", $id);
        $result = $this->db->get();
        return $result->result();
    }
    
    public function update_reply($data_to_store,$id){
        $this->db->where("id", $id);
        $updt = $this->db->update("contact_mail", $data_to_store);
        return $updt; 
    }
     
    //===========================mom==============
     public function insert_mom($data_to_store) {

        $ins = $this->db->insert("table_mom", $data_to_store);
        return $ins;
    }
    
    public function get_mom(){
        $this->db->select("*");
        $this->db->from("table_mom");
        $result = $this->db->get();
        return $result->result();
    }
    
    public function delete_mom_by_id($id){
        $this->db->where('id', $id);
		$flag = $this->db->delete('table_mom');
    	return $flag;
    }
    public function get_mom_by_id($id){
        $this->db->select("*");
        $this->db->from("table_mom");
        $this->db->where("id", $id);
        $result = $this->db->get();
        return $result->result();
    }
    public function update_mom($data_to_store,$id){
        $this->db->where("id", $id);
        $updt = $this->db->update("table_mom", $data_to_store);
        return $updt; 
    }
}

?>