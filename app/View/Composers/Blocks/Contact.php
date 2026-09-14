<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class Contact extends Composer
{
    protected static $views = [
        'blocks.contact',
    ];

    public function with()
    {
        return [
            'title' => $this->title(),
            'description' => $this->description(),
            'contacts' => $this->contacts(),
            'socials' => $this->socials(),
            'address' => $this->address(),
            'spacing' => $this->spacing(),
            'button' => $this->button(),
            'section_style' => $this->sectionStyle(),
            'input_color' => $this->inputColor()
        ];
    }

    private function title(): string
    {
        $title = get_field('contact_title');
        return $title ? $title : '';
    }

    private function description(): string
    {
        $description = get_field('contact_description');
        return $description ? $description : '';
    }

    private function contacts(): array
    {
        $contacts = get_field('contact_contacts');
        return $contacts ? $contacts : [];
    }

    private function socials(): array
    {
        $isSocialMediaHidden = get_field('contact_social_media_is_hidden');

        if ($isSocialMediaHidden) return [];

        $socials = get_field('footer_social_media', 'option');;
        return $socials ? $socials : [];
    }

    private function address(): string
    {
        $address = get_field('contact_address');
        return $address ? $address : '';
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

    private function button(): array
    {
        $button = get_field('button');
        return !empty($button) ? $button : [];
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

    private function inputColor(): string
    {
        $color = get_field('input_color');
        return $color ? $color : '#F4F5F6';
    }
}
