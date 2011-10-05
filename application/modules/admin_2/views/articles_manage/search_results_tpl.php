<html>
<head>
	<title>Welcome you to Tonynews.com | Articles Manage</title>
	<script  type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
</head>

<body>
	<h1>WELCOME TO Tonynews.com | Articles Management !</h1>
	<p><a href="<?php echo base_url();?>tony_admin">Back Home</a></p>
	<p><a href="<?php echo base_url();?>admin_2/articles_manage">Back Articles Management</a></p>
	
	
	<div id ="search_box" align="center">
		<form action="<?php echo base_url();?>admin_2/articles_manage/search" method="post">
			<input type="text" value="" name="search" />
			<input type="submit" value="search" >
		</form>
	</div>
	<div id = "arti_table">
		<table border = "1" width = "50%" align="center">
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>NAME_ASCII</th>
				<th>CATEGORIES</th>
				<th>DEL</th>
				<th>EDIT</th>
			</tr>
				<?php foreach($search_results as $k=> $v) {?>
			<tr align="center">
				<td><?php echo $v['id'];?></td>
				<td><?php echo $v['name'];?></td>
				<td><?php echo $v['name_ascii'];?></td>
				<td><?php echo $v['categories'];?></td>
				<td><a href="<?php echo base_url();?>admin_2/articles_manage/delete_articles/<?php echo $v['id'];?>" onclick = "return confirm('are you sure wanna delete it?')">delete</a></td>
				<td><a href="<?php echo base_url();?>admin_2/articles_manage/edit_articles/<?php echo $v['id'];?>">edit</a></td>
			</tr>
			<?php }?>
		</table>
	</div>
	
	<p><a href="<?php echo base_url();?>admin_2/articles_manage/add_articles">Add New Articles</a></p>
</body>
</html>