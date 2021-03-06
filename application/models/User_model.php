<?php
class User_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct() {

        $this->load->database();
    }
    
    
    public function getTotalRow($table) {

    	return $this->db->get($table)->num_rows();
    }

  //   public function user_list($l, $s) {

  //   	$this->db->select('*');
		// $this->db->from('user');
		// $this->db->where('id >','0');
		// $this->db->order_by('firstname');
		// $this->db->LIMIT($l, $s);

		// $query = $this->db->get();
		// return $query->result();
  //   }
    // public function insertdata($data_to_insert) {

    // 	$flag = $this->db->insert('adminuser', $data_to_insert);
    // 	return $flag;
    // }
    public function user_list() {

    	$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('firstname');
		//$this->db->LIMIT($l, $s);

		$query = $this->db->get();
		return $query->result();
    }

    // public function alterroles($data_to_insert) {

    // 	$flag = $this->db->insert('products', $data_to_insert);
    // 	return $flag;
    // }
	// public function getall_product(){
	// 	$this->db->select('*');
	// 	$this->db->from('products');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
	// public function delete_product_by_id($id) {

    //     $this->db->where('id', $id);

    //     $flag = $this->db->delete('products');

    //     return $flag;
    // }
	// public function change_status_product($id, $data_to_store) {

    //     $this->db->where('id', $id);

    //     $flag =$this->db->update('products', $data_to_store);

    //     return $flag;
    // }

	// public function get_product_by_id($id){
        
    //     $this->db->select('*');
	// 	$this->db->from('products');
	// 	$this->db->where('id',$id);
	// 	$query = $this->db->get();
	// 	return $query->result();
        
    // }
    public function insert_money($data_income) {

    	$flag = $this->db->insert('user_income', $data_income);
    	return $flag;
    }
    
    public function get_user_by_id_income($id){
        
        $this->db->select('*');
		$this->db->from('user_income');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		return $query->result();
        
    }
    
    public function get_total_income($id){
        
        $this->db->select_sum('amount');
        $this->db->where('user_id',$id);
        $query = $this->db->get('user_income');
        $res = $query->row_array();
        //now SUM is available in $res['total']
        return $res['amount'];
        
    }

    public function user_by_id($id) {

    	$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->result();
    }

    public function update_user_by_id($id, $data_to_store) {

    	$this->db->where('id', $id);
    	$flag = $this->db->update('user', $data_to_store);
    	return $flag;
    }

    public function delete_user_by_id($id) {

    	$this->db->where('id', $id);
		$flag = $this->db->delete('web_user');

    	return $flag;
    }

    public function change_status_model($id, $data_to_store) {

    	$this->db->where('id', $id);
    	$flag =$this->db->update('adminuser', $data_to_store);

    	return $flag;
    }
    
    function team_lebel($lebel , $sponsorId){
		  for($i= 0; $i<$lebel; $i++ ){
       	$n=0;
        
		$this->db->select('*');
		$this->db->from('adminuser');
		$this->db->where_in('sponsorId',$sponsorId);
		$this->db->where_in('status','1');
		 
		$this->db->order_by('Date','asc');
		$result	=	$this->db->get()->result();
		 
		 $sponsorId=array();
		foreach($result as $user) {
   		  $sponsorId[$n] = $user->applicantId;
  		  $n++;
		}
 		if(count($sponsorId)<1){
			return array();
		}
	//	print
		if($i==($lebel-1)){
 			 // echo 'Query'. $i .' : '. $this->db->last_query()."<br/>";exit();
       	 	 return $result;
		}
			
		} 
	
	}

//====================================================Admin Model=====================================================
  	public function insertdata($data_to_insert) {

    	$flag = $this->db->insert('adminuser', $data_to_insert);
    	return $this->db->insert_id();
    	//return $flag;
    }
    public function check_admin($uname, $pass) {

    	$this->db->select('*');
    	$this->db->from('user');
    	$this->db->where('user_id', $uname);
    	$this->db->where('password', $pass);
		$query = $this->db->get();
		return $query->result();
    
    }
	
	public function get_member_label($sponsorId){
		 for($i= 0; $i<10; $i++ ){
       	$n=0;
        
		$this->db->select('*');
		$this->db->from('adminuser');
		$this->db->where_in('sponsorId',$sponsorId);
		$this->db->where_in('status','1');
		 
		$this->db->order_by('Date','asc');
		$result	=	$this->db->get()->result();
		 
		 $sponsorId=array();
		foreach($result as $user) {
   		  $sponsorId[$n] = $user->applicantId;
  		  $n++;
		}
 		if(count($sponsorId)<1){
			//return 0;
			$label=0;
		}
		
		if($i==0){
			if(count($result)==4){
				$label=1;
			}else{
				return 0;
			}
		}else if($i==1){
			if(count($result)==16){
				$label=2;
			}else{
				return 1;
			}
		}else if($i==2){
			if(count($result)==64){
				$label=3;
			}else{
				return 2;
			}
		}else if($i==3){
			if(count($result)==256){
				$label=4;
			}else{
				return 3;
			}
		}else if($i==4){
			if(count($result)==1024){
				$label=5;
			}else{
				return 4;
			}
		}else if($i==5){
			if(count($result)==4096){
				$label=6;
			}else{
				return 5;
			}
		}else if($i==6){
			if(count($result)==16384){
				$label=7;
			}else{
				return 6;
			}
		}else if($i==7){
			if(count($result)==65534){
				$label=8;
			}else{
				return 7;
			}
		}else if($i==8){
			if(count($result)==262144){
				$label=9;
			}else{
				return 8;
			}
		}else if($i==9){
			if(count($result)==1048576){
				$label=10;
			}else{
				return 9;
			}
		}
					
		}
		return $label; 
	}
   
    public function get_admin_by_id($id) {

    	$this->db->select('*');
    	$this->db->from('user');
    	$this->db->where('id', $id);

    	$query = $this->db->get();

    	return $query->result();
    }
    
    function under_member(){
		$this->db->select('*');
    	$this->db->from('adminuser');
    	 if($_SESSION['applicantId']!='Admin'){
		 
    		$this->db->where('sponsorId', $this->session->userdata('applicantId'));
    	}
		$this->db->order_by('Date','asc');
    	$query = $this->db->get();

    	return $query->result();
	}
	
	function update_customer($id, $set_status){
		
		$this->db->select('sponsorId');
		$this->db->from('adminuser');
		$this->db->where('applicantId', $id);
		$q	=	$this->db->get();
		$r	=	$q->result();
	 
		$this->db->select('sponsorId');
		$this->db->from('adminuser');
		$this->db->where('sponsorId',$r[0]->sponsorId);
		$this->db->where('status','1');
		$q1	=	$this->db->get();
		$r1	=	$q1->result();	
		//  echo (count($r1));exit();
 		if(count($r1)<4){
 			$this->db->where('applicantId',$id);
	    	$this->db->update('adminuser',array('status'=>$set_status));
	    //	echo $this->db->last_query();
		}
 		// exit();
	 return true;
	}
	
	function upper_customer( $data_array ,$sponsorId, $i){
			if($i==10){
				return  ($data_array);
			}
		$this->db->select('*');
    	$this->db->from('adminuser');
    	$this->db->where('applicantId', $sponsorId);
		$this->db->order_by('Date','asc');
    	$r = $this->db->get()->row();
     
  		 	$data_array[$i]	=  $r;
  		 	if($sponsorId!=""){
  			 	return $this->upper_customer($data_array, $r->sponsorId,$i=$i+1);
			}
	}
//====================================================================================================================


    function show_about_us($page, $search_string=null, $order_type='Desc',$limit_start=null, $limit_end=null)
    {  
	$this->db->select('*');
	$this->db->from('about_us');
	
	$this->db->where('section',$page);
	//$this->db->where('admin_type', 'S');
        //echo $order_type;
        //echo $limit_start."<br>";
        //echo $limit_end;
        //die;
	
	if($limit_start && $limit_end)
	{
	    $this->db->limit($limit_start, $limit_end);	
	}

	if($limit_start != null)
	{
	    $this->db->limit($limit_start, $limit_end);    
	}
	/*if($search_string)
	{
	    $q="(`first_name` LIKE '%$search_string%' OR `last_name` )";
	    $this->db->where($q);
	}*/
	
	$this->db->order_by('ordering');
	
	$query = $this->db->get();
	//$qr=$query->result();
	//print_r($qr);
	//die;
	return $query->result();
    }
    
    function count_about_us($page, $search_string=null, $order='Desc')
    {
	$this->db->select('*');
        $this->db->from('about_us');
	
	$this->db->where('section',$page);
	
	if($search_string)
	{
	    //$q="(`first_name` LIKE '%$search_string%' OR `last_name` LIKE '%$search_string%' )";
	    //$this->db->where($q);
	    
	    $this->db->like('description',$search_string);
	}
	
	
        
        $query = $this->db->get();
	$query->num_rows();
	
        return $query->num_rows();        
    }
       
    function insert_about_us($add)
    {
       // echo '<pre>';
        //print_r($add);
        $this->db->insert('about_us',$add);
                return true;
    }
    
    function update_about_us($id, $data, $type)
    {
		if($type=='TOP'){
		    $section='TOP';
		    $no = $this->total_rows_top();
		}
		else {
		    $section='BOTTOM';
		    $no = $this->total_rows_bottom();
		}
	    
		$pos = $data['ordering'];
		
		$this->db->select('ordering');
		$this->db->from('about_us');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$res=$query->result();
		$pos1=$res[0]->ordering;
		
		if($pos != $pos1) {
		    
		    $updt=array(
			
			'ordering' => $pos1
		    );
		    
		    $this->db->where('ordering', $pos);
		    $this->db->where('section', $section);
		    $this->db->update('about_us', $updt);
		}
		
		$this->db->where('id', $id);
		$this->db->update('about_us', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		
		if($report !== 0){
			return true;
		}else{
			return false;
		}
    }
	
    function store_page($data, $type)
    {
	    if($type=='TOP'){
		$section='TOP';
		$no = $this->total_rows_top();
	    }
	    else {
		$section='BOTTOM';
		$no = $this->total_rows_bottom();
	    }
	    
	    $pos = $data['ordering'];
	    
	    if($pos <= $no){
		
		$this->db->where('ordering >= ', $pos);
		$this->db->where('section',$section);
		$this->db->set('ordering', 'ordering + 1', FALSE);
		$this->db->update('about_us');
	    }
	
	    $insert = $this->db->insert('about_us', $data);
	    return $insert;
    }
    
    public function input($path) 
    {
	$this->load->database();
	    
	$desc=$this->input->post('description');
	$st=$this->input->post('status');
       
	$e=$this->input->post('sub');
	
	$r=$this->db->query("insert into about_us values('','','$desc','$path','$st')");
	
	return $r;
    }
    function del_about_us($id)
    {
        $this->db->select('ordering,section');
	$this->db->from('about_us');
	$this->db->where('id',$id);
	$query = $this->db->get();
	$res=$query->result();
	
	//print_r($res); die;
	if($res[0]->section=='TOP'){
	    $section='TOP';
	    $no = $this->total_rows_top();
	}
	else {
	    $section='BOTTOM';
	    $no = $this->total_rows_bottom();
	}
	
	$pos = $res[0]->ordering;
	
	$this->db->where('id', $id);
        $this->db->delete('about_us');
	
	if($pos <= $no){
	    
	    $this->db->where('ordering >= ', $pos);
	    $this->db->where('section',$section);
	    $this->db->set('ordering', 'ordering - 1', FALSE);
	    $this->db->update('about_us');
	}

	return true;
    }
    
    function edit_about_us($id)
    {
	
	$this->db->select('*');
	$this->db->from('about_us');
	$this->db->where('id',$id);
	$query = $this->db->get();
	return $query->result();
	
    }
    
    function edit_about_us1()
    {
        //$query=$this->db->query("select * from faq_type");
	
	$this->db->select('*');
	$this->db->from('faq_type');
	//$this->db->where('e_temp_id',$id);
	$query = $this->db->get();
	return $query->result();
    }
    
    function updt_about_us($updt)
    {
        //echo "hello";
       // die;
	$this->db->select('*');
        $this->db->from('about_us');
        $this->db->where('id', $updt['id']);
        $this->db->update('about_us',$updt);
		return true;
	
    }
    
    function changepass($uid,$password)
    {
        $this->db->where('id', $uid);
    	$flag = $this->db->update('adminuser', $password);
    	return $flag;
    }
    
    function search($cpage, $limit_start=null, $limit_end=null,$data)
    {
        // fetch all data from database with or without pagination
       
        $this->db->select('*');
	$this->db->from('about_us');
	
	$this->db->where('section',$cpage);
	//echo $data." / ".$cpage." / ".$limit_start." / ".$limit_end; die;
	
        if($limit_start && $limit_end)
	{
            $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null)
	{
            $this->db->limit($limit_start, $limit_end);    
        }
	if(isset($data))
	{   
	    $this->db->like('description',$data); 

	}
        
        /*if(isset($data))
	{	    
	    $this->db->like('content',$data);
	    //$this->db->or_like('last_name', $data);
	    //$this->db->where('admin_type','S');
	}*/
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function count_search($cpage, $data)
    {
        // count total category
        
        $this->db->select('*');
	$this->db->from('about_us');

	$this->db->where('section',$cpage);
	
	if(isset($data))
	{
	    $this->db->like('description',$data);
	    
	}
        /*if(isset($data))
	{
	    $this->db->like('content',$data);
	    //$this->db->or_like('last_name', $data);
	    //$this->db->where('admin_type','S');
	}*/
        
        $query = $this->db->get();
        return $query->num_rows();        
    }
    
    function update_status($id,$data_to_store){
	
	$this->db->where('id', $id);
        $this->db->update('about_us',$data_to_store);
    }
    
    function total_rows_top(){
	
	$this->db->select('*');
	$this->db->from('about_us');
	$this->db->where('section','TOP');
	
	$query = $this->db->get();
        return $query->num_rows(); 
    }
    
    function total_rows_bottom(){
	
	$this->db->select('*');
	$this->db->from('about_us');
	$this->db->where('section','BOTTOM');
	
	$query = $this->db->get();
        return $query->num_rows(); 
    }

    public function total_users() {

    	$this->db->select('*');
		$this->db->from('user');
		//$this->db->LIMIT($l, $s);

		$query = $this->db->get();
		return $query->num_rows();
    }
    public function total_groups() {

    	$this->db->select('*');
		$this->db->from('group');
		//$this->db->LIMIT($l, $s);

		$query = $this->db->get();
		return $query->num_rows();
    }
    public function total_quote() {

    	$this->db->select('*');
		$this->db->from('quote');
		//$this->db->LIMIT($l, $s);

		$query = $this->db->get();
		return $query->num_rows();
    }
    public function total_payment() {

    	$this->db->select('*');
		$this->db->from('payment');
		//$this->db->LIMIT($l, $s);

		$query = $this->db->get();
		return $query->num_rows();
    }
    public function check_Password($a_id,$oldpassword)	{
    	$this->db->select('*');
    	$this->db->from('admin_users');
    	$this->db->where('id',$a_id);
    	$this->db->where('password',$oldpassword);
    	$query = $this->db->get();
    	return $query->num_rows();
    }
    public function update_password($data,$uid)	{

    	$result = $this->db->update('admin_users',$data);
    			  $this->db->where('id',$uid);
    			  return $result;
    }
    
    public function get_spnid_data($id)
		{
		  $output='';
		  $this->db->where('applicantId',$id);
		  $this->db->where('status','1');
		  // $this->db->order_by('Name_of_unit', 'ASC');
		  //$this->db->group_by('applicantId');
		  $query = $this->db->get('adminuser');
		  
		  //$output = '<option value="">Please Select Zone</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->username.'">'.$row->username.'</option>';
		  }
		  return $output;
		}
		
	public function check_sponsorId($sponsorId) {

        $this->db->select('*');
        $this->db->from('adminuser');
        $this->db->where('applicantId', $sponsorId);
        $this->db->where('status', '1');
        $res = $this->db->get();

        return $res->num_rows();
    }
    function get_child_parent($sponsorId){
    	
    	//echo $sponsorId;exit();
    	$id=array($sponsorId=>null);
		 for($i= 0; $i<10; $i++ ){
       	$n=0;
        
		$this->db->select('*');
		$this->db->from('adminuser');
		$this->db->where_in('sponsorId',$sponsorId);
		$this->db->where_in('status','1');
		 
		$this->db->order_by('Date','asc');
		$result	=	$this->db->get()->result();
		 
		 $sponsorId=array();
		 if(count($result)>0){
		 	foreach($result as $user) {
	   		  $sponsorId[$n] = $user->applicantId;
	   		   $id[$user->applicantId] = $user->sponsorId;

	  		  $n++;
			}
		 }else{
		 	return $id;
		 }
 		}
		return $id;
	}


	function get_user_details($ap_id){
		 $this->db->select('*');
        $this->db->from('adminuser');
        $this->db->where('applicantId', $ap_id);
      //  $this->db->where('status', '1');
        $res = $this->db->get()->result();
        return $res;
	}
}
