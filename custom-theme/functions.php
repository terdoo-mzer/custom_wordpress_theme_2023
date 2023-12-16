<?php


// Add Menu Items dynamically
function customTheme_menus()
{
    $location = array(
        'primary' => 'Desktop Primary Left Sidebar',
        'footer' => 'Footer Menu Items'
    );

    register_nav_menus($location);
}
add_action('init', 'customTheme_menus');

// Add theme support functionality
function customTheme_add_theme_support()
{
    // https://developer.wordpress.org/reference/functions/add_theme_support/
    add_theme_support("title-tag");     // Page title dynamic
    add_theme_support('custom-logo'); // Logo
    add_theme_support('post-thumbnails'); // Post Thumbnails
}
add_action('after_setup_theme', 'customTheme_add_theme_support');

// Enqueue Styles
function custom_theme_register_stylesheet()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('custom_style', get_template_directory_uri() . '/style.css', array('bootstrap_style'), $version, 'all');
    wp_enqueue_style('bootstrap_style', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('font_awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}
add_action('wp_enqueue_scripts', 'custom_theme_register_stylesheet');

// Enqueue Scripts
function custom_theme_register_scripts()
{
    wp_enqueue_script('custom_theme_jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('custom_theme_popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('custom_theme_bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('custom_theme_main_js', get_template_directory_uri() . 'js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'custom_theme_register_scripts');


function customTheme_widget_areas()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action('widgets_init', 'customTheme_widget_areas');