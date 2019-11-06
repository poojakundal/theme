<?php
    if ( function_exists( 'add_theme_support' ) ) { 
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
        add_image_size( 'screen-shot', 720, 540 ); // Full size screen
    }

    add_action('init', 'portfolio_register');  
   
    function portfolio_register() {  
        $args = array(  
            'label' => __('Portfolio'),  
            'singular_label' => __('portfolio'),  
            'public' => true,  
            'show_ui' => true,  
            'capability_type' => 'post',  
            'hierarchical' => false,  
            'rewrite' => true,  
            'supports' => array('title', 'editor', 'thumbnail')  
        );  
    
        register_post_type( 'portfolio' , $args );  
    }
        
    function register_portfolio_category_taxonomy() {

        $labels = array(
            'name'                       => _x( 'portfolio Category', 'taxonomy general name' ),
            'singular_name'              => _x( 'portfolio Category', 'taxonomy singular name' ),
            'search_items'               => __( 'Search portfolio Category' ),
            'popular_items'              => __( 'Popular portfolio Category' ),
            'all_items'                  => __( 'All portfolio Category' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit portfolio Category' ),
            'update_item'                => __( 'Update portfolio Category' ),
            'add_new_item'               => __( 'Add New portfolio Category' ),
            'new_item_name'              => __( 'New portfolio Category Name' ),
            'separate_items_with_commas' => __( 'Separate portfolio Category with commas' ),
            'add_or_remove_items'        => __( 'Add or remove portfolio Category' ),
            'choose_from_most_used'      => __( 'Choose from the most used portfolio Category' ),
            'not_found'                  => __( 'No portfolio Category found.' ),
            'menu_name'                  => __( 'portfolio Category' ),
        );
        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'portfolio Category' ),
        );
        register_taxonomy('portfolio_category',array('portfolio'), $args);
    }

    function register_portfolio_tag_taxonomy() {

        $labels = array(
            'name'                       => _x( 'portfolio Tag', 'taxonomy general name' ),
            'singular_name'              => _x( 'portfolio Tag', 'taxonomy singular name' ),
            'search_items'               => __( 'Search portfolio Tag' ),
            'popular_items'              => __( 'Popular portfolio Tag' ),
            'all_items'                  => __( 'All portfolio Tag' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit portfolio Tag' ),
            'update_item'                => __( 'Update portfolio Tag' ),
            'add_new_item'               => __( 'Add New portfolio Tag' ),
            'new_item_name'              => __( 'New portfolio Tag Name' ),
            'separate_items_with_commas' => __( 'Separate portfolio Tag with commas' ),
            'add_or_remove_items'        => __( 'Add or remove portfolio Tag' ),
            'choose_from_most_used'      => __( 'Choose from the most used portfolio Tag' ),
            'not_found'                  => __( 'No portfolio Tag found.' ),
            'menu_name'                  => __( 'portfolio Tag' ),
        );
        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'portfolio Tag' ),
        );
        register_taxonomy('portfolio_tag','portfolio', $args);
    }

    add_action( 'init', 'register_portfolio_category_taxonomy' );
    add_action( 'init', 'register_portfolio_tag_taxonomy' );

    add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");   
    
    function portfolio_edit_columns($columns){  
            $columns = array(  
                "cb" => "<input type=\"checkbox\" />",  
                "title" => "portfolio",  
                "description" => "Description",  
            );  
    
            return $columns;  
    }  
    
    add_action("manage_posts_custom_column",  "portfolio_custom_columns"); 
    
    function portfolio_custom_columns($column){  
            global $post;  
            switch ($column)  
            {  
                case "description":  
                    the_excerpt();  
                    break;  
            }  
    }
 
?>