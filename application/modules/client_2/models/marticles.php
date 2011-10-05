<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MArticles extends CI_Model {
	
	var $table = "articles";
	public function __construct(){
		parent::__construct();
	}
	
	function index() {
		die('hello models');
	}
	
	
	function get_data_for_home_main(){
		$res = $this->db->select('id,name,name_ascii,images,longdesc,shortdesc,content')
						->where('status','active')
						->where('onhome','yes')
						->get($this->table)
						->result_array();
		return $res;
	}
	
	
	function get_content_has_matched_segment($position){
		$res = $this->db->select('id,name,name_ascii,images,longdesc,shortdesc,content')
						->where('status','active')
						->where('onhome','yes')
						->where('name_ascii',$position)
						->get($this->table)
						->row_array();
		return $res;
	}
	
	function get_articles_by_categories($id){
		$res = $this->db->select('id,name,name_ascii,images,longdesc,shortdesc,content')
						->where('status','active')
						->where('onhome','yes')
						->like('categories',"|".$id."|")
						->get($this->table)
						->result_array();
		return $res;
	}
	
	function get_product_for_paging($offset){
		$res = $this->db->select('id,name,images')
						->where('status', 'active')
						->order_by('id','ASC')
						->limit(5, $offset)
						->get($this->table)
						->result();
	return $res;
	}
	
	
	
	function count_number_of_product(){
		$res = $this->db->count_all($this->table);
		return $res;
	}
	
	
	
			
}// End - MArticles class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */