<html>
<head>
	<title>Anthony first project</title>
</head>

<body>
	<div id = "header">
		<b style="color: green;">WELCOME :</b> <em style="color: navy;font-style: italic; text-decoration: underline;"><?php echo $_SESSION['username'];?> </em>
		<p><a href = "<?php echo base_url();?>tony_admin/logout">Logout</a></p>
	</div>
	
	<div class="home_tab">
		<p><a href="<?php echo base_url();?>tony_admin/home">Home</a></p>
	</div>
	<div id ="left_tab" class="product-manage">
		<p><a href = "<?php echo base_url();?>admin/product_manage">Quản lý sản phẩm</a></p>
	</div>
	<div id ="user_tab" class="user">
		<p><a href = "<?php echo base_url();?>admin/user_manage">Quản lý người dùng</a></p>
	</div>
</body>
</html>