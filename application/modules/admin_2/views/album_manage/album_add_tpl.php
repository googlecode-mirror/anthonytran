<html>
<head>
	<title>Welcome you to Tonynews.com | Album Add form</title>
	<script type="text/javascript" src="<?php echo base_url();?>public/admin_2/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/admin_2/js/admin_2.js"></script>
</head>

<body>
	<h1>WELCOME TO Tonynews.com - ALBUM ADD FORM</h1>
	<p><a href="<?php echo base_url();?>admin_2/images_manage">Back Main Gallery</a></p>
	<div id ="album_add">
		<form action = "<?php echo base_url();?>admin_2/images_manage/add" method = "post" enctype="multipart/form-data">
			<div id = "another">
				<ul>
					<li>Album Name: <input type="text" value="" name="album_name" /> </li>
					<li>Name: <input type="text"  name="img_name[]" value="" />  <input type="file" value = "" name="images[]" size="10" /></li>
					<li>Name: <input type="text"  name="img_name[]" value="" />  <input type="file" value = "" name="images[]" size="10" /></li>
					<li>Name: <input type="text"  name="img_name[]" value="" />  <input type="file" value = "" name="images[]" size="10" /></li>
					<li id = "add_more"><a href = "javascript:void(0)" onclick = "add_more_image();">Add more</a></li>
					<li><input type="submit" value="Upload" name="save"/></li>
				</ul>
			</div>
		</form>
	</div>

</body>
</html>