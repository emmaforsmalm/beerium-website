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
add_action('init', 'register_member_post_type');
add_action('manage_member_posts_custom_column', 'fill_member_columns', 10,2)

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
        'menu_icon' => 'dashicons-calendar-alt',

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
        'menu_icon' => 'dashicons-beer',
    );

    register_post_type('product', $product_args);
}

#Funktion för att hantera väntande betalningar
function register_member_post_type() {
    $member_args = array(
        'public' => false,
        'show_ui' => true,
        'label' => 'Medlemmar',
        'supports' => ['title'],
        'menu_icon' => 'groups'
    );

    register_post_type('member', $member_args);
}

#Lägg till kolumner för medlemmar
function add_member_columns($columns) {
    $columns['member_name'] = 'Namn';
    $columns['member_email'] = 'E-postadress';
    $columns['member_reference'] = 'Referensnummer';
    $columns['member_payStatus'] = 'Betalning';
    $columns['member_welcome_email'] = 'Välkomstmejl';
    $columns['member_merch'] = 'Merch';
    return $columns;
}

add_filter('manage_member_posts_columns', 'add_member_columns');

#Fyll kolumnerna med data
function fill_member_columns($column, $post_id) {
    switch ($column) {
        case 'member_name':
            echo get_field('member_name', $post_id);
            break;
        case 'member_email':
            echo get_field('member_email', $post_id);
            break;
        case 'member_reference':
            echo get_field('member_reference', $post_id);
            break;
        case 'member_payStatus':
            $status = get_field('member_payStatus', $post_id);
            $color = $status === 'betald' ? 'green' : 'red';
            echo '<span style="color:' . $color . '">' . $status . '</span>';
            break;
        case 'member_welcome_email':
            $email = get_field('member_welcome_email', $post_id);
            $color = $email === 'skickat' ? 'green' : 'red';
            echo '<span style="color:' . $color . '">' . $email . '</span>';
            break;
        case 'member_merch':
            $merch = get_field('member_merch', $post_id);
            $color = $merch === 'skickat' ? 'green' : 'red';
            echo '<span style="color:' . $color . '">' . $merch . '</span>';
            break;
    }
}