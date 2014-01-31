<?php
/**
 * The template for displaying Tag Archive pages.
 */
get_header(); ?>

<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
	<h1 class="tagsandcats"><?php printf( __( 'News/Blog tagged: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
	<ul class="bloglist">
		<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<a href="<?php the_permalink() ?>" class="bloglink">
			<?php if(has_post_thumbnail()) {
				echo '<span class="blogimg">';
				the_post_thumbnail();
				echo '</span>';
			} ?>
		    <h2><?php the_title(); ?></h2></a>
		    <p class="date">POSTED: <?php echo get_the_date('j-M-Y'); ?></p>
			<?php the_excerpt(); ?>
		</li>
		<?php endwhile; ?>
	</ul>
	
	<div class="nav-below" class="navigation">
		<div class="oldposts"><?php next_posts_link( '&laquo; Older Entries', $wp_query->max_num_pages ); ?>
		</div><!-- / .oldposts -->
		<div class="newposts">
			<?php previous_posts_link( 'Newer Entries &raquo;' ); ?>
		</div><!-- / .newposts -->
	</div><!-- #nav-below -->
	<!-- edit ID based on the page of the blog/news -->
	<a class="backlink" href="<?Php echo get_permalink(57); ?>">&laquo; Back to Blog</a>
</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php get_sidebar(); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>