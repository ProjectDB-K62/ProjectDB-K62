<?php 
	class Product extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Product_model');
		}

		public function index()
		{
			$total_rows = $this->Product_model->get_total();
			$this->load->library('pagination');
			$config = array();
			$config['total_rows'] = $total_rows;
			$config['base_url'] = "http://localhost/projectdatabase/index.php/admin/Product/index";
			$config['per_page'] = 9;
			$config['uri_segment'] = 4;
			//khoi tao cau hinh
			$this->pagination->initialize($config);

			$segment = $this->uri->segment(4);
			$segment = intval($segment);

			$input = array();
			$input['limit'] = array($config['per_page'], $segment);
			$list = $this->Product_model->get_list($input);
			$this->data['list'] = $list;
			$message = $this->session->flashdata('message');
			$this->load->model('Catalog_model');
			$catalog = $this->Catalog_model->get_list();
			$this->data['catalog'] = $catalog;
			$this->load->model('Brand_model');
			$brand = $this->Brand_model->get_list();
			$this->data['brand'] = $brand;
			$this->data['message'] = $message;
			$this->data['temp'] = 'admin/product/index';	
			$this->load->view('admin/main', $this->data);
		}

		public function add()
		{
			$this->load->model('Catalog_model');
			$this->load->model('Brand_model');
			$input = array();
			$catalog = $this->Catalog_model->get_list();
			$this->data['catalog'] = $catalog;
			$brand = $this->Brand_model->get_list();
			$this->data['brand'] = $brand;

			$this->load->library('form_validation');
			$this->load->helper('form');
			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Tên sản phẩm', 'required');
				$this->form_validation->set_rules('catalog', 'Danh mục', 'required');	
				$this->form_validation->set_rules('price', 'Giá sản phẩm', 'required');
				if($this->form_validation->run()){
					$name     = $this->input->post('name');
					$catalog_id = $this->input->post('catalog');
					$brand_id = $this->input->post('brand');
					$price    = $this->input->post('price');
					$discount = $this->input->post('discount');

					$this->load->library('upload_library');
                	$upload_path = 'upload/product';
                	$upload_data = $this->upload_library->upload($upload_path, 'image');  
                	$image_link = '';
                	if(isset($upload_data['file_name']))
                	{
                    	$image_link = $upload_data['file_name'];
                	}
                	//upload cac anh kem theo
                	$image_list = array();
                	$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
               		$image_list = json_encode($image_list);



					$data = array(
						'name'       => $name,
                    	'catalog_id' => $catalog_id,
                    	'brand_id' => $brand_id,
                    	'price'      => intval($price),
                    	'image_link' => $image_link,
                    	'image_list' => $image_list,
                    	'discount'   => intval($discount),
						'amount' => $this->input->post('amount'),
						'catalog_id' => $this->input->post('catalog'),
						'description' => $this->input->post('description')
					);

					if($this->Product_model->create($data)){
						$this->session->set_flashdata('message', 'Thêm thành công');
					}else{
						$this->session->set_flashdata('message', 'Thêm thất bại');
					}
					redirect('http://localhost/projectdatabase/index.php/admin/product/index');
				
				}
			}

			$this->data['temp'] = 'admin/product/add';	
			$this->load->view('admin/main', $this->data);
		}
		public function edit()
		{
			$id = $this->uri->rsegment('3');
			$product = $this->Product_model->get_info($id);
			if(!$product){
				$this->session->set_flashdata('message', 'Không tồn tại sản phẩm');
				redirect('http://localhost/projectdatabase/index.php/admin/product/index');

			}
			$this->data['product'] = $product;
			$this->load->model('Catalog_model');
			$this->load->model('Brand_model');
			$input = array();
			$catalog = $this->Catalog_model->get_list();
			$this->data['catalog'] = $catalog;
			$brand = $this->Brand_model->get_list();
			$this->data['brand'] = $brand;
			$this->load->library('form_validation');
			$this->load->helper('form');
			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Tên sản phẩm', 'required');
				$this->form_validation->set_rules('catalog', 'Danh mục', 'required');
				$this->form_validation->set_rules('brand', 'nhãn hiệu', 'required');	
				$this->form_validation->set_rules('price', 'Giá sản phẩm', 'required');
				if($this->form_validation->run()){
					$name     = $this->input->post('name');
					$catalog_id = $this->input->post('catalog');
					$brand_id = $this->input->post('brand');
					$price    = $this->input->post('price');
					$discount = $this->input->post('discount');

					$this->load->library('upload_library');
                	$upload_path = 'upload/product';
                	$upload_data = $this->upload_library->upload($upload_path, 'image');  
                	$image_link = '';
                	if(isset($upload_data['file_name']))
                	{
                    	$image_link = $upload_data['file_name'];
                	}
                	//upload cac anh kem theo
                	$image_list = array();
                	$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
               		$image_list_json = json_encode($image_list);



					$data = array(
						'name'       => $name,
                    	'catalog_id' => $catalog_id,
                    	'brand_id' => $brand_id,
                    	'price'      => intval($price),
                    	'discount'   => intval($discount),
						'amount' => $this->input->post('amount'),
						'catalog_id' => $this->input->post('catalog'),
						'description' => $this->input->post('description')
					);
					if ($image_link != '') {
						$data['image_link'] = $image_link;
					}
					if(!empty($image_list)){
						$data['image_list'] = $image_list_json;
					}

					if($this->Product_model->update($product->id, $data)){
						$this->session->set_flashdata('message', 'Cập nhật thành công');
					}else{
						$this->session->set_flashdata('message', 'Cập nhật thất bại');
					}
					redirect('http://localhost/projectdatabase/index.php/admin/product/index');
				
				}
			}

			$this->data['temp'] = 'admin/product/edit';	
			$this->load->view('admin/main', $this->data);
			
		}
		public function delete()
		{
			$id = $this->uri->rsegment('3');
			$product = $this->Product_model->get_info($id);
			if(!$product){
				$this->session->set_flashdata('message', 'Không tồn tại sản phẩm');
				redirect('http://localhost/projectdatabase/index.php/admin/product/index');

			}
			$this->Product_model->delete($id);
			$image_link = './upload/product/'.$product->image_link;
			if (file_exists($image_link)) {
				unlink($image_link);
			}
			$image_list = json_decode($product->image_list);
			if(is_array($image_list)){
				foreach ($image_list as $img) {
					$image_link = './upload/product/'.$img;
					if (file_exists($image_link)) {
						unlink($image_link);
					}
				}
			}
			$this->session->set_flashdata('message', 'Xóa thành công');
			redirect('http://localhost/projectdatabase/index.php/admin/product/index');
		}
	}
 ?>