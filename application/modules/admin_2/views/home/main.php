<html>
<head>
	<title>Welcome you to Tonynews.com</title>
</head>

<body>
	<h1>WELCOME TO Tonynews.com | Categories Management!</h1>
	<p><a href="<?php echo base_url();?>tony_admin/articles_management">Articles Management</a></p>
	<p><a href="<?php echo base_url();?>tony_admin/album_management">Album Management</a></p>
	<div id = "tree" >
		<?php for($i=0; $i<=$total_rows; $i++) {?>
			<ul>
				<?php if( $tree[$i]->parent_id == 0){echo $tree[$i]->name." (".$count[$i].")";}else{ ?>
				<li><?php echo $tree[$i]->name." (".$count[$i].")";?></li>
				<?php }?>
			</ul>
		<?php } ?>
	</div>
	
	<div id = "info_form">
		<p><a href="<?php echo base_url();?>admin_2/home/add">Add new</a></p>
	</div>
	
	<div id = "delete-form">
		<p><a href="<?php echo base_url();?>admin_2/home/delete">Delete</a></p>
	</div>
	
	<div id = "edit_form">
		<p><a href="<?php echo base_url();?>admin_2/home/edit">Edit</a></p>
	</div>
</body>
</html>