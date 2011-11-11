<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_manage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('session','pagination'));
		$this->load->model(array('muser_manage')); 
		session_start();
	}
	
	 function index() {
		echo 'Chào mừng bạn đến với trang quản lý Users';
		$data['user_info'] = $this->muser_manage->get_all_users();
		$this->load->view('user_manage/user_manage_tpl',$data);
	}

		
	function user_delete(){
		$id = $this->uri->segment(4);
		$this->muser_manage->delete_user_by_id($id);
		redirect('admin/user_manage','refresh');
	}

	
	function user_add(){
		echo "Chào mừng bạn đã đến trang thêm user!";
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$email = $this->input->post('email');
			
			// Add thong tin len database 
			$this->muser_manage->user_add_to_database($username, $password, $email);
			
			redirect('admin/user_manage','refresh');
		} else {
			$this->load->view('user_manage/user_add_tpl');
		}
		
	}
	
	
	function user_edit(){
		$id = $this->uri->segment(4);
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$this->muser_manage->edit_user_by_id($id);
			redirect('admin/user_manage','refresh');
		} else {
			$data['old_user'] = $this->muser_manage->get_one_user_by_id($id);
			$this->load->view('user_manage/user_edit_tpl',$data);
		}
	}

	
	
}// End class
