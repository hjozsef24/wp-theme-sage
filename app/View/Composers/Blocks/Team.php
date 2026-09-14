<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class Team extends Composer
{
    protected static $views = [
        'blocks.team',
    ];

    public function with()
    {
        return [
            'title' => $this->title(),
            'description' => $this->description(),
            'team' => $this->team(),
            'spacing' => $this->spacing(),
            'section_style' => $this->sectionStyle()
        ];
    }

    private function title(): string
    {
        $title = get_field('team_title');
        return $title ? $title : '';
    }

    private function description(): string
    {
        $title = get_field('team_description');
        return $title ? $title : '';
    }

    private function team()
    {
        $team = get_field('team');
        return $team;
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
