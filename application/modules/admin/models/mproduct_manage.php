<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MProduct_manage extends CI_Model {
	var $table = "products";
	public function __construct(){
		parent::__construct();
	}
	
	function index() {
		die('hello mproduct_manage models');
	}
	
	
	/*------------------------------------------------------
	 * Start - login() truy van username va pass trong DB
	 * -----------------------------------------------------*/
	function get_all_products() {
		
		$result = $this->db	->select('id,name,image,thumbnail')
							->where('status', 'active')
							->order_by('name','ASC')
							->get($this->table)->result();
		return $result;


	}
	/*------------------------------------------------------
	* End - login()
	* ----------------------------------------------------*/
	
	
	
	function delete_product_by_id($id){
		
		
		$result = $this->db	->where('id',$id)
							->where('status', 'active')
							->delete($this->table);

		return $result;
	}
	
	
	
	function add(){
		// lay du lieu tu form chuyen sang. Rui gan vao mang $data
		$data = array	(
			                 'name'      => $this->input->post('name'),
			                 'image'     => $this->input->post('image'),
			                 'thumbnail' => $this->input->post('thumbnail')
							);
		$re = $this->db->insert($this->table, $data);
		
	}
	
	function edit_product_by_id($id){
		$arr = array (
		                 'name'      => $this->input->post('name'),
		                 'image'     => $this->input->post('image'),
		                 'thumbnail' => $this->input->post('thumbnail')
					  );
		$result = $this->db->where('id',$id)
						   ->update($this->table,$arr);
		
		return $result;
	}
	
	function get_one_product_by_id($id){
		$result = $this->db	->select('id,name,image,thumbnail')
							->where('status', 'active')
							->where('id',$id)
							->order_by('name','ASC')
							->limit(1)
							->get($this->table)->row_array();
		return $result;
	}
	
	
	function get_product_for_paging($offset){
		$result = $this->db	->select('id,name,image,thumbnail')
							->where('status', 'active')
							->order_by('id','ASC')
							->limit(5, $offset)
							->get($this->table)->result();
		return $result;
	}
	
	
	
	function count_number_of_product(){
		$result = $this->db->count_all($this->table);
		return $result;
	}

}// End - MHatran class
