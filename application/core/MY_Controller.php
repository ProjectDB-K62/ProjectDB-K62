<?php 
	Class MY_Controller extends CI_Controller{
		public $data = array();
		public	function __construct()
		{
			parent::__construct();
			$controller = $this->uri->segment(1);
			switch ($controller) {
				case 'admin':{
					$this->load->helper('admin');
					$this->_check_login();
					break;
				}
				default:
					# code...
					break;
			}
		}
		private function _check_login(){
			$controller = $this->uri->rsegment('1');
			$controller = strtolower($controller);
			$login = $this->session->userdata('login');
			//neu chua login, ma truy cap trang admin khac
			if(!$login && $controller != 'login'){
				redirect('http://localhost/projectdatabase/index.php/admin/login');
			}
			if($login && $controller == 'login'){
				redirect('http://localhost/projectdatabase/index.php/admin/admin');
			}
		}
	}
 ?>