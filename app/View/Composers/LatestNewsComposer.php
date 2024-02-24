<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class LatestNewsComposer extends Composer
{
    protected static $views = ['partials.latest-news'];

    public function with()
    {
        return [
            'latestNews' => $this->latestNews(),
        ];
    }

    private function latestNews()
    {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'orderby' => 'date',
            'post__not_in' => get_option('sticky_posts'),
        ];

        $query = new WP_Query($args);
        
        return $query->posts;
    }
}
