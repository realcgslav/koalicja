<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PublikacjeComposer extends Composer
{
    protected static $views = ['partials.publikacje'];

    public function with()
    {
        return [
            'publikacje' => $this->publikacje(),
        ];
    }

    private function publikacje()
    {
        $args = [
            'post_type' => 'publikacja',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_query' => [
                [
                    'key' => 'na_glownej',
                    'value' => '1',
                    'compare' => '=',
                ]
            ],
        ];

        $publikacje = new \WP_Query($args);
        $posts = [];

        if ($publikacje->have_posts()) : 
            while ($publikacje->have_posts()) : $publikacje->the_post();
                $id = get_the_ID();
                $posts[] = [
                    'title' => get_the_title(),
                    'opis' => get_field('opis', $id),
                    'okladka' => get_field('okladka', $id),
                    'pdf' => get_field('pdf', $id),
                ];
            endwhile;
            wp_reset_postdata();
        endif;

        return $posts;
    }
}
