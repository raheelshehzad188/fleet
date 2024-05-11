<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tyres extends CI_Controller {
	function __construct()
    {
          parent::__construct();
          $this->load->database();
          $this->load->model('tyre_model');
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
		$data['tyreslist'] = $this->tyre_model->getall_tyres();
		$data['tyreCompany'] = $this->tyre_model->getTyreCompany();
		$this->template->template_render('tyres_management',$data);
	}

	public function addTyres()
	{
		$data['tyreCompany'] = $this->tyre_model->getTyreCompany();
		$this->template->template_render('tyres_add',$data);
	}
	public function inserttyres()
	{
		$this->form_validation->set_rules('t_number','Tyre Number','required|trim|is_unique[tyre_types.t_number]');
		// if($this->form_validation->run()==TRUE){
			$name =  $this->input->post('t_name');
			$number =  $this->input->post('t_number');
			$company =  $this->input->post('t_comapny');
			$purchasing_date =  $this->input->post('purchasing_date');
			$amount =  $this->input->post('t_price');
			$tyre_run =  $this->input->post('mileage');
			$data = array(
				'tyre_name'=> $name,
				'tyre_number' => $number,
				'company' => $company,
				'purchasing_date' => $purchasing_date,
				'amount' => $amount,
				'tyre_run' => $tyre_run
			);
			$response = $this->db->insert('tyre_types',$data);
			// echo $this->db->last_query();
			// die();
			if($response) {
				$this->session->set_flashdata('successmessage', 'New Tyre added successfully..');
			    redirect('tyres');
			}else	{
			$this->session->set_flashdata('warningmessage',preg_replace( "/\r|\n/", "", trim(str_replace('.',',',strip_tags(validation_errors())))));
			redirect('tyres/addTyres');
		}
		// } 
	}
	
	
		public function assign_tyres_table()
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
     	$tyres_assign = $this->db->select('*')->from('vih_tyre')->where('tid',$t_vechicle)->get()->result_array();
       
       
        $data = [];
        $sr=1;
      

        foreach($tyres_assign as $r) {
            	$vehicle = $this->db->select('*')->from('vehicles')->where('v_id',$r['vid'])->get()->result_array();
            
            	
            $data[] = array(
                $sr++,
                $vehicle[0]['v_name'],
                $vehicle[0]['v_registration_no'],
                $vehicle[0]['v_model'],
                $vehicle[0]['v_chassis_no'],
                $r['assifgnmeter'],
                $r['assign_date'],
                $r['close_meter'],
                $r['close_date'],
                
            );
           
        }
    
	    array_push($data);
        $result = array(
            "draw" => $draw,
            "recordsTotal" => count($query),
            "recordsFiltered" => count($query),
            "data" => $data
        );
    
        echo json_encode($result);
        exit();
	}

	public function edittyres()
	{
		$id = $this->uri->segment(3);
		$data['tyreCompany'] = $this->tyre_model->getTyreCompany();
		$data['tyreDetail'] = $this->tyre_model->gettyrebyId($id);
		$this->template->template_render('tyres_add',$data);
	}

	public function showtyres()
	{
		$id = $this->uri->segment(3);
		$data = ['id' => $id];
		$this->template->template_render('tyres_show' , $data);
	}

	public function updatetyres()
	{
		
	
			$id =  $this->input->post('id');
			$name =  $this->input->post('t_name');
			$number =  $this->input->post('t_number');
			$company =  $this->input->post('t_comapny');
			$purchasing_date =  $this->input->post('purchasing_date');
			$amount =  $this->input->post('t_price');
			$tyre_run =  $this->input->post('mileage');
			$data = array(
				'tyre_name'=> $name,
				'tyre_number' => $number,
				'company' => $company,
				'purchasing_date' => $purchasing_date,
				'amount' => $amount,
				'tyre_run' => $tyre_run
			);
			$this->db->where('id', $id);
			$this->db->update('tyre_types',$data);
			$response = $this->db->affected_rows(); 
			// echo $this->db->last_query();
			// die();
			
				if($response) {
					$this->session->set_flashdata('successmessage', 'Tyre updated successfully..');
				    redirect('tyres');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('tyres');
				}
	}
	public function viewtyres()
	{
		$v_id = $this->uri->segment(3);
		$vehicledetails = $this->tyre_model->gettyrebyId($v_id);
	
		$company = $this->tyre_model->getTyreCompanybyId($vehicledetails[0]['company']);
	
		
		
// 		$fuel = $this->vehicle_model->getfueldetails($v_id);
// 		$vincomexpense = $this->incomexpense_model->getvechicle_incomexpense($v_id);
// 		$geofence_events = $this->geofence_model->countvehiclengeofence_events($v_id);
// 		$customerlist = $this->trips_model->getall_customer();
		if(isset($vehicledetails[0]['id'])) {
			$data['vehicledetails'] = $vehicledetails[0];
			$data['company'] = $company[0];
			
			$data['v_id'] = $v_id ;
			
			$this->template->template_render('tyres_view',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}
	public function tyres_table()
	{
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $searchquery = '';
        $start_date= $_POST['start_date'];
        $end_date= $_POST['end_date'];
        $tyre_no= $_POST['tyre_no'];
        $tyre_company = $_POST['tyre_comapny'];

        $this->db->select('tyre_types.*, tyre_companies.name as company_name');
        $this->db->from('tyre_types');
        $this->db->join('tyre_companies', 'tyre_companies.id = tyre_types.company', 'left');
        
        if(isset($start_date) && isset($end_date)){
        $start_date = date('Y-m-d', strtotime($start_date)) .' 00:00:00';
        $end_date = date('Y-m-d', strtotime($end_date)) .' 23:59:59';
        $this->db->where("tyre_types.purchasing_date >= '$start_date' AND tyre_types.purchasing_date <= '$end_date'");
        }
        if(isset($tyre_no) && !empty($tyre_no)){
        $this->db->where("tyre_types.tyre_number = '$tyre_no'");
        }
        if(isset($tyre_company) && !empty($tyre_company)){
        $this->db->where("tyre_types.company = '$tyre_company'");
        }

        $this->db->order_by("tyre_types.id", "desc");
        $query = $this->db->get()->result(); 
        // echo $this->db->last_query();
        
        $data = [];
        $sr=1;
        $total_trip_amount = 0;

        foreach($query as $r) {
            $action = '<a target="_blank" class="icon" href="'.base_url().'tyres/edittyres/'.$r->id.'">
                            <i class="fa fa-edit"></i>
                            </a> | 
                    
                                    <a class="icon" href="'.base_url().'tyres/viewtyres/'.$r->id.'">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                    ';
            $data[] = array(
                $sr++,
                $r->tyre_number,
                $r->tyre_number,
                $r->company_name,
                $r->purchasing_date,
                $r->tyre_run,
                $r->amount,
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
	    // array_push($data, $footer);
        $result = array(
            "draw" => $draw,
            "recordsTotal" => count($query),
            "recordsFiltered" => count($query),
            "data" => $data
        );
    
        echo json_encode($result);
        exit();
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
}
