<?php
/*
Template Name: Custom Home Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="slides" class="twlevecol first clearfix">

					<?php
						$args = array('post_type' => 'slide', 'posts_per_page' => 5);
						$loop = new WP_Query($args);
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="slide">
					<?php
						the_post_thumbnail('bones-slide');
						the_content();
					?>
						</div>
					<?php endwhile; ?>
					</div>



					<div class="home-content">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

							<section class="entry-content clearfix">
								<?php the_content(); ?>
							</section>

						</article>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>

						<?php // get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
