<html>
<head>
	<title>Welcome you to Tonynews.com | Add form</title>
</head>

<body>
	<h1>WELCOME TO Tonynews.com - ADD FORM</h1>
	<p><a href="<?php echo base_url();?>tony_admin">Back Home</a></p>
	<div id = "add_form" >
		Choose type you need to add:
		<form action ="<?php echo base_url();?>admin_2/home/add" method ="post" >
			<select  name="action">
					<option value="parent_type">Add parent</option>
				<?php for($i=0; $i <= $total_parents; $i++) { ?>
					<option value="<?php echo $parent_info[$i]->name;?>">--<?php echo $parent_info[$i]->name;?></option>
				<?php } ?>
			</select>
			<br><br>
			Name: <input type="text" value="" name="name" />
			<input type="submit" name="add" value="Add" />
		</form>
	</div>
</body>
</html>