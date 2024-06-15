<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('vendor_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function vendor_manage()
	{
		$data['customerlist'] = $this->vendor_model->getall_customer();
		$this->template->template_render('vendor_management',$data);
	}
	public function addvendor()
	{
		$this->template->template_render('vendor_add');
	}
	public function insertvendor()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('vendors')->where('c_email',$this->input->post('c_email'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->vendor_model->add_customer($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New vendor added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Account already exist with same email.');
			}
			redirect('vendor/vendor_manage');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('vendor/vendor_manage');
		}
	}
	public function editvendor()
	{
		$c_id = $this->uri->segment(3);
		$data['customerdetails'] = $this->vendor_model->get_customerdetails($c_id);
		$this->template->template_render('vendor_add',$data);
	}

	public function updatevendor()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->vendor_model->update_customer($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'Vendor updated successfully..');
				    redirect('vendor/vendor_manage');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('vendor/vendor_manage');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('vendor/vendor_manage');
		}
	}
	public function deletevendor()
	{
		$c_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('vendors', array('c_id' => $c_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Vendor deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('vendor/vendor_manage');
	}
}
