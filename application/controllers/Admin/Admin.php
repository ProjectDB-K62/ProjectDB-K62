<?php 
	class Admin extends MY_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin_model');
			$this->load->model('Product_model');
			$this->load->model('Order_model');
		}


		//trang chu quan tri
		public function index()
		{
			
			$totala = $this->Admin_model->get_total();
			$totalp = $this->Product_model->get_total();
			$totalo = $this->Order_model->get_total();
			$this->data['totala'] = $totala;
			$this->data['totalp'] = $totalp;
			$this->data['totalo'] = $totalo;
			$this->data['temp'] = 'admin/home/index';	
			$this->load->view('admin/main', $this->data);
		}


		//danh sach user
		public function user()
		{
			$input = array();
			$list = $this->Admin_model->get_list($input);
			$this->data['list'] = $list;
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			$this->data['temp'] = 'admin/admin/index';
			$this->load->view('admin/main', $this->data);

		}


		//xem tai khoan da ton tai hay chua
		public function check_username()
		{
			$username = $this->input->post('username');
			$where = array('username' => $username);
			if($this->Admin_model->check_exits($where)){
				$this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
				return false;
			}
			return true;
		}


		/*them moi quan tri vien*/
		public function add()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');
			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Họ & Tên', 'required');
				$this->form_validation->set_rules('username', 'User name', 'required|callback_check_username');
				$this->form_validation->set_rules('gmail', 'Gmail', 'required');
				$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
				
				if($this->form_validation->run()){
					$name     = $this->input->post('name');
					$username = $this->input->post('username');
					$gmail    = $this->input->post('gmail');
					$password = $this->input->post('password');

					$data = array(
					'name' => $name,
					'username' => $username,
					'gmail' => $gmail,
					'password' => md5($password)
					);

					if($this->Admin_model->create($data)){
						$this->session->set_flashdata('message', 'Thêm thành công');
					}else{
						$this->session->set_flashdata('message', 'Thêm thất bại');
					}
					redirect('http://localhost/projectdatabase/index.php/admin/admin/user');
				
				}
			}
			$this->data['temp'] = 'admin/admin/add';
			$this->load->view('admin/main', $this->data);
		}

		//sua thong tin dang nhap
		public function edit()
		{
			$id = $this->uri->rsegment('3');
			$id = intval($id);

			$this->load->library('form_validation');
			$this->load->helper('form');

			$info = $this->Admin_model->get_info($id);


			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
				redirect('http://localhost/projectdatabase/index.php/admin/admin/user');
			}

			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Họ & Tên', 'required');
				$this->form_validation->set_rules('username', 'User name', 'required|callback_check_username');
				$this->form_validation->set_rules('gmail', 'Gmail', 'required');
				$password = $this->input->post('password');
				if($password){
					$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
					$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
				}

				if($this->form_validation->run()){
					$name     = $this->input->post('name');
					$username = $this->input->post('username');
					$gmail    = $this->input->post('gmail');

					$data = array(
					'name' => $name,
					'username' => $username,
					'gmail' => $gmail
					);
					if($password){
						$data['password'] = md5($password);
					}

					if($this->Admin_model->update($id, $data)){
						$this->session->set_flashdata('message', 'Cập nhật thành công');
					}else{
						$this->session->set_flashdata('message', 'Cập nhật thất bại');
					}
					redirect('http://localhost/projectdatabase/index.php/admin/admin/user');
				
				}
			}
			$this->data['info'] = $info;
			$this->data['temp'] = 'admin/admin/edit';
			$this->load->view('admin/main', $this->data);
		}

		public function delete()
		{
			$id = $this->uri->rsegment('3');
			$id = intval($id);
			$info = $this->Admin_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
				redirect('http://localhost/projectdatabase/index.php/admin/admin/user');
			}else{
				$data = array();
				$this->data['info'] = $info;
				if($this->Admin_model->delete($id)){
						$this->session->set_flashdata('message', 'Xóa thành công');
					}else{
						$this->session->set_flashdata('message', 'Xóa thất bại');
					}
					redirect('http://localhost/projectdatabase/index.php/admin/admin/user');
			}
			$this->data['temp'] = 'admin/admin/delete';
			$this->load->view('admin/main', $this->data);
		}
		public function logout()
		{
			if($this->session->userdata('login')){
				$this->session->unset_userdata('login');
			}
			redirect('http://localhost/projectdatabase/index.php/admin/login');
		}
	}
 ?>