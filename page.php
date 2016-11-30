<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */





get_header(); ?>

<div class="container wrap">
	<div class="row">

		<!-- Main Content Area -->
		<div class="content col-md-9 col-md-push-3 col-sm-9 col-sm-push-3 col-xs-12 col-xs-push-0">
			<div class="row logo-wrap">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img class="logo" src="<?php echo of_get_option( 'logo' ); ?>" />
				</a>
			</div>
			<div class="row">
				<div id="primary" class="content-area">

					<main id="main" class="site-main" role="main">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'page' ); ?>

						<?php endwhile; // end of the loop. ?>


					</main><!-- #main -->
				</div><!-- #primary -->
			</div> <!-- content area row -->
		</div><!-- .col-md-8 -->

		<!-- Left Sidebar -->
		<div class="sidebar col-md-3 col-md-pull-9 col-sm-3 col-sm-pull-9 col-xs-12 col-xs-pull-0">
			<?php get_sidebar(); ?>
		</div><!-- .col-md-4 -->
</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>