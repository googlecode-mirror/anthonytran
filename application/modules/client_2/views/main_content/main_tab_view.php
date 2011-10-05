<div class="right">
	<ul>
		<?php foreach ($tab_info as $k => $v){?>
			<li><a href="<?php echo base_url().$v['name_ascii'].".html";?>"><?php echo $v['name'];?></a></li>
		<?php }?>
	</ul>
</div>