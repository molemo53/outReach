<?php 

	/**
	 * workshop_material Controller
	 **/

class Workshop_material extends CI_Controller
{ 
	public function __construct() {
error_reporting(0);
		parent::__construct();
							$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
							$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
							$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
							$this->output->set_header('Pragma: no-cache');
		$this->loggedIn();
		$this->load->library(array('form_validation','session','Layout'));
		$this->load->helper(array('url','html','form'));  // load url,html,form helpers optional
		$this->load->model(array('workshop_material_m'));
	}	
	/**
     * workshop_material index  Listing outreach workshop material
     * @param string $workshop_materialData
     * @param string $id
     * @param string $limit
     * @param string $offset
     * @return object workshop material Listing View
     */	
	
			
	public function index($id="",$limit,$offset,$workshop_materialData) { 
	
		$workshop_materialData['menu'] = "documents";
        $this->load->library('my_pagination');
        $config['base_url'] = base_url().'admin/workshop_material/index';
        $config['total_rows'] = $this->workshop_material_m->workshop_material_Count();
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
        $offset=$this->uri->segment(4);
        $this->my_pagination->initialize($config); 
		
		if($this->input->post("reset")){
			$this->session->unset_userdata('workshop_material_filter_data');
			} else {
				if($this->input->post()) {
					$post_data = $this->input->post();
					$workshop_material_filter_data=array(
					'document_name' => $post_data['document_name'],
					'date_range' => $post_data['date_range'],
					);
			$this->session->set_userdata('workshop_material_filter_data', $workshop_material_filter_data);
			}
		}
        
        $workshop_materialData['workshop_material_details']=$this->workshop_material_m->getworkshop_material($id="",$limit,$offset);
        $workshop_materialData['pagination'] = $this->my_pagination->create_links();
		$this->layout->view('admin/workshop_material/view',$workshop_materialData);
	}
	
	/**
     * add   Create workshop material Page
     * @param string $postdata
     * @param string $workshop_materialData
     * @return object workshop material Listing View
     */		
	
	public function add($postdata="",$workshop_materialData="") {
		$workshop_materialData['menu'] = "documents";
		$this->form_validation->set_rules('document_name', 'Name', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE )
		{
			$this->layout->view('admin/workshop_material/add',$workshop_materialData);
		}
		else if ($this -> input ->post())
		{
			if(isset($_FILES['document_path']['name']) && ($_FILES['document_path']['name']!="")){
					$userfile_extn = explode(".",$_FILES['document_path']['name']);
				$filename=time()."-".rand(00,99).".".end($userfile_extn);
					$config['upload_path']		= 'uploads/workshop_material/';
					$config['allowed_types']	= 'doc|docx|txt|exe|pdf';
					$config['file_name'] = $filename;
				  $_FILES['file_var_name']['name']=$filename;
					$this->load->library('upload', $config);
					$uploadres=$this->upload->do_upload('document_path');
					if($uploadres){
			$postdata=array(
					'document_name'=>$this->input->post('document_name'),
					'document_path'=>$filename,
					'status'=>1
		           );
				$upd_status=$this->workshop_material_m->workshop_material_add($postdata);
				if($upd_status >0) {
				$this->session->set_flashdata('msg', 'Workshop Material Created Successfully');
				redirect('admin/workshop_material/index');  
				}else {
					$this->session->set_flashdata('msg', 'Workshop Material Failed to Create');
					redirect('admin/workshop_material/index');
					}
					}
					else{
		$this->session->set_flashdata('msg', 'Please upload Valid Format');
		$this->layout->view('admin/workshop_material/add',$workshop_materialData);
		}
					}
					else{
		$this->session->set_flashdata('msg', 'Please upload document');
		$this->layout->view('admin/workshop_material/add',$workshop_materialData);
		}

			}
		}
			/**
     *  edit   Updating workshop material Page
     * @param string $workshop_materialData
     * @param string $id,$postdata
     * @return object  if success redirect to workshop material Listing View with Success Message else Update workshop material View 
     */	
	
			
		public function edit($workshop_materialData="",$id,$postdata) {
	$id=base64_decode($this->uri->segment(4));
	$workshop_materialData['menu'] = "documents";
		$workshop_materialData['certification']=$this->workshop_material_m->getworkshop_material($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('document_name', 'Name', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE )
		{
			$this->layout->view('workshop_material/edit',$workshop_materialData);
		}
		else if ($this -> input ->post())
		{
			$session_data = $this->session->userdata('adminDetails');
			if(isset($_FILES['document_path']['name']) && ($_FILES['document_path']['name']!="")){
					$userfile_extn = explode(".",$_FILES['document_path']['name']);
				$filename=time()."-".rand(00,99).".".end($userfile_extn);
					$config['upload_path']		= 'uploads/workshop_material/';
					$config['allowed_types']	= 'doc|docx|txt|exe|pdf';
					$config['file_name'] = $filename;
				  $_FILES['file_var_name']['name']=$filename;
					$this->load->library('upload', $config);
					$uploadres=$this->upload->do_upload('document_path');
	                if($uploadres){
					$data['document_path']=$filename;
					}
					else{
					$this->session->set_flashdata('msg', 'Please upload Valid Format');
		    $this->layout->view('admin/workshop_material/edit',$workshop_materialData);
					}
			}
					else{
					$data['document_path']=$workshop_materialData['certification'][0]['document_path'];
					}
			$postdata=array(
					'document_name'=>$this->input->post('document_name'),
					'document_path'=>$data['document_path']
		           );
				$upd_status=$this->workshop_material_m->edit($id,$postdata);
				if($upd_status >0) {
				$this->session->set_flashdata('msg', 'Workshop Material Updated Successfully');
				redirect('admin/workshop_material/index');  
				}else {
					$this->session->set_flashdata('msg', 'Workshop Material Failed to Update');
					redirect('admin/workshop_material/index');
					}

			}
}

/**
     *  detailview    If Admin session exist redirecting to workshop material detail view page else Login Page
     * @param string $workshop_materialData
     * @param string $id
     * @return  object detail view workshop material Listing   else Login View 
     */	

public function detailview() {
	error_reporting(0);
	$id=base64_decode($this->uri->segment(4));
	$workshop_materialData['menu'] = "documents";
		$workshop_materialData['workshop_material']=$this->workshop_material_m->getworkshop_material($id);
			$this->layout->view('admin/workshop_material/detailview',$workshop_materialData);
			}
			
				/**
     * Delete   deleting workshop material (changing status)
     * @param string $id
     * @return object  if success redirect to workshop material listing
     */	
		
public function Delete() {
	$id=base64_decode($this->uri->segment(4));
	$workshop_materialData['menu'] = "documents";
		$result=$this->workshop_material_m->delete($id);
		if($result >0) {
				/* Add Logs */
				/* End Logs */
				$this->session->set_flashdata('msg', 'Workshop Material Deleted Successfully');
				redirect('admin/workshop_material/index');  
				}else {
					$this->session->set_flashdata('msg', 'Workshop Material deleted Fails');
					redirect('admin/workshop_material/index');
					}
			}
	public function loggedIn()
	{
	   $logged = $this->session->userdata('adminDetails');
		if ( $logged === FALSE){
			
				redirect("admin/home/index");
			}
	}
	
}

/* End of file workshop_materialController.php */
/* Location: ./application/controllers/admin/workshop_materialController.php */



