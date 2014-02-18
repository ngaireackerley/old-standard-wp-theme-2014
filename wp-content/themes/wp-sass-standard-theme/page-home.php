<?php
/* Template Name: Homepage */
get_header(); ?>
	<div class="inner contentpage">
		<div class="colonewide">
			<?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '82' ); ?>
		</div><!-- /.colonewide  -->
		<div class="colonehalf leftcol homepghighlight">
			<!-- pull in custom field from homepage row one section -->
			<?php
			// image
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'optional_image_for_row_one_left' ) ) {
					$image = wp_get_attachment_image_src( get_field( 'optional_image_for_row_one_left' ), 'full' );
					echo '<img src="' . $image[0] . '" alt="' . get_the_title( get_field( 'optional_image_for_row_one_left' ) ) . '" />';
				}
				//title, body, link
				if ( get_field( 'title_for_row_one_left' ) ) {
					echo '<h2>' . get_field( 'title_for_row_one_left' ) . '</h2>';
				}
				if ( get_field( 'text_for_row_one_left' ) ) {
					echo get_field( 'text_for_row_one_left' );
				}
				if ( get_field( 'text_for_a_link_for_row_one_left' ) && get_field( 'link_for_row_one_left' ) ) {
					echo '<a href="' . get_field( 'link_for_row_one_left' ) . '">' . get_field( 'text_for_a_link_for_row_one_left' ) . ' &raquo; </a>';
				}
			}
			?>
		</div><!-- / .colonehalf leftcol homepghighlight -->
		<div class="colonehalf rightcol">
			<!-- pull in custom field from homepage row one section -->
			<?php 
			// image
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'optional_image_for_row_one_right' ) ) {
					$image = wp_get_attachment_image_src( get_field( 'optional_image_for_row_one_right' ), 'full' );
					echo '<img src="' . $image[0] . '" alt="' . get_the_title( get_field( 'optional_image_for_row_one_right' ) ) . '" />';
				}
				//title, body, link
				if ( get_field( 'title_for_row_one_right' ) ) {
					echo '<h2>' . get_field( 'title_for_row_one_right' ) . '</h2>';
				}
				if ( get_field( 'text_for_row_one_right' ) ) {
					echo get_field( 'text_for_row_one_right' );
				}
				if ( get_field( 'text_for_a_link_for_row_one_right' ) && get_field( 'link_for_row_one_right' ) ) {
					echo '<a class="homelink" href="' . get_field( 'link_for_row_one_right' ) . '">' . get_field( 'text_for_a_link_for_row_one_right' ) . ' &raquo; </a>';
				}
			}
			?>
		</div><!-- / .colonehalf rightcol -->
		<div class="threecols leftcol clear">
			<!-- pull in custom field from homepage row one section -->
			<!--<?php
			// image
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'optional_image_for_row_two_left' ) ) {
					$image = wp_get_attachment_image_src( get_field( 'optional_image_for_row_two_left' ), 'full' );
					echo '<img src="' . $image[0] . '" alt="' . get_the_title( get_field( 'optional_image_for_row_two_left' ) ) . '" />';
				}
				//title, body, link
				if ( get_field( 'title_for_row_two_left' ) ) {
					echo '<h3>' . get_field( 'title_for_row_two_left' ) . '</h3>';
				}
				if ( get_field( 'text_for_row_two_left' ) ) {
					echo get_field( 'text_for_row_two_left' );
				}
				if ( get_field( 'text_for_a_link_for_row_two_left' ) && get_field( 'link_for_row_two_left' ) ) {
					echo '<a class="homelink" href="' . get_field( 'link_for_row_two_left' ) . '">' . get_field( 'text_for_a_link_for_row_two_left' ) . ' &raquo; </a>';
				}
			}
			?>-->
			<!-- pull in blog posts if there are any with image thumbnails -->
			<?php // the query
			$args = array ( 'post_type' => 'post', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 3, 'ignore_sticky_posts' => 1 );
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) : ?>
				<ul class="bloglist">
				  <!-- the loop -->
				  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				  	<li class="homeblogitem">
				  		<a href="<?php the_permalink() ?>" class="bloglink">
						<?php if ( has_post_thumbnail() ) {
							echo '<span class="blogimg">';
							the_post_thumbnail();
							echo '</span>';
						} ?>
					    <h2 class="homeblogposts"><?php the_title(); ?></h2></a>
					    <p class="homeblogdate">POSTED: <?php echo get_the_date( 'j-M-Y' ); ?></p>
						<?php lbd_excerpt('lbd_excerptlength_teaser', 'lbd_excerptmore'); ?>
					</li>
				  <?php endwhile; ?>
				  <!-- end of the loop -->
				</ul>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div><!-- / .threecols leftcol -->
		<div class="threecols leftcol rightcol">
			<!-- pull in custom field from homepage row one section -->
			<?php
			// image
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'optional_image_for_row_two_middle' ) ) {
					$image = wp_get_attachment_image_src( get_field( 'optional_image_for_row_two_middle' ), 'full' );
					echo '<img src="' . $image[0] . '" alt="' . get_the_title( get_field( 'optional_image_for_row_two_middle' ) ) . '" />';
				}
				//title, body, link
				if ( get_field( 'title_for_row_two_middle' ) ) {
					echo '<h3>' . get_field( 'title_for_row_two_middle' ) . '</h3>';
				}
				if ( get_field( 'text_for_row_two_middle' ) ) {
					echo get_field( 'text_for_row_two_middle' );
				}
				if ( get_field( 'text_for_a_link_for_row_two_middle' ) && get_field( 'link_for_row_two_middle' ) ) {
					echo '<a class="homelink" href="' . get_field( 'link_for_row_two_middle' ) . '">' . get_field( 'text_for_a_link_for_row_two_middle' ) . ' &raquo; </a>';
				}
			}

			?>
		</div><!-- / .threecols leftcol rightcol -->
		<div class="threecols rightcol">
			<!-- pull in custom field from homepage row one section -->
			<?php
			// image
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'optional_image_for_row_two_right' ) ) {
					$image = wp_get_attachment_image_src( get_field( 'optional_image_for_row_two_right' ), 'full' );
					echo '<span>' . '<img src="' . $image[0] . '" alt="' . get_the_title( get_field( 'optional_image_for_row_two_right' ) ) . '" /></span>';
				}
				//title, body, link
				if ( get_field( 'title_for_row_two_right' ) ) {
					echo '<h3>' . get_field( 'title_for_row_two_right' ) . '</h3>';
				}
				if ( get_field( 'text_for_row_two_right' ) ) {
					echo get_field( 'text_for_row_two_right' );
				}
				if ( get_field( 'text_for_a_link_for_row_two_right' ) && get_field( 'link_for_row_two_right' ) ) {
					echo '<a class="homelink" href="' . get_field( 'link_for_row_two_right' ) . '">' . get_field( 'text_for_a_link_for_row_two_right' ) . ' &raquo; </a>';
				}
			}
			?>
		</div><!-- / .threecols rightcol -->
	</div><!-- / .inner contentpage -->
<?php get_footer(); ?>
