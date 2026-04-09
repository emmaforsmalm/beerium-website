/*
* Plugin Name: Beerium-plugin
* Description: Custom REST API endpoints
* Version: 1.0.0
* Author: Emma Forsmalm
*/

<?php

# Förhindrar att någon når plugin:et direkt
if (!defined ('ABSPATH')) {
    exit;
}

# Funktioner för att lägga till olika typer av poster
add_action('init', 'beerium_register_event_post_type');

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