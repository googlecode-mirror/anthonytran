<html>
<head>
	<title>Anthony first project</title>
	<script src="<?php echo base_url();?>public/admin/js/jquery-1.6.2.min.js" ></script>
	<script type="text/javascript" >
	function delete_product_js(delUrl) {
		  if (confirm("Are you sure you want to delete")) {
		    document.location = delUrl;
			//    alert(delUrl);
		  }
		}
	</script>
</head>

<body>
	<h1>THÔNG TIN SẢN PHẨM</h1>
	<div id = "header">
		<b style="color: green;">WELCOME :</b> <em style="color: navy;font-style: italic; text-decoration: underline;"><?php echo $_SESSION['username'];?> </em>
		<p><a href = "<?php echo base_url();?>tony_admin/logout">Logout</a></p>
	</div>
	<div class="home_tab">
		<p><a href="<?php echo base_url();?>tony_admin/home">Home</a></p>
	</div>
	<div id ="pro">
		
			
			<table border="1" width="60%">
				<tr>
					<th>ID</th>
					<th>NAME</th>	
					<th>PICTURE_NAME</th>	
					<th>THUMBNAIL_NAME</th>
					<th>DELETE</th>
					<th>EDIT</th>	
				</tr>
				<?php foreach ($results as $v) { ?>
				<tr align="center">
					<td><?php echo $v->id ;?></td>
					<td><?php echo $v->name ;?></td>	
					<td><?php echo $v->image ;?></td>	
					<td><?php echo $v->thumbnail ;?></td>	
					<!-- <td><a href="<?php echo base_url();?>admin/product_manage/delete/<?php echo $v->id ;?>">delete</a></td> -->
					<td><a href="javascript:delete_product_js('<?php echo base_url();?>admin/product_manage/delete/<?php echo $v->id ;?>')">delete</a></td>
					<td><a href="<?php echo base_url();?>admin/product_manage/edit/<?php echo $v->id ;?>">edit</a></td>
				</tr>
				<?php } ?>
			</table>
	</div>

	<div id="add" class="add_pro">
		<p><a href="<?php echo base_url();?>admin/product_manage/add">Add new product</a></p>
	</div>
	
		<div id = "pagination">
			<?php 	
					$per_page = 5;
					$page = ceil($number_rows/$per_page);
					$next = $start + $per_page;
					$prev = $start - $per_page;
					$current = ($start/$per_page) + 1;
			?>
			<ul>
				<?php if($current != 1) {?>
					<li><a href="<?php echo base_url();?>admin/product_manage/index/<?php echo $prev;?>">Prev</a></li>
				<?php }?>
			
				<?php for($i=1;$i<=$page;$i++) { ?>
					<?php if ($current != $i) {?>
						<li><a href="<?php echo base_url();?>admin/product_manage/index/<?php echo $per_page*($i - 1);?>"><?php echo $i; ?></a></li>
					<?php } else {?>
						<li><?php echo $i;?></li>
					<?php }?>
				<?php } ?>
				
				<?php if($current != $page) {?>
					<li><a href="<?php echo base_url();?>admin/product_manage/index/<?php echo $next;?>">Next</a></li>
				<?php }?>
			</ul>
		</div>
</body>
</html>