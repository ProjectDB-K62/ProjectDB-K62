<?php 
/**
  * 
  */
 class Order extends MY_Controller
 {	
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model');
		$this->load->model('Detail_model');
		$this->load->model('Product_model');
	}
	public function index()
	{
		$total = 0;
		$this->data['total'] = $total;
		$list = $this->Order_model->get_list();
		$this->data['list'] = $list;
		$detail = $this->Detail_model->get_list();
		$this->data['detail'] = $detail;
		$product = $this->Product_model->get_list();
		$this->data['product'] = $product;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/order/index';	
		$this->load->view('admin/main', $this->data);
	}
	public function delete()
	{
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$input = array();
		$input['where'] = array('order_id' => $id);
		$info = $this->Order_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại đơn hàng');
			redirect('http://localhost/projectdatabase/index.php/admin/order/index');
		}
		$this->Order_model->delete($id);
		$this->Detail_model->del_rule($input['where']);
		$this->session->set_flashdata('message', 'đã xử lí đơn hàng');
		redirect('http://localhost/projectdatabase/index.php/admin/order/index');
	}
 } 
 ?>