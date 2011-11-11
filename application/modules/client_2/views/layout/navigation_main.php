<div class="left">
<ul id = "wrapper">
		<?php foreach ($navlist as $k => $v){?> 
				<?php if($v->parent_id == 0){
						if($k == 0){
							echo "<li>";
						} else {
							echo "</ul></li><li>";
						}?>
					<div><a href="<?php echo base_url();?>categories/<?php echo $v->name_ascii.'.html';?>"><?php echo $v->name." (".$v->articles_amount.")" ; ?></a></div><ul>
				
				<?php } else {?>
					<li>
						<a href="<?php echo base_url();?>categories/<?php echo $v->name_ascii.'.html';?>"><?php echo $v->name." (".$v->articles_amount.")";?></a>
					</li>
		<?php }?>
				<?php 
					if($k== (count($navlist)-1)){
						echo "</li>";
					}
				}?>
</ul>
</div>

