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
 * @author William Waldon - http://www.wilwaldon.com
 * @package Claire 1.0
 */

get_header(); ?>
	<div class="container wrap">
		<div class="row" style="height:100%">

			<!-- Main Content Area -->
			<div class="content col-md-9 col-sm-9 col-xs-12 col-xs-push-0">

			<div class="row logo-wrap">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo of_get_option( 'blog_name' ); ?></a>
				  <!-- <img class="logo" src="<?php echo of_get_option( 'logo' ); ?>" /> -->

	    </div>
	     <div class="row">
				<div id="primary" class="content-area">

					<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>
						<div class="row">
							<div class="col-md-12"><a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a></div>
							<div class="col-md-12"><span class="entry-time">Posted On: <?php the_time('m/j/Y'); ?></span></div>
						</div>

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<?php the_content('Continue Reading >>'); ?>
						<hr>

						<?php endwhile; ?>

						<?php if(function_exists('wp_paginate')) {
						    wp_paginate();
						}
						else {
						    upbootwp_content_nav( 'nav-below' );
						}
						?>

					<?php else : ?>
						<?php get_template_part( 'no-results', 'index' ); ?>
					<?php endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->
				</div> <!-- content area row -->
			</div><!-- .col-md-8 -->
			<!-- Left Sidebar -->
		<div class="sidebar col-md-3 col-sm-3 col-xs-12 col-xs-pull-0">
			<?php get_sidebar(); ?>
		</div><!-- .col-md-4 -->
			</div>
		</div><!-- .row -->


	</div><!-- .container -->
<?php get_footer(); ?>