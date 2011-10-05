<html>
<head>
	<title>Welcome you to Tonynews.com | Delete form</title>
</head>

<body>
	<h1>WELCOME TO Tonynews.com - DELETE FORM</h1>
	<p><a href="<?php echo base_url();?>tony_admin">Back Home</a></p>
	<b>Choose one category you wanna delete.</b>
	<div id = "delete_form" >
		<form action = "<?php echo base_url();?>admin_2/home/delete" method = "post">
			<select name = "delete">
				<?php for($i=0; $i<= $total_rows; $i++){?>
					<?php if($show_all_rows[$i]->parent_id == 0) {?>
						<option value="<?php echo $show_all_rows[$i]->name;?>"><?php echo $show_all_rows[$i]->name;?></option>
					<?php } else {?>
					<option value="<?php echo $show_all_rows[$i]->name;?>">---<?php echo $show_all_rows[$i]->name;?></option>
					<?php }?>
				<?php }?>
			</select>
			<br><br>
			<input type="submit" value="Delete" name="_delete" />
		</form>
	</div>
</body>
</html>