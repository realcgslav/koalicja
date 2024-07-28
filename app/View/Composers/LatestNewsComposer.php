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
            'posts_per_page' => 6,
            'order' => 'DESC',
            'orderby' => 'date',
            'post__not_in' => get_option('sticky_posts'),
        ];

        $query = new WP_Query($args);
        return array_map(function ($post) {
            return (object) [
                'ID' => $post->ID,
                'post_title' => get_the_title($post->ID),
                'post_thumbnail_url' => get_the_post_thumbnail_url($post->ID, 'news-thumbnail'),
                'permalink' => get_permalink($post->ID),
            ];
        }, $query->posts);
    }
}