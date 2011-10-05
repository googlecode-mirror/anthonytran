<html>
<head>
	<title>Welcome you to Tonynews.com | Add articles form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script  type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
	
</head>

<body>
	<h1>WELCOME TO Tonynews.com - ADD ARTICLES FORM</h1>
	<p><a href="<?php echo base_url();?>tony_admin/articles_management">Back Articles Home</a></p>
	<div id = "add_articles_form" >
		<form action = "<?php echo base_url();?>admin_2/articles_manage/add_articles" method = "post" enctype="multipart/form-data">
			
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
			Name : <input type ="text" value="" name = "name_art" /><br>
			Files Upload : <input type="file" value="" name ="userfile" size="20" /><br>
			Content : <textarea id="editor1" name="editor1"></textarea>
			<script type="text/javascript">
				CKEDITOR.replace('editor1');
			</script>
			<br>
			<input type = "submit" value="Add" name="add" />
		</form>
		
	</div>
</body>
</html>