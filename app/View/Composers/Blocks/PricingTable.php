<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class PricingTable extends Composer
{
    protected static $views = [
        'blocks.pricing-table',
    ];

    public function with()
    {
        return [
            'label' => $this->label(),
            'title' => $this->title(),
            'cards' => $this->cards(),
            'spacing' => $this->spacing(),
            'section_style' => $this->sectionStyle()
        ];
    }

    private function label(): string
    {
        $label = get_field('pricing_label');
        return $label ? $label : "";
    }

    private function title(): string
    {
        $title = get_field('pricing_title');
        return $title ? $title : "";
    }

    private function cards(): array
    {
        $cards = get_field('pricing_cards');
        return $cards ? $cards : [];
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
}
