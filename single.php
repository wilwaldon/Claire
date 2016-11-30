<?php
/**
 * The Template for displaying all single posts.
 *
 * @author William Waldon - http://www.wilwaldon.com
 * @package Claire 1.0
 */

get_header(); ?>
<div class="container wrap">
	<div class="row">


		<!-- Main Content Area -->
		<div class="content col-md-9  col-sm-9  col-xs-12 col-xs-push-0">
			<div class="row logo-wrap">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo of_get_option( 'blog_name' ); ?></a>
			</div>

			<div class="row">
				<div id="primary" class="content-area">

					<main id="main" class="site-main" role="main">
						<div class="row">
							<div class="col-md-12"><h1 class="entry-title"><?php the_title(); ?></h1></div>
							<div class="col-md-12"><span class="entry-time">Posted On: <?php the_time('m/j/Y'); ?></span></div>
						</div>
						<?php the_post_thumbnail(); ?>

						<?php while ( have_posts() ) : the_post(); ?>


							<?php the_content(); ?>

									<?php // Display the thumbnail of the previous post ?>
							      <div class="col-md-6"> <?php
							          $prevPost = get_previous_post();
							          $prevthumbnail = get_the_post_thumbnail($prevPost->ID); ?>
							          <h4><?php previous_post_link('%link', 'Previous Post'); ?></h4>
							          <?php previous_post_link('%link', $prevthumbnail); ?>
							      </div>

							  	<?php // Display the thumbnail of the next post ?>
							      <div class="col-md-6"> <?php
							          $nextPost = get_next_post();
							          $nextthumbnail = get_the_post_thumbnail($nextPost->ID); ?>
							          <h4><?php next_post_link('%link', 'Next Post'); ?></h4>
							          <?php next_post_link('%link', $nextthumbnail); ?>
							      </div>

							<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() )
								comments_template();
							?>

						<?php endwhile; // end of the loop. ?>



					</main><!-- #main -->
				</div><!-- #primary -->
			</div> <!-- content area row -->
		</div><!-- .col-md-8 -->

		<!-- Left Sidebar -->
		<div class="sidebar col-md-3  col-sm-3  col-xs-12 col-xs-pull-0">
			<?php get_sidebar(); ?>
		</div><!-- .col-md-4 -->

</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>