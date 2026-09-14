<?php

namespace App;

use App\Actions\ContactForm;

use function Roots\bundle;

add_action('after_setup_theme', function () {
	remove_theme_support('block-templates');
	register_nav_menus([
		'header_navigation' => __('Fejléc navigáció', 'sage'),
		'footer_navigation_first' => __('Lábléc navigáció - Első oszlop', 'sage'),
		'footer_navigation_second' => __('Lábléc navigáció - Második oszlop', 'sage'),
	]);
	remove_theme_support('core-block-patterns');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	]);
	add_theme_support('customize-selective-refresh-widgets');
	remove_theme_support('core-block-patterns');
}, 20);

add_action('init', function () {
	remove_filter('atom_service_url', 'atom_service_url_filter');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
});

add_action('acf/init', function () {
	if (function_exists('acf_add_options_page')):
		$parent = acf_add_options_page([
			'page_title'    => __('Globális Beállítások', 'sage'),
			'menu_title'    => __('Beállítások', 'sage'),
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'      => true,
		]);

		acf_add_options_sub_page([
			'page_title'    => __('Fejléc Beállítások', 'sage'),
			'menu_title'    => __('Fejléc', 'sage'),
			'parent_slug'   => $parent['menu_slug'],
			'menu_slug'     => 'theme-header-settings',
		]);

		acf_add_options_sub_page([
			'page_title'    => __('Lábléc Beállítások', 'sage'),
			'menu_title'    => __('Lábléc', 'sage'),
			'parent_slug'   => $parent['menu_slug'],
			'menu_slug'     => 'theme-footer-settings',
		]);

		acf_add_options_sub_page([
			'page_title'    => __('404-es oldal beállításai', 'sage'),
			'menu_title'    => __('404-es oldal', 'sage'),
			'parent_slug'   => $parent['menu_slug'],
			'menu_slug'     => 'theme-404-settings',
		]);
	endif;
});

add_action('wp_enqueue_scripts', function () {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');
}, 20);

add_action('wp_dashboard_setup', function () {
	remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
});

add_action('wp_footer', function () {
	wp_dequeue_style('global-styles');
}, 1);

add_action('after_setup_theme', function () {
	remove_theme_support('core-block-patterns');
});

add_action('admin_init', function () {
	remove_submenu_page('themes.php', 'edit.php?post_type=wp_block');
}, 100);

add_action('admin_menu', function () {
	remove_submenu_page('themes.php', 'site-editor.php?path=/patterns');
	remove_submenu_page('themes.php', 'site-editor.php?p=/patterns');
	remove_submenu_page('themes.php', 'site-editor.php?p=/pattern');
});

add_action('admin_head', function () {
	echo '<style>
		.hide-if-no-customize{
			display:none !important;		
		}
	</style>';
});

add_action('wp_head', function () {
	echo '<style>
		.hide-if-no-customize{
			display:none !important;		
		}
	</style>';
});

add_action('after_setup_theme', function () {
	add_theme_support('editor-styles');
	try {
		$composer_asset = asset('resources/css/app.css');
		if ($composer_asset):
			$path = str_replace(get_template_directory_uri() . '/', '', $composer_asset->uri());
			add_editor_style($path);
		endif;
	} catch (\Exception $e) {
	}
});

add_action('admin_enqueue_scripts', function () {
	$css = '
		.components-panel__header button + button{
			display: none !important;
		}
		.css-1nuemzt[aria-orientation="horizontal"].is-overflowing-last{
			mask-image:unset !important;
		}
	';
	wp_add_inline_style('wp-admin', $css);
}, 100);


add_action('init', function () {
	if (! function_exists('Roots\\view')) {
		wp_die('Acorn NEM fut');
	}
});

add_action('init', function () {
	unregister_taxonomy_for_object_type('post_tag', 'post');
});

add_action('acf/input/admin_footer', function () { ?>
	<script type="text/javascript">
		(function($) {
			acf.add_filter('color_picker_args', function(args, $field) {
				args.palettes = ['#3772FF', '#353945', '#23262F', '#777E90', '#45B26B', '#9757D7', '#EF466F', '#FCFCFD', '#ffffff'];
				return args;
			});
		})(jQuery);
	</script>
<?php });

add_action('wp_enqueue_scripts', function () {
    if (view()->exists('app')) { 
         bundle('app')->enqueue()->localize('ajax', [
            'url' => admin_url('admin-ajax.php'),
        ]);
    }
}, 100);

add_action('wp_ajax_send_contact_form', function () {
    (new ContactForm())();
});

add_action('wp_ajax_nopriv_send_contact_form', function () {
    (new ContactForm())();
});

add_filter('show_admin_bar', '__return_true', 999);