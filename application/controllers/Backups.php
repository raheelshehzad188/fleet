<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backups extends CI_Controller {

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
		
		$data['userlist'] = $this->db->select('*')->from('backup')->get()->result_array();
		$this->template->template_render('backups',$data);
	}

	public function download($fileName) {
		$this->load->helper('download');
 
        $backupFolder = FCPATH . 'backup/';

        $filePath = $backupFolder . $fileName;


        if (file_exists($filePath)) {
 
            force_download($filePath, NULL);
        } else {

            show_error('File not found', 404);
        }
		

	}


	public function backup()
	{
		$this->load->dbutil();

$prefs = array(     
'format'      => 'zip',             
'filename'    => 'my_db_backup.sql'
);


$backup =& $this->dbutil->backup($prefs); 

$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
$save = 'backup/'.$db_name;

$this->load->helper('file');
write_file($save, $backup); 
$data = array(
'backup' => $db_name,
);

$this->db->insert('backup', $data);

// $this->load->helper('download');
// force_download($db_name, $backup);
		redirect('backups');
	}

	
}
