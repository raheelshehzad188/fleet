<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('drivers_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }
     public function viewstaff()
	{
		$v_id = $this->uri->segment(3);
		$vehicledetails = $this->drivers_model->get_driverdetails($v_id);
		
		if($vehicledetails) {
			$data['vehicledetails'] = $vehicledetails[0];
			
			$this->template->template_render('staff_view',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}

	public function index()
	{
		$data['driverslist'] = $this->drivers_model->getall_drivers();
		$cats = $this->drivers_model->getall_staff_types();
		$n = array();
		foreach($cats as $k=>$v)
		{
		    $n[$v['st_id']] = $v['type_name'];
		}
		$data['staff_types'] = $n;
		$this->template->template_render('drivers_management',$data);
	}
	public function adddrivers()
	{
		$data['staff_category'] = $this->drivers_model->getall_staff_types();
		$this->template->template_render('drivers_add',$data);
	}
	public function insertdriver()
	{
		
		$this->form_validation->set_message('is_unique', '%s is already exist');
		$this->form_validation->set_rules('d_name','Name','required|trim');
		$this->form_validation->set_rules('st_cat_id','Staff Type','required|trim');
		$this->form_validation->set_rules('d_mobile','Mobile','required|trim');
        $this->form_validation->set_rules('d_address', 'Address', 'required|trim');
		if(isset($_POST['st_cat_id']) && $_POST['st_cat_id'] == 1)
		{
		$this->form_validation->set_rules('d_licenseno','License Number','required|trim|is_unique[vehicles.v_registration_no]');
		$this->form_validation->set_rules('d_licenseno','License Number','required|trim');
		$this->form_validation->set_rules('d_license_expdate','License Exp Date','required|trim');
		}
		$this->form_validation->set_rules('d_doj','Date of Joining','required|trim');
		$testxss = true;
		if($this->form_validation->run()==TRUE && $testxss){
			$response = $this->drivers_model->add_drivers($this->input->post());
		// 	echo $this->db->last_query();
		// die();
			if($response) {
				$route = $_POST['route'];
				if($route && $response)
			{
			
			
			    for($i = 0 ; $i <= count($route['name']) ;$i++)
			    {
			    		if(!empty($route['name'][$i]))
			    		{
					        $in = array(
					            'name' => $route['name'][$i],
					            'address' => $route['address'][$i],
					            'duration' => $route['duration'][$i],
					            'detail' => $route['detail'][$i],
					            'staff_id' => $response,
					            );
					        $r = $this->db->insert('staff_exp',$in);
					  }
			    }
			}
				$this->session->set_flashdata('successmessage', 'New driver added successfully..');
			    redirect('drivers');
			}
		} else {
			$errormsg = preg_replace( "/\r|\n/", "", trim(str_replace('.',',',strip_tags(validation_errors()))));
			if(!$testxss) {
				$errormsg = 'Error! Your input are not allowed.Please try again';
			}
			$this->session->set_flashdata('warningmessage',$errormsg);
			redirect('drivers/adddrivers');
		}
	}
	public function editdriver()
	{
		$d_id = $this->uri->segment(3);
		$data['driverdetails'] = $this->drivers_model->get_driverdetails($d_id);
		$data['staff_exp'] = $this->db->where('staff_id',$d_id)->get('staff_exp')->result_array();
		$data['staff_category'] = $this->drivers_model->getall_staff_types();
		$this->template->template_render('drivers_add',$data);
	}

	public function updatedriver()
	{
		$route = $_POST['route'];
		$testxss = $_POST;
		if($testxss){
			$response = $this->drivers_model->edit_driver($this->input->post());
				if($response) {
				
				if($route && $response)
			{
			
			
			    for($i = 0 ; $i <= count($route['name']) ;$i++)
			    {
			    		$id = (isset($route['id'][$i]))?$route['id'][$i]:0;
			    		if(!empty($route['name'][$i]))
			    		{
			    			if($id)
			    			{
			    				$this->db->where('id',$id)->delete('staff_exp');
			    			}
					        $in = array(
					            'name' => $route['name'][$i],
					            'address' => $route['address'][$i],
					            'duration' => $route['duration'][$i],
					            'detail' => $route['detail'][$i],
					            'staff_id' => $response,
					            );
					        if($id)
				    			{
				    				$in['id'] = $id;
				    			}
					        $r = $this->db->insert('staff_exp',$in);
					  }
			    }
			}
					$this->session->set_flashdata('successmessage', 'Driver updated successfully..');
				    redirect('drivers');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('drivers');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('drivers');
		}
	}
	public function deletedriver()
	{
		$d_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('drivers', array('d_id' => $d_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Driver deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('drivers');
	}
}
