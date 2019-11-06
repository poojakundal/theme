<?php

/**
 * Top Header Social Icon Function Area
*/
if ( ! function_exists( 'uncode_lite_social_icon' ) ) {
    function uncode_lite_social_icon() { 
        $uncode_lite_facebook_url =  get_theme_mod('uncode_lite_facebook_url') ;
        $uncode_lite_twitter_url =  get_theme_mod('uncode_lite_twitter_url') ;
        $uncode_lite_google_plus_url =  get_theme_mod('uncode_lite_google_plus_url') ;
        $uncode_lite_youtube_url =  get_theme_mod('uncode_lite_youtube_url') ;
        $uncode_lite_linkedin_url =  get_theme_mod('uncode_lite_linkedin_url') ;
        ?>
        <ul>
            <?php if(!empty( $uncode_lite_facebook_url )) { ?>              
                <li>
                    <a href="<?php echo esc_url($uncode_lite_facebook_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
            <?php }  ?>

            <?php if(!empty( $uncode_lite_twitter_url )) { ?>              
                <li>
                    <a href="<?php echo esc_url($uncode_lite_twitter_url); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                </li>
            <?php }  ?>

            <?php if(!empty( $uncode_lite_google_plus_url )) { ?>              
                <li>
                    <a href="<?php echo esc_url($uncode_lite_google_plus_url); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                </li>
            <?php }  ?>

             <?php if(!empty( $uncode_lite_youtube_url )) { ?>              
                <li>
                    <a href="<?php echo esc_url($uncode_lite_youtube_url); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                </li>
            <?php }  ?>

            <?php if(!empty( $uncode_lite_linkedin_url )) { ?>              
                <li>
                    <a href="<?php echo esc_url($uncode_lite_linkedin_url); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                </li>
            <?php }  ?> 
        </ul>
        <?php 
    }
}
add_filter( 'uncode_lite_social', 'uncode_lite_social_icon', 10 );


/**
 * Front Page About Section
*/
if ( ! function_exists( 'uncode_lite_front_page_about_section' ) ) {
    function uncode_lite_front_page_about_section() {
        $about_options =  get_theme_mod( 'uncode_lite_about_section_option', 'hide' ) ;
        $about_features_img =  get_theme_mod( 'uncode_lite_about_features_image' ) ;

        if(!empty( $about_options ) && $about_options == 'show'){ ?>
            <section class="about-section">                
                <div class="about-content-wrapper container clearfix">
                    
                    <?php
                        $about_page_id = intval( get_theme_mod( 'uncode_lite_about_section_page', '0' ));
                        if( !empty( $about_page_id ) ) {
                        $about_query = new WP_Query( 'page_id='.$about_page_id );
                        if( $about_query->have_posts() ) { while( $about_query->have_posts() ) { $about_query->the_post();
                        $image_path = wp_get_attachment_image_src( get_post_thumbnail_id() , 'medium', true );         
                   ?>
                        <div class="about-features-image">
                            <?php if( has_post_thumbnail() ) { ?>
                                   <figure><img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php the_title_attribute(); ?>" /></figure>
                            <?php }else{ ?>
                                    <figure><img src="<?php echo esc_url( $about_features_img ); ?>" alt="<?php the_title_attribute(); ?>" /></figure>
                            <?php } ?>
                        </div>
                        <div class="about-content">
                            <h2><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                            <div class="readmore">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo esc_html__('Read More','uncode-lite'); ?>
                                </a>
                            </div>
                        </div>
                    <?php } } wp_reset_postdata(); } ?>

                </div>
            </section>
        <?php   
        }
    }
}
add_action( 'uncode-lite-about-section', 'uncode_lite_front_page_about_section' );


/**
 * Front Page Services Section
*/
if ( ! function_exists( 'uncode_lite_front_page_services_section' ) ) {
    function uncode_lite_front_page_services_section() {
        $services_options = esc_attr( get_theme_mod( 'uncode_lite_services_section_option', 'hide' ) );

        if(!empty( $services_options ) && $services_options == 'show'){ ?>
            <div class="uncode-services-section">                        
                <div class="servicesrow">
                    <div class="row-items clearfix">

                        <div class="serviceswrap servicesone">
                            <?php
                                $services_one_page_id = intval( get_theme_mod( 'uncode_lite_services_area_one', 2 ));
                                if( !empty( $services_one_page_id ) ) {
                                $services_one_query = new WP_Query( 'page_id='.$services_one_page_id );
                                if( $services_one_query->have_posts() ) { while( $services_one_query->have_posts() ) { $services_one_query->the_post();
                            ?>
                                <div class="item-id"><?php echo esc_html__('01.','uncode-lite'); ?></div>
                                <div class="item-title"><?php the_title(); ?></div>
                                <div class="item-text"><?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 25)); ?></div>

                            <?php } } wp_reset_postdata(); } ?>                            
                        </div>

                        <div class="serviceswrap servicestwo">
                            <?php
                                $services_one_page_id = intval( get_theme_mod( 'uncode_lite_services_area_two', 2 ));
                                if( !empty( $services_one_page_id ) ) {
                                $services_one_query = new WP_Query( 'page_id='.$services_one_page_id );
                                if( $services_one_query->have_posts() ) { while( $services_one_query->have_posts() ) { $services_one_query->the_post();
                            ?>
                                <div class="item-id"><?php echo esc_html__('02.','uncode-lite'); ?></div>
                                <div class="item-title"><?php the_title(); ?></div>
                                <div class="item-text"><?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 25)); ?></div>

                            <?php } } wp_reset_postdata(); } ?>                            
                        </div>

                        <div class="serviceswrap servicesthree">
                            <?php
                                $services_one_page_id = intval( get_theme_mod( 'uncode_lite_services_area_three', 2 ));
                                if( !empty( $services_one_page_id ) ) {
                                $services_one_query = new WP_Query( 'page_id='.$services_one_page_id );
                                if( $services_one_query->have_posts() ) { while( $services_one_query->have_posts() ) { $services_one_query->the_post();
                            ?>
                                <div class="item-id"><?php echo esc_html__('03.','uncode-lite'); ?></div>
                                <div class="item-title"><?php the_title(); ?></div>
                                <div class="item-text">
                                    <?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 25)); ?>
                                </div>

                            <?php } } wp_reset_postdata(); } ?>                            
                        </div>
                       

                    </div>
                </div>
            </div><!-- .section-content-wrapper -->
        <?php   
        }
    }
}
add_action( 'uncode-lite-services-section', 'uncode_lite_front_page_services_section' );


/**
 * Page breadcrumb funciton area
*/
if ( ! function_exists( 'uncode_lite_breadcrumb_section' ) ) {
    function uncode_lite_breadcrumb_section() {
        global $post;
        $breadcrumb_options =  get_theme_mod('uncode_lite_breadcrumb_options', 'hide') ;
        $breadcrumb_menu =  get_theme_mod('uncode_lite_breadcrumb_menu', 'show') ;
        $breadcrumb_bg_image =  get_theme_mod('uncode_lite_breadcrumb_bg_image') ;
        
        if(!empty( $breadcrumb_bg_image )){
            $breadcrumb_bg_image = $breadcrumb_bg_image;
        }else{
          $breadcrumb_bg_image = get_template_directory_uri().'/assets/images/bg-service.jpg';
        }

        if($breadcrumb_options == 'show') { ?>
            <div class="page_header_wrap page-banner" style="background:url('<?php echo esc_url($breadcrumb_bg_image); ?>') no-repeat center; background-size: cover;">
                <div class="container">
                    
                    <header class="entry-header">
                        <?php if( is_archive() || is_tag() || is_author() || is_category() ) {
                                the_archive_title( '<h1 class="entry-title">', '</h1>' );
                            }elseif( is_search() ){ ?>
                              <header class="page-header">
                                <h1 class="entry-title">
                                    <?php
                                        /* translators: %s : search keyword */
                                        printf( esc_html__( 'Search Results for: %s', 'uncode-lite' ), '<span>' . get_search_query() . '</span>' );
                                    ?>
                                </h1>
                              </header><!-- .page-header --> 
                            <?php }elseif( is_404() ){ ?>
                              <header class="page-header">
                                <h1 class="entry-title"><?php echo esc_html__('Oops! page can not be found.','uncode-lite') ?></h1>
                              </header><!-- .page-header -->   
                            <?php } elseif( is_home() ){ ?>
                              <header class="page-header">
                                <h1 class="entry-title"><?php echo esc_html__('Blogs','uncode-lite') ?></h1>
                              </header><!-- .page-header -->   
                            <?php }else{
                              the_title( '<h1 class="entry-title">', '</h1>' );   
                            }
                        ?>                   
                    </header><!-- .entry-header -->

                    <?php if($breadcrumb_menu == 'show') {  uncode_lite_breadcrumbs_menu(); } ?>

                </div>
            </div>
        <?php }
    }
}
add_action( 'uncode-lite-breadcrumb', 'uncode_lite_breadcrumb_section' );


/**
 * Front Page Our Features Section
*/
if ( ! function_exists( 'uncode_lite_front_page_features_section' ) ) {
    function uncode_lite_front_page_features_section() {

        $features_options = esc_attr( get_theme_mod( 'uncode_lite_features_section_option', 'hide' ) );

        $features_main_title = get_theme_mod( 'uncode_lite_features_section_main_title', 'Our <span>Features</span>' );
        $features_desc  =  get_theme_mod( 'uncode_lite_features_description', 'Better security happens when we work together, Get tips on further steps you can take to protect yourself online.' ) ;
        
        if(!empty( $features_options ) && $features_options == 'show'){ ?>
            <section class="uncode-features-section">
                <div class="container">
                    <header class="section-title">
                        <h2><?php echo wp_kses_post($features_main_title); ?></h2>
                        <p><?php echo esc_textarea($features_desc); ?></p>
                    </header>
                    
                    <div class="features-area-wrapper img-responsive">
                            
                        <div class="featuresrow clearfix">

                            <div class="row-items clearfix">

                                <div class="featureswrap featuresone">
                                    <?php
                                        $features_one_icon =  get_theme_mod( 'features_icon_0','flaticon-flag' );
                                        $features_one_page_id = intval( get_theme_mod( 'features_page_id_0', '0' ));
                                        if( !empty( $features_one_page_id ) ) {
                                        $features_one_query = new WP_Query( 'page_id='.$features_one_page_id );
                                        if( $features_one_query->have_posts() ) { while( $features_one_query->have_posts() ) { $features_one_query->the_post();
                                    ?>
                                        <div class="item-icon <?php echo esc_attr($features_one_icon); ?>"> </div>
                                        <div class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="item-text"><?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 12)); ?></div>
                                        <div class="readmore">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo esc_html__('Read More','uncode-lite'); ?>
                                            </a>
                                        </div>
                                    <?php } } wp_reset_postdata();  } ?>  
                                </div>


                                <div class="featureswrap featurestwo">
                                    <?php
                                        $features_two_icon =  get_theme_mod( 'features_icon_1','flaticon-clock-1' ) ;
                                        $features_two_page_id = intval( get_theme_mod( 'features_page_id_1', '0' ));
                                        if( !empty( $features_two_page_id ) ) {
                                        $features_two_query = new WP_Query( 'page_id='.$features_two_page_id );
                                        if( $features_two_query->have_posts() ) { while( $features_two_query->have_posts() ) { $features_two_query->the_post();
                                    ?>
                                        <div class="item-icon <?php echo esc_attr($features_two_icon); ?>"></div>
                                        <div class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="item-text"><?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 12)); ?></div>
                                         <div class="readmore">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo esc_html__('Read More','uncode-lite'); ?>
                                            </a>
                                        </div>
                                    <?php } } wp_reset_postdata();  } ?>  
                                </div>

                                <div class="featureswrap featuresthree">
                                    <?php
                                        $features_three_icon =  get_theme_mod( 'features_icon_2','flaticon-fountain-pen-2' ) ;
                                        $features_three_page_id = intval( get_theme_mod( 'features_page_id_2', '0' ));
                                        if( !empty( $features_three_page_id ) ) {
                                        $features_three_query = new WP_Query( 'page_id='.$features_three_page_id );
                                        if( $features_three_query->have_posts() ) { while( $features_three_query->have_posts() ) { $features_three_query->the_post();
                                    ?>
                                        <div class="item-icon <?php echo esc_attr($features_three_icon); ?>"></div>
                                        <div class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="item-text"><?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 12)); ?></div>
                                         <div class="readmore">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo esc_html__('Read More','uncode-lite'); ?>
                                            </a>
                                        </div>
                                    <?php } } wp_reset_postdata();  } ?>  
                                </div>

                                <div class="featureswrap featuresfour">
                                    <?php
                                        $features_four_icon =  get_theme_mod( 'features_icon_3','flaticon-battery' ) ;
                                        $features_four_page_id = intval( get_theme_mod( 'features_page_id_3', '0' ));
                                        if( !empty( $features_four_page_id ) ) {
                                        $features_four_query = new WP_Query( 'page_id='.$features_four_page_id );
                                        if( $features_four_query->have_posts() ) { while( $features_four_query->have_posts() ) { $features_four_query->the_post();
                                    ?>
                                        <div class="item-icon <?php echo esc_attr($features_four_icon); ?>"></div>
                                        <div class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="item-text"><?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 12)); ?></div>
                                         <div class="readmore">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo esc_html__('Read More','uncode-lite'); ?>
                                            </a>
                                        </div>
                                    <?php } } wp_reset_postdata();  } ?>  
                                </div>

                               
                            </div>

                        </div>

                    </div><!-- .section-content-wrapper -->
                </div>
            </section>
        <?php   
        }
    }
}
add_action( 'uncode-lite-features-section', 'uncode_lite_front_page_features_section' );


/**
 * Front Page Our Blogs Section
*/
if ( ! function_exists( 'uncode_lite_front_page_blogs_section' ) ) {
    function uncode_lite_front_page_blogs_section() {
        $blog_options = esc_attr( get_theme_mod( 'uncode_lite_blog_section_option', 'hide' ) );

        $blog_main_title = get_theme_mod( 'uncode_lite_blog_section_main_title', 'Recent <span>Blog</span>' );
        $blog_desc  =  get_theme_mod( 'uncode_lite_blog_description', 'Better security happens when we work together, Get tips on further steps you can take to protect yourself online.' ) ;
       
        if(!empty( $blog_options ) && $blog_options == 'show'){ ?>
            <section class="blog-section">
                <div class="container clearfix">
                    <header class="section-title">
                        <h2><?php echo wp_kses_post($blog_main_title); ?></h2>
                        <p><?php echo esc_textarea($blog_desc); ?></p>
                    </header>

                    <div class="blogwrap blogwrap">
                        <?php
                            $blog_cat_id = intval( get_theme_mod( 'uncode_lite_blog_team_id', 1 ));
                            if( !empty( $blog_cat_id ) ) {
                            $blog_args = array(
                                'post_type' => 'post',
                                'tax_query' => array(
                                    array(
                                        'taxonomy'  => 'category',
                                        'field'     => 'id', 
                                        'terms'     => $blog_cat_id                                                                 
                                    )),
                                'posts_per_page' => 3
                            );

                            $blog_query = new WP_Query( $blog_args );
                            if( $blog_query->have_posts() ) { while( $blog_query->have_posts() ) { $blog_query->the_post();
                            $image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'uncode-lite-homeblog-image', true );                           
                        ?>
                            <div class="blogsinfo">
                                <?php if( has_post_thumbnail() ) { ?>
                                    <div class="blog-image">
                                        <figure><img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php the_title_attribute(); ?>" /></figure>
                                        <div class="blogauthor">
                                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
                                                <?php echo get_avatar( get_the_author_meta('ID'), 50); ?>
                                                <span><?php the_author(); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php   } ?>
                                <div class="blog-info">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 18)); ?>                               
                                </div> 
                                <div class="metainfo clearfix">
                                    <span class="blog-readmore">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More','uncode-lite') ?></a>
                                    </span>
                                    <span class="blog-date">
                                        <?php echo esc_attr( get_the_date() ); ?>
                                    </span>
                                </div>                        
                            </div>
                        <?php  } } wp_reset_postdata();  } ?> 
                    </div>
                </div>

            </section>
        <?php   
        }
    }
}
add_action( 'uncode-lite-blog-section', 'uncode_lite_front_page_blogs_section' );


/**
 * Front Page Our Portfolio Section
*/
if ( ! function_exists( 'uncode_lite_front_page_portfolio_section' ) ) {
    function uncode_lite_front_page_portfolio_section() {
        $portfolio_options =  get_theme_mod( 'uncode_lite_portfolio_section_option', 'hide' ) ;

        $portfolio_main_title = get_theme_mod( 'uncode_lite_portfolio_section_main_title', 'Recent <span>Portfolio</span>' );
        $portfolio_desc  =  get_theme_mod( 'uncode_lite_portfolio_description', 'Better security happens when we work together, Get tips on further steps you can take to protect yourself online.' ) ;
       
        if(!empty( $portfolio_options ) && $portfolio_options == 'show'){ ?>
            <section class="portfolio-section">
                <header class="section-title">
                    <h2><?php echo wp_kses_post($portfolio_main_title); ?></h2>
                    <p><?php echo esc_textarea($portfolio_desc );?></p>
                </header>

                <div class="portfoliowrap clearfix">
                    <?php
                        $portfolio_cat_id = intval( get_theme_mod( 'uncode_lite_portfolio_team_id', '0' ));
                        if( !empty( $portfolio_cat_id ) ) {
                        $portfolio_args = array(
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                    'taxonomy'  => 'category',
                                    'field'     => 'id', 
                                    'terms'     => $portfolio_cat_id                                                                 
                                )),
                            'posts_per_page' => 8
                        );

                        $portfolio_query = new WP_Query( $portfolio_args );
                        if( $portfolio_query->have_posts() ) { while( $portfolio_query->have_posts() ) { $portfolio_query->the_post();
                        $image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'uncode-lite-portfolio-image', true );                           
                    ?>
                        <div class="portfolioinfo">
                            <?php if( has_post_thumbnail() ) { ?>
                                <div class="portfolio-image">
                                    <figure><img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php the_title_attribute(); ?>" /></figure>
                                    <div class="portfolio-info">
                                        <div class="portfolio-infowrap">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <?php echo esc_html(uncode_lite_word_count(get_the_excerpt(), 15)); ?>                                
                                        </div>
                                    </div> 
                                </div>
                            <?php  } ?>                                                                              
                        </div>
                    <?php  } } wp_reset_postdata();  } ?> 
                </div>
            </section>
        <?php   
        }
    }
}
add_action( 'uncode-lite-portfolio-section', 'uncode_lite_front_page_portfolio_section' );


/**
 * Front Page Call To Action Section
*/
if ( ! function_exists( 'uncode_lite_front_page_call_to_action_section' ) ) {
    function uncode_lite_front_page_call_to_action_section() {
        $call_to_action_options = esc_attr( get_theme_mod( 'uncode_lite_call_to_action_section_option', 'hide' ) );

 
        $call_action_title =  get_theme_mod( 'uncode_lite_call_to_action_section_main_title', 'Want to Learn More ?' ) ;
        $call_action_desc  =  get_theme_mod( 'uncode_lite_call_to_action_description', 'Build promptly, Launch Fast' ) ;
        
        $uncode_lite_button_title =  get_theme_mod( 'uncode_lite_call_to_action_button_title', 'Read More' ) ;
        $uncode_lite_button_url =  get_theme_mod( 'uncode_lite_call_to_action_button_url', esc_url( home_url( '/' ) ).'#focus' ) ;

        if(!empty( $call_to_action_options ) && $call_to_action_options == 'show'){ ?>
            <section class="call-action-section">
                <div class="container clearfix">
                    <div class="call-content-wrapper">
                        <div class="call-title">
                            <?php if(!empty( $call_action_title )) { ?>
                                <h2><?php echo esc_attr($call_action_title); ?></h2>
                            <?php } ?>
                        </div>

                        <div class="call-desc">
                            <?php if(!empty( $call_action_desc )) { ?>
                                <p><?php echo esc_html($call_action_desc); ?></p>
                            <?php } ?>
                        </div>
                        <div class="mainbanner-button-wrap">
                        <?php if( !empty( $uncode_lite_button_title ) ) { ?>
                            <div class="first-button">
                                <a href="<?php echo esc_url($uncode_lite_button_url); ?>">
                                    <?php echo esc_attr($uncode_lite_button_title); ?>
                                </a>
                            </div>
                        <?php } ?>                  
                        </div>
                    </div>
                </div>
            </section>
        <?php   
        }
    }
}
add_action( 'uncode-lite-calltoaction-section', 'uncode_lite_front_page_call_to_action_section' );


/**
 * Front Page Quick Contact Info Section
*/
if ( ! function_exists( 'uncode_lite_front_page_quick_contact_section' ) ) {
    function uncode_lite_front_page_quick_contact_section() {
        $quickinfo_options =  get_theme_mod( 'uncode_lite_contact_section_option', 'hide' );

        $quickinfo_main_title = get_theme_mod( 'uncode_lite_contact_section_main_title', 'Our <span>Contact</span>' );
        $quickinfo_desc  =  get_theme_mod( 'uncode_lite_contact_description', 'Better security happens when we work together, Get tips on further steps you can take to protect yourself online.' ) ;
        $quickinfo_phone_number  =  get_theme_mod( 'uncode_lite_phone_number', '+977-1-4671980' ) ;
        $quickinfo_address  =  get_theme_mod( 'uncode_lite_quick_map_address', 'Mathuri Sadan, 5th floor Ravi Bhawan, Kathmandu, Nepal' ) ;
        $quickinfo_email_address  =  get_theme_mod( 'uncode_lite_email_title', 'support@accesspressthemes.com' ) ;


        if(!empty( $quickinfo_options ) && $quickinfo_options == 'show'){ ?>            
            <section class="quickinfo-section">
                <div class="container clearfix">
                    <header class="section-title">
                        <h2><?php echo wp_kses_post($quickinfo_main_title); ?></h2>
                        <p><?php echo esc_textarea($quickinfo_desc); ?></p>
                    </header>
                    <div class="quickinfo-wrapper">
                        <?php if(!empty( $quickinfo_phone_number )) { ?>
                            <div class="quick-phone quickwrap">
                                <span><i class="fa fa-phone"></i></span>
                                <span class="quickinfo-label"><?php echo esc_html__('Phone','uncode-lite') ?></span>
                                <span class="sim-phone"><?php echo esc_attr($quickinfo_phone_number); ?></span>
                            </div>
                        <?php } if(!empty( $quickinfo_address )) { ?>
                            <div class="quick-address quickwrap">
                                <span><i class="fa fa-map-marker"></i></span>
                                <span class="quickinfo-label"><?php echo esc_html__('Address','uncode-lite') ?></span>
                                <span class="sim-address"><?php echo esc_textarea($quickinfo_address); ?></span>
                            </div>
                        <?php } if(!empty( $quickinfo_email_address )) { ?>
                            <div class="quick-email quickwrap">
                                <span><i class="fa fa-envelope"></i></span>
                                <span class="quickinfo-label"><?php echo esc_html__('Email','uncode-lite') ?></span>
                                <span class="sim-email"><?php echo esc_attr($quickinfo_email_address); ?></span>
                            </div>
                        <?php } ?>             
                    </div>
                </div>
            </section>
        <?php   
        }
    }
}
add_action( 'uncode-lite-quickinfo-section', 'uncode_lite_front_page_quick_contact_section' );


/**
 * Front Page Google Map Section
*/
if ( ! function_exists( 'uncode_lite_front_page_map_section' ) ) {
    function uncode_lite_front_page_map_section() {
        $map_options = esc_attr( get_theme_mod( 'uncode_lite_map_section_option', 'hide' ) );        
        $map_address  =   get_theme_mod( 'uncode_lite_map_address');
        if(!empty( $map_options ) && $map_options == 'show'){ ?>            
            <div class="map-section">
                <?php
                    $map_address_query = new WP_Query(array('post_type'=>'page','post__in'=>array($map_address)));
                    if($map_address_query->have_posts()){
                        while($map_address_query->have_posts()){
                            $map_address_query->the_post();
                            the_content();
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
        <?php   
        } 
    }
}
add_action( 'uncode-lite-map-section', 'uncode_lite_front_page_map_section' );