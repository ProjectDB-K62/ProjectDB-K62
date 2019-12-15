<?php 
	/**
	 * 
	 */
	class Feedback extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Feedback_model');
		}
		public function index()
		{
			$list = $this->Feedback_model->get_list();
			$this->data['list'] = $list;
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			$this->data['temp'] = 'admin/feedback/index';	
			$this->load->view('admin/main', $this->data);
		}
		public function delete()
		{
			$id = $this->uri->rsegment('3');
			$id = intval($id);
			$info = $this->Feedback_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại feedback');
				redirect('http://localhost/projectdatabase/index.php/admin/feedback/index');
			}
			$this->Feedback_model->delete($id);
			$this->session->set_flashdata('message', 'xóa thành công');
			redirect('http://localhost/projectdatabase/index.php/admin/feedback/index');
		}
	}
 ?>