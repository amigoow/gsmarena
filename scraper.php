<?php
/**
 * Plugin Name: Specs from GsmArena
 * Plugin URI: http://softoven.com/blog/
 * Description: Add product to Woocommerce using GSM URL
 * Version: 1.04
 * Author: Faisal
 * Author URI: http://softoven.com
 * License: GPL2
 * Created On: 28/08/2015
 * Updated On: 03/09/2015
 */

//Pushing a URL textfield in Attributes section

add_action( 'woocommerce_product_options_attributes', 'woocommerce_general_product_data_custom_field' );
 
function woocommerce_general_product_data_custom_field() {
   global $woocommerce, $post;

    woocommerce_wp_text_input(
        array(
            'id' => 'product_url_gsm',
            'wrapper_class' => 'input_class',
            'label' => __('Enter URL', 'woocommerce' ),
            desc_tip => true,
            'description' => __( 'Enter GSMArena URL to fetch products', 'woocommerce' )
        )
    );
    
    echo "<h3 id='msgDone' style='color:green;display:none'>Data fetched! Please publish the page to see changes!</h3><div id='tblLoading' style='display:none;height:75px;background: #ffffff url(http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif) no-repeat center;'></div>";
    
// var_dump(wp_set_object_terms($post->ID, "dsdad" , 'pa_test_attr'));die;
    
//     $attribute_taxonomies = wc_get_attribute_taxonomies();
//     $defaults = array();
		
// 	foreach ( $attribute_taxonomies as $key=>$tax ) {
			
			
//             $name = wc_attribute_taxonomy_name( $tax->attribute_name );
				
// 	        $value= get_post_meta( $post->ID , '_product_attributes');

// 	        $terms = get_terms($name);
    
// 		    foreach ( $terms as $term ) {
// 		        echo $term->name . "<br><br>";
// 		    }
        
//     }
    
    

}

//scraping specs from GSM

//adding external JS file
add_action( 'admin_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {
    global $post;

	wp_enqueue_script( 'ajax-script', plugins_url( '/js/ajax_specs.js', __FILE__ ), array('jquery') );

	wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'post_id' => $post->ID ) );
}


//AJAX call back function 
add_action( 'wp_ajax_get_specs', 'get_specs_callback' );

function get_specs_callback() {
	global $wpdb;
	global $post;

	
	if(isset($_POST['txtgeturl'])){
		$buff = array();
		//getting all content of webpage
		$content=file_get_contents($_POST['txtgeturl']);
		$post_id = $_POST['post_id'];
		
		//setting 2G Field
		$two_g_network=get_specs_for($content,"2G bands");
		wp_set_object_terms($post_id, $two_g_network , 'pa_test_attr');
		

		//setting 3G Field
		$three_g_network=get_specs_for($content,"3G bands");
		wp_set_object_terms($post_id, $three_g_network , 'pa_three_g');
		

		//setting GPRS Field
		$gprs=get_specs_for($content,"GPRS");
		wp_set_object_terms($post_id, $gprs , 'pa_gprs');
		

		//setting Announced field
		$ann=get_specs_for($content,">Announced");
		wp_set_object_terms($post_id, $ann , 'pa_ann');

		//Edge
		$edge=get_specs_for($content,"EDGE");
		wp_set_object_terms($post_id, $edge , 'pa_edge');

		//status
		$status=get_specs_for($content,"Status");
		wp_set_object_terms($post_id, $status , 'pa_status');

		//weight
		$weight=get_specs_for($content,"Weight");
		wp_set_object_terms($post_id, $weight , 'pa_weight');

		//Dimensions
		$dimensions=get_specs_for($content,"Dimensions");
		wp_set_object_terms($post_id, $dimensions , 'pa_dimensions');

		//type
		 $typez=get_specs_for($content,">Type");
		 wp_set_object_terms($post_id, $typez , 'pa_p_type');

		 //Size
		 $size=get_specs_for($content,"size");
		 wp_set_object_terms($post_id, $size , 'pa_size');

		 //Card slot
		  $slot=get_specs_for($content,"Card slot");
		 wp_set_object_terms($post_id, $slot , 'pa_slot');
		 
		 //share_mem
		 $share_mem=get_specs_for($content,"Internal</a></td>");
		 wp_set_object_terms($post_id, $share_mem , 'pa_share_mem');

		 //Camera
		 //note here, different ftn been called
		 $camera=get_specs_for_cam($content,"Primary</a></td>");
		 wp_set_object_terms($post_id, $camera , 'pa_camera');

		 //features
		 $features=get_specs_for($content,"Features</a></td>");
		 wp_set_object_terms($post_id, $features , 'pa_features');

		 //sound
		 $sound = get_specs_for($content,">Alert types");
		 wp_set_object_terms($post_id, $sound , 'pa_sound');

		 //loudspeaker
		$loudspeaker = get_specs_for($content,"Loudspeaker");
		wp_set_object_terms($post_id, $loudspeaker , 'pa_loudspeaker');

		//Internal
		$internal = get_specs_for($content,"Internal");
		wp_set_object_terms($post_id, $internal , 'pa_internal');

		//Phonebook
		$phonebook = get_specs_for($content,"Phonebook");
		wp_set_object_terms($post_id, $phonebook , 'pa_phonebook');

		//callrec
		$callrec = get_specs_for($content, "Call records");
		wp_set_object_terms($post_id, $callrec , 'pa_callrec');	

		//wlan
		$wlan = get_specs_for($content, "WLAN</a>");
		wp_set_object_terms($post_id, $wlan , 'pa_wlan');	

		//Bluetooth
		$bluetooth = get_specs_for($content, "Bluetooth</a>");
		wp_set_object_terms($post_id, $bluetooth , 'pa_bluetooth');	

		//ifport				
		$ifport = get_specs_for($content, "Infrared port");
		wp_set_object_terms($post_id, $ifport , 'pa_ifport');

		//USB
		$usb = get_specs_for($content, "USB</a>");
		wp_set_object_terms($post_id, $usb , 'pa_usb');	

		//NFC
		$nfc = get_specs_for($content, "NFC</a>");
		wp_set_object_terms($post_id, $nfc , 'pa_nfc');	

		//GPS
		$gps = get_specs_for($content, "GPS</a>");
		wp_set_object_terms($post_id, $gps , 'pa_gps');	

		//radio
		$radio = get_specs_for($content, "Radio</a>");
		wp_set_object_terms($post_id, $radio , 'pa_radio');	

		//msg
		$msg = get_specs_for($content, "Messaging</a>");
		wp_set_object_terms($post_id, $msg , 'pa_msg');	

		//os
		$os = get_specs_for($content, "OS</a>");
		wp_set_object_terms($post_id, $os , 'pa_os');	

		//chipset
		$chipset = get_specs_for($content, "Chipset</a>");
		wp_set_object_terms($post_id, $chipset , 'pa_chipset');	

		//cpu
		$cpu = get_specs_for($content, "CPU</a>");
		wp_set_object_terms($post_id, $cpu , 'pa_cpu');	

		//gpu
		$gpu = get_specs_for($content, "GPU</a>");
		wp_set_object_terms($post_id, $gpu , 'pa_gpu');	

		//battery
		$battery = get_specs_for($content, ">Battery");
		wp_set_object_terms($post_id, $battery , 'pa_battery');	

		//gpu
		$stand = get_specs_for($content, "Stand-by</a>");
		wp_set_object_terms($post_id, $stand , 'pa_stand');	

		//gpu
		$talk = get_specs_for($content, "Talk time</a>");
		wp_set_object_terms($post_id, $talk , 'pa_talk');

		//gpu
		$colors = get_specs_for($content, "Colors");
		wp_set_object_terms($post_id, $colors , 'pa_colors');	


		$buff = array(
					'pa_test_attr' =>	$two_g_network,
					'pa_three_g'   =>	$three_g_network,
					'pa_gprs'	   =>	$gprs,
					'pa_ann'	   =>	$ann,
					'pa_edge'	   =>	$edge,
					'pa_status'    =>	$status,
					'pa_dimensions'=>	$dimensions,
					'pa_weight'	    => 	$weight,
					'pa_p_type'	    =>	$typez ,
					'pa_size'	    =>	$size ,
					'pa_slot'	    =>	$slot ,
					'pa_share_mem'  =>	$share_mem,
					'pa_camera'	    =>	$camera,
					'pa_features'   =>	$features,
					'pa_sound'	    =>	$sound,
					'pa_loudspeaker'=>	$loudspeaker,
					'pa_internal'	=>	$internal,
					'pa_phonebook'	=>	$phonebook,
					'pa_callrec'	=>	$callrec,
					'pa_wlan'		=>  $wlan,
					'pa_bluetooth'	=>	$bluetooth,
					'pa_ifport'		=>	$ifport,
					'pa_usb'		=>	$usb,
					'pa_nfc'		=>	$nfc,
					'pa_gps'		=>	$gps,
					'pa_radio'		=>  $radio,
					'pa_msg'		=>	$msg,
					'pa_os'			=>	$os,
					'pa_chipset'	=>	$chipset,
					'pa_cpu'		=>	$cpu,
					'pa_gpu'		=>	$gpu,
					'pa_battery'	=>	$battery,
					'pa_stand'		=>	$stand,
					'pa_talk'		=>	$talk,
					'pa_colors'		=>	$colors
				);
				
		echo stripslashes(json_encode( $buff, JSON_FORCE_OBJECT ));
	}




	wp_die(); 
}


add_action('transition_post_status', 'wpa_120062_new_product', 10, 3);

function wpa_120062_new_product($new_status, $old_status, $post){
	
	if( function_exists( 'wc_get_attribute_taxonomies' ) && ( $attribute_taxonomies = wc_get_attribute_taxonomies() ) ) {
		
		$defaults = array();
		
		foreach ( $attribute_taxonomies as $key=>$tax ) {
				
				
	            $name = wc_attribute_taxonomy_name( $tax->attribute_name );
  				
  	            $value= get_post_meta( $post->ID , '_product_attributes');

  	            //var_dump(get_post_meta($value));

	           	// do stuff here
	            $defaults[ $name ] = array (
	                'name' => $name,
	                
	                'position' => $key+1,
	                'is_visible' => 1,
	                'is_variation' => 1,
	                'is_taxonomy' => 1,
	            );

	        update_post_meta( $post->ID , '_product_attributes', $defaults );
	        
	    }
	}
}


//scraping ftns

function get_specs_for($content,$spec_name){
	$startpos=strpos($content,$spec_name);
	if ($startpos)
	{
		$content=substr($content,$startpos);
		$startpos=strpos($content,"nfo")+5;
		
		$endpos=strpos($content,"</tr>") ;
		
		$spec = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
		$spec_name = ucfirst($spec_name);

		return $spec;
	}
}
function get_specs_for_cam($content,$spec_name){
	$startpos=strpos($content,$spec_name);
	if ($startpos)
	{
		$content=substr($content,$startpos);
		$startpos=strpos($content,"nfo")+5;
		
		$endpos=strpos($content,"</tr>") ;
		$camera = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
		$camera = strip_tags($camera);
		$camera = str_replace('check quality', '', $camera);
		
		return $camera;
	}
}


?>

