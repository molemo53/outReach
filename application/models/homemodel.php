<?php
class Homemodel extends CI_Model {
/*
  * guidance_metirial_m model
  * method 
  * 
  *
  * 
  */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function getAdmin($id = "",$limit= "",$offset= "") 	{
		if($id != "") {
			$this->db->where('vau.admin_id',$id);
		}
		if($limit != "" || $offset != ""){
			$this->db->limit($limit,$offset);
		}
		if ($this->session->userdata('staff_filter_data') !== FALSE) {
			   $filters=$this->session->userdata('staff_filter_data');
			   if($filters['date_range'] != "") {
					$daterange=explode("_",$filters['date_range']); 
					$from_date=date("Y-m-d H:i:s", strtotime($daterange[0]));
					
					$to_date=date("Y-m-d H:i:s", strtotime("23:59:59",strtotime($daterange[1]))); 
					
					$this->db->where('vau.created_on >=', $from_date);
					$this->db->where('vau.created_on <=', $to_date);  
			   		}
					if($filters['staff_name'] != "") {
						$this->db->like('vad.first_name', $filters['staff_name'],'both');
					}
		}
		$query = $this->db->select('vau.*')
						  ->from('va_admin_users vau')
						  ->where(array('status != '=>3))
						  ->get();
						  
						  
					
						  
		if ($query->num_rows() > 0)
		{
		  $row = $query->result_array(); 
		}else{
		  $row=0;
		}
		return $row;
	}
	 /**
  * login method: check user availability
  * @param   string $email
  * @param   string $password
  * @return arry value
  */
    function login($email,$password) 	{
		$query = $this->db->get_where("va_admin_users",array("admin_name"=>$email,"password"=>md5($password),"status"=>'1'));
		if ($query->num_rows() > 0)
		{
			$query = $this->db->select('vau.permission_id,vau.admin_id,vau.first_name,vau.last_name,vau.image,')
			->from('va_admin_users vau')
			->where(array("vau.admin_name"=>$email,"status"=>'1'))
			->get();
		   $row = $query->row_array(); 
		}else{
		  $row=0;
		}
		
		return $row;
	}
	 /**
  * getcoordinator method: fatch the get  outreach coordinator  data 
  * @param   integer $id
  * @param   integer $limit
  * @param   integer $offset
  * @return arry value
  */
public function getcoordinator($id = "",$limit= "",$offset= "") {
		if($id != "") {
			$this->db->where('vau.id',$id);
		}
		if($limit != "" || $offset != ""){
			$this->db->limit($limit,$offset);
		}
		if ($this->session->userdata('staff_filter_data') !== FALSE) {
			   $filters=$this->session->userdata('staff_filter_data');
			   if($filters['date_range'] != "") {
					$daterange=explode("_",$filters['date_range']); 
					$from_date=date("Y-m-d H:i:s", strtotime($daterange[0]));
					
					$to_date=date("Y-m-d H:i:s", strtotime("23:59:59",strtotime($daterange[1]))); 
					
					$this->db->where('vau.created_on >=', $from_date);
					$this->db->where('vau.created_on <=', $to_date);  
			   		}
					if($filters['staff_name'] != "") {
						$this->db->like('vad.first_name', $filters['staff_name'],'both');
					}
		}
		$query = $this->db->select('vau.*,vad.*')
						  ->from('va_users vau')
						  ->join('va_user_details vad','vau.id = vad.user_id')
						  ->where(array('status != '=>3))
						  ->where(array('user_type'=>1))
						  ->get();
						  
						  
		if ($query->num_rows() > 0)
		{
		  $row = $query->result_array(); 
		}else{
		  $row=0;
		}
		return $row;
	}
	/**
  * changePassword method: change password 
  * @param   string $postdata
  * @return object value
  */
	public function changePassword($postdata)
	{
		$query = $this->db->where('admin_id',$postdata['admin_id']);
				 $this->db->update('va_admin_users',array('password'=>md5($postdata['new_password'])));
		return $this->db->affected_rows();
	}
	/**
  * editProfile method: update the profile information 
  * @param   string $postdata
  * @return object value
  */
	public function editProfile($postdata)
	{
		$data = array('first_name'=>$postdata['first_name'],
					 'last_name'=>$postdata['last_name'],
					 'admin_name'=>$postdata['email']
					 );
		if(isset($postdata['image']))
		{
			$data['image'] = $postdata['image'];
		}
		$query = $this->db->where('admin_id',$postdata['admin_id']);
				 $this->db->update('va_admin_users',$data);
		$update_id =  $this->db->affected_rows();
		if($update_id > 0)
		{
			if(!empty($postdata)) {
				if(isset($postdata['image']))
				{
					$this->session->userdata['adminDetails']['image'] = $postdata['image'];
					$this->session->sess_write();
				}
				if(isset($postdata['first_name']))
				{
					$this->session->userdata['adminDetails']['first_name'] = $postdata['first_name'];
					$this->session->sess_write();
				}
				if(isset($postdata['last_name']))
				{
					$this->session->userdata['adminDetails']['last_name'] = $postdata['last_name'];
					$this->session->sess_write();
				}
				return $update_id;
			}
			else{
				return $update_id;
			}
		}
	}
	/**
  * editProfile method: update the coordinator information 
  * @param   string $postdata
  * @return object value
  */
public function editCoordinator($postdata)
	{
		$data = array('name'=>$postdata['first_name'],
					 'email'=>$postdata['email']
					 );
		if(isset($postdata['image']))
		{
			$data['image'] = $postdata['image'];
		}
		$query = $this->db->where('id',$postdata['hidden_staff_id']);
				 $this->db->update('va_users',$data);
		$update_id =  $this->db->affected_rows();
		if($update_id > 0)
		{
			
				return $update_id;
			}
		
	}
	/**
  * addCoordinator method: insert the coordinator information  to the table 
  * @param   string $postdata
  * @return object value
  */
	public function addCoordinator($postdata)
	{
		if(!empty($postdata['permission_id'])) {
			$permission_id=$postdata['permission_id'];
		} else  {
			$permission_id=0;
			}
	$this->db->where('email', $postdata['email']);
		$query = $this->db->get('va_users'); 
		if($query->num_rows == 0){
		$data = array(
					'email'=>$postdata['email'],
					'name'=>$postdata['last_name'],
										'user_type'=>1,
					'password'=>md5($postdata['password']),
					'status'=>1,
					'created_on'=>date('Y-m-d H:i:s'));
		$this->db->insert('va_users',$data);		
		$insert_id = $this->db->insert_id();
		if($insert_id)
		{
			$data1 = array(
						'user_id'=>$insert_id,
						'last_name'=>$postdata['last_name']
						);
			$this->db->insert('va_user_details',$data1);
		}
		return $insert_id;
		}else{
				return 0;
			
			}
	}
	/**
  * deleteCoordinator method: delete the coordinator 
  * @param   string $coodid
  * @return object value
  */
	public function deleteCoordinator($coodid,$admin_id)
	{
		$data = array('status'=>3);
		$this->db->where('id',$coodid);
		$this->db->update('va_users',$data);
		return $this->db->affected_rows();
	}

		
}

?>