<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class Faq extends Composer
{
    protected static $views = [
        'blocks.faq',
    ];

    public function with()
    {
        $faqs = $this->faqs();

        return [
            'title' => $this->title(),
            'faqs' => $faqs,
            'categories' => array_unique(array_filter(array_column($faqs, 'category_title'))),
            'spacing' => $this->spacing(),
            'section_style' => $this->sectionStyle(),
            'category_style' => $this->categoryStyle()
        ];
    }

    private function title(): string
    {
        $title = get_field('faq_title');
        return $title ? $title : '';
    }

    private function faqs(): array
    {
        $faqs = get_field('faqs');
        return $faqs ? $faqs : [];
    }

    private function spacing(): string
    {
        $spacing = get_field('spacing');

        $padding_val = $spacing['spacing']['inner'] ?? null;
        $margin_val = $spacing['spacing']['outer'] ?? null;

        $p = $padding_val ? ((int)$padding_val / 4) : 6;
        $m = $margin_val ? ((int)$margin_val / 4) : 6;

        return "py-{$p} mb-{$m}";
    }

    private function sectionStyle(): string
    {
        $background_color = get_field('background_color');
        $text_color = get_field('text_color'); 

        $styles = [];

        if (!empty($background_color)) {
            $styles[] = "background-color: " . $background_color . " !important;";
        }

        if (!empty($text_color)) {
            $styles[] = "color: " . $text_color . " !important;";
        }

        return !empty($styles) ? implode(' ', $styles) : "";
    }

    private function categoryStyle()
    {
        $bg = get_field('category_background_color');
        $text = get_field('category_text_color');

        return [
            'background_color' => $bg ? $bg : '#353945',
            'text_color' => $text ? $text : '#FCFCFD'
        ];
    }
}
