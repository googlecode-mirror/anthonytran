<html>
<head>
	<title>Welcome you to Tonynews.com | Edit form</title>
</head>

<body>
	<h1>WELCOME TO Tonynews.com - EDIT FORM</h1>
	<p><a href="<?php echo base_url();?>tony_admin">Back Home</a></p>
	<div id = "edit_form">
		<b>Choose one cat you wanna edit.</b>
		<form action = "<?php echo base_url();?>admin_2/home/edit" method = "post">
			<select name = "edit">
				<?php for($i=0; $i<= $total_rows ; $i++){ ?>
					<?php if($show_all_rows[$i]->parent_id == 0) {?>
						<option value="<?php echo $show_all_rows[$i]->name;?>"><?php echo $show_all_rows[$i]->name;?></option>
					<?php } else { ?>
						<option value="<?php echo $show_all_rows[$i]->name;?>">---<?php echo $show_all_rows[$i]->name;?></option>
					<?php }?>
				<?php } ?>
			</select>
		<br><br>	
		<input type="text" value="" name="cat_name" /><b> New name</b><br><br>
		<input type="submit" value="Edit" name="_edit" />	
		</form>
	</div>
</body>
</html>