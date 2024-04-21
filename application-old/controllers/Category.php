<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('category_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['rolelists'] = $this->category_model->getall_categories();
		$this->template->template_render('category_management',$data);
	}
	public function addcategory()
	{
		$this->template->template_render('category_add');
	}
	public function insertcat()
	{
		
		$this->form_validation->set_rules('name','Name','required|trim');
		
		$testxss = true;
		if($this->form_validation->run()==TRUE && $testxss){
			$response = $this->category_model->add_category($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New Category added successfully..');
			    redirect('category');
			}
		} else {
			$errormsg = preg_replace( "/\r|\n/", "", trim(str_replace('.',',',strip_tags(validation_errors()))));
			if(!$testxss) {
				$errormsg = 'Error! Your input are not allowed.Please try again';
			}
			$this->session->set_flashdata('warningmessage',$errormsg);
			redirect('category/addcategory');
		}
	}
	public function editcategory()
	{
		$id = $this->uri->segment(3);
		$data['catdetails'] = $this->category_model->get_categorydetails($id);
		$this->template->template_render('category_add',$data);
	}

	public function updatecategory()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->category_model->edit_category($this->input->post());
			
				if($response) {
					$this->session->set_flashdata('successmessage', 'Category updated successfully..');
				    redirect('category');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('category');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('category');
		}
	}
	public function deletedriver()
	{
		$id = $this->input->post('id');
		$deleteresp = $this->db->delete('category', array('id' => $id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Driver deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('category');
	}
}
