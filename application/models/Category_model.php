<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model{
	
	public function add_category($data) {
		$data['name'] = $data['name'];
		$data['status'] = $data['status'];
		$data['created_by'] = $data['created_by'];
		$data['created_date'] = $data['created_date'];
		return	$this->db->insert('categories',$data);
	} 
    public function getall_categories() { 
		return $this->db->select('*')->from('categories')->order_by('id','desc')->get()->result_array();
	} 
	public function get_categorydetails($id) { 
		return $this->db->select('*')->from('categories')->where('id',$id)->get()->result_array();
	} 
	public function edit_category() { 
	
		$data['name'] = $data['name'];
		$data['status'] = $data['status'];
		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('categories',$this->input->post());
	}
} 