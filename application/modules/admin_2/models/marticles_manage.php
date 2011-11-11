<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MArticles_manage extends CI_Model {
	
	var $table = "articles";
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','link'));
	}
	
	
	
	function index() {
		die('hello models');
	}
	
	
	
	function add_new_art($cat_id){
		$arr = array(	
						'content' => $this->input->post('editor1'),
						'name' => $this->input->post('name_art'),
						'name_ascii' => ascii_link($this->input->post('name_art')),
						'categories' => "|".$cat_id."|",
						'images' => $_FILES['userfile']['name']
					);
		$this->db->insert($this->table,$arr);
	}
	
	
	
	function get_all_articles(){
		$res = $this->db->select('id,name,name_ascii,categories')->where('status','active')->get($this->table)->result_array();
		return $res;
	}
	
	
	
	function delete_one_art_by_id($id){
		$res = $this->db->where('id',$id)->delete($this->table);
		return $res;
	}
	
	
	
	function get_one_article_by_id($id){
		$res = $this->db->select('id,name,images,name_ascii,content,categories')
						->where('status','active')
						->where('id',$id)
						->get($this->table)
						->row_array();
		return $res;
	}
	
	
	
	function get_categories_field_by_art_id($id){
		$res = $this->db->select('id,categories')->where('id',$id)->get($this->table)->row_array();
		return $res;
	}
	
	
	
	function edit_article_by_id($id,$cat_id){
		$arr = array (
						'name' => $this->input->post('name_edit'),
						'categories' => "|".$cat_id."|",
						'content' => $this->input->post('editor1'),
						'name_ascii' => ascii_link($this->input->post('name_edit')),
						'images' => $_FILES['userfile_edit']['name']
					 );
		$result = $this->db->where('id',$id)->update($this->table,$arr);
		return $result;
	}
	
	
	
	
	function search(){
		$res = $this->db->select('id,name,images,categories,name_ascii,content')->like('name',$this->input->post('search'))->or_like('name_ascii',$this->input->post('search'))->get($this->table)->result_array();
		return $res;
	}
	
	
	
	function count_articles_by_its_cat($categories_id){
		$res = $this->db->like('categories',"|".$categories_id."|")->count_all_results($this->table);
		return $res;
	}

}// End - MHome class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */