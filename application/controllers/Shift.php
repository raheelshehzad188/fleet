<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {

	 function __construct()
     {
         header("Access-Control-Allow-Origin: *");
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }
        
        public function logout() {
        $id = (isset($_SESSION['shift_user_id']) ? $_SESSION['shift_user_id'] : '');
        $track_id = (isset($_SESSION['track']) ? $_SESSION['track'] : '');
    if (!empty($id)) {
        
        unset($_SESSION['track']);
        echo "logout";
        

    }
}

    
public function login() {
    
    header("Access-Control-Allow-Origin: *");
    $ret = array(
        'status' => 0,
        'msg' => 'invalid request'
    );

    $entityBody = file_get_contents('php://input');
    $data = json_decode($entityBody, true);

    $uname = $data['uname'];
    $upass = $data['upass'];
    $pass = md5($upass);

    $this->db->select('*');
    $this->db->from('login');
    // $this->db->where('u_username', $uname);
    $this->db->where('u_email', $uname);
    $this->db->where('u_password', $pass);
    $this->db->where('u_type', 1);
    $query = $this->db->get();
    // echo $this->db->last_query();
    // die();
    // Check if user exists
    if ($query->num_rows() > 0) {
        
        $result = $query->row_array(); // Use row_array() to get a single row as an associative array
        $_SESSION['shift_user_id'] = $result['u_id'];
         
        // Fetch data from shift_log if user ID is obtained and logout_time is null
        $this->db->select('*');
        $this->db->from('shift_log');
        $this->db->where('uid', $result['u_id']);
        $this->db->where('logout_time IS NULL'); // Add condition for logout_time being null
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
        
            // Data found in shift_log
            $shift_log_data = $query->result_array();
            $_SESSION['track'] = $shift_log_data[0]['track'];

            $ret = array(
                'status' => 3,
                'data' => array(
                    'user' => $result,
                    'shift_log' => $shift_log_data
                )
            );
        } else {
            // No data found in shift_log
            $ret = array(
                'status' => 1,
                'data' => array(
                    'user' => $result,
                    'shift_log' => null
                )
            );
        }
    } else {
        // User does not exist
        $ret = array(
            'status' => 0,
            'msg' => 'invalid details'
        );
    }

    echo json_encode($ret);
    exit();
}
 public function expense_page(){
     $exp_id = $_REQUEST['st_id'];
     echo $exp_id;
 }
 public function manage_cash() {
    header('Access-Control-Allow-Origin: *');
    
    // Get the request body
    $entityBody = file_get_contents('php://input');
    $data_array = json_decode($entityBody, true);
    
    // Check if session track variable is set
    $track = isset($_SESSION['track']) ? $_SESSION['track'] : 'null';
    
    // Prepare data for insertion
    $data = array(
        'type' => $data_array['type'],
        'amount' => $data_array['amount'],
        'reason' => $data_array['reason'],
        'track' => $track,
        
    );
    
    // Insert data into the database
    $query = $this->db->insert('shift_cash', $data);
    
    // Check if the query was successful
    if ($query) {
        // Data inserted successfully
        echo "success";
    } else {
        // Error occurred while inserting data
        echo "error: " . json_encode($this->db->error()); // Provide error details
    }
}

 
 
 public function expense_detail(){
     
    header('Access-Control-Allow-Origin: *');
    $entityBody = file_get_contents('php://input');
     
    $track = (isset($_SESSION['track']) ? $_SESSION['track'] : 'null' );
    $data = json_decode($entityBody,true);
    $data['track'] = $track;
    if($data['exp_id'] == 23)
    {
        $shift = $this->db->where('track',$track)->get('shift_log')->row();
        //insert in loan table
        $in = array(
            'sid'=> $data['staff_id'],
            'amount_out'=> $data['amount'],
            'amount_in'=> 0,
            'reason'=> $data['reason'],
            'created_by'=> (isset($shift->uid)?$shift->uid:0),
        );
        $r = $this->db->insert('staff_loan',$in);
        var_dump($r);
    }
        $query = $this->db->insert('exp_detail' , $data);
        if($query){
            echo "success";
        }
        
    
 }
    public function detail(){
        
        


        //drivers
        $track = $_SESSION['track'];
        $shift_log = $this->db->where('track',$track)->get('shift_log')->row();

        $ledger = array();
        $cblc = 0;
        if($shift_log->open_blc)
        {
            $cblc = $shift_log->open_blc;
            $ledger[] = array(
                'name'=> 'Opening balence',
                'type'=> 'add',
                'amount'=> $shift_log->open_blc,
            );
        }
        //cashin 
        $this->db->select_sum('amount');
$this->db->from('shift_cash');
$this->db->where('type',1);
$this->db->where('track',$track);
$cin = $this->db->get()->row();
if(isset($cin->amount) && $cin->amount)
{
    $cblc = $cblc + $cin->amount;
}
$this->db->from('shift_cash');
$this->db->where('type',1);
$this->db->where('track',$track);
$all = $this->db->get()->result();
foreach ($all as $key => $value) {
    $ledger[] = array(
                'name'=> $value->reason,
                'type'=> 'add',
                'amount'=> $value->amount,
            );
}

        //cashout
        $this->db->select_sum('amount');
$this->db->from('shift_cash');
$this->db->where('type',2);
$this->db->where('track',$track);
$cot = $this->db->get()->row();

if(isset($cot->amount) && $cot->amount)
{
    $cblc = $cblc - $cot->amount;
}
$this->db->from('shift_cash');
$this->db->where('type',2);
$this->db->where('track',$track);
$all = $this->db->get()->result();
foreach ($all as $key => $value) {
    $ledger[] = array(
                'name'=> $value->reason,
                'type'=> 'add',
                'amount'=> $value->amount,
            );
}

        $this->db->select('*');
        $this->db->from('drivers');
        $query = $this->db->get();
        $office_exp = $query->result_array();
        $data = [];
        foreach($office_exp as $value){
            $data[] = $value;

        }
        $this->db->select('*');
        $this->db->from('ofc_exp');
        $query = $this->db->get();
        $office_exp = $query->result_array();
        $data = [];
        foreach($office_exp as $value){
            $data[] = $value;
            $this->db->select_sum('amount');
$this->db->from('exp_detail');
$this->db->where('exp_id',$value['st_id']);
$this->db->where('track',$track);
$cot = $this->db->get()->row();
if(isset($cot->amount) && $cot->amount)
{
    $cblc = $cblc - $cot->amount;
    $ledger[] = array(
                'name'=> $value['type_name'],
                'type'=> 'minus',
                'amount'=> $cot->amount,
            );
}

        }
        $exp = $data;
        $r = array('cblc'=>$cblc,'ledger'=>$ledger,'ofc_exp'=>$exp,'staff_list'=>$data);
            echo json_encode($r);
    }
	public function closeShift($track){
        $shift_log = $this->db->where('track',$track)->get('shift_log')->row();

        $ledger = array();
        $cblc = 0;
        if($shift_log->open_blc)
        {
            $cblc = $shift_log->open_blc;
            $ledger[] = array(
                'name'=> 'Opening balence',
                'type'=> 'add',
                'amount'=> $shift_log->open_blc,
            );
        }
        //cashin 
        $this->db->select_sum('amount');
$this->db->from('shift_cash');
$this->db->where('type',1);
$this->db->where('track',$track);
$cin = $this->db->get()->row();
if(isset($cin->amount) && $cin->amount)
{
    $cblc = $cblc + $cin->amount;
    $ledger[] = array(
                'name'=> 'CASH IN',
                'type'=> 'add',
                'amount'=> $cin->amount,
            );
}

        //cashout
        $this->db->select_sum('amount');
$this->db->from('shift_cash');
$this->db->where('type',2);
$this->db->where('track',$track);
$cot = $this->db->get()->row();

if(isset($cot->amount) && $cot->amount)
{
    $cblc = $cblc - $cot->amount;
    $ledger[] = array(
                'name'=> 'CASH OUT',
                'type'=> 'minus',
                'amount'=> $cot->amount,
            );
}

        $this->db->select('*');
        $this->db->from('drivers');
        $query = $this->db->get();
        $office_exp = $query->result_array();
        $data = [];
        foreach($office_exp as $value){
            $data[] = $value;

        }
        $this->db->select('*');
        $this->db->from('ofc_exp');
        $query = $this->db->get();
        $office_exp = $query->result_array();
        $data = [];
        foreach($office_exp as $value){
            $data[] = $value;
            $this->db->select_sum('amount');
$this->db->from('exp_detail');
$this->db->where('exp_id',$value['st_id']);
$this->db->where('track',$track);
$cot = $this->db->get()->row();
if(isset($cot->amount) && $cot->amount)
{
    $cblc = $cblc - $cot->amount;
    $ledger[] = array(
                'name'=> $value['type_name'],
                'type'=> 'minus',
                'amount'=> $cot->amount,
            );
}

        }
        $exp = $data;
        //$cblc
        $up = array('close_blc'=>$cblc,'logout_time'=>date('Y-m-d H:i:s'));
        $this->db->where('track',$track)->update('shift_log',$up);
    }
    public function shift_log(){
        // $data['tyreCompany'] = $this->tyre_model->getTyreCompany();
        $data = array();
        $this->template->template_render('shift_management',$data);
    }
    public function shift_log_table()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $searchquery = '';
        $start_date= $_POST['start_date'];
        $end_date= $_POST['end_date'];
        $tyre_no= $_POST['tyre_no'];
        $tyre_company = $_POST['tyre_comapny'];

        $this->db->select('shift_log.*, login.u_name as u_name');
        $this->db->from('shift_log');
        $this->db->join('login', 'login.u_id = shift_log.uid', 'left');
        
        if(isset($start_date) && isset($end_date)){
        $start_date = date('Y-m-d', strtotime($start_date)) .' 00:00:00';
        $end_date = date('Y-m-d', strtotime($end_date)) .' 23:59:59';
        $this->db->where("shift_log.login_time >= '$start_date' AND shift_log.login_time <= '$end_date'");
        }

        $this->db->order_by("shift_log.id", "desc");
        $query = $this->db->get()->result(); 
        // echo $this->db->last_query();
        
        $data = [];
        $sr=1;
        $total_trip_amount = 0;

        foreach($query as $r) {
            $action = '';
            if(empty($r->logout_time)){
                $action = '<button class="btn btn-primary closeShift" track="'.$r->track.'">Logout</button>';
            }
            $data[] = array(
                $sr++,
                $r->u_name,
                $r->open_blc,
                $r->close_blc,
                date('Y-m-d H:i:s',strtotime($r->login_time)),
                isset($r->logout_time) ? date('Y-m-d H:i:s',strtotime($r->logout_time)) : '',
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

	public function shift_login(){
	                    
        $entityBody = file_get_contents('php://input');
        $response = json_decode($entityBody, true);
        $oblc = $response['oblc'];
        $track = time();
        $login_time = date('Y-m-d H:i:s');
        $shift_user_id = (isset($_SESSION['shift_user_id']) ? $_SESSION['shift_user_id'] : '');
        $data = [
            
            "open_blc"      => $oblc,
            "track"         => $track,
            "login_time"    => $login_time,
            "uid"           => $shift_user_id,
                
            ];
            
        $query = $this->db->insert('shift_log' , $data);
        if($query){
            $_SESSION['track'] = $track;
            echo "success";
        }

	}
	public function get_details(){
	    die('okk');
	}
	public function index()
	{
		$data['fuel'] = $this->fuel_model->getall_fuel();
		$this->template->template_render('fuel',$data);
	}
	public function addfuel()
	{
		$this->load->model('trips_model');
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('fuel_add',$data);
	}
	public function insertfuel()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_model->add_fuel($this->input->post());
			if($response) {
				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel - '.$this->input->post('v_fuelcomments'),'ie_amount'=>$this->input->post('v_fuelprice'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}
				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('fuel');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel');
		}
	}
	public function editfuel()
	{
		$f_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['fueldetails'] = $this->fuel_model->editfuel($f_id);
		$this->template->template_render('fuel_add',$data);
	}

	public function updatefuel()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_model->updatefuel($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Fuel details updated successfully..');
			    redirect('fuel');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			    redirect('fuel');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel');
		}
	}
	public function deletefuel()
	{
		$v_fuel_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('fuel', array('v_fuel_id' => $v_fuel_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Fuel deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('fuel');
	}
}
