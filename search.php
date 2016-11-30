<?php
/**
 * The template for displaying Search Results pages.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */


get_header(); ?>
	<div class="container wrap">
		<div class="row" style="height:100%">

			<!-- Main Content Area -->
			<div class="content col-md-9 col-md-push-3 col-sm-9 col-sm-push-3 col-xs-12 col-xs-push-0">
			<nav class="mobile-nav">
				<?php
				$args = array('theme_location' => 'primary',
					'container_class' => 'nav',
					'menu_class' => 'list-inline',
					'fallback_cb' => '',
					'menu_id' => 'main-menu',
					'walker' => new Upbootwp_Walker_Nav_Menu());
				wp_nav_menu($args);
				?>
			</nav>
			<div class="row logo-wrap">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	        <img class="logo" src="<?php echo of_get_option( 'logo' ); ?>" />
	      </a>
	     </div>
	     <div class="row">
				<div id="primary" class="content-area">

					<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'upbootwp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'search' ); ?>

						<?php endwhile; ?>

						<?php upbootwp_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<?php get_template_part( 'no-results', 'search' ); ?>

					<?php endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->
				</div> <!-- content area row -->
			</div><!-- .col-md-8 -->

			</div>
			<!-- Left Sidebar -->
		<div class="sidebar col-md-3 col-md-pull-9 col-sm-3 col-sm-pull-9 col-xs-12 col-xs-pull-0">
			<?php get_sidebar(); ?>
		</div><!-- .col-md-4 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>