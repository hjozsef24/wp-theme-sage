<?php

namespace App;

add_filter('block_categories', function ($categories, $post) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'blocks',
				'title' => __('Blokkok', 'blocks'),
			)
		)
	);
}, 10, 2);

add_action('allowed_block_types_all', function () {
	$blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();
	foreach ($blocks as $key => $value):
		if (strpos($key, 'acf/') !== 0):
			unset($blocks[$key]);
		endif;
	endforeach;
	return array_keys($blocks);
}, 25, 2);

add_action('acf/init', function () {
	if (!function_exists('acf_register_block_type')) {
		return;
	}

	// F.A.Q.
	acf_register_block_type([
		'name'              => 'blocks-faq',
		'title'             => __('Gyakran Ismételt Kérdések (Gy.I.K.)', 'sage'),
		'description'       => __('Gyakran ismételt kérdéseket és válaszokat jelenít meg a gyors tájékozódás és a bizonytalanság csökkentése érdekében.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'editor-help',
		'keywords'          => ['faq', 'gyik'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.faq', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Partners
	acf_register_block_type([
		'name'              => 'blocks-partners',
		'title'             => __('Partnerek', 'sage'),
		'description'       => __('A vállalati vagy szakmai partnereket jeleníti meg logókkal és rövid leírásokkal, erősítve a hitelességet és a megbízhatóságot.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'groups',
		'keywords'          => ['partnerek', 'slider'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.partners', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// CTA with image
	acf_register_block_type([
		'name'              => 'blocks-cta-with-image',
		'title'             => __('CTA blokk szöveggel és képpel', 'sage'),
		'description'       => __('A látogatók cselekvésre ösztönzésére szolgál kiemelt üzenettel és gombbal, például ajánlatkérésre vagy kapcsolatfelvételre.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'welcome-widgets-menus',
		'keywords'          => ['cta'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.cta-with-image', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// CTA without image
	acf_register_block_type([
		'name'              => 'blocks-cta-without-image',
		'title'             => __('CTA blokk szöveggel', 'sage'),
		'description'       => __('A látogatók cselekvésre ösztönzésére szolgál kiemelt üzenettel és gombbal, például ajánlatkérésre vagy kapcsolatfelvételre.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'welcome-widgets-menus',
		'keywords'          => ['cta', 'banner'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.cta-without-image', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// About
	acf_register_block_type([
		'name'              => 'blocks-about',
		'title'             => __('Rólunk', 'sage'),
		'description'       => __('', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'id',
		'keywords'          => ['rólunk', 'about'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.about', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Testimonials
	acf_register_block_type([
		'name'              => 'blocks-testimonials',
		'title'             => __('Ügyfélvélemények', 'sage'),
		'description'       => __('Ügyfélvéleményeket és értékeléseket jelenít meg a hitelesség és a döntési bizalom növelésére.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'format-quote',
		'keywords'          => ['reviews'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.testimonials', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Team
	acf_register_block_type([
		'name'              => 'blocks-team',
		'title'             => __('Csapatunk', 'sage'),
		'description'       => __('Bemutatja a csapattagokat fotóval, névvel és szerepkörrel, erősítve a bizalmat és a személyes kapcsolatot.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'businessperson',
		'keywords'          => ['team'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.team', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Pricing
	acf_register_block_type([
		'name'              => 'blocks-pricing',
		'title'             => __('Áraink', 'sage'),
		'description'       => __('A szolgáltatások vagy csomagok árait és tartalmát mutatja be átlátható, összehasonlítható formában.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'money',
		'keywords'          => ['pricing', 'prices', 'árak'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.pricing-table', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Services primary
	acf_register_block_type([
		'name'              => 'blocks-services-primary',
		'title'             => __('Szolgáltatásaink - Elsődleges', 'sage'),
		'description'       => __('A kínált szolgáltatásokat mutatja be strukturált, áttekinthető formában, segítve a gyors megértést és a döntéshozatalt.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'admin-tools',
		'keywords'          => ['services'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.services-primary', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Services secondary
	acf_register_block_type([
		'name'              => 'blocks-services-secondary',
		'title'             => __('Szolgáltatásaink - Másodlagos', 'sage'),
		'description'       => __('A kínált szolgáltatásokat mutatja be strukturált, áttekinthető formában, segítve a gyors megértést és a döntéshozatalt.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'admin-tools',
		'keywords'          => ['services'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.services-secondary', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// General slider
	acf_register_block_type([
		'name'              => 'blocks-general-slider',
		'title'             => __('Általános slider', 'sage'),
		'description'       => __('', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'slides',
		'keywords'          => ['slider'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.general-slider', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Hero
	acf_register_block_type([
		'name'              => 'blocks-hero',
		'title'             => __('Hero szekció', 'sage'),
		'description'       => __('Az oldal nyitó, kiemelt vizuális szekciója. Fő üzenet, cím, alcím és opcionális cselekvésre ösztönző elem (CTA) megjelenítésére szolgál.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'cover-image',
		'keywords'          => [''],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.hero', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Image
	acf_register_block_type([
		'name'              => 'blocks-image',
		'title'             => __('Kép', 'sage'),
		'description'       => __('', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'format-image',
		'keywords'          => [''],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.image', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Text
	acf_register_block_type([
		'name'              => 'blocks-text',
		'title'             => __('Szabadszöveges mező', 'sage'),
		'description'       => __('', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'editor-paragraph',
		'keywords'          => ['bekezdés'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.text', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Blog, News, Posts
	acf_register_block_type([
		'name'              => 'blocks-blog',
		'title'             => __('Blog, Hírek', 'sage'),
		'description'       => __('A legfrissebb cikkeket és tartalmakat jeleníti meg, támogatva a tájékoztatást, a szakértői pozicionálást és az organikus forgalmat.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'media-document',
		'keywords'          => ['bejegyzések'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.blog-list', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);

	// Contact
	acf_register_block_type([
		'name'              => 'blocks-contact',
		'title'             => __('Kapcsolatfelvétel blokk', 'sage'),
		'description'       => __('Lehetővé teszi az érdeklődők számára az üzenetküldést, az elérhetőségek megtekintését és a kapcsolat egyszerű felvételét.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'email',
		'keywords'          => ['elérhetőségek'],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.contact', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]); 
	
	// Values - Primary
	acf_register_block_type([
		'name'              => 'blocks-values-primary',
		'title'             => __('Értékeink lista - Elsődleges', 'sage'),
		'description'       => __('A vállalat alapértékeinek vagy fő erősségeinek bemutatására szolgál. Strukturált, vizuálisan tagolt formában jeleníti meg az üzeneteket.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'heart',
		'keywords'          => [''],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.values-primary', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);
	
	// Values - Primary
	acf_register_block_type([
		'name'              => 'blocks-values-secondary',
		'title'             => __('Értékeink lista - Másodlagos', 'sage'),
		'description'       => __('A vállalat alapértékeinek vagy fő erősségeinek bemutatására szolgál. Strukturált, vizuálisan tagolt formában jeleníti meg az üzeneteket.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'heart',
		'keywords'          => [''],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.values-secondary', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);
    
    // Hero slider
	acf_register_block_type([
		'name'              => 'blocks-hero-slider',
		'title'             => __('Hero slider', 'sage'),
		'description'       => __('Az oldal nyitó, kiemelt vizuális szekciója. Fő üzenet, cím, alcím és opcionális cselekvésre ösztönző elem (CTA) megjelenítésére szolgál.', 'sage'),
		'category'          => 'blocks',
		'icon'              => 'images-alt',
		'keywords'          => [''],
		'render_callback'   => function ($block, $content, $is_preview, $post_id) {
			echo \Roots\view('blocks.hero-slider', [
				'block'      => $block,
				'is_preview' => $is_preview,
				'post_id'    => $post_id,
			])->render();
		},
		'supports'          => [
			'align' => false,
			'mode' => true,
			'jsx'   => true
		]
	]);
});
