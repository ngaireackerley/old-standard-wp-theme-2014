<footer role="contentinfo">	
	<div class="footer-row-one">
		<div class="inner">
			<div class="threecols leftcol">
				<?php if ( is_active_sidebar( 'footer-one-widget-area' ) ) : 
				dynamic_sidebar( 'footer-one-widget-area' ); endif; ?>
			</div>
			<div class="threecols leftcol rightcol">
				<?php if ( is_active_sidebar( 'footer-two-widget-area' ) ) : 
				dynamic_sidebar( 'footer-two-widget-area' ); endif; ?>
			</div>
			<div class="threecols rightcol">
				<?php if ( is_active_sidebar( 'footer-three-widget-area' ) ) : 
				dynamic_sidebar( 'footer-three-widget-area' ); endif; ?>
			</div>
		</div><!-- / .inner -->
	</div><!-- / .footer-row-one -->
	<div class="footer-row-two">		
		<div class="inner">
			<div class="colonehalf leftcol">
				<p>&copy; Client
				<?php
					$this_year = date( 'Y' );
					if ( $this_year != 2013 ) {
						echo '2013 - ' . $this_year . ', all rights reserved.';
					} else {
						echo $this_year . ', all rights reserved.';
					} ?><br />A web creation from <a href="http://lbdesign.tv">LBDesign</a>.</p>
			</div><!-- .onehalf leftcol -->
			<div class="colonehalf rightcol">
				<!-- social media -->
					<?php
					if ( function_exists( 'get_field' ) ) {
						echo '<div class="socialmedia">';
						$homepage = 1361; //need to adjust ID per site
						if ( $youtube_link = get_field( 'youtube_link', $homepage ) ) {
							echo '<a href="' . esc_url( $youtube_link ) . '"><img src="' . get_stylesheet_directory_uri() . '/images/youtube-20px.png" alt="Twitter" /></a>';
						}
						if ( $linkedin_page_link = get_field( 'linkedin_page_link', $homepage ) ) {
							echo '<a href="' . esc_url( $linkedin_page_link ) . '"><img src="' . get_stylesheet_directory_uri() . '/images/linkedin-20px.png" alt="Twitter" /></a>';
						}
						if ( $google_plus_link = get_field( 'google_plus_link', $homepage ) ) {
							echo '<a href="' . esc_url( $google_plus_link ) . '"><img src="' . get_stylesheet_directory_uri() . '/images/google-plus-20px.png" alt="Twitter" /></a>';
						}
						if ( $facebook_grouppage_link = get_field( 'facebook_grouppage_link', $homepage ) ) {
							echo '<a href="' . esc_url( $facebook_grouppage_link ) . '"><img src="' . get_stylesheet_directory_uri() . '/images/facebook-20px.png" alt="Twitter" /></a>';
						}
						if ( $twitter_user_page_link = get_field( 'twitter_user_page_link', $homepage ) ) {
							echo '<a href="' . esc_url( $twitter_user_page_link ) . '"><img src="' . get_stylesheet_directory_uri() . '/images/twitter-t-20px.png" alt="Twitter" /></a>';
						}
						if ( $rss_feed_link = get_field( 'rss_feed_link', $homepage ) ) {
							echo '<a href="' . esc_url( $rss_feed_link ) . '"><img src="' . get_stylesheet_directory_uri() . '/images/rss-20px.png" alt="Twitter" /></a>';
						}
						echo '</div>';
					} ?>
				<!-- menu -->
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'before' => '<span class="divider">&nbsp;|&nbsp;</span>' ) ); ?>
			</div><!-- /onehalf rightcol -->
		</div><!-- / .inner-->
	</div><!-- / .footer-row-two -->
</footer><!-- / footer -->
</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
