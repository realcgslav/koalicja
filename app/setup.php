<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;
use WP_REST_Response;
use WP_REST_Request;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

// Register the 'tag-publikacja' taxonomy for 'publikacja' post type.
add_action('init', function () {
    register_taxonomy('tag-publikacja', 'publikacja', [
        'label' => __('Tag Publikacja', 'sage'),
        'rewrite' => ['slug' => 'tag-publikacja'],
        'hierarchical' => true,
    ]);
});

// Register a REST API endpoint for 'publikacja'.
add_action('rest_api_init', function () {
    register_rest_route('sage/v1', '/publikacja', [
        'methods' => 'GET',
        'callback' => 'App\\rest_api_get_publikacje',
        'permission_callback' => '__return_true',
    ]);
});

function rest_api_get_publikacje(WP_REST_Request $request) {
    $args = [
        'post_type' => 'publikacja',
        'posts_per_page' => -1,
    ];

    $query = new \WP_Query($args);
    $posts = [];

    foreach ($query->posts as $post) {
        // Fetch taxonomy terms for the post
        $taxonomies = wp_get_post_terms($post->ID, 'tag-publikacja', ['fields' => 'all']);

        $taxonomies_formatted = array_map(function($term) {
            return [
                'name' => $term->name,
                'slug' => $term->slug,
            ];
        }, $taxonomies);

        $posts[] = [
            'title' => get_the_title($post->ID),
            'description' => get_field('description', $post->ID), // Assuming ACF is being used
            'taxonomies' => $taxonomies_formatted,
        ];
    }

    return new WP_REST_Response($posts, 200);
}
