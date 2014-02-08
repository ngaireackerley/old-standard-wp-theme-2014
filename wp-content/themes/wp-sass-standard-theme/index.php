<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
		<h1><?php esc_attr( the_title() ); ?></h1>
		<?php 
		// the query
		$args = array ( 'post_type' => 'post', 'orderby' => 'date', 'order' => 'DSC', 'paged' => $paged , 'posts_per_page' => '10' );
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) : ?>
			<ul class="bloglist">
			  <!-- the loop -->
			  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			  	<li>
			  		<a href="<?php the_permalink() ?>" class="bloglink">
					<?php if ( has_post_thumbnail() ) {
						echo '<span class="blogimg">';
						the_post_thumbnail();
						echo '</span>';
					} ?>
				    <h2><?php the_title(); ?></h2></a>
				    <p class="date">POSTED: <?php echo get_the_date( 'j-M-Y' ); ?></p>
					<?php the_excerpt(); ?>
				</li>
			  <?php endwhile; ?>
			  <!-- end of the loop -->
			</ul>
		  	<!-- pagination here -->
			<div class="nav-below" class="navigation">
				<div class="oldposts"><?php next_posts_link( '&laquo; Older Entries', $the_query->max_num_pages ); ?>
				</div><!-- / .oldposts -->
				<div class="newposts">
					<?php previous_posts_link( 'Newer Entries &raquo;' ); ?>
				</div><!-- / .newposts -->
			</div><!-- #nav-below -->
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php include('sidebar-secondary.php'); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>
