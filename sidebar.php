<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @author William Waldon - http://www.wilwaldon.com
 * @package Claire 1.0
 */
?>
	<div id="secondary" class="widget-area" role="complementary">

		<div class="headshot">
			<p><img class="" src="<?php echo of_get_option( 'headshot' ); ?>" /></p>
			<p class="text-center">
				<ul class="list-inline text-center">
					<li><a href="https://www.facebook.com/luckylucille" target="_new"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://www.twitter.com/Rochelle_New" target="_new"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/rochelle_new" target="_new"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://www.pinterest.com/LuckyLucille" target="_new"><i class="fa fa-pinterest"></i></a></li>
				</ul>
			</p>
		</div>

		<div class="sidebar-about">
		<aside id="text-3" class="widget widget_text">
		<h4 class="widget-title"><?php echo of_get_option( 'sidebar_title' ); ?></h4>
		<div class="textwidget"><?php echo of_get_option( 'sidebar_blurb' ); ?></div>
		</aside>


		</div>





		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>


			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'upbootwp' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'upbootwp' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->