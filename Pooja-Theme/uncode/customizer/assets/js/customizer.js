/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	/**
	 * Breadcrumbs Settings
	*/	
	wp.customize("uncode_lite_breadcrumb_options", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".page_header_wrap").css("display", "block");
            } else {
                $(".page_header_wrap").css("display", "none");
            }
        } );
    });

    wp.customize( 'uncode_lite_breadcrumb_bg_image', function( value ) {
	    value.bind( function( to ) {
	    	$('.page_header_wrap').css('background-image', 'url(' + to + ')' );
	    } );
    } );

    wp.customize("uncode_lite_breadcrumb_menu", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $("#uncode-breadcrumb").css("display", "block");
            } else {
                $("#uncode-breadcrumb").css("display", "none");
            }
        } );
    });

    /**
	 * HomePage Banner
	*/
	wp.customize("uncode_lite_main_title", function(value) {
        value.bind(function(to) {
            $( ".mainbanner-wrap h1" ).html( to );
        } );
    });

    wp.customize("uncode_lite_main_description", function(value) {
        value.bind(function(to) {
            $( ".mainbanner-wrap .main-content" ).text( to );
        } );
    });

    wp.customize("uncode_lite_first_button_title", function(value) {
        value.bind(function(to) {
            $( ".first-button a" ).text( to );
        } );
    });

    wp.customize("uncode_lite_first_button_url", function(value) {
        value.bind(function(to) {
            $( ".first-button a" ).attr('href', to );
        } );
    });


    wp.customize("uncode_lite_second_button_title", function(value) {
        value.bind(function(to) {
            $( ".second-button a" ).text( to );
        } );
    });

    wp.customize("uncode_lite_second_button_url", function(value) {
        value.bind(function(to) {
            $( ".second-button a" ).attr('href', to );
        } );
    });

	/**
	 * About Section
	*/
    wp.customize("uncode_lite_about_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".about-section").css("display", "block");
            } else {
                $(".about-section").css("display", "none");
            }
        } );
    });    

    wp.customize('uncode_lite_about_features_image', function(value) {
        value.bind(function(to) {
            $( '.about-features-image figure img' ).attr('src', to );
        });
    });


    /**
	 * Services Section
	*/
    wp.customize("uncode_lite_services_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".uncode-services-section").css("display", "block");
            } else {
                $(".uncode-services-section").css("display", "none");
            }
        } );
    });

    /**
	 * Features Section
	*/
    wp.customize("uncode_lite_features_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".uncode-features-section").css("display", "block");
            } else {
                $(".uncode-features-section").css("display", "none");
            }
        } );
    });

    wp.customize("uncode_lite_features_section_main_title", function(value) {
        value.bind(function(to) {
            $( ".uncode-features-section .section-title h2" ).html( to );
        } );
    });

    wp.customize("uncode_lite_features_description", function(value) {
        value.bind(function(to) {
            $( ".uncode-features-section .section-title p" ).text( to );
        } );
    });

    /**
	 * Our Blog Section
	*/
    wp.customize("uncode_lite_blog_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".blog-section").css("display", "block");
            } else {
                $(".blog-section").css("display", "none");
            }
        } );
    });

    wp.customize("uncode_lite_blog_section_main_title", function(value) {
        value.bind(function(to) {
            $( ".blog-section .section-title h2" ).html( to );
        } );
    });

    wp.customize("uncode_lite_blog_description", function(value) {
        value.bind(function(to) {
            $( ".blog-section .section-title p" ).text( to );
        } );
    });

    /**
	 * Portfolio Section
	*/
    wp.customize("uncode_lite_portfolio_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".portfolio-section").css("display", "block");
            } else {
                $(".portfolio-section").css("display", "none");
            }
        } );
    });

    wp.customize("uncode_lite_portfolio_section_main_title", function(value) {
        value.bind(function(to) {
            $( ".portfolio-section .section-title h2" ).html( to );
        } );
    });

    wp.customize("uncode_lite_portfolio_description", function(value) {
        value.bind(function(to) {
            $( ".portfolio-section .section-title p" ).text( to );
        } );
    });


    /**
	 * Call To Action Section
	*/
    wp.customize("uncode_lite_call_to_action_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".call-action-section").css("display", "block");
            } else {
                $(".call-action-section").css("display", "none");
            }
        } );
    });

    wp.customize("uncode_lite_call_to_action_section_main_title", function(value) {
        value.bind(function(to) {
            $( ".call-title h1" ).html( to );
        } );
    });

    wp.customize("uncode_lite_call_to_action_description", function(value) {
        value.bind(function(to) {
            $( ".call-desc p" ).text( to );
        } );
    });


    wp.customize("uncode_lite_call_to_action_button_title", function(value) {
        value.bind(function(to) {
            $( ".call-action-section .mainbanner-button-wrap .first-button a" ).text( to );
        } );
    });

    wp.customize("uncode_lite_call_to_action_button_url", function(value) {
        value.bind(function(to) {
            $( ".call-action-section .mainbanner-button-wrap .first-button a" ).attr('href', to );
        } );
    });


    /**
	 * Quick Contact Section
	*/
    wp.customize("uncode_lite_contact_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".quickinfo-section").css("display", "block");
            } else {
                $(".quickinfo-section").css("display", "none");
            }
        } );
    });

    wp.customize("uncode_lite_contact_section_main_title", function(value) {
        value.bind(function(to) {
            $( ".quickinfo-section .section-title h2" ).html( to );
        } );
    });

    wp.customize("uncode_lite_contact_description", function(value) {
        value.bind(function(to) {
            $( ".quickinfo-section .section-title p" ).text( to );
        } );
    });


    wp.customize("uncode_lite_phone_number", function(value) {
        value.bind(function(to) {
            $( ".sim-phone" ).text( to );
        } );
    });

	wp.customize("uncode_lite_quick_map_address", function(value) {
	    value.bind(function(to) {
	        $( ".sim-address" ).text( to );
	    } );
	});

	wp.customize("uncode_lite_email_title", function(value) {
		value.bind(function(to) {
		    $( ".sim-email" ).text( to );
		} );
	});

	/**
	 * Maps Section
	*/
    wp.customize("uncode_lite_map_section_option", function(value) {
        value.bind(function(to) {
            if( to == 'show') {
               $(".map-section").css("display", "block");
            } else {
                $(".map-section").css("display", "none");
            }
        } );
    });


} )( jQuery );
