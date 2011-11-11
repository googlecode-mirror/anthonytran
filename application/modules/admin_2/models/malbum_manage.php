<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MAlbum_manage extends CI_Model {
	
	var $table = "album";
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','link'));
	}
	
	
	
	function index() {
		die('hello models');
	}

	
	function add_album_info($folder_name,$count){
		$alb = array 	(
							'name'            =>    $folder_name,
							'name_ascii'      =>    ascii_link($folder_name),
							'amount_images'   =>    $count
						);
		$this->db->insert($this->table, $alb);
	}
	
	
	
	function update_album_info($name_ascii, $count){
		$arr = array(
						'amount_images' => $count
					);
		$this->db->where('name_ascii', $name_ascii)
				 ->update($this->table, $arr);
	}
	
	
	
	function get_album(){
		$res = $this->db->get($this->table)
						->result();
		return $res;
	}
	
	
	function get_album_info_by_name($name_ascii){
		$res = $this->db->where('name_ascii', $name_ascii)
						->get($this->table)
						->row_array();
		return $res;
	}
	
	
	
	function get_album_name_by_id($album_id){
		$res = $this->db->select('name_ascii,name')
						->where('id', $album_id)
						->get($this->table)
						->row_array();
		return $res;
	}
	
	
	
	function delete_album_by_name_ascii($name_ascii){
		$this->db->where('name_ascii', $name_ascii)
				->delete($this->table);
		return true;
	}
	
	
	function get_album_name($name_ascci){
		$res = $this->db->select('name')
						->where('name_ascii',$name_ascci)
						->get($this->table)
						->row_array();
		return $res;
	}
	
	
	
	function decrease_amount_images_by_name($name, $count){
		$arr = array(
						'amount_images' => $count - 1
					);
		
		$this->db->where('name', $name)
				 ->update($this->table, $arr);
	}
	
	
}// End - MHome class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */