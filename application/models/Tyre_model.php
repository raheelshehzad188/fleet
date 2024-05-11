<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tyre_model extends CI_Model{
	
	public function getTyreCompany()
	{
		return $this->db->select('*')->from('tyre_companies')->get()->result_array();
	}
		public function getTyreCompanybyId($id = null)
	{
		return $this->db->select('*')->from('tyre_companies')->where('id',$id)->get()->result_array();
	}
	public function getall_tyres()
	{
		return $this->db->select('*')->from('tyre_types')->get()->result_array();
	}
	public function gettyrebyId($id = null)
	{
		return $this->db->select('*')->from('tyre_types')->where('id',$id)->get()->result_array();
	}

} 