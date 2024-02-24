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
            'post__in' => $sticky_posts,
            'ignore_sticky_posts' => 1,
            'numberposts' => 3,
        ]);

        return [
            'sticky_posts' => $sticky_posts,
        ];
    }
}