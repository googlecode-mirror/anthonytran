<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles_manage extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->helper(array('url','form','link'));
		$this->load->library(array('session','upload'));
		$this->load->model(array('marticles_manage','mhome'));
		session_start();
	}
	
	
	
	public function index() {
		$data['show_arti'] 				= 		$this->marticles_manage->get_all_articles();
		$this->load->view('articles_manage/articles_main_tpl',$data);
	}
	
	
	
	
	function add_articles(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			
			move_uploaded_file($_FILES["userfile"]["tmp_name"],// upload file 
			      "./uploads/" . $_FILES["userfile"]["name"]);
			
			$categories 				= 		$this->input->post('categories');
			$count 						= 		count($categories); // start - function increase value for articles_amount.
			for($i=0; $i<$count; $i++){
				$this->mhome->add_articles_amount_by_cat($categories[$i]);
			}// end - function increase value for articles_amount.
			
			$cat_id 					= 		implode('|',$categories); // $categories is an array.
			$this->marticles_manage->add_new_art($cat_id);
			redirect('tony_admin/articles_management','refresh');
		}

		$data['cat_info'] 				= 		$this->mhome->get_tree_cat();
		$data['total_rows'] 			= 		$this->mhome->count_all_records_in_cat_table();
		$data['size'] 					=		$this->mhome->count_all_records_in_cat_table() + 1; // Plus 1 to make total records to be itself :D.
		
		$this->load->view('articles_manage/articles_add_tpl',$data);
	}
	
	
	
	
	function delete_articles($id = 0){
		$data 							=		$this->marticles_manage->get_categories_field_by_art_id($id); // start - function decrease value of articles_amount.
		$categories_id 					= 		explode("|",$data['categories']);
		$count 							= 		count($categories_id);
		for($i=1; $i<=$count-2; $i++){
			$this->mhome->delete_articles_amount_by_id($categories_id[$i]);
		}// end - function decrease value of articles_amount.
		
		$this->marticles_manage->delete_one_art_by_id($id);
		redirect('tony_admin/articles_management','refresh');
	}
	
	
	
	
	function edit_articles($id = 0){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			move_uploaded_file($_FILES["userfile_edit"]["tmp_name"],
			      "./uploads/" . $_FILES["userfile_edit"]["name"]);
			
			$categories          		=      	$this->input->post('categories');
			$count_new           		=      	count($categories);
			$changing            		=      	$this->marticles_manage->get_one_article_by_id($id);
			$categories_old      		=      	explode("|", $changing['categories']);
			$count_old           		=      	count($categories_old) - 2;
			
			foreach($categories_old as $k => $v){ // decrease amount categories where the article belong to.
				if(!(in_array($v, $categories))){
					$this->mhome->delete_articles_amount_by_id($v);
				}
			}
			
			foreach($categories as $k_new => $v_new){  // incease amount categories where the article belong to.
				if(!(in_array($v_new, $categories_old))){
					$this->mhome->add_articles_amount_by_cat($v_new);
				}
			}
			
			
			$cat_id              		=      	implode('|',$categories);
			$this->marticles_manage->edit_article_by_id($id,$cat_id);
			redirect('tony_admin/articles_management','refresh');
		}
		$cat                     		=      	$this->marticles_manage->get_one_article_by_id($id);
		$data['selected'] 				= 		explode('|',$cat['categories'] ); // Return 'selected' in form.
		$data['number_of_categories']	=		count($data['selected']) - 2 ;

		$data['cat_info'] 				= 		$this->mhome->get_tree_cat();
		$data['total_rows'] 			= 		$this->mhome->count_all_records_in_cat_table();
	
		$data['pay_back'] 				= 		$this->marticles_manage->get_one_article_by_id($id);
		$this->load->view('articles_manage/articles_edit_tpl',$data);
	}
	
	
	
	function search(){
		
		if(!$this->input->post('search')){
			redirect('tony_admin/articles_management','refresh');
		} else {
			$data['search_results'] 	= 		$this->marticles_manage->search();
			$this->load->view('articles_manage/search_results_tpl',$data);
		}
		
	}
	


	
} // End class
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */