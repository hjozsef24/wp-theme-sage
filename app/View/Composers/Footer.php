<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
	protected static $views = [
		'sections.footer'
	];
	public function with()
	{
        $styles = $this->getSectionStyles();

		return [
			'logo' => $this->logo(),
			'description' => $this->description(),
			'socialMedia' => $this->socialMedia(),
			'copyright' => $this->copyright(),
            'section_style' => $styles['string'],
            'section_colors' => $styles['values'],
		];
	}

	private function logo(): array
	{
		$logo = get_field('footer_logo', 'option');
		return $logo;
	}

	private function description(): string
	{
		$description = get_field('footer_description', 'option');
		return $description;
	}

	private function socialMedia(): array
	{
		$socialMedia = get_field('footer_social_media', 'option');
		return $socialMedia;
	}

	private function copyright(): string
	{
		$copyright = get_field('footer_copyright', 'option');
		return $copyright;
	}

    private function getSectionStyles(): array
    {
        $bg = get_field('footer_background_color', 'option'); 
        $text = get_field('footer_text_color', 'option'); 
        $menu = get_field("footer_menu_color","option");

        $style_array = [];
        
        if ($bg) {
            $style_array[] = "background-color: {$bg} !important;";
        }
        if ($text) {
            $style_array[] = "color: {$text} !important;";
        }

        return [
            'string' => implode(' ', $style_array),
            'values' => [
                'bg' => $bg,
                'text' => $text,
                'menu' => $menu
            ]
        ];
    }
}
