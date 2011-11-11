<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hatran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('session'));
		$this->load->model(array('mhatran')); 
		session_start();
	}
	
	public function index() {
	
			//kiem tra session
		if(!isset($_SESSION['_admin'])){
			//ko - redirect toi login
			redirect('tony_admin/login','refresh');
		} else {
			//co - redirect toi home
			redirect('tony_admin/home','refresh');
		}
			
			

	}
	
	function home(){
		echo "da login thanh cong vao home rui";
		$this->load->view('hatran/home_tpl');
	}
	
	
	
	function login(){

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			
			$r = $this->mhatran->login($user, $pass);
			if(!$r){
				redirect('tony_admin/login','refresh');
			} else {
				redirect('tony_admin/home','refresh');
			}
		}
		
		$this->load->view('hatran/hatran_tpl');
		
	}
	
	
	
	function logout(){
		$this->mhatran->logout();
		redirect('tony_admin/login','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */