<?php
class Project_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct() {

        $this->load->database();
    }
    
    public function new_project($data_to_insert) {
        $this->db->insert('project', $data_to_insert);
        return $this->db->insert_id();
    }

    public function update_project($update_project_data,$received_id){
        $this->db->where('id', $received_id);
    	$flag =$this->db->update('project', $update_project_data);
        return $flag;
    }

    public function get_all_project($user_id){
        $this->db->select("*");
        $this->db->from("project");
        $this->db->where("status",1);
        $this->db->where("created_by",$user_id);
        $this->db->order_by("id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function project_archive_list($user_id){
        $this->db->select("*");
        $this->db->from("project");
        $this->db->where("status",0);
        $this->db->where("created_by",$user_id);
        $this->db->order_by("id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_projects(){
        $this->db->select("*");
        $this->db->from("project");
        $this->db->where("status",1);
        $this->db->order_by("id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_all_project_for_applicant(){
        $this->db->select("*");
        $this->db->from("project");
        $this->db->where("status",1);
        $this->db->order_by("id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }
    
    public function get_project_by_d($id){
        $this->db->select("*");
        $this->db->from("project");
        $this->db->where("id",$id);
        $res = $this->db->get();
        return $res->result_array();
    }
    
    public function create_project_role($post){
        $this->db->insert('project_role', $post);
        return $this->db->insert_id();
    }

    public function update_role($update_project_data,$received_id){
        $this->db->where('id', $received_id);
    	$flag =$this->db->update('project_role', $update_project_data); 
        return $flag;
    }
    public function insert_role_project($data_role_project){
        $this->db->insert('role_project_mapping', $data_role_project); 
    }

    public function get_all_roles_by_project_id($id){
        $this->db->select("*");
        $this->db->from("project_role");
        $this->db->where("status",1);
        $this->db->where("project_id",$id);
        $this->db->order_by("id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_role_by_d($role_id){
        $this->db->select("*");
        $this->db->from("project_role");
        $this->db->where("status",1);
        $this->db->where("id",$role_id);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function delete_project($data,$id){
        $this->db->where('id', $id);
    	$flag =$this->db->update('project', $data);
        return $flag;
    }

    public function delete_role($data,$id){
        $this->db->where('id', $id);
    	$flag =$this->db->update('project_role', $data);
        return $flag;
    }

    //for agents

    public function get_talents_by_agent_by_role($agent_id,$role_id,$talent_id_implode){
        $this->db->select("t.*,u.*");
        $this->db->from('talent_profile as t');
        //$this->db->join("talent_profile as t" , 'pr.roles_name = t.talent_roles', 'left');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->where("u.status",1);
        $this->db->where("t.agent_id",$agent_id);
        //$this->db->where("pr.id",$role_id);
        $this->db->where_in('t.user_id',$talent_id_implode);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        $this->db->last_query();
        return $res->result_array();
    }

    public function get_talents_id($talent_id){
        $this->db->select("t.*,u.*,t.address as talent_address");
        $this->db->from("talent_profile as t");
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->where("t.user_id",$talent_id);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_talents_by_agent_id($agent_id){
        $this->db->select("t.*,u.*,t.address as talent_address");
        $this->db->from('talent_profile as t');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->where("u.status",1);
        $this->db->where("t.agent_id",$agent_id);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function apply_talent($data_apply){
        $res = $this->db->insert('talent_project_mapping', $data_apply);
        return $res;  
    }
    
    public function get_project_by_talent_row($project_id,$talent_id,$role_id){
        $this->db->select("*");
        $this->db->from("talent_project_mapping");
        $this->db->where("project_id",$project_id);
        $this->db->where("talent_id",$talent_id);
        $this->db->where("role_id",$role_id);
        $res = $this->db->get();
        return $res->num_rows();
    }

    public function get_talents_by_id($talent_id){
        $this->db->select("t.*,u.*");
        $this->db->from('talent_profile as t');
        //$this->db->join("talent_profile as t" , 'pr.roles_name = t.talent_roles', 'left');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->where("u.status",1);
        //$this->db->where("t.agent_id",$agent_id);
        //$this->db->where("pr.id",$role_id);
        $this->db->where('u.id',$talent_id);
        //$this->db->order_by("t.id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_talents_by_project($role_id,$project_id){
        $this->db->select("t.*,u.*");
        $this->db->from('talent_project_mapping as tpm');
        //$this->db->from('talent_profile as t');
        //$this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->join('user as u', 'tpm.talent_id = u.id', 'left');
        $this->db->join('talent_profile as t', ' u.id = t.user_id', 'left');
        //$this->db->join('talent_project_mapping as tpm', 'u.id = tpm.talent_id', 'left');
        $this->db->where("u.status",1);
        $this->db->where("tpm.project_id",$project_id);
        $this->db->where("tpm.role_id",$role_id);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_talents_by_apply_by_role($talent_id_implode){
        $this->db->select("t.*,u.*");
        $this->db->from('talent_profile as t');
        //$this->db->join("talent_profile as t" , 'pr.roles_name = t.talent_roles', 'left');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->where("u.status",1);
        //$this->db->where("t.agent_id",$agent_id);
        //$this->db->where("pr.id",$role_id);
        $this->db->where_in('t.user_id',$talent_id_implode);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        $this->db->last_query();
        return $res->result_array();
    }

    public function update_talent_req_status($project_id,$talent_id,$role_id,$srequest){
        $this->db->where('project_id', $project_id);
        $this->db->where('talent_id', $talent_id);
        $this->db->where('role_id', $role_id);
    	$flag =$this->db->update('talent_project_mapping', $srequest);
        return $flag;
    }

    public function insert_talent_req_status($data_to_insert){
        $req = $this->db->insert('talent_project_mapping', $data_to_insert);
        return $req;
    }

    public function get_srequst_status_row($project_id,$talent_id,$role_id){
        $this->db->select("*");
        $this->db->from("talent_project_mapping");
        $this->db->where("project_id",$project_id);
        $this->db->where("talent_id",$talent_id);
        $this->db->where("role_id",$role_id);
        $res = $this->db->get();
        return $res->result_array();

    }

    public function get_user_by_id($userid){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("id",$userid);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_slot_project_and_role_wise($project_id,$role_id){
        $this->db->select("*");
        $this->db->from("role_wise_adition_date");
        $this->db->where("project_id",$project_id);
        $this->db->where("role_id",$role_id);
        $this->db->where("bookedstatus",0);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_slot(){
        $this->db->select("*");
        $this->db->from("audition_slot");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function get_shoot_date($project_id){
        $this->db->select("optional_shoot_dates");
        $this->db->from("project");
        $this->db->where("id",$project_id);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function schedule_update_projectmapping($data_talent_project_mapping,$project_id,$role_id,$talet_id){
        $this->db->where('role_id', $role_id);
        $this->db->where('project_id', $project_id);
        $this->db->where('talent_id', $talet_id);
    	$flag =$this->db->update('talent_project_mapping', $data_talent_project_mapping);
        return $flag;
    }

    public function get_all_talents(){
        $this->db->select("t.*,u.*,t.address as talent_address");
        $this->db->from('talent_profile as t');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->where("u.status",1);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        $this->db->last_query();
        return $res->result_array();
    }
    public function schedule_update_auditiondate($data_role_wise_adition_date,$project_id,$role_id,$contnet){
        $this->db->where('role_id', $role_id);
        $this->db->where('project_id', $project_id);
        $this->db->where('id', $contnet);
    	$flag =$this->db->update('role_wise_adition_date', $data_role_wise_adition_date);
        return $flag;
    }
    
    public function create_slot($data_slot){
        $this->db->insert('role_wise_adition_date', $data_slot);
        $this->db->insert_id();
    }
    // public function get_slot($slot_id){
    //     $this->db->select("*");
    //     $this->db->from("role_wise_adition_date");
    //     $this->db->where("id",$slot_id);
    //     $res = $this->db->get();
    //     return $res->result_array();
    // }

    public function get_requested_talents($role_id,$project_id){
        $this->db->select("t.*,u.*,t.address as talent_address,tpm.submit_selftape");
        $this->db->from('talent_profile as t');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->join('talent_project_mapping as tpm', 'u.id = tpm.talent_id', 'left');
        $this->db->where("u.status",1);
        $this->db->where('tpm.role_id', $role_id);
        $this->db->where('tpm.project_id', $project_id);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        //echo $this->db->last_query();die;
        return $res->result_array();
    }

    public function get_requested_talents_by_agent($role_id,$project_id,$user_id){
        $this->db->select("t.*,u.*,t.address as talent_address,tpm.submit_selftape");
        $this->db->from('talent_profile as t');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->join('talent_project_mapping as tpm', 'u.id = tpm.talent_id', 'left');
        $this->db->where("u.status",1);
        $this->db->where('tpm.role_id', $role_id);
        $this->db->where('tpm.project_id', $project_id);
        $this->db->where('t.agent_id', $user_id);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        //echo $this->db->last_query();die;
        return $res->result_array();
    }

    public function get_self_tape_submitted_talents($role_id,$project_id){
        $this->db->select("t.*,u.*,tpm.self_tape,t.address as talent_address");
        $this->db->from('talent_profile as t');
        $this->db->join('user as u', 't.user_id = u.id', 'left');
        $this->db->join('talent_project_mapping as tpm', 'u.id = tpm.talent_id', 'left');
        $this->db->where("u.status",1);
        $this->db->where('tpm.role_id', $role_id);
        $this->db->where('tpm.project_id', $project_id);
        $this->db->where("tpm.submit_selftape",1);
        $this->db->order_by("t.id","desc");
        $res = $this->db->get();
        //$this->db->last_query();
        return $res->result_array();
    }

    public function get_talent_projects($user_id){
        $this->db->select("p.*");
        $this->db->from('project as p');
        $this->db->join('talent_project_mapping as tpm', 'p.id = tpm.project_id', 'left');
        $this->db->where("p.status",1);
        $this->db->where('tpm.talent_id', $user_id);
        $this->db->order_by("p.id","desc");
        $this->db->group_by('tpm.project_id');
        $res = $this->db->get();
        //$this->db->last_query();
        return $res->result_array();
    }

    public function get_talent_projects_by_agent($talent_ids){
        $this->db->select("p.*");
        $this->db->from('project as p');
        $this->db->join('talent_project_mapping as tpm', 'p.id = tpm.project_id', 'left');
        $this->db->where_in('tpm.talent_id', $talent_ids);
        $this->db->where("p.status",1);
        $this->db->order_by("p.id","desc");
        $this->db->group_by('tpm.project_id');
        $res = $this->db->get();
        return $res->result_array();
    }
    public function get_all_roles_by_project_id_by_agentid($project_id){
        $this->db->select("p.*");
        $this->db->from('project_role as p');
        $this->db->join('talent_project_mapping as tpm', 'p.id = tpm.role_id', 'left');
        $this->db->where_in('tpm.project_id', $project_id);
        $this->db->where("p.status",1);
        $this->db->order_by("p.id","desc");
        $this->db->group_by('tpm.role_id');
        $res = $this->db->get();
        return $res->result_array();
    }
    public function get_talent_roles_by_project_id($user_id,$project_id){
        $this->db->select("p.*,tpm.submit_selftape");
        $this->db->from('project_role as p');
        $this->db->join('talent_project_mapping as tpm', 'p.id = tpm.role_id', 'left');
        $this->db->where("p.status",1);
        $this->db->where('tpm.project_id', $project_id);
        $this->db->where('tpm.talent_id', $user_id);
        $this->db->order_by("p.id","desc");
        $this->db->group_by('tpm.role_id');
        $res = $this->db->get();
        $this->db->last_query();
        return $res->result_array();
    }

    public function get_all_user(){
        $this->db->select("*");
        $this->db->from("user");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function update_selftape_by_talent($data_to_update,$project_id,$role_id,$talent_id){
        $this->db->where('project_id', $project_id);
        $this->db->where('talent_id', $talent_id);
        $this->db->where('role_id', $role_id);
    	$flag =$this->db->update('talent_project_mapping', $data_to_update);
        return $flag;
    }

    public function get_selftape_data($project_id,$talent_id,$role_id){
        $this->db->select("*");
        $this->db->from("talent_project_mapping");
        $this->db->where('project_id', $project_id);
        $this->db->where('talent_id', $talent_id);
        $this->db->where('role_id', $role_id);
        $res = $this->db->get();
        return $res->result_array();
    }

    //notification insert

    public function insert_notification($notification){
        $this->db->insert('notification', $notification);
    }

    public function get_unread_notification($user_id){
        $this->db->select("*");
        $this->db->from("notification");
        $this->db->where('user_id', $user_id);
        $this->db->where('read_status', 0);
        $res = $this->db->get();
        return $res->result_array();
    }
    public function update_read_notification($data,$noti_id){
        $this->db->where('id', $noti_id);
    	$flag =$this->db->update('notification', $data);
        return $flag;
    }
}

?>