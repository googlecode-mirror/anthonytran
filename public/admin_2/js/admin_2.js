


function add_more_image(){
	var new_image = '<li>' + 'Name: ' + '<input type="text"  name="img_name[]" value="" size="10" />' + ' <input type="file" value="" name="images[]" size="10" />' + '</li>';
	$('#add_more').before(new_image);
}


function open_form(url){
	$('#light_tab').html('').show();
	load_content('light_tab', url);
	$('#fade_tab').show();
}

function load_content(div_return, url){	
	$("#"+div_return).load(url);
}