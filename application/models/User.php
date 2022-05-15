<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class User extends CI_Model { 
    function __construct(){ 
        //$this->userTbl        = 'user'; 
        //$this->planTbl    = 'plans'; 
        //$this->subscripTbl    = 'user_subscriptions'; 
        $this->load->database();
    } 
     
    /* 
     * Update user data to the database 
     * @param data array 
     * @param id specific user 
     */
    public function checkSubscriptionbyId($userId){
        $this->db->select('*');
        $this->db->from('user_subscriptions');
        $this->db->where('user_id',$userId);
        $sql = $this->db->get();
        return $sql->result_array();  
    }
    public function updatePlan($data, $userId){ 
        $update = $this->db->update('user_subscriptions', $data, array('user_id' => $userId)); 
        return $update?true:false; 
    }
    public function updateUser($data, $id){ 
        $update = $this->db->update('user', $data, array('id' => $id)); 
        return $update?true:false; 
    } 
     
    /* 
     * Fetch order data from the database 
     * @param id returns a single record 
     */ 
    public function getSubscription($id){ 
        $this->db->select('s.*, p.name as plan_name, p.price as plan_price, p.currency as plan_price_currency, p.interval'); 
        $this->db->from('user_subscriptions'.' as s'); 
        $this->db->join('plans'.' as p', 'p.id = s.plan_id', 'left'); 
        $this->db->where('s.id', $id); 
        $query  = $this->db->get(); 
        return ($query->num_rows() > 0)?$query->row_array():false; 
    }
    
    public function getSubscription_data($id){ 
        $this->db->select('s.*, p.name as plan_name, p.price as plan_price, p.currency as plan_price_currency, p.interval'); 
        $this->db->from('user_subscriptions'.' as s'); 
        $this->db->join('plans'.' as p', 'p.id = s.plan_id', 'left'); 
        $this->db->where('s.user_id', $id); 
        $query  = $this->db->get(); 
        return $query->result_array(); 
    }
    
     
    /* 
     * Insert subscription data in the database 
     * @param data array 
     */ 
    public function insertSubscription($data){ 
        $insert = $this->db->insert('user_subscriptions',$data); 
        return $insert?$this->db->insert_id():false; 
    } 
     
    /* 
     * Fetch plans data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 
    public function getPlans($id = ''){ 
        $this->db->select('*'); 
        $this->db->from('plans'); 
        if($id){ 
            $this->db->where('id', $id); 
            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->row_array():array(); 
        }else{ 
            $this->db->order_by('id', 'asc'); 
            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->result_array():array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    } 
}