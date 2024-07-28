<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class StickyPostsComposer extends Composer
{
    protected static $views = [
        'partials.sticky-slider',
    ];

    public function with()
    {
        $sticky_posts = get_option('sticky_posts');
        $sticky_posts = get_posts([
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
        ]);

        return [
            'sticky_posts' => $sticky_posts,
        ];
    }
}