<?php
    if(!function_exists( 'uncode_lite_register_fonts' ) ) {

            function uncode_lite_register_fonts () {

                $uncode_lite_body_font = get_theme_mod( 'uncode_lite_body_font', 'Lato' );
                $uncode_lite_heading_font = get_theme_mod( 'uncode_lite_heading_font', 'Lato' );
                $uncode_lite_section_title_font = get_theme_mod( 'uncode_lite_section_title_font', 'Bad Script' );
                $uncode_lite_menu_font = get_theme_mod( 'uncode_lite_menu_font', 'Open Sans Condensed' );
                $fonts_arr = array_unique(array( $uncode_lite_body_font, $uncode_lite_heading_font, $uncode_lite_section_title_font, $uncode_lite_menu_font ));

                $fonts = str_replace( ' ', '+', implode('|', $fonts_arr) );
                    
                wp_register_style( 'uncode-lite-dynamic-fonts', '//fonts.googleapis.com/css?family=' . $fonts );
                wp_enqueue_style( 'uncode-lite-dynamic-fonts' );

            }

            add_action( 'wp_head', 'uncode_lite_register_fonts' );

    }

        function uncode_lite_dynamic_styles() {
                $tpl_color = sanitize_hex_color(get_theme_mod( 'uncode_lite_tpl_color', '#e23815' ));
                $lite_color = uncode_lite_colour_brightness($tpl_color, 0.8);
                $dark_color = uncode_lite_colour_brightness($tpl_color, -0.8);
                $rgb = uncode_lite_hex2rgb($tpl_color);

                /** Color **/
                $custom_css = "
                        #site-navigation ul#primary-menu > li:hover > a,
                        #site-navigation #primary-menu ul > li:hover > a,
                        #site-navigation #primary-menu ul > li.current_page_item a,
                        #site-navigation ul#primary-menu > li.current-menu-item a,
                        .mainbanner-button-wrap .second-button a:hover,
                        .section-title h2 span, .about-content h2 span,
                        .about-section .about-content .readmore a,
                        .uncode-features-section .featureswrap .item-icon,
                        .uncode-features-section .readmore a,
                        .blog-section .blogsinfo a:hover,
                        .blog-section .blog-image .blogauthor span:hover,
                        .blog-section .blogsinfo .blog-readmore a,
                        .quickinfo-section span i,
                        .call-action-section .mainbanner-button-wrap a:hover,
                        a:hover, a:focus, a:active,
                        .main-blog-right .number-text,
                        .main-blog-right .number,
                        .main-blog-right a:hover,
                        .comment a:hover,
                        .main-blog-right a:hover, .comment a:hover,
                        .nav-previous a, .nav-next a,
                        .comment-left a:hover, .comment-left a:hover:before,
                        .comment-wrapper .media-body a:hover {
                                color: {$tpl_color};

                        }";


                /** Background Color **/
                $custom_css .= "
                        .mainbanner-button-wrap .first-button a,
                        .uncode-features-section .featureswrap .item-icon:hover,
                        .call-action-section,
                        .scrollup:hover,
                        .uncode-services-section .servicestwo,
                        .widget-area .widget_search input[type=submit],
                        #uncode-breadcrumb a:after,
                        .widget-area .calendar_wrap caption,
                        .main-blog-right .number-text:before,
                        .pagination span.current, .pagination a:hover,
                        .blog-detail-content .tags a,
                        button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"],
                        .error-404 .backtohome a,
                        #site-navigation .nav-toggle div{
                                background: {$tpl_color};
                        }";

                /** Lite Background Color **/
                $custom_css .= "
                        .uncode-services-section .servicesone,
                        button:hover, input[type=\"button\"]:hover,
                        input[type=\"reset\"]:hover,
                        input[type=\"submit\"]:hover{
                                background: {$lite_color};
                        }";

                /** Dark Background Color **/
                $custom_css .= "
                        .uncode-services-section .servicesthree{
                                background: {$dark_color};
                        }";

                /** 0.82 Transparent background **/
                $custom_css .= "
                        .scrollup,
                        .portfolio-section .portfolioinfo .portfolio-info,
                        .error-404 .backtohome a:hover{
                                background: rgba({$rgb[0]}, {$rgb[1]}, {$rgb[2]}, 0.82);
                        }";



                /** Border Color **/
                $custom_css .= "
                        .main-banner .mainbanner-button-wrap .first-button a,
                        .uncode-features-section .featureswrap .item-icon,
                        .widget-area .widget-title,
                        .widget-area .widget_search input[type=submit],
                        .pagination span.current, .pagination a:hover,
                        button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"],
                        button:hover, input[type=\"button\"]:hover, input[type=\"reset\"]:hover, input[type=\"submit\"]:hover,
                        .error-404 .backtohome a,
                        .error-404 .backtohome a:hover {
                                border-color: {$tpl_color};
                        }";

                /** Box Shadow **/
                $custom_css .= "
                        .uncode-features-section .featureswrap .item-icon:hover{
                                box-shadow: 0 0 0 8px rgba({$rgb[0]}, {$rgb[1]}, {$rgb[2]}, 0.3);
                        }";

                /** Typography Styles **/
                    $uncode_lite_body_font = get_theme_mod( 'uncode_lite_body_font', 'Lato' );
                    $uncode_lite_heading_font = get_theme_mod( 'uncode_lite_heading_font', 'Lato' );
                    $uncode_lite_section_title_font = get_theme_mod( 'uncode_lite_section_title_font', 'Bad Script' );
                    $uncode_lite_menu_font = get_theme_mod( 'uncode_lite_menu_font', 'Open Sans Condensed' );

                    if( $uncode_lite_body_font ) {
                        $custom_css .= "
                            body, body p {
                                font-family: {$uncode_lite_body_font};
                            }";
                    }

                    if( $uncode_lite_heading_font ) {
                        $custom_css .= "
                            h1, h2, h3, h4, h5, h6 {
                                font-family: {$uncode_lite_heading_font};
                            }";
                    }

                    if( $uncode_lite_section_title_font ) {
                        $custom_css .= "
                            .section-title {
                                font-family: {$uncode_lite_section_title_font};
                            }";
                    }

                    if( $uncode_lite_menu_font ) {
                        $custom_css .= "
                            .menu li a {
                                font-family: {$uncode_lite_menu_font};
                            }";
                    }

                wp_add_inline_style( 'uncode-lite-style', $custom_css );
        }

        add_action( 'wp_enqueue_scripts', 'uncode_lite_dynamic_styles' );

        function uncode_lite_colour_brightness($hex, $percent) {
            // Work out if hash given
            $hash = '';
            if (stristr($hex, '#')) {
                $hex = str_replace('#', '', $hex);
                $hash = '#';
            }
            /// HEX TO RGB
            $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
            //// CALCULATE 
            for ($i = 0; $i < 3; $i++) {
                // See if brighter or darker
                if ($percent > 0) {
                    // Lighter
                    $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
                } else {
                    // Darker
                    $positivePercent = $percent - ($percent * 2);
                    $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
                }
                // In case rounding up causes us to go to 256
                if ($rgb[$i] > 255) {
                    $rgb[$i] = 255;
                }
            }
            //// RBG to Hex
            $hex = '';
            for ($i = 0; $i < 3; $i++) {
                // Convert the decimal digit to hex
                $hexDigit = dechex($rgb[$i]);
                // Add a leading zero if necessary
                if (strlen($hexDigit) == 1) {
                    $hexDigit = "0" . $hexDigit;
                }
                // Append to the hex string
                $hex .= $hexDigit;
            }
            return $hash . $hex;
        }

        function uncode_lite_hex2rgb($hex) {
            $hex = str_replace("#", "", $hex);

            if (strlen($hex) == 3) {
                $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
                $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
                $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
            } else {
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
            }
            $rgb = array($r, $g, $b);
            //return implode(",", $rgb); // returns the rgb values separated by commas
            return $rgb; // returns an array with the rgb values
        }