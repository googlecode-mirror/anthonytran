<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MHatran extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	function index() {
		die('hello models');
	}
	
	
	/*------------------------------------------------------
	 * Start - login() truy van username va pass trong DB
	 * -----------------------------------------------------*/
	function login($user, $pass) {
		$result 						= 		$this->db->select('id,name,password,email')
											 			 ->where('status', 'active')
											 			 ->where('name', $user)
											 			 ->where('password', $pass)
											 			 ->limit(1)->get('users')
											 			 ->row_array();
		
		if(isset($result['id']) && $result['id'] > 0){
			$_SESSION['_admin'] 		= 		$result['id'];
			$_SESSION['username'] 		= 		$result['name']; 
			return true;	
		} else {
			return false;
		}
	}
	/*------------------------------------------------------
	* End - login()
	* ----------------------------------------------------*/
	
	
	
	function logout(){
		unset($_SESSION['_admin']);
		redirect(base_url().'tony_admin');
	}

}// End - MHatran class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */