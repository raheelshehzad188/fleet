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
		$data['customerlist'] = $this->trips_model->getall_customer();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$this->template->template_render('trips_management',$data);
	}
      public function trip_table(){
            
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $searchquery = '';
        $start_date= $_POST['start_date'];
        $end_date= $_POST['end_date'];
        $tracking= $_POST['t_trackingcode'];
        $customer = $_POST['t_customer_id'];
        $t_vechicle= $_POST['t_vechicle'];
        $driver= $_POST['t_driver'];
        
        
        $this->db->select('t.t_id,t.t_customer_id,t.t_driver, t.t_start_date, t.t_end_date, t.t_totaldistance, t.t_trip_amount, t.t_exp_amount, t.t_trackingcode, c.c_name, d.d_name, v.v_name');
        $this->db->from('trips as t');
        $this->db->join('customers as c', 'c.c_id = t.t_customer_id', 'left');
        $this->db->join('drivers as d', 'd.d_id = t.t_driver', 'left');
        $this->db->join('vehicles as v', 'v.v_id = t.t_vechicle', 'left');
        
        if(isset($tracking) && !empty($tracking)){
            $this->db->where("t.t_trackingcode = '$tracking'");
        }else{
        if(isset($start_date) && isset($end_date)){
        $start_date = date('Y-m-d', strtotime($start_date)).' 00:00:00' ;
        $end_date = date('Y-m-d', strtotime($end_date)).' 23:59:59';
        $this->db->where("t.t_start_date >= '$start_date' AND t.t_end_date <= '$end_date'");
        }
        if(isset($customer) && !empty($customer)){
        $this->db->where("t.t_customer_id = '$customer'");
        }
        if(isset($t_vechicle) && !empty($t_vechicle)){
        $this->db->where("t.t_vechicle = '$t_vechicle'");
        }
        if(isset($driver) && !empty($driver)){
        $this->db->where("t.t_driver = '$driver'");
        }
        }
        $this->db->order_by("t.t_id","DESC");
        $query = $this->db->get()->result(); 

        // echo $this->db->last_query();
        $data = [];
        $sr=1;
        
        foreach($query as $r) {
            $action = '<a class="icon" href="trips/edittrip/'.$r->t_id.'"><i class="fa fa-edit"></i>
                            </a> | <a class="icon" href="trips/invoice/'.$r->t_id.'">
                              <i class="fa fa-eye"></i>
                            </a> ';
            $data[] = array(
                $sr++,
                $r->t_trackingcode,
                $r->c_name,
                $r->d_name,
                $r->v_name,
                $r->t_trip_amount,
                $action
            );
        }
    
        $result = array(
            "draw" => $draw,
            "recordsTotal" => count($query),
            "recordsFiltered" => count($query),
            "data" => $data
        );
    
        echo json_encode($result);
        exit();
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
	  public function view_update($id) {
    
    $data['staff_update_data'] = $this->db->where('st_id', $id)->get('type_staff')->row_array();
    
    $data['staff_update_data']['staff_update_id'] = $id;
    
    $this->session->set_flashdata('staff_update_data', $data['staff_update_data']);
    
    redirect('settings/type_staff');
}

	public function del_staff_type($id)
	{
		$response = $this->db->where('st_id',$id)->delete('type_staff');
		if($response) {
			$this->session->set_flashdata('successmessage', 'Staff Type deleted successfully..');
		    redirect('settings/type_staff');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('settings/type_staff');
		}
	}
	
		public function update_staff_type()
	{
	   $data = [
	       'type_name' => $this->input->post('type_name'),
	       ];
	    $id = $_POST['staff_update_id'];
		$this->db->where('st_id', $this->input->post('staff_update_id'));
        $response = $this->db->update('type_staff', $data);
		if($response) {
			$this->session->set_flashdata('successmessage', 'Staff Type Updated successfully..');
		    redirect('settings/type_staff');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('settings/type_staff');
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
	public function add_staff_type()
	{
	   
		$response = $this->db->insert('type_staff',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Staff Type added successfully..');
		    redirect('settings/type_staff');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('settings/type_staff');
		}
	}
	public function show_staff_type()
	{
	   $data['staff_type'] = $this->db->get('type_staff')->result_array();
	   $this->template->template_render('type_staff',$data);
	}
	public function exp_type()
	{
		$data['vehiclegroup'] = $this->db->get('exp_types')->result_array();
		$this->template->template_render('exp_type',$data);
	}
	public function routes()
	{
		$data['routes'] = $this->db->get('routes')->result_array();
		$this->template->template_render('routes',$data);
	}
	public function addroute()
	{
		$response = $this->db->insert('routes',$this->input->post());

		if($response) {
			$this->session->set_flashdata('successmessage', 'route added successfully..');
		    redirect('trips/routes');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('trips/routes');
		}
	}
	public function delroute($id)
	{
		$response = $this->db->where('id',$id)->delete('routes');
		if($response) {
			$this->session->set_flashdata('successmessage', 'Expense deleted successfully..');
		    redirect('trips/routes');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('trips/routes');
		}
	}

	//pumps

	public function delpump($id)
	{
		$response = $this->db->where('id',$id)->delete('pumps');
		if($response) {
			$this->session->set_flashdata('successmessage', 'Pump deleted successfully..');
		    redirect('trips/pump');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('trips/pump');
		}
	}

	public function addpump()
	{
		$response = $this->db->insert('pumps',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Pump added successfully..');
		    redirect('trips/pump');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('trips/pump');
		}
	}
	public function pump()
	{
		$data['vehiclegroup'] = $this->db->get('pumps')->result_array();
		$this->template->template_render('pumps',$data);
	}
	public function addtrips()
	{
		$data['customerlist'] = $this->trips_model->getall_customer();
		$data['exp_types'] = $this->db->where('is_default','1')->get('exp_types')->result_array();
		$data['pumps'] = $this->db->get('pumps')->result_array();
		$data['routes'] = $this->db->get('routes')->result_array();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['helperlist'] = $this->trips_model->getHelpers();
		$this->template->template_render('trips_add',$data);
	}
	public function inserttrips() 
	{
		$testxss = $_POST;
		if($testxss){
		    $route = $_POST['route'];
		    $expense = $_POST['expense'];
		    $petrol = $_POST['petrol'];
			$response = $this->trips_model->add_trips($this->input->post());
			if($route && $response)
			{
			
			
			    for($i = 0 ; $i <= count($route) ;$i++)
			    {
			    		if(!empty($route['route_from'][$i]))
			    		{
					        $in = array(
					            'route_from' => $route['route_from'][$i],
					            'route_to' => $route['route_to'][$i],
					            'weight' => $route['weight'][$i],
					            'unit_price' => $route['unit_price'][$i],
					            'total' => $route['wages'][$i],
					            'trip_id' => $response,
					            );
					        $r = $this->db->insert('trip_routes',$in);
					   }
			    }
			}
			if($petrol && $response)
			{
			
			
			    for($i = 0 ; $i <= count($petrol) ;$i++)
			    {
			    		if(!empty($petrol['name'][$i]))
			    		{
					        $in = array(
					            'pump' => $petrol['name'][$i],
					            'fuel_quantity' => $petrol['fuel_quantity'][$i],
					            'rate' => $petrol['rate'][$i],
					            'amount' => $petrol['amount'][$i],
					            'trip_id' => $response,
					            );
					        $r = $this->db->insert('tbl_fuel',$in);
					   }
			    }
			}
			if($expense && $response)
			{
			    for($i = 0 ; $i <= count($expense['expense_id']) ;$i++)
			    {
			        if(isset($expense['expense_id'][$i]) && !$expense['expense_id'][$i])
			        {
                        $already = $this->db->where(array('name'=>$expense['exp_name'][$i]))->get('exp_types')->row();
                        if($already)
                        {
                        	$expense['expense_id'][$i] = $already->id;

                        }
                        else
                        {

	                        $r = $this->db->insert('exp_types',array('name'=>$expense['exp_name'][$i]));
	                        if($r)
	                        {
	                            $expense['expense_id'][$i] = $this->db->insert_id();
	                        }
	                        else{
	                            var_dump($this->db->last_query());
	                            die();
	                        }
	                    }
			        }
			        if(!empty($expense['expense_id'][$i]) && intval($expense['amount'][$i]))
			        {
				        $in = array(
				            'expense_id' => $expense['expense_id'][$i],
				            'exp_name' => $expense['exp_name'][$i],
				            'amount' => intval($expense['amount'][$i]),
				            'trip_id' => $response,
				            );
				        $r = $this->db->insert('vih_expense',$in);
				   }
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
		$data['routes'] = $this->db->get('routes')->result_array();
		$data['helperlist'] = $this->trips_model->getHelpers();
        $data['pumps'] = $this->db->get('pumps')->result_array();
		$data['exp_types'] = $this->db->where('is_default','1')->get('exp_types')->result_array();
		$t_id = $this->uri->segment(3);
		$data['tripdetails'] = $this->trips_model->get_tripdetails($t_id);
		
		$this->template->template_render('trips_add',$data);
	}

	public function updatetrips()
	{
		$testxss = $_POST;
		if($testxss){
			$route = $_POST['route'];
		    $expense = $_POST['expense'];
		    $petrol = $_POST['petrol'];
			$response = $this->trips_model->update_trips($this->input->post());
			if($route && $response)
			{
			    $this->db->where('trip_id',$response)->delete('trip_routes');
			    for($i = 0 ; $i <= count($route)-1 ;$i++)
			    {
			        if(isset($route['route_from'][$i]) && $route['route_from'][$i] && isset($route['route_to'][$i]) && $route['route_to'][$i])
			        {
			        $in = array(
			            'route_from' => isset($route['route_from'][$i])?$route['route_from'][$i]:'',
			            'route_to' => (isset($route['route_to'][$i])?$route['route_to'][$i]:''),
			            'weight' => (isset($route['weight'][$i])?$route['weight'][$i]:0),
			            'unit_price' => (isset($route['unit_price'][$i])?$route['unit_price'][$i]:0),
			            'total' => isset($route['wages'][$i])?$route['wages'][$i]:0,
			            'trip_id' => $response,
			            );
			        $r = $this->db->insert('trip_routes',$in);
			        }
			    }
			}
            if($petrol && $response)
            {
                $this->db->where('trip_id',$response)->delete('tbl_fuel');


                for($i = 0 ; $i <= count($petrol) ;$i++)
                {
                    if(!empty($petrol['name'][$i]))
                    {
                        $in = array(
                            'pump' => $petrol['name'][$i],
                            'fuel_quantity' => $petrol['fuel_quantity'][$i],
                            'rate' => $petrol['rate'][$i],
                            'amount' => $petrol['amount'][$i],
                            'trip_id' => $response,
                        );
                        $r = $this->db->insert('tbl_fuel',$in);
                    }
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
			        if(isset($expense['expense_id'][$i]))
			        {
				        $in = array(
				            'expense_id' => $expense['expense_id'][$i],
				            'exp_name' => $expense['exp_name'][$i],
				            'amount' => $expense['amount'][$i],
				            'trip_id' => $response,
				            );

				        $r = $this->db->insert('vih_expense',$in);
			   		}
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
		if(isset($tripdetails['detail']['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($tripdetails['detail']['t_customer_id']);
			if(isset($customerdetails[0]))
			{
				$customerdetails = (array) $customerdetails[0];
			}
			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails['detail']['t_driver']);
			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails['detail']['t_id']);
			$data['tripdetails'] = $tripdetails['detail'];
			$data['customerdetails'] = (isset($customerdetails['c_id']))?$customerdetails:'';
			$data['driverdetails'] =  (isset($driverdetails['detail']['d_id']))?$driverdetails['detail']:'';
		}
		$this->template->template_render('trips_details',$data);
	}
	public function invoice()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$tripdetails = $this->trips_model->get_tripdetails($b_id);
        if(isset($_GET['print']))
        {
            var_dump($tripdetails);
            die();
        }
        $routes = $this->db->get('routes')->result_array();
        $n = array();
        foreach ($routes as $key => $value) {
        	$n[$value['id']] = $value['name'];
        }
        $data['routes'] = $n;
		if(isset($tripdetails['detail']['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($tripdetails['detail']['t_customer_id']);
			if(isset($customerdetails[0]))
			{
				$customerdetails = (array) $customerdetails[0];
			}
			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails['detail']['t_driver']);
			$driverdetails2 = $this->drivers_model->get_driverdetails($tripdetails['detail']['t_driver_2']);
			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails['detail']['t_id']);
			$data['tripdetails'] = $tripdetails['detail'];	
			$data['detail'] = $tripdetails;
			$data['customerdetails'] = (isset($customerdetails['c_id']))?$customerdetails:'';

			$data['driverdetails'] =  (isset($tripdetails['driver']))?$tripdetails['driver']:array();
			$data['driverdetails2'] =  (isset($tripdetails['driver2']))?$tripdetails['driver2']:array();
			$data['helper'] =  (isset($tripdetails['helper']))?$tripdetails['helper']:array();
			$data['vehicle'] =  (isset($tripdetails['vehicle']))?$tripdetails['vehicle']:array();
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
	public function generate_serial_no(){
		$id = $_POST['id'];
		$ser = $this->trips_model->generate_serial_no($id);
		$driver1 = $this->trips_model->getDriver1($id);
		$driver2 = $this->trips_model->getDriver2($id);
		$helper = $this->trips_model->helper($id);
		$data = array(
			'ser_no' => $ser,
			'driver1' => $driver1,
			'driver2' => $driver2,
			'helper' => $helper,
		);
		echo json_encode($data);
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
defined('BASEPATH') OR exit('No direct script access allowed');
}
}}
// class Trips extends CI_Controller {

// 	 function __construct()
//      {
//           parent::__construct();
//           $this->load->database();
//           $this->load->model('trips_model');
//           $this->load->model('customer_model');	
//           $this->load->model('drivers_model');	
//           $this->load->helper(array('form', 'url','string'));
//           $this->load->library('form_validation');
//           $this->load->library('session');
//      }

// 	public function index()
// 	{
// 		$data['triplist'] = $this->trips_model->getall_trips();
// 		$data['customerlist'] = $this->trips_model->getall_customer();
// 		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
// 		$data['driverlist'] = $this->trips_model->getall_driverlist();
// 		$this->template->template_render('trips_management',$data);
// 	}
//       public function trip_table(){
            
//         $draw = intval($this->input->get("draw"));
//         $start = intval($this->input->get("start"));
//         $length = intval($this->input->get("length"));
        
//         $searchquery = '';
//         $start_date= $_POST['start_date'];
//         $end_date= $_POST['end_date'];
//         $tracking= $_POST['t_trackingcode'];
//         $customer = $_POST['t_customer_id'];
//         $t_vechicle= $_POST['t_vechicle'];
//         $driver= $_POST['t_driver'];
        
        
//         $this->db->select('t.t_id,t.t_customer_id,t.t_driver, t.t_start_date, t.t_end_date, t.t_totaldistance, t.t_trip_amount, t.t_exp_amount, t.t_trackingcode, c.c_name, d.d_name, v.v_name');
//         $this->db->from('trips as t');
//         $this->db->join('customers as c', 'c.c_id = t.t_customer_id', 'left');
//         $this->db->join('drivers as d', 'd.d_id = t.t_driver', 'left');
//         $this->db->join('vehicles as v', 'v.v_id = t.t_vechicle', 'left');
        
//         if(isset($tracking) && !empty($tracking)){
//             $this->db->where("t.t_trackingcode = '$tracking'");
//         }else{
//         if(isset($start_date) && isset($end_date)){
//         $start_date = date('Y-m-d', strtotime($start_date));
//         $end_date = date('Y-m-d', strtotime($end_date));
//         $this->db->where("t.t_start_date >= '$start_date' AND t.t_end_date <= '$end_date'");
//         }
//         if(isset($customer) && !empty($customer)){
//         $this->db->where("t.t_customer_id = '$customer'");
//         }
//         if(isset($t_vechicle) && !empty($t_vechicle)){
//         $this->db->where("t.t_vechicle = '$t_vechicle'");
//         }
//         if(isset($driver) && !empty($driver)){
//         $this->db->where("t.t_driver = '$driver'");
//         }
//         }
//         $this->db->order_by("t.t_id","DESC");
//         $query = $this->db->get()->result(); 
//         $data = [];
//         $sr=1;
        
//         foreach($query as $r) {
//             $action = '<a class="icon" href="trips/edittrip/'.$r->t_id.'"><i class="fa fa-edit"></i>
//                             </a> | <a class="icon" href="trips/invoice/'.$r->t_id.'">
//                               <i class="fa fa-eye"></i>
//                             </a> ';
//             $data[] = array(
//                 $sr++,
//                 $r->t_trackingcode,
//                 $r->c_name,
//                 $r->d_name,
//                 $r->v_name,
//                 $r->t_trip_amount,
//                 $action
//             );
//         }
    
//         $result = array(
//             "draw" => $draw,
//             "recordsTotal" => count($query),
//             "recordsFiltered" => count($query),
//             "data" => $data
//         );
    
//         echo json_encode($result);
//         exit();
//     }

// 	public function delexp($id)
// 	{
// 		$response = $this->db->where('id',$id)->delete('exp_types');
// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'Expense deleted successfully..');
// 		    redirect('trips/exp_type');
// 		} else
// 		{
// 			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
// 		    redirect('trips/exp_type');
// 		}
// 	}

// 	public function addexp()
// 	{
// 		$response = $this->db->insert('exp_types',$this->input->post());
// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'Expense added successfully..');
// 		    redirect('trips/exp_type');
// 		} else
// 		{
// 			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
// 		    redirect('trips/exp_type');
// 		}
// 	}
// 	public function exp_type()
// 	{
// 		$data['vehiclegroup'] = $this->db->get('exp_types')->result_array();
// 		$this->template->template_render('exp_type',$data);
// 	}
// 	public function routes()
// 	{
// 		$data['routes'] = $this->db->get('routes')->result_array();
// 		$this->template->template_render('routes',$data);
// 	}
// 	public function addroute()
// 	{
// 		$response = $this->db->insert('routes',$this->input->post());

// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'route added successfully..');
// 		    redirect('trips/routes');
// 		} else
// 		{
// 			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
// 		    redirect('trips/routes');
// 		}
// 	}
// 	public function delroute($id)
// 	{
// 		$response = $this->db->where('id',$id)->delete('routes');
// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'Expense deleted successfully..');
// 		    redirect('trips/routes');
// 		} else
// 		{
// 			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
// 		    redirect('trips/routes');
// 		}
// 	}

// 	//pumps

// 	public function delpump($id)
// 	{
// 		$response = $this->db->where('id',$id)->delete('pumps');
// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'Pump deleted successfully..');
// 		    redirect('trips/pump');
// 		} else
// 		{
// 			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
// 		    redirect('trips/pump');
// 		}
// 	}

// 	public function addpump()
// 	{
// 		$response = $this->db->insert('pumps',$this->input->post());
// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'Pump added successfully..');
// 		    redirect('trips/pump');
// 		} else
// 		{
// 			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
// 		    redirect('trips/pump');
// 		}
// 	}
// 	public function pump()
// 	{
// 		$data['vehiclegroup'] = $this->db->get('pumps')->result_array();
// 		$this->template->template_render('pumps',$data);
// 	}
// 	public function addtrips()
// 	{
// 		$data['customerlist'] = $this->trips_model->getall_customer();
// 		$data['exp_types'] = $this->db->where('is_default','1')->get('exp_types')->result_array();
// 		$data['pumps'] = $this->db->get('pumps')->result_array();
// 		$data['routes'] = $this->db->get('routes')->result_array();
// 		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
// 		$data['driverlist'] = $this->trips_model->getall_driverlist();
// 		$this->template->template_render('trips_add',$data);
// 	}
// 	public function inserttrips() 
// 	{
// 		$testxss = $_POST;
// 		if($testxss){
// 		    $route = $_POST['route'];
// 		    $expense = $_POST['expense'];
// 		    $petrol = $_POST['petrol'];
// 			$response = $this->trips_model->add_trips($this->input->post());
// 			if($route && $response)
// 			{
			
			
// 			    for($i = 0 ; $i <= count($route) ;$i++)
// 			    {
// 			    		if(!empty($route['route_from'][$i]))
// 			    		{
// 					        $in = array(
// 					            'route_from' => $route['route_from'][$i],
// 					            'route_to' => $route['route_to'][$i],
// 					            'weight' => $route['weight'][$i],
// 					            'unit_price' => $route['unit_price'][$i],
// 					            'total' => $route['wages'][$i],
// 					            'trip_id' => $response,
// 					            );
// 					        $r = $this->db->insert('trip_routes',$in);
// 					   }
// 			    }
// 			}
// 			if($petrol && $response)
// 			{
			
			
// 			    for($i = 0 ; $i <= count($petrol) ;$i++)
// 			    {
// 			    		if(!empty($petrol['name'][$i]))
// 			    		{
// 					        $in = array(
// 					            'pump' => $petrol['name'][$i],
// 					            'fuel_quantity' => $petrol['fuel_quantity'][$i],
// 					            'rate' => $petrol['rate'][$i],
// 					            'amount' => $petrol['amount'][$i],
// 					            'trip_id' => $response,
// 					            );
// 					        $r = $this->db->insert('tbl_fuel',$in);
// 					   }
// 			    }
// 			}
// 			if($expense && $response)
// 			{
// 			    for($i = 0 ; $i <= count($expense['expense_id']) ;$i++)
// 			    {
// 			        if(isset($expense['expense_id'][$i]) && !$expense['expense_id'][$i])
// 			        {
//                         $already = $this->db->where(array('name'=>$expense['exp_name'][$i]))->get('exp_types')->row();
//                         if($already)
//                         {
//                         	$expense['expense_id'][$i] = $already->id;

//                         }
//                         else
//                         {

// 	                        $r = $this->db->insert('exp_types',array('name'=>$expense['exp_name'][$i]));
// 	                        if($r)
// 	                        {
// 	                            $expense['expense_id'][$i] = $this->db->insert_id();
// 	                        }
// 	                        else{
// 	                            var_dump($this->db->last_query());
// 	                            die();
// 	                        }
// 	                    }
// 			        }
// 			        if(!empty($expense['expense_id'][$i]) && intval($expense['amount'][$i]))
// 			        {
// 				        $in = array(
// 				            'expense_id' => $expense['expense_id'][$i],
// 				            'exp_name' => $expense['exp_name'][$i],
// 				            'amount' => intval($expense['amount'][$i]),
// 				            'trip_id' => $response,
// 				            );
// 				        $r = $this->db->insert('vih_expense',$in);
// 				   }
// 			    }
// 			}
			
// // 			$bookingemail = $this->input->post('bookingemail');
// // 			if(isset($bookingemail)) {
// // 				$this->sendtripemail($this->input->post());
// // 			}
// 			if($response) {
// 				$this->session->set_flashdata('successmessage', 'New Voucher added successfully..');
// 			} else {
// 				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// 			}
// 			redirect('trips');
// 		} else {
// 			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
// 			redirect('trips');
// 		}
// 	}
// 	public function edittrip()
// 	{
// 		$data['customerlist'] = $this->trips_model->getall_customer();
// 		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
// 		$data['driverlist'] = $this->trips_model->getall_driverlist();
// 		$data['routes'] = $this->db->get('routes')->result_array();
//         $data['pumps'] = $this->db->get('pumps')->result_array();
// 		$data['exp_types'] = $this->db->where('is_default','1')->get('exp_types')->result_array();
// 		$t_id = $this->uri->segment(3);
// 		$data['tripdetails'] = $this->trips_model->get_tripdetails($t_id);
		
// 		$this->template->template_render('trips_add',$data);
// 	}

// 	public function updatetrips()
// 	{
// 		$testxss = $_POST;
// 		if($testxss){
// 			$route = $_POST['route'];
// 		    $expense = $_POST['expense'];
// 		    $petrol = $_POST['petrol'];
// 			$response = $this->trips_model->update_trips($this->input->post());
// 			if($route && $response)
// 			{
// 			    $this->db->where('trip_id',$response)->delete('trip_routes');
// 			    for($i = 0 ; $i <= count($route)-1 ;$i++)
// 			    {
// 			        if(isset($route['route_from'][$i]) && $route['route_from'][$i] && isset($route['route_to'][$i]) && $route['route_to'][$i])
// 			        {
// 			        $in = array(
// 			            'route_from' => isset($route['route_from'][$i])?$route['route_from'][$i]:'',
// 			            'route_to' => (isset($route['route_to'][$i])?$route['route_to'][$i]:''),
// 			            'weight' => (isset($route['weight'][$i])?$route['weight'][$i]:0),
// 			            'unit_price' => (isset($route['unit_price'][$i])?$route['unit_price'][$i]:0),
// 			            'total' => isset($route['wages'][$i])?$route['wages'][$i]:0,
// 			            'trip_id' => $response,
// 			            );
// 			        $r = $this->db->insert('trip_routes',$in);
// 			        }
// 			    }
// 			}
//             if($petrol && $response)
//             {
//                 $this->db->where('trip_id',$response)->delete('tbl_fuel');


//                 for($i = 0 ; $i <= count($petrol) ;$i++)
//                 {
//                     if(!empty($petrol['name'][$i]))
//                     {
//                         $in = array(
//                             'pump' => $petrol['name'][$i],
//                             'fuel_quantity' => $petrol['fuel_quantity'][$i],
//                             'rate' => $petrol['rate'][$i],
//                             'amount' => $petrol['amount'][$i],
//                             'trip_id' => $response,
//                         );
//                         $r = $this->db->insert('tbl_fuel',$in);
//                     }
//                 }
//             }
// 			if($expense && $response)
// 			{
// 			    $this->db->where('trip_id',$response)->delete('vih_expense');
// 			    for($i = 0 ; $i <= count($expense['exp_name']) ;$i++)
// 			    {
// 			        if(isset($expense['expense_id'][$i]) && !$expense['expense_id'][$i])
// 			        {
// 			            $ie = $this->db->insert('exp_types',array('name'=>$expense['exp_name'][$i]));
// 			            if($ie)
// 			            {
// 			            $expense['expense_id'][$i] = $this->db->insert_id();
// 			            }
// 			            else
// 			            {
// 			                var_dump($this->db->last_query());
// 			                die();
// 			            }
// 			        }
// 			        if(isset($expense['expense_id'][$i]))
// 			        {
// 				        $in = array(
// 				            'expense_id' => $expense['expense_id'][$i],
// 				            'exp_name' => $expense['exp_name'][$i],
// 				            'amount' => $expense['amount'][$i],
// 				            'trip_id' => $response,
// 				            );

// 				        $r = $this->db->insert('vih_expense',$in);
// 			   		}
// 			    }
// 			}
// 			if($response) {
// 				$this->session->set_flashdata('successmessage', 'Voucher updated successfully..');
// 			} else {
// 				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// 			}
// 			redirect('trips');
// 		} else {
// 			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
// 			redirect('trips');
// 		}
// 	}
// 	public function details()
// 	{
// 		$data = array();
// 		$b_id = $this->uri->segment(3);
// 		$tripdetails = $this->trips_model->get_tripdetails($b_id);
// 		if(isset($tripdetails['detail']['t_id'])) {
// 			$customerdetails = $this->customer_model->get_customerdetails($tripdetails['detail']['t_customer_id']);
// 			if(isset($customerdetails[0]))
// 			{
// 				$customerdetails = (array) $customerdetails[0];
// 			}
// 			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails['detail']['t_driver']);
// 			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails['detail']['t_id']);
// 			$data['tripdetails'] = $tripdetails['detail'];
// 			$data['customerdetails'] = (isset($customerdetails['c_id']))?$customerdetails:'';
// 			$data['driverdetails'] =  (isset($driverdetails['detail']['d_id']))?$driverdetails['detail']:'';
// 		}
// 		$this->template->template_render('trips_details',$data);
// 	}
// 	public function invoice()
// 	{
// 		$data = array();
// 		$b_id = $this->uri->segment(3);
// 		$tripdetails = $this->trips_model->get_tripdetails($b_id);
//         if(isset($_GET['print']))
//         {
//             var_dump($tripdetails);
//             die();
//         }
//         $routes = $this->db->get('routes')->result_array();
//         $n = array();
//         foreach ($routes as $key => $value) {
//         	$n[$value['id']] = $value['name'];
//         }
//         $data['routes'] = $n;
// 		if(isset($tripdetails['detail']['t_id'])) {
// 			$customerdetails = $this->customer_model->get_customerdetails($tripdetails['detail']['t_customer_id']);
// 			if(isset($customerdetails[0]))
// 			{
// 				$customerdetails = (array) $customerdetails[0];
// 			}
// 			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails['detail']['t_driver']);
// 			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails['detail']['t_id']);
// 			$data['tripdetails'] = $tripdetails['detail'];	
// 			$data['detail'] = $tripdetails;
// 			$data['customerdetails'] = (isset($customerdetails['c_id']))?$customerdetails:'';

// 			$data['driverdetails'] =  (isset($tripdetails['driver']))?$tripdetails['driver']:array();
// 			$data['vehicle'] =  (isset($tripdetails['vehicle']))?$tripdetails['vehicle']:array();
// 		}
// 		if($this->config->item('theme'))
//         {
// 		$this->load->view($this->config->item('theme').'/invoice',$data);
//         }
//         else
//         {
// 		$this->load->view('invoice',$data);
//         }
// 	}
// 	public function trippayment()
// 	{
// 		$pyment = $this->input->post();
// 		$this->db->insert('trip_payments',$pyment);
// 		if($this->db->insert_id()) {
// 			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from trip and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
// 			$this->db->insert('incomeexpense',$addincome);
// 			redirect('trips/details/'.$pyment['tp_trip_id']);
// 		} else {
// 			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
// 			redirect('trips/details/'.$pyment['tp_trip_id']);
// 		}
// 	}
// 	public function trippayment_delete()
// 	{
// 		$tp_id = $this->uri->segment(3);
// 		$response = $this->db->delete('trip_payments', array('tp_id' =>$tp_id));
// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
// 		} else {
// 			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// 		}
// 		redirect('trips/details/'.$this->uri->segment(4));
// 	}
// 	public function addtripexpense() 	{
// 		$addtripexpense = $this->input->post();
// 		$trip_id = $addtripexpense['addtripexpense_trip_id'];
// 		unset($addtripexpense['addtripexpense_trip_id']);
// 		$response =  $this->db->insert('incomeexpense',$addtripexpense);
// 		if($response) {
// 			$this->session->set_flashdata('successmessage', 'Expense added successfully..');
// 		} else {
// 			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// 		}
// 		redirect('trips/details/'.$trip_id);
// 	}
// 	public function sendtripemail($data) {
// 		$this->load->model('email_model');	
// 		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','booking')->get()->result_array();
// 		if(!empty($gettemplate)) {
// 		    $emailcontent = $gettemplate[0]['et_body'];
// 			$value = '<b>Trip Details :</b><br><br> '.$data['t_trip_fromlocation']. ' <br><b>to</b><br> ' . $data['t_trip_tolocation']. ' <br>on<br> ' .$data['t_start_date'];
// 			$body = str_replace('{{bookingdetails}}', $value, $emailcontent);
// 			$custemail = $this->db->select('*')->from('customers')->where('c_id',$data['t_customer_id'])->get()->row()->c_email;
// 			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
// 		}
// 	}
// 	public function sendtracking() {
// 		$this->load->model('email_model');
// 		$custemail = urldecode($_GET['email']);
// 		$url = base_url().'triptracking/'.$_GET['trackingcode'];
// 		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','tracking')->get()->result_array();
// 		if(!empty($gettemplate)) {
// 		    $emailcontent = $gettemplate[0]['et_body'];
// 			$body = str_replace('{{url}}', $url, $emailcontent);
// 			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
// 			if($email) {
// 				$this->session->set_flashdata('successmessage', 'Email sent successfully..');
// 			} else {
// 				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// 			}
// 			redirect('trips/details/'.$_GET['t_id']);
// 		}
// 	}
// 	public function deletetrip()
// 	{
// 		$t_id = $this->input->post('del_id');
// 		$deleteresp = $this->db->delete('trips', array('t_id' => $t_id)); 
// 		if($deleteresp) {
// 			$this->session->set_flashdata('successmessage', 'Trip deleted successfully..');
// 		} else {
// 			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// 		}
// 		redirect('trips');
// 	}
// 	public function generate_serial_no(){
// 		$id = $_POST['id'];
// 		$ser = $this->trips_model->generate_serial_no($id);
// 		echo $ser;
	


// 			$body = str_replace('{{url}}', $url, $emailcontent);
// 			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
// 			if($email) {
// 				$this->session->set_flashdata('successmessage', 'Email sent successfully..');
// 			} else {
// 				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// 			}
// 			redirect('trips/details/'.$_GET['t_id']);
// 		}
	
// // 	public function deletetrip()
// // // 	{
// // // 		$t_id = $this->input->post('del_id');
// // // 		$deleteresp = $this->db->delete('trips', array('t_id' => $t_id)); 
// // // 		if($deleteresp) {
// // // 			$this->session->set_flashdata('successmessage', 'Trip deleted successfully..');
// // // 		} else {
// // // 			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
// // // 		}
// // // 		redirect('trips');
// // // 	}
// // 	public function generate_serial_no(){
// // 		$id = $_POST['id'];
// // 		$ser = $this->trips_model->generate_serial_no($id);
// // 		echo $ser;
// // 	}
// }
