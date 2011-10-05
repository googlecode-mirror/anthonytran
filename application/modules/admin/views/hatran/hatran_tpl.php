<html>
<head>
	<title>Anthony first project</title>
</head>

<body>
	<h1>LOGIN FORM</h1>
	<div id="error_show" style="background-color:pink ; width: 300px; height: 30px;">
	</div>
	
	<form action="<?php echo base_url();?>tony_admin/login" method = "post" name = "login" class ="formlog" >
		<ul>
			<li><input type = "text" name = "username" value = ""  /></li>
			<li><input type = "password" name ="password" value ="" /></li>
			<li><input type = "submit" name = "submit" value = "Login" /></li> 
		</ul>
	</form>
</body>
</html>