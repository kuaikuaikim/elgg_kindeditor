<?php
/**
 * kindeditor
 * jinkk
 * @package 
 */

elgg_register_event_handler('init', 'system', 'tinymce_init');

function tinymce_init() {
	elgg_extend_view('css/elgg', 'tinymce/css');
	elgg_extend_view('css/admin', 'tinymce/css');
   
	elgg_register_css('kind_theme', 'mod/kindeditor/kindeditor-4.1.10/themes/default/default.css');
	elgg_register_css('prettify_css', 'mod/kindeditor/kindeditor-4.1.10/plugins/code/prettify.css');
	elgg_register_js('prettify_js', 'mod/kindeditor/kindeditor-4.1.10/plugins/code/prettify.js');
	elgg_register_js('kindeditor', 'mod/kindeditor/kindeditor-4.1.10/kindeditor.js');
	elgg_register_js('code_js', 'mod/kindeditor/kindeditor-4.1.10/plugins/code/code.js');
	
	elgg_load_js('prettify_js');
	elgg_load_css('prettify_css');
	
	elgg_register_js('elgg.kindeditor', elgg_get_simplecache_url('js', 'kindeditor'));
	elgg_register_simplecache_view('js/kindeditor');
	elgg_load_js('elgg.kindeditor');
	
	//elgg_extend_view('input/longtext', 'tinymce/init');
	elgg_extend_view('input/longtext', 'kindeditor/init');
	elgg_extend_view('embed/custom_insert_js', 'tinymce/embed_custom_insert_js');	
	elgg_register_plugin_hook_handler('register', 'menu:longtext', 'tinymce_longtext_menu');
}

function tinymce_longtext_menu($hook, $type, $items, $vars) {
	
	$items[] = ElggMenuItem::factory(array(
		'name' => 'tinymce_toggler',
		'link_class' => 'tinymce-toggle-editor elgg-longtext-control',
		'href' => "#{$vars['id']}",
		'text' => elgg_echo('tinymce:remove'),
	));
	
	return $items;
}

