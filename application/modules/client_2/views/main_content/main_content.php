<div class="right">
	<p><?php echo $content['content'];?></p>
</div>

<div class="hello">
	<div class="big_img"><img src="<?php echo base_url();?>uploads/<?php echo $folder_img;?>/<?php echo $gallery_img[0]->images;?>" id="gallery" width="200" heigth="100"></div>
	<div class="thumbimage">
    	<ul>
    		<?php foreach ($gallery_img as $k => $v) { echo $v->images;?>
			<li><a class="thumbnails" onclick="document.getElementById('gallery').src='<?php echo base_url();?>uploads/<?php echo $folder_img;?>/<?php echo $v->images;?>';"  href="javascript:void(0);"><img width="75" height="50" src="<?php echo base_url();?>uploads/<?php echo $folder_img;?>/<?php echo $v->images;?>"></a></li>
			<?php }?>	        	
        </ul>
	</div>
</div>