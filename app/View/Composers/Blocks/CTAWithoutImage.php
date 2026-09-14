<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class CTAWithoutImage extends Composer
{
    protected static $views = [
        'blocks.cta-without-image',
    ];

    public function with()
    {
        return [
            'label' => $this->label(),
            'title' => $this->title(),
            'button' => $this->button(),
            'buttonBg' => $this->buttonBg(),
            'spacing' => $this->spacing(),
            'outlined_button' => $this->outlinedButton(),
            'section_style' => $this->sectionStyle()
        ];
    }

    private function label(): string
    {
        $label = get_field('cta_without_image_label');
        return $label ? $label : '';
    }

    private function title(): string
    {
        $title = get_field('cta_without_image_title');
        return $title ? $title : '';
    }

    private function button(): array | null
    {
        $button = get_field('cta_without_image_button');
        return $button ? $button : null;
    }

    private function buttonBg(): string
    {
        $buttonBg = get_field('cta_without_image_button_background');
        return $buttonBg ? $buttonBg : '';
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

    private function outlinedButton()
    {
        return get_field('cta_without_image_button_outlined');
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
}
