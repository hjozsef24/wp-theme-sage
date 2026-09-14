<?php

namespace App;

use Illuminate\Support\Facades\Vite;

add_filter('upload_mimes', function ($file_types) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
});

add_filter('nav_menu_css_class', function ($classes, $item, $args) {
	if (isset($args->li_class)):
		$classes[] = $args->li_class;
	endif;
	return $classes;
}, 10, 3);

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
	if (property_exists($args, 'link_class')):
		$atts['class'] = $args->link_class;
	endif;
	return $atts;
}, 1, 3);

add_filter('body_class', function (array $classes) {
	$classes[] = ' text-base/6';
	return $classes;
});

add_filter('should_load_remote_block_patterns', '__return_false');

add_filter('allow_password_reset', function () {
	return false;
});


add_filter('block_editor_settings_all', function ($settings) {
	$style = Vite::asset('resources/css/editor.css');

	$settings['styles'][] = [
		'css' => "@import url('{$style}')",
	];

	return $settings;
}, 10, 2);

add_filter('admin_head', function () {
	if (! get_current_screen()?->is_block_editor()):
		return;
	endif;
	$dependencies = json_decode(Vite::content('editor.deps.json'));
	foreach ($dependencies as $dependency):
		if (! wp_script_is($dependency)):
			wp_enqueue_script($dependency);
		endif;
	endforeach;
	echo Vite::withEntryPoints([
		'resources/js/editor.js',
	])->toHtml();
});

add_filter('theme_file_path', function ($path, $file) {
	return $file === 'theme.json'
		? public_path('build/assets/theme.json')
		: $path;
}, 10, 2);

add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
    if ($post->post_type === 'post') {
        return false;
    }
    return $use_block_editor;
}, 10, 2);
