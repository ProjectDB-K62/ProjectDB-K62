<?php 
	class Catalog extends MY_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Catalog_model');
		}
		//lay ra danh sach san pham
		public function index()
		{
			$list = $this->Catalog_model->get_list();
			$this->data['list'] = $list;
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			$this->data['temp'] = 'admin/catalog/index';	
			$this->load->view('admin/main', $this->data);
		}
		public function add()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');
			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Tên danh mục', 'required');	
				if($this->form_validation->run()){
					$name     = $this->input->post('name');

					$data = array(
					'cata_name' => $name
					);

					if($this->Catalog_model->create($data)){
						$this->session->set_flashdata('message', 'Thêm thành công');
					}else{
						$this->session->set_flashdata('message', 'Thêm thất bại');
					}
					redirect('http://localhost/projectdatabase/index.php/admin/catalog/index');
				
				}
			}
			$this->data['temp'] = 'admin/catalog/add';
			$this->load->view('admin/main', $this->data);
		}

		//sửa đổi danh mục
		public function edit()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');

			$id = $this->uri->rsegment('3');
			$id = intval($id);
			$info = $this->Catalog_model->get_info($id);


			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại catalog');
				redirect('http://localhost/projectdatabase/index.php/admin/catalog/index');
			}

			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Tên danh mục', 'required');

				if($this->form_validation->run()){
					$name     = $this->input->post('name');

					$data = array(
					'cata_name' => $name
					);
					if($this->Catalog_model->update($id, $data)){
						$this->session->set_flashdata('message', 'Cập nhật thành công');
					}else{
						$this->session->set_flashdata('message', 'Cập nhật thất bại');
					}
					redirect('http://localhost/projectdatabase/index.php/admin/catalog/index');
				
				}
			}
			$this->data['info'] = $info;
			$this->data['temp'] = 'admin/catalog/edit';
			$this->load->view('admin/main', $this->data);
		}

		public function delete()
		{
			$id = $this->uri->rsegment('3');
			$id = intval($id);
			$info = $this->Catalog_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại catalog');
				redirect('http://localhost/projectdatabase/index.php/admin/catalog/index');
			}
			$this->Catalog_model->delete($id);
			$this->session->set_flashdata('message', 'xóa thành công');
			redirect('http://localhost/projectdatabase/index.php/admin/catalog/index');
		}
	}
 ?>
