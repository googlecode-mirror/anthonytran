<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form','link'));
		$this->load->library(array('session'));
		$this->load->model(array('marticles','mcat'));
		session_start();
	}
	
	public function index() {
		$data['navlist']      =     $this->mcat->get_tree_cat();
		$data['main_data']    =     $this->marticles->get_data_for_home_main();
		$data['tpl_file']     =     "layout/home_main";
		$this->load->view('layout/client_main_tpl',$data);
	}
	
	function contents() {
		$position             =     $this->uri->segment(1);
		$position             =     str_replace('.html','',$position);
		$data['content']      =     $this->marticles->get_content_has_matched_segment($position);
		$data['navlist']      =     $this->mcat->get_tree_cat();
		$data['main_data']    =     $this->marticles->get_data_for_home_main();
		$data['tpl_file']     =     "main_content/main_content";
		$this->load->view('layout/client_main_tpl',$data);
	}
	
	function categories_list($name_ascii = "") {
		//$name_ascii = $this->uri->segment(2);
		$name_ascii = str_replace('.html','',$name_ascii);
		$get_id               =     $this->mcat->get_id_by_name_ascii($name_ascii);
		$data['tab_info']     =     $this->marticles->get_articles_by_categories($get_id['id']);
		$data['navlist']      =     $this->mcat->get_tree_cat();
		$data['name_cat']	  = 	$name_ascii;
		$data['tpl_file']     =     "main_content/main_tab_view";
		$this->load->view('layout/client_main_tpl',$data);
	}
	
	
	function show_one_article() {
		$position             =      $this->uri->segment(1);
		$data['content']      =      $this->marticles->get_content_has_matched_segment($position);
		$data['navlist']      =      $this->mcat->get_tree_cat();
		$data['main_data']    =      $this->marticles->get_data_for_home_main();
		$data['tpl_file']     =      "main_content/main_content";
		$this->load->view('layout/client_main_tpl',$data);
	}
	
	
	function news() {
		$position             =     $this->uri->segment(2);
		$data['content']      =     $this->marticles->get_content_has_matched_segment($position);
		$data['navlist']      =     $this->mcat->get_tree_cat();
		$data['main_data']    =     $this->marticles->get_data_for_home_main();
		$data['tpl_file']     =     "main_content/main_content";
		$this->load->view('layout/client_main_tpl',$data);
	}
} // End class
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */