<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_manage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('session','pagination'));
		$this->load->model(array('mhatran','mproduct_manage')); 
		session_start();
	}
	
	 function index() {
		
			echo 'hello vao trong product_manage rui';
			// Dem xem co bao nhieu ban ghi trong table = 'products'. Da test thanh cong rui :D.
			$data['number_rows'] = $this->mproduct_manage->count_number_of_product();
			$offset = $this->uri->segment(4);
			$data['start'] = ( isset($offset) &&  $offset > 0) ? $offset : 0; 
			// Tra ve thong tin cac san pham theo trang. $this->uri->segment(4) chinh la $offset.
			$data['results'] = $this->mproduct_manage->get_product_for_paging($offset);
			
			//$data['tpl_view'] = $this->mproduct_manage->get_all_products();
			
			$this->load->view('product_manage/product_manage_tpl',$data);
		}

		
	function delete($id = 0){
		
		// xoa di ban ghi co id
		$this->mproduct_manage->delete_product_by_id($id);
		
		//load lai
		redirect('admin/product_manage','refresh');
		
	}

	
	function add(){
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			// lay du lieu tu form
			$this->mproduct_manage->add();
			//redirect lai ham index();
			redirect('admin/product_manage','refresh');
		} else {
			$this->load->view('product_manage/form_add_tpl');
		}
		
	}
	
	
	function edit($id = 0){
		if($_SERVER["REQUEST_METHOD"]=="POST"){
				// lay du lieu tu form edit
				$this->mproduct_manage->edit_product_by_id($id);
				//redirect lai ham index();
				redirect('admin/product_manage','refresh');
			} else {
				$data['one'] = $this->mproduct_manage->get_one_product_by_id($id);
				//print_r($data['one']);die('sfdsf');
				$this->load->view('product_manage/form_edit_tpl',$data);
			}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */