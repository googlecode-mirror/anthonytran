/**
 * @author	Tran Van Thanh
 * @date	30.08.2011
 */


function delete_product_js(product_id)
{
    if(!confirm('Are you sure ?')) {
        return false;
    }
    
	$.post(admin_url+'products/delete/'+product_id, function(msg) {
		if(msg == "yes") {
			$('div.linecate2').has('#row_'+product_id).fadeOut('slow').remove();
		}
	});
}
