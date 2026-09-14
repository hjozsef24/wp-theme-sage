<?php

namespace App\View\Composers;
use Roots\Acorn\View\Composer;

class App extends Composer{
	protected static $views = [
		'*',
	];
	public function with(){
        return [
            'getSvg' => fn($filename) => $this->getSvgContent($filename),
			'siteName' => $this->siteName(),
			'currentYear' => $this->getYear(),
        ];
    }
	private function siteName(): string{
		return get_bloginfo('name', 'display');
	}
	private function getSvgContent($filename): string {
		if (!str_ends_with($filename, '.svg')):
            $filename .= '.svg';
		endif;
        $path = get_theme_file_path("resources/images/{$filename}");
        if(file_exists($path)):
            return file_get_contents($path);
		endif;
		return '';
	}
	private function getYear(): int{
		return date('Y');
	}
}
