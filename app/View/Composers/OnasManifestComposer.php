<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class OnasManifestComposer extends Composer
{
    protected static $views = [
        'partials.manifest', // Upewnij się, że ten widok jest poprawny
        'partials.struktura', // Dodaj inne widoki, które mają używać tego pola
        // Dodaj tutaj inne widoki, które mają używać tego pola
    ];

    public function with()
    {
        return [
            'manifest' => $this->getManifest(),
        ];
    }

    private function getManifest()
    {
        $page = get_page_by_path('o-nas');
        if ($page) {
            return get_field('manifest', $page->ID);
        }
        return null;
    }
}
