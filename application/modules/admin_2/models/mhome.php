<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MHome extends CI_Model {
	
	var $table = "categories";
	public function __construct(){
		parent::__construct();
	}
	
	function index() {
		die('hello models');
	}

	
	function get_tree_cat($parent_id = 0, $tree = NULL){
		if(!isset($tree)){$tree = array();}
		
		
		$res_parents = $this->db->select('id,name,longdesc,name_ascii,shortdesc,parent_id,articles_amount') // Get all parents
								->where('parent_id',$parent_id)
								->order_by('id','ASC')
								->get($this->table)
								->result();
		
		foreach ($res_parents as $k_p => $v_p) { // Loops all parents and push them into an array named "$tree" :D.
			array_push($tree, $v_p);
			
			$res_children = $this->db->select('id,name,longdesc,name_ascii,shortdesc,parent_id,articles_amount') // Get all children those have parent_id equal to parents id :D
									 ->where('parent_id',$v_p->id)
									 ->order_by('id','ASC')
									 ->get($this->table)
									 ->result();
			foreach ($res_children as $k_c => $v_c) { // Loops all children corresponding with their parents and then push them into the array that their parents are placed.
				array_push($tree, $v_c);
			}
		}
		
		return $tree;
		
	}
	
	
	function count_all_records_in_cat_table(){ // Count all rows in table categories.
		$count = $this->db->count_all($this->table) - 1;
		return $count;
	}
	
	
	
	
	function count_all_parents_in_cat_table(){
		$count = $this->db->where('parent_id',0)->count_all_results($this->table) - 1 ;
		return $count;
	}
	
	
	
	function get_all_parent(){
		$res = $this->db->select('id, name,name_ascii, longdesc, shortdesc,parent_id')
						->where('parent_id',0)
						->order_by('id','ASC')
						->get($this->table)
						->result();
		return $res;
	}
	
	
	
	function add_new_parent(){
		$arr = array 	(
							'parent_id' => 0,
							'name' => $this->input->post('name'),
							'name_ascii' => ascii_link($this->input->post('name'))
						);
		$this->db->insert($this->table, $arr);
	}
	
	function add_new_child($parent_id){
		$arr = array	(
							'parent_id' => $parent_id,
							'name' => $this->input->post('name'),
							'name_ascii' => ascii_link($this->input->post('name'))
						);
		$this->db->insert($this->table, $arr);
	}
	
	
	
	
	// Start function increase articles_amount when add one articles
	function add_articles_amount_by_cat($categories_id){
		$this->db->query("UPDATE categories SET articles_amount = articles_amount + 1 WHERE id ='".$categories_id."'");
		return true;
	}
	// End function increase articles_amount when add one articles
	
	
	
	
	// Start function decrease articles_amount when add one articles
	function delete_articles_amount_by_id($categories_id){
		$this->db->query("UPDATE categories SET articles_amount = articles_amount - 1 WHERE id ='".$categories_id."' AND articles_amount > 0");
		return true;
	}
	// Start function decrease articles_amount when add one articles
	
	
	
	
	function  delete_one_parent($id){
		$res = $this->db->where('id', $id)
						->delete($this->table);
		return $res;
	}
	
	
	
	function delete_one_child($id){
		$res = $this->db->where('id',$id)
						->delete($this->table);
		return $res;
	}
	
	
	
	function delete_all_children_of_each_parent($parent_id){
		$res = $this->db->where('parent_id',$parent_id)
						->delete($this->table);
		return $res;
	}
	
	
	
	function edit_cat_by_id($id){
		$arr = array 	(
							'name' => $this->input->post('cat_name')
						);
		$res = $this->db->where('id',$id)
						->update($this->table,$arr);
		return true;
	}
	

			
}// End - MHome class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */