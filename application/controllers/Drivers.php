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
	     public function driver_file($did, $fid)
	     {
	         
	     	$config['upload_path'] = 'assets/uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; 
			$data = array();
			$data['did'] = $did;
			$data['fid'] = $fid;
			$data['exp'] = (isset($_POST['exp']))?$_POST['exp']:'';
			// var_dump($data);
			$this->load->library('upload', $config); 
	     	if($this->upload->do_upload('file')){ 
					$uploadData = $this->upload->data();
					$data['file'] = $uploadData['file_name'];
				}
				else
				{
					$error = array(
						'error' => $this->upload->display_errors()
					);
					echo json_encode($error);
					exit();
				}
				$al = $this->db->select('*')->from('driver_files')->where('fid', $fid)->where('did', $did)->get()->row();
				// echo $this->db->last_query();die();
				if($al)
				{
					$this->db->where('fid',$fid)->where('did',$did)->update('driver_files',$data);

				}
				else
				{
					$this->db->insert('driver_files',$data);
				}
				$al = $this->db->where('fid',$fid)->where('did',$did)->get('driver_files')->row();
				echo json_encode($al);
				exit();
	     	
	     }
	     public function load()
	  {
	    if(isset($_GET['date']) && isset($_GET['vid']))
	    {

	      $sql = "SELECT  t_id,t_trackingcode FROM `trips` WHERE (t_driver = '".$_GET['vid']."' OR t_driver_2 = '".$_GET['vid']."' OR helper = '".$_GET['vid']."') AND '".$_GET['date']."' BETWEEN DATE(t_start_date) AND DATE(t_end_date);";
	      //	die();
	      
	      $all = $this->db->query($sql)->row_array();
	      $ret = array();
	      if($all)
	      {
	      	$ret = array(
	      		'status'=>1,
	      		'trip' => $all,
	      		'bgcolor'=>'green',
	      		'html'=>'<a target="_blank" style="color:#fff" href="'.base_url('trips/invoice/'.$all['t_id']).'">'.$all['t_trackingcode'].'</a>'

	      	);
	      }
	      else
	      {
	      	 $date_now = time(); //current timestamp
	    $date_convert = strtotime($_GET['date']);

	    if ($date_now > $date_convert) {
	        $ret = array(
	      		'status'=>0,
	      		'onclick' =>'add_attendence("'.$_GET['date'].'","'.$_GET['vid'].'")',
	      		'bgcolor'=>'red'
	      	);
	    } else {
	        $ret = array(
	        	'onclick' =>'add_attendence("'.$_GET['date'].'","'.$_GET['vid'].'")',
	      		'status'=>0,
	      		'bgcolor'=>'yellow'
	      	);
	    }
	      	
	      }
	      echo json_encode($ret);
	      exit();
	    }
	  }
	     public function abs()
	  {
	    if(isset($_GET['date']) && isset($_GET['vid']))
	    {
	    	$datestring = '1-'.$_GET['date']; 
	  
	// Converting string to date 
	$date = strtotime($datestring); 
	   
	// Last date of current month. 
	$lastdate = strtotime(date("Y-m-t", $date )); 
	  
	  
	// Day of the last date  
	$last_date  = date("d", $lastdate); 
	$last_d = $last_date;
	//die();
	$abs = array();
	for ($i=0; $i <$last_d ; $i++) { 
		$d = $changeDate = date("Y-m-d", strtotime($i.'-'.$_GET['date']));
		$sql = "SELECT  t_id,t_trackingcode FROM `trips` WHERE (t_driver = '".$_GET['vid']."' OR t_driver_2 = '".$_GET['vid']."' OR helper = '".$_GET['vid']."') AND '".$d."' BETWEEN DATE(t_start_date) AND DATE(t_end_date);";
	      
	      $all = $this->db->query($sql)->row_array();
	      if(!$all)
	      {
	      	$abs[] = $d;
	      }
	}
		echo count($abs);
	      exit();
	    }
	  }
	     public function bonus()
	  {
	    if(isset($_GET['date']) && isset($_GET['vid']))
	    {
	    	$datestring = '1-'.$_GET['date']; 
	    	$edatestring = '1-'.$_GET['date']; 
	  
	// Converting string to date 
	$date = strtotime($datestring); 
	   
	// Last date of current month. 
	$lastdate = strtotime(date("Y-m-t", $date )); 
	  
	  
	// Day of the last date  
	$last_date  = date("d", $lastdate); 
	$last_d = $last_date;
	$edatestring = $last_d.'-'.$_GET['date']; 
	$sd = date("Y-m-d H:i:s", strtotime($datestring.' 00:00:00'));
	$ed = date("Y-m-d H:i:s", strtotime($edatestring.' 11:59:00'));

		$sql = "SELECT  SUM(amount) as amount FROM `staff_bonus` WHERE (sid = '".$_GET['vid']."' )  AND create_at >= '".$sd."' AND create_at <= '".$ed."'";
			// die();
	      
	      $all = $this->db->query($sql)->row_array();
	      echo (isset($all['amount'])?$all['amount']:0);
	      exit();
	    }
	  }
	     public function loan()
	  {
	    if(isset($_GET['date']) && isset($_GET['vid']))
	    {
	    	$datestring = '1-'.$_GET['date']; 
	    	$edatestring = '1-'.$_GET['date']; 
	  
	// Converting string to date 
	$date = strtotime($datestring); 
	   
	// Last date of current month. 
	$lastdate = strtotime(date("Y-m-t", $date )); 
	  
	  
	// Day of the last date  
	$last_date  = date("d", $lastdate); 
	$last_d = $last_date;
	$edatestring = $last_d.'-'.$_GET['date']; 
	$sd = date("Y-m-d H:i:s", strtotime($datestring.' 00:00:00'));
	$ed = date("Y-m-d H:i:s", strtotime($edatestring.' 11:59:00'));

		$sql = "SELECT  SUM(amount_out) as aout,SUM(amount_in) as ain FROM `staff_loan` WHERE (sid = '".$_GET['vid']."' )  AND create_at >= '".$sd."' AND create_at <= '".$ed."'";
	      
	      $all = $this->db->query($sql)->row_array();
	      echo (isset($all['aout'])?($all['aout']-$all['ain']):0);
	      exit();
	    }
	  }
	     public function attendence()
	     {
	     	$data['driverslist'] = $this->drivers_model->getall_drivers();
			$cats = $this->drivers_model->getall_staff_types();
			$n = array();
			foreach($cats as $k=>$v)
			{
			    $n[$v['st_id']] = $v['type_name'];
			}
			$data['staff_types'] = $cats;
			$this->template->template_render('attendence',$data);
	     }
	     public function salaries()
	     {
	     	$data['driverslist'] = $this->drivers_model->getall_drivers();
			$cats = $this->drivers_model->getall_staff_types();
			$n = array();
			foreach($cats as $k=>$v)
			{
			    $n[$v['st_id']] = $v['type_name'];
			}
			$data['staff_types'] = $cats;
			$this->template->template_render('salaries',$data);
	     }
	     public function viewstaff()
		{
			$v_id = $this->uri->segment(3);
			$vehicledetails = $this->drivers_model->get_driverdetails($v_id);
			$data['ofc_exp'] = $this->drivers_model->ofc_exp();
			$data['files'] = $this->db->where('sal_type',0)->get('files')->result_array();
			$data['vehicles'] = $this->db->get('vehicles')->result_array();
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
			$data['staff_types'] = $cats;
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
		public function staff_salary()
		{
			$data['customerlist'] = $this->drivers_model->getall_drivers();
			$this->template->template_render('salary',$data);
		}
		
		public function add_salary()
		{
			$data['driverslist'] = $this->drivers_model->getall_drivers();
			$this->template->template_render('add_salary',$data);
		}
		public function insertsalary()
		{
		 
			$this->form_validation->set_rules('cust_id','Name','required|trim');
			$this->form_validation->set_rules('salary','Salary','required|trim');
			$testxss = true;
			if($this->form_validation->run()==TRUE && $testxss){
				$response = $this->drivers_model->add_salary($this->input->post());
				if($response){
					$this->session->set_flashdata('successmessage', 'Salary updated successfully..');
					redirect('drivers/staff_salary');
				}
				
			} else {
				$errormsg = preg_replace( "/\r|\n/", "", trim(str_replace('.',',',strip_tags(validation_errors()))));
				if(!$testxss) {
					$errormsg = 'Error! Your input are not allowed.Please try again';
				}
				$this->session->set_flashdata('warningmessage',$errormsg);
				redirect('drivers/add_salary');
			}
		}
		      public function salary_table(){
	            
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));
	        
	        $searchquery = '';
	        $customer = $_POST['t_customer_id'];
	        
	        
	        $this->db->select('salary.*,drivers.d_name');
	        $this->db->from('salary');
	        $this->db->join('drivers', 'drivers.d_id = salary.cust_id', 'left');
	        
	        if (isset($customer) && !empty($customer)) {
	        	$this->db->where('salary.cust_id',$customer);
	        }

	       
	        $this->db->order_by("salary.id","DESC");
	        $query = $this->db->get()->result(); 

	        // echo $this->db->last_query();
	        $data = [];
	        $sr=1;
	        
	        foreach($query as $r) {
	        // 	$total = $r->salary + $r->allowance;
	        	$total = $r->salary;
	            $action = '<a class="icon" href=""><i class="fa fa-edit"></i>
	                            </a> | <a class="icon" href="">
	                              <i class="fa fa-eye"></i>
	                            </a> ';
	            $data[] = array(
	                $sr++,
	                $r->d_name,
	                $r->salary,
	                // $r->allowance,
	                $total,
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
	     public function drivers_table(){
	            
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));
	        
	        $searchquery = '';
	        $s_category = $_POST['s_category'];
	        
	        
	        $this->db->select('*');
	        $this->db->from('drivers');
	        $this->db->join('type_staff', 'type_staff.st_id = drivers.st_cat_id', 'left');
	        if(isset($s_category) && !empty($s_category)){
	        	$this->db->where('type_staff.st_id',$s_category);
	        }
	        $this->db->order_by("d_id","DESC");
	        $query = $this->db->get()->result(); 

	        // echo $this->db->last_query();
	        $data = [];
	        $sr=1;
	        
	        foreach($query as $r) {
	        	$total = $r->salary + $r->allowance;
	            $action = '<a class="icon" href=""><i class="fa fa-edit"></i>
	                            </a> | <a class="icon" href="">
	                              <i class="fa fa-eye"></i>
	                            </a> ';
	            $X = '-';
	            if(isset($r->d_file1) && !empty($r->d_file1)){
	            	$X = '<a target="_blank" href="'.base_url('assets/uploads/').ucwords($r->d_file1).'" class=""> View </a>';
		        }else{
		        	$X = '-';
		        }
		        $c = '';
		        if($r->d_is_active == 1){
		        	$c = 'badge-success';
		        	$s = 'Active';
		        }else{
		        	$c = 'badge-danger';
		        	$s = 'Inctive';
		        }
		        $y = '<span class="badge '.$c.' ">'.$s.'</span>';
		        $d_id = $r->d_id;
		        $sql = "SELECT * FROM `vehicles`  
WHERE driver_1 = '".$d_id."' OR driver_2 = '".$d_id."' OR helper = '".$d_id."';";
$all = $this->db->query($sql)->row_array();
		        if($all){
		        	$c = 'badge-success';
		        	$s = $all['v_registration_no'];
		        }else{
		        	$c = 'badge-warning';
		        	$s = 'Un- Assigned';
		        }
		        $z = '<span class="badge '.$c.' ">'.$s.'</span>';

		        $action = '';
		        $action = '<a class="icon" href="'.base_url('drivers/editdriver/').$r->d_id.'"><i class="fa fa-edit"></i></a> | <a class="icon" href="'.base_url('drivers/viewstaff/').$r->d_id.'"><i class="fa fa-eye"></i></a>| <a class="icon" href="'.base_url('drivers/deletedriver/').$r->d_id.'"><i class="fa fa-trash"></i></a>';
	            $data[] = array(
	                $sr++,
	                $r->type_name,
	                '<img class="img-fluid" style="width: 58px;" src="'.base_url('assets/uploads/').ucwords($r->d_file).'">',
	                $r->d_name,
	                $r->d_mobile,
	                $r->d_licenseno,
	                date(dateformat(), strtotime($r->d_license_expdate)),
	                $z,
	                $y,
	                
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
	    public function save_payments($value='')
	    {
	    	$d_id = $_POST['id'];
	    	$amount = $_POST['data']['amount'];
	    	$cr_dr = $_POST['data']['cr_dr'];
	    	$reason = $_POST['data']['reason'];
	    	$exp = $_POST['data']['exp'];
	    	// $code = $this->drivers_model->ofc_exp_code();
	    	// var_dump($code);
	    	$insert['ledger_id'] = $d_id;
	    	if($cr_dr == 'cr') {
	    		$insert['cr'] = 'cr';
	    	}else{
	    		$insert['dr'] = 'dr';
	    	}
	    	$insert['detail'] = $reason;
	    	$insert['exp_id'] = $exp;
	    	$insert['amount'] = $amount;
	    	$insert['ledgerCode'] = $amount;
	    	$this->db->insert('staff_ledger',$insert);
	    	$insert1['ledger_id'] = 1;
	    	if($cr_dr == 'cr') {
	    		$insert1['dr'] = 'dr';
	    	}else{
	    		$insert1['cr'] = 'cr';
	    	}
	    	$insert1['detail'] = $reason;
	    	$insert1['exp_id'] = $exp;
	    	$insert1['amount'] = $amount;
	    	$insert1['ledgerCode'] = $amount;
	    	$x = $this->db->insert('staff_ledger',$insert1);
	    	if($x){
	    		echo "1";
	    	}

	    }
	    public function save_bonus($value='')
	    {
	    	// var_dump($_SESSION['lr_u_id']);die();
	    	$d_id = $_POST['id'];
	    	$amount = $_POST['data']['bonus_amount'];
	    	$reason = $_POST['data']['bonus_reason'];
	    	
	    	$insert['reason'] = $reason;
	    	$insert['amount'] = $amount;
	    	$insert['created_by'] = $_SESSION['userroles']['lr_u_id'];
	    	$insert['sid'] = $d_id;
	    	$x = $this->db->insert('staff_bonus',$insert);
	    	if($x){
	    		echo "1";
	    	}

	    }
	    public function staff_trip_table()
		{
			$draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));
	        
	        $searchquery = '';
	        $start_date= $_POST['start_date'];
	        $end_date= $_POST['end_date'];
	        $tracking= $_POST['t_trackingcode'];
	        $customer = $_POST['t_customer_id'];
	        $driver = $_POST['t_driver'];
	        $t_vechicle= $_POST['v_id'];

	        $this->db->select('t.t_id,t.t_customer_id,t.t_driver, t.t_start_date, t.t_end_date, t.t_totaldistance, t.t_trip_amount, t.t_exp_amount, t.t_trackingcode, c.c_name, d.d_name, v.v_name');
	        $this->db->from('trips as t');
	        $this->db->join('customers as c', 'c.c_id = t.t_customer_id', 'left');
	        $this->db->join('drivers as d', 'd.d_id = t.t_driver', 'left');
	        $this->db->join('vehicles as v', 'v.v_id = t.t_vechicle', 'left');
	        if(isset($tracking) && !empty($tracking)){
	            $this->db->where("t.t_trackingcode = '$tracking'");
	        }else{
	        if(isset($start_date) && isset($end_date)){
	        $start_date = date('Y-m-d', strtotime($start_date));
	        $end_date = date('Y-m-d', strtotime($end_date));
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
	        $this->db->order_by("t_id", "desc");
	        $query = $this->db->get()->result(); 
	        
	        $data = [];
	        $sr=1;
	        $total_trip_amount = 0;

	        foreach($query as $r) {
	            $action = '<a target="_blank" class="icon" href="'.base_url().'trips/invoice/'.$r->t_id.'">
	                            <i class="fa fa-eye"></i>
	                            </a> ';
	            $data[] = array(
	                $sr++,
	                $r->d_name,
	                $r->c_name,
	                $r->t_trackingcode,
	                $r->v_name,
	                $r->t_trip_amount,
	                $action
	            );
	            $total_trip_amount += $r->t_trip_amount;
	        }
	    	$footer = array(
		        'Total Trip Amount', 
		        '',
		        '',
		        '',
		        '',
		        $total_trip_amount, 
		        ''
		    );
		    array_push($data, $footer);
	        $result = array(
	            "draw" => $draw,
	            "recordsTotal" => count($query),
	            "recordsFiltered" => count($query),
	            "data" => $data
	        );
	    
	        echo json_encode($result);
	        exit();
		}
		public function bonus_table()
		{
			$draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));
	        
	        $searchquery = '';
	        $start_date= $_POST['start_date'];
	        $end_date= $_POST['end_date'];
	        $sid= $_POST['sid'];

	        $this->db->select('*');
	        $this->db->from('staff_bonus');
	        

	        if(isset($start_date) && isset($end_date)){
	        $start_date = date('Y-m-d', strtotime($start_date)). ' 00:00:00';
	        $end_date = date('Y-m-d', strtotime($end_date)). ' 23:59:59';
	        $this->db->where("create_at >= '$start_date' AND create_at <= '$end_date'");
	        }
	        $this->db->where("sid = '$sid'");
	        $this->db->order_by("id", "desc");
	        $query = $this->db->get()->result(); 
	        // echo $this->db->last_query();
	        $data = [];
	        $sr=1;
	        $total_trip_amount = 0;

	        foreach($query as $r) {
	            $action = '<a target="_blank" class="icon" href="'.base_url().'trips/invoice/'.$r->t_id.'">
	                            <i class="fa fa-eye"></i>
	                            </a> ';
	            $data[] = array(
	                $sr++,
	                $r->amount,
	                $r->reason,
	                $action
	            );
	            $total_trip_amount += $r->amount;
	        }
	    	$footer = array(
		        'Total Bonus Amount', 
		        '',
		        '',
		        '',
		        '',
		        $total_trip_amount, 
		        ''
		    );
		    array_push($data, $footer);
	        $result = array(
	            "draw" => $draw,
	            "recordsTotal" => count($query),
	            "recordsFiltered" => count($query),
	            "data" => $data
	        );
	    
	        echo json_encode($result);
	        exit();
		}
		 public function save_loan($value='')
	    {
	    	// var_dump($_SESSION['lr_u_id']);die();
	    	$d_id = $_POST['id'];
	    	$amount_in = $_POST['data']['amount_in'];
	    	$amount_out = $_POST['data']['amount_out'];
	    	$reason = $_POST['data']['Ioan_reason'];
	    	
	    	$insert['reason'] = $reason;
	    	$insert['amount_out'] = $amount_out;
	    	$insert['amount_in'] = $amount_in;
	    	$insert['created_by'] = $_SESSION['userroles']['lr_u_id'];
	    	$insert['sid'] = $d_id;
	    	$x = $this->db->insert('staff_loan',$insert);
	    	if($x){
	    		echo "1";
	    	}

	    }
	    public function loan_table()
		{
			$draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));
	        
	        $searchquery = '';
	        $start_date= $_POST['start_date'];
	        $end_date= $_POST['end_date'];
	        $sid= $_POST['sid'];

	        $this->db->select('*');
	        $this->db->from('staff_loan');
	        

	        if(isset($start_date) && isset($end_date)){
	        $start_date = date('Y-m-d', strtotime($start_date)). ' 00:00:00';
	        $end_date = date('Y-m-d', strtotime($end_date)). ' 23:59:59';
	        $this->db->where("create_at >= '$start_date' AND create_at <= '$end_date'");
	        }
	        $this->db->where("sid = '$sid'");
	        $this->db->order_by("id", "desc");
	        $query = $this->db->get()->result(); 
	        // echo $this->db->last_query();
	        $data = [];
	        $sr=1;
	        $total_trip_amount = 0;

	        foreach($query as $r) {
	            $action = '<a target="_blank" class="icon" href="'.base_url().'trips/invoice/'.$r->t_id.'">
	                            <i class="fa fa-eye"></i>
	                            </a> ';
	            $data[] = array(
	                $sr++,
	                $r->amount_in,
	                $r->amount_out,
	                $r->reason,
	                $action
	            );
	            $total_trip_amount += $r->amount;
	        }
	    	$footer = array(
		        'Total Bonus Amount', 
		        '',
		        '',
		        '',
		        '',
		        $total_trip_amount, 
		        ''
		    );
		    array_push($data, $footer);
	        $result = array(
	            "draw" => $draw,
	            "recordsTotal" => count($query),
	            "recordsFiltered" => count($query),
	            "data" => $data
	        );
	    
	        echo json_encode($result);
	        exit();
		}

	}
