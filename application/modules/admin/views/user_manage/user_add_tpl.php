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
		<p><a href="<?php echo base_url();?>tony_admin/home"> Back Home </a></p>
	</div>
	<h1>ADD FORM USERS</h1>
	
	<form action="<?php echo base_url();?>admin/user_manage/user_add" method="post" accept-charset="utf-8">
		Username: <input type="text" value="" name="username" /><br/>
		Password: <input type="password" value="" name="password" /><br/>
		Email : <input type="text" value="" name="email"  /><br/>
		<input type="submit" value="Add new user" name="submit"  />
	</form>
	
</body>
</html>