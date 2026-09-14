<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class HeroSlider extends Composer
{
    protected static $views = [
        'blocks.hero-slider',
    ];
    public function with()
    {
        return [
            'slides' => $this->slides(),
            'spacing' => $this->spacing()
        ];
    }

    private function slides(): array
    {
        $slides = get_field('hero_slides');
        return $slides ? $slides : [];
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
}
