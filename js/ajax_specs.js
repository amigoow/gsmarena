jQuery(document).ready(function($) {
	
	//auto expanding all attributes	
    $('.product_attributes > div').removeClass('closed').show();
    $('#product_attributes a.expand_all').click();


	//initiating a AJAX request to action wp_ajax_get_specs functions

	$("#product_url_gsm").focusout(function(){
		
		product_url_gsm = $(this).val();
		var data = {
			'action': 'get_specs',
			'txtgeturl': product_url_gsm,
			'post_id': ajax_object.post_id
		};
		
		$('#tblLoading').ajaxStart(function() { $(this).show(); });
		$('#tblLoading').ajaxComplete(function() { $(this).hide();$("#msgDone").show(); });
		
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			console.log(response);
			data = JSON.parse(response);
			var attrs = [
					'pa_test_attr',
					'pa_three_g'  ,
					'pa_gprs'	  ,
					'pa_ann'	  ,
					'pa_edge'	  ,
					'pa_status'	  ,
					'pa_dimensions',
					'pa_weight'	,
					'pa_p_type' ,
					'pa_size'	,
					'pa_slot'	,
					'pa_share_mem',
					'pa_camera'	,
					'pa_features',
					'pa_sound',
					'pa_loudspeaker',
					'pa_internal'	,
					'pa_phonebook'	,
					'pa_callrec',
					'pa_wlan',
					'pa_bluetooth',
					'pa_ifport',
					'pa_usb',
					'pa_gps',
					'pa_nfc',
					'pa_radio',
					'pa_msg',
					'pa_os',
					'pa_chipset',
					'pa_cpu',
					'pa_gpu',
					'pa_battery',
					'pa_stand',
					'pa_talk',
					'pa_colors'

				];				
			json = jQuery.parseJSON(response);
			
				for (i = 0; i < attrs.length; i++) {
					$("input[name='attribute_values["+ i +"]']").val(json[attrs[i]]);	    
				}

			//console.log(json);
		});
	});
});
