<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tony extends CI_Controller {

	public function index() {
		die('vao index');
		$this->load->view('home');
	}
	
	function kingfish() {
		die('vao kingfish');
		$this->load->view('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */