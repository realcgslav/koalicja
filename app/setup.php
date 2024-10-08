<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;
use WP_REST_Response;
use WP_REST_Request;
use Illuminate\Support\Facades\Route;
use Roots\Acorn\Application;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();

    if (is_front_page()) {
        wp_enqueue_script('toggle-manifest', get_theme_file_uri('/resources/scripts/toggle-manifest.js'), [], null, true);
    }
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


add_action('rest_api_init', function () {
    register_rest_route('koalicja/v1', '/publikacje', [
        'methods' => 'GET',
        'callback' => function ($request) {
            $tags = $request->get_param('tags');
            $search = $request->get_param('search');
            $args = [
                'post_type' => 'publikacja',
                'posts_per_page' => -1,
                's' => $search,
            ];
 // Dodajemy zapytanie dla 'tax_query' tylko jeśli '$tag' nie jest puste
 if (!empty($tags)) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'tag-publikacji',
            'field' => 'slug',
            'terms' => explode(',', $tags), // Przyjmujemy tagi jako string rozdzielony przecinkami
            'operator' => 'IN', // Szukamy postów zawierających dowolny z tagów
        ],
    ];
}
            $query = new \WP_Query($args);
            $posts = [];

            if ($query->have_posts()) : 
                while ($query->have_posts()) : $query->the_post();
                    $id = get_the_ID();
                    $posts[] = [
                        'title' => get_the_title(),
                        'opis' => get_field('opis', $id),
                        'okladka' => get_field('okladka', $id) ? get_field('okladka', $id)['url'] : '', // Zakładając, że pole 'okladka' jest obrazem
                        'pdf' => get_field('pdf', $id) ? get_field('pdf', $id)['url'] : '', // Zakładając, że pole 'pdf' jest plikiem
                        'link' => get_permalink($id),
                    ];
                endwhile;
                wp_reset_postdata();
            endif;

            return new \WP_REST_Response($posts, 200);
        },
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('koalicja-ajax', get_theme_file_uri('/resources/scripts/publikacje-ajax.js'), ['jquery'], null, true);
    wp_localize_script('koalicja-ajax', 'koalicjaApi', [
        'root' => esc_url_raw(rest_url('koalicja/v1/publikacje')),
        'nonce' => wp_create_nonce('wp_rest'),
    ]);
});

add_action('after_setup_theme', function () {
    // Dodaj własny rozmiar obrazka (nazwa, szerokość, wysokość, crop)
    add_image_size('news-thumbnail', 300, 300, true);

    // Reszta kodu setup.php...
});

