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
    public function with()
    {
        return [
            'publikacje' => $this->publikacje(),
            'tags' => $this->tags(),
        ];
    }

    /**
     * Returns all 'publikacja' custom post types.
     *
     * @return \WP_Query
     */
    protected function publikacje()
    {
        return new \WP_Query([
            'post_type' => 'publikacja',
            'posts_per_page' => -1,
        ]);
    }

    /**
     * Returns all 'tag-publikacji' terms.
     *
     * @return array
     */
    protected function tags()
    {
        return get_terms([
            'taxonomy' => 'tag-publikacji',
            'hide_empty' => true,
        ]);
    }
}
