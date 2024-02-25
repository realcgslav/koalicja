<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PublikacjeDisplayComposer extends Composer
{
    protected static $views = ['template-publikacje'];

    public function with()
    {
        return [
            'publikacje' => $this->publikacje(),
            'terms' => $this->terms(),
        ];
    }

    private function publikacje()
    {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = [
            'post_type' => 'publikacja',
            'posts_per_page' => 10,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC',
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

    private function terms()
    {
        return get_terms([
            'taxonomy' => 'tag-publikacji',
            'hide_empty' => false,
        ]);
    }
}
