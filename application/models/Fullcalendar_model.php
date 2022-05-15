<?php

class Fullcalendar_model extends CI_Model{

public function __construct() {

    $this->load->database();
        
    }

    function fetch_all_event($user_id){
        $this->db->where('created_by', $user_id);
        return $this->db->get('events');
        }

    function insert_event($data)
        {
        $this->db->insert('events', $data);
        }

    function update_event($data, $id)
        {
        $this->db->where('id', $id);
        $this->db->update('events', $data);
        }

    function delete_event($id)
        {
        $this->db->where('id', $id);
        $this->db->delete('events');
        }
    }

?>