<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PublikacjeDisplayComposer extends Composer
{
    protected static $views = [
        'template-publikacje',
    ];

    public function with()
    {
        return [
            'publikacje' => $this->publikacje(),
            'tags' => $this->tags(),
        ];
    }

    protected function publikacje()
    {
        $args = [
            'post_type' => 'publikacja',
            'posts_per_page' => -1,
        ];

        $query = new \WP_Query($args);
        $posts = [];

        if ($query->have_posts()) : 
            while ($query->have_posts()) : $query->the_post();
                $id = get_the_ID();
                $posts[] = [
                    'title' => get_the_title(),
                    'opis' => get_field('opis', $id),
                    'okladka' => get_field('okladka', $id),
                    'pdf' => get_field('pdf', $id),
                    'link' => get_permalink($id), // Ensure link is included
                ];
            endwhile;
            wp_reset_postdata();
        endif;

        return $posts;
    }

    protected function tags()
    {
        return get_terms([
            'taxonomy' => 'tag-publikacji',
            'hide_empty' => true,
        ]);
    }
}
