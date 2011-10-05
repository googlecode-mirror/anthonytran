<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images_manage extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->helper(array('url','form','link'));
		$this->load->library(array('session','upload'));
		$this->load->model(array('mimages_manage','malbum_manage'));
		session_start();
	}
	
	
	
	public function index() {
		$data['album_info'] = $this->malbum_manage->get_album();
		$this->load->view('album_manage/album_main_tpl',$data);
	}
	
	
	
	function add(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$path = "./uploads/";
			$folder_name = $this->input->post('album_name');
			$img_name = $this->input->post('img_name');
			$filename = "./uploads/".$folder_name;
			if(file_exists($filename) && isset($folder_name)){
				echo"<h1>Folder has already exist!</h1>";
			} else {
				if(!is_dir($path.$folder_name)){  
					mkdir($path.$folder_name);		// Create a folder.
				}
				$count = count($_FILES['images']['name']);
				$this->malbum_manage->add_album_info($folder_name,$count);
				for($i=0; $i< $count; $i++){
					$this->mimages_manage->add_image($folder_name, $img_name[$i], $_FILES["images"]["name"][$i]);
					move_uploaded_file($_FILES["images"]["tmp_name"][$i],"./uploads/".$folder_name."/" . $_FILES["images"]["name"][$i]);
				}
				echo "<h1>Uploading successful</h1>";
				redirect('admin_2/images_manage','refresh');
			}
		}
		$this->load->view('album_manage/album_add_tpl');
	}
	
	
	
	
	function delete_album($name_ascii = ""){
		$name_ascii = $this->uri->segment(4);
		$album_name = $this->malbum_manage->get_album_name($name_ascii);
		$path = "./uploads/".$album_name['name'];
		$this->mimages_manage->remove_directory_by_path($path);
		$this->mimages_manage->delete_images_match_its_album($name_ascii);
		$this->malbum_manage->delete_album_by_name_ascii($name_ascii);
		redirect('admin_2/images_manage','refresh');
	}
	
	
	 
	function edit_album($name_ascii = ""){ // Note: cannot upload file has size more than 2.0 MB.
		$name_ascii = $this->uri->segment(4);
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$img_name =  $this->input->post('img_name');
			$images = $_FILES['images']['name'];
			$size   = $_FILES['images']['size'];

			$id_album = $this->mimages_manage->get_images_info();
			$old_images = $this->mimages_manage->get_images_info();
			$album_name = $this->malbum_manage->get_album_name($name_ascii);
			
			$album_info = $this->malbum_manage->get_album_info_by_name($name_ascii);
			
			$path = "./uploads/".$album_name['name'];
			$count = count($img_name);
			if($count == $album_info['amount_images'] ) {
				for($i=0; $i< $count; $i++){ 
					if($img_name[$i] != ""){ // Edit images in folder has no changing.
						if(($images[$i]) != "" ){
							if($size[$i] > 2097152){
								die('your files size are two large');
							} else {
								$this->mimages_manage->remove_an_image_by_image_path($path."/".$old_images[$i]->images); // Remove the image while the image match image filed is not null.
								move_uploaded_file($_FILES["images"]["tmp_name"][$i],"./uploads/".$album_name['name']."/" . $images[$i]); // Upload new image to replace old image has been just removed.
								$this->mimages_manage->update_image_name($id_album[$i]->id, $images[$i]); // Update new name match images field to database.
							}
						}
						$this->mimages_manage->edit_images_match_their_album($id_album[$i]->id, $img_name[$i]);
					} else {
						die ("Name fields are required.");
					}
				}
			}
			
			if($count > $album_info['amount_images']) {
				for($j = $album_info['amount_images']; $j < $count; $j++ ) {
					$this->malbum_manage->update_album_info($name_ascii, $count);
					$this->mimages_manage->add_image($album_name['name'], $img_name[$j], $images[$j]);  // insert new images into exist table.
					move_uploaded_file($_FILES["images"]["tmp_name"][$j],"./uploads/".$album_name['name']."/" . $images[$j]);// Upload new image to
				}
			
			}
			
			redirect('admin_2/images_manage','refresh');
		}
		$data['name_ascii'] = $name_ascii;
		$data['album_info'] = $this->malbum_manage->get_album_name($name_ascii);
		$data['images_info'] = $this->mimages_manage->get_images_match_their_album($name_ascii);
		$this->load->view('album_manage/album_edit_tpl',$data);
	}
	
	
	function delete_one_image($id =""){ // delete image in edit form.
		$id = $this->uri->segment(4);
		$image_info = $this->mimages_manage->get_images_info_by_id($id); // query from DB.
		$path = "./uploads/".$image_info['album_name']."/".$image_info['images'];
		$path_folder = "./uploads/".$image_info['album_name'];
		//echo $path;die('aaa');
		
		$this->mimages_manage->remove_an_image_by_image_path($path); // Remove image from folder which hold it.
		
		$this->mimages_manage->delete_one_image_by_id($id); // Delete image info from DB
		
		$album_info = $this->malbum_manage->get_album_info_by_name($image_info['album_name_ascii']);
		$count = $album_info['amount_images'];
		if($count > 1) {
			$this->malbum_manage->decrease_amount_images_by_name($image_info['album_name'], $count);
		} else {
			$this->mimages_manage->remove_directory_by_path($path_folder);
			$this->malbum_manage->delete_album_by_name_ascii($image_info['album_name_ascii']);
			redirect('admin_2/images_manage','refresh');
		}
		
		
		redirect('admin_2/images_manage/edit_album/'.$image_info['album_name_ascii'],'refresh');
	}
	
} // End class
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */