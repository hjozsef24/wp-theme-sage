<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class NotFoundComposer extends Composer
{
    protected static $views = [
        '404'
    ];

    public function with()
    {
        return [
            'description' => $this->description(),
            'button' => $this->button()
        ];
    }

    private function description(): string {
        $description = get_field('not_found_description', 'option');
        return $description;
    }

    private function button(): array {
        $button = get_field('not_found_button', 'option');
        $outlined = get_field('not_found_button_outlined', 'option');
        $color = get_field('not_found_button_color', 'option');

        $button['outlined'] = $outlined;
        $button['color'] = $color;

        return $button;
    }
}