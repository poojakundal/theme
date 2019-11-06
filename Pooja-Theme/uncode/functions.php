<?php
/**
 * Word Count Limit
*/
if ( ! function_exists( 'uncode_lite_excerpt_more' ) ) {
    function uncode_lite_excerpt_more( $more ) {
        if ( is_admin() ) {
          return $link;
        }
        
        return '...';
    }
}
add_filter( 'excerpt_more', 'uncode_lite_excerpt_more' );


if ( ! function_exists( 'uncode_lite_word_count' ) ) {
    function uncode_lite_word_count($string, $limit) {        
        $striped_content = strip_tags($string);
        $striped_content = strip_shortcodes($striped_content);
        $words = explode(' ', $striped_content);
        return implode(' ', array_slice($words, 0, $limit));
    }
}


if ( ! function_exists( 'uncode_lite_letter_count' ) ) {
    function uncode_lite_letter_count($content, $limit) {
        $striped_content = strip_tags($content);
        $striped_content = strip_shortcodes($striped_content);
        $limit_content = mb_substr($striped_content, 0, $limit);
        if ($limit_content < $content) {
            $limit_content .= "...";
        }
        return $limit_content;
    }
}


/**
 * Page and Post Page Display Layout Metabox function
*/ 
add_action('add_meta_boxes', 'uncode_lite_metabox_section');
if ( ! function_exists( 'uncode_lite_metabox_section' ) ) {    
    function uncode_lite_metabox_section(){ 

        add_meta_box('uncode_lite_display_layout', 
                esc_html__( 'Display Layout Options', 'uncode-lite' ), 
                'uncode_lite_display_layout_callback', 
                array('page','post'), 
                'normal', 
                'high'
        );      
    }
}

$uncode_lite_page_layouts =array(

    'rightsidebar' => array(
        'value'     => 'rightsidebar',
        'label'     => esc_html__( 'Right Sidebar(Default)', 'uncode-lite' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
    ),
    'nosidebar' => array(
      'value'     => 'nosidebar',
      'label'     => esc_html__( 'Full width', 'uncode-lite' ),
      'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
  ),
);

/**
 * Function for Page layout meta box
*/
if ( ! function_exists( 'uncode_lite_display_layout_callback' ) ) {
    function uncode_lite_display_layout_callback(){
        global $post, $uncode_lite_page_layouts;
        wp_nonce_field( basename( __FILE__ ), 'uncode_lite_settings_nonce' );
    ?>
        <table class="form-table">
            <tr>
              <td>            
                <?php
                  $i = 0;  
                  foreach ($uncode_lite_page_layouts as $field) {  
                  $uncode_lite_page_metalayouts = get_post_meta( $post->ID, 'uncode_lite_page_layouts', true );
                  $uncode_lite_page_metalayouts = !empty($uncode_lite_page_metalayouts) ? $uncode_lite_page_metalayouts : 'rightsidebar';
                ?>            
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo absint($i); ?>" style="float:left; margin-right:30px;">
                    <label class="description">
                        <span>
                          <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </span></br>
                        <input type="radio" name="uncode_lite_page_layouts" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], $uncode_lite_page_metalayouts ) ?>/>
                         <?php echo esc_attr($field['label']); ?>
                    </label>
                  </div>
                <?php  $i++; }  ?>
              </td>
            </tr>            
        </table>
    <?php
    }
}

/**
 * Save the custom metabox data
*/
if ( ! function_exists( 'uncode_lite_save_page_settings' ) ) {
    function uncode_lite_save_page_settings( $post_id ) { 
        global $uncode_lite_page_layouts, $post; 
        if ( !isset( $_POST[ 'uncode_lite_settings_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash($_POST[ 'uncode_lite_settings_nonce' ]) ), basename( __FILE__ ) ) )
            return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;        
        if ( isset($_POST['post_type']) && 'page' == sanitize_text_field( wp_unslash( $_POST['post_type'] ) ) ) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;  
        }    
        foreach ($uncode_lite_page_layouts as $field) {  
            $old = get_post_meta( $post_id, 'uncode_lite_page_layouts', true); 
            $new = isset( $_POST['uncode_lite_page_layouts'] ) ? sanitize_text_field( wp_unslash($_POST['uncode_lite_page_layouts']) ) : 'rightsidebar';
            if ($new && $new != $old) {  
                update_post_meta($post_id, 'uncode_lite_page_layouts', $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id,'uncode_lite_page_layouts', $old);  
            } 
         } 
    }
}
add_action('save_post', 'uncode_lite_save_page_settings');

/**
 * Uncode Lite breadcrumbs function 
*/
if (!function_exists('uncode_lite_breadcrumbs_menu')) {
  function uncode_lite_breadcrumbs_menu() {
        global $post;
        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '/';      
        $home = esc_html__('Home', 'uncode-lite'); // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        $homeLink = esc_url( home_url() );
        if (is_front_page()) {

          if ($showOnHome == 1)
            echo '<div id="uncode-breadcrumb"><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></div></div>';
        } else {
          echo '<div id="uncode-breadcrumb"><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a> ' . esc_html($delimiter) . ' ';
        if (is_category()) {
          $thisCat = get_category(get_query_var('cat'), false);
          if ($thisCat->parent != 0)
            echo wp_kses_post(get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' '));
          echo wp_kses_post($before) . esc_html__('Archive by category','uncode-lite').' "' . esc_attr(single_cat_title('', false)) . '"' . wp_kses_post($after);
        } elseif (is_search()) {
          echo wp_kses_post($before) . esc_html__('Search results for','uncode-lite'). '"' . get_search_query() . '"' . wp_kses_post($after);
        } elseif (is_day()) {
          echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_html($delimiter) . ' ';
          echo '<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a> ' . esc_html($delimiter) . ' ';
          echo wp_kses_post($before) . esc_attr(get_the_time('d')) . wp_kses_post($after);
        } elseif (is_month()) {
          echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_html($delimiter) . ' ';
          echo wp_kses_post($before) . esc_attr(get_the_time('F')) . wp_kses_post($after);
        } elseif (is_year()) {
          echo wp_kses_post($before) . esc_attr(get_the_time('Y')) . wp_kses_post($after);
        } elseif (is_single() && !is_attachment()) {
          if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' . esc_attr($post_type->labels->singular_name) . '</a>';
            if ($showCurrent == 1)
              echo ' ' . esc_html($delimiter) . ' ' . wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
          } else {
            $cat = get_the_category();
            $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            if ($showCurrent == 0)
              $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
            echo wp_kses_post($cats);
            if ($showCurrent == 1)
              echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
          }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
          $post_type = get_post_type_object(get_post_type());
          echo wp_kses_post($before) . esc_attr($post_type->labels->singular_name) . wp_kses_post($after);
        } elseif (is_attachment()) {
          $parent = get_post($post->post_parent);
          $cat = get_the_category($parent->ID);
          $cat = $cat[0];
          echo wp_kses_post(get_category_parents($cat, TRUE, ' ' . $delimiter . ' '));
          echo '<a href="' . esc_url(get_permalink($parent)) . '">' . esc_attr($parent->post_title) . '</a>';
          if ($showCurrent == 1)
            echo ' ' . esc_html($delimiter) . ' ' . wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
        } elseif (is_page() && !$post->post_parent) {
          if ($showCurrent == 1)
            echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
        } elseif (is_page() && $post->post_parent) {
          $parent_id = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_attr(get_the_title($page->ID)) . '</a>';
            $parent_id = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo $breadcrumbs[$i];
            if ($i != count($breadcrumbs) - 1)
              echo ' ' . esc_html($delimiter) . ' ';
          }
          if ($showCurrent == 1)
            echo ' ' . esc_html($delimiter) . ' ' . wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
        } elseif (is_tag()) {
          echo wp_kses_post($before) . esc_html__('Posts tagged','uncode-lite').' "' . esc_attr(single_tag_title('', false)) . '"' . wp_kses_post($after);
        } elseif (is_author()) {
          global $author;
          $userdata = get_userdata($author);
          echo wp_kses_post($before) . esc_html__('Articles posted by ','uncode-lite'). esc_attr($userdata->display_name) . wp_kses_post($after);
        } elseif (is_404()) {
          echo wp_kses_post($before) . esc_html__('Error 404', 'uncode-lite') . wp_kses_post($after);
        }

        if (get_query_var('paged')) {
          if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
              echo esc_html__('Page', 'uncode-lite') . ' ' . get_query_var('paged');
              if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo ')';
      }
      echo '</div>';
    }
  }
}

/**
  * Comment Callback function
*/
if ( ! function_exists( 'uncode_lite_comment' ) ) {
  function uncode_lite_comment($comment, $args, $depth) {
      $GLOBALS['comment'] = $comment; ?>
      <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment-wrapper media" id="comment-<?php comment_ID(); ?>">
            <a href="javascript();" class="pull-left">
              <?php echo get_avatar($comment,$size='100'); ?>
            </a>
            <?php if ($comment->comment_approved == '0') : ?>
                 <em><?php esc_html_e('Your comment is awaiting moderation.','uncode-lite') ?></em>
                
            <?php endif; ?>
            <div class="media-body">
                    <div>
                        <?php /* translators: %s : author link */ printf(wp_kses('<h4 class="media-heading">%s</h4>', array( 'h4' => array( 'class' => array() ), 'a' => array( 'href' => array(), 'rel' => array(), 'class' => array() ) )), get_comment_author_link()) ?>
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                          <?php printf(wp_kses_post('%1$s at %2$s'), esc_html(get_comment_date()), esc_html(get_comment_time())); ?>
                        </a>
                    </div>
                      <?php comment_text() ?>
                    <div class="fsprorow">
                        <div class="comment-left">
                            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </div>
                    </div>
            </div>
        </div>
      </li>
     <?php
  }
}

/**
 * Schema type
*/
function uncode_lite_html_tag_schema() {
	$schema 	= 'http://schema.org/';
	$type 		= 'WebPage';

	// Is single post
	if ( is_singular( 'post' ) ) {
		$type 	= 'Article';
	}

	// Is author page
	elseif ( is_author() ) {
		$type 	= 'ProfilePage';
	}

	// Is search results page
	elseif ( is_search() ) {
		$type 	= 'SearchResultsPage';
	}

	echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}

/**
 * All fontawesome icon list
*/
if (!function_exists('uncode_lite_icons_array')) {
    function uncode_lite_icons_array(){
       $kr_icon_list_raw = array("flaticon-alien","flaticon-ambulance","flaticon-ambulance-1","flaticon-aries","flaticon-armchair","flaticon-baby","flaticon-baby-1","flaticon-baby-girl","flaticon-back","flaticon-balance","flaticon-bar-chart","flaticon-bar-chart-1","flaticon-battery","flaticon-battery-1","flaticon-battery-2","flaticon-battery-3","flaticon-battery-4","flaticon-bedside-table","flaticon-beer","flaticon-binoculars","flaticon-blind","flaticon-book","flaticon-cancer","flaticon-car","flaticon-car-1","flaticon-car-2","flaticon-center-alignment","flaticon-center-alignment-1","flaticon-chicken","flaticon-chicken-1","flaticon-chicken-2","flaticon-clock","flaticon-clock-1","flaticon-clock-2","flaticon-clock-3","flaticon-clock-4","flaticon-cloud","flaticon-cloud-1","flaticon-cloud-2","flaticon-cloud-computing","flaticon-cloudy","flaticon-coins","flaticon-compass","flaticon-conga","flaticon-copy","flaticon-corndog","flaticon-cow","flaticon-customer-service","flaticon-cutlery","flaticon-diagonal-arrow","flaticon-diagonal-arrow-1","flaticon-diagonal-arrow-2","flaticon-diagonal-arrow-3","flaticon-diamond","flaticon-diaper","flaticon-download","flaticon-download-1","flaticon-electric-guitar","flaticon-emoticon","flaticon-export","flaticon-eye","flaticon-eye-1","flaticon-feeding-bottle","flaticon-file","flaticon-file-1","flaticon-file-2","flaticon-file-3","flaticon-film-strip","flaticon-flag","flaticon-flash","flaticon-fork","flaticon-fountain-pen","flaticon-fountain-pen-1","flaticon-fountain-pen-2","flaticon-fountain-pen-3","flaticon-fountain-pen-4","flaticon-gemini","flaticon-glass-of-water","flaticon-guitar","flaticon-ham","flaticon-happy","flaticon-happy-1","flaticon-head","flaticon-heavy-metal","flaticon-home","flaticon-home-1","flaticon-home-2","flaticon-home-3","flaticon-home-4","flaticon-horse","flaticon-id-card","flaticon-jar","flaticon-justify","flaticon-laundry","flaticon-laundry-1","flaticon-laundry-2","flaticon-laundry-3","flaticon-laundry-4","flaticon-laundry-5","flaticon-left-alignment","flaticon-left-alignment-1","flaticon-lemon","flaticon-lemon-1","flaticon-lemonade","flaticon-lemonade-1","flaticon-leo","flaticon-light-bulb","flaticon-like","flaticon-mail","flaticon-mail-1","flaticon-mail-2","flaticon-mail-3","flaticon-mail-4","flaticon-mail-5","flaticon-man","flaticon-man-1","flaticon-map","flaticon-maths","flaticon-medical-result","flaticon-money","flaticon-monitor","flaticon-monitor-1","flaticon-monitor-2","flaticon-monitor-3","flaticon-monitor-4","flaticon-monitor-5","flaticon-muted","flaticon-next","flaticon-ninja","flaticon-padlock","flaticon-padlock-1","flaticon-pear","flaticon-phone-call","flaticon-phone-call-1","flaticon-phone-call-2","flaticon-phone-call-3","flaticon-photo-camera","flaticon-pie-chart","flaticon-pie-chart-1","flaticon-piggy-bank","flaticon-pin","flaticon-placeholder","flaticon-placeholder-1","flaticon-placeholder-2","flaticon-plug","flaticon-plug-1","flaticon-pointing","flaticon-rain","flaticon-right-alignment","flaticon-right-alignment-1","flaticon-rolling-pin","flaticon-ruler","flaticon-ruler-1","flaticon-sad","flaticon-saturn","flaticon-saturn-1","flaticon-sausage","flaticon-sheep","flaticon-sheep-1","flaticon-shield","flaticon-shop","flaticon-shopping-bag","flaticon-shopping-basket","flaticon-smartphone","flaticon-smartphone-1","flaticon-smartphone-2","flaticon-smartphone-3","flaticon-smile","flaticon-socket","flaticon-speech-bubble","flaticon-speech-bubble-1","flaticon-speech-bubble-2","flaticon-speech-bubble-3","flaticon-spoon","flaticon-sun","flaticon-surprised","flaticon-syringe","flaticon-table","flaticon-tap","flaticon-tap-1","flaticon-tap-2","flaticon-taurus","flaticon-telephone","flaticon-toaster","flaticon-ufo","flaticon-upload","flaticon-upload-1","flaticon-van","flaticon-victory","flaticon-video-camera","flaticon-video-camera-1","flaticon-watermelon","flaticon-weight","flaticon-wifi","flaticon-wifi-1","flaticon-wifi-2","flaticon-wifi-3","flaticon-woman","flaticon-woman-1","flaticon-zip");
       return $kr_icon_list_raw;
    }
}