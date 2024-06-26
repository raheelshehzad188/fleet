<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
   
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}


	public function websitesetting()   
	{
		$data['website_setting'] = $this->db->select('*')->from('settings')->get()->result_array();
		$this->template->template_render('websitesetting',$data);
	}
	public function websitesetting_save()   
	{

		$insertarray = $this->input->post();
		$testxss = xssclean($this->input->post());
		if($testxss){
			 $success=true;
			if(!empty($_FILES['file']['name'])) { 
			    $data = array(); 
				    $image = time().'-'.$_FILES['file']['name']; 
					$config = array(
							'upload_path' => 'assets/uploads', 
							'allowed_types' =>'jpg|jpeg|png',
							'overwrite' => TRUE,
							'max_size' => "1024",   
							'max_height' => "250",
							'max_width' => "50",
							'file_name' => $image
						);
				    	$this->load->library('upload',$config); 
				   		if($this->upload->do_upload('file')){ 
						     $uploadData = $this->upload->data(); 
						     $insertarray['s_logo'] = $uploadData['file_name'];
					    } else { 
					    	 $success=false;
					    	 $msg = $this->upload->display_errors();
					    } 
			}

			if($success) {
			     $ws = $this->db->select('*')->from('settings')->get()->num_rows();
			     if($ws=='' || $ws==0) {
			     	$this->db->insert('settings',$insertarray); 
			     } else {
			     	$this->db->update('settings',$insertarray);
			     }
			     $success=true;
			     $msg = 'successfully uploaded '; 
				$this->session->set_flashdata('successmessage', 'Setting saved successfully!.');
				redirect('settings/websitesetting');
			} else {
				$this->session->set_flashdata('warningmessage', $msg);
				redirect('settings/websitesetting');
			}
			
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('settings/websitesetting');
		}
	}
	public function logodelete()   
	{
		$updatearray = array('s_logo'=>'');
		$this->db->update('settings', $updatearray);
		echo true;
	}
	public function smtpconfig()   
	{
		$data['smtpconfig'] = $this->db->select('*')->from('settings_smtp')->get()->result_array();
		$this->template->template_render('smtpconfig',$data);
	}
	public function smtpconfigsave()   
	{
		$settings_smtp = $this->db->select('*')->from('settings_smtp')->get()->num_rows();
        if($settings_smtp =='' || $settings_smtp ==0) {
     		$response = $this->db->insert('settings_smtp',$this->input->post()); 
        } else {
     	  	$response = $this->db->update('settings_smtp',$this->input->post());
        }
        if($response) {
				$this->session->set_flashdata('successmessage', 'SMTP config saved successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		}
		redirect('settings/smtpconfig');
	}
	public function smtpconfigtestemail()   
	{
		$this->load->model('email_model');
		$email = $this->input->post('testemailto');
		$response = $this->email_model->sendemail($email,'SMTP Config Test','Test Email');
		if($response=='true') {
			$this->session->set_flashdata('successmessage', 'Email sent successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', $response);
		}
		redirect('settings/smtpconfig');
	}
	public function email_template()   
	{
		$data['emailtemplate'] = $this->db->select('*')->from('email_template')->get()->result_array();
		$this->template->template_render('email_template',$data);
	}
	public function edit_email_template()   
	{
		$et_id = $this->uri->segment(3);
		$data['emailtemplate'] = $this->db->select('*')->from('email_template')->where('et_id',$et_id)->get()->result_array();
		$this->template->template_render('email_template_edit',$data);
	}
	public function update_template() { 
		$this->db->where('et_id',$this->input->post('et_id'));
		$response = $this->db->update('email_template',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Template updated successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		}
		redirect('settings/email_template');
	}
	public function websitesetting_traccar()   
	{
		$data['website_setting'] = $this->db->select('*')->from('settings')->get()->result_array();
		$this->template->template_render('websitesetting_traccar',$data);
	}
	public function type_staff()   
	{
		$data['type_staff'] = $this->db->select('*')->from('type_staff')->get()->result_array();
		$this->template->template_render('type_staff',$data);
	}
	public function crud($tbl,$act= '',$id = 0)   
	{
	    
		
		$data = array();
		$tables=$this->db->query("SHOW TABLES LIKE '".$tbl."'")->row();
		
		if($tables)
		{
			$data['detail'] = $detail = $this->db->where('tbl',$tbl)->get('crud_detail')->row_array();
        	if ($act == 'add') {
    // Check if the form has an image input field
    if(isset($_FILES['exp_img']) && $_FILES['exp_img']['error'] !== UPLOAD_ERR_NO_FILE) {
        $config['upload_path'] = "./assets/exp_type"; // Directory path to upload images
        $config['allowed_types'] = 'gif|jpg|png'; // Allowed file types
        $config['max_size'] = 1024; // Maximum size in kilobytes (1MB)
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('exp_img')) {
            // File uploaded successfully
            $upload_data = $this->upload->data();
            $image_path = 'assets/exp_type/' . $upload_data['file_name'];
            $form_data = $this->input->post();
            $form_data['exp_img'] = $image_path;
        } else {
            // File upload failed
            $image_path = ''; // Set image path to empty string
        }
    } else {
            $form_data = $this->input->post();
    }


    // Perform database insertion
    $response = $this->db->insert($tbl, $form_data);

    if ($response) {
        // Success message and redirection
        $this->session->set_flashdata('successmessage', $detail['single'] . ' added successfully.');
        redirect('settings/crud/' . $tbl);
    } else {
        // Handle database insertion failure
        $this->session->set_flashdata('warningmessage', 'Something went wrong. Please try again.');
        redirect('settings/crud/' . $tbl);
    }
}



		else if($act == 'edit')
		{
			$data['staff_update_data'] = $this->db->where($detail['key'], $id)->get($tbl)->row_array();
		    
		    $data['staff_update_data']['staff_update_id'] = $id;
		    
		    $this->session->set_flashdata('staff_update_data', $data['staff_update_data']);
		    
		    redirect('settings/crud/'.$tbl);
		}
		else if($act == 'update')
		{
			$this->db->where($detail['key'], $id);
	        $response = $this->db->update($tbl, $_POST);
				if($response) {
					$this->session->set_flashdata('successmessage', $detail['single'].' Updated successfully..');
				    redirect('settings/crud/'.$tbl);
				} 
				else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('settings/crud/'.$tbl);
				}
		}
		else if($act == 'delete')
		{
			$this->db->where($detail['key'], $id);
	        $response = $this->db->delete($tbl);
				if($response) {
					$this->session->set_flashdata('successmessage', $detail['single'].' Deleted successfully..');
				    redirect('settings/crud/'.$tbl);
				} 
				else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('settings/crud/'.$tbl);
				}
		}
		else
		{
			$data['type_staff'] = $this->db->select('*')->from($tbl)->get()->result_array();
			$data['type_companies'] = $this->db->select('*')->from('tyre_companies')->get()->result_array();
			
			$this->template->template_render($tbl,$data);
		}
		}
		else
		{
			$this->template->template_render('404',$data);
		}

	}
	public function traccarconfigsave()   
	{
		$response = $this->db->update('settings',$this->input->post());
        if($response) {
				$this->session->set_flashdata('successmessage', 'Traccar settings saved successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		}
		redirect('settings/websitesetting_traccar');
	}
}
 