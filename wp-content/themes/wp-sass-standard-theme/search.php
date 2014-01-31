<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
		
			<?php if ( have_posts() ) : ?>
			<h1><?php printf( __( 'Search Results for: %s', 'twentyten' ), get_search_query() ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>
			<ul class="search">
				<li>
					<h2><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h2>
					<?php the_excerpt(); ?>
				</li>
			</ul>
			<?php 
		endwhile; else : ?>
				<h2><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
				<?php get_search_form(); ?>
				<p>Alternatively, click a link from our sitemap below</p>
				<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
			<?php endif;  ?>
	</div><!-- /.colonewide -->
</div><!-- / .inner -->
<?php get_footer(); ?>
