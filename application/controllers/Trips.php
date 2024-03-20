<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trips extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('trips_model');
          $this->load->model('customer_model');	
          $this->load->model('drivers_model');	
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['triplist'] = $this->trips_model->getall_trips();
		$this->template->template_render('trips_management',$data);
	}

	public function delexp($id)
	{
		$response = $this->db->where('id',$id)->delete('exp_types');
		if($response) {
			$this->session->set_flashdata('successmessage', 'Expense deleted successfully..');
		    redirect('trips/exp_type');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('trips/exp_type');
		}
	}

	public function addexp()
	{
		$response = $this->db->insert('exp_types',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Expense added successfully..');
		    redirect('trips/exp_type');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('trips/exp_type');
		}
	}
	public function exp_type()
	{
		$data['vehiclegroup'] = $this->db->get('exp_types')->result_array();
		$this->template->template_render('exp_type',$data);
	}
	public function addtrips()
	{
		$data['customerlist'] = $this->trips_model->getall_customer();
		$data['exp_types'] = $this->db->where('is_default','1')->get('exp_types')->result_array();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$this->template->template_render('trips_add',$data);
	}
	public function inserttrips() 
	{
		$testxss = xssclean($_POST);
		if($testxss){
		    $route = $_POST['route'];
		    $expense = $_POST['expense'];
			$response = $this->trips_model->add_trips($this->input->post());
			if($route && $response)
			{
			
			
			    for($i = 0 ; $i <= count($route) ;$i++)
			    {
			        $in = array(
			            'route_from' => $route['route_from'][$i],
			            'route_to' => $route['route_to'][$i],
			            'distance' => $route['distance'][$i],
			            'weight' => $route['weight'][$i],
			            'unit_price' => $route['unit_price'][$i],
			            'total' => $route['wages'][$i],
			            'trip_id' => $response,
			            );
			        $r = $this->db->insert('trip_routes',$in);
			    }
			}
			if($expense && $response)
			{
			    for($i = 0 ; $i <= count($expense) ;$i++)
			    {
			        if(isset($expense['expense_id'][$i]) && !$expense['expense_id'][$i])
			        {
			            $expense['expense_id'][$i] = $this->db->insert('exp_types',array('name'=>$expense['exp_name'][$i]))->insert_id();
			        }
			        $in = array(
			            'expense_id' => $expense['expense_id'][$i],
			            'exp_name' => $expense['exp_name'][$i],
			            'amount' => $expense['amount'][$i],
			            'trip_id' => $response,
			            );
			        $r = $this->db->insert('vih_expense',$in);
			    }
			}
			
// 			$bookingemail = $this->input->post('bookingemail');
// 			if(isset($bookingemail)) {
// 				$this->sendtripemail($this->input->post());
// 			}
			if($response) {
				$this->session->set_flashdata('successmessage', 'New Voucher added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('trips');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('trips');
		}
	}
	public function edittrip()
	{
		$data['customerlist'] = $this->trips_model->getall_customer();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['exp_types'] = $this->db->where('is_default','1')->get('exp_types')->result_array();
		$t_id = $this->uri->segment(3);
		$data['tripdetails'] = $this->trips_model->get_tripdetails($t_id);
		
		$this->template->template_render('trips_add',$data);
	}

	public function updatetrips()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$route = $_POST['route'];
		    $expense = $_POST['expense'];
			$response = $this->trips_model->update_trips($this->input->post());
			if($route && $response)
			{
			    $this->db->where('trip_id',$response)->delete('trip_routes');
			
			
			    for($i = 0 ; $i <= count($route) ;$i++)
			    {
			        $in = array(
			            'route_from' => $route['route_from'][$i],
			            'route_to' => $route['route_to'][$i],
			            'distance' => $route['distance'][$i],
			            'weight' => $route['weight'][$i],
			            'unit_price' => $route['unit_price'][$i],
			            'total' => $route['wages'][$i],
			            'trip_id' => $response,
			            );
			        $r = $this->db->insert('trip_routes',$in);
			    }
			}
			if($expense && $response)
			{
			    $this->db->where('trip_id',$response)->delete('vih_expense');
			    for($i = 0 ; $i <= count($expense) ;$i++)
			    {
			        if(isset($expense['expense_id'][$i]) && !$expense['expense_id'][$i])
			        {
			            $ie = $this->db->insert('exp_types',array('name'=>$expense['exp_name'][$i]));
			            if($ie)
			            {
			            $expense['expense_id'][$i] = $this->db->insert_id();
			            }
			            else
			            {
			                var_dump($this->db->last_query());
			                die();
			            }
			        }
			        $in = array(
			            'expense_id' => $expense['expense_id'][$i],
			            'exp_name' => $expense['exp_name'][$i],
			            'amount' => $expense['amount'][$i],
			            'trip_id' => $response,
			            );
			        $r = $this->db->insert('vih_expense',$in);
			    }
			}
			if($response) {
				$this->session->set_flashdata('successmessage', 'Voucher updated successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('trips');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('trips');
		}
	}
	public function details()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$tripdetails = $this->trips_model->get_tripdetails($b_id);
		if(isset($tripdetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($tripdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails[0]['t_id']);
			$data['tripdetails'] = $tripdetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
		}
		$this->template->template_render('trips_details',$data);
	}
	public function invoice()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$tripdetails = $this->trips_model->get_tripdetails($b_id);
		if(isset($tripdetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($tripdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails[0]['t_id']);
			$data['tripdetails'] = $tripdetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
		}
		if($this->config->item('theme'))
        {
		$this->load->view($this->config->item('theme').'/invoice',$data);
        }
        else
        {
		$this->load->view('invoice',$data);
        }
	}
	public function trippayment()
	{
		$pyment = $this->input->post();
		$this->db->insert('trip_payments',$pyment);
		if($this->db->insert_id()) {
			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from trip and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);
			redirect('trips/details/'.$pyment['tp_trip_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
			redirect('trips/details/'.$pyment['tp_trip_id']);
		}
	}
	public function trippayment_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('trip_payments', array('tp_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('trips/details/'.$this->uri->segment(4));
	}
	public function addtripexpense() 	{
		$addtripexpense = $this->input->post();
		$trip_id = $addtripexpense['addtripexpense_trip_id'];
		unset($addtripexpense['addtripexpense_trip_id']);
		$response =  $this->db->insert('incomeexpense',$addtripexpense);
		if($response) {
			$this->session->set_flashdata('successmessage', 'Expense added successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('trips/details/'.$trip_id);
	}
	public function sendtripemail($data) {
		$this->load->model('email_model');	
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','booking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$value = '<b>Trip Details :</b><br><br> '.$data['t_trip_fromlocation']. ' <br><b>to</b><br> ' . $data['t_trip_tolocation']. ' <br>on<br> ' .$data['t_start_date'];
			$body = str_replace('{{bookingdetails}}', $value, $emailcontent);
			$custemail = $this->db->select('*')->from('customers')->where('c_id',$data['t_customer_id'])->get()->row()->c_email;
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
		}
	}
	public function sendtracking() {
		$this->load->model('email_model');
		$custemail = urldecode($_GET['email']);
		$url = base_url().'triptracking/'.$_GET['trackingcode'];
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','tracking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$body = str_replace('{{url}}', $url, $emailcontent);
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
			if($email) {
				$this->session->set_flashdata('successmessage', 'Email sent successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('trips/details/'.$_GET['t_id']);
		}
	}
	public function deletetrip()
	{
		$t_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('trips', array('t_id' => $t_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Trip deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('trips');
	}
}
