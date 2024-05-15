<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('user_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['userlist'] = $this->user_model->getall_user();
		$this->template->template_render('user_management',$data);
	}
	public function adduser()
	{
		$this->template->template_render('user_add');
	}
	public function insertuser() 
{
    if(isset($_POST)){
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; 
        $this->load->library('upload', $config); 
        
       
        if($this->upload->do_upload('file')){ 
            $uploadData = $this->upload->data();
            $file_name = $uploadData['file_name'];
        } else {
           
            $error = array(
                'error' => $this->upload->display_errors()
            );
            echo json_encode($error);
            exit();
        }

        // Include the file name in the user data
        $user_data = $this->input->post();
        $user_data['basic']['file'] = $file_name;

        // Add user with file information
        $response = $this->user_model->add_user($user_data);
        if($response) {
            $this->session->set_flashdata('successmessage', 'New user added successfully..');
        } else {
            $this->session->set_flashdata('warningmessage', 'Error in creating new user..');
        }
        redirect('users');
    } else {
        $this->session->set_flashdata('warningmessage', 'Error! Your input is not allowed. Please try again');
        redirect('users');
    }
}

	public function edituser()
	{
		$u_id = $this->uri->segment(3);
		$data['userdetails'] = $this->user_model->get_userdetails($u_id);
		$this->template->template_render('user_add',$data);
	}

public function updateuser() { 
    if(isset($_POST)){
        $user_data = $this->input->post();
        $user_id = $user_data['basic']['u_id'];

        if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
            $config['upload_path'] = 'assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; 
            $this->load->library('upload', $config); 

            if($this->upload->do_upload('file')){ 
                $uploadData = $this->upload->data();
                $file_name = $uploadData['file_name'];
                $user_data['basic']['file'] = $file_name;
            } else {
                
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                echo json_encode($error);
                exit();
            }
        }

       
        $response = $this->user_model->update_user($user_data);
        if($response) {
            $this->session->set_flashdata('successmessage', 'User details updated successfully..');
        } else {
            $this->session->set_flashdata('warningmessage', 'Error in updating user details..');
        }
        redirect('users');
    } else {
        $this->session->set_flashdata('warningmessage', 'Error! Your input is not allowed. Please try again');
        redirect('users');
    }
}

}
