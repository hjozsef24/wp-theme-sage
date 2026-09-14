<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    protected static $views = [
        'sections.header'
    ];

    public function with()
    {
        $styles = $this->getSectionStyles();
        
        return [
            'logo' => $this->logo(),
            'highlightedButton' => $this->highlightedButton(),
            'section_style' => $styles['string'],
            'section_colors' => $styles['values'],
        ];
    }

    private function logo(): array
    {
        $logo = get_field('header_logo', 'option');
        return $logo;
    }

    private function highlightedButton(): array
    {
        $button = get_field('header_highlighted_button', 'option');
        $outlined = get_field('header_highlighted_button_outlined', 'option');
        $color = get_field('header_highlighted_button_color', 'option');

        $button['outlined'] = $outlined;
        $button['color'] = $color;
        return $button;
    }

    private function getSectionStyles(): array
    {
        $bg = get_field('header_background_color', 'option');
        $text = get_field('header_text_color', 'option'); 

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
            ]
        ];
    }
}
