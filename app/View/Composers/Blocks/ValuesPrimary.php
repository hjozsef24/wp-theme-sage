<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class ValuesPrimary extends Composer
{
    protected static $views = [
        'blocks.values-primary',
    ];

    public function with()
    {
        return [
            'label'  => $this->label(),
            'title' => $this->title(),
            'button' => $this->button(),
            'button_background' => $this->buttonBackground(),
            'values' => $this->values(),
            'spacing' => $this->spacing(),
            'outlined_button' => $this->outlinedButton(),
            'section_style' => $this->sectionStyle(),
            'card_background' => $this->cardBg()
        ];
    }

    private function label(): string
    {
        $label = get_field('values_primary_label');
        return $label ? $label : '';
    }

    private function title(): string
    {
        $title = get_field('values_primary_title');
        return $title ? $title : '';
    }

    private function button(): array
    {
        $button = get_field('values_primary_button');
        return $button ? $button : [];
    }

    private function buttonBackground(): string
    {
        $buttonBackground = get_field('values_primary_button_color');
        return $buttonBackground ? $buttonBackground : '#3545D2';
    }

    private function outlinedButton() {
        return get_field('values_primary_button_outlined');
    }

    private function values(): array
    {
        $values = get_field('values_primary_values');
        return $values ? $values : [];
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

    private function cardBg()
    {
        return get_field('cards_color');
    }
}
