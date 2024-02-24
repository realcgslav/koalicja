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
        return [
            'publikacje' => $this->publikacje(),
        ];
    }

    /**
     * Query 'publikacja' posts with 'tag-publikacja' taxonomy.
     *
     * @return mixed
     */
    protected function publikacje()
    {
        $args = [
            'post_type' => 'publikacja',
            'posts_per_page' => -1, // Fetch all posts
            'tax_query' => [
                [
                    'taxonomy' => 'tag-publikacja',
                    'field'    => 'slug',
                    'terms'    => 'tag-publikacja',
                ],
            ],
        ];

        return new \WP_Query($args);
    }
}
