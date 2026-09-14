<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class Hero extends Composer
{
    protected static $views = [
        'blocks.hero',
    ];
    public function with()
    {
        return [
            'label' => $this->label(),
            'title'   => $this->title(),
            'description'   => $this->description(),
            'image'  => $this->image(),
            'button_primary'  => $this->buttonPrimary(),
            'button_secondary'  => $this->buttonSecondary(),
            'isFullWidth'  => $this->isFullWidth(),
            'spacing' => $this->spacing(),
            'section_style' => $this->sectionStyle()
        ];
    }

    private function label(): string
    {
        $label = get_field('hero_label');
        return $label ? $label : '';
    }

    private function title(): string
    {
        $title = get_field('hero_title');
        return $title ? $title : '';
    }

    private function description(): string
    {
        $description = get_field('hero_description');
        return $description ? $description : '';
    }

    private function image(): array
    {
        $image = get_field('hero_image');
        return $image ? $image : [];
    }

    private function buttonPrimary(): array
    {
        $buttonPrimary = get_field('hero_button_primary');
        $buttonPrimaryColor = get_field('hero_button_primary_color');
        $outlined = get_field('hero_button_primary_outlined');

        if ($buttonPrimary) {
            $buttonPrimary['color'] = !empty($buttonPrimaryColor) ? $buttonPrimaryColor : '#3772FF';
            $buttonPrimary['outlined'] = $outlined;
            return $buttonPrimary;
        }

        return [];
    }

    private function buttonSecondary(): array
    {
        $buttonSecondary = get_field('hero_button_secondary');
        $buttonSecondaryColor = get_field('hero_button_secondary_color');
        $outlined = get_field('hero_button_secondary_outlined');

        if ($buttonSecondary) {
            $buttonSecondary['color'] = !empty($buttonSecondaryColor) ? $buttonSecondaryColor : '#3772FF';
            $buttonSecondary['outlined'] = $outlined;
            return $buttonSecondary;
        }

        return [];
    }

    private function isFullWidth(): bool
    {
        $isFullWidth = get_field('hero_is_full_width');
        return $isFullWidth;
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
        $text_color = get_field('text_color'); 

        $styles = [];

        if (!empty($text_color)) {
            $styles[] = "color: " . $text_color . " !important;";
        }

        return !empty($styles) ? implode(' ', $styles) : "";
    }
}
