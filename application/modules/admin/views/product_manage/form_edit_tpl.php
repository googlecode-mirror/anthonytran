<html>
<head>
	<title>Anthony first project</title>
</head>

<body>
	<h1>EDIT FORM</h1>
	
	<form action="<?php echo base_url();?>admin/product_manage/edit/<?php echo $one['id'];?>" method = "post" >
		Name: <input type="text" name="name" value="<?php echo $one['name'];?>" /><br>
		Image: <input type="text" name="image" value="<?php echo $one['image'];?>" /><br>
		Thumbnail:<input type="text" name="thumbnail" value="<?php echo $one['thumbnail'];?>" /><br>
		<input type="submit" name="submit" value="Edit" />
	</form>
</body>
</html>