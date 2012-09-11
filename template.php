<?php
// $Id$

/**
 * @file
 * 
 *
 * 
 */


/**
 * Preprocess functions for page.tpl.php.
 */
function site_port_preprocess_page(&$vars){
}
 
 
/**
 * Preprocess functions for node.tpl.php.
 */
 
function site_port_preprocess_node(&$vars){
	
	if($vars['type'] == 'port'){
		
		$vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];
		
		// settings to send to JS
		$image_settings = array();
		$gallery_settings = array(
			'controls' => intval($vars['field_port_show_controls'][0]['value']),
			'auto_start' => intval($vars['field_port_auto_start'][0]['value']),
			'total_images' => count($vars['field_port_images']),
		);
		
		
		// randomize images as needed
		if($vars['field_port_random'][0]['value']){
			shuffle($vars['field_port_images']);
		}
		
		
		for($i = 0; $i < count($vars['field_port_images']); $i++){
			
			// settings to send to JS
			$image = $vars['field_port_images'][$i];
			$path = $image['uri'];
			$alt = $image['alt'];
			
			$image_settings['details'][] = $image;
			
			// create image items to add to a <ul>
			$image_items[] = array(
		    'data' => render_image($path, 'port_full', $alt),
		    'id' => 'port-image-' . $i,
		    'rel' => $i,
		  );
		  
		  // create thumb items to add to a <ul>
			$thumb_items[] = array(
		    'data' => render_image($path, 'port_thumb', $alt),
		    'id' => 'port-thumb-' . $i,
		    'rel' => $i,
		  );
			
		}
		
		
		// set images markup for use in port template
		$vars['images'] = theme('item_list', array('items' => $image_items));
		$vars['thumbs'] = theme('item_list', array('items' => $thumb_items));
		
		
		// add JS - duh!
		drupal_add_js(array('gallery_settings' => $gallery_settings), 'setting');
		drupal_add_js(array('image_settings' => $image_settings), 'setting');
	  drupal_add_js(drupal_get_path('module', 'port_base') . '/port_init.js');
	  		
	}
	
}


/**
 * Renders image with a given image style
 */
 
function render_image($path, $style = 'default', $alt){
	$image_style = array( 'style_name' => $style, 'path' => $path, 'alt' => $alt);
	return theme('image_style', $image_style);
};
	
