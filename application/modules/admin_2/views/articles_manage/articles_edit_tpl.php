<html>
<head>
	<title>Welcome you to Tonynews.com | Edit articles form</title>
	<script  type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
	
</head>

<body>
	<h1>WELCOME TO Tonynews.com - EDIT ARTICLES FORM</h1>
	<p><a href="<?php echo base_url();?>tony_admin/articles_management">Back Articles Home</a></p>
	<div id = "edit_articles_form" >
		<form action = "<?php echo base_url();?>admin_2/articles_manage/edit_articles/<?php echo $pay_back['id'];?>" method = "post" enctype="multipart/form-data">
			
			<h4>Choose type of content that it'll belong to.</h4>
			Categories : <select name = "categories[]" MULTIPLE SIZE = 4>
							<?php for($i= 0; $i <= $total_rows; $i++) {?>
								<?php if($cat_info[$i]->parent_id == 0) {?>
									<option value ="<?php echo $cat_info[$i]->id;?>"><?php echo $cat_info[$i]->name;?></option>
								<?php } else { ?>
									<option value ="<?php echo $cat_info[$i]->id;?>">---<?php echo $cat_info[$i]->name;?></option>
								<?php } ?>
							<?php } ?>
						</select><br>
						
			<h4>Type name of article.</h4>
			Name : <input type ="text" value="<?php echo $pay_back['name'];?>" name = "name_edit" /><br>
			Files Upload : <input type="file" value="" name ="userfile_edit" size="20" />
			<div id="photo">
				<img src="<?php echo base_url();?>uploads/<?php echo $pay_back['images'];?>"width="200" height="130" />
			</div>
			<br>
			Content : <textarea id="editor1" name="editor1"><?php echo $pay_back['content'];?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'editor1' );
			</script>
			<br>
			<input type = "submit" value="Edit" name="edit" />
		</form>
		
	</div>
</body>
</html>