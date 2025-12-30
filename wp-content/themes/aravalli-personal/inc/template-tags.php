<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Aravalli
 */

if ( ! function_exists( 'aravalli_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function aravalli_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'aravalli-pro' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'aravalli-pro' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'aravalli_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function aravalli_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'aravalli-pro' ) );
		if ( $categories_list && aravalli_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'aravalli-pro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'aravalli-pro' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'aravalli-pro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'aravalli-pro' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'aravalli-pro' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function aravalli_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'aravalli_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'aravalli_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so aravalli_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so aravalli_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in aravalli_categorized_blog.
 */
function aravalli_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'aravalli_categories' );
}
add_action( 'edit_category', 'aravalli_category_transient_flusher' );
add_action( 'save_post',     'aravalli_category_transient_flusher' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('aravalli_sticky_menu')):
    function aravalli_sticky_menu()
    {
        $is_sticky = get_theme_mod('hide_show_sticky','1');

        if ($is_sticky == '1'):
            return 'sticky-nav';
        else:
            return 'not-sticky';
        endif;
    }
endif;


/**
 * Register Google fonts for aravalli.
 */
function aravalli_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function aravalli_scripts_styles() {
    wp_enqueue_style( 'aravalli-fonts', aravalli_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'aravalli_scripts_styles' );


/**
 * Register Breadcrumb for Multiple Variation
 */
function aravalli_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');			
}

// Custom excerpt length
function aravalli_custom_excerpt_length( $length ) {
	 $aravalli_post_excerpt = get_theme_mod('aravalli_post_excerpt','55');
    if( $aravalli_post_excerpt == 1000 ) {
        return 9999;
    }
    return esc_html( $aravalli_post_excerpt );
}


/**
 * Aravalli Header Widget Area First
 */
function aravalli_header_widget_area_first() {
	$aravalli_header_widget_first = 'aravalli-header-widget-left';
	if ( is_active_sidebar( $aravalli_header_widget_first ) ){ 
		dynamic_sidebar( 'aravalli-header-widget-left' );
	} elseif ( current_user_can( 'edit_theme_options' ) ) {

			$aravalli_sidebar_name = aravalli_get_sidebar_name_by_id( $aravalli_header_widget_first );
			?>
			<div class='widget widget_none'>
				<h4 class='widget-title'><?php echo esc_html( $aravalli_sidebar_name ); ?></h4>
				<p>
					<?php if ( is_customize_preview() ) { ?>
						<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $aravalli_header_widget_first ); ?>">
					<?php } else { ?>
						<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
					<?php } ?>
						<?php esc_html_e( 'Please assign a widget here.', 'aravalli-pro' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
}


/**
 * Aravalli Header Widget Area Second
 */
function aravalli_header_widget_area_second() {
	$aravalli_header_widget_first = 'aravalli-header-widget-right';
	if ( is_active_sidebar( $aravalli_header_widget_first ) ){ 
		dynamic_sidebar( 'aravalli-header-widget-right' );
} elseif ( current_user_can( 'edit_theme_options' ) ) {

		$aravalli_sidebar_name = aravalli_get_sidebar_name_by_id( $aravalli_header_widget_first );
		?>
		<div class='widget widget_none'>
			<h4 class='widget-title'><?php echo esc_html( $aravalli_sidebar_name ); ?></h4>
			<p>
				<?php if ( is_customize_preview() ) { ?>
					<a href="#" class="" data-sidebar-id="<?php echo esc_attr( $aravalli_header_widget_first ); ?>">
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
				<?php } ?>
					<?php esc_html_e( 'Please assign a widget here.', 'aravalli-pro' ); ?>
				</a>
			</p>
		</div>
		<?php
	}
}


/**
 * Blog Buttons 
 */
function aravalli_read_more($more)
	{  global $post;
		
	return '<div class="post-content-bottom"><a href="' . get_permalink() . "#more-{$post->ID}\" class=\"more-link\">" .__('Read More','aravalli-pro')."</a></div>";
		
	}
add_filter( 'the_content_more_link', 'aravalli_read_more' );