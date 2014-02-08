<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<!--<link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png" />-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<header role="banner">
			<div class="inner rowone">
				<div class="skip-link screen-reader-text">
					<a href="#content" title="<?php esc_attr_e( 'Skip to content'); ?>"><?php _e( 'Skip to content' ); ?></a>
				</div><!-- / .skip-link screen-reader-text -->
				<div class="colonethird leftcol">
					<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/default-logo.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
				</div><!-- / .colonethird leftcol -->
				<div class="coltwothirds rightcol">
					<h2><?php bloginfo( 'description' ); ?></h2>
				</div><!-- / .coltwothird rightcol -->
			</div><!-- / .inner -->
		<div class="rowtwo">
			<div class="inner">
				<div class="mobilemenu"><?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?></div>
				<div class="mainmenu"><?php wp_nav_menu( array( 'theme_location' => 'mainnav' ) ); ?></div>
			</div><!-- inner -->
		</div><!-- / .rowtwo -->
	</header><!-- /header -->
	
