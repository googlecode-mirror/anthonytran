<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MUser_manage extends CI_Model {
	var $table = "users";
	public function __construct(){
		parent::__construct();
	}
	
	function index() {
		die('hello mproduct_manage models');
	}
	
	function get_all_users(){
		$res = $this->db->select('id, name, email')
						->where('status','active')
						->order_by('id','ASC')
						->get($this->table)
						->result();
		return $res;
	}
	
	function get_one_user_by_id($id){
		$res = $this->db->select('id,name, email, password')
						->where('id',$id)
						->limit(1)
						->get($this->table)
						->row_array();
		return $res;
	}
	
	
	function user_add_to_database($username, $password, $email){
		$data = array	(
							'name'		=>	$username,
							'password'	=>	$password,
							'email'		=>	$email
						);
		$this->db->insert($this->table,$data);
		return true;
	}
	
	
	function delete_user_by_id($id){
		$this->db->where('id',$id)
				 ->delete($this->table);
		return true;
	}
	
	
	function edit_user_by_id($id){
		$name =  $this->input->post('name');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$data = array	(
							'name' => $name,
							'password' => $password,
							'email' => $email 
						);
		$res = $this->db->where('id',$id)
						->update($this->table,$data);
		return $res;
	}


}// End - MHatran class
