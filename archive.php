<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

					<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title">
								<?php
									if ( is_category() ) :
										single_cat_title();

									elseif ( is_tag() ) :
										single_tag_title();

									elseif ( is_author() ) :
										/* Queue the first post, that way we know
										 * what author we're dealing with (if that is the case).
										*/
										the_post();
										printf( __( 'Author: %s', 'upbootwp' ), '<span class="vcard">' . get_the_author() . '</span>' );
										/* Since we called the_post() above, we need to
										 * rewind the loop back to the beginning that way
										 * we can run the loop properly, in full.
										 */
										rewind_posts();

									elseif ( is_day() ) :
										printf( __( 'Day: %s', 'upbootwp' ), '<span>' . get_the_date() . '</span>' );

									elseif ( is_month() ) :
										printf( __( 'Month: %s', 'upbootwp' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

									elseif ( is_year() ) :
										printf( __( 'Year: %s', 'upbootwp' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

									elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
										_e( 'Asides', 'upbootwp' );

									elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
										_e( 'Images', 'upbootwp');

									elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
										_e( 'Videos', 'upbootwp' );

									elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
										_e( 'Quotes', 'upbootwp' );

									elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
										_e( 'Links', 'upbootwp' );

									else :
										_e( 'Archives', 'upbootwp' );

									endif;
								?>
							</h1>
							<?php
								// Show an optional term description.
								$term_description = term_description();
								if ( ! empty( $term_description ) ) :
									printf( '<div class="taxonomy-description">%s</div>', $term_description );
								endif;
							?>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
							?>

						<?php endwhile; ?>

						<?php upbootwp_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<?php get_template_part( 'no-results', 'archive' ); ?>

					<?php endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->
				</section> <!-- content area row -->
			</div><!-- .col-md-8 -->

			</div>
			<!-- Left Sidebar -->
		<div class="sidebar col-md-3 col-md-pull-9 col-sm-3 col-sm-pull-9 col-xs-12 col-xs-pull-0">
			<?php get_sidebar(); ?>
		</div><!-- .col-md-4 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>
