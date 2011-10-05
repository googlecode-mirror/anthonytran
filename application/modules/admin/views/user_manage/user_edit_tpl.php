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
		<p><a href="<?php echo base_url();?>tony_admin/home">Back Home</a></p>
	</div>
	<h1>USERS EDIT FORM</h1>
	
	<form action="<?php echo base_url();?>admin/user_manage/user_edit/<?php echo $old_user['id'];?>" method="post" accept-charset="utf-8">
		Name: <input type="text" name="name" value="<?php echo $old_user['name'];?>" /><br>
		Password: <input type="password" name="password" value="<?php echo $old_user['password'];?>" /><br>
		Email:<input type="text" name="email" value="<?php echo $old_user['email'];?>" /><br>
		<input type="submit" name="submit" value="Edit" />
	</form>
</body>
</html>