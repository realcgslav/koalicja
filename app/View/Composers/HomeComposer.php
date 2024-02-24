<?php
namespace App\View\Composers;
use Roots\Acorn\View\Composer;

function getPinnedNews()
{
    $sticky = get_option('sticky_posts');
    rsort($sticky); // Sort the stickies with the newest ones at the top
    $sticky = array_slice($sticky, 0, 3); // Get the 3 most recent stickies

    $args = [
        'post__in' => $sticky,
        'ignore_sticky_posts' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    return new WP_Query($args);
}

function getLatestNews()
{
    $args = [
        'post__not_in' => get_option('sticky_posts'),
        'ignore_sticky_posts' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,
    ];

    return new WP_Query($args);
}

function getCustomPosts()
{
    $args = [
        'post_type' => 'your_custom_post_type',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    return new WP_Query($args);
}
