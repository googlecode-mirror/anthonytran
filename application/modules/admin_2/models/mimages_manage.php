<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MImages_manage extends CI_Model {
	
	var $table = "images";
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','link'));
	}
	
	
	
	function index() {
		die('hello models');
	}

	
/* 	function get_images_info(){
		$res = $this->db->get($this->table)->result();
		return $res;
	}
	 */
	
	function get_images_info_by_album_name($name_ascii){
		$res = $this->db->where('album_name_ascii', $name_ascii)
						->get($this->table)->result();
		return $res;
	}
	
	
	
	function add_image($folder_name, $img_name, $images){
		$img = array 	(
							'album_name'             =>    $folder_name,
							'album_name_ascii'       =>    ascii_link($folder_name),
							'name'                   =>    $img_name,
							'images'                 =>    $images
						);
		$this->db->insert($this->table,$img);	
	}
	
	
	
	
	function delete_images_match_its_album($name_ascii){
		$res = $this->db->where('album_name_ascii', $name_ascii)
						->delete($this->table);
		return true;
	}
	
	
	function remove_directory_by_path($path){
		if (is_dir($path)) {
			$objects = scandir($path);// in ra biet ngay "." va ".." la thu muc an mac dinh co san trong folder duoc tao - vai chuong :D, print_r($objects);die('aaaaa');
			$count = count($objects);
			for($i=0; $i< $count; $i++){
				if ($objects[$i] != "." && $objects[$i] != "..") {
						unlink($path."/".$objects[$i]);
				}
			}
			reset($objects);
			rmdir($path);
			return true;
		}
	}
	
	
	
	function remove_an_image_by_image_path($image_path){
		unlink($image_path);
		return true;
	}
	
	
	
	
	
	function get_images_match_their_album($name_ascii){
		$res = $this->db->where('album_name_ascii', $name_ascii)
						->get($this->table)
						->result();
		return $res;
	}
	
	
	
	function edit_images_match_their_album($id_album, $img_name){
		$arr = array(
						'name' => $img_name
					);
		$this->db->where('id',$id_album)
				 ->update($this->table, $arr);
	}
	
	
	
	function update_image_name($id_album, $images){
		$arr = array(
						'images' => $images
					);
		$this->db->where('id', $id_album)
				 ->update($this->table, $arr);
	}
	
	
	
	
	function get_images_info_by_id($id){
		$res = $this->db->where('id', $id)
						->get($this->table)
						->row_array();
		return $res;
	}
	
	
	function delete_one_image_by_id($id){
		$res = $this->db->where('id', $id)
						->delete($this->table);
		return true;
	}
	
	
	
}// End - MHome class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */