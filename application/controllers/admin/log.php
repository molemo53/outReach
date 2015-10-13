<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LogController extends CI_Controller {
  public $userid;
	public function __construct()
	{
	
		parent::__construct();
		
		/* load models  */
		$this->load->model('logmodel');
	   /* end here */
		
		$this->loggedIn();
	}

	public function index()
	{
		if($this->session->flashdata('msg')){
			$categoryData['msg']=$this->session->flashdata('msg');
		}
		$this->load->library('my_pagination');
		$config['base_url'] = base_url().'log/index';
		$rows = $this->logmodel->listAll();
		$config['total_rows'] = $rows->num_rows();
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<div id = "datatable2_paginate" class="dataTables_paginate paging_bs_full "><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a><li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 6; 
		
		$limit=$config['per_page'];
		$offset=$this->uri->segment(3);
		$this->my_pagination->initialize($config); 
		
		$logdata['menu'] = "log";
		$records=$this->logmodel->listAll($limit,$offset);	
		$logdata['records']=$records->result_array();	
		$logdata['pagination'] = $this->my_pagination->create_links();
		$this->layout->view('admin/log/logView',$logdata); 
		
	}
	
	
	public function add()
	{
		$logdata=array();	
		$logdata['menu'] = "log";
		$this->layout->view('admin/log/add',$logdata); 
		
	}
	
	
	public function edit()
	{
		$logdata = array(
			'title' => 'My Freshly UPDATED Title',
			'content' => 'Content should go here; it is updated.'	
		);
		$logdata['menu'] = "log";
		$this->layout->view('admin/log/edit',$logdata);
	}
	
	
	
	/*
		@method  loggedIn   check if admin session exists or not
		@param  Null 
		@return object  redirect to index method if session not exits
	 */
	public function loggedIn()
	{
	   $logged = $this->session->userdata('adminDetails');
		if ( $logged === FALSE){
			
				redirect("home/index");
			}
	}

}

?>