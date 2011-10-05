<html>
<head>
	<title>Welcome you to Tonynews.com | Album Edit form</title>
	<script type="text/javascript" src="<?php echo base_url();?>public/admin_2/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/admin_2/js/admin_2.js"></script>
</head>

<body>
	<h1>WELCOME TO Tonynews.com - ALBUM EDIT FORM</h1>
	<p><a href="<?php echo base_url();?>admin_2/images_manage">Back Main Gallery</a></p>
	
	
		<form action="<?php echo base_url();?>admin_2/images_manage/edit_album/<?php echo $name_ascii;?>" method = "post" enctype="multipart/form-data" >
			<div id = "edit_album">
				<ul>
						<li style="font-size: 20px; color: blue;">Album Name: <?php echo $album_info['name'];?></li>
					<?php foreach ($images_info as $k => $v) { ?>
						<li>Name: <input type="text"  name="img_name[]" value="<?php echo $v->name;?>" />  <input type="file" value = "" name="images[]" size="10" /> <img src="<?php echo base_url();?>uploads/<?php echo $album_info['name']."/".$v->images;?>" width="150" height="100" />   <a href ="<?php echo base_url();?>admin_2/images_manage/delete_one_image/<?php echo $v->id;?>" onclick="return confirm('Are u sure ?');">delete this !</a></li>
					<?php }?>
						<li id ="add_more"><a href = "javascript:void(0)" onclick = "add_more_image();">Add More Images</a></li>
						<li><input type = "submit" name="submit" value="Save" /></li>
				</ul>
			</div>
		</form>
	
</body>
</html>