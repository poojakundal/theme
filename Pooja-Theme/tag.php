<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy

 */

get_header(); ?>

    <section id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php if ( have_posts() ) : ?>

            <header class="archive-header">
                <h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'pietergoosen' ), single_tag_title( '', false ) ); ?></h1>

                <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    endif;
                ?>
            </header><!-- .archive-header -->

            <?php
                $counter = 1; //Starts counter for post column lay out

                // Start the Loop.
                while ( have_posts() ) : the_post();

        ?>
                <div class="entry-column<?php echo ( $counter%2  ? ' left' : ' right' ); ?>">

                    <?php get_template_part( 'content', get_post_format() ); ?>

                </div>  

        <?php   

            $counter++; //Update the counter

            endwhile;

        pietergoosen_pagination();

        else :
                    // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );

                endif;
            ?>
        </div><!-- #content -->
    </section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_footer();