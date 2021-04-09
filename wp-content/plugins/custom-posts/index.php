<?php

/*
Plugin Name:KawserBlog Custom Posts
Plugin URI: http://kawser-ahmed.xyz
Description: Social link simple wp plugin development learning.
Author: Kawser Ahmed
Version: 1.0
Author URI: http://kawser-ahmed.xyz
*/


function c4_Post_register(){
        register_post_type('c4post',
                array(
                    'labels'      => array(
                        'name'          => __('Tut', 'textdomain'),
                        'singular_name' => __('c4post', 'textdomain'),
                        'add_new' => __('Add tut'),
                        'add_new_item' => __('Add new tut'),
                    ),
                        'taxonomies'=>array('category', 'post_tag'), 
                        'public'      => true,
                        'supports' =>array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
                )
            );

        }

add_action( 'init', 'c4_Post_register');


// >> Create Shortcode to Display Movies Post Types
 
function diwp_create_shortcode_movies_post_type(){
 
    $args = array(
                    'post_type'      => 'c4post',
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
                 );
 
    $query = new WP_Query($args);
 
    if($query->have_posts()) :
 
        while($query->have_posts()) :
 
            $query->the_post() ;
                     
        $result .= '<div class="movie-item">';
        $result .= '<div class="movie-poster">' . get_the_post_thumbnail() . '</div>';
        $result .= '<div class="movie-name">' . get_the_title() . '</div>';
        $result .= '<div class="movie-desc">' . get_the_content() . '</div>'; 
        $result .= '</div>';
 
        endwhile;
 
        wp_reset_postdata();
 
    endif;    
 
    return $result;            
}
 
add_shortcode( 'custom-posts', 'diwp_create_shortcode_movies_post_type' ); 
 



function wporg_register_taxonomy_course() {
    $labels = array(
        'name'              => _x( 'Tutorial Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Course', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Courses' ),
        'all_items'         => __( 'All Courses' ),
        'parent_item'       => __( 'Parent Course' ),
        'parent_item_colon' => __( 'Parent Course:' ),
        'edit_item'         => __( 'Edit Course' ),
        'update_item'       => __( 'Update Course' ),
        'add_new_item'      => __( 'Add New Course' ),
        'new_item_name'     => __( 'New Course Name' ),
        'menu_name'         => __( 'Course' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'course' ],
    );
    register_taxonomy( 'c4tax', 'c4post', $args );
}
add_action( 'init', 'wporg_register_taxonomy_course' );








?>