<?php
/* Template Name: Portfolio Tamplate */
 
 
get_header(); 

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $mypost = array( 
            'post_type' => 'portfolio',
            'numberposts' => -1,
            'posts_per_page' => 3,
            'paged' => $paged
        );
        $loop = new WP_Query( $mypost );
        ?>
        <div class="design">
            <div id="portfolio" class="group"> 
                <div class="in">
                    <p class="soul">D'SIGN IS THE SOUL</p>
                </div>
                <hr class="border">
                <?php if ($loop->have_posts()) : ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                        <?php
                            $title= str_ireplace('"', '', trim(get_the_title()));
                            $desc= str_ireplace('"', '', trim(get_the_content()));
                        ?>   
                    
                        <div class="item">
                        <?php add_thickbox(); ?>
                            <div class="img">
                                <a class="thickbox" title="<?=$title?>: <?=$desc?>" href="<?php print  portfolio_thumbnail_url($post->ID) ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
            </div>
            
        <?php 
        endwhile;
            $total_pages = $loop->max_num_pages;
            if ($total_pages > 1){
            ?>
            </div>
            <nav class="navigation pagination" role="navigation">
                <?php 
                   $big = 999999999; // need an unlikely integer
                   echo paginate_links( array(
                      'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                      'format' => '?paged=%#%',
                      'current' => max( 1, get_query_var('paged') ),
                      'total' => $loop->max_num_pages
                  ) );
                }  ?>
            </nav> 
            <?php endif;
            wp_reset_postdata(); ?>

 
<?php get_footer(); ?>