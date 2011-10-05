<html>
<head>
	<title>Anthony first project</title>
</head>

<body>
	<h1>ADD FORM</h1>
	
	<form action="<?php echo base_url();?>admin/product_manage/add" method = "post" name = "login" class ="form_add" >
		Name: <input type="text" name="name" value="" /><br>
		Image: <input type="text" name="image" value="" /><br>
		Thumbnail:<input type="text" name="thumbnail" value="" /><br>
		<input type="submit" name="submit" value="Add" />
	</form>
</body>
</html>