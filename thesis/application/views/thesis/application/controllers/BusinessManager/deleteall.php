<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class deleteall extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$check = $this->session->userdata('type');
		if($check == 'BusinessManager'){
			echo "<pre class = 'hidden'>";
				print_r ( $this->session->all_userdata());
				echo "</pre>";
				$_SESSION['logged_in'] = 'True';
		$this->load->model('db_model');
		$data['deleteall']=$this->db_model->getIssuedSupplies();
		//$this->load->view('BusinessManager/php/deleteall', $data);
		if($_SESSION['logged_in'] == 'True')  
      			{  
           			// echo 'dashboard';
           			//$this->load->view('BusinessManager/dashboard');
           			$this->load->view('BusinessManager/php/deleteall', $data);
      			}  
      			else if ($_SESSION['logged_in'] != 'True')  
      			{  
           			// echo "BusinessManager/lockscreen";
           			$this->load->view('BusinessManager/lockscreen');
      			}

	}
		/*$check = $this->session->userdata('stts');
		if($check == 'BusinessManager'){
			$this->load->view('BusinessManager/issued_supplies');
		}else if($check == 'Assistant'){
			$this->load->view('Assistant/issued_supplies');
		}else if($check == 'Supervisor'){
			$this->load->view('Supervisor/issued_supplies');
		}else{
			header('Location: ../login');
		} */
		
	}
}
