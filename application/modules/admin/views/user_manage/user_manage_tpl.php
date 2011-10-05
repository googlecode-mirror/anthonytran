<html>
<head>
	<title>Anthony first project</title>
</head>

<body>
	<h1>THÔNG TIN USERS</h1>
	<div id = "header">
		<b style="color: green;">WELCOME :</b> <em style="color: navy;font-style: italic; text-decoration: underline;"><?php echo $_SESSION['username'];?> </em>
		<p><a href = "<?php echo base_url();?>tony_admin/logout">Logout</a></p>
	</div>
	<div class="home_tab">
		<p><a href="<?php echo base_url();?>tony_admin/home">Home</a></p>
	</div>
	<div class="users_information">
	<table border="1" width="60%">
		<tr>
			<th>ID_USER</th>
			<th>NAME_USER</th>
			<th>EMAIL</th>
			<th>DELETE</th>
			<th>EDIT</th>
		</tr>
	
		<?php foreach($user_info as $k => $v) {?> 
			<tr align="center" style="color: green;">
				<td><?php echo $v->id;?></td>
				<td><?php echo $v->name;?></td>
				<td><?php echo $v->email;?></td>
				<td><a href="<?php echo base_url();?>admin/user_manage/user_delete/<?php echo $v->id;?>" onclick="return confirm('Bạn có muốn xóa users này ?')">delete</a></td>
				<td><a href="<?php echo base_url();?>admin/user_manage/user_edit/<?php echo $v->id;?>">edit</a></td>
			</tr>
			<?php }?>
	</table>
	</div>
	<div>
		<p><a href="<?php echo base_url();?>admin/user_manage/user_add">Add new user</a></p>
	</div>
</body>
</html>