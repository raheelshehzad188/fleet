<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drivers_model extends CI_Model{
	
	public function add_drivers($data) { 
		if(!empty($_FILES)) {
			$config['upload_path'] = 'assets/uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; 
			$this->load->library('upload', $config); 
			if(!empty($_FILES['file']['name'][0])){ 
				$uploadData = '';
				$this->upload->initialize($config); 
				$_FILES['file']['name']     = $_FILES['file']['name']; 
				$_FILES['file']['type']     = $_FILES['file']['type']; 
				$_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['file1']['error']; 
				$_FILES['file']['size']     = $_FILES['file']['size']; 
				if($this->upload->do_upload('file')){ 
					$uploadData = $this->upload->data();
					$data['d_file'] = $uploadData['file_name'];
				}
			} 
			if(!empty($_FILES['file1']['name'][1])){ 
				$uploadData = '';
				$this->upload->initialize($config); 
				$_FILES['file']['name']     = $_FILES['file1']['name']; 
				$_FILES['file']['type']     = $_FILES['file1']['type']; 
				$_FILES['file']['tmp_name'] = $_FILES['file1']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['file1']['error']; 
				$_FILES['file']['size']     = $_FILES['file1']['size']; 
				if($this->upload->do_upload('file1')){ 
					$uploadData = $this->upload->data();
					$data['d_file1'] = $uploadData['file_name'];
				}
			} 
		}
		$data['d_license_expdate'] = reformatDate($data['d_license_expdate']);
		unset($data['route']);
		$data['d_doj'] = reformatDate($data['d_doj']);
		$query = $this->db->insert('drivers',$data);
		return	$this->db->insert_id();
	} 
    public function getall_drivers() { 
		return $this->db->select('*')->from('drivers')->order_by('d_id','desc')->get()->result_array();
	} 
	public function getall_staff_types() { 
		return $this->db->select('*')->from('type_staff')->get()->result_array();
	} 
	public function get_driverdetails($d_id) { 
		return $this->db->select('*')->from('drivers')->where('d_id',$d_id)->get()->result_array();
	} 
	public function ofc_exp() { 
		return $this->db->select('*')->from('ofc_exp')->get()->result_array();
	} 
	public function ofc_exp_code() { 
		$x = $this->db->select('*')->from('ofc_exp')->order_by('id','desc')->get()->row_array();
		echo "string";
		return $x['ledgerCode'];
	} 
	public function edit_driver() { 
		if(!empty($_FILES)) {
			$config['upload_path'] = 'assets/uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; 
			$this->load->library('upload', $config); 
			if(!empty($_FILES['file']['name'][0])){ 
				$uploadData = '';
				$this->upload->initialize($config); 
				$_FILES['file']['name']     = $_FILES['file']['name']; 
				$_FILES['file']['type']     = $_FILES['file']['type']; 
				$_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['file1']['error']; 
				$_FILES['file']['size']     = $_FILES['file']['size']; 
				if($this->upload->do_upload('file')){ 
					$uploadData = $this->upload->data();
					$_POST['d_file'] = $uploadData['file_name'];
				}
			} 
			if(!empty($_FILES['file1']['name'][1])){ 
				$uploadData = '';
				$this->upload->initialize($config); 
				$_FILES['file']['name']     = $_FILES['file1']['name']; 
				$_FILES['file']['type']     = $_FILES['file1']['type']; 
				$_FILES['file']['tmp_name'] = $_FILES['file1']['tmp_name']; 
				$_FILES['file']['error']     = $_FILES['file1']['error']; 
				$_FILES['file']['size']     = $_FILES['file1']['size']; 
				if($this->upload->do_upload('file1')){ 
					$uploadData = $this->upload->data();
					$_POST['d_file1'] = $uploadData['file_name'];
				}
			} 
		}
		$_POST['d_license_expdate'] = reformatDate($_POST['d_license_expdate']);
		unset($_POST['route']);
		$_POST['d_doj'] = reformatDate($_POST['d_doj']);
		$this->db->where('d_id',$this->input->post('d_id'));
		return ($this->db->update('drivers',$_POST)?$this->input->post('d_id'):0);
	}
	public function add_salary($value='')
	{
		$insertdata = array(
			"cust_id" => $value['cust_id'],
			"salary" => $value['salary'],
		);

		$this->db->insert('salary',$insertdata);
		return $this->db->insert_id();
		
	}

} 