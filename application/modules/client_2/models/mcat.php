<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MCat extends CI_Model {
	
	var $table = "categories";
	public function __construct(){
		parent::__construct();
	}
	
	function index() {
		die('hello models');
	}

	
	function get_tree_cat($parent_id = 0, $tree = NULL){
		if(!isset($tree)){$tree = array();}
		
		
		$res_parents = $this->db->select('id,name,name_ascii,longdesc,shortdesc,parent_id,articles_amount') // Get all parents
						->where('parent_id',$parent_id)
						->order_by('id','ASC')
						->get($this->table)
						->result();
		
		foreach ($res_parents as $k_p => $v_p) { // Loops all parents and push them into an array named "$tree" :D.
			array_push($tree, $v_p);
			
			$res_children = $this->db->select('id,name,name_ascii,longdesc,shortdesc,parent_id,articles_amount') // Get all children those have parent_id equal to parents id :D
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
	
	
	function get_id_by_name_ascii($name_ascii){
		$res = $this->db->select('id')
						->where('name_ascii',$name_ascii)
						->get($this->table)
						->row_array();
		return $res;
	}
	


			
}// End - MHome class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */