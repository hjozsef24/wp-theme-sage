<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class Image extends Composer
{
    protected static $views = [
        'blocks.image',
    ];

    public function with()
    {
        return [
            'image'       => $this->image(),
            'is_full_width' => $this->isFullWidth(),
            'orientation' => $this->orientation(),
            'is_centered'       => $this->is_centered(),
            'rounded'     => $this->rounded(),
            'container_class' => $this->containerClass(),
            'spacing' => $this->spacing(),
            'section_style' => $this->sectionStyle()
        ];
    }

    private function image(): array
    {
        $image = get_field('image_image');
        return is_array($image) ? $image : [];
    }

    private function isFullWidth(): bool
    {
        return get_field('image_is_full_width');
    }

    private function orientation(): string
    {
        return get_field('image_orientation') ?: 'vertical';
    }

    private function is_centered(): bool
    {
        return get_field('image_is_centered') ?: false;
    }

    private function rounded(): bool
    {
        return get_field('image_rounded');
    }

    private function containerClass(): string
    {
        return get_field('image_is_full_width') ? 'w-full' : 'container mx-auto px-4';
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

        if (empty($background_color)) {
            return "";
        }
        
        return "background-color: " . $background_color . " !important;";
    }
}
