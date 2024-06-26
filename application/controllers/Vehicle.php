<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle extends CI_Controller {
	function __construct()
    {
          parent::__construct();
          $this->load->database();
          $this->load->model('vehicle_model');
          $this->load->model('incomexpense_model');
          $this->load->model('trips_model');
          $this->load->model('geofence_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
    }
	public function index()
	{
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('vehicle_management',$data);
	}

	public function addvehicle()
	{
		$data['v_group'] = $this->vehicle_model->get_vehiclegroup();
		$data['driver1'] = $this->vehicle_model->getDrivers();
		$data['helper'] = $this->vehicle_model->getHelpers();
		$data['vih_types'] = $this->vehicle_model->vih_types();
		$data['traccar_list'] = json_decode(traccar_call('api/devices','','GET'),true);
		$this->template->template_render('vehicle_add',$data);
	}
	public function insertvehicle()
	{
		$this->form_validation->set_rules('v_registration_no','Registration Number','required|trim|is_unique[vehicles.v_registration_no]');
		$this->form_validation->set_message('is_unique', '%s is already exist');
		$this->form_validation->set_rules('v_model','Model','required|trim');
		$this->form_validation->set_rules('v_chassis_no','Chassis No','required|trim');
        $this->form_validation->set_rules('v_engine_no', 'Engine No', 'required|trim');
		$this->form_validation->set_rules('v_manufactured_by','Manufactured By','required|trim');
		$this->form_validation->set_rules('v_type','Vehicle Type','required|trim');
		$this->form_validation->set_rules('v_color','Vehicle Color','required|trim');
		if($this->form_validation->run()==TRUE){
			$response = $this->vehicle_model->add_vehicle($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New vehicle added successfully..');
			    redirect('vehicle');
			}
		} else	{
			$this->session->set_flashdata('warningmessage',preg_replace( "/\r|\n/", "", trim(str_replace('.',',',strip_tags(validation_errors())))));
			redirect('vehicle/addvehicle');
		}
	}
	public function veh_parts()
	{
		$id = $_POST['gid'];
		$data = $this->vehicle_model->get_vehiclepart($id);
		foreach ($data as $key => $value) {
			echo '<table>
					<thead>
						<tr>
							<th>1</th>
							<th>1</th>
							<th>1</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							
						</tr>
					</tbody>
				  </table>';
		}
		
	}
	public function editvehicle()
	{
		$v_id = $this->uri->segment(3);
		$data['driver1'] = $this->vehicle_model->getDrivers();
		$data['helper'] = $this->vehicle_model->getHelpers();
		$data['v_group'] = $this->vehicle_model->get_vehiclegroup();
		$data['vehicledetails'] = $this->vehicle_model->get_vehicledetails($v_id);

		$data['vih_types'] = $this->vehicle_model->vih_types();
		$data['traccar_list'] = json_decode(traccar_call('api/devices','','GET'),true);
		$this->template->template_render('vehicle_add',$data);
	}

	public function updatevehicle()
	{
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
					$_POST['v_file'] = $uploadData['file_name'];
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
					$_POST['v_file1'] = $uploadData['file_name'];
				}
			} 
		}
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->vehicle_model->edit_vehicle($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'Vehicle updated successfully..');
				    redirect('vehicle');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('vehicle');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('vehicle');
		}
	}
	public function viewvehicle()
	{
		$v_id = $this->uri->segment(3);
		$vehicledetails = $this->vehicle_model->get_vehicledetails($v_id);
		$bookings = $this->vehicle_model->getall_bookings($v_id);
		$vgeofence = $this->geofence_model->getvechicle_geofence($v_id);
		$fuel = $this->vehicle_model->getfueldetails($v_id);
		$vincomexpense = $this->incomexpense_model->getvechicle_incomexpense($v_id);
		$geofence_events = $this->geofence_model->countvehiclengeofence_events($v_id);
		$customerlist = $this->trips_model->getall_customer();
        $maintenance = $this->vehicle_model->get_maintenance();
		if(isset($vehicledetails[0]['v_id'])) {
			$data['vehicledetails'] = $vehicledetails[0];
			$data['bookings'] = $bookings;
			$data['v_id'] = $v_id ;
			$data['vechicle_geofence'] = $vgeofence;
			$data['vechicle_incomexpense'] = $vincomexpense;
			$data['geofence_events'] = $geofence_events;
			$data['fuel'] = $fuel;
			$data['customerlist'] = $customerlist;
            $data['maintenance'] = $maintenance;
			$data['files'] = $this->db->where('sal_type',1)->get('files')->result_array();
			$this->template->template_render('vehicle_view',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}
	public function vehicle_trip_table()
	{
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $searchquery = '';
        $start_date= $_POST['start_date'];
        $end_date= $_POST['end_date'];
        $tracking= $_POST['t_trackingcode'];
        $customer = $_POST['t_customer_id'];
        $driver= $_POST['t_driver'];
        
        $t_vechicle= $_POST['v_id'];

        $this->db->select('t.t_id,t.t_customer_id,t.t_driver, t.t_start_date, t.t_end_date, t.t_totaldistance, t.t_trip_amount, t.t_exp_amount, t.t_trackingcode, c.c_name, d.d_name, v.v_name');
        $this->db->from('trips as t');
        $this->db->join('customers as c', 'c.c_id = t.t_customer_id', 'left');
        $this->db->join('drivers as d', 'd.d_id = t.t_driver', 'left');
        $this->db->join('vehicles as v', 'v.v_id = t.t_vechicle', 'left');
        $this->db->where("t.t_vechicle = '$t_vechicle'");
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
	public function fuel_trip_table()
	{
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $searchquery = '';
        $start_date= $_POST['start_date'];
        $end_date= $_POST['end_date'];
        $tracking= $_POST['t_trackingcode'];
        $customer = $_POST['t_customer_id'];
        $driver= $_POST['t_driver'];
        
        $t_vechicle= $_POST['v_id'];
        $this->db->select('*');
        $this->db->from('tbl_fuel');
        $this->db->join('trips', 'trips.t_id  = tbl_fuel.trip_id', 'left');
        $this->db->join('pumps', 'pumps.id  = tbl_fuel.pump', 'left');
        $this->db->where("trips.t_vechicle = '$t_vechicle'");
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
                $r->name,
                $r->fuel_quantity,
                $r->amount,
                $r->rate,
            );
            $total_trip_amount += $r->amount;
        }
    	$footer = array(
    		'',
	        'Total Fuel', 
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
	}public function expense_trip_table()
	{
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $searchquery = '';
        $start_date= $_POST['start_date'];
        $end_date= $_POST['end_date'];
        $tracking= $_POST['t_trackingcode'];
        $customer = $_POST['t_customer_id'];
        $driver= $_POST['t_driver'];
        
        $t_vechicle= $_POST['v_id'];
        $this->db->select('vih_expense.exp_name,vih_expense.create_at,vih_expense.amount ');
        $this->db->from('vih_expense');
        $this->db->join('trips', 'trips.t_id  = vih_expense.id', 'left');
        $this->db->join('exp_types', 'exp_types.id  = vih_expense.expense_id', 'left');
        $this->db->where("trips.t_vechicle = '$t_vechicle'");
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
                $r->exp_name,
                $r->amount,
                date('Y-m-d',strtotime($r->create_at)),
            );
            $total_trip_amount += $r->amount;
        }
    	$footer = array(
    		'',
	        'Total Expense',
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
public function Tyerstable()
{
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $searchquery = '';
        $t_vechicle= $_POST['v_id'];
        $vih_type= $_POST['vih_type'];
        $this->db->select('tyres_name.tyre_name,tyres_name.id');
        $this->db->from('tyres_name');
        $this->db->join('vehicles', 'tyres_name.vehicle_type  = vehicles.v_type', 'left');
        $this->db->where("vehicles.v_id = '$t_vechicle'");
        $query = $this->db->get()->result(); 
       // echo $this->db->last_query();
        $data = [];
        $sr=1;
 

        foreach($query as $r) {
            
   $this->db->select('*');
    $this->db->from('vih_tyre');
    $this->db->where('vid', $t_vechicle);
    $this->db->where('ttpe_id', $r->id);
    $tyrecheck = $this->db->get();
    
    if ($tyrecheck->num_rows() > 0) {
          $assign = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$r->id .'">
  Change Tyre
</button>';  
    } else {
        $assign = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$r->id .'">
  Assign Tyre
</button>';  
    }
 

         
 
            
            $action = '<a target="_blank" class="icon" href="'.base_url().'trips/invoice/'.$r->t_id.'">
                            <i class="fa fa-eye"></i>
                            </a> ';
                     
            $data[] = array(
                $sr++,
                $r->tyre_name,
                $assign
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
	
	
	public function maintance()
{
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $vid = $_POST['v_id'];
        $searchquery = '';
       $this->db->select('*');
        $this->db->from('maintenance');
        $this->db->where('v_id',$vid);
        $query = $this->db->get()->result_array();
    
        $data = [];
        $sr=1;
 

        foreach($query as $r) {
            $assign = '';
            if($r['status'] == 0){
                $assign = '<button class="btn btn-primary" onclick="update_maintanence('.$r['id'].')">Update</button>';
            }
            if ($r['tyre_type'] == 0) {
                  $type = 'By Date';  
            } else {
                $type = 'By Km';  
            }  
            $data[] = array(
                $sr++,
                $r['tyre_name'],
                $type,
                $assign
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
public function assign_tyres(){
    $vid = $this->input->post('vid');
    $assign_date = $this->input->post('assign_date');
    $tid = $this->input->post('tid');
    $ttpe_id = $this->input->post('ttpe_id');
    $assifgnmeter = $this->input->post('assifgnmeter');
    $close_date = $this->input->post('close_date');
    $close_meter = $this->input->post('close_meter');
    $id = $this->input->post('id');
   
 

    $data = array(
        'vid' => $vid,
        'assign_date' => $assign_date,
        'tid' => $tid,
        'assifgnmeter' => $assifgnmeter,
        'ttpe_id' => $ttpe_id,
        'close_date' => '0',
        'close_meter' => '0'
    );

    if ($id) {
        
        
        
        $this->db->select('*');
$this->db->from('vih_tyre');
$this->db->where('vid', $this->input->post('vid'));
$this->db->where('ttpe_id', $this->input->post('ttpe_id'));
$this->db->where('close_date', '0');
$this->db->where('close_meter', '0');
$tyrecheck = $this->db->get();
$tyre_data = $tyrecheck->result_array(); 


if($tyrecheck->num_rows() > 0){
    if ($close_date && $close_meter) {
        
       $this->db->where('id', $id);
            $this->db->update('vih_tyre', array(
                'close_date' => $close_date,
                'close_meter' => $close_meter,
            ));

            // Insert the second query
            $this->db->insert('vih_tyre', array(
                'assign_date' => $close_date,
                'assifgnmeter' => $close_meter,
                'tid' => $tid,
                'vid' => $this->input->post('vid'),
                'ttpe_id' => $this->input->post('ttpe_id'),
                 'close_date' => '0',
                 'close_meter' => '0'
            ));

             if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('successmessage', 'Tyre Change successfully.');
        }
        }
}




        
    } else {
       
        $this->db->insert('vih_tyre', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('successmessage', 'Tyre assigned successfully.');
        }
    }

    $redirect_url = base_url('vehicle/viewvehicle/' . $vid);
    redirect($redirect_url);
}



	public function vehiclegroup()
	{
		$data['vehiclegroup'] = $this->vehicle_model->get_vehiclegroup();
		$this->template->template_render('vehicle_group',$data);
	}
	public function addvehiclegroup()
	{
		$data['vehiclegroup'] = $this->vehicle_model->get_vehiclegroup();
		$this->template->template_render('add_vehicle_group',$data);
	}
	public function vehiclepart($id)
	{
		$data['vehiclegroup'] = $this->vehicle_model->get_vehiclepart();
		$this->template->template_render('parts_types',$data);
	}
	public function vehiclegroup_delete()
	{
		$gr_id = $this->uri->segment(3);
		$returndata = $this->vehicle_model->vehiclegroup_delete($gr_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Group deleted successfully..');
			redirect('vehicle/vehiclegroup');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! Some vechicle are mapped with this group. Please remove from vechicle management');
		    redirect('vehicle/vehiclegroup');
		}
	}
	public function addgroup()
	{
		$data = array(
			"gr_name" => $this->input->post('gr_name'),
			"gr_desc" => $this->input->post('gr_desc')
		);
		$response = $this->db->insert('vehicle_group',$data);
		$id = $this->db->insert_id();
		// die();
		$parts = $_POST['parts'];
		if($parts && $id)
			{
			
			
			    for($i = 0 ; $i <= count($parts) ;$i++)
			    {
		    		if(!empty($parts['name'][$i]))
		    		{
				        $in = array(
				            'name' => $parts['name'][$i],
				            'description' => $parts['description'][$i],
				            'group_id' => $id,
				            );
				        $r = $this->db->insert('parts_types',$in);
				   }
			    }
			}
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group added successfully..');
		    redirect('vehicle/vehiclegroup');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('vehicle/vehiclegroup');
		}
	}
	public function deletevehicle()
	{
		$v_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('vehicles', array('v_id' => $v_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Vehicle deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('vehicle');
	}
    public function save_maintenance(){
        $v_id = $_POST['vehicle_id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $km = $_POST['km'];
        $date = $_POST['date'];
        $data = array(
            'tyre_name' => $name,
            'v_id' => $v_id,
            'tyre_type' => $type,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('maintenance',$data);
        $in_id  = $this->db->insert_id();
        $data_update = array();
        if($type == 0){
            $data_update = array(
                'date' => date('Y-m-d H:i:s',strtotime($date))
            );
        }else{
            $data_update = array(
                'km' => $km
            );
        }
            $this->db->where('id',$in_id);
            $this->db->update('maintenance',$data_update);
        
        if($in_id){
            echo json_encode($data['success'] = $in_id);
        }else{
            echo json_encode($data['error'] = 'Error');
        }
    }
    public function update_maintenance(){
        $id = $_POST['id'];
        $data_update = array(
            'status' => 1
        );
        $this->db->where('id',$id);
        $this->db->update('maintenance',$data_update);
        echo 'success';
    }
}
