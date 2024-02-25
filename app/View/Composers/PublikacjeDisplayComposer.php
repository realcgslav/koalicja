<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PublikacjeDisplayComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-publikacje',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function override()
    {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = [
            'post_type' => 'publikacja',
            'posts_per_page' => 10,
            'paged' => $paged,
            'tax_query' => [
                [
                    'taxonomy' => 'tag-publikacji',
                    'field' => 'slug',
                    'terms' => $_GET['tag'] ?? '', // Zabezpiecz przed ostrzeżeniem PHP, jeśli 'tag' nie jest ustawiony
                ]
            ]
        ];
        
        $the_query = new \WP_Query($args);
        $terms = get_terms([
            'taxonomy' => 'tag-publikacji',
            'hide_empty' => false,
        ]);

        return [
            'the_query' => $the_query,
            'terms' => $terms,
        ];
    }
}