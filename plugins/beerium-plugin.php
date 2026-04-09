<?php
/*
* Plugin Name: Beerium-plugin
* Description: Custom REST API endpoints
* Version: 1.0.0
* Author: Emma Forsmalm
*/

# Förhindrar att någon når plugin:et direkt
if (!defined ('ABSPATH')) {
    exit;
}

# Funktioner för att lägga till olika typer av poster
add_action('init', 'beerium_register_event_post_type');
add_action('init', 'beerium_register_product_post_type');

# Funktion för att registrera event-post
function beerium_register_event_post_type() {
    $event_args = array(
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'menu_name' => 'Events',
            'add_new' => 'Lägg till event',
            'add_new_item' => 'Lägg till event',
            'new_item' => 'Nytt event',
            'edit_item' => 'Redigera event',
            'view_item' => 'Se event',
            'all_items' => 'Alla event'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
    );

    register_post_type('event', $event_args);
}

# Funktion för att registrera produkt-post
function beerium_register_product_post_type() {
    $product_args = array(
        'labels' => array(
            'name' => 'Produkter',
            'singular_name' => 'Produkt',
            'menu_name' => 'Produkter',
            'add_new' => 'Lägg till produkt',
            'add_new_item' => 'Lägg till produkt',
            'new_item' => 'Ny produkt',
            'edit_item' => 'Redigera produkt',
            'view_item' => 'Se produkt',
            'all_items' => 'Alla produkter'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
    );

    register_post_type('product', $product_args);
}