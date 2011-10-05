<div class="right">
	<div id ="center_home">
		<ul>
			<?php foreach ($main_data as $k => $v) {?>
				<li><a href="<?php echo base_url().$v['name_ascii'].'.html';?>"><?php echo $v['name'];?></a></li>
			<?php }?>
		</ul>
	</div>
</div>