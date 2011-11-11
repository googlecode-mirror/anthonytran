<html>
<head>
	<title>Welcome you to Tonynews.com | Album Edit form</title>
	<script type="text/javascript" src="<?php echo base_url();?>public/admin_2/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/admin_2/js/admin_2.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/admin_2/css/admin_2.css" />
</head>

<body>
	<div id = "light_tab" class = "white_content"></div>
	<div id = "fade_tab" class = "black_overlay"></div>
	<h4>WELCOME TO Tonynews.com - GALLERY </h4>
	<p><a href="<?php echo base_url();?>tony_admin">Back Home</a></p>
	<p><a href="<?php echo base_url();?>admin_2/images_manage/add">Add More Gallery</a></p>
	<div id = "edit_gallery">
		<table width="50%" border="1">
			<tr>
				<th>Name Of Album</th>
				<th>Amount (images)</th>
				<th>DELETE</th>
				<th>EDIT</th>
			</tr>
			<?php foreach ($album_info as $k => $v) { ?>
				<tr align="center">
					<td><?php echo $v->name;?></td>
					<td><?php echo $v->amount_images;?></td>
					<td><a href="<?php echo base_url();?>admin_2/images_manage/delete_album/<?php echo $v->name_ascii;?>" onclick = "return confirm('are you sure wanna delete this ?'); ">delete</a></td>
					<td><a href="javascript:void(0)" onclick="open_form('<?php echo base_url();?>admin_2/images_manage/edit_album/<?php echo $v->name_ascii;?>');">edit</a></td>
				</tr>
			<?php }?>
		</table>
	</div>
</body>
</html>