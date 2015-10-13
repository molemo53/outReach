<?php
class Logmodel extends CI_Model {


    public $tablename='va_logs';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
    }
	
   	
   function listAll($limit="",$offset="")
	{
		if($limit != "" || $offset != ""){
			$this->db->limit($limit,$offset);
		}
	   $this->db->order_by("id", "desc"); 
	   $query = $this->db->get($this->tablename);
	   return $query;
	}
	
	 function latestrecords($limit)
	{
	    $this->db->order_by("id", "desc");
	    $this->db->limit($limit); 
	  	$query = $this->db->get($this->tablename);
		return $query->result_array();
	}
	
	
	
	
	function add_record($tbl_admin) 
	{
		$this->db->insert($this->tablename, $tbl_admin);
		return $this->db->insert_id(); 
	}
	
	function update_record($data) 
	{
		$this->db->where('uid', $data['uid']);
		$this->db->update($this->tablename, $data);
	}
	
}

?>