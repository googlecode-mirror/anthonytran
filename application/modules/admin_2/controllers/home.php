<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','link'));
		$this->load->library(array('session'));
		$this->load->model(array('mhome','marticles_manage'));
		session_start();
	}
	
	public function index() {
		$data['total_rows'] 		= 		$this->mhome->count_all_records_in_cat_table();
		$data['tree'] 				= 		$this->mhome->get_tree_cat();
		for($i=0;$i<=$data['total_rows'];$i++){
			$data['count'][$i] = $this->marticles_manage->count_articles_by_its_cat($data['tree'][$i]->id);
		}
		
		$this->load->view('home/main',$data);
	}
	
	
	function add(){
		echo "Welcome you to ADD FORM.";
		$data['total_parents'] 		= 		$this->mhome->count_all_parents_in_cat_table();
		$data['parent_info'] 		= 		$this->mhome->get_all_parent();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$action = $this->input->post('action');
			if($action == 'parent_type'){
				$this->mhome->add_new_parent();
				redirect('tony_admin','refresh');
			} else {
				for($i=0; $i<= $data['total_parents']; $i++) {
					if ($action == $data['parent_info'][$i]->name) {
							$this->mhome->add_new_child($data['parent_info'][$i]->id);
							redirect('tony_admin','refresh');
					}
				}
				
		   }
		} else {
			$this->load->view('home/add_tpl',$data);
		}
	}
	
	
	function delete(){
		echo "Welcome you to DELETE FORM.";
		$data['total_rows'] 			= 		$this->mhome->count_all_records_in_cat_table();
		$data['show_all_rows'] 			= 		$this->mhome->get_tree_cat();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$delete = $this->input->post('delete');
			for($i=0; $i<= $data['total_rows']; $i++ ){
				if($delete == $data['show_all_rows'][$i]->name){
					if($data['show_all_rows'][$i]->parent_id == 0){
						$this->mhome->delete_all_children_of_each_parent($data['show_all_rows'][$i]->id); // delete all children.
						$this->mhome->delete_one_parent($data['show_all_rows'][$i]->id); // final is that delete parent :D
						redirect('tony_admin','refresh');
					} else {
						$this->mhome->delete_one_child($data['show_all_rows'][$i]->id);// Delete one child
						redirect('tony_admin','refresh');
					}
			
				}
			}
		}
		$this->load->view('home/delete_tpl',$data);
	}
	
	
	function edit(){
		echo "Welcome you to EDIT FORM.";
		$data['total_rows'] 			= 		$this->mhome->count_all_records_in_cat_table();
		$data['show_all_rows'] 			= 		$this->mhome->get_tree_cat();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$edit = $this->input->post('edit');
			for($i=0; $i<= $data['total_rows']; $i++){
				if($edit == $data['show_all_rows'][$i]->name){
					$this->mhome->edit_cat_by_id($data['show_all_rows'][$i]->id);
					redirect('tony_admin','refresh');
				}
			}
		}
		$this->load->view('home/edit_tpl',$data);
	}

	
} // End class
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */